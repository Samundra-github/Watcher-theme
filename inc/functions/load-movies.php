<?php
function thriveldn_loadmore_research_ajax_handler()
{
    $form_research =  $_POST['form'];
    $paged_research = $_POST['page'] + 1;
    $limit_research =  $_POST['limit'];
    $research = array(
        'post_type'      => 'research',
        'posts_per_page' => $limit_research,
        'paged' => $paged_research,

    );
    if (!empty($form_research)) {
        $research['s'] = $form_research;
    }
    $research_list = new WP_Query($research);
?>
    <?php if ($research_list->have_posts()) : ?>
        <?php while ($research_list->have_posts()) : $research_list->the_post(); ?>
            <?php $category = array('category' =>  'thriveldn_cat');
            get_template_part('/component/single', 'card', $category) ?>
        <?php endwhile; ?>
    <?php endif;
    wp_reset_postdata(); ?>
    <?php wp_reset_query(); ?>
    <?php die();
}
add_action('wp_ajax_loadmore_research', 'thriveldn_loadmore_research_ajax_handler');
add_action('wp_ajax_nopriv_loadmore_research', 'thriveldn_loadmore_research_ajax_handler');

function thriveldn_loadmore_research_queried_ajax_handler()
{
    $form_research_queried =  $_POST['form'];
    $paged = get_query_var('page') ? get_query_var('page') : 1;
    $research_queried = array(
        'post_type'      => 'research',
        'posts_per_page' => 3,
        'paged' => $paged,


    );
    if (!empty($form_research_queried)) {
        $research_queried['s'] = $form_research_queried;
    }
    $research_queried_list = new WP_Query($research_queried);
    $totalpost = $research_queried_list->found_posts;
    $max_page = $research_queried_list->max_num_pages;
    if ($max_page == $paged) {
    ?>
        <style>
            .btn-load-more-research {
                display: none !important;
            }
        </style>
    <?php
    }

    if ($totalpost == 0) {
    ?>
        <style>
            .btn-load-more-research {
                display: none !important;
            }
        </style>
    <?php
    }


    ?>
    <?php if ($research_queried_list->have_posts()) : ?>
        <?php while ($research_queried_list->have_posts()) : $research_queried_list->the_post(); ?>
            <?php $category = array('category' =>  'thriveldn_cat');
            get_template_part('/component/single', 'card', $category) ?>
        <?php endwhile; ?>
    <?php endif;
    wp_reset_postdata(); ?>
    <script>
        var limit_research = 3,
            page_research = 1,
            max_pages_latest_research = <?php echo $research_queried_list->max_num_pages ?>;
    </script>
    <?php wp_reset_query(); ?>
<?php die();
}
add_action('wp_ajax_loadmore_research_queried', 'thriveldn_loadmore_research_queried_ajax_handler');
add_action('wp_ajax_nopriv_loadmore_research_queried', 'thriveldn_loadmore_research_queried_ajax_handler');

