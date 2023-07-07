<?php
    require_once("modele/modele.class.php");

    class Controleur {

        private $unModele ; 

        public function __construct (){
            // instancier la classe Modele 
            $this->unModele = new Modele (); //connexion BDD etablie
        }
/***************************************  Gestion des Membres *********************************/

    //controle de l'extraction des données pour l'affichage
    public function selectWhereUser ($email){
        return $this->unModele->selectWhereUser ($email);
    }

    //Deconnexion et suppression de la session
    public function logout() {
    session_unset(); // Supprimer toutes les variables de session
    session_destroy(); // Détruire la session
    header("Refresh:0"); // Rafraîchit la page en cours
    } 


    public function isLoggedIn() {
        // Vérifiez si l'utilisateur est connecté
        return isset($_SESSION['email']);
    }



}


   
?>