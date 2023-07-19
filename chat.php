<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=VenteSneakers;charset=utf8', 'root', 'root');

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

$email = $_SESSION['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        if (!empty($_POST['message']) && !empty($_POST['seller'])) {
            $message = nl2br(htmlspecialchars($_POST['message']));
            $receiver = $_POST['seller'];

            $insertMessage = $bdd->prepare("INSERT INTO Chat (message, sender, receiver) VALUES (?, ?, ?)");
            $insertMessage->execute(array($message, $email, $receiver));
        } else {
            echo "Please fill in all fields.";
        }
    } elseif (isset($_POST['delete_chat'])) {
        $seller_email = isset($_POST['seller']) ? $_POST['seller'] : '';

        if (!empty($seller_email)) {
            $deleteMessages = $bdd->prepare('DELETE FROM Chat WHERE (sender = ? AND receiver = ?) OR (sender = ? AND receiver = ?)');
            $deleteMessages->execute(array($email, $seller_email, $seller_email, $email));
        } else {
            $deleteAllMessages = $bdd->prepare('DELETE FROM Chat WHERE sender = ? OR receiver = ?');
            $deleteAllMessages->execute(array($email, $email));
        }
    }
}

// Retrieve the list of sellers
$sellersQuery = $bdd->prepare('SELECT email, name FROM User WHERE whoAmI = ?');
$sellersQuery->execute(array('seller'));
$sellers = $sellersQuery->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Instant Messaging</title>
    <meta charset="utf-8">
    <link href="./Vue/CSS/CSS.css" rel="stylesheet" />
    <link href="./Vue/CSS/chat.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <h1>Instant Messaging</h1>
        <form method="POST" action="" align="center">
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea name="message" id="message" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="seller">Seller:</label>
                <select name="seller" id="seller" class="form-control" required>
                    <option value="">Choose a seller</option>
                    <?php
                    foreach ($sellers as $seller) {
                        echo "<option value=\"" . $seller['email'] . "\">" . $seller['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Send</button>
            <button type="submit" name="delete_chat" class="btn btn-danger">Delete Chat</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>

        <section id="messages">
            <?php
            if (isset($_POST['seller']) && !isset($_POST['delete_chat'])) {
                $seller_email = $_POST['seller'];

                $messages = $bdd->prepare('SELECT * FROM Chat WHERE (sender = ? AND receiver = ?) OR (sender = ? AND receiver = ?) ORDER BY id');
                $messages->execute(array($email, $seller_email, $seller_email, $email));

                while ($message = $messages->fetch()) {
                    if ($message['sender'] === $email) {
                        ?>
                        <div class="message outgoing">
                            <p>From: You</p>
                            <p>To: <?= $seller['name'] ?></p>
                            <p><?= $message['message'] ?></p>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="message incoming">
                            <p>From: <?= $seller['name'] ?></p>
                            <p>To: You</p>
                            <p><?= $message['message'] ?></p>
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </section>

        <button onclick="location.href='index.php'" class="btn btn-secondary">Return to Home</button>

    </div>

    <script>
        function load_messages() {
            $('#messages').load('loadMessages.php');
        }
    </script>
</body>
</html>
