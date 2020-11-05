<?php
/**
 * Template Name: Full Width Template
 * Template Post Type: post, page
 *
 * @package CiraPress
 * @since 1.0.0
 */
?>

<?php get_header(); ?>
    <?php
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                ?>
                    <div class='template-full-width'>
                        <?php the_content(); ?>
                    </div>
                <?php
            }
        }
    ?>
<?php get_footer(); ?>
