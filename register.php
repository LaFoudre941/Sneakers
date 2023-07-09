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
    <title>Registration Form</title>
    <link href="./Vue/CSS/register.css" rel="stylesheet" />
    <link href="./Vue/CSS/CSS.css" rel="stylesheet" />
</head>
<body>
    
    <?php
            require_once("vue/navbar.php");
    ?>

    <br>
    <form class="register-form" method="POST" action="register.php">
        <label for="email">Email Address:</label><br>
        <input type="email" id="email" name="email" placeholder="Enter your email"><br>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" placeholder="Enter your name"><br>
        <label for="firstname">First Name:</label><br>
        <input type="text" id="firstname" name="firstname" placeholder="Enter your First name"><br>
        <label for="date_naissance">Date of Birth:</label><br>
        <input type="date" id="date_naissance" name="date_naissance" value="2003-04-01"><br>
        <label for="mdp">Password:</label><br>
        <input type="password" id="mdp" name="mdp" placeholder="Password"><br>
        <label for="whoAmI">Who am I:</label><br>
        <input type="text" id="whoAmI" name="whoAmI" placeholder="Tell us about yourself"><br>
        <label for="adresse">Address:</label><br>
        <input type="text" id="adresse" name="adresse" placeholder="Enter your address"><br>
        <label for="city">City:</label><br>
        <input type="text" id="city" name="city"><br>
        <label for="postal_code">Postal Code:</label><br>
        <input type="text" id="postal_code" name="postal_code"><br>
        <label for="country">Country:</label><br>
        <input type="text" id="country" name="country"><br>
        <label for="phone">Phone Number:</label><br>
        <input type="tel" id="phone" name="phone"><br>
        <input type="submit" value="Submit" name="register">
        <button name="register" type="submit">Continue</button>
    </form>



<?php
        // Appeler la fonction registerUser() du contrôleur pour gérer l'enregistrement de l'utilisateur
    if(isset($_POST["register"]))
    {   
        echo('eedf');
        $unControleur->registerUser();
    }
?>




   <form method="post">
    <input type="submit" name="button" value="Cliquez Ici" />
</form>

<?php
if(isset($_POST['button'])){
    echo "Hello World";
}
?>


    <footer>
        <p class="footerp">Author: Andre Khella and Ahmed Qejiou<br>
        Copyright <br> © 2023 - YOURMARKET</p>
    </footer>

</body>
</html>
