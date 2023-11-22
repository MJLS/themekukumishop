<?php
/**
 * Kukumi shop functions and definitions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kukumi shop
 */

function  kukumishop_scripts() {

    /* Boostrap 5.3 JS */
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/inc/bootstrap53/bootstrap.min.js', array( 'jquery' ), '5.3.2', true);
    
    /* Boostrap 5.3 */
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/inc/bootstrap53/bootstrap.min.css',array(), '5.3.2', 'all');
    
    /* Style.css */
    wp_enqueue_style( 'kukumishop-style' , get_stylesheet_uri(), array() , filemtime ( get_template_directory() . '/style.css' ) , 'all' );

}

add_action( 'wp_enqueue_scripts', 'kukumishop_scripts' );

function kukumishop_config(){
    /* Registro lógico de menu */
    register_nav_menus( 
        array(
            'kukumishop_main_menu' => 'Kukumi Shop Main Menu', /* slug */
            'kukumishop_footer_menu' => 'Kukumi Shop Footer Menu', /* slug */
        )
     );
}
add_filter('nav_menu_css_class', 'mi_agregar_clases_css_menu', 10, 2);

function mi_agregar_clases_css_menu($classes, $item) {
  // Añadimos la clase 'menu-item' a todas las etiquetas li
  $classes[] = 'nav-item menu__item';

  return $classes;
}

add_action( 'after_setup_theme', 'kukumishop_config', 0 );



