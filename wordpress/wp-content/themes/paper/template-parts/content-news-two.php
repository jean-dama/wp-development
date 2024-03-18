<article <?php post_class(array('class' => 'news')); ?>>
    <div class="thumbnail">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?></a>
    </div>
    <h2>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h2>   
    <div class="meta-info">
        <p>
            <span>by
                <?php the_author_posts_link(); ?>
            </span>
            <span>
                <?php the_category(' '); ?>
            </span>
            <span>
                <?php the_tags('Tags: ', ','); ?>
            </span>
        </p>
    </div>
    <p>
        <?php the_excerpt(); ?>
</article>