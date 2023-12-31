<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
    require_once("./Controler/controler.class.php");
$unControleur = new Controleur();

$user = false;
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $user = $unControleur->selectWhereUser($email);
    if ($user === false) {
        echo "No user found with email: " . $email;
        die();
    }
}

// Si le form a ete post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['delete'])) {
        $unControleur->deleteItem($_POST["idItem"]);
    }
   
    if (isset($_POST['edit'])) {
        $data = array(
            "name" => $_POST["name"],
            "category" => $_POST["category"],
            "price" => $_POST["price"],
        );
        $unControleur->updateItem($_POST["idItem"], $data);
    }
}

// Récupérer les items associés à l'email du vendeur
$items = [];
if ($user) {
    $items = $unControleur->getItemsEmail($email);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./Vue/CSS/CSS.css" rel="stylesheet" />
    <link href="./Vue/CSS/youraccount.css" rel="stylesheet" />
    <title>My account</title>
</head>
<body>

<?php
require_once("vue/navbar.php");
?>

<div class="container">
    <div class="account-info">

        <?php if ($user): ?>

            <h1>Admin Account</h1>
            <p>Email: <?php echo $user['email']; ?></p>
            <p>Name: <?php echo $user['name']; ?></p>
            <p>Firstname: <?php echo $user['firstname']; ?></p>
            <p>Date of Birth: <?php echo $user['date_naissance']; ?></p>
            <p>Who Am I: <?php echo $user['whoAmI']; ?></p>
            <p>Address: <?php echo $user['adresse']; ?></p>
            <p>City: <?php echo $user['city']; ?></p>
            <p>Postal Code: <?php echo $user['postal_code']; ?></p>
            <p>Country: <?php echo $user['country']; ?></p>
            <p>Phone: <?php echo $user['phone']; ?></p>
            <br>
            <ul>
                <li><a href="allusers.php">All Users</a></li>
                <li><a href="allitems.php">ALL Items</a></li>
            </ul>
            


        <?php else: ?>

            <h1>Welcome</h1>
            <p class="youraccount">You are not logged in. Please <a href="connexion.php">log in</a> or <a href="register.php">register</a>.</p>

        <?php endif; ?>

    </div>
</div>

<footer>
    <p class="footerp">Author: Andre Khella and Ahmed Qejiou<br>
        Copyright <br>
        © 2023 - YOURMARKET</p>
</footer>

</body>
</html>
