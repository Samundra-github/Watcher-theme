<!-- Component name: Music -->


<div id="send" class="poster">

    <?php if (get_field('feature_image')) : ?>
        <img class="img-fluid wishlist-item-image" name="image" src="<?php the_field('feature_image'); ?>" />
    <?php endif; ?>


    <div class="music mt-3">
        <?php echo the_content(); ?>
    </div>

    <div class="text-center wishlist-item-details">
        <button class="mt-2 mb-5 btn btn-primary wishlist-item-button mb-3" type="submit">ADD TO CART</button>
    </div>
</div>