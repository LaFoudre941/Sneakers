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
    <link href="./css/buying.css" rel="stylesheet" />
    <link href="./css/CSS.css" rel="stylesheet" />
    <title>Buying Page</title>

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


    




    </div>







<div class=" div1">

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








    <div>
         
        <div class="image1" style="background-image: url('./images/giphy1.gif');">
<br>
        <div class="acceuilimg">
            

          <h2>Step into Style: Discover Premium</h2>
          <h3> Snekers at YOURMARKET</h3>
          <br>

        <p>Explore a wide range of sneakers for men and women at YOURMARKET. Whether you're one the hunt for designer sneakers, the newest Nike releases, or rare men's sneakers, our selection has something for everyone. Browse through our popular sneaker and options discover the perfect addition to your sneakers collection today.</p>

        </div>  

        </div>
        <div class="image1" style="background-image: url('./images/giphy1.gif');">
<br>
        <div class="acceuilimg">
            

          <h2>Step into Style: Discover Premium</h2>
          <h3> Snekers at YOURMARKET</h3>
          <br>

        <p>Explore a wide range of sneakers for men and women at YOURMARKET. Whether you're one the hunt for designer sneakers, the newest Nike releases, or rare men's sneakers, our selection has something for everyone. Browse through our popular sneaker and options discover the perfect addition to your sneakers collection today.</p>

        </div>  

        </div>
        <div class="image1" style="background-image: url('./images/giphy1.gif');">
<br>
        <div class="acceuilimg">
            

          <h2>Step into Style: Discover Premium</h2>
          <h3> Snekers at YOURMARKET</h3>
          <br>

        <p>Explore a wide range of sneakers for men and women at YOURMARKET. Whether you're one the hunt for designer sneakers, the newest Nike releases, or rare men's sneakers, our selection has something for everyone. Browse through our popular sneaker and options discover the perfect addition to your sneakers collection today.</p>

        </div>  

        </div>
        <div class="image1" style="background-image: url('./images/giphy1.gif');">
<br>
        <div class="acceuilimg">
            

          <h2>Step into Style: Discover Premium</h2>
          <h3> Snekers at YOURMARKET</h3>
          <br>

        <p>Explore a wide range of sneakers for men and women at YOURMARKET. Whether you're one the hunt for designer sneakers, the newest Nike releases, or rare men's sneakers, our selection has something for everyone. Browse through our popular sneaker and options discover the perfect addition to your sneakers collection today.</p>

        </div>  

        </div>

    </div>


</div>





<footer>
    



<p class="footerp">Author: Andre Khella and Ahmed Qejiou<br>
  Copyright <br> © 2023 - YOURMARKET</p>



</footer>
</body>
</html>