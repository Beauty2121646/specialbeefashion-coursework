<?php

namespace Asobi\Views;

use Asobi\Abstracts\PageArea;
use Asobi\Core;
/**
 * The page body class
 */
class Body extends PageArea
{
    /**
     * @var \Asobi\Core
     */
    public Core $core;
    /**
     * @inheritDoc
     */
    public function displayContent()
    : string
    {
        $contents = "
  <body {$this->core->generateBodyClass()}>";
        // * The loop for children contents
        foreach ($this->tags as $tag)
        {
            $contents .= $tag->displayContent();
        }

        return "$contents
  </body>
  ";
    }
    /**
     * Display this object class as strings
     */
    public function __toString()
    : string
    {
        return $this->displayContent();
    }
    /**
     * The Foot constructor
     *
     * @param \Asobi\Core $core
     */
    public function __construct(Core $core) { $this->core = $core; }
}
