<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cirapress
 */
?>

<?php get_header(); ?>
    <div class="container mt-5">
        <?php CiraPress\Products\query(3); ?>
    </div>
<?php get_footer(); ?>
