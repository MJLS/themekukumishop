<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kukumi Shop
 */
?>


<footer>
    FOOTER CON MENU
    <?php
        wp_nav_menu (
            array (
                'theme_location' => 'kukumishop_footer_menu'
            )
        );
    ?>
</footer>


<?php wp_footer(); ?> 

</body>
</html>