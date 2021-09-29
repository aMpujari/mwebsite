<?php
/** 
* Theme package
* @package Mwebsite
**/

if(!defined('MWEBSITE_DIR_PATH')){
 define('MWEBSITE_DIR_PATH', untrailingslashit(get_template_directory()));   
}

if (!defined( 'MWEBSITE_DIR_URI')) {
	define( 'MWEBSITE_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

require_once MWEBSITE_DIR_PATH . '/inc/helpers/autoloader.php';
require_once MWEBSITE_DIR_PATH . '/inc/helpers/template-tags.php';

function mwebsite_theme_instance() {
\MWEBSITE_THEME\Inc\MWEBSITE_THEME::get_instance();
}

mwebsite_theme_instance(); 

function wpdoc_add_custom_body_open_code() {
echo '<!-- Google Tag Manager (noscript) --><noscript><iframe src="#" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><!-- End Google Tag Manager (noscript) -->';
}

// Add Google Tag code which is supposed to be placed after opening body tag.
add_action( 'wp_body_open', 'wpdoc_add_custom_body_open_code' );


function mwebsite_post_formats(){
	add_theme_support('post-formats',array('aside','gallery'));
}

add_action('after_setup_theme','mwebsite_post_formats');