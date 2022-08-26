<?php
/*
Template Name: Movies
Template Post Type: page
*/
get_header();
?>

<article id="content">

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
                <fieldset class="search col-xl-4 mb-3">
                    <input data-css-form="input" type="text" id="search_query_Movies" class="Movies_query_search query_search" name="resarch_query" placeholder="Search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </fieldset>
                <fieldset class="theme_label col-xl-7 mb-3 ">

                    <?= wp_dropdown_categories(array(
                        'taxonomy'        => 'category', // taxonomy slug
                        'name'            => 'category', // taxonomy slug or query_var
                        'value_field'     => 'slug',
                        'selected'        => get_query_var('category'),
                        'hierarchical'    => true, // place each term under their own parent
                        'show_option_all' => 'All Category',
                    )) ?>
                </fieldset>


            </div>
            <div class="row load_all_Movies">
                <?php if ($Movies_list->have_posts()) : ?>
                    <?php while ($Movies_list->have_posts()) : $Movies_list->the_post(); ?>
                        <?php $category = array('category' =>  'register_tax_category');
                        get_template_part('/component/movies', 'part', $category) ?>
                    <?php endwhile; ?>
                <?php endif;
                wp_reset_postdata(); ?>
            </div>
            <?php if ($Movies_list->max_num_pages > 1) { ?>
                <div class="load_more_div text-center mt-3">
                    <a href="#" class="btn-load-more-all btn-load-more-Movies">Load More</a>
                </div>
            <?php } ?>
            <script>
                var limit_Movies = 3,
                    page_Movies = 1,
                    max_pages_latest_Movies = <?php echo $Movies_list->max_num_pages ?>
            </script>
        </div>
    </section>

    <?php $contact_args = array('has_svg' => 'yes', 'back_color' => 'rgba(177, 179, 179, .1)');
    get_template_part('/component/contact', 'us', $contact_args) ?>
    <?php get_template_part('/component/back', 'home') ?>

</article>

<?php
get_footer();
?>