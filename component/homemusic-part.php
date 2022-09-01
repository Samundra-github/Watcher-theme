<?php
/*
Template Name: Music
Template Post Type: page
*/
?>


<section class="all_music">
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
        <div class="form_query">
            <div class="row">
                <?php if ($music_list->have_posts()) : ?>
                    <?php while ($music_list->have_posts()) : $music_list->the_post(); ?>
                        <div class="col-md-4">
                            <?php get_template_part('/component/music', 'part') ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif;
                wp_reset_postdata(); ?>
                <?php wp_reset_query(); ?>
            </div>
        </div>
    </div>
</section>

<script>
    var limit_music = 3,
        page_music = 1,
        max_pages_latest_music = <?php echo $music_list->max_num_pages ?>
</script>