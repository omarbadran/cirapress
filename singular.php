<?php get_header(); ?>
    <div class="wrapper">
        <div class="container">
            <div class="row d-flex justify-content-center">

                <div class="col-md-8">
                    <?php the_title('<h1 class="display-4 mt-6 mb-6">' , '</h1>') ?>

                    <div class="post-content">
                        <?php the_content() ?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
<?php get_footer(); ?>
