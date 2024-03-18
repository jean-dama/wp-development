<?php get_header(); ?>
<div class="content">
    <main>
        <section class="slide">
            <div>
                <div class="row">
                    <div id="image">
                        <?php if (is_active_sidebar('image-one')) {
                            dynamic_sidebar('image-one');
                        } ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="topics">
            <div class="container">
                <h1></h1>
                <div class="row">
                    <div class="col-sm-3">
                        <div>
                            <?php if (is_active_sidebar('option-one')) {
                                dynamic_sidebar('option-one');
                            } ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div>
                            <?php if (is_active_sidebar('option-two')) {
                                dynamic_sidebar('option-two');
                            } ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div>
                            <?php if (is_active_sidebar('option-three')) {
                                dynamic_sidebar('option-three');
                            } ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div>
                            <?php if (is_active_sidebar('option-four')) {
                                dynamic_sidebar('option-four');
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="middle">
            <div class="container">
                <div class="row">
                    <aside class="sidebar col-md-4 h-100">
                        <?php get_sidebar('home-sidebar'); ?>
                    </aside>
                    <div class="new col-md-8">
                        <div class="container">
                            <h1>Blog</h1>
                            <div class="row">
                                <?php
                                $args = array(
                                    'post_type' => 'post',
                                    'post__in' => array(62, 66, 1),
                                    'posts_per_page' => 1,
                                    'category__not_in' => array(64),
                                );
                                $feature = new WP_Query($args);
                                if ($feature->have_posts()):
                                    while ($feature->have_posts()):
                                        $feature->the_post();
                                        ?>
                                        <div class="col-12">
                                            <?php get_template_part('template-parts/content'); ?>
                                        </div>
                                    <?php endwhile; else: ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <section class="slide">
            <div>
                <div class="row">
                    <div id="image">
                        <?php if (is_active_sidebar('image-two')) {
                            dynamic_sidebar('image-two');
                        } ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="last">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div>
                            <?php
                                $api_key = get_post_meta(get_the_ID(), 'api_key', true);
                                $api_secret = get_post_meta(get_the_ID(), 'api_secret', true);
                                $request_url = 'https://api.instagram.com/v1/tags/jean-damaceno/media/recent?access_token=' . $api_key;
                                $resp = wp_remote_get($request_url);
                                if (!is_wp_error($resp)) {
                                    $body = wp_remote_retrieve_body($resp);
                                    $data = json_decode($body, true);

                                    if (isset ($data['data'])) {
                                        foreach ($data['data'] as $item) {
                                            $image_url = $item['images']['standard_resolution']['url'];
                                            echo '<img src="' . esc_url($image_url) . '" alt="Instagram" />';
                                        }
                                    }
                                } else {
                                    echo 'Error';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="last">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div id="custom-content">
                            <?php if (is_active_sidebar('custom-content')) {
                                dynamic_sidebar('custom-content');
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
<?php get_footer(); ?>