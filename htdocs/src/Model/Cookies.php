<?php

namespace Asobi\Model;

/**
 * The class to manage cookies
 */
class Cookies
{
    /**
     * @var \Asobi\Model\Cookies
     */
    protected static Cookies $instance;
    /**
     * @var \Asobi\Model\Main
     */
    public Main $main;
    /**
     * An instance of Cookies class
     */
    public static function getInstance(Main $main)
    : Cookies
    {
        if (!isset(self::$instance) || self::$instance == NULL) self::$instance = new Cookies($main);

        return self::$instance;
    }
    /**
     * Get set cookie
     *
     * @param string $name The cookie name to get
     */
    public function __get(string $name)
    {
        return $_COOKIE[$name] ?? '';
    }
    /**
     * Set the cookie
     */
    public function __set(string $name, $value)
    : void
    {
        $arr_cookie_options = [

            'expires'  => time() + 60 * 60 * 24 * 30,
            'path'     => '/',
            'domain'   => '.example.com', // leading dot for compatibility or use subdomain
            'secure'   => TRUE,     // or false
            'httponly' => TRUE,    // or false
            'samesite' => 'None' // None || Lax  || Strict
        ];

        setcookie('TestCookie', 'The Cookie Value', $arr_cookie_options);
        // @TODO: Implement __set() method.
    }
    /**
     * Test cookie property
     */
    public function __isset(string $name)
    : bool
    {
        return isset($_COOKIE[$name]);
    }
    /**
     * Class constructor
     */
    public function __construct(Main $main)
    {
        $this->main = $main;
    }
}
