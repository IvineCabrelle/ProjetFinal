<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <link rel="stylesheet" type="text/css" href="../Style/styleResultVal.css">
    <title>Confirmation d'Adresse</title>
</head>
<body>

<div class="container">
    <?php
    require_once('../PageConnexion/Connexion.php');
    require_once('../functions/validation.php');
    require_once("../Controller/addressController.php");
    session_start();

    $addressNB = isset($_SESSION["number1"]["addressNB"]) ? $_SESSION["number1"]["addressNB"] : 0;
    for ($i = 1; $i <= $addressNB; $i++) {

        $newAddressData = [
            "street_name" => $_SESSION["formData"]["street_name$i"],
            "street_nb" => $_SESSION["formData"]["street_nb$i"],
            "city" => $_SESSION["formData"]["city$i"],
            "province" => $_SESSION["formData"]["province$i"],
            "zip_code" => $_SESSION["formData"]["zip_code$i"],
            "country" => $_SESSION["formData"]["country$i"]
        ];

        // Ajouter l'adresse dans la base de données
        createAddress($newAddressData);

        // Afficher le message de succès
        echo "<p class='success-message'>L'adresse $i a été ajoutée avec succès.</p>";
    }
    ?>

    <br><br><br><br>

    <p>Merci d'avoir utilisé mon site. Si vous souhaitez ajouter plus d'adresses, cliquez sur le lien ci-dessous.</p>
    <a href="../forms/form1.php" class="return-link">Retour</a>
    <p>Merci d'avoir utilisé mon site. Si vous souhaitez ajouter plus d'adresses, cliquez ici pour vous connecter.</p>
    <a href="../Views/VueConnexion.php" class="return-link">Login</a>
</div>

</body>
</html>