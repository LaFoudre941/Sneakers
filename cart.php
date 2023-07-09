<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


    session_start();
   // session_start();
    require_once("/Applications/MAMP/htdocs/Sneakers/Controler/controler.class.php");
    //instancier le controleur
    $unControleur = new Controleur ();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="./Vue/CSS/CSS.css" rel="stylesheet" />
    <link href="./Vue/CSS/cart.css" rel="stylesheet" />
</head>
<body>
    
    <?php
            require_once("vue/navbar.php");
    ?>



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
