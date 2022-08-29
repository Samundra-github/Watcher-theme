<?php
/*
Template Name: Music
Template Post Type: page
*/
get_header();
?>

<?php get_template_part('/component/page', 'header') ?>



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
        <h2><?php the_field("all_music_title"); ?></h2>
        <div class="form_query row">
            <h2>Filter results</h2>
            <div class="col-md-4">

                <fieldset class="search mb-3">
                    <div>
                        <h5>Search by title</h5>
                    </div>
                    <input data-css-form="input" type="text" id="search_query_music" class="music_query_search query_search" name="resarch_query" placeholder="Search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </fieldset>

                <fieldset class="year">
                    <div>
                        <h5>Search by release date</h5>
                    </div>
                    <input type="range" class="form-range" min="0" max="5" id="customRange2">
                </fieldset>

                <fieldset class="rating">
                    <div>
                        <h5>Search by rating</h5>
                    </div>
                    <select name="select" id="number">
                        <option value="rating">Rating</option>
                    </select>
                </fieldset>

                <fieldset class="category mb-3 ">
                    <div>
                        <h5>Search by genre</h5>
                    </div>

                    <?= wp_dropdown_categories(array(
                        'post_type' =>  'music',
                        'taxonomy'        => 'category', // taxonomy slug
                        'name'            => 'category', // taxonomy slug or query_var
                        'value_field'     => 'slug',
                        'selected'        => get_query_var('category'),
                        'hierarchical'    => true, // place each term under their own parent
                        'show_option_all' => 'All Category',
                        'show_count'      =>    1,
                        'echo'            =>  0

                    )) ?>
                </fieldset>

            </div>

            <div class="col-md-8">
                <div class="row load_all_music">
                    <?php if ($music_list->have_posts()) : ?>
                        <?php while ($music_list->have_posts()) : $music_list->the_post(); ?>
                            <?php $category = array('category' =>  'register_tax_category');
                            get_template_part('/component/music', 'part', $category) ?>
                        <?php endwhile; ?>
                    <?php endif;
                    wp_reset_postdata(); ?>
                </div>
            </div>

        </div>

        <?php if ($music_list->max_num_pages > 1) { ?>
            <div class="load_more_div text-center mt-3">
                <a href="#" class="btn-load-more-all btn-load-more-music">Load More results</a>
            </div>
        <?php } ?>
    </div>
</section>
<script>
    var limit_music = 3,
        page_music = 1,
        max_pages_latest_music = <?php echo $music_list->max_num_pages ?>
</script>


<?php
get_footer();
?>