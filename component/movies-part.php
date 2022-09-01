<!-- Component name: Movies -->


<div class="movie-poster">
    <?php if (get_field('feature_image')) : ?>
        <img class="img-fluid" src="<?php the_field('feature_image'); ?>" />
    <?php endif; ?>
</div>