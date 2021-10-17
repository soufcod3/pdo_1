<?php
require_once 'config.php';

$pdo = new PDO(DSN, USER, PSWD);

?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body><?php
// Affichage
$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll();?>
<section>
<h2>Voici mes amis:</h2>
<ul><?php
    foreach ($friends as $friend) {
        echo "<li>" . $friend['firstname'] . " " . "<strong>" . $friend['lastname'] . "</strong>" . "</li>" . PHP_EOL;
    }
?></ul>
</section>

<h2>Tu veux en être ?</h2>

<form action="merci.php" method="POST">
    <label for="firstname">Prénom:</label>
    <input type="text" id="firstname" name='firstname' required>
    <label for="lastname">Nom:</label>
    <input type="text" id="lastname" name='lastname' required>
    <input type="submit" value="Rejoindre mes amis">
</form>

</body>
</html>