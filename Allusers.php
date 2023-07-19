<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
    require_once("./Controler/controler.class.php");
$unControleur = new Controleur();


$user = $unControleur->selectAllUsers();


if (isset($_POST['delete'])) {
        $unControleur->deleteUser($_POST["email"]);
    }
   
if (isset($_POST['edit'])) {
        $data = array(
            "email" => $_POST["email"],
            "name" => $_POST["name"],
            "firstname" => $_POST["firstname"],
        );
        $unControleur->updateUser($_POST["email"], $data);
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

        // Récupérez tous les utilisateurs
        $users = $unControleur->selectAllUsers();
        ?>

        <h1>Welcome <?php echo $user['firstname']; ?></h1>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Name</th>
                    <th>First Name</th>
                    <!-- Les autres titres de colonnes... -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $users): ?>
                <tr>
                    <form method="post">

                    <td><?php echo $users['email']; ?> <br> <input type="text" name="email" value="<?php echo $users['email']; ?>"></td>

                    <td><?php echo $users['name']; ?> <br> <input type="text" name="name" value="<?php echo $users['name']; ?>"></td>
                    <td><?php echo $users['firstname']; ?> <br> <input type="text" name="firstname" value="<?php echo $users['firstname']; ?>"> </td>
                    <!-- Les autres données... -->
                    <td>
                    
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="email" value="<?php echo $users['email']; ?>">
                        <input name ="edit" class="item-action" type="submit" value="Modifier">
                    </form>
                    <form method="post">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="email" value="<?php echo $users['email']; ?>">
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
