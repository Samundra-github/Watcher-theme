// Add to cart

if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready() {
    let addToCartButtons = document.getElementsByClassName('wishlist-item-button')
    for (let i = 0; i < addToCartButtons.length; i++ ) {
        let button = addToCartButtons[i]
        button.addEventListener('click', addToCartClicked)
    }
}

function addToCartClicked(event) {
    let button = event.target
    let wishlistItem = button.parentElement.parentElement
    let title = wishlistItem.getElementsByClassName('wishlist-item-title')[0].innerText
    console.log(title)
}