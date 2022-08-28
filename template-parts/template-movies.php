<?php
/*
Template Name: Movies
Template Post Type: page
*/
get_header();
?>

<?php get_template_part('/component/page', 'header') ?>



<section class="all_movies">
    <?php
    $paged = get_query_var('page') ? get_query_var('page') : 1;
    $Movies = array(
        'post_type'      => 'movies',
        'posts_per_page' => 3,
        'paged' => $paged,

    );
    $Movies_list = new WP_Query($Movies);
    ?>
    <div class="container">
        <h2><?php the_field("all_Movies_title"); ?></h2>
        <div class="form_query row">
            <h2>Filter results</h2>
            <div class="col-md-4">

                <fieldset class="search mb-3">
                    <div>
                        <h5>Search by title</h5>
                    </div>
                    <input data-css-form="input" type="text" id="search_query_Movies" class="Movies_query_search query_search" name="resarch_query" placeholder="Search">
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
                    <input data-css-form="input" type="text" id="search_query_Movies" class="Movies_query_search query_search" name="resarch_query" placeholder="Ratings">
                    <!-- <select name="select" id="number"></select> -->

                    <input type="number" min="1" max="10" value="Ratings">
                    <i class="fa-solid fa-angle-down"></i>
                </fieldset>

                <fieldset class="category mb-3 ">
                    <div>
                        <h5>Search by genre</h5>
                    </div>

                    <?= wp_dropdown_categories(array(
                        'post_type' =>  'movies',
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
                <div class="row load_all_Movies">
                    <?php if ($Movies_list->have_posts()) : ?>
                        <?php while ($Movies_list->have_posts()) : $Movies_list->the_post(); ?>
                            <?php $category = array('category' =>  'register_tax_category');
                            get_template_part('/component/movies', 'part', $category) ?>
                        <?php endwhile; ?>
                    <?php endif;
                    wp_reset_postdata(); ?>
                </div>
            </div>

        </div>

        <?php if ($Movies_list->max_num_pages > 1) { ?>
            <div class="load_more_div text-center mt-3">
                <a href="#" class="btn-load-more-all btn-load-more-Movies">Load More</a>
            </div>
        <?php } ?>
    </div>
</section>
<script>
    var limit_Movies = 3,
        page_Movies = 1,
        max_pages_latest_Movies = <?php echo $Movies_list->max_num_pages ?>
</script>


<?php
get_footer();
?>