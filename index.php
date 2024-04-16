<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Pages d'accueil</title>
    <style>
        /* Style pour le corps de la page */
        body {
            background-color: powderblue;
            font-family: Arial, sans-serif;
        }

        /* Style pour le titre principal (h1) */
        h1 {
            color: blue;
            text-align: center;
            margin-top: 20px;
        }

        /* Style pour les sous-titres (h2) */
        h2 {
            color: #00539f;
            margin-top: 10px;
        }

        /* Style pour les liens (a) */
        a {
            color: red;
            text-decoration: none;
            margin-right: 10px;
        }
        *{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>
    <strong>Bienvenue sur notre site de commerce en ligne</strong>
    </h1>
    <h2>Êtes-vous un nouvel utilisateur ?</h2>
    <a href="./Views/VueInscription.php">S'enregistrer</a>
    <h2>Êtes-vous un ancien utilisateur ? Si oui, connectez-vous !</h2>
    <a href="./Views/VueConnexion.php">Se connecter</a>
</body>
</html>


