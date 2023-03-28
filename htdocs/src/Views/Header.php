<?php

namespace Asobi\Views;

use Asobi\Abstracts\PageArea;
use Asobi\Core;
class Header extends PageArea
{
    /**
     * @var \Asobi\Core
     */
    public Core $core;
    /**
     * The Header constructor
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
        $home         = $about = $contact = $signup = $logout = $reset = $login = $profile = $users = '';
        $home_current = $about_current = $contact_current = $reset_current = $signup_current = $logout_current = $login_current = $profile_current = $users_current = '';
        $slug         = $this->core->getPageSlug();
        $slugs        = "{$slug}_current";
        $$slug        = ' active';
        $$slugs       = " aria-current='page'";
        // * Flip menu items on login
        if ($this->core->session->isLogin())
        {
            $signup_profile = "
                  <li><a class='dropdown-item$profile'$profile_current href='/profile' data-bs-toggle='modal' data-bs-target='#asobiModal' data-tab-target='#profile-tab'><i class='fs-5 bi bi-pencil pe-1'></i>profile</a></li>";
            $login_logout   = "
                  <li><a class='dropdown-item$logout'$logout_current href='/logout'><i class='fs-5 bi bi-box-arrow-left pe-1'></i>logout</a></li>";
            $reset_item     = "
                  <li><a class='dropdown-item$reset'$reset_current href='/avatar' data-bs-toggle='modal' data-bs-target='#asobiModal' data-tab-target='#avatar-tab'><i class='fs-5 bi bi-asterisk pe-1'></i><i class='fs-5 bi bi-braces-asterisk pe-1'></i>upload ur picture as avatar</a></li>";
        } else
        {
            $signup_profile = "
                  <li><a class='dropdown-item$signup'$signup_current href='/signup' data-bs-toggle='modal' data-bs-target='#asobiModal' data-tab-target='#signup-tab'><i class='fs-5 bi bi-person-check pe-1'></i><i class='fs-5 bi bi-person-check-fill pe-1'></i>signup</a></li>";
            $login_logout   = "
                  <li><a class='dropdown-item$login'$login_current href='/login' data-bs-toggle='modal' data-bs-target='#asobiModal' data-tab-target='#login-tab'><i class='fs-5 bi bi-box-arrow-right pe-1'></i><i class='fs-5 bi bi-arrow-bar-right pe-1'></i>login</a></li>";
            $reset_item     = "
                  <li><a class='dropdown-item$reset'$reset_current href='/reset' data-bs-toggle='modal' data-bs-target='#asobiModal' data-tab-target='#recover-tab'><i class='fs-5 bi bi-asterisk pe-1'></i><i class='fs-5 bi bi-braces-asterisk pe-1'></i>forgotten password?</a></li>";
        }
        if ($profile == ' active')
        {
            $users         = ' active';
            $users_current = " aria-current='page'";
        }

        return "
    <header class='container-xxl fixed-top mb-2 pb-2'>
      <nav class='navbar navbar-expand-sm'>
        <div class='container-fluid w-75'>
          <a class='navbar-brand' href='{$this->core->getHostUrl()}'> <img class='navbar-brand-logo' src='/assets/images/brand/nig-flag.png' alt='Asobi Logo' title='{$this->core->getBrandLogoTitle()}' /></a>
          <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#asobi.sql-navbar' aria-controls='asobi.sql-navbar' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
          </button>
          <div class='collapse navbar-collapse' id='asobi.sql-navbar'>
            <ul class='navbar-nav ms-auto mb-2 mb-lg-0 me-3 text-capitalize'>
              <li class='nav-item'>
                <a class='nav-link$home'$home_current href='/'><i class='fs-4 bi bi-house-heart pe-1'></i><i class='fs-4 bi bi-house-heart-fill pe-1'></i>Home</a>
              </li>
              <li class='nav-item'>
                <a class='nav-link$about'$about_current href='/about/'><i class='fs-4 bi bi-book pe-1'></i><i class='fs-4 bi bi-book-fill pe-1'></i>about</a>
              </li>
              <li class='nav-item'><a class='nav-link$contact'$contact_current href='/contact'><i class='fs-4 bi bi-geo pe-1'></i><i class='fs-4 bi bi-geo-fill pe-1'></i>contact</a></li>
              <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle$users'$users_current href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'><i class='fs-4 bi bi-person-square pe-1'></i><i class='fs-4 bi bi-person-workspace pe-1'></i>geuss</a>
                <ul class='dropdown-menu border-top-0 rounded-top-0'>$signup_profile$login_logout
                  <li><hr class='dropdown-divider' /></li>$reset_item
                </ul>
              </li>
            </ul>
            <form class='d-flex' role='search'>
              <input class='form-control' type='search' placeholder='Search' aria-label='Search' />
              <button class='btn btn-outline-light' type='submit'>Search</button>
            </form>
          </div>
        </div>
      </nav>
    </header>";
    }
}
