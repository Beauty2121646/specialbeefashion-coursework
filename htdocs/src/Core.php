<?php

namespace Asobi;

use Asobi\Views\Body;
use Asobi\Views\Foot;
use Asobi\Views\Footer;
use Asobi\Views\Head;
use Asobi\Views\Header;
use Asobi\Views\Main;
use Asobi\Views\Modal;
use Asobi\Views\Page;
/**
 * Application core class
 */
class Core extends Model\Main
{
    /**
     * @var \Asobi\Core
     */
    public static Core $instance;
    /**
     * @var \Asobi\Views\Page
     */
    public Page $page;
    /**
     * @inheritDoc
     */
    public function __construct()
    {
        parent::__construct();
        $this->page = new Page($this);
        $body       = new Body($this);
        $foot       = new Foot($this);
        // * Add the rest of the page contents
        $this->page->addContent(new Head($this));
        $this->page->addContent($body);
        $body->addContent(new Header($this));
        $body->addContent(new Main($this));
        $body->addContent(new Footer($this));
        $body->addContent($foot);
        $foot->addContent(new Modal($this));
    }
    /**
     * An instance of Core class
     */
    public static function getInstance()
    : Core
    {
        if (!isset(self::$instance) || self::$instance == NULL) self::$instance = new Core();

        return self::$instance;
    }
    /**
     * Render asobi.sql
     *
     * @return void
     */
    public function renderAsobi()
    : void
    {
        $this->session->write_close();
        echo $this->page;
    }
    /**
     * Get the page description meta value
     *
     * @return string
     * @todo generate page description
     */
    public function getPageDescription()
    : string
    {
        return 'Nigeria Asobi&apos;s * ' . match ($page = $this->getPageSlug())
            {
                'profile', 'forgotten'  => 'login',
                'login', 'registration' => 'profile',
                default                 => "$page page for the latest asobi.sql"
            };
    }
    /**
     * List of page authors
     *
     * @return string
     */
    public function getPostAuthors()
    : string
    {
        return 'Mrs. Mercy';
    }
    /**
     * Returns page title
     *
     * @return string
     */
    public function getPageTitle()
    : string
    {
        return "Nigeria Asobi&apos;s * {$this->getPageSlug()} &";
    }
    /**
     * Returns Boostrap assets
     *
     * @return string
     */
    public function getOnlineAssets()
    : string
    {
        return ''; "

    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous' rel='stylesheet' />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css' />";
    }
    /**
     * Return local assets
     *
     * @return string
     */
    public function getOfflineAssets()
    : string
    {
        return "

    <link href='/assets/css/bootstrap/bootstrap.min.css' rel='stylesheet' />
    <link href='/assets/css/bootstrap/bootstrap-icons.css' rel='stylesheet' />";
    }
    /**
     * Return online script assets
     *
     * @return string
     */
    public function getOnlineScriptAssets()
    : string
    {
        return ''; "

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js'></script>
    <script
        src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN'
        crossorigin='anonymous'
    ></script>";
    }
    /**
     * Return local script assets
     *
     * @return string
     */
    public function getOfflineScriptAssets()
    : string
    {
        return "
    <script src='/assets/js/bootstrap/bootstrap.bundle.min.js'></script>
    <script src='/assets/js/jquery/jquery.min.js'></script>";
    }
}
