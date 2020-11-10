<?php
    $title = get_the_title();
    $id = get_the_ID();
    $class = join(' ', get_post_class("post clearfix col-lg-4"));
    $url = esc_url(get_permalink());

    $thumb = get_the_post_thumbnail($id, 'medium', [
        'class' => "img-fluid rounded"
    ]);

    $excerpt = get_the_excerpt();

    $price = 0;

    $info = get_post_meta($id, 'product_info', true);
    $default_plan_id = $info["default_plan_id"];
    $plans = get_post_meta($id, 'product_plans', true);

    $key = array_search($default_plan_id, array_column($plans, 'id'));
    $plan = $plans[$key];

    if ( ! empty($plan['pricing']) ) {
        $pricing = array_search(1, array_column($plan['pricing'], 'licenses'));
        $pricing = $plan['pricing'][$pricing];

        $price = $pricing['annual_price'];
    }
?>

<article id='post-<?= $id ?>' class='<?= $class ?>'>
    <div class='item-card h-100 border-0'>
        <header class='item-card__image rounded'>
            <a href='<?= $url ?>'><?= $thumb ?></a>
        </header>

        <div class='card-body px-0 pt-4'>
            <div class='d-flex justify-content-between align-items-start'>
                <div class='item-title'>
                    <h3 class='h4 post-title mb-0'>
                        <a href='<?= $url ?>'><?= $title ?></a>
                    </h3>
                    
                </div>
                <div class='item-price'><span>$<?= $price ?></span></div>
            </div>
            
            <p class='mt-4 product-excerpt'><?= $excerpt ?></p>
        </div>
    </div>
</article>
