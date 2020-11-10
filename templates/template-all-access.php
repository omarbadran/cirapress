<?php
/**
 * Template Name: All Access
 * Template Post Type: post, page
 *
 * @package CiraPress
 * @since 1.0.0
 */

$bundle_id = 7098;
$plan_id = 11731;
?>

<?php get_header(); ?>

<div class="wrapper">
    <div class="container">
        <!-- Title -->
        <div class="row justify-content-center text-center">
            <div class="col-5">
                <h1 class="display-4">All-Access Pass</h1>
                <p class="lead mb-6">Unlock instant access to all of our products and save over $3000</p>
            </div>
        </div>

        <!-- Plans -->
        <div class="row d-flex justify-content-center p-5"  fs-bundle-id="<?= $bundle_id ?>" fs-plan-id="<?= $plan_id ?>" fs-public-key="<?= FS__API_PUBLIC_KEY ?>">
            <div class="col-5">
                <div class="card bg-dark text-white px-5 p-4 mt-0 mb-4 position-relative hover-card">
                    <h2 class="font-weight-bold mb-0 text-primary">Personal</h2>
                    
                    <hr>
                    
                    <h3 class="price pt-2 h1">
                        $129 <span class="text-small text-muted">Per Year</span>
                    </h3>
                    
                    <p class="text-small">
                        Single Website
                    </p>
                    
                    <p class="text-small">
                        Joining is risk-free. Cancel your subscription within 14 days and get a full refund. No questions asked.
                    </p>
                    
                    <div class="price-btn">
                        <a class="btn btn-outline-primary purchase" data-licenses="1">Sign up</a>
                        
                        <ul class="feature-list  list-unstyled mt-4">
                            <li>
                                <i class="las la-check text-primary mr-1 mb-3"></i>
                                Access All The Plugins
                            </li>
                            <li>
                                <i class="las la-check text-primary mr-1 mb-3"></i>
                                Use for a single website
                            </li>
                            <li>
                                <i class="las la-check text-primary mr-1 mb-3"></i>
                                Standard Support
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!--end of col-->
            <div class="col-5">
                <div class="pricing-v2 card bg-dark text-white px-5 p-4 mt-0 mb-4 position-relative hover-card">
                    <h2 class="font-weight-bold mb-0 text-primary">Developer</h2>

                    <hr>

                    <h3 class="price pt-2 h1">
                        $399 <span class="text-small text-muted">Per Year</span>
                    </h3>

                    <p class="text-small">
                        For 25 Sites
                    </p>

                    <p class="text-small">
                        Joining is risk-free. Cancel your subscription within 14 days and get a full refund. No questions asked.
                    </p>

                    <div class="price-btn">
                        <a class="btn btn-primary purchase" data-licenses="25">Sign up</a>
                        
                        <ul class="feature-list  list-unstyled mt-4">
                            <li>
                                <i class="las la-check text-primary mr-1 mb-3"></i>
                                Access All The Plugins
                            </li>
                            <li>
                                <i class="las la-check text-primary mr-1 mb-3"></i>
                                Use for 25 websites
                            </li>
                            <li>
                                <i class="las la-check text-primary mr-1 mb-3"></i>
                                Priority Support
                            </li>
                            <li>
                                <i class="las la-check text-primary mr-1 mb-3"></i>
                                40% Yearly Discount
                            </li>
                            <li>
                                <i class="las la-check text-primary mr-1 mb-3"></i>
                                20% Renewal Discount
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <!-- Features -->
        <div class="row d-flex justify-content-center px-5 py-7">
            <div class="col-lg-5">
                <div class="info-box">
                    <i class="las la-hand-holding-usd h1 text-primary"></i>
                    <h3>30-day money-back guarantee</h3>
                    <p>Joining is risk-free. Cancel your subscription within 30 days and get a full refund. No questions asked.</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="info-box">
                    <i class="las la-headset h1 text-primary"></i>
                    <h3>Support team that cares</h3>
                    <p>Your opinion is important to us. Contact us. Our supporters and developers work hand in hand to help you.</p>
                </div>
            </div>
        </div>

    <!-- FAQ -->
    <div class="row d-flex justify-content-center px-5">
        <div class="col-md-10">
            <?php include get_template_directory() . '/inc/partials/faq.php'; ?>
        </div>
    </div>

    </div>
</div>

<?php get_footer(); ?>
