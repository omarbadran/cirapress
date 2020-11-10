<?php
/**
 * Template Name: Home
 * Template Post Type: post, page
 *
 * @package CiraPress
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<div class="wrapper">

    <!-- Intro -->
    <section>
        <div class="container">
            <div class="intro poition-relative">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-md-8">
                        <h1 class="mb-5">Quality WordPress Plugins<br> Carefully Crafted & Personally Supported</h1>
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
        </div>
    </section>

    <!-- Latest products -->
    <section class="section">
        <div class="container">
            <div class="row mb-4 d-flex justify-content-between align-items-center">
                <div class="col-md-8">
                    <h4 class="mb-0">Latest Products</h4>
                </div>
                <div class="col-md-4"> <a href="#" class="btn btn-link float-right">Explore all <i class="las la-long-arrow-alt-right"></i> </a> </div>
            </div>

            <div class="row">
                <?php
                        query_posts([
                            'post_type' => 'product'
                        ]);

                        if ( have_posts() ) {
                            while ( have_posts() ) {
                                the_post();


                                include get_template_directory() . '/inc/partials/product/list/single.php';
                            }

                            the_posts_pagination();
                        }
                    
                        wp_reset_query();
                    ?>
            </div>
        </div>
    </section>

    <!-- Customer Review -->
    <section class="section">
        <div class="container">
            <div class="customer-review-section p-4">
                <div class="row justify-content-around align-items-center flex-md-row-reverse">
                    <div class="col-md col-lg-6 space-2-bottom p-0">
                        <div class="d-flex mb-4"> <i class="icon_star_alt text-warning mr-1"></i>
                            <i class="las la-star text-success mr-1"></i>
                            <i class="las la-star text-success mr-1"></i>
                            <i class="las la-star text-success mr-1"></i>
                            <i class="las la-star text-success mr-1"></i>
                        </div>
                        <!-- end: Rating icons -->
                        <span class="h2 d-block">“Their skill and expertise in digital design and development is self evident. A true partnership that's taken our digital business to the next level..”</span>
                        <footer class="step-up h5">
                            <span class="text-primary">Gavin Feilding – Digital Manager, dusk Australia</span>
                        </footer>
                    </div>
                    <div class="col-4 mt-md-4 mt-lg-0">
                        <div class="image-wrap">
                            <img class="d-none d-md-block img-fluid postion-relative mr-auto" src="<?php echo get_template_directory_uri() ?>/dist/images/08.png" alt="Image">
                        </div>
                        <!-- end:Image wrap -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="info-box p-4">
                        <h6 class="text-primary">Get paid for your work</h6>
                        <h3>
                            Sell your work to a global community of art lovers
                        </h3>
                        <p class="lead">Create your MarketSpot account and start selling your your work today.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info-box p-4">
                        <h6 class="text-primary">Customers</h6>
                        <h3>
                            UI assets for startup owners &amp; busy designers
                        </h3>
                        <p class="lead">Find the perfect creative asset to
                            bring your project to life.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info-box p-4">
                        <h6 class="text-primary">Partnership</h6>
                        <h3>
                            Earn up to 75% selling your work with us !
                        </h3>
                        <p class="lead">We pay commissions to our partners for over 7 years already.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>

<?php get_footer(); ?>
