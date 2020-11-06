<div class="col-md-4 mb-4">
    <div class="card colored-card color-light hover-card border-0">
        <div class="card-body rounded <?= $colors[$count] ?> p-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="#!" class="label font-weight-bold"><?= get_the_category()[0]->name ?? null ?></a>
                <span class="blog-date small"><?php echo esc_html( human_time_diff( get_the_time('U'), current_time('timestamp') ) ) . ' ago'; ?></span>
            </div>

            <h2 class="hover-fade-out">
                <a href="<?= get_permalink() ?>" class="blog-title"><?= get_the_title() ?></a>
            </h2>

            <p class="py-2">
                <?php echo get_the_excerpt() ?>
            </p>

            <div class="card-footer border-0 d-flex justify-content-between align-items-center px-0">
                <div class="author-box d-sm-flex flex-row flex-wrap text-center align-items-center">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 43, false, get_the_title(), [
                        'class' => 'img-sm rounded-circle'
                    ]); ?>

                    <div class=" ml-sm-3 ml-md-0 ml-xl-3 text-left">
                        <h6 class="mt-1 mb-0"><?php echo the_author_posts_link(); ?></h6>
                        <p class="mb-1 small">Editor</p>
                    </div>
                </div>

                <span href="#!" class="bg-soft-danger py-1 px-2 rounded-pill small text-danger">
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="14" fill="currentColor">
                        <path fill="none" d="M0 0h24v24H0z"/>
                        <path d="M7.291 20.824L2 22l1.176-5.291A9.956 9.956 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.956 9.956 0 0 1-4.709-1.176z"/>
                    </svg>
                    
                    <span class="ml-2"><?= get_comments_number() ?></span>
                </a>
            </div>
        </div>
    </div>
</div>
