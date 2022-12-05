<?php

// ##### 1- REQUIRE DE init.php 
require_once "init.php";

// ##### 3- RECUPERTION DES DONNEES
$requete = $bdd->prepare("SELECT id, UPPER(nom) AS nom, prenom, telephone, photo FROM contact"); 

// $requete = $bdd->prepare("SELECT * FROM contact ORDER BY nom DESC");


// 'SELECT *' signifie que je souhaite récupérer toutes les colonnes de la table 

// 'ORDER BY' permet d'ordonner selon une colonne particulière. On peut placer à la suite l'ordre de récupération (du + grand au + petit ou inversement) en indiquant ASC ou DESC 



$requete->execute();
$contacts = $requete->fetchAll(PDO::FETCH_ASSOC);
// debug($contacts);

?>

<!-- ##### 2 - CREATION DU TABLEAU QUI CONTIENDRA TOUS LES CONTACTS -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Répertoire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>

    <div class="container">

        <h1 class="text-center">Répertoire</h1>

        <table class="table table-striped table-hover">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Telephone</th>
                    <th>Photo</th>
                </tr>
            </thead>
            <tbody>
                <!-- Affichage dynamique des contacts -->
                <!-- Exercice : Afficher dynamiquement les contacts présent dans la variable $contacts (Vous devez utiliser une foreach) -->

                <?php
                foreach ($contacts as $contact) { ?>
                    <tr>
                        <td> <?php echo $contact['id'] ?></td>
                        <td> <?php echo $contact['prenom'] ?></td>
                        <td> <?php echo $contact['nom'] ?></td>
                        <td> <?php echo $contact['telephone'] ?></td>
                        <td>
                            <img src="photos/<?php echo $contact['photo'] ?>" alt="">
                        </td>
                    </tr> 
                <?php } ?>

            </tbody>

        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>