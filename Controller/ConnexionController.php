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
    
    public function connexion($Email,$password){

        return $this->model->connexion($Email,$password);
    }
}
try{
    $dbco=new PDO ("mysql:host=$servername;dbname=$dbname",$user,$pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $model= new ModelUtilisateur($dbco);
    $controller= new UserController($model);

    // if(isset($submit)){
    //     $modelUser = new ModelUtilisateur($dbco);
    //     $UserController=new UserController($modelUser);
    //     $user= $UserController->connexion($Email,$password);


    // }
    include_once("../Views/VueConnexion.php");

    var_dump($_POST);
    extract($_POST);
    $Email=$_POST["Email"];
    $passwors= $_POST["password"];
    //Récupérer les utilisateurs dans la base de données
     $Users=$controller->connexion($Email,$password);
    var_dump($Users);
    //inclusion de la vue
    //include "C:/wamp64/www/commerce Electronique2/Projet Final/views/VueConnexion.php";
}
catch(PDOException $e){
    //Gérer l'erreur de connexion ici
    echo "Erreur de connexion : ".$e->getMessage();

}