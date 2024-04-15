<?php
class users {
    public $id;
    public $prenom;
    public $nom;
    public $Email;
    public $password;
    public $profil;

    // Constructeur
    public function __construct($id,$prenom, $nom, $Email, $password,$profil) {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->Email = $Email;
        $this->password = $password;
        $this->profil = $profil;

        
    }

    // Getters
    public function getPrenom() {
        return $this->prenom;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getEmail() {
        return $this->Email;
    }
    public function getpassword() {
        return $this->password;
    }

    public function getprofil() {
        return $this->profil;
    }

    // Setters
    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setEmail($Email) {
        $this->Email = $Email;
    }

    public function setpassword($password) {
        $this->password = $password;
    }

    public function setprofil($profil) {
        $this->profil = $profil;
    }
    public function getid($id) {
        $this->id = $id;
    }
}
?>
