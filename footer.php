<?php
/**
* footer file
* @package Mwebsite
**/
?>
<footer>
<h3>FOOTER</h3>
<?php
if(is_active_sidebar('sidebar-2')){
    ?>
<aside>
<?php dynamic_sidebar('sidebar-2'); ?>
</aside>
    <?php
}
?>
</footer>
<div class="footer">
<?php wp_footer(); ?>
</div>    
</body>
</html>