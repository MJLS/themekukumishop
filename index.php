<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kukumi shop
 */
 get_header();   ?>


    <main class="container-xl">
        <!-- the loop -->
        <?php
            // Si hay algún post
            if( have_posts() ):
                // Carga el loop de post
                while ( have_posts() ): the_post();
                ?>
                    <article>
                    <h2><?php the_title();?></h2>
                    <div><?php /* the_content(); */ echo 'solo se muestra el título para no hacerlo largo'; ?></div>
                    </article>
                <?php endwhile; ?>
            <?php else: ?>
                    <p>Nada que mostrar.</p>
            <?php endif; ?>
    </main>

<?php get_footer( ); ?>