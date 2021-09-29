<?php
/*
* no-content found template
*  @package MWEBSITE
*/
?>

<section class="no-result not-found">
<header class="page-header">
<h1 class="page-title"><?php esc_html_e('Nothing Found!','mwebsite'); ?>
</header>

<div class="content">
<?php
if(is_home() && current_user_can("publish_posts")){
?>
<p>
<?php
printf(
wp_kses(
__('Ready to publish your first post <a href="%s">Get started here</a>', 'mwebiste'),
[
 'a'=> [
     'href'=>[]
 ]   
]
),
esc_url(admin_url('post-new.php'))
);
?>
</p>
<?php
} else {
?>
<p><?php esc_html_e('Sorry nothing to display!','mwebsite'); ?></p>
<?php 
get_search_form();   
}
?>
</div>
</section>