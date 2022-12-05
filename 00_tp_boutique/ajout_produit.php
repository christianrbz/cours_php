<?php

// ############## TRAITEMENT PHP ############## 


// ######## ETAPE 1 - CREATION DE LA BDD ########

/* 
Nom de la BDD : meubles
Nom de la  table : produit
Colonnes :
id_produit    INT PRIMARY_KEY AUTO_INCREMENT
titre         VARCHAR(255) NOT NULL 
prix          FLOAT        NOT NULL 
description   TEXT         NOT NULL 
photo         VARCHAR(255) NOT NULL 
*/
// ######### ETAPE 4 - APPEL DU FICHIER init.php ########

require_once "init.php";



// ######### ETAPE 5 - TRAITEMENT ET ENVOIE DES DONNEES EN BDD ########

// Je vérifie si le formulaire a été validé
if (!empty($_POST)) { // Si $_POST n'est pas vide c'est que j'ai cliqué sur le bouton de validation

    if (empty($_POST['titre'])){
        $errorMessage = "Erreur lors de l'enregistrement !";
    } elseif (empty($_POST['prix'])) {
        $errorMessage = "Erreur lors de l'enregistrement !";
    } elseif (empty($_POST['description'])) {
        $errorMessage = "Erreur lors de l'enregistrement !";
    } elseif (empty($_FILES['photo']['name'])) {
        $errorMessage = "Erreur lors de l'enregistrement !";
    } 
    
    else {


    if (!empty($_FILES['photo']['name'])) {
        
        copy($_FILES['photo']['tmp_name'], "photos/" .time()."-". $_FILES['photo']['name']);
    } // FIN DE CONDITION !empty($_FILES)


    // On va préparer une requête SQL (Structured Query Language)
    $requete = $bdd->prepare("INSERT INTO produit(titre, prix, description, photo) VALUES (:titre, :prix, :description, :photo)");

    // debug($requete);

    $success = $requete->execute(
        [
            ':titre' => $_POST['titre'],
            ':prix' => $_POST['prix'],
            ':description' => $_POST['description'],
            ':photo' => time() . "-" . $_FILES['photo']['name']
        ]
    );



    // Je vérifie la valeur de success 
    if ($success) {
        // Si sa valeur est 'TRUE' alors j'envoie un message de succès
        $successMessage = "Bravo le produit a bien été enregistré !";
    } else {
        // Sinon j'envoie un message d'erreur
        $errorMessage = "Erreur lors de l'enregistrement !";
    }

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
    <title>Ajout produit</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <h1 class="text-center mt-5">Ajouter un produit</h1>

        <!-- Affichage des messages de succès et d'erreur -->

        <?php if (!empty($successMessage)) { ?>
            <div class="alert alert-success col-md-6 mx-auto text-center">
                <?php echo $successMessage; ?>
            </div>
        <?php } ?>


        <?php if (!empty($errorMessage)) { ?>
            <div class="alert alert-danger col-md-6 mx-auto text-center">
                <?php echo $errorMessage; ?>
            </div>
        <?php } ?>



        <!-- ############## ETAPE 2 - CREATION DU FORMULAIRE ##############-->
 

        <form action="" class="col-6 mx-auto" method="post" enctype="multipart/form-data">

            <label for="" class="form-label">Titre</label>
            <input type="text" class="form-control" name="titre" id="titre>
            
            <label for="" class=" form-label">Prix</label>
            <input type="number" class="form-control" name="prix" id="prix>
            
            <label for="" class=" form-label">Description</label>
            <!-- <input type="text" class="form-control" name="description" id="description> -->
            <textarea class="form-control" id="description" name="description" rows="5"></textarea>

            
            <label for="" class=" form-label">Photo</label>
            <input type="file" class="form-control" name="photo" id="photo">

            <button class="btn btn-success mt-3 d-block mx-auto">Enregistrer le produit</button>


        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>