<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


    session_start();
   // session_start();
    require_once("/Applications/MAMP/htdocs/Sneakers/Controler/controler.class.php");
    //instancier le controleur
    $unControleur = new Controleur ();


    // Traitement de la connexion
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['idconnexion'];
    $password = $_POST['password'];

    $user = $unControleur->selectWhereUser($email);

    if ($user && $user['mdp'] == $password) {
        $_SESSION['email'] = $email;
        if ($user['whoAmI'] == 'admin') {
            // Redirection vers la page d'administration
            header('Location: admin.php');
            exit();
        } else {
            // Redirection vers la page du compte utilisateur
            header('Location: youraccount.php');
            exit();
        }
    } else {
        $error_message = "Invalid email or password.";
    }
}

?>

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

    <!-- ... -->
    <form method="POST" action="connexion.php">
        <input class="connexionuser" type="text" name="idconnexion" placeholder="Email or username">
        <input class="connexionuser" type="password" name="password" placeholder="Password">
        <button class="btnconnexion" type="submit">Continue</button>
    </form>
    <!-- ... -->











    <footer>
        <p class="footerp">Author: Andre Khella and Ahmed Qejiou<br>
        Copyright <br>
        © 2023 - YOURMARKET</p>
    </footer>
</body>
</html>
