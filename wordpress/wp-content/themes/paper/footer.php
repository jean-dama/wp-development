<footer>
    <div class="container">
        <div class="row">
            <div class="copyright col-sm-7 col-4">
                <p>Copyright @ Damaceno | 2024</p>
            </div>
            <nav class="menu-footer col-sm-5 col-8 text-center">
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'menu_footer'
                    )
                );
                ?>
            </nav>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>