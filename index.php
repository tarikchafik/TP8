
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Calculatrice PHP</title>
</head>
<body>
    <h2>Calculatrice</h2>
    <form method="post" action="">
        <fieldset>
            <legend>Opérations</legend>

            <label>Nombre 1 :</label>
            <input type="number" name="nbr1" required><br><br>

            <label>Nombre 2 :</label>
            <input type="number" name="nbr2" required><br><br>

            <label>Opération :</label>
            <select name="operation" required>
                <option value="soustraction">Soustraction</option>
                <option value="addition">Addition</option>
                <option value="multiplication">Multiplication</option>
                <option value="division">Division</option>
            </select><br><br>

            <input type="submit" name="calcule" value="Calculer">
        </fieldset>
    </form>

    <?php
    if (isset($_POST['calcule'])) {
        $nbr1 = $_POST['nbr1'];
        $nbr2 = $_POST['nbr2'];
        $operation = $_POST['operation'];
        $resultat = '';

        switch ($operation) {
            case 'addition':
                $resultat = $nbr1 + $nbr2;
                break;
            case 'soustraction':
                $resultat = $nbr1 - $nbr2;
                break;
            case 'multiplication':
                $resultat = $nbr1 * $nbr2;
                break;
            case 'division':
                if ($nbr2 != 0) {
                    $resultat = $nbr1 / $nbr2;
                } else {
                    $resultat = 'La division par zéro est impossible';
                }
                break;
            default:
                $resultat = 'Opération invalide';
        }

        echo "<h3>Résultat : $resultat</h3>";
    }
    ?>
</body>
</html>
