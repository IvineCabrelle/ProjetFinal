<?php
include "C:/wamp64/www/commerce Electronique2/Projet Final/Models/ModelUtilisateur.php";
$servname="localhost";
$dbname="authentification";
$user="root";
$pass="";
class UserController{
    private $model;
    public function __construct(ModelUtilisateur $model)
    {
       $this->model=$model; 
    }
    
    public function getUsers(){
        return $this->model->getUsers();
    }
}
try{
    $dbco=new PDO("mysql:host=$servname;dbname=$dbname",$user,$pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //Instanciation du modéle et du controleur
    $model=new ModelUtilisateur($dbco);
    $controller=new UserController($model);
    //Récuperation des utilisateurs
    $Users=$controller->getUsers();
    //inclusion de la vue
    include "C:/wamp64/www/commerce Electronique2/Projet Final/views/VueInscription.php";
    
}
catch(PDOException $e){
    //Gérer l'erreur de connexion ici
    echo "Erreur de connexion : ".$e->getMessage();

}
?>