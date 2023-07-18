<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=VenteSneakers;charset=utf8', 'root', 'root');
    $email = $_SESSION['email'];
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
