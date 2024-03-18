<?php get_header(); ?>
<div id="second-image">
    <img class="fluid" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
</div>
<div class="content">
    <main>
        <section class="middle">
            <div class="container">
                <div class="row">
                    <aside class="sidebar col-md-3 h-100">
                        <?php dynamic_sidebar('blog-sidebar'); ?>
                    </aside>
                    <div class="new col-md-9">
                        <?php if (have_posts()):
                            while (have_posts()):
                                the_post(); ?>
                            <?php get_template_part('template-parts/content', get_post_format() ); ?>
                            <?php endwhile; else: ?>
                            <p>Nothing!</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
<?php get_footer(); ?>