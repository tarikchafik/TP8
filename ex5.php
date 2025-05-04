<?php
$filename = "guestbook.txt";


if (isset($_POST['envoyer'])) {
    $nom = trim($_POST['nom']);
    $message = trim($_POST['message']);
    $date = date("d/m/Y H:i:s");

    if (!empty($nom) && !empty($message)) {
        $entry = "$date | $nom : $message" . PHP_EOL;
        file_put_contents($filename, $entry, FILE_APPEND); 
    } else {
        $erreur = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Livre d’or</title>
</head>
<body>
    <h2> un message</h2>

   

    <form method="post" action="">
        <label>Nom :</label><br>
        <input type="text" name="nom" required><br><br>

        <label>Message :</label><br>
        <textarea name="message" rows="4" cols="40" required></textarea><br><br>

        <input type="submit" name="envoyer" value="Envoyer">
    </form>

    <hr>

    <h2>Messages :</h2>
    <?php
    if (file_exists($filename)) {
        $lignes = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lignes as $ligne) {
            echo "<p>" . htmlspecialchars($ligne) . "</p>";
        }
    } else {
        echo "<p>Aucun message pour l’instant.</p>";
    }
    ?>
</body>
</html>
