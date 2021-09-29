<?php
/*
* Regsiter sidebars
*
* @Package MWebsite
*/

namespace MWEBSITE_THEME\Inc;

use MWEBSITE_THEME\Inc\Traits\Singleton;

class Sidebars {
    use Singleton;
    protected function __construct() {
     $this->set_hooks();
    }

    protected function set_hooks() {
     // action & filter
    add_action('widgets_init',[$this,'reg_sidebars']);
    add_action('widgets_init',[$this,'reg_clock_widget']);
    }

    public function reg_sidebars(){

     register_sidebar( array (
     'name' => __('Main Sidebar', 'mwebsite'),
     'id' => 'sidebar-1',
     'description' => __('main sidebar 1 description', 'mwebsite'),
     'before_widget' => '<div id="%1$s" class="widget widget-sidebar %2$s">',
     'after_widget' => '</div>',
     'before_title' => '<h3  class="widget-title">',
     'after_title' => '</h3>'
     ));

     register_sidebar( array (
     'name' => __('Footer Sidebar', 'mwebsite'),
     'id' => 'sidebar-2',
     'description' => __('Footer sidebar 2 description', 'mwebsite'),
     'before_widget' => '<div id="%1$s" class="widget widget-footer cell column %2$s">',
     'after_widget' => '</div>',
     'before_title' => '<h3  class="widget-title">',
     'after_title' => '</h3>'
     ));


    }

    public function reg_clock_widget() {
        register_widget('MWEBSITE_THEME\Inc\Clock_Widget');
    }



}