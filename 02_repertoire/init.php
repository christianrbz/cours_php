<?php

// ######### CONNEXION A LA BDD #########

// try{}catch(){} va nous permettre de tester le code; S'il fonctionne alors je ne rentre pas dans le catch. Si par contre j'ai une erreur, ce catch va me permettre de récupérer l'erreur (le message). 
try {

    // PDO : PHP Data Object 
    // MYSQLI => ancienne méthode de connexion
    /*
        Le premier paramètre de la classe PDO est le DSN (Data Source Name).
            On doit lui indiquer le type de BDD (ici mysql)
            On doit également lui préciser le host (ici localhost, cette information est fourni par l'hébergeur quand vous payez votre abonnement)
            Enfin on doit lui préciser le nom de la BDD sur laquelle je souhaite me connecter (ici php_annuaire)
        Le deuxième paramètre est le nom d'utilisateur pour se connecter à la BDD. En local le username sera toujours 'root'
        Le troisième paramètre est le mot de passe.
            Pour MAMP le mdp sera 'root'
            Pour les autres le mdp est une chaine de caractères vide 
        Le dernier paramètre correspond aux options/réglages de notre connexion.
    */
    $bdd = new PDO("mysql:host=localhost;dbname=php_annuaire","root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING  // Cette option me permet de faire de l'affichage de messages d'erreurs 
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




