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
<html>
<head>
    <meta charset="utf-8">

    <link href="./Vue/CSS/main.css" rel="stylesheet" />
    <link href="./Vue/CSS/CSS.css" rel="stylesheet" />

    <title>Main Page</title>
</head>
<body>




    <?php
            require_once("vue/navbar.php");
    ?>

    
        <img src="./Vue/images/home_image.png" alt="Home image" id="home-image">

        <h1>Welcome to YourMarket</h1>

        <h2>Get started</h2>

        <p>We are a platform for the resale of sneakers, offering a wide selection of products from various brands and styles. We provide three different purchasing methods to cater to our customers' preferences:</p>

        <ol>
            <li>Auctions where you can bid on competitors' offers.</li>
            <li>Buy it now where you can buy directly the product you are interested in at a fixed price.</li>
            <li>Best offer where you can negotiate directly with the seller. You can negotiate up to 5 times to conclude the final price of an article.</li>
        </ol>

        <hr style="width:100%">
    

    <footer>
        <p class="footerp">Author: Andre Khella and Ahmed Qejiou<br>
        Copyright <br>
        © 2023 - YOURMARKET</p>
    </footer>
</body>
</html>
