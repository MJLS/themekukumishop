<?php

/**
 * Kukumi shop functions and definitions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kukumi shop
 */

/* 1 - Carga de archivos necesarios */
/* 1.1 - CSS y JS */

add_action('wp_enqueue_scripts', 'kukumishop_scripts');
function  kukumishop_scripts()
{

    /* Boostrap 5.3 JS */
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/inc/bootstrap53/bootstrap.min.js', array('jquery'), '5.3.2', true);

    /* Boostrap 5.3 */
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/inc/bootstrap53/bootstrap.min.css', array(), '5.3.2', 'all');

    /* Flickyti 2.3 JS */
    wp_enqueue_script('flickyti-js', get_template_directory_uri() . '/inc/flickyti23/flickyti.min.js', array('jquery'), '2.3', true);

    /* Flickyti 2.3 */
    wp_enqueue_style('flickyti-css', get_template_directory_uri() . '/inc/flickyti23/flickyti.min.css', array(), '2.3', 'all');

    /* Style.css */
    wp_enqueue_style('kukumishop-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'), 'all');
}

/* 2 - Config Theme */

add_action('after_setup_theme', 'kukumishop_theme_config', 0);
function kukumishop_theme_config()
{
    /* Registro lógico de menu */
    register_nav_menus(
        array(
            'kukumishop_main_menu' => 'Kukumi Shop main', /* slug */
            'kukumishop_mv_menu' => 'Kukumi Shop movil device', /* slug */
            'kukumishop_footer_menu' => 'Kukumi Shop footer', /* slug */
        )
    );

    /* Soporte para woocommerce */

    /*NOTE: Vamos a declarar la base predeterminada que tendrá nuestra tienda */
    add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 300,
        'single_image_width'    => 300,
        'product_grid'             => array(
            'default_rows'    => 1,
            'min_rows'        => 8,
            'max_rows'        => 8,
            /* NOTE:Establecemos a 1 para que el usuario no pueda modificarlo en customizer pues vamos a definirlo nosotros */
            'default_columns' => 1,
            'min_columns'     => 1,
            'max_columns'     => 1,
        )
    ));

    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');


    /* NOTE:Añadimos soporte para logo corporativo */
    add_theme_support('custom-logo', array(
        'height'        => 116,
        'width'         => 68,
        'flex-height'   => true,
        'flex-width'   => true
    ));

    if (!isset($content_width)) {
        $content_width = 600;
    }
}

/* 3 - Widgets área */
/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 */

add_action('widgets_init', 'kukumishop_sidebar');
function kukumishop_sidebar() {

    register_sidebar(array(
        'name'          => 'Kukumi Shop Sidebar',
        'id'            => 'kukumishop-sidebar-1',
        'description'   => 'Drag and drop your widgets here',
        'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}


/* Filtros */

/* 1 - Filtro para añadir la clase 'nav-item menu__item' a todas las etiquetas li del menu principal */

add_filter('nav_menu_css_class', 'kukumishop_agregar_clases_css_menu', 10, 3);
function kukumishop_agregar_clases_css_menu($classes, $item, $args)
{

    if ($args->theme_location === 'kukumishop_main_menu') {
        $classes[] = 'nav-item menu__item';
    }
    if ($args->theme_location === 'kukumishop_mv_menu') {
        $classes[] = 'mvmenu__item';
    }

    return $classes;
}

/* 2 - Filtro añade funcionalidad ajax para actualizar contador de carrito */
/**
 * Show cart contents / total Ajax
 */
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment($fragments) {
    global $woocommerce;

    ob_start();

?>
    <a class="usermenu__cartcount" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?> – <?php echo $woocommerce->cart->get_cart_total(); ?></a>
<?php
    $fragments['usermenu__cartcount'] = ob_get_clean();
    return $fragments;
}



/* Woocommerce */

/* 1 - archive-product.php */
/* 1.2 - Elementos iniciales archive-product.php */


//NOTE: Eliminamos el título de la página
add_filter('woocommerce_show_page_title', 'kukumishop_elimina_titulo_pagina');
function kukumishop_elimina_titulo_pagina()
{
    return false;
}
//NOTE: Ordenación del catálogo
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
//NOTE: Resultados númericos búsqueda/paginación.
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
//NOTE: Eliminamos los breadcrumb
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
//NOTE: Eliminamos sidebar
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
//NOTE: Eliminamos add to cart
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');

/* 1.3 - Creamos el contendor de los productos */
/* Contenedor para la vista archive-product.php */

add_action('woocommerce_before_main_content', 'kukumishop_open_container_shop', 5);
function kukumishop_open_container_shop()
{
    remove_action('woocommerce_breadcrumb', 20);
    echo '<div class="container-xl shop-content"> 
            <div class="row">';
}

add_action('woocommerce_before_main_content', 'kukumishop_add_shop_tags', 9);
function kukumishop_add_shop_tags()
{
    echo '<div class="col">';
}
add_action('woocommerce_after_main_content', 'kukumishop_close_shop_tags', 4);
function kukumishop_close_shop_tags()
{
    echo '</div>';
}

/* cerramos el contenedor container-xl y row */
add_action('woocommerce_after_main_content', 'kukumishop_close_container_shop', 5);
function kukumishop_close_container_shop()
{
    echo '</div> </div>';
}
