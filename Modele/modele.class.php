<?php
class Modele 
{
    protected $unPdo ; 

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

    public function getPdo() {
    return $this->unPdo;
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
            return false;
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

public function getItemsEmail($emailVendeur) {
    if ($this->unPdo != null) {
        $requete = "SELECT * FROM Item WHERE User_email_seller = :emailVendeur;";
        $select = $this->unPdo->prepare($requete);
        $select->execute(array(':emailVendeur' => $emailVendeur));
        $items = $select->fetchAll(PDO::FETCH_ASSOC);
        return $items;
    } else {
        return null;
    }
}

public function deleteItem($id) {
    $requete = "DELETE FROM Item WHERE idItem = :id";
    $donnees = array(":id" => $id);
    $select = $this->unPdo->prepare($requete);
    $select->execute($donnees);
}

public function updateItem($id, $data) {
    $requete = "UPDATE Item SET name=:name, category=:category, price=:price WHERE idItem = :id";
    $donnees = array(":id" => $id, ":name" => $data['name'], ":category" => $data['category'], ":price" => $data['price']);
    $select = $this->unPdo->prepare($requete);
    $select->execute($donnees);
}


public function deleteUser($id) {
        $requete = "DELETE FROM User WHERE email = :id";
        $donnees = array(":id" => $id);
        $select = $this->unPdo->prepare($requete);
        $select->execute($donnees);
    }

public function updateUser($id, $data) {
    $requete = "UPDATE User SET email=:email, name=:name, firstname=:firstname WHERE email = :id";
    $donnees = array(":id" => $id, ":email" => $data['email'], ":name" => $data['name'], ":firstname" => $data['firstname']);
    $select = $this->unPdo->prepare($requete);
    $select->execute($donnees);
    }

public function addItem($email, $data) {
    if ($this->unPdo != null) {
        $requete = "INSERT INTO Item (User_email_seller, name, sellBO, sellBID, sellBIN, category, info, delivery_price, price, fromTime, toTime, Itemcol) VALUES (:email, :name, :sellBO, :sellBID, :sellBIN, :category, :info, :delivery_price, :price, :fromTime, :toTime, :Itemcol);";
        $select = $this->unPdo->prepare($requete);
        $select->execute([
            ':email' => $email,
            ':name' => $data['name'],
            ':sellBO' => $data['sellBO'],
            ':sellBID' => $data['sellBID'],
            ':sellBIN' => $data['sellBIN'],
            ':category' => $data['category'],
            ':info' => $data['info'],
            ':delivery_price' => $data['delivery_price'],
            ':price' => $data['price'],
            ':fromTime' => $data['fromTime'],
            ':toTime' => $data['toTime'],
            ':Itemcol' => $data['Itemcol']
        ]);
        return true;
    } else {
        return false;
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


/***************************************  Your Account *********************************/
public function getUserByEmail($email) {
    try {
        $query = $this->unPdo->prepare("SELECT * FROM User WHERE email=:email");
        $query->execute([':email' => $email]);
        return $query->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

/***************************************  CART *********************************/

    // Retirer un article du panier
    public function removeFromCart($itemId) {
        $stmt = $this->unPdo->prepare("DELETE FROM cart WHERE item_id = :itemId");
        $stmt->bindParam(':itemId', $itemId);
        $stmt->execute();

        // Mettre à jour le total du panier après avoir retiré un article
        $this->updateCartTotal();
    }

    // Changer la quantité d'un article
    public function changeItemQuantity($itemId, $newQuantity) {
        $stmt = $this->unPdo->prepare("UPDATE cart SET quantity = :newQuantity WHERE item_id = :itemId");
        $stmt->bindParam(':newQuantity', $newQuantity);
        $stmt->bindParam(':itemId', $itemId);
        $stmt->execute();

        // Mettre à jour le prix total de l'article
        $this->updateItemTotal($itemId);

        // Mettre à jour le total du panier après avoir changé la quantité d'un article
        $this->updateCartTotal();
    }



    // Mettre à jour le prix total de l'article
    private function updateItemTotal($itemId) {
        $stmt = $this->unPdo->prepare("
            UPDATE cart 
            SET total = (SELECT price * quantity FROM cart WHERE item_id = :itemId)
            WHERE item_id = :itemId
        ");
        $stmt->bindParam(':itemId', $itemId);
        $stmt->execute();
    }

    // Adapter le prix total du panier
    public function updateCartTotal() {
        // Supposons que vous avez une table 'cart_total' avec une colonne 'total'
        $stmt = $this->unPdo->prepare("
            UPDATE cart_total 
            SET total = (SELECT SUM(total) FROM cart)
        ");
        $stmt->execute();
    }

    public function addItemToCard($itemId, $userEmail)
    {
    $query = "INSERT INTO Card (User_email, Item_idItem, Item_User_email_seller) VALUES (?, ?, ?)";
    $stmt = $this->unPdo->prepare($query);
    $stmt->execute([$userEmail, $itemId, $userEmail]);
    // Vous pouvez également ajouter des vérifications d'erreur et des messages de réussite ici
    }


/***************************************  Affiche tous *********************************/

    public function selectAll($table)
    {
        $requete = "select * from " . $table . ";";
        $resultat = $this->unPdo->query($requete);
        return $resultat->fetchAll();
    }
}