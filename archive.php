<?php get_header(); ?>
<div class="wrapper pt-6">
        <div class="container">
            <h1 class="h2 mb-5">
                <?php 
                    if( is_home() ) {
                        echo 'Latest Posts';
                    } elseif ( is_search() ) {
                        echo 'Search Results';
                    } else {
                        the_archive_title('', '');
                    }
                ?>
            </h1>
            
            <div class="row d-flex flex-wrap align-items-stretch">
                <?php
                    if ( isset($_GET['post_type']) ) {
                        set_query_var('post_type', $_GET['post_type']);
                    }

                    if ( have_posts() ) {
                        $colors = ['bg-success-alt', 'bg-warning-alt', 'bg-danger-alt', 'bg-primary-alt', 'bg-dark-alt', 'bg-info-alt', 'bg-secondary-alt'];
                        $count = 0;

                        while ( have_posts() ) {
                            the_post();

                            include get_template_directory() . '/inc/partials/content/list/single.php';
                            
                            $count++;
                        }

                        the_posts_pagination();
                    }
                ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
