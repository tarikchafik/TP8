<?php
session_start();

$utilisateur_valide = "TARIK";
$motdepasse_valide = "2003";

if (isset($_POST['login'])) {
    $identifiant = $_POST['identifiant'];
    $motdepasse = $_POST['motdepasse'];

    if ($identifiant === $utilisateur_valide && $motdepasse === $motdepasse_valide) {
        $_SESSION['utilisateur'] = $identifiant;
        header("Location: bienvenue.php");
        exit;
    } else {
        $erreur = "Identifiants incorrects.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <?php if (isset($erreur)) echo "<p style='color:red;'>$erreur</p>"; ?>
    <form method="post" action="">
        <label>Identifiant :</label><br>
        <input type="text" name="identifiant" required><br><br>

        <label>Mot de passe :</label><br>
        <input type="password" name="motdepasse" required><br><br>

        <input type="submit" name="login" value="Se connecter">
    </form>
</body>
</html>
