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
    
    public function connexion($login,$password){

        return $this->model->connexion($login,$password);
    }
}
try{
    $dbco=new PDO ("mysql:host=$servername;dbname=$dbname",$user,$pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //Instanciation du modèle et du controleur
    $model=new ModelUtilisateur($dbco);
    $controller=new UserController($model);
    include("../Views/VueConnexion.php");

    var_dump($_POST);
    extract($_POST);

    $Nom=$_POST["Nom"];
    $passwors= $_POST["password"];
    //Récupérer les utilisateurs dans la base de données
    $Users=$controller->connexion($Nom,$password);
    //inclusion de la vue
    //include "C:/wamp64/www/commerce Electronique2/Projet Final/views/VueConnexion.php";
}
catch(PDOException $e){
    //Gérer l'erreur de connexion ici
    echo "Erreur de connexion : ".$e->getMessage();

}