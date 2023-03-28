<?php

namespace Asobi\Model;

/**
 * The core session class
 */
class Session
{
    /**
     * Get the session value
     *
     * @param string $name The session value
     *
     * @return mixed
     */
    public function __get(string $name)
    {
        return $_SESSION[$name];
    }
    /**
     * Add a session element
     *
     * @param string $name  The value name
     * @param mixed  $value The value
     *
     * @return void
     */
    public function __set(string $name, mixed $value)
    : void
    {
        $_SESSION[$name] = $value;
    }
    /**
     * Test for session property
     *
     * @param string $name The property name
     *
     * @return bool
     * @uses \isset()
     */
    public function __isset(string $name)
    : bool
    {
        return isset($_SESSION[$name]);
    }
    /**
     * Delete a session property
     *
     * @param string $name The property name
     *
     * @return void
     * @uses \unset()
     */
    public function __unset(string $name)
    : void
    {
        unset($_SESSION[$name]);
    }
    /**
     * The class constructor
     */
    public function __construct() { if (!session_id()) @session_start(); }
    /**
     * Return try if user is registered and logged in
     *
     * @return bool
     */
    public function isLogin()
    : bool
    {
        /** $this->user? We all like keeping options. */
        return isset($this->user) ?? isset($this->username) ?? FALSE;
    }
    /**
     * For using Ajax we session_write_close();
     *
     * @return void
     * @uses session_write_close();
     */
    public function write_close()
    : void
    {
        session_write_close();
    }
    /**
     * The session can handle itself
     */
    public function __toString()
    : string
    {
        return __CLASS__; // * For debugging only: "<pre>" . (print_r($_SESSION, 1)) . "</pre>";
    }
    /**
     * Logout the user
     *
     * @return void
     */
    public function logout()
    : void
    {
        $_SESSION = [];
        unset($_SESSION);
        session_unset();
        session_destroy();
    }
    /**
     * Login the user
     *
     * @param string $username The user login ID
     * @param string $role     The user role
     *
     * @return void
     */
    public function login(string $username, string $role)
    : void
    {
        $_SESSION['username'] = $username;
        $_SESSION['role']     = $role;
    }
}
