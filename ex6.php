<?php
$questions = [
    [
        "question" => "Quel langage est utilisé pour structurer une page web ?",
        "options" => ["CSS", "HTML", "JavaScript"],
        "reponse" => "HTML"
    ],
    [
        "question" => "Quel langage est principalement utilisé pour styliser une page web ?",
        "options" => ["PHP", "CSS", "SQL"],
        "reponse" => "CSS"
    ],
    [
        "question" => "Quel langage permet de rendre une page web interactive ?",
        "options" => ["JavaScript", "HTML", "Python"],
        "reponse" => "JavaScript"
    ],
    [
        "question" => "Quelle balise HTML est utilisée pour insérer une image ?",
        "options" => ["<img>", "<image>", "<pic>"],
        "reponse" => "<img>"
    ],
    [
        "question" => "Que signifie CSS ?",
        "options" => ["Computer Style Sheet", "Cascading Style Sheets", "Creative Style System"],
        "reponse" => "Cascading Style Sheets"
    ]
];

$score = 0;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mini Quiz</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h2>Mini Quiz</h2>

    <form method="post" action="">
        <?php foreach ($questions as $index => $q): ?>
            <p><?= $q["question"] ?></p>
            <?php foreach ($q["options"] as $option): ?>
                <input type="radio" name="reponse<?= $index ?>" value="<?= $option ?>" required>
                <?= $option ?><br>
            <?php endforeach; ?>
            <br>
        <?php endforeach; ?>
        <input type="submit" name="valider" value="Corriger">
    </form>

    <?php
    if (isset($_POST['valider'])) {
        echo "<h2>Résultats :</h2>";

        foreach ($questions as $index => $q) {
            $userAnswer = $_POST["reponse$index"];
            $correctAnswer = $q["reponse"];

            echo "Q" . ($index + 1) . ": ";

            if ($userAnswer === $correctAnswer) {
                echo "Correct<br>";
                $score++;
            } else {
                echo "Incorrect (Votre réponse : $userAnswer, Correct : $correctAnswer)<br>";
            }
        }

        echo "<br><strong>Score final : $score / " . count($questions) . "</strong>";
    }
    ?>
</body>
</html>
