<section class="home-showcase">
    <?php
    $paged = get_query_var('page') ? get_query_var('page') : 1;
    $movie = array(
        'post_type'      => 'movie',
        'posts_per_page' => 3,
        'paged' => $paged,

    );
    $movie_list = new WP_Query($movie);
    ?>
    <div class="container">
        <h2>Discover All Movies</h2>
        <div class="form_query">
            <div class="row">
                <?php if ($movie_list->have_posts()) : ?>
                    <?php while ($movie_list->have_posts()) : $movie_list->the_post(); ?>
                        <div class="col-md-4">
                            <?php get_template_part('/component/movies', 'part') ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif;
                wp_reset_postdata(); ?>
                <?php wp_reset_query(); ?>
            </div>
            <div class="row">
                <div class="main-page-button text-center">
                    <button><a href="http://localhost:81/watcher/movies/">Go to page</a></button>
                </div>
            </div>
        </div>

    </div>
</section>


