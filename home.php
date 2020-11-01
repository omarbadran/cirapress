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
 * @package CiraPress
 */
?>

<?php get_header(); ?>

<div class="wrapper pt-6">
    <div class="container">
        <!-- Intro -->
        <div class="intro poition-relative">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-8">
                    <h1 class="display-4">Quality WordPress Plugins, Trusted by thousands of users</h1>
                    <p class="lead">Find the perfect wordpress plugin to <br>
                        bring your project to life</p>
                    <div class="row">
                        <div class="col-md-7">
                            <?php get_search_form() ?>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 d-none d-sm-block">
                    <img class="card-img-top opacity-8" src="<?php echo get_template_directory_uri() ?>/dist/images/theme-illustration.png" alt="image">
                </div>
            </div>
        </div>
        
    </div>
</div>

<?php get_footer(); ?>
