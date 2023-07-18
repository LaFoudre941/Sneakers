<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once("/Applications/MAMP/htdocs/Sneakers/Controler/controler.class.php");
$unControleur = new Controleur();

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

        // Récupérez tous les utilisateurs
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
                    <td><?php echo $items['name']; ?></td>
                    <td><?php echo $items['category']; ?></td>
                    <td><?php echo $items['price']; ?></td>
                    <!-- Les autres données... -->
                    <td>
                        <a href="edit_user.php?email=<?php echo $items['email']; ?>">Edit</a> | 
                        <a href="delete_user.php?email=<?php echo $items['email']; ?>">Delete</a>
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
