<?php
    $terms = get_terms([
        'taxonomy' => 'doc_category',
        'parent' => false
    ]);
?>

<?php get_header() ?>
    <div class="wrapper pt-6">
        <div class="container">
            <h1 class="mb-6 text-center">Documentation</h1>

            <div class="row">
                <?php foreach ($terms as $term) : ?>

                    <?php
                        $subs = get_terms([
                            'taxonomy' => 'doc_category',
                            'parent' => $term->term_id
                        ]);
                    ?>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title m-0"><?= $term->name ?></h4>
                            </div>

                            <div class="list-unstyled list-group list-group-flush">
                                <?php foreach ($subs as $sub) : ?>
                                    <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="<?= get_term_link($sub) ?>">
                                        <?= $sub->name ?>
                                        <span class="badge badge-primary badge-pill"><?= $sub->count ?></span>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>


                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php get_footer() ?>