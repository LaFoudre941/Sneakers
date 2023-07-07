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
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./Vue/css/CSS.css" rel="stylesheet" />
    <link href="./Vue/css/sell.css" rel="stylesheet" />
    <title>Sell</title>
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
            <?php
        // Ajouter la condition pour afficher le lien LOG IN ou LOG OUT
        if (isset($_SESSION['email'])) {
            echo '<li><a href="connexion.php?logout=1" id="login-button" style="color: red;" >LOG OUT</a></li>';
        } else {
            echo '<li><a href="register.php" id="register-button">REGISTER</a></li>
            li><a href="connexion.php" id="login-button">LOG IN</a></li>';
        }
        ?>
    </ul>
    </nav>
</div>


    <main class="sell-container">
        <form action="/upload-product" method="POST" enctype="multipart/form-data" class="sell-form">
            <label for="product-image">Upload product image:</label>
            <br><br>
            <input type="file" id="product-image" name="product-image">
            <br>
            <label for="product-title">Product title:</label>
            <input type="text" id="product-title" name="product-title">

            <label for="product-description">Product description:</label>
            <textarea id="product-description" name="product-description"></textarea>

            <label for="product-price">Product price:</label>
            <input type="number" id="product-price" name="product-price">

            <label for="product-quantity">Product quantity:</label>
            <input type="number" id="product-quantity" name="product-quantity">

            <label for="selling-option">Selling option:</label>
            <select id="selling-option" name="selling-option">
                <option value="auction">Auctions</option>
                <option value="buy-now">Buy it now</option>
                <option value="best-offer">Best offer</option>
            </select>

            <input type="submit" value="Submit">
        </form>
    </main>


    <footer>

        <p class="footerp">Author: Andre Khella and Ahmed Qejiou<br>
        Copyright <br> © 2023 - YOURMARKET</p>

    </footer>
</body>
</html>
