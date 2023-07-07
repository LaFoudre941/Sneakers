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
   
?>