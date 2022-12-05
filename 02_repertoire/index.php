<?php

// ############## TRAITEMENT PHP ############## 

// Nous allons créer un formulaire pour pouvoir ajouter des contacts à ma base de données

// ######## ETAPE 1 - CREATION DE LA BDD ########

/* 
Nom de la BDD : php_annuaire
Nom de la  table : contact
Colonnes :
id          INT PRIMARY_KEY AUTO_INCREMENT
nom         VARCHAR(50) NOT NULL 
prenom      VARCHAR(50) NOT NULL 
telephone   VARCHAR(10) NOT NULL 
photo       VARCHAR(255) NOT NULL 
*/
// ######### ETAPE 4 - APPEL DU FICHIER init.php ########
/*
    require_once me permet de faire l'inclusion dans fichier. On utilise require pour dire que notre fichier est obligatoire. Si le fichier mentionné n'est pas trouvé alors j'aurais une FATAL ERROR.
    'once' précise que je ne souhaite récupérer qu'une seule fois le fichier init.php 
    Si plus tard dans mon code j'essaie de faire un require_once de init.php alors ce deuxième require_once ne sera pas exécuté 

    require_once => appel obligatoire d'un fichier 1 seule fois 
    require      => appel obligatoire d'un fichier (je peux appeler plusieurs fois ce même fichier)

        Avec les require, si le fichier n'est pas trouvé j'aurais une FATAL ERROR 

    include_once => appel d'un fichier 1 seule fois qui n'est pas obligatoire
    include      => appel d'un fichier qui n'est pas obligatoire (je peux appeler plusieurs fois ce même fichier) 

    IMPORTANT !! On appelera toujours en premier le fichier init.php 

*/
require_once "init.php";



// ######### ETAPE 3 - PRESENTATION DE LA SUPERGLOBAL $_POST ########
// SuperGlobal ce sont des variables créé par PHP qui vont nous permettre de récupérer des données spécifiques. 
// Toutes les superglobales commencent avec '$_' et elles sont écrites en MAJUSCULE 
// Ce sont obligatoirement des tableaux (array)

// $_POST permet de récupérer les données saisies dans un formulaire (si ce formulaire est en méthode 'post')
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// debug($_POST);
// echo $_POST['prenom'];

// ######### ETAPE 5 - TRAITEMENT ET ENVOIE DES DONNEES EN BDD ########

// Je vérifie si le formulaire a été validé
if (!empty($_POST)) { // Si $_POST n'est pas vide c'est que j'ai cliqué sur le bouton de validation


    if (!empty($_FILES['photo']['name'])) {
        // Nous avons accès à $_FILES car dans mon formulaire j'ai précisé le enctype avec la valeur multipart/form-data. 
        // $_FILES est une superglobale
        // debug($_FILES);

        /*
        La fonction copy() me permet de copier un fichier sur mon serveur. 
        J'ai besoin de l'emplacement de départ (ou est-ce que je peux récupérer cette photo). Ici l'emplacement de départ se trouve sur mon serveur dans un dossier temporaire qui contient les informations de ma photo. ($_FILES['photo']['tmp-name'])
        En deuxième paramètre j'ai besoin d'indiquer où sur mon serveur je souhaite stocker cette nouvelle photo. Ici je souhaite la mettre dans mon dossier 'photos'. Et je dois lui indiquer en plus le nom de cette photo. 
    */
        copy($_FILES['photo']['tmp_name'], "photos/" .time()."-". $_FILES['photo']['name']);
    } // FIN DE CONDITION !empty($_FILES)



    // On va préparer une requête SQL (Structured Query Language)
    $requete = $bdd->prepare("INSERT INTO contact(nom, prenom, telephone, photo) VALUES (:nom, :prenom, :telephone, :photo)");

    // debug($requete);

    $success = $requete->execute(
        [
            ':nom' => $_POST['nom'],
            ':prenom' => $_POST['prenom'],
            ':telephone' => $_POST['telephone'],
            ':photo' => time() . "-" . $_FILES['photo']['name']
        ]
    );
    // La simple flèche (->) est utilisé pour les objets.
    // La double flèche (=>) est utilisé dans les tableaux (à gauche on a l'indice, à droite la valeur) 

    /**
     * Dans la méthode prepare() de l'objet PDO ($bdd) nous mettons une requête SQL entre "". Cette requête signie : insert dans la table contact, dans les colonnes (champs) nom, prenom, telephone, photo les valeurs présentent dans le formulaire. 
     * 
     * On ne passe pas les valeurs directement dans notre requête. On doit préparer la requête et lui donner des paramètres nommés comme valeurs. Cela permet de sécuriser (un peu) notre requête. L'ordre des valeurs doit correspondre à l'ordre des colonnes. 
     * 
     * Une fois la requête préparée on doit l'exécuter en lui donnant des valeurs réelles. Ces valeurs sont récupérées depuis le formulaire dans la variable $_POST
     * 
     * La méthode prepare() nous retourne un objet de la classe PDOStatement (ici j'ai stocké ce retour à l'intérieur de $requete).
     * Ce nouvel objet contient des méthodes, dont execute() qui va nous permettre d'exécuter une requête. 
     */

    /**
     */

    // Je vérifie la valeur de success 
    if ($success) {
        // Si sa valeur est 'TRUE' alors j'envoie un message de succès
        $successMessage = "Bravo le contact a bien été enregistré !";
    } else {
        // Sinon j'envoie un message d'erreur
        $errorMessage = "Erreur lors de l'enregistrement !";
    }
} // FIN DE CONDITION POUR LA VALIDATION DU FORMULAIRE


?>

<!-- ############## Affichage HTML ##############-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Contact</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <h1 class="text-center mt-5">Ajouter Contact</h1>

        <!-- Affichage des messages de succès et d'erreur -->

        <!-- Première méthode d'affichage en combinant PHP et HTML -->
        <?php if (!empty($successMessage)) { ?>
            <div class="alert alert-success col-md-6 mx-auto text-center">
                <?php echo $successMessage; ?>
            </div>
        <?php } ?>

        <!-- Deuxième méthode d'affichage uniquement en PHP -->
        <?php if (!empty($successMessage)) {
            echo '<div class="alert alert-success col-md-6 mx-auto text-center">';
            echo $successMessage;
            echo '</div>';
        } ?>

        <?php if (!empty($errorMessage)) { ?>
            <div class="alert alert-success col-md-6 mx-auto text-center">
                <?php echo $errorMessage; ?>
            </div>
        <?php } ?>



        <!-- ############## ETAPE 2 - CREATION DU FORMULAIRE ##############-->
        <!-- 
            L'attribut 'method' permet de spécifier comment on souhaite faire transiter nos données entre le serveur et le client. 
            2 options : GET => envoie dans l'url
            POST => envoie ... A COMPLETER !!!
            L'attribut 'action' permet de définir sur quelle page je souhaite traiter les données. 
            L'attribut 'enctype' avec la valeur 'multipart/form-data' précise à mon formulaire qu'il va recevoir des fichiers. Les informations de ce fichier seront stockés dans la superglobale $_FILES
        -->

        <form action="" class="col-6 mx-auto" method="post" enctype="multipart/form-data">

            <label for="" class="form-label">Nom</label>
            <input type="text" class="form-control" name="nom" id="nom>
            
            <label for="" class=" form-label">Prenom</label>
            <input type="text" class="form-control" name="prenom" id="prenom>
            
            <label for="" class=" form-label">Telephone</label>
            <input type="text" class="form-control" name="telephone" id="telephone>
            
            <label for="" class=" form-label">Photo</label>
            <input type="file" class="form-control" name="photo" id="photo">

            <button class="btn btn-success mt-3 d-block mx-auto">Enregistrer</button>


        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>