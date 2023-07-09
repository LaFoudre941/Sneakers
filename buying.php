<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once("/Applications/MAMP/htdocs/Sneakers/Controler/controler.class.php");
$unControleur = new Controleur();
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
                <input class="endmenu" style="width: 90%; margin-top: 1%;" type="text" name="brand" placeholder="Search a Brand">
                <hr>
                <h3>Size</h3>
                <form class="endmenu" action="/action_page.php">
                    <?php for ($i = 4; $i <= 12; $i++): ?>
                        <input type="checkbox" id="s<?= $i ?>" name="size[]" value="<?= $i ?>">
                        <label for="s<?= $i ?>"> <?= $i ?> US</label><br>
                    <?php endfor; ?>
                </form>
                <hr>
                <h3>Price</h3>
                <form class="endmenu" action="/action_page.php">
                    <input type="checkbox" id="price1" name="price[]" value="50">
                    <label for="price1"> Less than 50 £</label><br>
                    <input type="checkbox" id="price2" name="price[]" value="50-100">
                    <label for="price2"> 50 - 100 £</label><br>
                    <input type="checkbox" id="price3" name="price[]" value="100">
                    <label for="price3"> More than 100 £</label><br><br>
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
    </div>

    <footer>
        <p class="footerp">
            Author: Andre Khella and Ahmed Qejiou<br>
            © 2023 - YOURMARKET
        </p>
    </footer>
</body>
</html>
