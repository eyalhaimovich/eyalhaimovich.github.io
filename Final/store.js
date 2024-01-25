if(document.readyState == 'loading'){
    document.addEventListener('DOMContentLoaded', ready);
}else{
    ready()
}

function ready(){
    //script for button listeners
    var removeButton = document.getElementsByClassName('remove_button');
    for(var i= 0; i < removeButton.length; i++){
        var button = removeButton[i];
        button.addEventListener('click', removeCartItem);
    }

    var quantity = document.getElementsByClassName('item_count');
    for(var i= 0; i < quantity.length; i++){
        var input = quantity[i];
        input.addEventListener('change', quantityChanged);
    }

    var addButton = document.getElementsByClassName('buy_button');
    for(var i= 0; i < addButton.length; i++){
        var button = addButton[i];
        button.addEventListener('click', addToCart);
    }

    document.getElementsByClassName('purchase_button')[0].addEventListener('click', purchaseClick);
}

function purchaseClick(){
    alert('Thank you for your purchase!');
    var cart = document.getElementsByClassName('cart_content')[0];
    while(cart.hasChildNodes()){
        cart.removeChild(cart.firstChild);
    }
    updateCartTotal();
    updateCartItems();
}

//assure quantity of items always > 0
function quantityChanged(event){
    var input = event.target;
    if(isNaN(input.value) || input.value < 1){
        input.value = 1;
    }
    updateCartTotal();
    updateCartItems();
}

//remove item from cart
function removeCartItem(event){
    var buttonClicked = event.target;
    buttonClicked.parentElement.remove();
    updateCartTotal();
    // decreaseCartCounter();
    updateCartItems();
}

//add item to cart
function addToCart(event){
    var button = event.target;
    var shopItem = button.parentElement.parentElement; //item class
    var name = shopItem.getElementsByClassName('item_name')[0].innerText;
    var price = shopItem.getElementsByClassName('item_price')[0].innerText;
    var imgSrc = shopItem.getElementsByClassName('item_img')[0].src;
    addItemToCart(name, price, imgSrc);
    updateCartTotal();
    updateCartItems();
}

function addItemToCart(name, price, imgSrc){
    var cartObject = document.createElement('div');
    cartObject.setAttribute('class', 'cart_item');
    var cartItems = document.getElementsByClassName('cart_content')[0];
    var cartItemNames = cartItems.getElementsByClassName('item_name');
    for(var i= 0; i < cartItemNames.length; i++){
        if(cartItemNames[i].innerText == name){
            alert('Item already in cart');
            return;
        }
    }
    var itemContents = `
        <img class="item_img" src="${imgSrc}" alt="">
        <span class="item_name">${name}</span>
        <span class="item_price">${price}</span>
        <input class="item_count" type="number" value="1">
        <button class="remove_button">REMOVE</button>`;
    cartObject.innerHTML= itemContents;
    cartItems.appendChild(cartObject);
    cartObject.getElementsByClassName('remove_button')[0].addEventListener('click', removeCartItem);
    cartObject.getElementsByClassName('item_count')[0].addEventListener('change', quantityChanged);
    // increaseCartCounter();
}

//update the total cost of items in cart
function updateCartTotal(){
    var total = 0;
    var cart = document.getElementsByClassName('cart_content')[0];
    cartItems = cart.getElementsByClassName('cart_item');
    for(var i= 0; i < cartItems.length; i++){
        var item = cartItems[i];
        var itemPrice = item.getElementsByClassName('item_price')[0];
        var itemAmount = item.getElementsByClassName('item_count')[0];
        var price = parseFloat(itemPrice.innerText.replace('$', ''));
        var amount = itemAmount.value;
        total += (price * amount);
    }
    total = Math.round(total * 100) / 100; //round to 2 decimals
    document.getElementsByClassName('total')[0].innerText = '$' + total;
}

//update amount of items in cart
function updateCartItems(){
    var total = 0;
    var cart = document.getElementsByClassName('cart_content')[0];
    cartItems = cart.getElementsByClassName('cart_item');
    for(var i= 0; i < cartItems.length; i++){
        var item = cartItems[i];
        var itemAmount = item.getElementsByClassName('item_count')[0];
        var amount = parseInt(itemAmount.value);
        total += amount;
    }
    document.getElementsByClassName('cart_counter')[0].innerText = total;
}
  
// Toggle Shopping Cart
const cartToggle = document.getElementById('cart_toggle');
const cartMenu = document.querySelector('.cart_container');
cartToggle.addEventListener('click', () => {
    cartMenu.classList.toggle('hide_cart');
});