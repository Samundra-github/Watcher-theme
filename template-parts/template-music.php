<?php
/*
Template Name: Music
Template Post Type: page
*/
get_header();
?>

<?php get_template_part('/component/page', 'header') ?>



<section class="show-result">
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
        <div class="form_query row">
            <h2>Filter results</h2>
            <div class="col-md-4">

                <h5>Search by title</h5>
                <fieldset class="watcher-search" style="max-width: 80%;">
                    <input type="search" class="watcher-search-space musics_query_search query_search" placeholder="Search" aria-label="Search" aria-describedby="search-addon">
                    <span class="icon" id="search-addon">
                        <i class="fas fa-search"></i>
                    </span>
                </fieldset>

                <h5>Search by release date</h5>
                <div class="slidecontainer" style="max-width: 80%;">
                    <input type="range" min="2000" max="2022" value="2011" class="slider" id="myRange">
                    <p> <span id="demo"></span></p>
                </div>

                <h5>Search by rating</h5>
                <fieldset class="rating mb-3" style="max-width: 80%;">
                    <select name="select" id="number">
                        <option value="rating">Rating</option>
                        <option value="poor">Below 5</option>
                        <option value="average">5-7</option>
                        <option value="very_good">7-8.5</option>
                    </select>
                </fieldset>

                <h5>Search by genre</h5>
                <fieldset class="category mb-3 " style="max-width: 80%;">

                    <?= wp_dropdown_categories(array(
                        'post_type' =>  'musics',
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

                <h5>Search by production house</h5>
                <p>
                    <input type="checkbox" name="production" value="Marvel" id="Marvel_id">
                    <label for="Marvel_id">Marvel</label>
                </p>

                <p>
                    <input type="checkbox" name="production" value="DC" id="dc_id">
                    <label for="dc_id">DC</label>
                </p>

                <p>
                    <input type="checkbox" name="production" value="fox_studios" id="fox_studios_id">
                    <label for="fox_studios_id">Fox Studios</label>
                </p>

                <p>
                    <input type="checkbox" name="production" value="disney" id="disney_id">
                    <label for="disney_id">Disney</label>
                </p>


            </div>

            <div class="col-md-1" style="border-left: 2px solid black;"></div>

            <div class="col-md-7">
                <div class="load-music-all">
                    <div class="row">
                        <?php if ($music_list->have_posts()) : ?>
                            <?php while ($music_list->have_posts()) : $music_list->the_post(); ?>
                                <?php get_template_part('/component/music', 'part') ?>
                            <?php endwhile; ?>
                        <?php endif;
                        wp_reset_postdata(); ?>
                        <?php wp_reset_query(); ?>
                    </div>
                </div>
            </div>

        </div>

        <?php if ($music_list-> max_num_pages > 1) { ?>
            <div class="load_more_div text-end mt-3">
                <a href="#" class="load-more-music">Load More results</a>
            </div>
        <?php } ?>
    </div>
</section>
<script>
    var limit_music = 3,
        page_music = 1,
        max_pages_latest_music = <?php echo $music_list->max_num_pages ?>
</script>

<script>
    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value;

    slider.oninput = function() {
        output.innerHTML = this.value;
    }
</script>


<?php
get_footer();
?>