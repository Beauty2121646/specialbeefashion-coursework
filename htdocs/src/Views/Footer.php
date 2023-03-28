<?php

namespace Asobi\Views;

use Asobi\Abstracts\PageArea;
use Asobi\Core;
class Footer extends PageArea
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
        $home  = $about = $contact = '';
        $slug  = $this->core->getPageSlug();
        $$slug = ' active';

        return "
    <footer class='py-3 my-4'>
      <div class='container'>
        <ul class='nav justify-content-center border-bottom pb-3 mb-3 text-capitalize'>
          <li class='nav-item'><a class='nav-link text-body-secondary$home' aria-current='page' href='/'><i class='fs-4 bi bi-house-heart'></i><i class='fs-4 bi bi-house-heart-fill'></i>Home</a></li>
          <li class='nav-item'><a class='nav-link text-body-secondary$about' href='/about/'><i class='fs-4 bi bi-book'></i><i class='fs-4 bi bi-book-fill'></i>about</a></li>
          <li class='nav-item'><a class='nav-link text-body-secondary$contact' href='/contact'><i class='fs-4 bi bi-geo'></i><i class='fs-4 bi bi-geo-fill'></i>contact</a></li>
        </ul>
        <p class='text-center text-body-secondary'>&copy; 2023 BEAUTY EYEWUMI IRIRI</p>
      </div>
    </footer>";
    }
}
