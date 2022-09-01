<!-- Component name: Movies -->


<div class="movie-poster">
    <?php if (get_field('feature_image')) : ?>
        <a style="border: none;" href="<?php the_permalink(); ?>">
            <img class="img-fluid" src="<?php the_field('feature_image'); ?>" />
        </a>
    <?php endif; ?>
</div>