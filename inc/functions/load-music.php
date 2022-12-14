<?php

// Load More

function watcherldn_loadmore_music_queried_ajax_handler()
{
    $form_music =  $_POST['form'];
    $paged_music = $_POST['page'] + 1;
    $limit_music =  $_POST['limit'];
    $music = array(
        'post_type'      => 'music',
        'posts_per_page' => $limit_music,
        'paged' => $paged_music,

    );
    if (!empty($form_music)) {
        $music['s'] = $form_music;
    }
    $music_list = new WP_Query($music);
?>
    <?php if ($music_list->have_posts()) : ?>
        <?php while ($music_list->have_posts()) : $music_list->the_post();
            get_template_part('/component/music', 'part') ?>
        <?php endwhile; ?>
    <?php endif;
    wp_reset_postdata(); ?>
    <?php wp_reset_query(); ?>
<?php die();
}
add_action('wp_ajax_loadmore_music_queried', 'watcherldn_loadmore_music_queried_ajax_handler');
add_action('wp_ajax_nopriv_loadmore_music_queried', 'watcherldn_loadmore_music_queried_ajax_handler');

// Search Music

function watcherldn_loadmore_search_music_ajax_handler()
{
    $form_search =  $_POST['form'];
    $search = array(
        'post_type'      => 'music',
        'posts_per_page' => 3,
        'paged' => 1,

    );
    if (!empty($form_search)) {
        $search['s'] = $form_search;
    }
    $search_list = new WP_Query($search);

?>
    <?php if ($search_list->have_posts()) : ?>
        <?php while ($search_list->have_posts()) : $search_list->the_post();
            get_template_part('/component/music', 'part')
        ?>
        <?php endwhile; ?>
    <?php endif;
    wp_reset_postdata();
    ?>
    <?php wp_reset_query(); ?>
<?php die();
}
add_action('wp_ajax_loadmore_search_music', 'watcherldn_loadmore_search_music_ajax_handler');
add_action('wp_ajax_nopriv_loadmore_search_music', 'watcherldn_loadmore_search_music_ajax_handler');

?>


