<?php
class Modele 
{
    private $unPdo ; 

    public function __construct ()
    {
        $this->unPdo = null;
        //connexion à la base de données en utilisant PDO(php data objet)
        try{
            $this->unPdo = new PDO ("mysql:host=localhost;dbname=VenteSneakers","root","root"); 
            // root c'est pour les mac
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


}

?>

    
