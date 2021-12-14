<?php get_header(); ?>
<?php

?>
<?php while($wp_query->have_posts()) : ?>
                    <?php $wp_query->the_post(); ?>
                    <?php
                        include(get_field('link'));
                    ?>
                    
<?php endwhile; ?>
<?php get_footer(); ?>
