<?php

namespace Asobi\Model;

use mysqli;
/**
 * Core database class
 */
class Database extends mysqli
{
    /**
     * @var \Asobi\Model\Database
     */
    protected static Database $instance;
    /**
     * @var null|\Asobi\Model\Main
     */
    public Main|null $main;
    /**
     * Property getter
     */
    public function __get($name)
    {
        return $this->$name ?? '';
    }
    /**
     * Add property
     */
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    /**
     * Test for property
     */
    public function __isset($name)
    {
        return isset($this->$name);
    }
    /**
     * Do object to string
     */
    public function __toString()
    {
        $this->close();

        return __CLASS__;
    }
    /**
     * @inheritDoc
     */
    public function __construct(Main $main = NULL, $hostname = NULL, $username = NULL, $password = NULL, $database = NULL, $port = NULL, $socket = NULL)
    {
        parent::__construct($hostname, $username, $password, $database, $port, $socket);
        $this->main = $main;
        $this->set_charset('utf8mb4');
    }
    /**
     * An instance of Database class
     */
    public static function getInstance(Main $main = NULL, $hostname = NULL, $username = NULL, $password = NULL, $database = NULL, $port = NULL, $socket = NULL)
    : Database
    {
        if (!isset(self::$instance) || self::$instance == NULL) self::$instance = new Database($main, $hostname, $username, $password, $database, $port, $socket);

        return self::$instance;
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
        $role   = $this->get_query_default_role();
        $sql    = sprintf("INSERT INTO `names` (`first`, `last`, `other`) VALUES ('%s', '%s', '%s');", $this->real_escape_string($firstName), $this->real_escape_string($lastName), $this->real_escape_string($otherName));
        $result = @$this->query($sql);
        $sql    = sprintf("INSERT INTO `users` (`username`, `password`, `email`, `user_role`) VALUES ('%s', '%s', '%s', '%s');", $this->real_escape_string($username), md5($password), $this->real_escape_string($email), $role);
        $result = $result && @$this->query($sql);
        if ($result)
        {
            /** @noinspection PhpUndefinedFieldInspection */
            $this->main->session->user = $username;
            $this->main->session->login($username, $role);
        }

        return $result ? ['role' => $role] : ['error' => $this->error, 'errno' => $this->errno];
    }
    /**
     * Get the user default role
     *
     * @return string
     */
    public function get_query_default_role()
    : string
    {
        $result = @$this->query(sprintf("SELECT `user_role` FROM `users` LIMIT %d", 1));

        return intval(@$result->num_rows) < 1 ? 'Administrator' : 'users';
    }
    /**
     * Login the user
     *
     * @param string $username_email The user username or email
     * @param string $password       The user password
     *
     * @return bool|array
     * @noinspection PhpUndefinedFieldInspection
     */
    public function login(string $username_email, string $password)
    : bool|array
    {
        $escape = $this->real_escape_string($username_email);
        $result    = @$this->query("SELECT `username`, `password`, `user_role` FROM `users` WHERE `username` = '$escape' OR `email` = '$escape' LIMIT 1;");
        $row       = $result->fetch_assoc();
        $_password = $row['password'] ?? '';
        $_username = $row['username'] ?? '';
        $role      = $row['user_role'] ?? '';
        $success   = $_password === md5($password);
        if ($success)
        {
            $this->main->session->user = $_username;
            $this->main->session->login($_username, $role);
        }

        return $success ? ['role' => $role, 'success' => TRUE] : ['error' => $this->error, 'errno' => $this->errno];
    }
}
