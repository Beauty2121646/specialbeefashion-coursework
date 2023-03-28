<?php

namespace Asobi\Model;

/**
 * Main class
 */
class Main
{
    /**
     * @var \Asobi\Model\Cookies
     */
    public Cookies $cookies;
    /**
     * @var \Asobi\Model\Database
     */
    public Database $database;
    /**
     * @var \Asobi\Model\Session
     */
    public Session $session;
    /**
     * @var \Asobi\Model\Response
     */
    public Response $response;
    /**
     * Main class constructor
     */
    public function __construct()
    {
        $this->cookies  = Cookies::getInstance($this);
        $this->database = Database::getInstance($this, 'localhost', 'root', 'dandd9', 'asobi');
        $this->response = Response::getInstance($this);
        $this->session  = new Session();
        //$result = array_merge($array1, $array2);
    }
    /**
     * Return the slug
     *
     * @return string
     * @uses \explode()
     * @uses \parse_url()
     */
    public function getPageSlug()
    : string
    {
        foreach (explode('/', parse_url(filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_FULL_SPECIAL_CHARS), PHP_URL_PATH)) as $item)
        {
            if (!empty($slug = $item)) break;
        }

        return isset($slug) && $slug ? $slug : 'home';
    }
    /**
     * The server root path
     *
     * @return string
     * @uses \str_replace()
     */
    public function getServerRoot()
    : string
    {
        return str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['SCRIPT_FILENAME']);
    }
    /**
     * Get the request url
     *
     * @return string
     * @uses \parse_url()
     */
    public function getRequestUrl()
    : string
    {
        return $this->getHostUrl() . parse_url(filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_FULL_SPECIAL_CHARS), PHP_URL_PATH);
    }
    /**
     * Return host url
     *
     * @return string
     */
    public function getHostUrl()
    : string
    {
        $scheme = isset($_SERVER['HTTPS']) && !empty($scheme = $_SERVER['HTTPS']) ? $scheme : 'http';

        return "$scheme://{$_SERVER['HTTP_HOST']}";
    }
    /**
     * Application modal
     *
     * @return string
     */
    public function getPageModal()
    : string
    {
        return '';
    }
    /**
     * Base Style
     *
     * @return string
     */
    public function getBaseAssets()
    : string
    {
        return "\n\n    <link href='/assets/css/base.css' rel='stylesheet' />";
    }
    /**
     * Base JavaScript
     *
     * @return string
     */
    public function getBaseScriptAssets()
    : string
    {
        return "\n    <script src='/assets/js/base.js'></script>";
    }
    /**
     * Build body css class
     *
     * @return string
     */
    public function generateBodyClass()
    : string
    {
        return "class='no-js registration'";
    }
    /**
     * Brand img title
     *
     * @return string
     */
    public function getBrandLogoTitle()
    : string
    {
        return 'Nigeria Asobi logo';
    }
}
