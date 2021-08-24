<?php
/*
* initialize theme ( bootstraps )
*
* @Package MWebsite
*/

namespace MWEBSITE_THEME\Inc;

use MWEBSITE_THEME\Inc\Traits\Singleton;

class Assets {
    use Singleton;
    protected function __construct() {
     $this->set_hooks();
    }

    protected function set_hooks() {
     // action & filter
     add_action('wp_enqueue_scripts',[$this,'register_styles']); 
     add_action('wp_enqueue_scripts',[$this,'register_scripts']);      
    }

    public function register_styles()
    {
         # code...
         wp_register_style('mwebsite-style-css', get_stylesheet_uri(), [], filemtime(get_template_directory().'/style.css'),'all');
         wp_register_style('bootstrap-css', MWEBSITE_DIR_URI.'/assets/src/library/css/bootstrap.min.css', [], false,'all');

         wp_enqueue_style('mwebsite-style-css');
         wp_enqueue_style('bootstrap-css');

    }

    public function register_scripts()
    {
         # code...
         
        wp_register_script('mwebsite-main-js', MWEBSITE_DIR_URI.'/assets/main.js', [],filemtime(get_template_directory().'/assets/main.js'), true);
        wp_register_script('bootstrap-js', MWEBSITE_DIR_URI.'/assets/src/library/js/bootstrap.min.js', ['jquery'], true,'all');

        wp_enqueue_script('mwebsite-main-js');
        wp_enqueue_script('bootstrap-js');
    }

}