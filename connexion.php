<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="./Vue/css/connexion.css" rel="stylesheet" />
    <link href="./Vue/css/CSS.css" rel="stylesheet" />
    <title>Connexion</title>
</head>
<body>
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
                    <input style="width: 250px;" type="text" name="q" placeholder="Search on YOUR MARKET">
                </form>
                <li><a href="register.php" id="register-button">REGISTER</a></li>
                <li><a  href="connexion.php" id="login-button">LOG IN</a></li>
            </ul>
        </nav>
    </div>

    <h1>Welcome</h1>
    <p class="psignin">Sign in to YOURMARKET or <a style="text-decoration: underline blue;" href="register.php">create an account</a></p>

    <input class="connexionuser" type="text" name="idconnexion" placeholder="Email or username">

    <input class="connexionuser" type="password" name="password" placeholder="Password">

    <button class="btnconnexion">Continue</button>

    <footer>
        <p class="footerp">Author: Andre Khella and Ahmed Qejiou<br>
        Copyright <br>
        © 2023 - YOURMARKET</p>
    </footer>
</body>
</html>
