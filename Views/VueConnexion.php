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
            background-color: #f2f2f2; 
        }
        .form-container {
            max-width: 400px; 
            padding: 20px;
            background-color: #ffffff; 
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
        <p class="welcome-message"><strong>Bienvenue sur notre page de connexion en ligne</strong></p>
        <div class="form-container">
        <form action="../Controller/ConnexionController.php" method="post">
           
            <label for="Nom">Nom d'utilisateur :</label>
            <input type="text" id="Nom" name="Nom" required>
           
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Se connecter</button>
            <p class="login-message">Vous n'avez pas de compte ? <a href="../Views/VueInscription.php">Inscrivez-vous</a></p>
        </form>
    </div>
</body>
</html>
