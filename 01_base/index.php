<h1>Hello World</h1>

<?php // Balise ouvrante de PHP. On ouvre un passage PHP

// <h1></h1> Ici je ne peux plus écrire de HTML de manière classique

echo "<h2>Ici j'écris en PHP</h2>";
// echo est une instruction qui nous permet de faire de l'affichage sur notre page
// print

?> <!-- Pour fermer un passage PHP on utilise cette balise -->

<p>Ici j'écris du HTML</p>

<?php
// Ici on est pas obligé de fermer le PHP tant que tout ce qui se trouve en dessous soit du PHP

// commentaire monoligne
/*
    Commentaires 
    mutlilignes
*/

/** */

echo "<h2>Variables</h2>";

// Définition : Une variable c'est un espace de la mémoire nommé qui va nous permettre de stocker des données (pensez à une boite de rangement). 

// En PHP pour définir une variable on utilise le '$'

// Une variable ne doit jamais commencer par un chiffre, une majuscule ou un '_'. Jamais d'accent ni d'espaces
$a = 127; // la variable "a" à pour valeur 127

echo gettype($a); // Fonction prédéfinie qui permet de récupérer le type d'une variable. Type Integer (chiffre entier)

echo "<br>"; // Retour à la ligne basique

$a = 1.7; 

echo gettype($a); // Ici j'ai un type 'double' correspond à du 'float' (chiffre à virgule)

echo "<br>"; // Retour à la ligne basique

$a = "chaine de caractères";
echo gettype($a); // Ici j'ai un type string (chaine de caractères)

echo "<br>"; // Retour à la ligne basique
$a = TRUE;
echo gettype($a); // Ici j'ai un type boolean 
// Un boolean à forcément une valeur TRUE ou FALSE


echo "<h2>Concaténation</h2>";
// La concaténation c'est le faite de mettre bout à bout des chaines de caractères. 
// On obtient à la fin 1 seule chaine de caractères.

// La concaténation en PHP s'écrit avec le '.'
$prenom = "Quentin"; // Je déclare une variable avec une chaine de caractère.

echo "Bonjour " . $prenom . "<br>"; // On concatène la valeur "Bonjour " avec la variable $prenom suivi d'un <br>


echo "<h2>Concaténation et Affectation</h2>";

$message = "Premier message <br>";
echo $message;

$message .= "Deuxième message <br>";
// $message = $message . "Deuxième message <br>"; // La ligne au dessus est un raccourci de cette deuxième ligne
echo $message;

// l'opérateur '.=' permet de faire de la concaténation et de l'affection en une seule exécution.


echo "<h2>Guillemets et Quotes</h2>";

$today = "Aujourd'hui";
$today = 'Aujourd\'hui'; // Si je suis dans une chaine de caractères avec de Quotes alors je dois utiliser le caractère d'échappement pour mettre des apostrophes.

$nom = "Vilfeu";

echo "Mon nom est : " . $nom . " et mon prenom est " . $prenom . "<br>";
echo "Mon nom est : $nom et mon prenom est $prenom <br>";
echo 'Mon nom est : $nom et mon prenom est $prenom <br>';

// Dans les " " les variables sont interprétées. Leurs valeurs seront affichées à l'écran.
// Dans les ' ' les variables ne sont PAS interprétées. Tous est chaine de caractères dans les simples quotes.


echo "<h2>Opérateurs Arithmétiques</h2>";

$a = 10;
$b = 2;

echo $a + $b . "<br>"; // Affiche 12
echo $a - $b . "<br>"; // Affiche 8
echo $a / $b . "<br>"; // Affiche 5
echo $a * $b . "<br>"; // Affiche 20
echo $a % $b . "<br>"; // Affiche 0
echo $a ** $b . "<br>"; // Affiche 100 (Exposant)

echo "<h3>Affectations combinés</h3>";

$a += $b; // On ajoute la valeur de $b  à $a
// $a = $a + $b;
echo $a;

echo "<br>";

$a -= $b;
// $a = $a - $b;
echo $a;

// Ces opérateurs sont très utilisés pour le calcul du prix d'un panier d'achat

echo "<br>";

$a *= $b;
echo $a;

echo "<br>";
$a /= $b;
echo $a;

echo "<h3>Incrémenter et Décrémenter</h3>";

$i = 0;

$i++; // Incrémentation de la valeur de $i de +1. ($i += 1)
echo $i;
echo "<br>";

$i--; // Décrmentation de la valeur (-1)
echo $i;
echo "<br>";

echo "<h2>Structures Conditionnelles</h2>";

$a = 10;
$b = 5;
$c = 2;


// If - Else (identique à JS)
if ($a > $b){
    echo '$a est sup à $b <br>';
} else {
    echo '$a n\'est pas sup à $b <br>';
}

// Opérateur logique AND qui s'écrit &&
if ($a > $b && $b > $c) {
    echo '$a est sup à $b ET $b est sup à $c <br>';
    // On rentre dans le if que si les conditions sont vraies. 
}
// TRUE && TRUE = TRUE
// TRUE && FALSE = FALSE
// FALSE && TRUE = FALSE
// FALSE && FALSE = FALSE

// Opérateur logique OR qui s'écrit ||
if ($a > $b || $b < $c) {
    echo '$a est sup à $b OU $b est inf à $c <br>';
    // On rentre dans le if si l'une des 2 conditions est vraie. 
}
// TRUE || TRUE = TRUE
// TRUE || FALSE = TRUE
// FALSE || TRUE = TRUE
// FALSE || FALSE = FALSE

if ($a < $b){
    echo '$a est inf à $b';
} elseif ($b < $c){
    echo '$b est inf à $c';
} else {
    echo "Aucune des 2 conditions précédentes n'est vraie <br>";
}


// ---- Comparaison avec == et ===
$varA = 1;
$varB = '1';

// le == compare uniquement la valeur
if($varA == $varB){
    echo 'Vraie car $a est égal à 1 et $b est égal à 1<br>';
}

// le === compare la valeur ainsi que le type
if($varA === $varB){
    echo 'Vraie $a est égal à $b en terme de valeur ET de type';
} else {
    echo 'FAUX $a n\'est pas strictement égal à $b'; 
}

/*
    =       pour affecter une valeur
    ==      pour comparer une égalité de valeur
    ===     pour comparer une égalité de valeur ET de type
*/

echo "<h3>Fonctions isset() et empty()</h3>";
/*
    empty() => vérifie si la variable est vide, c'est à dire : '', 0, NULL, FALSE ou non définie
    isset() => vérifie si la variable existe et si elle une valeur différente de NULL
*/

$var1 = 0;
$var2 = '';

if ( empty($var1) ) {
    echo 'je rentre dans la condition car la variable $var1 est égal à 0 <br>';
}

if( isset($toto) ){
    echo "je rentre ici si la variable existe et que sa vakeur est différente de NULL <br>";
} elseif( isset($var2) ){
    echo 'Ici la variable $var2 existe et sa valeur est différente de NULL <br>';
}

// Contexte d'utilisation : On utilise empty() pour vérifier les champs de formulaire, et isset() pour s'assurer de l'existence d'une variable avant de l'utiliser.


echo "<h3>L'opérateur NOT qui s'écrit '!'</h3>";

$var3 = 'Ma variable 3';
// Si $var3 n'est pas vide alors je rentre dans la condition.
if( !empty($var3) ) {
    echo "Je rentre dans la condition si la variable est remplie <br>";
}

// !TRUE => FALSE
// !FALSE => TRUE


echo "<h3>La condition ternaire</h3>";

echo ($a == 10) ? 'oui $a est égal à 10 <br>' : 'non $a est différent de 10 <br>' ;  
// Dans la syntaxe ternaire, on a la condition ensuite on a le '?' qui marque le début de l'exécution du if et enfin on a le ':' qui marque le début de l'exécution du else.
// Une ternaire se composera toujours de ces 3 éléments

echo "<h3>Switch Case</h3>";
// un switch case peut être remplacé par un if elseif. 
// L'intérêt du swtich case est qu'il sera plus rapide en terme d'excution.
// Le break est trés important. Si vous oubliez de stopper un 'cas' alors le cas suivant sera également exécuté. 
$fruit = "pomme";

switch ($fruit){

    case 'pomme':
        echo "je fais une compote de pomme <br>";
        break;
    case 'fraise':
        echo "je fais une compote de fraise <br>";
        break;
    case 'poire':
        echo "je fais une compote de poire <br>";
        break;
    case 'banane':
        echo "je fais une compote de banane <br>";
        break;
    case 'cerise':
        echo "je fais une compote de cerise <br>";
        break;
    
    default: 
        echo "je ne peux pas faire de compote car je ne connais pas ce fruit <br>";
    break;
    
}


echo "<h2>Les fonctions</h2>";
/*
    Une fonction c'est du code encapsulé dans des accolades et qui porte un nom. On appellera cette fonction à chaque fois qu'on a besoin du code en question.

    Le but principal est de ne pas se répéter. 
*/

function separation(){
    echo "<hr>";
}

separation(); // Pour que la fonction soit exécutée je dois l'appeler.


echo "<h3>Fonctions avec paramètre</h3>";

function bonjour($paramPrenom, $paramNom){

    return "Bonjour $paramPrenom $paramNom <br>";

    echo "Cette ligne ne sera jamais affichée"; // Après un return on sort de notre fonction. Cette instruction n'est donc pas lue.

}

echo bonjour($prenom, $nom);

/*
    Exercice : 
    Vous déclarez une fonction exoMeteo() avec le paramètre $saison. 
    Cette fonction retourne la phrase "Nous sommes en ... " en fonction de la saison passée en paramètre.
    Attention quand nous au printemps, ce n'est plus "Nous sommes EN ..." mais "Nous sommes AU ..."
*/

/**
 * FONCTION
 */
function exoMeteo($saison){

    // ### Méthode 1 : Fonctionnelle mais longue
    // switch($saison){
    //     case 'Hiver':
    //         return "Nous sommes en $saison <br>";
    //         break;
    //     case 'Printemps':
    //         return "Nous sommes au $saison <br>";
    //         break;
    //     case 'Ete':
    //         return "Nous sommes en $saison <br>";
    //         break;
    //     case 'Automne':
    //         return "Nous sommes en $saison <br>";
    //         break;
    // }

    // ### Méthode 2 : Meilleur mais toujours un peu longue
    // if ($saison == "Printemps") {
    //     return "Nous sommes au $saison <br>";
    // } else {
    //     return "Nous sommes en $saison <br>";
    // }

    // ### Méthode 2 bis : Méthode 2 en ternaire 
    // return ($saison == "Printemps") ? "Nous sommes au $saison <br>" : "Nous sommes en $saison <br>";

    // ### Méthode 3 : évite la répétition du code
    ($saison == "Printemps") ? $article = "au" : $article = "en";
    return "Nous sommes $article $saison <br>";

}

echo exoMeteo('Hiver');
echo exoMeteo('Printemps');
echo exoMeteo('Ete');
echo exoMeteo('Automne');


echo "<h2>Les Boucles</h2>";

// Permettent de répéter du code automatiquement.

echo "<h3>Boucle WHILE</h3>";

/* 
    3 paramètres sont à définir : 
        - Valeur de départ (compteur)
        - Condition 
        - Incrémentation ou Décrémentation
*/ 

$i = 0; // Valeur de départ

while($i <= 3){ // Tant que $i est inf ou égal à 3, alors je rentre dans la boucle 
    echo "Je viens de créer la ligne n°$i <br>";

    $i++; // Incrémentation
}

echo "<h3>Boucle FOR</h3>";
// La boucle FOR exécute le même code que la wile. La seule différence réside dans son écriture. 
// L'intérêt de la boucle FOR est que tous les paramètres seront a indiquer au même endroit.

// initialisation / condition / incrémentation
for($i = 0; $i <= 3; $i++){
    echo "Je viens de créer la ligne n°$i <br>";
}

// Exercice : 
// Créez un select/option (menu déroulant) pour afficher les chiffres de 1 à 12 

echo '<select name="" id="">';
    for ($i=1; $i <= 12 ; $i++) { 
        echo '<option value="">'.$i.'</option>';
    }
    echo '</select>';

?>

<select name="" id="">
    <?php for ($i=1; $i <= 12 ; $i++) { ?> 
        <option value=""><?php echo $i ?></option>
    <?php } ?>
</select>

<?php 

echo "<h2>Les tableaux</h2>";

// Un tableau (array en anglais) est une variable améliorée dans laquelle on stock une multitude de données. Ces données peuvent être de type différents.
// L'indice (index) d'un tableau commence TOUJOURS par 0.

echo "<h3>Méthode 1 pour déclarer un tableau</h3>";

$liste = array('Marc', 'Thomas', 'Audrey', 'Laurie', 'Zoé', 'Luc');

// echo $liste; // ERREUR On ne peux pas afficher un tableau en chaine de caractère

echo "<pre>";
    var_dump($liste); // cette fonction nous permet de voir les valeurs présentes dans un tableau ainsi que leur type 
echo "</pre>";

echo "<pre>";
    print_r($liste); // cette fonction nous permet de voir UNIQUEMENT les valeurs présentes dans un tableau
echo "</pre>";

/**
 * Fonction qui permet d'afficher clairement des données
 */
function debug($value){
    echo "<pre>";
        print_r($value);
    echo "</pre>";
}

debug($liste);

echo "<h3>Méthode 2 pour déclarer un tableau</h3>";

$tab = ["France", "Italie", "Portugal", "Espagne"];

debug($tab);

echo "<h3>Afficher des valeurs d'un tableau</h3>";

echo $tab[1];
// echo $tab[3];

echo "<h3>Tableau Associatif</h3>";
// Dans un tableau associatif on va choisir le nom des indices.
// Cela nous permet d'être plus précis au moment de l'appel de nos valeurs.

$couleurs = [
    'j' => 'Jaune',
    'r' => 'Rouge',
    'b' => 'Bleu',
    'v' => 'Vert'
];

debug($couleurs);

echo "La seconde couleur est " . $couleurs['r'] . "<br>"; 
// Pour accéder à la valeur d'un tableau, on appel ce tableau suivi de [] avec l'indice en question. Ici on a changé l'indice, je ne peux appeler ['1'] mais je dois faire appel à ['r']

echo "La première couleur est $couleurs[j] <br>";


echo "<h2>La boucle foreach</h2>";
// La boucle foreach nous permet de parcourir les tableaux ou les objets.
// Si vous tentez de parcourir autre chose vous aurez une erreur

$tab = ["France", "Angleterre", "Autriche", "Pologne"];

for ($i=0; $i < count($tab); $i++) { 
    echo $tab[$i] . '<br>';
}

// La boucle foreach va à chaque tour récupérer la valeur et la placer dans la variable définit après le mot clé 'as'.
// Je peux ensuite utiliser cette variable dans ma boucle.
foreach($tab as $pays){
    echo $pays . '<br>';
}

// Nous pouvons également récupérer l'indice en plus de la valeur. 
// Pour cela on doit placer après le 'as' les 2 variables. La première récupérera toujours l'indice et la seconde la valeur
foreach($tab as $indice => $valeur){
    echo "l'indice N°$indice correspond à la valeur $valeur <br>";
}

// Exercice : 
// Déclarez un tableau contenant tous les mois de l'année.
// Affichez ces mois dans un select/option (menu déroulant) à l'aide d'une boucle foreach.

$mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'décembre'];

// debug($mois);

echo '<select name="" id="">';
    foreach($mois as $moi){
        echo '<option value="">'. ucfirst($moi).'</option>    ';
    }
echo '</select>';


echo "<h2>Tableau Multidimensionnel</h2>";
// Un tableau multidimensionnel est tableau contenant d'autres tableaux

$membres = [
    [
        'prenom'    => 'Quentin',
        'nom'       => 'Vilfeu',
        'tel'       => '0102030405'
    ],
    [
        'prenom'    => 'Thomas',
        'nom'       => 'Legendre',
        'tel'       => '0102030406'
    ],
    [
        'prenom'    => 'Audrey',
        'nom'       => 'Dupont',
        'tel'       => [
            'fixe' => '0102030405',
            'portable' => '0607080901'
        ]
    ]
];

debug($membres);

// Afficher le nom de Thomas => "Legendre"
echo $membres[1]['nom'];
echo $membres[2]['tel']['portable'];

$audrey = $membres[2];
debug($audrey);
echo $audrey['nom'];


echo "<h2>Introduction aux Objets</h2>";

class Meuble {

    // propriétés (variables)
    public $marque;
    public $couleur;

    // méthodes (fonctions)
    public function getPrice(){
        return rand(50, 200) . "€ TTC"; // La fonction rand() permet de retourner un chiffre aléatoire
    }

}

// Création d'un objet de la classe Meuble
// En Orienté Objet on ne parle pas de création mais d'instanciation. 
// On instancie un objet de la classe Meuble

$table = new Meuble();
var_dump($table);
echo '<br>';
$table->marque = "IKEA";
$table->couleur = "beige";
var_dump($table);
echo '<br>';

echo "L'objet table est de la marque $table->marque et est de couleur $table->couleur";

echo '<br>';
echo $table->getPrice();


$tableBasse = new Meuble();

$tableBasse->marque = "BUT";
$tableBasse->couleur = "emeraude";

debug($table);
debug($tableBasse);
