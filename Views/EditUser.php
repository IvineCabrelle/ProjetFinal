Vue : edit_user_view.php'
<?php $users= new users() ?>
<form action="../Controller/ModificationUserController.php" method="post">
    Prenom: <input type="text" name="Prenom" value="<?= $users->getPrenom(); ?>"><br>
    Nom: <input type="text" name="Nom" value="<?php echo $users->getNom(); ?>"><br>
    Email: <input type="email" name="Email" value="<?php echo $users->getEmail(); ?>"><br>
    Mot de passe: <input type="password" name="password" value="<?php echo $users->getpassword(); ?>"><br>
    Profil: <input type="text" name="profil" value="<?php echo $users->getprofil(); ?>"><br>
    <input type="submit" name="submit" value="Enregistrer">
<!-- </form> -->