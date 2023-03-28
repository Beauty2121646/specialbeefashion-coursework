<?php

namespace Asobi\Views;

use Asobi\Abstracts\PageArea;
use Asobi\Core;
class Head extends PageArea
{
    /**
     * @var \Asobi\Core
     */
    public Core $core;
    /**
     * The page constructor
     *
     * @param \Asobi\Model\Main $main The main to call whenever need be
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
        return "
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content='{$this->core->getPageDescription()}'>
    <meta name='author' content='{$this->core->getPostAuthors()}'>

    <title>{$this->core->getPageTitle()}</title>

    <link rel='canonical' href='{$this->core->getRequestUrl()}'>{$this->core->getOnlineAssets()}{$this->core->getOfflineAssets()}<!---->{$this->core->getBaseAssets()}
    <!-- Favicons -->
    <link rel='apple-touch-icon' href='/assets/images/brand/nig-flag.png' sizes='180x180'>
    <link rel='icon' href='/assets/images/brand/nig-flag.png' sizes='32x32' type='image/png'>
    <link rel='icon' href='/assets/images/brand/nig-flag.png' sizes='16x16' type='image/png'>
  </head>";
    }
}
