<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset');?> ">
    <meta name="viewport" content="width=device-width">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <section class="top">
            <div class="container">
                <div class="row">
                    <div class="social col-xl-9 col-sm-7 col-6">
                        <img src="<?php echo get_template_directory_uri() . '/images/wp.png'; ?>" />
                    </div>
                    <div class="search col-xl-3 col-sm-5 col-6 text-end">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="menu-area">
            <div class="container">
                <div class="row">
                    <nav class="menu col-md-12 text-center">
                        <?php wp_nav_menu( array( 'theme_location' => 'menu' ) ); ?>
                    </nav>
                </div>
            </div>
        </section>
    </header>