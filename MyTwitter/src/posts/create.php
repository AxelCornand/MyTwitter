<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
<form action="#" method="post">
    <div class="Input text">
        <label for="text"></label><input type="text" id="text" name="titre" placeholder="Titre">
    </div>
    <div class="Input textarea">
        <label>
            <textarea  name="text" placeholder="Commentaire"></textarea>
        </label>
    </div>
    <div  class="button">
        <button  type="submit">Submit</button>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>

<?php
session_start();
$dbh = new PDO('mysql:host=localhost;port=3306;dbname=MyTwitter;', 'root', 'password' );
if (empty($_SESSION['user']['id'])){
    header('src/users/login.php');
} else {
    if (!empty($_POST['titre'])
        && (!empty($_POST['text'])
            && (isset($_POST['titre'])
                && (isset($_POST['text']))))) {
        $stmt = $dbh->prepare ("INSERT INTO posts VALUES ( NULL,:titre, :text,:created_at,:updated_at, :user_id)");
        $stmt->bindValue(':titre', $_POST['titre']);
        $stmt->bindValue(':text', $_POST['text']);
        $date = new DateTime('now');
        $stmt->bindValue(':created_at', $date->format('Y-m-d H:i:s'));
        $date = new DateTime('now');
        $stmt->bindValue(':update_at', $date->format('Y-m-d H:i:s'));
        $stmt->bindValue('user_id', $_SESSION['user']['id']);
        $res = $stmt->execute([':titre' => $_POST['titre'], ':text' => $_POST['text'], ':user_id' => $_SESSION['user']['id']]);
    }
}
