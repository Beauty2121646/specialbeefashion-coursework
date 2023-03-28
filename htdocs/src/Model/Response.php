<?php

namespace Asobi\Model;

/**
 * The response class to handle all request
 */
class Response
{
    /**
     * @var string
     */
    private string $is_valid = ' is-valid';
    /**
     * @var string
     */
    private string $is_invalid = ' is-invalid';
    /**
     * @var \Asobi\Model\Response
     */
    private static Response $instance;
    /**
     * @var \Asobi\Model\Main
     */
    public Main $main;
    /**
     * An instance of Response class
     *
     * @param \Asobi\Model\Main $main The core mail
     *
     * @return \Asobi\Model\Response
     * @uses \isset()
     */
    public static function getInstance(Main $main)
    : Response
    {
        if (!isset(self::$instance) || self::$instance == NULL)
        {
            self::$instance = new Response($main);
        }

        return self::$instance;
    }
    /**
     * The class constructor
     *
     * @param \Asobi\Model\Main $main
     */
    public function __construct(Main $main)
    {
        $this->main = $main;
    }
    /**
     * Handle users request
     *
     * @return void
     */
    public function respondToRequest()
    : void
    {
        $control = $_REQUEST['control'] ?? '';
        if (strtolower($this->main->getPageSlug()) === 'logout')
        {
            $this->main->session->logout();
            header("Location: {$this->main->getHostUrl()}");
            exit;
        }
        // * The validation switch.
        switch ($control)
        {
            case 'registration':
                {
                    global $firstName, $lastName, $otherName, $username, $password, $email, $v_firstName, $v_lastName, $v_otherName, $v_username, $v_password, $v_email;
                    $firstName   = htmlentities(trim($_REQUEST['firstName'] ?? ''));
                    $lastName    = htmlentities(trim($_REQUEST['lastName'] ?? ''));
                    $otherName   = htmlentities(trim($_REQUEST['otherName'] ?? ''));
                    $username    = htmlentities(trim($_REQUEST['username'] ?? ''));
                    $password    = trim($_REQUEST['password'] ?? '');
                    $email       = trim($_REQUEST['email'] ?? '');
                    $v_firstName = $this->validate('name', $firstName);
                    $v_lastName  = $this->validate('name', $lastName);
                    $v_otherName = $this->validate('name', $otherName, TRUE);
                    $v_username  = $this->validate('username', $username);
                    $v_password  = $this->validate('password', $password);
                    $v_email     = $this->validate('mail', $email);
                    $respond     = stripos(trim("$v_firstName$v_lastName$v_otherName$v_username$v_password$v_email"), $this->is_invalid) === FALSE;
                }
                break;
            case 'login':
                {
                    global $username_email, $password, $remember, $checked, $v_password, $ev_username_email;
                    $username_email    = htmlentities(trim($_REQUEST['username_email'] ?? ''));
                    $password          = trim($_REQUEST['password'] ?? '');
                    $remember          = htmlentities(trim($_REQUEST['remember'] ?? ''));
                    $checked           = !empty($remember) ? ' checked' : '';
                    $v_password        = $this->validate('password', $password);
                    $ev_username_email = $this->validate('username_email', $username_email);
                    $respond           = stripos(trim("$v_password$ev_username_email"), $this->is_invalid) === FALSE;
                }
                break;
            case 'forgotten':
                global $username_email, $v_username_email;
                $username_email   = trim($_REQUEST['username_email'] ?? '');
                $v_username_email = $this->validate('username_email', $username_email);
                $respond          = stripos(trim($this->is_invalid), $v_username_email) === FALSE;
                break;
            default:
                $respond = FALSE;
                break;
        }
        if ('xmlhttprequest' === strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? ''))
        {
            if ($respond)
            {
                // com.facebook.katana
                $this->set_response_code();
                header('Content-Type: application/json');
                if ($control == 'registration')
                {
                    global $firstName, $lastName, $otherName, $username, $password, $email;
                    $registration = $this->registration($firstName, $lastName, $otherName, $username, $password, $email);
                    if ($role = $registration['role'] ?? '')
                    {
                        echo json_encode(['success' => 'true', 'message' => "Welcome to {$this->main->getBrandLogoTitle()}", 'role' => $role], JSON_FORCE_OBJECT);
                    } else
                    {
                        if (isset($registration['error']))
                        {
                            $this->set_response_code(406);
                            echo json_encode(['success' => 'false', 'message' => $registration['error'], 'errno' => $registration['errno']], JSON_FORCE_OBJECT);
                        } else
                        {
                            $this->set_response_code(400);
                        }
                    }
                    exit();
                }
                if ($control == 'login')
                {
                    $this->set_response_code();
                    header('Content-Type: application/json');
                    global $username_email, $password;
                    $login = $this->login($username_email, $password);
                    if ($login['success'])
                    {
                        $login['success'] = 'true';
                        $login['message'] = 'Welcome to ' . $this->main->getBrandLogoTitle();
                        echo json_encode($login, JSON_FORCE_OBJECT);
                    }
                    if (isset($login['error']))
                    {
                        $login['success'] = 'false';
                        $login['message'] = $login['error'];
                        $this->set_response_code(406);
                        echo json_encode($login, JSON_FORCE_OBJECT);
                    } else $this->set_response_code(400);
                    exit();
                }
            } else
            {
                $this->set_response_code(400);
                $responses = ['success' => 'false'];
                foreach (['firstName', 'lastName', 'otherName', 'username', 'password', 'email'] as $item)
                {
                    if (($v = "v_$item") && isset($GLOBALS[$item], $GLOBALS[$v]) && ($err = $GLOBALS[$v])) $responses[$item] = $err;
                }
                echo json_encode($responses, JSON_FORCE_OBJECT);
            }
            $this->set_response_code(400);
            exit();
        }
        if ($control == 'registration')
        {
            global $firstName, $lastName, $otherName, $username, $password, $email;
            $registration = $this->registration($firstName, $lastName, $otherName, $username, $password, $email);

            if (isset($registration['role']) && $this->main->session->isLogin())
            {
                $this->set_response_code();
                header("Location: {$this->main->getHostUrl()}");
                exit;
            }
        }
        if ($control == 'login')
        {
            global $username_email, $password;
            $login = $this->login($username_email, $password);
            if (isset($login['role']) && $this->main->session->isLogin())
            {
                $this->set_response_code();
                header("Location: {$this->main->getHostUrl()}");
                exit;
            }
        }
    }
    /**
     * Validate request form fields
     *
     * @param string $action   The types of validation to cary out
     * @param string $value    The value to validate
     * @param bool   $optional The value supplied will be validated with optional condition
     *
     * @return string
     * @uses \strlen()
     * @uses \preg_match()
     * @uses \stripos()
     */
    public function validate(string $action, string $value, bool $optional = FALSE)
    : string
    {
        $len           = strlen($value);
        $regx_username = '/^[a-z]+\.?[a-z0-9]+$/i';
        $regx_email    = '/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}$/i';
        // * The switch
        $valid = match ($action)
        {
            'name'           => $optional && empty($value) || preg_match('/^[a-zA-Z][a-zA-Z0-9]{2,63}$/', $value),
            'username'       => preg_match($regx_username, $value) && $len >= 6 && $len <= 64,
            'username_email' => stripos($value, '@') !== FALSE ? preg_match($regx_email, $value) : preg_match($regx_username, $value) && $len >= 6 && $len <= 64,
            'password'       => preg_match('/^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])\S+$/', $value),
            'mail', 'email'  => preg_match($regx_email, $value),
            default          => FALSE,
        };

        return $valid ? $this->is_valid : $this->is_invalid;
    }
    /**
     * Set response header
     *
     * @param int $code The status code
     *
     * @return void
     * @uses \header()
     */
    public function set_response_code(int $code = 200)
    : void
    {
        $text = match ($code)
        {
            100     => 'Continue',
            101     => 'Switching Protocols',
            201     => 'Created',
            202     => 'Accepted',
            203     => 'Non-Authoritative Information',
            204     => 'No Content',
            205     => 'Reset Content',
            206     => 'Partial Content',
            300     => 'Multiple Choices',
            301     => 'Moved Permanently',
            302     => 'Moved Temporarily',
            303     => 'See Other',
            304     => 'Not Modified',
            305     => 'Use Proxy',
            400     => 'Bad Request',
            401     => 'Unauthorized',
            402     => 'Payment Required',
            403     => 'Forbidden',
            404     => 'Not Found',
            405     => 'Method Not Allowed',
            406     => 'Not Acceptable',
            407     => 'Proxy Authentication Required',
            408     => 'Request Time-out',
            409     => 'Conflict',
            410     => 'Gone',
            411     => 'Length Required',
            412     => 'Precondition Failed',
            413     => 'Request Entity Too Large',
            414     => 'Request-URI Too Large',
            415     => 'Unsupported Media Type',
            500     => 'Internal Server Error',
            501     => 'Not Implemented',
            502     => 'Bad Gateway',
            503     => 'Service Unavailable',
            504     => 'Gateway Time-out',
            505     => 'HTTP Version not supported',
            default => 'OK',
        };

        $protocol = $_SERVER['SERVER_PROTOCOL'] ?? 'HTTP/1.0';
        header("$protocol $code $text");
    }
    /**
     * Login the user
     *
     * @param string $username_email The user username or email
     * @param string $password       The user password
     *
     * @return array|string[]
     */
    public function login(string $username_email, string $password)
    : array
    {
        global $username_email, $password, $remember;
        $logs   = ['role' => 'x', 'success' => 'x', 'error' => 'x', 'errno' => 'x'];
        $login  = $this->main->database->login($username_email, $password);
        $result = array_merge($logs, $login);
        if ($result['success'] !== 'x' && $result['success'] && $remember)
        {
            /** @noinspection PhpUndefinedFieldInspection */
            $cookie = $this->main->session->username ?? $this->main->session->user;
            $cookie .= '|';
            $cookie .= md5(md5($password));
            $cookie .= '|' . (3600 * 12 * 30);
            setcookie('remember', "$cookie", time() + (3600 * 12 * 30));
        }

        return $result;
    }
    /**
     * Register a new user
     *
     * @param string $firstName The user first name
     * @param string $lastName  The user last name
     * @param string $otherName The user other name
     * @param string $username  The user username
     * @param string $password  The user password
     * @param string $email     The user email
     *
     * @return bool|array
     */
    public function registration(string $firstName, string $lastName, string $otherName, string $username, string $password, string $email)
    : bool|array
    {
        $_registration = ['role' => 'x', 'error' => 'x', 'errno' => 'x', 'success' => 'x'];
        $registration  = $this->main->database->registration($firstName, $lastName, $otherName, $username, $password, $email);

        return array_merge($_registration, $registration);
    }
}
