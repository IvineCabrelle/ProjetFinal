<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Style/styleResult.css">
    <title>Confirmation d'Adresse</title>
</head>
<body>

<div class="container">
    <a href='../forms/form1.php'>Retour</a>

    <?php
    require_once('../PageConnexion/Connexion.php');
    require_once('../functions/validation.php');
    require_once("../Controller/addressController.php");

    session_start();

    $addressNB = isset($_SESSION["number1"]["addressNB"]) ? $_SESSION["number1"]["addressNB"] : 0;
    $allAddressesValid=true;

    for ($i = 1; $i <= $addressNB; $i++) {
        // Recuperer les donnees dans $_SESSION pour les utiliser dans resultValidation.php pour les ajouter a la base de donnees
        $_SESSION["formData"]["street_name$i"] = $_POST["street_name$i"];
        $_SESSION["formData"]["street_nb$i"] = $_POST["street_nb$i"];
        $_SESSION["formData"]["city$i"] = $_POST["city$i"];
        $_SESSION["formData"]["province$i"] = $_POST["province$i"];
        $_SESSION["formData"]["zip_code$i"] = $_POST["zip_code$i"];
        $_SESSION["formData"]["country$i"] = $_POST["country$i"];

        // Validation des adresses
        $street_nameIsValid = street_nameIsValid($_POST["street_name$i"]);
        $zip_codeIsValid = zip_codeIsValid($_POST["zip_code$i"]);
        $provinceIsValid=provinceIsValid($_POST["province$i"]);
        $countryIsValid=countryIsValid($_POST["country$i"]);
        $addressIsValid = addressIsValid($_POST["country$i"], $_POST["zip_code$i"]);
        
        if (!$street_nameIsValid["isValid"] || !$zip_codeIsValid["isValid"] || !$addressIsValid["isValid"]) {
            $allAddressesValid = false;
            // Afficher les erreurs et passer a l'iteration suivante 
            echo "<h1 class='error'>Erreur dans l'adresse $i :</h1>";
            echo "<p class='error'>" . $street_nameIsValid["msg"] . "</p>";
            echo "<p class='error'>" . $zip_codeIsValid["msg"] . "</p>";
            echo "<p class='error'>" . $addressIsValid["msg"] . "</p>";
            echo "<p class='error'>" . $provinceIsValid["msg"] . "</p>";
            echo "<p class='error'>" . $countryIsValid["msg"] . "</p>";
        };};

        // Afficher toutes les adresses quand elles sont toutes valides
        if ($allAddressesValid) {
            for ($i = 1; $i <= $addressNB; $i++) {
                echo "<p>street_name: " . $_SESSION["formData"]["street_name$i"] . "</p>";
            echo "<p>Street Number: " . $_SESSION["formData"]["street_nb$i"] . "</p>";
            echo "<p>province: " . $_SESSION["formData"]["province$i"] . "</p>";
            echo "<p>City: " . $_SESSION["formData"]["city$i"] . "</p>";
            echo "<p>zip_code: " . $_SESSION["formData"]["zip_code$i"] . "</p><br>";
            echo "<p>country: " . $_SESSION["formData"]["country$i"] . "</p><br>";

            }
        }

    ?>

    <?php if ($street_nameIsValid["isValid"] && $zip_codeIsValid["isValid"] && $addressIsValid["isValid"]) : ?>
        <div class="buttons">
            <!-- Revenir a un formulaire pour modifier avec des champs préremplis -->
            <a href='../forms/form3.php'>
                <input type='button' id='modifier' name='modifier' value='Modifier'>
            </a>

            <!-- Ajouter les adresses a la base de données -->
            <a href='../functions/resultValidation.php'>
                <input type='button' id='valider' name='valider' value='Valider'>
            </a>
        </div>
    <?php endif; ?>
</div>

</body>
</html>