<?php
/**
 * Single product template file.
 *
 * @package CiraPress
 */
?>

<?php get_header(); ?>
    <div class="wrapper pt-6">
        <div class="container">
            <div class="row">

                <!-- Product info -->
                <div class="product-info product-info col-md-5 col-lg-9 pr-md-5" fs-product-id="<?= $info['id'] ?>" fs-plan-id="<?= $plan['id'] ?>" fs-public-key="<?= FS__API_PUBLIC_KEY ?>">
                    <?php the_post_thumbnail('hero_sm', [
                        'class' => 'rounded border'
                    ]) ?>

                    <?php the_title('<h1 class="mb-4">' , '</h1>') ?>

                    <div class="post-content">
                        <?php the_content() ?>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-md-5 col-lg-3 pl-md-0 pr-md-0 ml-md-n2">
                    <div class="sidebar sticky-lg-top sticky-md-top">

                        <!-- Purchase  -->

                        <div class="sidebar-widget">
                            <div class="row">
                                <div class="col-12">
                                    <span class="sidebar-widget-title--sm">Compatible with</span>
                                    <!-- FULL COMPATIBILITY -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                
            </div>
        </div>
    </div>
<?php get_footer(); ?>
