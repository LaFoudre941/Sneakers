<?php
    if (isset($_POST['sedeconnecter'])) {
   
        $unControleur->logout();
    }

?>

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
                <input name ="sedeconnecter" style="width: 250px;" type="text" name="q" placeholder="Search on YOUR MARKET">
            </form>
        <?php
        // Ajouter la condition pour afficher le lien LOG IN ou LOG OUT
        if (isset($_SESSION['email'])) {
            echo '  <li>
                    <form method="POST" action="'.htmlspecialchars($_SERVER['PHP_SELF']).'">
                    <button class="btndeconnexion" type="submit">LOG OUT</button>
                    </form>
                    </li>';
        } else {
            echo '<li><a href="register.php" id="register-button">REGISTER</a></li>
            <li><a href="connexion.php" id="login-button">LOG IN</a></li>';
        }
        ?>


    </ul>
</nav>
</div>
