<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=VenteSneakers;charset=utf8', 'root', 'root');
$email = $_SESSION['email'];

$recupMessages = $bdd->prepare('SELECT * FROM Chat WHERE sender = ? OR receiver = ?');
$recupMessages->execute(array($email, $email));

while ($message = $recupMessages->fetch()) {
?>
    <div class="message">
        <p><?php echo $message['sender']; ?></p>
        <p><?php echo $message['message']; ?></p>
    </div>
<?php
}
?>
