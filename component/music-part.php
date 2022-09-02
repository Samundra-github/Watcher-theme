<!-- Component name: Music -->


<div class="poster">
    <?php if (get_field('feature_image')) : ?>
        <img class="img-fluid wishlist-item-image" src="<?php the_field('feature_image'); ?>" />
    <?php endif; ?>

    <div class="music mt-3">
        <?php echo the_content(); ?>
    </div>

    <div class="text-center wishlist-item-details">
        <button class="mt-2 mb-5 btn btn-primary wishlist-item-button mb-3" type="button">ADD TO CART</button>
    </div>
</div>


<script>
    if (document.readyState == 'loading') {
        document.addEventListener('DOMContentLoaded', ready)
    } else {
        ready()
    }

    function ready() {
        let addToCartButtons = document.getElementsByClassName('wishlist-item-button')
        for (let i = 0; i < addToCartButtons.length; i++) {
            let button = addToCartButtons[i]
            button.addEventListener('click', addToCartClicked)
        }
    }

    function addToCartClicked(event) {
        let button = event.target
        let wishlistItem = button.parentElement.parentElement
        let imageSrc = wishlistItem.getElementsByClassName('wishlist-item-image')[0].src
        console.log(imageSrc)
    }
</script>