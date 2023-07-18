<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
    require_once("./Controler/controler.class.php");
$unControleur = new Controleur();

$user = $unControleur->selectAllUsers();


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

        <?php
        // Vérifiez d'abord si l'utilisateur est connecté et a le droit de voir cette page.
        if ($user && $user['whoAmI'] == 'admin'):

        // Récupérez tous les items
        $items = $unControleur->selectAllItems();
        ?>

        <h1>Welcome <?php echo $user['firstname']; ?></h1>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <!-- Les autres titres de colonnes... -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $items): ?>
                <tr>
                    <form method="post">

                    <td><?php echo $items['name']; ?> <br> <input type="text" name="name" value="<?php echo $items['name']; ?>"></td>
                    
                    <td><?php echo $items['category']; ?> <br> <input type="text" name="category" value="<?php echo $items['category']; ?>"></td>
                    
                    <td><?php echo $items['price']; ?> <br> <input type="text" name="price" value="<?php echo $items['price']; ?>"></td>
                    
                    <!-- Les autres données... -->
                    <td>
                    
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="idItem" value="<?php echo $items['idItem']; ?>">
                        <input name ="edit" class="item-action" type="submit" value="Modifier">
                    </form>
                    <form method="post">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="idItem" value="<?php echo $items['idItem']; ?>">
                        <input name ="delete" class="item-action" type="submit" value="Supprimer">
                    </form>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


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
