<!-- Component name: Music -->


<div class="music-poster">
    <?php if (get_field('feature_image')) : ?>
        <img class="img-fluid" src="<?php the_field('feature_image'); ?>" />
    <?php endif; ?>

    <div class="music">
        <?php echo the_content(); ?>
    </div>
</div>