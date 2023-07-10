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

/***************************************  Gestion des Items *********************************/

    public function getItems() {
        return $this->unModele->getItems();
    }
    
    public function getItemsEmail($emailVendeur) {
        return $this->unModele->getItemsEmail($emailVendeur);
    }


/***************************************  Register User *********************************/
   // Fonction pour nettoyer les entrées de l'utilisateur
    private function cleanInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    public function registerUser() {
            // Récupérer les données du formulaire et nettoyer les entrées
            $email = $this->cleanInput($_POST['email']);
            $name = $this->cleanInput($_POST['name']);
            $firstname = $this->cleanInput($_POST['firstname']);
            $birthdate = $this->cleanInput($_POST['date_naissance']);
            $password = $this->cleanInput($_POST['mdp']);
            $whoAmI = $this->cleanInput($_POST['whoAmI']);
            $address = $this->cleanInput($_POST['adresse']);
            $city = $this->cleanInput($_POST['city']);
            $postalCode = $this->cleanInput($_POST['postal_code']);
            $country = $this->cleanInput($_POST['country']);
            $phone = $this->cleanInput($_POST['phone']);
    
            // Valider les champs obligatoires
            if (!$email || !$name || !$firstname || !$birthdate || !$password || !$address || !$city || !$postalCode || !$country || !$phone) {
                // Si un champ obligatoire est vide, afficher une erreur
                echo "Veuillez remplir tous les champs";
                return;
            }
    
            // Vérifier si l'utilisateur existe déjà dans la base de données
            $existingUser = $this->unModele->selectWhereUser($email);
            if ($existingUser) {
                // L'utilisateur existe déjà, effectuer le traitement approprié (affichage d'un message d'erreur, redirection, etc.)
                echo "L'utilisateur existe déjà";
            } else {
                // Hacher le mot de passe
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
                // L'utilisateur n'existe pas, vous pouvez appeler la fonction du modèle pour enregistrer l'utilisateur
                $this->unModele->registerUser($email, $name, $firstname, $birthdate, $hashedPassword, $whoAmI, $address, $city, $postalCode, $country, $phone);
                
                echo "L'utilisateur a été enregistré avec succès";
            }
        
    }
    
    /***************************************  CART *********************************/
    public function addToCart($itemId) {
        $itemId = $this->cleanInput($itemId);
        
        $this->unModele->addToCart($itemId);
    }

    public function getItemById($itemId) {
        if ($this->unPdo != null) {
            $requete = "SELECT * FROM Item WHERE idItem = :id;";
            $donnees = array(":id" => $itemId);
            $select = $this->unPdo->prepare($requete);
            $select->execute($donnees);
            $item = $select->fetch(PDO::FETCH_ASSOC);
            return $item;
        } else {
            return null;
        }
    }

    public function removeFromCart($itemId) {
        // Assurez-vous que $itemId est sécurisé avant de l'utiliser dans une requête SQL
        $itemId = $this->cleanInput($itemId);
        
        $this->unModele->removeFromCart($itemId);
    }
    
    // Changer la quantité d'un article
    public function changeItemQuantity($itemId, $newQuantity) {
        // Assurez-vous que $itemId et $newQuantity sont sécurisés avant de les utiliser dans une requête SQL
        $itemId = $this->cleanInput($itemId);
        $newQuantity = $this->cleanInput($newQuantity);
    
        $this->unModele->changeItemQuantity($itemId, $newQuantity);
    }
    
    // Mettre à jour le prix total du panier
    public function updateCartTotal() {
        $this->unModele->updateCartTotal();
    }
}
   
?>