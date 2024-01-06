document.addEventListener('DOMContentLoaded', function () {
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

});

if (document.readyState == 'loading'){
    document.addEventListener('DOMContentLoaded', ready)
}else{
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

    var addCart = document.getElementsByClassName('add-cart')
    for (var i=0; i<addCart.length; i++)
    {
        var button = addCart[i];
        button
        .addEventListener('click', addCartClicked);
    }

    //add to cart btn
    document
    .getElementsByClassName("add-cart")[0]
    .addEventListener("click", addCartClicked);

    /*Buy button*/
    document
    .getElementsByClassName('btn-buy')[0]
    .addEventListener('click', buyButtonClicked)
}
/* remarks */
   
function addButtonClicked(){

    alert("Your items is added to the cart");
}

function buyButtonClicked(){;
    var cartContent = document.querySelector(".cart-content");
    
    // Check if there are any child nodes inside the card-content
    if (cartContent.childElementCount == 0) {
        alert("Your cart is empty. Please add items to your cart.");
        return;
    }else{
        alert('Your Order is placed');
         var cartContent= document.getElementsByClassName('cart-content')[0];

    
    while (cartContent .hasChildNodes()){
        cartContent.removeChild(cartContent.firstChild);
    }
    updateTotal();
    }
}


function removeCartItem(event) {
    var buttonClicked = event.target;
    var cartItem = buttonClicked.closest('.cart-box');
    
    if (cartItem) {
        cartItem.remove();
        updateTotal();
    }

    updateTotal();
}
/*Quantity Changes*/
function quantityChanged(event){
    var input = event.target;
    if (isNaN(input.value) || input.value <= 0){  
      input.value = 1;
    }
    /*the quantity is at least 1*/

    updateTotal();/*remarks*/
}

/*Add to cart*/
function addCartClicked(event) {
    alert("Your selected seat is saved");
    
    var button = event.target;
    var shopProducts = button.parentElement;
    var title = shopProducts.getElementsByClassName('product-title')[0].innerText;
    var price = shopProducts.getElementsByClassName('price')[0].innerText;
    var productImg = shopProducts.getElementsByClassName('cart-img')[0].src;
    addProductToCart(title, price, productImg);
    updateTotal();
}

function addProductToCart(title, price, productImg) {
    var cartShopBox = document.createElement('div');
    cartShopBox.classList.add("cart-box");
    var cartItems = document.getElementsByClassName('cart-content')[0];
    var cartItemsNames = cartItems.getElementsByClassName('cart-product-title');
    
    for (var i = 0; i < cartItemsNames.length; i++) {
        var cartItemTitle = cartItemsNames[i].innerText;
        
        if (cartItemTitle === title) {
            alert("You had added this Music Show to your cart");
            return;
        }
    }
   var cartBoxContent = `
        <img src="${productImg}" alt="" class="cart-img" style="width:100px;height:100px;padding:5px;">
        <div class="details-box">
            <div class="cart-product-title">${title}</div>
            <div class="cart-price">RM ${price}</div>
            <input type="number" value="1" class="cart-quantity">
        </div>

        <div class="cart-remove">
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
            <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z"/>
        </svg>
        </div>`;
cartShopBox.innerHTML = cartBoxContent;
cartItems.appendChild(cartShopBox);
cartShopBox
  .getElementsByClassName('cart-remove')[0]
  .addEventListener('click', removeCartItem);
cartShopBox
  .getElementsByClassName('cart-quantity')[0]
  .addEventListener('change', quantityChanged);

   updateTotal();
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
        var price = parseFloat(priceElement.innerText.replace("RM", " "));
        var quantity = quantityElement.value;
        total = total + (price * quantity);
      }

      document.getElementsByClassName('total-price')[0].innerText="RM " + total.toFixed(2);
    }
        
    


function openModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = 'block';
}

function goToSeat(musicShowName, musicShowPrice) {
    openModal('seatModal');
    populateSeatModal(musicShowName);
    addButtonClicked();

    var productImg;
    switch (musicShowName) {
        case 'BlackPink Concert':
            productImg = './images/blackpinkconcert.jpg';
            break;
        case 'Maneskin Live Band':
            productImg = './images/maneskinliveband.jpg';
            break;
        case 'Vienna Boys Choir':
            productImg = './images/viennaboyschoir.jpg';
            break;
        case 'Angela Zhang Concert':
            productImg = './images/angelazhangconcert.jpg';
            break;
        case 'ColdPlay Live Band':
            productImg = './images/coldplay.jpg';
            break;
        case 'Marron 5 Live Band':
            productImg = './images/MARRON5.jpg';
            break;
        case 'The Sixteen Choir':
            productImg = './images/thesixteen.jpg';
            break;
    }

    addProductToCart(musicShowName, musicShowPrice, productImg);
    updateTotal();
}


function populateSeatModal(musicShowName) {
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
