
<?php
session_start();

include_once("../PageConnexion/Connexion.php");
?>


<link rel="stylesheet" type="text/css" href="../Style/Style.css">



<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<a href="panier.php" class="link">Panier<span>
    <?php
    if(isset($_SESSION["panier"]) && is_array($_SESSION["panier"])){
        echo array_sum($_SESSION["panier"]);
    }
    ?></span></a>
</a>

    <section class="product_list">
        <?php
        $reponse= $dbco->prepare("SELECT * FROM produit");
        $reponse->execute();
        while($row= $reponse->fetch(PDO::FETCH_ASSOC)){

        
        ?>
        <form action="" method="post" class="product">
            <div>
                <img src = "../images/<?php echo $row["img"];?>" alt="">
                
                
            </div>

            <div>
                <h4><?php echo $row["nom"];?></h4>
                <h2><?php echo $row["prix"];?></h2>
               

                <a href="../Panier/AjouterPanier.php? id=<?php echo $row["id"];?>">Ajouter au panier</a>
            </div>
            </form>


           <?php } ?>
    </section>
    
</body>

</html>


