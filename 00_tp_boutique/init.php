<?php

// ######### CONNEXION A LA BDD #########

try {


    $bdd = new PDO("mysql:host=localhost;dbname=meubles","root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING  
    ]);

} catch(Exception $e){ // Injection de dépendance 
    die( "ERREUR CONNEXION BDD : " . $e->getMessage() );
}

function debug($value){
    echo "<pre>";
        print_r($value);
    echo "</pre>";
}

// Déclaration de 2 variables globales qui vont nous permettre de récupérer et stocker des messages 
$errorMessage = "";
$successMessage = "";




