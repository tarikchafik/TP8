<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Générateur de mot de passe</title>
</head>
<body>
    <h2>Générateur de mot de passe</h2>

    <form method="post" action="">
        <fieldset>
            <legend>Paramètres</legend>
            <label>Longueur du mot de passe :</label>
            <input type="number" name="longueur" min="4" required>
            <input type="submit" name="generer" value="Générer">
        </fieldset>
    </form>

    <?php
    function genererMotDePasse($longueur) {
        $lettres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $chiffres = '0123456789';
        $speciaux = '!@#$%^&*()-_=+[]{}<>?';

        $tous = $lettres . $chiffres . $speciaux;
        $motDePasse = '';

        for ($i = 0; $i < $longueur; $i++) {
            $index = rand(0, strlen($tous) - 1);
            $motDePasse .= $tous[$index];
        }

        return $motDePasse;
    }

    if (isset($_POST['generer'])) {
        $longueur = (int)$_POST['longueur'];

        if ($longueur < 4) {
            echo "<p style='color:red;'>La longueur minimale est de 4 caractères.</p>";
        } else {
            $motDePasse = genererMotDePasse($longueur);
            echo "<h3>Mot de passe généré : <code>$motDePasse</code></h3>";
        }
    }
    ?>
</body>
</html>
