<?php
session_start();

if(isset($_GET["del"])){
    $id_del=$_GET["del"];
    unset($_SESSION["panier"][$id_del]);
}

header("Location:../Panier/panier.php");


?>