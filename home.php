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

<div class="wrapper">
    <div class="container">
        <!-- Intro -->
        <div class="intro poition-relative rounded mt-5">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-8">
                    <h1 class="mb-5">Quality WordPress Plugins, Trusted by thousands of users</h1>
                    <p class="lead">Find the perfect wordpress plugin to <br>bring your project to life</p>
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
        
        <!-- Latest products -->
        <div class="row mb-4 mt-5 d-flex justify-content-between align-items-center">
            <div class="col-md-8">
                <h4 class="mb-0">Latest Products</h4>
            </div>
            <div class="col-md-4"> <a href="#" class="btn btn-link float-right">Explore all <i class="las la-long-arrow-alt-right"></i> </a> </div>
        </div>

        <div class="row">
            <?php CiraPress\Products\query(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
