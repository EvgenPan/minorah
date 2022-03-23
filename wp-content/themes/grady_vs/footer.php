</div>
<footer>
    <div class="container-fluid footer_fluid footer_top_fluid">

        <div class="container">
            <div class="row row_bottom">

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 footer_content_hour">
                    <?php dynamic_sidebar( 'footer_hour' ); ?>
                    </div>
                    <div class="footer_center footer_center_address col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <?php dynamic_sidebar( 'footer_address' ); ?>
                    </div>


                    <div class="footer_menu_column col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <?php
                        if ( has_nav_menu( 'footer_bottom_menu' ) ) {
                            wp_nav_menu( array(
                                'theme_location'  => 'footer_bottom_menu',
                                'menu_class'      => 'footer_menu',
                                'container'       => '',
                                'container_class' => '',
                                'walker'          => new Main_Submenu_Class()
                            ) );
                        }
                        ?>

                    </div>


                </div>

                </div>

        </div>
        <div class="container-fluid footer_fluid footer_bottom_fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 footer_bottom_left">
                    <?php dynamic_sidebar( 'footer_copyright' ); ?>

                </div>
                <div class="footer_img_logo"> <?php dynamic_sidebar( 'footer_image-logo' ); ?></div>
            </div>
        </div>

    </div>
    </div>
</footer>
</div>
</div>


<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script>
    var ajax_web_url = '<?php echo admin_url( 'admin-ajax.php', 'relative' ) ?>';
</script>
<?php wp_footer(); ?>
</body>
</html>