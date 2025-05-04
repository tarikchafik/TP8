<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de contact</title>
</head>
<body>
    <center><h2>Formulaire de contact</h2>

<form method="post" action="">
    <label>Nom :</label><br>
    <input type="text" name="nom" required><br><br>

    <label>Email :</label><br>
    <input type="email" name="email" required><br><br>

    <label>Message :</label><br>
    <textarea name="message" rows="5" cols="40" required></textarea><br><br>

    <input type="submit" name="envoyer" value="Envoyer">
</form></center>
    

    <?php
    if (isset($_POST['envoyer'])) {
        $nom = trim($_POST['nom']);
        $email = trim($_POST['email']);
        $message = trim($_POST['message']);

        
        if (!empty($nom) && !empty($email) && !empty($message)) {
            
            echo "<h3>Données reçues :</h3>";
            echo "<p><strong>Nom :</strong> " . htmlspecialchars($nom) . "</p>";
            echo "<p><strong>Email :</strong> " . htmlspecialchars($email) . "</p>";
            echo "<p><strong>Message :</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>";
        }
         else {
            echo "<p style='color:red;'> remplir tous les champs.</p>";
        }
    }
    ?>
</body>
</html>
