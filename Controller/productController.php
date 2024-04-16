<?php

include_once("../PageConnexion/Connexion.php");

function connectDB()
{
    $servername = "localhost";
    $dbname = "authentification";
    $user = "root";
    $pass = "";
    
    try {
        $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $dbco;
    } 
    catch(PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}

function createProduct(array $data)
{
    $dbco = connectDB();
    
    $query = "SELECT * FROM produit WHERE name = :name";
    $stmt = $dbco->prepare($query);
    $stmt->bindParam(':name', $data['name']);
    
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $data;
}

function deleteProduct($id)
{
    $dbco = connectDB();
    
    $query = "SELECT * FROM produit WHERE id = :id";
    $stmt = $dbco->prepare($query);
    $stmt->bindParam(':id', $id);
    
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $data;
}

function updateProduct(array $data)
{
    $dbco = connectDB();
    
    $query = "UPDATE produit SET img = :img, prix = :prix, nom = :nom WHERE id = :id";
    $stmt = $dbco->prepare($query);
    
    $stmt->bindParam(':img', $data['img']);
    $stmt->bindParam(':prix', $data['prix']);
    $stmt->bindParam(':nom', $data['nom']);
    $stmt->bindParam(':id', $data['id']);
    
    $stmt->execute();
    
    echo "Produit modifié avec succès";
}

function getProductByName($name)
{
    $dbco = connectDB();
  
    $query = "SELECT * FROM produit WHERE name = :name";
    $stmt = $dbco->prepare($query);
    $stmt->bindParam(':name', $name);
    
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $data;
}

function getProductById($id)
{
    $dbco = connectDB();
  
    $query = "SELECT * FROM produit WHERE id = :id";
    $stmt = $dbco->prepare($query);
    $stmt->bindParam(':id', $id);
    
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $data;
}

function getAllProducts()
{
    $dbco = connectDB();
    
    $query = "SELECT * FROM produit";
    $stmt = $dbco->query($query);
    
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $data;
}

?>
