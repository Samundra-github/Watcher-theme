<?php

// Load More Movies

function watcherldn_loadmore_movie_queried_ajax_handler()
{
    $form_movie =  $_POST['form'];
    $paged_movie = $_POST['page'] + 1;
    $limit_movie =  $_POST['limit'];
    $movie = array(
        'post_type'      => 'movie',
        'posts_per_page' => $limit_movie,
        'paged' => $paged_movie,

    );
    if (!empty($form_movie)) {
        $movie['s'] = $form_movie;
    }
    $movie_list = new WP_Query($movie);

?>
    <?php if ($movie_list->have_posts()) : ?>
        <?php while ($movie_list->have_posts()) : $movie_list->the_post();
            get_template_part('/component/movies', 'part')
        ?>
        <?php endwhile; ?>
    <?php endif;
    wp_reset_postdata();
    ?>
    <?php wp_reset_query(); ?>
<?php die();
}
add_action('wp_ajax_loadmore_movie_queried', 'watcherldn_loadmore_movie_queried_ajax_handler');
add_action('wp_ajax_nopriv_loadmore_movie_queried', 'watcherldn_loadmore_movie_queried_ajax_handler');

// Search Movie

function watcherldn_loadmore_search_ajax_handler()
{
    $form_search =  $_POST['form'];

    $form_movies = $form_search[0]['value'];
    $form_date = $form_search[1]['value'];
    echo $form_date;
    $form_rating = $form_search[2]['value'];
    $form_category = $form_search[3]['value'];
    $form_production = $form_search[4]['value'];


    $search = array(
        'post_type'      => 'movie',
        'posts_per_page' => 3,
        'paged' => 1,

    );

    if (!empty($form_movies)) {
        $search['s'] = $form_movies;
    }


    if (!empty($form_date)) {
        // echo $form_date;

        $search['meta_query'] = array(
            array(
                'key'	 	=> 'date',
                'value'	  	=> $form_date,
                'compare' 	=> '=',
            )
        );
    }

    if (!empty($form_category)) {
        $search['category'] = $form_category;

    }

    

    $search_list = new WP_Query($search);

?>
    <?php if ($search_list->have_posts()) : ?>
        <?php while ($search_list->have_posts()) : $search_list->the_post();
            get_template_part('/component/movies', 'part')
        ?>
        <?php endwhile; ?>
    <?php endif;
    wp_reset_postdata();
    ?>
    <?php wp_reset_query(); ?>
<?php die();
}
add_action('wp_ajax_loadmore_search', 'watcherldn_loadmore_search_ajax_handler');
add_action('wp_ajax_nopriv_loadmore_search', 'watcherldn_loadmore_search_ajax_handler');

?>
