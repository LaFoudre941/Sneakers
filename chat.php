<?php
    session_start();

    $bdd = new PDO('mysql:host=localhost;dbname=VenteSneakers;charset=utf8', 'root', 'root');

    // Vérifier si l'utilisateur est connecté
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    } else {
        // Rediriger vers la page de connexion
        header('Location: connexion.php');
        exit();
    }

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['valider'])) {
            if (!empty($_POST['message'])) {
                $message = nl2br(htmlspecialchars($_POST['message']));

                // Insérer le message et l'e-mail de l'utilisateur dans la table Chat
                $insererMessage = $bdd->prepare("INSERT INTO Chat (message, User_email) VALUES (?, ?)");
                $insererMessage->execute(array($message, $email));
            } else {
                echo "Veuillez compléter tous les champs.";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Messagerie instantanée</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./Vue/CSS/chat.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Messagerie instantanée</h1>
        <form method="POST" action="" align="center">
            <div class="form-group">
                <label for="message">Message :</label>
                <textarea name="message" id="message" class="form-control" required></textarea>
            </div>
            <button type="submit" name="valider" class="btn btn-primary">Envoyer</button>
        </form>

        <section id="messages">
            <?php
                $recupMessages = $bdd->prepare('SELECT * FROM Chat WHERE User_email = ?');
                $recupMessages->execute(array($email));

                while ($message = $recupMessages->fetch()) {
            ?>
            <div class="message">
                <p><?php echo $message['User_email']; ?></p>
                <p><?php echo $message['message']; ?></p>
            </div>
            <?php
                }
            ?>
        </section>
    </div>

    <script>
        setInterval(load_messages, 500);

        function load_messages() {
            $('#messages').load('loadMessages.php');
        }
    </script>
</body>
</html>
