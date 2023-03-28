<?php

namespace Asobi\Views;

use Asobi\Abstracts\PageArea;
use Asobi\Core;
class Main extends PageArea
{
    /**
     * @var \Asobi\Core
     */
    public Core $core;
    /**
     * The Modal constructor
     *
     * @param \Asobi\Core $core
     */
    public function __construct(Core $core) { $this->core = $core; }
    /**
     * Display this object class as strings
     */
    public function __toString()
    : string
    {
        return $this->displayContent();
    }
    /**
     * @inheritDoc
     */
    public function displayContent()
    : string
    {
        switch ($slug = $this->core->getPageSlug())
        {
            case 'login':
            case 'reset':
            case 'signup':
            case 'logout':
                $data = require "Data/$slug.php";

                return "
    <main class='container-sm container-md container-xl my-5 container-xxl main-$slug'>$data
    </main>";
            default:

                return "
    <main class='container-sm container-md container-xl my-5 container-xxl main-$slug'>{$this->core->database->get_client_info()}<br/>{$this->core->session}
    </main>";
        }
    }
}
