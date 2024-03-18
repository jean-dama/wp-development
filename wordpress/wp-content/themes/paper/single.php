<?php get_header(); ?>
<div id="second-image">
    <img class="fluid" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
</div>
<div id=""primary>
    <div id="main">
        <div class="container">
            <?php while(have_posts()): the_post();
                    get_template_part('template-parts/content','single');
                    if( comments_open()|| get_comments_number()):
                        comments_template();
                    endif;
                endwhile;
            ?>
        </div>
    </div>                                
</div>
<?php get_footer(); ?>