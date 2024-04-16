<?php

include "C:/wamp64/www/commerce Electronique2/Projet Final/Models/ModelUtilisateur.php";


function createAddress(array $data)
{
    var_dump('création de nouvel address dans user');

    $servername = "localhost";
    $dbname = "authentification";
    $user = "root";
    $pass = "";
    
    try {
        $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "INSERT INTO address VALUES (Null, ?, ?, ?, ?, ?, ?);";
        $stmt = $dbco->prepare($query);
        
        $stmt->bindParam(1, $data['street_name']);
        $stmt->bindParam(2, $data['street_nb']);
        $stmt->bindParam(3, $data['city']);
        $stmt->bindParam(4, $data['province']);
        $stmt->bindParam(5, $data['zip_code']);
        $stmt->bindParam(6, $data['country']);

        $result = $stmt->execute();

        echo "<br> <br>";
        echo "<br> <br>";
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}


// but: utiliser cette fonction pour pouvoir valider l'adresse dans validation.php
function getUserBycountryAndzip_code($country,$zip_code)
{
    global $dbco;

    $query = "SELECT * FROM address WHERE country = :country AND zip_code = :zip_code";
    
    $stmt = $dbco->prepare($query);
    $stmt->bindParam(':country', $country, PDO::PARAM_STR);
    $stmt->bindParam(':zip_code', $zip_code, PDO::PARAM_STR);
    
    $stmt->execute();
    
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $data;
}


?>


