<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package Kukumi shop
 */
?>

<?php if ( is_active_sidebar( 'kukumishop-sidebar-1' )  ) : ?>  
        <?php dynamic_sidebar( 'kukumishop-sidebar-1' ); ?>
<?php endif;
