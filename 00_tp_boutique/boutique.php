<?php

// ##### 1- REQUIRE DE init.php 
require_once "init.php";

// ##### 3- RECUPERTION DES DONNEES
$requete = $bdd->prepare("SELECT id_produit, titre, ROUND(prix, 2) AS prix, description, photo FROM produit"); 

$requete->execute();
$produits = $requete->fetchAll(PDO::FETCH_ASSOC);
// debug($contacts);

?>

<!-- ##### 2 - CREATION DU TABLEAU QUI CONTIENDRA TOUS LES CONTACTS -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meubles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>

    <div class="container">

        <h1 class="text-center">Meubles à vendre</h1>

        <table class="table table-striped table-hover">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Prix</th>
                    <th>Description</th>
                    <th>Photo</th>
                </tr>
            </thead>
            <tbody>
                <!-- Affichage dynamique des contacts -->
                <!-- Exercice : Afficher dynamiquement les contacts présent dans la variable $contacts (Vous devez utiliser une foreach) -->

                <?php
                foreach ($produits as $produit) { ?>
                    <tr>
                        <td> <?php echo $produit['id_produit'] ?> </td>
                        <td> <?php echo $produit['titre'] ?></td>
                        <td> <?php echo $produit['prix']." €" ?></td>
                        <td> <?php echo $produit['description'] ?></td>
                        <td class="col-1">
                            <img src="photos/<?php echo $produit['photo'] ?>" alt="">
                        </td>
                    </tr> 
                <?php } ?>

            </tbody>

        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>