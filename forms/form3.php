<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/style3.css">
    <title>Formulaire d'Adresse</title>
</head>
<body>

<div class="container">
    <form method="POST" action="../Views/ResultatAddress.php">
        <?php
        session_start();
        //recuperation du nombre dadresses
        $addressNB = isset($_SESSION["number1"]["addressNB"]) ? $_SESSION["number1"]["addressNB"] : 0;
        //des champs preremplies
        for ($i = 1; $i <= $addressNB; $i++) {
            ?>
            <div class="form-group">
                <input type="hidden" name="action" value="addressForm">
                <center><h3>Adresse <?php echo $i; ?> </h3></center>
                <label for="street_name<?php echo $i; ?>">Street_name:</label>
                <input type="text" id="street_name<?php echo $i; ?>" name="street_name<?php echo $i; ?>"
                       value="<?php echo isset($_SESSION["formData"]["street_name$i"]) ? $_SESSION["formData"]["street_name$i"] : "" ?>">
                <br>
                <label for="street_nb<?php echo $i; ?>">street_nb:</label>
                <input type="number" id="street_nb<?php echo $i; ?>" name="street_nb<?php echo $i; ?>"
                       value="<?php echo isset($_SESSION["formData"]["street_nb$i"]) ? $_SESSION["formData"]["street_nb$i"] : "" ?>">
                <br>
                <label for="city<?php echo $i; ?>">City:</label>
                <select id="city<?php echo $i; ?>" name="city<?php echo $i; ?>">
                    <option value="Montreal" <?php echo (isset($_SESSION["formData"]["city$i"]) && $_SESSION["formData"]["city$i"] == "Montreal") ? "selected" : ""; ?>>Montreal</option>
                    <option value="Quebec" <?php echo (isset($_SESSION["formData"]["city$i"]) && $_SESSION["formData"]["city$i"] == "Quebec") ? "selected" : ""; ?>>Quebec</option>
                    <option value="Toronto" <?php echo (isset($_SESSION["formData"]["city$i"]) && $_SESSION["formData"]["city$i"] == "Toronto") ? "selected" : ""; ?>>Toronto</option>
                    <option value="Ottawa" <?php echo (isset($_SESSION["formData"]["city$i"]) && $_SESSION["formData"]["city$i"] == "Ottawa") ? "selected" : ""; ?>>Ottawa</option>
                    <option value="Laval" <?php echo (isset($_SESSION["formData"]["city$i"]) && $_SESSION["formData"]["city$i"] == "Laval") ? "selected" : ""; ?>>Laval</option>
                    <option value="Longueuil" <?php echo (isset($_SESSION["formData"]["city$i"]) && $_SESSION["formData"]["city$i"] == "Longueuil") ? "selected" : ""; ?>>Longueuil</option>
                </select>
                <br>
                <label for="province<?php echo $i; ?>">province:</label>
                <input type="text" id="province<?php echo $i; ?>" name="province<?php echo $i; ?>"
                       value="<?php echo isset($_SESSION["formData"]["province$i"]) ? $_SESSION["formData"]["province$i"] : "" ?>">
                <br>
                <label for="zip_code<?php echo $i; ?>">Zip_code:</label>
                <input type="text" id="zip_code<?php echo $i; ?>" name="zip_code<?php echo $i; ?>"
                       value="<?php echo isset($_SESSION["formData"]["zip_code$i"]) ? $_SESSION["formData"]["zip_code$i"] : "" ?>">
                <br>
                <label for="country<?php echo $i; ?>">country:</label>
                <input type="text" id="country<?php echo $i; ?>" name="country<?php echo $i; ?>"
                       value="<?php echo isset($_SESSION["formData"]["country$i"]) ? $_SESSION["formData"]["country$i"] : "" ?>">
                <br>
            </div>
        <?php }; ?>
        <center>
            <input type="submit" value="Submit">
        </center>
    </form>
</div>

</body>
</html>