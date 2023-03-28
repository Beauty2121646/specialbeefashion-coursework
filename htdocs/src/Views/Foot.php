<?php

namespace Asobi\Views;

use Asobi\Abstracts\PageArea;
use Asobi\Core;
class Foot extends PageArea
{
    /**
     * @var \Asobi\Core
     */
    public Core $core;
    /**
     * The Foot constructor
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
        $contents = "";
        // * The loop for children contents
        foreach ($this->tags as $tag) $contents .= $tag->displayContent();

        return "$contents{$this->core->getOnlineScriptAssets()}{$this->core->getPageModal()}{$this->core->getOfflineScriptAssets()}<!---->{$this->core->getBaseScriptAssets()}";
    }
}
