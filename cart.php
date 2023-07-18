<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

    require_once("./Controler/controler.class.php");

$unControleur = new Controleur();

// Vérifier si le panier existe dans la session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Calculer le prix total
$totalPrice = 0;
foreach ($_SESSION['cart'] as $item) {
    if (isset($item['price'])) {
        $totalPrice += $item['price'];
    }
}
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
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <?php if (isset($item['name'])): ?>
                    <p><?= $item['name'] ?></p>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

    <div class="cart-summary">
        <h2>Cart Summary</h2>
        <p>Total Items: <span id="total-items"><?= count($_SESSION['cart']) ?></span></p>
        <?php if (isset($totalPrice)): ?>
            <p>Total Price: <span id="total-price">$<?= $totalPrice ?></span></p>
        <?php endif; ?>
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
