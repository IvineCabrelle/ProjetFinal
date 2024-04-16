<?php
include "../class/users.php";
class ModelUtilisateur{
    private $db;
    public function __construct(PDO $db)
    {
        $this->db=$db;
    }
    public function getUsers(){
        try{
            $reponse=$this->db->prepare("SELECT*FROM users");
            $reponse->execute();
            $Utilisateur=array();
            while($row=$reponse->fetch (PDO::FETCH_ASSOC)){
                $Utilisateur[]=new users($row['id'],$row['Prenom'],$row['Nom'],$row['Email'],$row['password'],$row['profil']);
            }
            return $Utilisateur;
        }
        catch(PDOException $e){
            echo "Erreur lors de l'éxecution de la requete : ".$e->getMessage();
            return Array();
        }
    }
    public function Connexion($login,$password){
        
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        
        //$sql = $this->db->query("SELECT * FROM users WHERE Nom = '" . $login . "' AND password = '" . $password . "'");
        $sql = $this->db->prepare("SELECT * FROM users WHERE Nom = :login AND password = :password");
        $sql->execute(array(':login' => $login, ':password' => $password));

        if($res= $sql->fetch())
        {
            echo"Connexion établie";
            
            if($res["profil"]=="admin"){
                header("location:../Views/administrateur.php");
                
            }

        }
    else{
      echo "Login ou le mot de passe est incorrect";
     header("location:../Panier/PageAccueilPanier.php");
            
        }

    }
    public function AjouterUsers(users $users){
        $sql= $this->db->prepare("INSERT INTO users VALUES(NULL,?,?,?,?,?);");
        $sql->execute(array(
            $users->getPrenom(),
            $users->getNom(),
            
            $users->getEmail(),
            $users->getpassword(),
            $users->getprofil(),

            

        ));
    }
    // Modèle

    public function updateUser(users $users) {
        
        // Exemple d'une requête SQL d'UPDATE
        $query = "UPDATE users SET Prenom = '".$users->getPrenom()."', Nom = '".$users->getNom()."', Email = '".$users->getEmail()."', password = '".$users->getpassword()."', profil = '".$users->getprofil()."' WHERE id = ".$users->id;
        // Exécuter la requête SQL
        // mysqli_query($connection, $query);
    }
}
?>

     

?>