const body = document.body;
const openWishlist = document.querySelector('.wishlist');
const closeWishlist = document.querySelector('.closeWishlist');

openWishlist.addEventListener('click', () => {
    body.classList.toggle('active', true);
});

closeWishlist.addEventListener('click', () => {
    body.classList.toggle('active', false);
});


document.addEventListener("DOMContentLoaded", function () {

    const wishlistButton = document.querySelector('.wishlist');
    const wishlistList = document.querySelector('.listCard');
    const closeWishlistButton = document.querySelector('.closeWishlist');
    const totalQuantityDisplay = document.querySelector('.totalQuantity');

    let wishlistItems = [];

    function updateWishlistCount() {
        document.querySelector('.quantity').textContent = wishlistItems.length;
    }

    function updateTotalQuantity() {
        totalQuantityDisplay.textContent = wishlistItems.length;
    }

    function addToCard(itemTitle) {
        wishlistItems.push(itemTitle);
        updateWishlistCount();
        displayWishlist();
        updateTotalQuantity();
    }

    function removeFromWishlist(itemTitle) {
        wishlistItems = wishlistItems.filter(item => item !== itemTitle);
        updateWishlistCount();
        displayWishlist();
        updateTotalQuantity();
    }

    function displayWishlist() {
        wishlistList.innerHTML = '';
        wishlistItems.forEach(itemTitle => {
            const li = document.createElement('li');
            li.textContent = itemTitle;

            const removeButton = document.createElement('button');
            removeButton.textContent = 'Remove';
            removeButton.addEventListener('click', function () {
                removeFromWishlist(itemTitle);
            });

            li.appendChild(removeButton);
            wishlistList.appendChild(li);
        });
    }

    wishlistButton.addEventListener('click', function () {
        document.querySelector('.card').classList.toggle('active', true);
    });

    closeWishlistButton.addEventListener('click', function () {
        document.querySelector('.card').classList.toggle('active', false);
        updateTotalQuantity();
    });

    document.querySelector('.list').addEventListener('click', function (event) {
        const addToCardButton = event.target.closest('.item button');
        if (addToCardButton) {
            const itemTitle = addToCardButton.closest('.item').querySelector('.title').textContent;
            addToCard(itemTitle);
        }
    });
});
