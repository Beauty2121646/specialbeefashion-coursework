<?php
$brand_title      = getBrandTitle();
$page_title       = getBrandPageTitle();
$brand_logo_title = getBrandLogoTitle();
$slug             = getPageSlug();
/**
 * Brand img title
 *
 * @return string
 */
function getBrandTitle()
: string
{
    return 'Nigeria Kids and Men Fashion';
}
/**
 * Brand img title
 *
 * @return string
 */
function getBrandLogoTitle()
: string
{
    return getBrandTitle() . ' Logo';
}
/**
 * Brand img title
 *
 * @return string
 */
function getBrandPageTitle()
: string
{
    return getBrandTitle() . ' * ' . getPageSlug();
}

/**
 * Return the slug
 *
 * @return string
 * @uses \explode()
 * @uses \empty()
 * @uses \parse_url()
 * @uses \array_pop()
 */
function getPageSlug()
: string
{
    $slugs = explode('/', parse_url(filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_FULL_SPECIAL_CHARS), PHP_URL_PATH));
    if (empty($slug = array_pop($slugs))) $slug = array_pop($slugs);

    return !empty($slug) ? $slug : 'home';
}

/**
 * Return try if user is registered and logged in
 *
 * @return bool
 * @uses \isset()
 */
function isLogin()
: bool
{
    /** $_SESSION['user']? We all like keeping options. */
    return isset($_SESSION['user']) ?? isset($_SESSION['username']) ?? FALSE;
}
/**
 * All forms activities
 */
if (isset($_REQUEST['form-action']))
{
}
