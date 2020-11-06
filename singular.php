<?php get_header(); ?>
    <div class="wrapper pt-6">
        <div class="container">
            <div class="row d-flex justify-content-center">

                <div class="col-md-8">
                    <?php the_post_thumbnail('hero_sm', [
                        'class' => 'rounded border'
                    ]) ?>

                    <?php the_title('<h1 class="display-4 mt-5 mb-5">' , '</h1>') ?>

                    <div class="post-content">
                        <?php the_content() ?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
<?php get_footer(); ?>
