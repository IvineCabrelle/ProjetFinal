<?php
session_start();

include_once("../PageConnexion/Connexion.php");

if(isset($_GET["del"])){
    $id_del=$_GET["del"];
    unset($_SESSION["panier"][$id_del]);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="panier">
    
<a href="./PageAccueilPanier.php" class="link">Boutique</a>
<section>
    <table>
        <tr>
            <th></th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Quantite</th>
        </tr>

        <?php
        $total=0;
        if(isset($_SESSION["panier"]) && is_array($_SESSION["panier"])){
            $ids= array_keys($_SESSION["panier"]);
        }if(empty($ids)){
            echo "Votre panier est vide";
        } else{

            $produits= $dbco->prepare("SELECT * FROM produit WHERE id IN (".implode(',', $ids).")");
            $produits->execute();

            foreach($produits as $produit):
                $total = $total + $produit["prix"]* $_SESSION["panier"][$produit["id"]];

                ?>
                <tr>
                    <td><img src="./images/<?= $produit["img"]?>" alt=""></td>
                    <td><?= $produit["nom"]?></td>
                    <td><?= $produit["prix"]?></td>
                   <td><?= $_SESSION["panier"][$produit["id"]]?></td> 
                   <td><a href="panier.php?del=<?=$produit["id"]?>"><img src="delete.png" alt=""></a></td>
                </tr>

                <?php endforeach; } ?>
        
                <tr class="total">
                    <th>total: <?=$total?></th>
                </tr>



    </table>
</section>
</body>
</html>