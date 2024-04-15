<?php
include "C:/wamp64/www/commerce Electronique2/Projet Final/Models/ModificationUserController.php";
$servername="localhost";
$dbname="authentification";
$user="root";
$pass="";
// Contrôleur
class UserController {
    public function editUser($id) {
        // Récupérer l'utilisateur à modifier depuis la base de données
        $users = new users($id, "John", "Doe", "john.doe@example.com", "password123", "admin");
        var_dump($users);
        // Afficher le formulaire d'édition des informations de l'utilisateur
        include('../Views/EditUser.php');

        if ($_POST['submit']) {
            // Récupérer les nouvelles informations saisies par l'utilisateur
            $newPrenom = $_POST['Prenom'];
            $newNom = $_POST['Nom'];
            $newEmail = $_POST['Email'];
            $newPassword = $_POST['password'];
            $newProfil = $_POST['profil'];

            // Mettre à jour les informations de l'utilisateur
            $users->setPrenom($newPrenom);
            $users->setNom($newNom);
            $users->setEmail($newEmail);
            $users->setpassword($newPassword);
            $users->setprofil($newProfil);

            // Appeler le modèle pour effectuer les modifications en base de données
            $model=new ModelUtilisateur($dbco);
            $model->updateUser($users);

            // Rediriger l'utilisateur vers une page de confirmation
            header('Location: confirmation_page.php');
        }
    }
}
?>
