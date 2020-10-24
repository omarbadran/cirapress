    </main>
    
    <footer class="section-footer bg-dark position-relative">
        <section class="footer py-5">
                <div class="container">
                    <div class="row pb-3">
                        <aside class="col-md-2">
                            <div class="footer-logo">
                                <h4 class="text-white font-weight-bold">Cira<span class="text-muted">Press</span></h4>
                            </div>
                        </aside>
                        <aside class="col-md">
                            <?php dynamic_sidebar( 'footer-left') ?>
                        </aside>
                        <aside class="col-md">
                            <?php dynamic_sidebar( 'footer-center') ?>
                        </aside>
                        <aside class="col-md">
                            <?php dynamic_sidebar( 'footer-right') ?>
                        </aside>

                        <aside class="col-md">
                        </aside>
                    </div>
                </div>
        </section>

        <section class="footer-bottom border-top border-dark white pt-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <span class="pr-4">© 2020 CiraPress</span>
                        <span class="pr-2"><a href="#">Privacy policy</a></span>
                        <span class="pr-2"><a href="#">Terms of use</a></span>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <a href="#" class="mr-2"><img src="<?php echo get_template_directory_uri() ?>/dist/images/payment/footer-visa.svg" width="42"></a>
                        <a href="#" class="mr-2"><img src="<?php echo get_template_directory_uri() ?>/dist/images/payment/footer-mastercard.svg" width="42"></a>
                        <a href="#"><img src="<?php echo get_template_directory_uri() ?>/dist/images/payment/footer-paypal.svg" width="42"></a>
                    </div>
                </div>
            </div>
        </section>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>