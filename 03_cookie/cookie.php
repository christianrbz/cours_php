<?php 

/*
    Un cookie est un petit fichier (4ko max) déposé par le serveur dans le navigateur. Les cookies sont renvoyés automatiquement vers le serveur par le navigateur quand l'internaute navigue dans les pages concernées par les cookies.
    PHP permet de récupérer très facilement les cookies grâce à la superglobales $_COOKIE

    ATTENTION on ne met pas de données sensibles dans un cookie (mdp, cb ...) car ils sont stockés sur le navigateur et donc accessibles par les utilisateurs. 

    En Europe, le bandeau d'acceptation ou de refus des cookies est obligatoire. On doit respecter les règles RGPD. 

*/
    // print_r($_GET);

    // Je définie une valeur par défaut à la variable $langue 
    $langue = $_COOKIE["langue"] ?? "fr"; 

    if(isset($_GET['langue'])){ // Si j'ai cliqué sur un lien 
        $langue = $_GET['langue']; // Si je définie la valeur récupérée dans la variable $langue 
    }

    // Je définie ici un cookie
    // Le premier paramètre de la fonction setcooki() est son nom
    // Le premier paramètre de la fonction setcooki() est sa valeur
    // Le premier paramètre de la fonction setcooki() est sa date d'expiration exprimée en secondes (on utilise le timestamp)
    // Il existe la fonction time() qui permet de récupérer la date du jour en secondes. On rajoute à cette valeur le nombre de secondes que l'on souhaite pour atteindre la date d'expiration. 
    // Ici j'ai calculé une durée de vie d'un an.
    $un_an = time() + 60*60*24*365;
    // setcookie("langue", $langue, time()+10); // ici pour 10secondes
    setcookie("langue", $langue, $un_an);


    // print_r($_COOKIE);


?>

<h1>Choix de la langue</h1>

<h2>Langue Sélectionnée : <?= $langue ?></h2>

<ul>
    <li><a href="?langue=fr">Français</a></li>
    <li><a href="?langue=en">Anglais</a></li>
    <li><a href="?langue=es">Espagnol</a></li>
    <li><a href="?langue=it">Italien</a></li>
</ul>

