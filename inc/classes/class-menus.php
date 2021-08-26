<?php
/*
* Register Menus theme ( bootstraps )
*
* @Package MWebsite
*/

namespace MWEBSITE_THEME\Inc;

use MWEBSITE_THEME\Inc\Traits\Singleton;

class Menus {
    use Singleton;
    protected function __construct() {
     $this->set_hooks();
    }

    protected function set_hooks() {
     // action & filter
     add_action('init',[$this,'register_menus']);     
    }

    public function register_menus() {
        register_nav_menus([
            'mwebsite-header-menu' => esc_html__('Header Menu', 'mwebsite'),
            'mwebsite-footer-menu' => esc_html__('Footer Menu', 'mwebsite')
        ]);
    }

    public function get_menu_id($location){
        // get all location
        $locations = get_nav_menu_locations();
        // get menu_id
        $menu_id = $locations[$location];
        return !empty($menu_id)?$menu_id:'';
    }

    public function get_child_menu_items($menu_array, $parent_menu_id){
        $child_menus = [];
        if(!empty($menu_array) && is_array($menu_array)){
            
        }
    }
}