<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


    session_start();
   // session_start();
    require_once("./Controler/controler.class.php");
    //instancier le controleur
    $unControleur = new Controleur ();
?>





<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="./Vue/CSS/connexion.css" rel="stylesheet" />
    <link href="./Vue/CSS/CSS.css" rel="stylesheet" />
    <title>Connexion</title>
</head>
<body>
    <?php
    require_once("vue/navbar.php");
    ?>



    <h1>Welcome</h1>
    <p class="psignin">Sign in to YOURMARKET or <a style="text-decoration: underline;" href="register.php">create an account</a></p>

    <!-- ... -->
    <form method="POST" action="connexion.php">
        <input class="connexionuser" type="text" name="idconnexion" placeholder="Email or username">
        <input class="connexionuser" type="password" name="password" placeholder="Password">
        <button class="btnconnexion" name ="seconnecter" type="submit">Continue</button>
    </form>

<?php
    // Initialisation des variables d'erreur
$emailError = $passwordError = '';

// Traitement de la connexion
if(isset($_POST['seconnecter']))
    { 
    $email = $_POST['idconnexion'];
    $password = $_POST['password'];

    $user = $unControleur->selectWhereUser($email);

    if ($user && password_verify($password, $user['mdp'])) {
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
        if (!$user || $user['mdp'] != $password) {
            $emailError = "Invalid email or password, Try again to log in or <a style='text-decoration: underline red;' href='register.php'>create an account</a>";
        }
    }
}

?>
    <!-- ... -->
    <br>

    <p class="errorconnexion"><?php echo $emailError; ?></p>










    <footer>
        <p class="footerp">Author: Andre Khella and Ahmed Qejiou<br>
        Copyright <br>
        © 2023 - YOURMARKET</p>
    </footer>
</body>
</html>
