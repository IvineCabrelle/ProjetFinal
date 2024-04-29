<?php
session_start();

require_once('../PageConnexion/Connexion.php');
require_once('../Controller/productController.php');

require_once("../functions/function.php");


$servername= "localhost";
$dbname= "authentification";
$user="root";
$pass="";


    $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

var_dump($_POST);

  if(isset($_POST['img']) && isset($_POST['prix']) && isset($_POST['nom'])) {

      $data = array(
        "img" => $_POST['img'],
        "prix" => $_POST['prix'],
        "nom" => $_POST['nom']
      );
    
      if(createProduct($data)) {

          echo "Produit ajouté avec succès";  
      } 
      else {
          echo "Erreur lors de l'ajout du produit";
      }
    } else {
      echo "Veuillez remplir tous les champs du formulaire";
    }
    
?>
<p class="login-message">Panier <a href="../Panier/PageAccueilPanier.php">Voir Panier</a></p>



