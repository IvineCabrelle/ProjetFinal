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

function createProduct(array $data) {
    $conn = connectDB(); // Assurez-vous que cette fonction renvoie une connexion valide

    // Utilisez la variable $conn correctement ici
    var_dump('création de nouveau produit dans authentification');

    // Vérifier si le champ 'img' est renseigné
    if(empty($data['img'])) {
        echo "Le champ 'img' ne peut pas être vide";
        return;
    }

    $query = "INSERT INTO produit (id, img, prix, nom) VALUES (null, :img, :prix, :nom)";
    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':img', $data['img']);
        $stmt->bindParam(':prix', $data['prix']);
        $stmt->bindParam(':nom', $data['nom']);
        $stmt->execute();
        echo "Produit créé avec succès";
    } catch (PDOException $e) {
        echo "Erreur lors de la création du produit : " . $e->getMessage();
    }
}



function deleteProduct($id)
{
    global $conn;

    /* Query permettant de delete un produit en ayant juste son id */
    $query = "DELETE FROM product
                WHERE id = ?;";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param(
            $stmt,
            "i",
            $id,
        );

        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
    }
    echo "Suppression de produit réussie";
    //var_dump($result);
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
