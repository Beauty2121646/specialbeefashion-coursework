<?php

namespace Asobi\Views;

use Asobi\Abstracts\PageArea;
use Asobi\Core;
/**
 * Core modal class
 */
class Modal extends PageArea
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
        $login             = $this->core->session->isLogin();
        $login_tab         = $signup_tab = $profile_tab = $recover_tab = '';
        $login_tab_content = $signup_tab_content = $profile_tab_content = $recover_tab_content = '';
        // * Hide tabs and contents when logged in
        if (!$login)
        {
            $login_tab          = "
                  <li class='nav-item' role='presentation'>
                    <button class='nav-link active' id='login-tab' data-bs-toggle='tab' data-bs-target='#login-tab-pane' type='button' role='tab' aria-controls='login-tab-pane' aria-selected='true'>login</button>
                  </li>";
            $login_content_data = require 'data/login.php';
            $login_tab_content  = "
                  <div class='tab-pane fade show active show active' id='login-tab-pane' role='tabpanel' aria-labelledby='login-tab' tabindex='0'>$login_content_data</div>";
            $signup_tab         = "
                  <li class='nav-item' role='presentation'>
                    <button class='nav-link' id='signup-tab' data-bs-toggle='tab' data-bs-target='#signup-tab-pane' type='button' role='tab' aria-controls='signup-tab-pane' aria-selected='false'>signup</button>
                  </li>";
            $signup_content_data = require 'data/signup.php';
            $signup_tab_content = "
                  <div class='tab-pane fade' id='signup-tab-pane' role='tabpanel' aria-labelledby='signup-tab' tabindex='0'>$signup_content_data</div>";
            $recover_tab         = "
                  <li class='nav-item' role='presentation'>
                    <button class='nav-link' id='recover-tab' data-bs-toggle='tab' data-bs-target='#recover-tab-pane' type='button' role='tab' aria-controls='recover-tab-pane' aria-selected='false'>forgotten password</button>
                  </li>";
            $recover_content_data = require 'data/reset.php';
            $recover_tab_content = "
                  <div class='tab-pane fade' id='recover-tab-pane' role='tabpanel' aria-labelledby='recover-tab' tabindex='0'>$recover_content_data</div>";
        } else
        {
            $profile_tab = "
                  <li class='nav-item' role='presentation'>
                    <button class='nav-link' id='profile-tab' data-bs-toggle='tab' data-bs-target='#profile-tab-pane' type='button' role='tab' aria-controls='profile-tab-pane' aria-selected='false'>Profile</button>
                  </li>";
            $profile_tab_content = "
                  <div class='tab-pane fade' id='profile-tab-pane' role='tabpanel' aria-labelledby='profile-tab' tabindex='0'>...profile-tab-pane</div>";
        }

        return "
    <!-- Modal -->
    <div class='modal fade' id='asobiModal' aria-modal='false' tabindex='-1' aria-labelledby='asobiModalLabel' data-bs-backdrop='static' aria-hidden='true'>
      <div class='modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h1 class='modal-title fs-5' id='asobiModalLabel'>Modal title</h1>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
          </div>
          <div class='modal-body'>
            <div class='card'>
              <div class='card-header pb-0'>
                <ul class='nav nav-tabs border-bottom-0' id='asobiTab' role='tablist'>$login_tab$signup_tab$profile_tab$recover_tab
                </ul>
              </div>
              <div class='card-body'>
                <div class='tab-content' id='asobiTabContent'>$login_tab_content$signup_tab_content$profile_tab_content$recover_tab_content
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>";
    }
}
