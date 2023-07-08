<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


    session_start();
   // session_start();
    require_once("/Applications/MAMP/htdocs/Sneakers/Controler/controler.class.php");
    //instancier le controleur
    $unControleur = new Controleur ();

    // Récupérer les éléments de la base de données
    $items = $unControleur->getItems();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="./Vue/css/buying.css" rel="stylesheet" />
    <link href="./Vue/css/CSS.css" rel="stylesheet" />
    <title>Buying Page</title>

</head>
<body>


    <?php
            require_once("vue/navbar.php");
    ?>

        <div class="div1">
            <div class="mainmenu">
                <div class="mainmenu1">
                    <h3>Brand</h3>
                    <input class="endmenu" style="width: 90%; margin-top: 1%;" type="text" name="size" placeholder="Search a Brand">
                    <hr>
                    <h3>Size</h3>
                    <form class="endmenu" action="/action_page.php">
                        <input type="checkbox" id="s1" name="s1" value="s1">
                        <label for="s1">  10</label><br>
                        <input type="checkbox" id="s2" name="s2" value="s2">
                        <label for="s2">  10,5</label><br>
                        <input type="checkbox" id="s3" name="s3" value="s3">
                        <label for="s3">  11</label><br>
                        <input type="checkbox" id="s4" name="s4" value="s4">
                        <label for="s4">  11,5</label><br>
                        <input type="checkbox" id="s5" name="s5" value="s5">
                        <label for="s5">  12</label><br><br>
                    </form>
                    <hr>
                    <h3>Price</h3>
                    <form class="endmenu" action="/action_page.php">
                        <input type="checkbox" id="price1" name="price1" value="50">
                        <label for="price1">  less than 50 £</label><br>
                        <input type="checkbox" id="price2" name="price2" value="50100">
                        <label for="price2">  50 - 100 £</label><br>
                        <input type="checkbox" id="price3" name="price3" value="100">
                        <label for="price3">  up than 100 £</label><br><br>
                    </form>
                </div>
            </div>
       
        <div class="product-grid">
            <?php foreach ($items as $item): ?>
                <div class="product-item">
                    <div class="product-image" style="background-image: url('./Vue/images/giphy1.gif');"></div>
                    <div class="product-details">
                        <h2 class="product-title"><?= $item['name'] ?></h2>
                        <p class="product-description"><?= $item['info'] ?></p>
                        <p class="product-price"><?= $item['price'] ?></p>
                        <button class="add-to-cart-button">Add to Cart</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <footer>
        <p class="footerp">
            Author: Andre Khella and Ahmed Qejiou<br>
            Copyright <br>
            © 2023 - YOURMARKET
        </p>
    </footer>
</body>
</html>