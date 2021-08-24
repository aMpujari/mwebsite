<?php
/*
* initialize theme ( bootstraps )
*
* @Package MWebsite
*/

namespace MWEBSITE_THEME\Inc;

use MWEBSITE_THEME\Inc\Traits\Singleton;

class MWEBSITE_THEME {
    use Singleton;
    protected function __construct() {
     // Load classes
     Assets::get_instance();
     $this->set_hooks();
    }

    protected function set_hooks() {
     // action & filter
    add_action('after_setup_theme', [$this, 'setup_theme']);
    }
    
    public function setup_theme () {
    add_theme_support('title-tag');
    add_theme_support( 'custom-logo', array(
    'height'               => 80,
    'width'                => 80,
    'flex-height'          => true,
    'flex-width'           => true,
    'header-text'          => ['site-title', 'site-description'],
    'unlink-homepage-logo' => true,
    ) );

     add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

    }

   




}