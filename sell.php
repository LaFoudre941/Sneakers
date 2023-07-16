<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once("/Applications/MAMP/htdocs/Sneakers/Controler/controler.class.php");
$unControleur = new Controleur ();

$user = false;
$errors = []; // to store error messages
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $user = $unControleur->selectWhereUser($email);
    if($user === false){
        $errors[] = "No user found with email: " . $email;
    }
}

if (isset($_POST['sell'])) {
    // Check that all form fields have been filled out
    $required_fields = ['name', 'info', 'price', 'delivery_price', 'category', 'fromTime', 'toTime', 'Itemcol'];
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = 'The ' . $field . ' field is required.';
        }
    }

    if(empty($errors)){ // If no errors occurred
        $data = [
            'name' => $_POST['name'],
            'info' => $_POST['info'],
            'price' => $_POST['price'],
            'delivery_price' => $_POST['delivery_price'],
            'category' => $_POST['category'],
            'sellBO' => isset($_POST['sellBO']) ? 1 : 0,
            'sellBID' => isset($_POST['sellBID']) ? 1 : 0,
            'sellBIN' => isset($_POST['sellBIN']) ? 1 : 0,
            'fromTime' => $_POST['fromTime'],
            'toTime' => $_POST['toTime'],
            'Itemcol' => $_POST['Itemcol']
        ];
        $unControleur->addItem($_SESSION['email'], $data);
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./Vue/CSS/CSS.css" rel="stylesheet" />
    <link href="./Vue/CSS/sell.css" rel="stylesheet" />
    <title>Sell</title>
</head>
<body>

    
<?php
            require_once("vue/navbar.php");
?>

<?php if ($user): ?>

    <main class="sell-container">
    <form action="" method="POST" enctype="multipart/form-data" class="sell-form">
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name">

            <label for="info">Product description:</label>
            <textarea id="info" name="info"></textarea>

            <label for="price">Product price:</label>
            <input type="number" id="price" name="price">

            <label for="delivery_price">Delivery Price:</label>
            <input type="number" id="delivery_price" name="delivery_price">

            <label for="category">Category:</label>
            <select type="text" id="category" name="category" style="width:100%;" >
                <option value="Running Sneakers">Running Sneakers</option>
                <option value="BasketBall Sneakers">BasketBall Sneakers</option>
                <option value="Luxury Sneakers">Luxury Sneakers</option>
                <option value="Skateboarding Sneakers">Skateboarding Sneakers</option>
            </select>

            <label for="sellBO">Sell by Offer:</label>
            <input type="checkbox" id="sellBO" name="sellBO" value="1">

            <label for="sellBID">Sell by Bid:</label>
            <input type="checkbox" id="sellBID" name="sellBID" value="1">

            <label for="sellBIN">Sell Buy It Now:</label>
            <input type="checkbox" id="sellBIN" name="sellBIN" value="1">

            <label for="fromTime">From:</label>
            <input type="datetime-local" id="fromTime" name="fromTime">

            <label for="toTime">To:</label>
            <input type="datetime-local" id="toTime" name="toTime">

            <label for="Itemcol">Itemcol:</label>
            <input type="text" id="Itemcol" name="Itemcol">

            <input name="sell" type="submit" value="Submit">
        </form>
        
        <?php if (!empty($errors)): ?>
            <div class="error-container">
                <?php foreach ($errors as $error): ?>
                    <p class="error"><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
         <?php endif; ?>

    </main>

        <?php else: ?>
            <div class="container">
                <div class="account-info">
                    <h1>Welcome</h1>
                    <p class="youraccount">You are not logged in. Please <a href="connexion.php">log in</a> or <a href="register.php">register</a>.</p>
                </div>
            </div>
        <?php endif; ?>


    <footer>

        <p class="footerp">Author: Andre Khella and Ahmed Qejiou<br>
        Copyright <br> © 2023 - YOURMARKET</p>

    </footer>
