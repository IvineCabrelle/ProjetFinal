<?php
include "C:/wamp64/www/commerce Electronique2/Projet Final/Models/ModelUtilisateur.php";
$servername="localhost";
$dbname="authentification";
$user="root";
$pass="";

class UserController{

    private $model;

    public function __construct(ModelUtilisateur $model)
    {
       $this->model=$model; 
    }
    
    public function AjouterUsers(users $users){

        return $this->model->AjouterUsers($users);
    }
}

try{

    $dbco=new PDO ("mysql:host=$servername;dbname=$dbname",$user,$pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //Instanciation du modèle et du controleur
    $model=new ModelUtilisateur($dbco);
    
    $controller=new UserController($model);
    include("../Views/VueInscription.php");
    
    $Prenom=$_POST['Prenom'];

    $Nom=$_POST['Nom'];

    $Email=$_POST['Email'];

    $password= $_POST['password'];

    $profil=$_POST['profil'];

    $users=new users(0,$Prenom,$Nom,$Email,$password,$profil);

    var_dump($users);

    //Recupération des utilisateurs

    $Users=$controller->AjouterUsers($users);

    //iNCLURE LA VUE
}
catch(PDOException){
 //Gérer l'erreur de connexion ici
 echo "Erreur de connexion : ".$e->getMessage();
}
?>