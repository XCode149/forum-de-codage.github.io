<?php
// Connexion à la base de données
$mysqli = new mysqli("localhost", "username", "password", "forum");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Insérer l'utilisateur dans la base de données
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($mysqli->query($query)) {
        echo "Inscription réussie !";
    } else {
        echo "Erreur : " . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <form action="register.php" method="POST">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>
