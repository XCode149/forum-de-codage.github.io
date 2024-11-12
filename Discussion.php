<?php
// Connexion à la base de données
$mysqli = new mysqli("localhost", "username", "password", "forum");

// Vérifier la connexion
if ($mysqli->connect_error) {
    die("Échec de la connexion : " . $mysqli->connect_error);
}

// Récupérer l'ID de la discussion
$discussion_id = $_GET['id'];

// Récupérer les messages de la discussion
$query = "SELECT * FROM messages WHERE discussion_id = $discussion_id";
$result = $mysqli->query($query);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discussion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Discussion - Sujet</h1>
        <nav>
            <ul>
                <li><a href="index.php">Retour à l'accueil</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="discussion">
            <h2>Messages</h2>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="message">
                    <p><strong><?php echo $row['username']; ?> :</strong> <?php echo $row['content']; ?></p>
                </div>
            <?php endwhile; ?>

            <form action="post_message.php" method="post">
                <textarea name="content" placeholder="Écrire un message..." required></textarea>
                <button type="submit">Envoyer</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Forum de Discussion</p>
    </footer>
</body>
</html>
