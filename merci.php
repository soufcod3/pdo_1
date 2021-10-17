<?php
require_once 'config.php';

$pdo = new PDO(DSN, USER, PSWD);

?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merci !</title>
</head>
<body>
<h1>Tu fais désormais partie de la bande</h1>


<?php
// Insertion
if (!empty($_POST)) {
    $firstname = htmlentities(trim($_POST['firstname']));
    $lastname = htmlentities(trim($_POST['lastname']));
    $query = "INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)";
    $statement = $pdo->prepare($query);
    
    $statement->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $statement->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    
    $statement->execute();
}

// Affichage
$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll();
?><section>
<h2>La bande d'amis:</h2>
<ul><?php
foreach ($friends as $friend) {
    echo "<li>" . $friend['firstname'] . " " . "<strong>" . $friend['lastname'] . "</strong>" . "</li>" . PHP_EOL;
}
?></ul>
</section>
<a href="index.php">Ajouter un nouveau membre à la bande</a>
</body>
</html>