let iconCart = document.querySelector('.icon-cart');
let closeCart = document.querySelector('.button .close'); // Update the selector here
let body = document.querySelector('body');
let cartTab = document.querySelector('.cartTab'); // Update the selector here

iconCart.addEventListener('click', () => {
    body.classList.add('showCart');
});

closeCart.addEventListener('click', () => {
    body.classList.remove('showCart');
});

const addDataToHTML = () => {
    listProductHTML.innerHTML = '';
    if (listProducts.length > 0) {
        listProducts.forEach(product => {
            let newProduct = document.createElement('div');
            newProduct.classList.add('item');
            newProduct.innerHTML = `
                <img src="${product.image}">
                <h2>${product.name}</h2>
                <div class="price">${product.price}</div>
                <button class="buyNow">Buy Now</button>
            `;
        });
    }
};

const initApp = () => {
    fetch('products.json')
        .then(response => response.json())
        .then(data => {
            listProducts = data;
            addDataToHTML();
        });
};

initApp(); // Call initApp to fetch data and initialize the application