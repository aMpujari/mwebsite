<?php
/**
* Header Navigation template.
*
* @package Aqua
*/
$menu_class = \MWEBSITE_THEME\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id('mwebsite-header-menu');
$header_menus = wp_get_nav_menu_items($header_menu_id);
// echo "<pre>";
// print_r($header_menus);
// wp_die();


?>
<nav class="navbar navbar-default">
<div class="container">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>

<?php
if(function_exists('the_custom_logo')){
the_custom_logo();
}
else {
echo `<a class="navbar-brand" href="#">Brand</a>`;  
}
?>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<!-- start:here wp menu comes -->
<?php
if(!empty($header_menus) && is_array($header_menus)){
?>
<ul class="nav navbar-nav">
<?php
foreach($header_menus as $menu_item){
if(! $menu_item->menu_item_parent ){
$child_menu_items = $menu_class->get_child_menu_items($header_menus, $menu_item->ID);   
$has_children = ! empty($child_menu_items) && is_array($child_menu_items);
if(!$has_children){
?>
<li class="nav-item"><a href="<?php  echo esc_url($menu_item->url); ?>"><?php echo esc_html($menu_item->title); ?></a></li>
<?php
} else {
?>
<li class="nav-item dropdown">
<a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="<?php  echo esc_url($menu_item->url); ?>" ><?php echo esc_html($menu_item->title); ?> <span class="caret"></span></a>
<ul class="dropdown-menu">
<?php
foreach($child_menu_items as $child_menu)
{
?>
<li><a href="<?php  echo esc_url($child_menu->url); ?>"><?php echo esc_html($child_menu->title); ?></a></li>
<?php
}
?>
</ul>
</li>
<?php
}
}
}
?> 
</ul>
<?php
}
?>
<!-- ends:here wp menu ends -->
<form class="navbar-form navbar-left">
<div class="form-group">
<input type="text" class="form-control" placeholder="Search">
</div>
<button type="submit" class="btn btn-default">Submit</button>
</form>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>

<!--
<ul class="nav navbar-nav">
<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
<li><a href="#">Link</a></li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="#">Action</a></li>
</ul>
</li>
</ul>
-->    


<?php
/*
// print all menu on page
wp_nav_menu([
'theme_location' => 'mwebsite-header-menu',
'container_class' => 'my_extra_menu_class'
]);
*/
?>