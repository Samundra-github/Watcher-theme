<section class="home-showcase">
    <?php
    $paged = get_query_var('page') ? get_query_var('page') : 1;
    $music = array(
        'post_type'      => 'music',
        'posts_per_page' => 3,
        'paged' => $paged,

    );
    $music_list = new WP_Query($music);
    ?>
    <div class="container">
        <h2 class="mb-3">Discover All Songs</h2>
        <div class="form_query">
            <div class="row">
                <?php if ($music_list->have_posts()) : ?>
                    <?php while ($music_list->have_posts()) : $music_list->the_post(); ?>
                        <div class="col-md-4">
                            <div class="poster">
                                <?php if (get_field('feature_image')) : ?>
                                    <img class="img-fluid" src="<?php the_field('feature_image'); ?>" />
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif;
                wp_reset_postdata(); ?>
                <?php wp_reset_query(); ?>
            </div>
            <div class="row">
                <div class="main-page-button text-center">
                    <button><a href="http://localhost:81/watcher/musics/">Go to page</a></button>
                </div>
            </div>
        </div>

    </div>
</section>