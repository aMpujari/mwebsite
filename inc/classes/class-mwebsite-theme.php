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
     Menus::get_instance();
     Meta_Boxes::get_instance();
     Sidebars::get_instance();

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

    $customBackgroundArgs = array(
        'default-color' => '#fff',
        'default-image' => '',
        'default-repeat'=> 'no-repeat'
    );
    add_theme_support( 'custom-background', $customBackgroundArgs );


    add_theme_support('post-thumbnails');

    add_theme_support('automatic-feed-links');

    add_theme_support('html5', [ 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ] );

    add_editor_style(); // ??

    add_theme_support('align-wide');

    /*
    * register image size 
    */
    add_image_size('featured-thumbnail', 350, 233, true);

    global $content_width;
    if(!isset($content_width)) {
    $content_width = 1240;    
    }

    }

   




}