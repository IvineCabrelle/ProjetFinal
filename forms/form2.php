<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="../Style/style2.css">
    <title>Document</title>
</head>
<body>

<?php 
require_once('../functions/validation.php');
    session_start();
    $address = isset($_POST["address"]) ? $_POST["address"] : 0;
//recuperer le nombre d'adresses pour pouvoir lutiliser dans les autres boucles
    $_SESSION["number1"]["addressNB"] = $_POST["address"];
// affichage des formulaires repeated le nombre de fois que lutilisateur veut
if (addressNbIsValid($address)) {
    // L'entrée est un nombre, vous pouvez poursuivre le traitement
    echo"<center>
    <h2>Les donnees de vos adresses</h2>
    <a href='form1.php'>Retour</a>
</center>";
for ($i = 1; $i <= $address; $i++) {
    ?>
    <form method="POST" action="../Views/ResultatAddress.php">
        <div class="form-group">
        <input type="hidden" name="action" value="addressForm">
            <center><h3>adresse <?php echo $i; ?> </h3></center>
            <label for="street_name<?php echo $i; ?>">street_name:</label>
            <input type="text" id="street_name<?php echo $i; ?>" name="street_name<?php echo $i; ?>" value="">
            <br>
            <label for="street_nb<?php echo $i; ?>">street_nb:</label>
            <input type="text" id="street_nb<?php echo $i; ?>" name="street_nb<?php echo $i; ?>" value="">
    
            <br>
            <label for="city<?php echo $i; ?>">City:</label>
            <select id="city<?php echo $i; ?>" name="city<?php echo $i; ?>">
                <option value="Montreal">Montreal</option>
                <option value="Quebec">Quebec</option>
                <option value="Toronto">Toronto</option>
                <option value="Ottawa">Ottawa</option>
                <option value="Laval">Laval</option>
                <option value="Longueuil">Longueuil</option>
            </select>
            <br>
            <label for="province<?php echo $i; ?>">Province:</label>
            <input type="text" id="province<?php echo $i; ?>" name="province<?php echo $i; ?>" value="">
            <br>
            <label for="zip_code<?php echo $i; ?>">Zipcode:</label>
            <input type="text" id="zip_code<?php echo $i; ?>" name="zip_code<?php echo $i; ?>" value="">
            <br>
            <br>
            <label for="country<?php echo $i; ?>">country:</label>
            <input type="text" id="country<?php echo $i; ?>" name="country<?php echo $i; ?>" value="">
            <br>

        </div>
        <?php }; ?>
        <center>
            <input type="submit" value="Submit">
        </center>
    </form>
 <?php }else {
    // L'entrée n'est pas un nombre, afficher un message d'erreur
    echo 'Veuillez saisir un nombre valide.';
}?>

<a href='form1.php'>Retour</a>
</body>
</html>
