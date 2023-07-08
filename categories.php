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
    <link href="./Vue/css/categories.css" rel="stylesheet" />
    <title>Categories</title>
</head>
<body>

<?php
            require_once("vue/navbar.php");
?>

<main class="sell-container">
    <div class="categories-list">
        <div class="category">
            <a href="sneakers.html?type=running">
                <img src="./Vue/images/running-sneakers.jpg" alt="Running Sneakers" >
                <h2>Running Sneakers</h2>
                <p>Discover our collection of running sneakers designed for optimal performance and comfort. Whether you're a casual jogger or a seasoned marathon runner, find the perfect pair for your needs.</p>
            </a>
        </div>
        <div class="category">
            <a href="sneakers.html?type=basketball">
                <img src="./Vue/images/basketball-sneakers.jpg" alt="Basketball Sneakers">
                <h2>Basketball Sneakers</h2>
                <p>Step up your game on the court with our high-performance basketball sneakers. Designed to provide excellent traction, support, and cushioning, these sneakers will help you dominate the game.</p>
            </a>
        </div>
        <div class="category">
            <a href="sneakers.html?type=luxury">
                <img src="./Vue/images/luxury-sneakers.jpg" alt="Luxury Sneakers">
                <h2>Luxury Sneakers</h2>
                <p>Get ready to step up your game with our collection of luxury tennis sneakers. Crafted with precision and style, these sneakers are designed to elevate your performance on the court. Experience the perfect blend of comfort, agility, and sophistication.</p>
            </a>
        </div>
        <div class="category">
            <a href="sneakers.html?type=skateboarding">
                <img src="./Vue/images/skateboarding-sneakers.jpg" alt="Skateboarding Sneakers">
                <h2>Skateboarding Sneakers</h2>
                <p>Express your individuality and ride with confidence with our skateboarding sneakers. Designed for durability and board feel, these sneakers will help you nail those tricks and stand out at the skatepark.</p>
            </a>
        </div>

        
    
    </div>
</main>

<footer>
    <p class="footerp">Author: Andre Khella and Ahmed Qejiou<br>
    © 2023 - YOURMARKET</p>
</footer>

</body>
</html>
