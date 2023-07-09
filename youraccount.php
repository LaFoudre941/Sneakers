<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


    session_start();
   // session_start();
    require_once("/Applications/MAMP/htdocs/Sneakers/Controler/controler.class.php");
    //instancier le controleur
    $unControleur = new Controleur ();

    
    if (isset($_SESSION['user_email'])) {
        $user_email = $_SESSION['user_email'];
        $user = $unControleur->selectWhereUser($user_email);
        if($user === false){
            echo "No user found with email: " . $user_email;
            die();
        }
    } else {
        echo "User is not logged in.";
        die();
    }

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
<p>Email: <?php echo $user['email']; ?></p>
<p>Name: <?php echo $user['name']; ?></p>
<p>Firstname: <?php echo $user['firstname']; ?></p>
<p>Date of Birth: <?php echo $user['date_naissance']; ?></p>
<p>Who Am I: <?php echo $user['whoAmI']; ?></p>
<p>Address: <?php echo $user['adresse']; ?></p>
<p>City: <?php echo $user['city']; ?></p>
<p>Postal Code: <?php echo $user['postacl_code']; ?></p>
<p>Country: <?php echo $user['country']; ?></p>
<p>Phone: <?php echo $user['phone']; ?></p>
    <!-- ... -->

<footer>
    <p class="footerp">Author: Andre Khella and Ahmed Qejiou<br>
    Copyright <br>
    © 2023 - YOURMARKET</p>
</footer>


</body>
</html>
