<?php
    if (isset($_POST['sedeconnecter'])) {
        $unControleur->logout();
    }
?>

<div id="main-content">
    <nav>
        <ul>
            <li><a href="index.php"><img src="./Vue/images/logo.png" alt="logo"></a></li>
            <li><a href="youraccount.php">Your account</a></li>
            <?php


            if (isset($_SESSION['email'])) {
                $user = $unControleur->selectWhereUser($_SESSION['email']);
            if ($user['whoAmI'] == 'buyer') {
            echo 
            '<li><a href="buying.php">Buying</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="bestoffer.php">Best Offer</a></li>';
            } elseif ($user['whoAmI'] == 'seller') {
            echo 
            '<li><a href="sell.php">Sell</a></li>';
            } 
            }
            ?>
            
            <form action="/search" method="GET">
                <input style="width: 250px;" type="text" name="q" placeholder="Search on YOUR MARKET">
            </form>

            <?php
            if (isset($_SESSION['email'])) {
                echo '  <li>
                        <form method="POST" action="'.htmlspecialchars($_SERVER['PHP_SELF']).'">
                        <button class="btndeconnexion" type="submit" name="sedeconnecter">LOG OUT</button>
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
