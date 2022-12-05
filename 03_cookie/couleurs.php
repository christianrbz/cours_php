<?php 

    $background = $_COOKIE['background'] ?? "#FFFFFF";
    $text = $_COOKIE['text'] ?? "#000000";

    if(!empty($_POST)){
        $background = $_POST['fond'];
        $text = $_POST['texte'];

        $expir = time() + 20;
        setCookie("background", $background, $expir);
        setCookie("text", $text, $expir);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Couleurs du site</title>

    <style type="text/css">
        body {
            background-color: <?= $background ?>;
            color: <?= $text ?>;
        }

        label {
            font-weight: bold;
        }
    </style>

</head>
<body>
<form method="post" action="">
        <fieldset>
            <legend>Choisissez vos couleurs</legend>
            <label>Couleur de background
                <input type="color" name="fond" value="<?= $background ?>" />
            </label><br /><br />
            <label>Couleur de texte
                <input type="color" name="texte" value="<?= $text ?>" />
            </label><br />
            
            <button name="set">Envoyer</button>
        </fieldset>
    </form>
    
</body>
</html>