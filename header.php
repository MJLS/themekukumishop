<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kukumi Shop
*/
?>

<!DOCTYPE html>
<html <?php language_attributes( );?> >
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php wp_head(); ?>

</head>
<body <?php body_class( ) ?> >

   
        <!-- header -->
        <header id="header" class="my-2 sticky-top p-0 d-flex justify-content-center">
            <nav class="navbar navbar-expand-lg container-fluid p-0 m-auto d-flex justify-content-center">
                <div class="container-xl mx-3 my-2 p-0 d-flex justify-content-between">
                    <!-- brand -->
                    <div id="brand" class="order-lg-0 order-1">
                        <!-- <img class="brand__logo" src="../asset/img/logo_simple_para_fondo_blanco.png" alt="logo kukumi"> -->
                        <!-- NOTE: Customizer logo -->
                        <?php //the_custom_logo(); ?>
                        
								<?php if( has_custom_logo() ): ?>
									<?php the_custom_logo(); ?> 
                                    <span> 
                                        <?php /*
                                        NOTE: Deshabilitamos por defecto título de sitio que acompañe a logo 
                                        Por defecto solo cuando no haya logo  
                                        bloginfo( 'title' ); */ 
                                        ?>  
                                      </span>
								<?php else: ?>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
									   <span> <?php bloginfo( 'title' ); ?> </span> 
                                    </a>
                                <?php endif; ?>
							

                    </div>
                    <!-- menu toggler -->
                    <button 
                        class="navbar-toggler align-items-end order-0" 
                        data-bs-toggle="offcanvas" 
                        data-bs-target="#navmenu" 
                        aria-controls="navmenu" 
                        type="button" 
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" 
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false" 
                        aria-label="Toggle navigation">

                        <svg xmlns="http://www.w3.org/2000/svg" height="2rem" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>

                        </button>      

                        <!-- Menu ppal -->
                        <?php
                                wp_nav_menu( 
                                    array(
                                        'theme_location' => 'kukumishop_main_menu',
                                        'container_class' => 'collapse navbar-collapse justify-content-center',
                                        'menu_class' => 'navbar-nav  mb-2 mb-lg-0 mt-2 mt-lg-0 w-50 justify-content-around',
                                        )
                                    );
                        ?>



                    <!-- user menu -->
                    <div id="usermenu " class="row order-lg-1 order-2">
                        <svg class="col-6" xmlns="http://www.w3.org/2000/svg" fill="none" height="24"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>
                        <a class="col-6" href="#" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" height="24" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                        </a>
                        <!-- <svg class="col-4 p-0" xmlns="http://www.w3.org/2000/svg" fill="none" height="24"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg> -->

                    </div>

                </div>
            </nav>
        </header>

         <!-- offcanvas menu -->
    <div class="offcanvas offcanvas-start" 
         data-bs-scroll="true" 
         tabindex="-1" 
         id="navmenu"
        aria-labelledby="offcanvasWithBothOptionsLabel">

        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">MENU</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav  mb-2 mb-lg-0 mt-2 mt-lg-0 w-50 justify-content-around">
                <li class="nav-item menu__item">
                    <a class="nav-link  px-0 py-0 active" aria-current="page" href="index.html">Inicio</a>
                </li>
                <li class="nav-item menu__item">
                    <a class="nav-link px-0 py-0 " href="tienda.html">Tienda</a>
                </li>
                <li class="nav-item menu__item">
                    <a class="nav-link px-0 py-0 " href="#">Stories</a>
                </li>
                <li class="nav-item menu__item">
                    <a class="nav-link px-0 py-0 " href="#">Contacto</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- offcanvas carrito -->
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
        aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Carrito</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <p>Try scrolling the rest of the page to see this option in action.</p>
        </div>
    </div>