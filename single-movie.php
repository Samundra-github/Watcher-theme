<?php get_header(); ?>


<section class="movie-single">
    <div class="container">
        <div class="row">
            <div class="movie-image">
                <?php if (get_field('feature_image')) : ?>
                    <img class="img-fluid" src="<?php the_field('feature_image'); ?>" />
                <?php endif; ?>
            </div>

            <div class="movie-title">
                <h1>
                    <?php the_field('title'); ?>
                </h1>
            </div>

            <div class="movie-description">
                <?php
                $movie_description = get_field('description');
                if ($movie_description) : ?>
                    <p><?php echo nl2br($movie_description); ?></p>
                <?php endif; ?>
            </div>

            <h3>Details: </h3>
            <div class="movie-details">
                <div class="col-md-6">
                    <h5 class="movie-release">
                        Release Date : <?php the_field('release_date'); ?>
                    </h5>

                    <h5 class="movie-rating">
                        User Rating : <?php the_field('user_rating'); ?>
                    </h5>
                </div>

                <div class="col-md-6">
                    <h5 class="movie-category">
                        Genre :
                        <?php
                        $cat_before = ''; // use your own
                        $cat_separator = ', '; // use your own
                        $cat_after = '.'; // use your own
                        $category_counter = count(get_the_terms($post->ID, 'category'));
                        $i = 0; // counter
                        foreach ((get_the_category()) as $category) {
                            $i = $i + 1;
                            while ($i < $category_counter) {
                                echo $cat_before . $category->cat_name . $cat_separator;
                                break;
                            }
                        }
                        echo $cat_before . $category->cat_name . $cat_after;
                        ?>
                    </h5>

                    <h5>Production Company : <?php the_field('production_company'); ?></h5>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>