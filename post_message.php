<?php
// Connexion à la base de données
$mysqli = new mysqli("localhost", "username", "password", "forum");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $discussion_id = $_POST['discussion_id'];
    $username = $_POST['username'];
    $content = $_POST['content'];

    // Insérer le message dans la base de données
    $query = "INSERT INTO messages (discussion_id, username, content) VALUES ('$discussion_id', '$username', '$content')";
    if ($mysqli->query($query)) {
        header("Location: discussion.php?id=$discussion_id");
    } else {
        echo "Erreur : " . $mysqli->error;
    }
}
?>

