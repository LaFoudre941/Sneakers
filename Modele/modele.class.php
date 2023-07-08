<?php
class Modele 
{
    private $unPdo ; 

    public function __construct ()
    {
        $this->unPdo = null;
        //connexion à la base de données en utilisant PDO(php data objet)
        try{
            $this->unPdo = new PDO("mysql:host=localhost;dbname=VenteSneakers", "root", "root",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            // root c'est pour les mac + GESTION DES ERREURS
        }
        catch(PDOException $exp){
            echo "<br/> Erreur de connexion à la base de données !";
        }
        
    }

/***************************************** Requete SQL **************************************************************/

    public function selectWhereUser ($email)
    {
        if ($this->unPdo != null){

            $requete =" select * from User where email = :email ; " ;
            $donnees =array(":email"=>$email);
            //preparation de la requete avant execution

            $select=$this->unPdo->prepare ($requete);
            //execution de la requete
            $select->execute ($donnees);
            //extraction des donnees fetch
            $unUser =$select->fetch (); // un seul, resultat
            return $unUser;
        }
        else {
            return null;
        }
    }
    
/***************************************  Gestion des Items *********************************/
public function getItems()
{
    if ($this->unPdo != null) {
        $requete = "SELECT * FROM Item;";
        $select = $this->unPdo->prepare($requete);
        $select->execute();
        $items = $select->fetchAll(PDO::FETCH_ASSOC);
        return $items;
    } else {
        return null;
    }
}

/***************************************  Register User *********************************/
public function registerUser($email, $name, $firstname, $birthdate, $password, $whoAmI, $address, $city, $postalCode, $country, $phone) {
    if ($this->unPdo != null) {
        $requete = "INSERT INTO User (email, name, firstname, date_naissance, mdp, whoAmI, adresse, city, postal_code, country, phone)
        VALUES (:email, :name, :firstname, :date_naissance, :mdp, :whoAmI, :adresse, :city, :postal_code, :country, :phone);";
        $donnees = array(
            ":email" => $email,
            ":name" => $name,
            ":firstname" => $firstname,
            ":date_naissance" => $birthdate,
            ":mdp" => $password,
            ":whoAmI" => $whoAmI,
            ":adresse" => $address,
            ":city" => $city,
            ":postal_code" => $postalCode,
            ":country" => $country,
            ":phone" => $phone
        );
        try {
            $insert = $this->unPdo->prepare($requete);
            $insert->execute($donnees);
            return true;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    } else {
        echo "PDO is not defined.";
        return false;
    }
}






}

?>

    
