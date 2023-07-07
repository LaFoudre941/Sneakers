<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="./Vue/css/CSS.css" rel="stylesheet" />
    <link href="./Vue/css/cart.css" rel="stylesheet" />
</head>
<body>
    <div id="main-content">
    <nav>
        <ul>
            <li><a href="index.php"><img src="./Vue/images/logo.png" alt="logo"></a></li>
            <li><a href="buying.php">Buying</a></li>
            <li><a href="youraccount.php">Your account</a></li>
            <li><a href="categories.php">Categories</a></li>
            <li><a href="sell.php">Sell</a></li>
            <li><a href="cart.php">Cart</a></li>
            <form action="/search" method="GET">
                <input style="width: 250px;" type="text" name="q" placeholder="Search on YOUR MARKET">
            </form>
            <li><a href="register.php" id="register-button">REGISTER</a></li>
            <li><a  href="connexion.php" id="login-button">LOG IN</a></li>
        </ul>
    </nav>
    </div>

    <main>
        <h1>Shopping Cart</h1>
        <div class="cart-items">
            <!-- LISTE DES ITEMS AJOUTES -->
        </div>

        <div class="cart-summary">
            <h2>Cart Summary</h2>
            <p>Total Items: <span id="total-items">0</span></p>
            <p>Total Price: <span id="total-price">$0.00</span></p>
            <button id="checkout-button">Proceed to Checkout</button>
        </div>
    </main>

    <footer>
        <p class="footerp">Author: Andre Khella and Ahmed Qejiou<br>
        Copyright <br>
        © 2023 - YOURMARKET</p>
    </footer>
</body>
</html>
