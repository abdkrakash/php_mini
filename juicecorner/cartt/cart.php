<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="cart.css">
    <title>Cart</title>
</head>
<body>

    <nav class="navbar">
        <div class="logo">
          <img src="../Pic/logo-removebg-preview.png" alt="Logo" height="40">
        </div>
    
        
        <div class="links">
            <a href="../home_page/index.php" class="link"><i class="fas fa-home"></i> Home</a> 
            <a href="../cartt/cart.php" class="link"><i class="fas fa-shopping-cart"></i> Cart</a>
            <a href="../PHP/index.php" class="link"><i class="fas fa-bars"></i> Menu</a> 
            <a href="../SignUp/SignUp.php" class="link"><i class="fas fa-sign-in-alt"></i> Sign up</a>
        </div>
      </nav>


    <section class="cart">
        <h1>CART</h1>
        <div class="cart-items">
            <!-- Cart Items will be rendered here -->
        </div>
        <div class="cart-summary">
            <h3>Total: <span id="total-price">$0.00</span></h3>
            <button class="checkout-btn">Checkout</button>
        </div>
        <div class="add-item-form">
            <h3>Add New Item</h3>
            <input type="text" id="itemName" placeholder="Item Name">
            <input type="number" id="itemPrice" placeholder="Item Price" step="0.01">
            <button id="addItemBtn">Add Item</button>
        </div>
    </section>
    <script src="cart.js"></script>
</body>
</html>