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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./Vue/css/CSS.css" rel="stylesheet" />
    <link href="./Vue/css/youraccount.css" rel="stylesheet" />
    <title>My account</title>
</head>
<body>

<?php
            require_once("vue/navbar.php");
?>

 <!-- ... -->
    <h1>Your Account</h1>
    <p><?php echo $welcomeMessage; ?></p>
    <!-- ... -->

<footer>
    <p class="footerp">Author: Andre Khella and Ahmed Qejiou<br>
    Copyright <br>
    © 2023 - YOURMARKET</p>
</footer>


</body>
</html>
