let cartIcon = document.querySelector(".icon-cart");
let cart = document.querySelector(".cartTab");
let closeCart = document.querySelector(".close-cart");

/*Open cart*/
cartIcon.onclick = () => {
    cart.classList.add("active");
};
/*Close cart*/
closeCart.onclick = () => {
    cart.classList.remove("active");
};

if (document.readyState == 'loading'){
    document.addEventListener('DOMContentLoaded', ready)
}
else{
    ready();
}

/*Making function ready*/
function ready(){
    var removeCartButtons = document.getElementsByClassName('cart-remove');
    console.log(removeCartButtons)
    for (var i=0; i < removeCartButtons.length; i++)
    {
        var button = removeCartButtons[i];
        button.addEventListener('click', removeCartItem);
    }

    /*Quantity Changes*/
    var quantityInputs = document.getElementsByClassName('cart-quantity');
    for(var i=0; i < quantityInputs.length; i++){
        var input = quantityInputs[i];
        input.addEventListener('change', quantityChanged);
    }



   /*add to cart*/
   var addCart = document.getElementsByClassName('add-cart');
   for(var i=0; i < addCart.length; i++)
    {
       var button = addCart[i];
       button.addEventListener('click', addCartClicked);
    }

   /*Buy button*/
   document.getElementsByClassName('btn-buy')[0].addEventListener('click', buyButtonClicked);

}

function buyButtonClicked(){
    alert('Your Order is placed');
    var cartContent= document.getElementsByClassName('cart-content')[0]
    while (cartContent .hasChildNodes()){
        cartContent.removeChild(cartContent.firstChild);
    }

    updateTotal();
}


function removeCartItem(event){
    var buttonClicked = event.target;
    buttonClicked.parentElement.remove();
    updateTotal();
}

/*Quantity Changes*/
function quantityChanged(event){
    var input = event.target;
    if (isNaN(input.value) || input.value <= 0){  
      input.value = 1;
    }
    /*the quantity is at least 1*/

    updateTotal();
}

/*Add to cart*/
function addCartClicked() {
    var title = shopProducts.querySelector('.cart-product-title').innerText;
    var price = shopProducts.querySelector('.price').innerText;
    var productImg = shopProducts.querySelector('.cart-img').src;
    addProductToCart(title, price, productImg);
    updateTotal();
}

function addProductToCart(title, price, productImg) {
    var cartContent = document.querySelector('.cart-content');
    var cartBoxes = cartContent.querySelectorAll('.cart-box');

    for (var i = 0; i < cartBoxes.length; i++) {
        var cartBoxTitle = cartBoxes[i].querySelector('.cart-product-title');
        if (cartBoxTitle && cartBoxTitle.innerText === title) {
            alert("You have already added this item to your cart");
            return;
        }
    }

    var cartShopBox = document.createElement('div');
    cartShopBox.classList.add('cart-box');

    var cartBoxContent = `
        <img src="${productImg}" alt="" class="cart-img">
        <div class="details-box">
            <div class="cart-product-title">${title}</div>
            <div class="cart-price">${price}</div>
            <input type="number" value="1" class="cart-quantity">
        </div>
        <svg class="w-6 h-6 text-gray-800 dark:text-white cart-remove" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
            <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z"/>
        </svg>`;

    cartShopBox.innerHTML = cartBoxContent;
    cartContent.appendChild(cartShopBox);

    cartShopBox.querySelector('.cart-remove').addEventListener('click', removeCartItem);
    cartShopBox.querySelector('.cart-quantity').addEventListener('change', quantityChanged);
}

/*Update total*/
function updateTotal(){
    var cartContent= document.getElementsByClassName('cart-content')[0];
    var cartBoxes = cartContent.getElementsByClassName('cart-box');
    var total = 0;
    for (var i=0; i < cartBoxes.length; i++){
        var cartBox = cartBoxes[i];
        var priceElement = cartBox.getElementsByClassName('cart-price')[0];
        var quantityElement = cartBox.getElementsByClassName('cart-quantity')[0];
        var price = parseFloat(priceElement.innerText.replace("RM", ""));
        var quantity = quantityElement.Value;
        total = total + (price * quantity);
    }
        document.getElementsByClassName('total-price')[0].innerText = "RM" + total;
    
}

function openModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = 'block';
}

function goToSeat(musicShowName, musicShowPrice) {
    openModal('seatModal');
    populateSeatModal(musicShowName, musicShowPrice);
}

function populateSeatModal(musicShowName, musicShowPrice) {
    var musicShowSelect = document.getElementById('musicShow');
    for (var i = 0; i < musicShowSelect.options.length; i++) {
        if (musicShowSelect.options[i].text === musicShowName) {
            musicShowSelect.selectedIndex = i;
            break;
        }
    }
}

function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = 'none';

}
