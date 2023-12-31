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

$bestoffervs = [];

if ($user) {
    $temp = $unControleur->getbestoffervEmail($email);
    // Assurez-vous que $temp est un tableau avant de l'affecter à $bestoffervs
    if (is_array($temp)) {
        $bestoffervs = $temp;
    }
}

$bestoffer = [];
if ($user) {
    $bestoffers = $unControleur->getbestofferEmail($email);
}

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

            <h1>Your Account</h1>
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


            <?php if ($user['whoAmI'] === 'seller'): ?>
            <h2>Items for Sale</h2><br>
            <?php foreach ($items as $item): ?>
                <p>Item Name: <?php echo $item['name']; ?></p>
                <p>Item Category: <?php echo $item['category']; ?></p>
                <p>Price: <?php echo $item['price']; ?></p>

                <div class="item-actions">
                    <!-- Suppression -->
                    <form method="post">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="idItem" value="<?php echo $item['idItem']; ?>">
                        <input name ="delete" class="item-action" type="submit" value="Supprimer">
                    </form>

                    <!-- Modification -->
                    <form method="post">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="idItem" value="<?php echo $item['idItem']; ?>">
                        <input type="text" name="name" value="<?php echo $item['name']; ?>">
                        <input type="text" name="category" value="<?php echo $item['category']; ?>">
                        <input type="text" name="price" value="<?php echo $item['price']; ?>">
                        <input name ="edit" class="item-action" type="submit" value="Modifier">
                    </form>
                </div>
            <?php endforeach; ?>
            <h2>Best Offers of Your Client</h2><br>

            <?php foreach ($bestoffervs as $offerv): ?>

                <p>Item Name: <?php echo $offerv['name_item']; ?></p>
                <p>Price: <?php echo $offerv['bestprice']; ?></p>
                <p>Email buyer: <?php echo $offerv['User_email']; ?></p>
                <form method="post">
                <input type="hidden" name="bestprice" value="<?php echo $offerv['bestprice']; ?>">
                <input type="hidden" name="idBestoffer" value="<?php echo $offerv['idBestoffer']; ?>">
                <button name="Accepte">Accepte</button>
                <button name="Decline">Decline</button>
                </form>

<?php  
if (isset($_POST['Accepte'])) {
    $unControleur->AccepteBestOffer($_POST["idBestoffer"]);
    $data = array(
            "bestprice" => $_POST["bestprice"],
        );
    $unControleur->UpdatePriceBestOffer($_POST["bestprice"], $data);


}

if (isset($_POST['Decline'])) {
    $unControleur->DeclineBestOffer($_POST["idBestoffer"]);
}
?>

                <hr>

            <?php endforeach; ?>

            <?php elseif ($user['whoAmI'] === 'buyer'): ?>

            <h2>Your best Offers</h2><br>

            <?php foreach ($bestoffers as $offer): ?>

                <p>Item Name: <?php echo $offer['name_item']; ?></p>
                <p>Valitated ?: <?php echo $offer['accepted']; ?></p>
                <p>Price: <?php echo $offer['bestprice']; ?></p>

                <hr>

            <?php endforeach; ?>




        <?php elseif ($user['whoAmI'] === 'admin'): ?>
        <ul>
                <li><a href="allusers.php">All Users</a></li>
                <li><a href="allitems.php">ALL Items</a></li>
        </ul>
        <?php endif; ?>

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
