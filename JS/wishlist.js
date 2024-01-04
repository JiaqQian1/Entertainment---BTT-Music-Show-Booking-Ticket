// card
let cardIcon = document.querySelector('#wish-icon');
let card = document.querySelector('.card');
let closeCard = document.querySelector('#close-card');

// open card
cardIcon.onclick = () => {
    card.classList.add("active");
}

// close card
closeCard.onclick = () => {
    card.classList.remove("active");
}

// card working js
if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready);
} else {
    ready();
}

// Making Function
function ready() {
    // Remove item from card
    var removeCardButtons = document.getElementsByClassName('card-remove');

    for (var i = 0; i < removeCardButtons.length; i++) {
        var button = removeCardButtons[i];
        button.addEventListener('click', removeCardItem);
    }
    // quantity changes
    var quantityInputs = document.getElementsByClassName("card-quantity");
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i];
        input.addEventListener("change", quantityChanged);
    }
    //Add to carrd
    var addCard = document.getElementsByClassName("add-card");
    for (var i = 0; i < addCard.length; i++){
        var button = addCard[i];
        button.addEventListener("click", addCardClicked);
    }
    //add to card button
    document
    .getElementsByClassName("btn-add")[0]
    .addEventListener("click",addButtonClicked);

}

//add buttton
function addButtonClicked(){
    var cardContent = document.querySelector(".card-content");

    // Check if there are any child nodes inside the card-content
    if (cardContent.childElementCount === 0) {
        alert("Your wishlist is empty. Please add items to your wishlist before adding to cart.");
        return;
    }

    alert("Your wishlist is already added to the cart");

    // Clear the card content after adding to cart
    while (cardContent.hasChildNodes()){
        cardContent.removeChild(cardContent.firstChild);
    }
}


// Remove item from card
function removeCardItem(event) {
    var buttonClicked = event.target;
    buttonClicked.parentElement.remove();
}

// quantity changes
function quantityChanged(event) {
    var input = event.target;
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1;
    }
}

//add to card
function addCardClicked(event){
    var button = event.target;
    var listProduct = button.parentElement;
    var title = listProduct.getElementsByClassName("list-title")[0].innerText;
    var price = listProduct.getElementsByClassName("price")[0].innerText;
    var listImg = listProduct.getElementsByClassName("list-img")[0].src;
    addListToCard(title,price,listImg);
}

function addListToCard(title, price, listImg) {
    var cardListBox = document.createElement("div");
    cardListBox.classList.add("card-box");
    var cardItems = document.querySelector(".card-content");
    var cardItemsNames = cardItems.getElementsByClassName("card-list-title");

    for (var i = 0; i < cardItemsNames.length; i++) {
        if (cardItemsNames[i].innerText == title) {
            alert("You have already added this item to wishlist");
            return;
        }
    }

    // Continue with adding the item to the card if it's not already present
    cardListBox.innerHTML = `
        <img src="${listImg}" alt="" class="card-img">
        <div class="detail-box">
            <div class="card-list-title">${title}</div>
            <div class="card-price">${price}</div>
            <input type="number" value="1" class="card-quantity">
        </div>
        <!--remove-->
        <i class="fa fa-trash card-remove" aria-hidden="true"></i>
    `;

    cardListBox
        .getElementsByClassName("card-remove")[0]
        .addEventListener('click', removeCardItem);

    cardListBox
        .getElementsByClassName("card-quantity")[0]
        .addEventListener('change', quantityChanged);

    cardItems.appendChild(cardListBox);
}


