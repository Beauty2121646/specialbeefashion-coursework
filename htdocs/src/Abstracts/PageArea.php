<?php

namespace Asobi\Abstracts;

use Asobi\Interfaces\Tag;
/**
 * Page area tag class
 */
abstract class PageArea implements Tag
{
    /**
     * @var Tag[]
     */
    protected array $tags = [];
    /**
     * @inheritDoc
     */
    public function addContent(Tag $tag)
    : Tag
    {
        return $this->tags[] = $tag;
    }
}
