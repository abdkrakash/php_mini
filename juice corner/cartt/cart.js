// Selectors
const cartItemsContainer = document.querySelector('.cart-items');
const totalPriceElement = document.getElementById('total-price');
const checkoutBtn = document.querySelector('.checkout-btn');
const itemNameInput = document.getElementById('itemName');
const itemPriceInput = document.getElementById('itemPrice');
const addItemBtn = document.getElementById('addItemBtn');

// Sample Data (You can replace this with data from Local Storage)
let cartItems = [];

// Save to Local Storage
function saveToLocalStorage() {
    localStorage.setItem('cartItems', JSON.stringify(cartItems));
}

// Load from Local Storage
function loadFromLocalStorage() {
    const storedItems = localStorage.getItem('cartItems');
    if (storedItems) {
        cartItems = JSON.parse(storedItems);
    }
}

// Render Cart Items
function renderCartItems() {
    cartItemsContainer.innerHTML = '';
    let totalPrice = 0;

    cartItems.forEach((item, index) => {
        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');
        cartItem.innerHTML = `
            <button class="remove-item" data-index="${index}">
                <i class="fa-solid fa-trash-can"></i>
            </button>
            <div class="item-info">
                <h4>${item.name}</h4>
                <p class="price">$${(item.price * item.quantity).toFixed(2)}</p>
            </div>
            <div class="quantity-controls">
                <button class="decrease" data-index="${index}">-</button>
                <span class="quantity">${item.quantity}</span>
                <button class="increase" data-index="${index}">+</button>
            </div>
        `;

        // Add Event Listeners for Quantity Controls
        const decreaseBtn = cartItem.querySelector('.decrease');
        const increaseBtn = cartItem.querySelector('.increase');
        const removeBtn = cartItem.querySelector('.remove-item');

        decreaseBtn.addEventListener('click', () => {
            if (item.quantity > 1) {
                item.quantity--;
            } else {
                cartItems.splice(index, 1); // Remove item if quantity is 0
            }
            saveToLocalStorage();
            renderCartItems();
        });

        increaseBtn.addEventListener('click', () => {
            item.quantity++;
            saveToLocalStorage();
            renderCartItems();
        });

        removeBtn.addEventListener('click', () => {
            cartItems.splice(index, 1);
            saveToLocalStorage();
            renderCartItems();
        });

        // Calculate Total Price
        totalPrice += item.price * item.quantity;

        cartItemsContainer.appendChild(cartItem);
    });

    // Update Total Price
    totalPriceElement.textContent = `$${totalPrice.toFixed(2)}`;
}

// Add New Item
addItemBtn.addEventListener('click', () => {
    const name = itemNameInput.value.trim();
    const price = parseFloat(itemPriceInput.value);

    if (name && !isNaN(price)) {
        const newItem = {
            id: Date.now(), // Unique ID
            name: name,
            price: price,
            quantity: 1,
        };

        cartItems.push(newItem); // Add to cart
        saveToLocalStorage(); // Save to Local Storage
        renderCartItems(); // Re-render cart

        // Clear inputs
        itemNameInput.value = '';
        itemPriceInput.value = '';
    } else {
        alert('Please fill in all fields correctly.');
    }
});

// Checkout Button
checkoutBtn.addEventListener('click', () => {
    alert('Thank you for your purchase!');
    cartItems = []; // Clear the cart
    saveToLocalStorage();
    renderCartItems();
});

// Initial Load
loadFromLocalStorage();
renderCartItems();