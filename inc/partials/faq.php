<?php
    $accordions = [
        'Can I change the domain associated to the license?' => 'Yes. Our system checks against the number of active installs, rather than the specific domain names. You can deactivate the plugin on one domain and then activate it on another domain with no issues.',
        'Do you offer refunds?' => 'We guarantee 100% satisfaction with our help & support service. However, if our plugin still doesn’t meet your needs, we’ll happily refund 100% of your money within 14 days of your purchase. No questions will be asked.0',
        'Will it work with my theme?' => 'All CiraPress plugins are tested in multiple themes. As long as your theme is well coded and compatible with the WordPress standards, it will work. If there are any issues, we’re more than happy to try and fix them; just get in touch.',
        'Will my subscription renew automatically?' => 'Yes, your subscription will renew automatically every year, unless you cancel it. If you do decide to cancel it, your licence will still be valid for the paid-for period; this means you will still receive updates and support during that time.'
    ];

    $counter = 0;
?>

<div id="faq-accordion">
    <?php foreach ($accordions as $title => $content) : ?>

        <div class="card mb-3 faq-single">
            <a href="#accordion-<?= $counter ?>" data-toggle="collapse" role="button" aria-expanded="false" class="p-4 collapsed" style="">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 mr-2 p-0"><?= $title ?></h6>
                    <i class="las la-arrow-right icon"></i>
                </div>
            </a>
            <div class="collapse" id="accordion-<?= $counter ?>" data-parent="#faq-accordion" style="">
                <div class="px-3 px-md-4 pb-3 pb-md-4">
                    <?= $content ?>
                </div>
            </div>
        </div>
    <?php $counter++; endforeach; ?>
</div>