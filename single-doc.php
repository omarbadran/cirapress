<?php get_header(); ?>
    <div class="wrapper">
        <div class="container">
            <div class="row d-flex justify-content-center">

                <div class="col-md-8">
                    <?php the_title('<h1 class="display-4 mt-3 mb-6">' , '</h1>') ?>

                    <div class="post-content">
                        <?php the_content() ?>
                    </div>

                    <div class="d-flex justify-content-between mt-8">
                        <div class="next-prev-post">
                            <? if ( get_previous_post_link() ) : ?>
                                <i class="las la-arrow-left text-primary mr-3"></i>
                                <? previous_post_link('%link', '%title') ?>
                            <? endif; ?>
                        </div>
                        
                        <div class="next-prev-post">
                            <? if ( get_next_post_link() ) : ?>
                                <? next_post_link('%link', '%title') ?>
                                <i class="las la-arrow-right text-primary ml-3"></i>
                            <? endif; ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
<?php get_footer(); ?>
