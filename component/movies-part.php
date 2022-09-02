<!-- Component name: Movies -->


<div class="poster">
    <?php if (get_field('feature_image')) : ?>
        <a style="border: none;" href="<?php the_permalink(); ?>">
            <img class="img-fluid" src="<?php the_field('feature_image'); ?>" />
        </a>
    <?php endif; ?>

    <div class="text-center">
        <button class="mt-1 mb-5 btn btn-primary shop-item-button mb-3" type="button">ADD TO CART</button>
    </div>
</div>