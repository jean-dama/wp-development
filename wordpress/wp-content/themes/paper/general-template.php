<?php //  Template Name: Modelo geral  ?>
<?php get_header(); ?>
<div id="second-image">
    <img class="fluid" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
</div>
<div class="content">
    <main>
        <section class="middle">
            <div class="container">
                    <div class="general-template">
                        <?php if (have_posts()): while(have_posts()): the_post(); ?>
                            <article>
                                <h2><?php the_title(); ?></h2>
                                <p><?php the_content(); ?></p>
                            </article>
                        <?php endwhile; else: ?>
                            <p>Error!</p>
                        <?php endif; ?>
                    </div>               
            </div>
        </section>
    </main>
</div>
<?php get_footer(); ?>