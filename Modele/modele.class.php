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
}
?>

    
