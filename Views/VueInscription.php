<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travaux Pratiques</title>
    <style>
        
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2; /* Couleur d'arrière-plan */
        }
        .form-container {
            max-width: 400px; /* Largeur maximale du formulaire */
            padding: 20px;
            background-color: #ffffff; /* Couleur de fond du formulaire */
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-container label {
            display: block;
            margin-bottom: 10px;
        }
        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .login-message {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <p class="welcome-message"><strong>Bienvenue sur notre page d'inscription en ligne</strong></p>
        
        <div class="form-container">

        <form action="../Controller/InscriptionController.php" method="post">

            <label for="Prenom">Prénom d'utilisateur :</label>
            <input type="text" id="Prenom" name="Prenom" required>

            <label for="Nom">Nom d'utilisateur :</label>
            <input type="text" id="Nom" name="Nom" required>

            <label for="Email">Adresse e-mail :</label>
            <input type="email" id="Email" name="Email" required>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>

            
            <input type="profil" id="profil" name="profil" value="client" hidden>

            <button type="submit">S'inscrire</button>
            <p class="login-message">Déjà un compte ? <a href="../Views/VueConnexion.php">Connectez-vous ici</a></p>
            <p class="login-message">Adresse : <a href="../forms/form1.php">Ajouter vos adresses ici</a>
        </form>
    </div>
    
</body>
</html>
