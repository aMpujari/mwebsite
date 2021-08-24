<?php
/**
* 404 file
* @package Mwebsite
**/
?>
<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>> 

<div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
 
            <header class="page-header">
                <h1 class="page-title"><?php _e( 'Page Not Found', 'mwebsite' ); ?></h1>
            </header>
 
            <div class="page-wrapper">
                <div class="page-content">
                    <h2><?php _e( 'This is somewhat embarrassing, isn’t it?', 'mwebsite' ); ?></h2>
                    <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'mwebsite' ); ?></p>
 
                    <?php get_search_form(); ?>
                </div><!-- .page-content -->
            </div><!-- .page-wrapper -->
 
        </div><!-- #content -->
    </div><!-- #primary -->

    <div class="footer">
<?php wp_footer(); ?>
</div>    
</body>
</html>