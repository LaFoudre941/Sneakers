<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


    session_start();
   // session_start();
    require_once("/Applications/MAMP/htdocs/Sneakers/Controler/controler.class.php");
    //instancier le controleur
    $unControleur = new Controleur ();


    $user = false;
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $user = $unControleur->selectWhereUser($email);
    if($user === false){
        echo "No user found with email: " . $email;
        die();
    }
} 

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

    
<?php
            require_once("vue/navbar.php");
?>

<?php if ($user): ?>

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

        <?php else: ?>
            <div class="container">
                <div class="account-info">
                    <h1>Welcome</h1>
                    <p class="youraccount">You are not logged in. Please <a href="connexion.php">log in</a> or <a href="register.php">register</a>.</p>
                </div>
            </div>
        <?php endif; ?>


    <footer>

        <p class="footerp">Author: Andre Khella and Ahmed Qejiou<br>
        Copyright <br> © 2023 - YOURMARKET</p>

    </footer>
</body>
</html>
