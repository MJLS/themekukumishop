<?php get_header();   ?>


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
                    <div><?php the_content();?></div>
                    </article>
                <?php endwhile; ?>
            <?php else: ?>
                    <p>Nada que mostrar.</p>
            <?php endif; ?>
    </main>

<?php get_footer( ); ?>