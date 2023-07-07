<?php
    session_start();
   // session_start();
    require_once("Controleur/controleur.class.php");
    //instancier le controleur
    $unControleur = new Controleur ();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <link href="./Vue/css/buying.css" rel="stylesheet" />
    <link href="./Vue/css/CSS.css" rel="stylesheet" />

    <title>Main Page</title>
</head>
<body>




    <div id="main-content">


        <nav>
            <ul>
                <li><a href="index.php"><img src="./images/logo.png" alt="logo"></a></li>
                <li><a href="buying.php">Buying</a></li>
                <li><a href="/account">Your account</a></li>
                <li><a href="/categories">Categories</a></li>
                <li><a href="/sell">Sell</a></li>
                <li><a href="/cart">Cart</a></li>
                <form action="/search" method="GET">
                    <input style="width: 250px;" type="text" name="q" placeholder="Search on YOUR MARKET">
                </form>
                <li><a href="register.php" id="register-button">REGISTER</a></li>
                <li><a  href="connexion.php" id="login-button">LOG IN</a></li>
            </ul>
            
        </nav>

        <img src="./images/home_image.png" alt="Home image" id="home-image">

        <h1>Welcome to YourMarket</h1>

        <h2>Get started</h2>

        <p>We are a platform for the resale of sneakers, offering a wide selection of products from various brands and styles. We provide three different purchasing methods to cater to our customers' preferences:</p>

        <ol>
            <li>Auctions where you can bid on competitors' offers.</li>
            <li>Buy it now where you can buy directly the product you are interested in at a fixed price.</li>
            <li>Best offer where you can negotiate directly with the seller. You can negotiate up to 5 times to conclude the final price of an article.</li>
        </ol>



<hr style="width:100%">









    </div>


<footer>
    



<p class="footerp">Author: Andre Khella and Ahmed Qejiou<br>
  Copyright <br> © 2023 - YOURMARKET</p>



</footer>
</body>
</html>