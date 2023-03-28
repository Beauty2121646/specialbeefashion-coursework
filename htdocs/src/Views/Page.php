<?php

namespace Asobi\Views;

use Asobi\Abstracts\PageArea;
use Asobi\Model\Main;
/**
 * The application page
 */
class Page extends PageArea
{
    /**
     * @var \Asobi\Model\Main
     */
    public Main $main;
    /**
     * @inheritDoc
     */
    public function displayContent()
    : string
    {
        $contents = '';
        // * The loop for children contents
        foreach ($this->tags as $tag)
        {
            $contents .= $tag->displayContent();
        }

        return $contents;
    }
    /**
     * Display this object class as strings
     */
    public function __toString()
    : string
    {
        return "<!doctype html>
<html class='no-js' lang='en-gb'>{$this->displayContent()}</html>";
    }
    /**
     * The page constructor
     *
     * @param \Asobi\Model\Main $main The main to call whenever need be
     */
    public function __construct(Main $main) { $this->main = $main; }
}
