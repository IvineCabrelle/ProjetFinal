<?php

$servername= "localhost";
$dbname= "authentification";
$user="root";
$pass="";


    $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);