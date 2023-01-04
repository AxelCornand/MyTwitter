<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page d'accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<?php
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<?php if ( isset ($_SESSION['user'] ) && ($_SESSION['user']) ) {
    echo "<a class='navbar-brand' href='src/users/disconnect.php'>Déconnexion</a>".PHP_EOL;
    echo "<a class='navbar-brand' href='src/posts/create.php'>Poster un commentaire</a>".PHP_EOL;
}else{ ?>
    <a class="navbar-brand" href="src/users/registration.php"> Registration</a>
    <a class="navbar-brand" href="src/users/login.php"> Connection</a>
</nav>
<?php } ?>
<div class="container">
    <?php if (isset($_SESSION['user']) && $_SESSION['user']) echo 'Bienvenue ' . $_SESSION['user']['firstname'] . ' ' .$_SESSION['user']['lastname'] ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>