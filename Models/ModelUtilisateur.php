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
    public function Connexion($Email, $password){
        
        $sql = $this->db->query("SELECT profil FROM users WHERE Email = '".$Email."' AND password ='".$password."' ");
    

        if($res=$sql->fetch()){

            if($res["profil"]=="admin"){
                
                 header("location:../Views/administrateur.php");  
            }
            else
            {
                header("location:../Views/pageInformations.php");
                
            }
            var_dump($res);

            echo "Connexion établie";
        }
        else{
            echo"Login ou mot de passe incorrect";
        }

    }
    
    public function AjouterUsers(users $users) {
        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        $sql = $this->db->prepare("INSERT INTO users VALUES(NULL,?,?,?,?,?);");
        $sql->execute(array(
            $users->getNom(),
            $users->getPrenom(),
            $users->getEmail(),
            $hashedPassword, // Enregistrer le mot de passe haché
            $users->getprofil()
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

     

