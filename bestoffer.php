<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once("./Controler/controler.class.php");

$unControleur = new Controleur();
$items = $unControleur->getItems();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['item_id'])) {
    $itemId = $_POST['item_id'];
    $item = $unControleur->getItemById($itemId);

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    array_push($_SESSION['cart'], $item);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="./Vue/CSS/buying.css" rel="stylesheet" />
    <link href="./Vue/CSS/CSS.css" rel="stylesheet" />
    <title>Best Offer</title>
    <script>
        function showContactForm(seller) {
            // Code pour afficher le formulaire de contact avec le vendeur
            alert("Contact form for seller: " + seller);
        }
    </script>
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
                <hr>
                <h3>Categories</h3>
                <form class="endmenu" action="/action_page.php">
                    <input type="checkbox" id="category1" name="category[]" value="running">
                    <label for="category1"> Running Sneakers</label><br>
                    <input type="checkbox" id="category2" name="category[]" value="basketball">
                    <label for="category2"> Basketball Sneakers</label><br>
                    <input type="checkbox" id="category3" name="category[]" value="luxury">
                    <label for="category3"> Luxury Sneakers</label><br>
                    <input type="checkbox" id="category4" name="category[]" value="skateboarding">
                    <label for="category4"> Skateboarding Sneakers</label><br><br>
                </form>
                <hr>
                <h3>Options</h3>
                <form class="endmenu" action="/action_page.php">
                    <input type="checkbox" id="option1" name="option[]" value="auctions">
                    <label for="option1"> Auctions</label><br>
                    <input type="checkbox" id="option2" name="option[]" value="buy-now">
                    <label for="option2"> Buy it now</label><br>
                    <input type="checkbox" id="option3" name="option[]" value="best-offer">
                    <label for="option3"> Best offer</label><br><br>
                </form>
            </div>
        </div>
        <div class="product-grid">
            <!-- Banniere  -->
            <div>
                <div class="image1" style="background-image: url('./Vue/images/giphy1.gif');">
                    <br>
                    <div class="acceuilimg">
                        <h2>Step into Style: Discover Premium</h2>
                        <h3>Sneakers at YOURMARKET</h3>
                        <br>
                        <p>Explore a wide range of sneakers for men and women at YOURMARKET. Whether you're on the hunt for designer sneakers, the newest Nike releases, or rare men's sneakers, our selection has something for everyone. Browse through our popular sneaker options and discover the perfect addition to your sneaker collection today.</p>
                    </div>
                </div>
            </div>
            <?php foreach ($items as $item): ?>
                <div class="product-item">
                    <div class="product-image" style="background-image: url('./Vue/images/giphy1.gif');"></div>
                    <div class="product-details">
                        <h2 class="product-title"><?= $item['name'] ?></h2>
                        <p class="product-description"><?= $item['info'] ?></p>
                        <p class="product-price"><?= $item['price'] ?></p>
                        <div class="contact-seller">
                            <button class="contact-button" onclick="showContactForm('<?= $item['seller'] ?>')">Contact Seller</button>
                        </div>
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
