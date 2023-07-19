<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=VenteSneakers;charset=utf8', 'root', 'root');

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

$email = $_SESSION['email'];

// Vérifier si l'utilisateur est un vendeur
$userQuery = $bdd->prepare('SELECT whoAmI FROM User WHERE email = ?');
$userQuery->execute(array($email));
$user = $userQuery->fetch();

if ($user['whoAmI'] !== 'seller') {
    echo "Vous n'avez pas les droits d'accès à cette page.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['valider'])) {
        if (!empty($_POST['message']) && !empty($_POST['receiver'])) {
            $message = nl2br(htmlspecialchars($_POST['message']));
            $receiver = $_POST['receiver'];

            $insertMessage = $bdd->prepare("INSERT INTO Chat (message, sender, receiver) VALUES (?, ?, ?)");
            $insertMessage->execute(array($message, $email, $receiver));
        } else {
            echo "Veuillez compléter tous les champs.";
        }
    } elseif (isset($_POST['supprimer_chat'])) {
        $receiver_email = isset($_POST['receiver']) ? $_POST['receiver'] : '';
        
        if (!empty($receiver_email)) {
            $deleteMessages = $bdd->prepare('DELETE FROM Chat WHERE (sender = ? AND receiver = ?) OR (sender = ? AND receiver = ?)');
            $deleteMessages->execute(array($email, $receiver_email, $receiver_email, $email));
        } else {
            $deleteAllMessages = $bdd->prepare('DELETE FROM Chat WHERE sender = ? OR receiver = ?');
            $deleteAllMessages->execute(array($email, $email));
        }
    }
}

// Récupérer la liste des acheteurs
$buyersQuery = $bdd->prepare('SELECT email, name FROM User WHERE whoAmI = ?');
$buyersQuery->execute(array('buyer'));
$buyers = $buyersQuery->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Messagerie instantanée</title>
    <meta charset="utf-8">
    <link href="./Vue/CSS/chat.css" rel="stylesheet" />
    <link href="./Vue/CSS/CSS.css" rel="stylesheet" />
</head>
<body>
    
    <div class="wrapper">
        <h1>Messagerie instantanée</h1>
        <form method="POST" action="" align="center">
            <div class="form-group">
                <label for="message">Message :</label>
                <textarea name="message" id="message" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="receiver">Acheteur :</label>
                <select name="receiver" id="receiver" class="form-control">
                    <option value="">Choisir un acheteur</option>
                    <?php
                    foreach ($buyers as $buyer) {
                        echo "<option value=\"" . $buyer['email'] . "\">" . $buyer['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" name="valider" class="btn btn-primary">Envoyer</button>
            <button type="submit" name="supprimer_chat" class="btn btn-danger">Supprimer le chat</button>
            <button type="reset" class="btn btn-secondary">Réinitialiser</button>
        </form>

        <section id="messages">
            <?php
            if (isset($_POST['receiver'])) {
                $receiver_email = $_POST['receiver'];

                $messages = $bdd->prepare('SELECT * FROM Chat WHERE (sender = ? AND receiver = ?) OR (sender = ? AND receiver = ?) ORDER BY id');
                $messages->execute(array($email, $receiver_email, $receiver_email, $email));

                while ($message = $messages->fetch()) {
                    if ($message['sender'] === $email) {
                        ?>
                        <div class="message outgoing">
                            <p><?= $message['sender'] ?></p>
                            <p><?= $message['message'] ?></p>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="message incoming">
                            <p><?= $message['sender'] ?></p>
                            <p><?= $message['message'] ?></p>
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </section>
    </div>

    <script>

        function load_messages() {
            $('#messages').load('loadMessages.php');
        }
    </script>
</body>
</html>
