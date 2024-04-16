<?php
require_once("../Controller/addressController.php");

//validation de street_name de l'address
function  street_nameIsValid($street_name): array
{
    $result = [
        'isValid' => true,
        'msg' => ''
    ];
    echo '<br><br>';
    if (strlen($street_name) > 50) {
        $result = [
            'isValid' => false,
            'msg' => "Le nom de rue ($street_name) utilisé est trop long."
        ];
    }
    return $result;
}

//validation des adresses: verifié si elle est deja dans la base de donnees 
function addressIsValid($country, $zip_code): array
{
    $result = [
        'isValid' => true,
        'msg' => ''
    ];
    $addressInDB=getUserBycountryAndzip_code($country,$zip_code);

    if ($addressInDB) {

        $result = [
            'isValid' => false,
            'msg' => "cette adresse dont la country est $country et zip_code est $zip_code est deja utilisée ."
        ];
    }
    return $result;
}

//validation du country
function countryIsValid($country): array
{
    $result = [
        'isValid' => true,
        'msg' => ''
    ];
    echo '<br><br>';

    if (strlen($country) !=4) {
        $result = [
            'isValid' => false,
            'msg' => "le nom du pays utilisé ($country) contient plus ou moins de 4 caracteres."
        ];
    }
    return $result;
}
// validation du zipcode
function zip_codeIsValid($zip_code): array
{
    $result = [
        'isValid' => true,
        'msg' => ''
    ];
    echo '<br><br>';
    if (strlen($zip_code) !=6 ) {
        $result = [
            'isValid' => false,
            'msg' => "le code postale utilisé ($zip_code) contient plus ou moins de 6 caracteres."
        ];
    }
    return $result;
}
// validation de la province
function provinceIsValid($province): array
{
    $result = [
        'isValid' => true,
        'msg' => ''
    ];
    echo '<br><br>';
    if (strlen($province) !=5 ) {
        $result = [
            'isValid' => false,
            'msg' => "le nom de la province utilisé ($province) contient plus ou moins de 5caracteres."
        ];
    }
    return $result;
}

function addressNbIsValid($word){
// Vérifier si l'entrée est un nombre
if (is_numeric($word)) {
    return true; // L'entrée est un nombre
} else {
    return false; // L'entrée n'est pas un nombre
}
}
?>