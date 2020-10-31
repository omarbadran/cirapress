<?php
/**
 * Single product template file.
 *
 * @package CiraPress
 */
    $info = get_post_meta(get_the_ID(), 'product_info', true);
    $features = get_post_meta(get_the_ID(), 'product_features', true);

    $created = explode(" ", $info['created'])[0];
    $updated = explode(" ", $info['updated'])[0];
?>

<?php get_header(); ?>
    <div class="wrapper pt-6">
        <div class="container">
            <div class="row">

                <!-- Product info -->
                <div class="product-info col pr-0">
                    <?php the_post_thumbnail('hero_sm', [
                        'class' => 'rounded border'
                    ]) ?>

                    <?php the_title('<h1 class="mt-4 mb-4">' , '</h1>') ?>

                    <?php the_content() ?>
                </div>

                <!-- Sidebar -->
                <div class="col-md-5 col-lg-4 pl-lg-6">
                    <div class="sidebar sticky-lg-top sticky-md-top">

                        <!-- Purchase  -->
                        <div class="sidebar-widget">
                            <?php the_title('<h3 class="mb-4 h4">' , '</h3>') ?>

                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-12">
                                    <div class="custom-control custom-radio mt-3 mb-2 d-flex justify-content-between align-items-center">
                                        <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio1">Single Site</label>
                                        <div class="label-price">$39</div>

                                    </div>
                                    <div class="custom-control custom-radio mt-2 mb-2 d-flex justify-content-between align-items-center">
                                        <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio2">Three Sites</label>
                                        <div class="label-price">$59</div>

                                    </div>
                                    <div class="custom-control custom-radio mt-2 mb-4 d-flex justify-content-between align-items-center">
                                        <input type="radio" checked="" id="customRadio3" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio3">25 Sites</label>
                                        <div class="label-price">$199</div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary btn-block" type="button">
                                Purchase → <span class="price"> $39</span>
                            </button>
                        </div>

                        <div class="sidebar-widget">
                            <div class="row">
                                <div class="col-12">
                                    <span class="sidebar-widget-title--sm">Compatible with</span>
                                    <!-- FULL COMPATIBILITY -->
                                    <div class="compatibility">
                                        <div class="p-0">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <svg height="22" width="22" version="1.0" viewBox="0 0 5.5555557 5.5555555" fill-rule="evenodd" class="mr-2">
                                                        <g transform="matrix(1.0755 0 0 1.0755 -3.5103 -1.6684)">
                                                            <path fill="#464342" d="m5.8465 1.9131c0.57932 0 1.1068 0.222 1.5022 0.58547-0.1938-0.0052-0.3872 0.11-0.3952 0.3738-0.0163 0.5333 0.6377 0.6469 0.2853 1.7196l-0.2915 0.8873-0.7939-2.3386c-0.0123-0.0362 0.002-0.0568 0.0465-0.0568h0.22445c0.011665 0 0.021201-0.00996 0.021201-0.022158v-0.13294c0-0.012193-0.00956-0.022657-0.021201-0.022153-0.42505 0.018587-0.8476 0.018713-1.2676 0-0.0117-0.0005-0.0212 0.01-0.0212 0.0222v0.13294c0 0.012185 0.00954 0.022158 0.021201 0.022158h0.22568c0.050201 0 0.064256 0.016728 0.076091 0.049087l0.3262 0.8921-0.4907 1.4817-0.8066-2.3758c-0.01-0.0298 0.0021-0.0471 0.0308-0.0471h0.25715c0.011661 0 0.021197-0.00996 0.021197-0.022158v-0.13294c0-0.012193-0.00957-0.022764-0.021197-0.022153-0.2698 0.014331-0.54063 0.017213-0.79291 0.019803 0.39589-0.60984 1.0828-1.0134 1.8639-1.0134l-0.0000029-0.0000062zm1.9532 1.1633c0.17065 0.31441 0.26755 0.67464 0.26755 1.0574 0 0.84005-0.46675 1.5712-1.1549 1.9486l0.6926-1.9617c0.1073-0.3036 0.2069-0.7139 0.1947-1.0443h-0.000004zm-1.2097 3.1504c-0.2325 0.0827-0.4827 0.1278-0.7435 0.1278-0.2247 0-0.4415-0.0335-0.6459-0.0955l0.68415-1.9606 0.70524 1.9284v-1e-7zm-1.6938-0.0854c-0.75101-0.35617-1.2705-1.1213-1.2705-2.0075 0-0.32852 0.071465-0.64038 0.19955-0.92096l1.071 2.9285 0.000003-0.000003zm0.95023-4.4367c1.3413 0 2.4291 1.0878 2.4291 2.4291s-1.0878 2.4291-2.4291 2.4291-2.4291-1.0878-2.4291-2.4291 1.0878-2.4291 2.4291-2.4291zm0-0.15354c1.4261 0 2.5827 1.1566 2.5827 2.5827s-1.1566 2.5827-2.5827 2.5827-2.5827-1.1566-2.5827-2.5827 1.1566-2.5827 2.5827-2.5827z"></path>
                                                        </g>
                                                    </svg> WordPress
                                                </li>
                                            </ul>
                                        </div>
                                    </div>                                    <hr>
                                    <span class="sidebar-widget-title--sm">Features</span>
                                    <ul class="list-unstyled">
                                        <?php foreach ($features as  $feature) : ?>
                                            <li>
                                                <i class="las la-check mr-2 text-success"></i><?php echo $feature['title'] ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <hr>

                                    <span class="sidebar-widget-title--sm">Compatible Browsers</span>
                                    <ul class="list-unstyled">
                                        <li><i class="las la-check mr-2 text-success"></i>Chrome</li>
                                        <li><i class="las la-check mr-2 text-success"></i>Firefox</li>
                                        <li><i class="las la-check mr-2 text-success"></i>Edge</li>
                                    </ul>
                                    <hr>

                                    <span class="sidebar-widget-title--sm">Tags</span>
                                    <div class="tags">
                                        <?php the_tags(false, false, false) ?>
                                    </div>
                                    <hr>

                                    <div class="col-12 p-0">
                                        <div class="d-flex flex-row justify-content-between">
                                            <span class="small">Created</span>
                                            <strong class="small text-dark"><?php echo $created ?></strong>
                                        </div>
                                        <div class="d-flex flex-row justify-content-between">
                                            <span class="small">Updated</span>
                                            <strong class="small text-dark"><?php echo $updated ?></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
