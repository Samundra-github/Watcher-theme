// Add to cart

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
    addItemToCart(imageSrc)
}

function addItemToCart(imageSrc) {
    let cartRow = document.createElement('div')
    let cartItem = document.getElementsByClassName('cart-items')[0]
    let cartRowContent = `
            <div class="cart-row">
                <div class="cart-item cart-column">
                    <img src="${imageSrc}" alt="List" width="100" height="100">
                </div>
            </div>
    `
    cartItem.append(cartRow)
}
