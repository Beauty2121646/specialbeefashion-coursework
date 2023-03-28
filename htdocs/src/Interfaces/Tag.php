<?php

namespace Asobi\Interfaces;

/**
 * Interfaced HTML Tags
 */
interface Tag
{
    /**
     * Method to add Tag contend
     *
     * @param \Asobi\Interfaces\Tag $tag The child tag to add
     *
     * @return Tag
     */
    public function addContent(Tag $tag)
    : Tag;
    /**
     * Return the content of this tag
     *
     * @return string
     */
    public function displayContent()
    : string;
}
