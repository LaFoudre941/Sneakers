<?php
    require_once("controler.class.php");

    // Instancier le controleur
    $unControleur = new Controleur ();

    // Appeler la méthode de déconnexion
    $unControleur->logout();

    // Rediriger l'utilisateur vers la page youraccount.php
    header("Location: ../youraccount.php");
?>
