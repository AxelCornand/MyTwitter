<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<form action="#" method="post">
    <div class="col-6 offset-3">
        <label class="form-label" for="firstname">Firstname :</label>
        <input type="text" class="form-control"  id="firstname" name="user_firstname" >
        <?php
        if (!empty($_POST['user_firstname'])){
            echo 'parfait';
        }else {
            echo 'mauvais prénom';
        }
        ?>
    </div>
    <div class="col-6 offset-3">
        <label class="form-label" for="lastname">Lastname :</label>
        <input type="text" class="form-control" id="lastname" name="user_lastname" >
        <?php
        if (!empty($_POST['user_lastname'])){
            echo 'parfait';
        }else {
            echo 'mauvais nom';
        }
        ?>
    </div>
    <div class="col-6 offset-3">
        <label for="mail" class="form-label">Mail :</label>
        <input type="email" id="mail" class="form-control" name="user_mail">
        <?php
        if (!empty($_POST['user_mail'])){
            echo 'parfait';
        }else {
            echo 'mauvais mail';
        }
        ?>
    </div>
    <div class="col-6 offset-3">
        <label for="password" class="form-label">Password :</label>
        <input type="password"  id="password" class="form-control" name="user_password" >
        <?php
        if (!empty($_POST['user_password'])){
            echo 'parfait';
        }else {
            echo 'mauvais password';
        }
        ?>
    </div>
    <div class="col-6 offset-3">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="user_gender" id="inlineRadio1" value="male">
            <label class="form-check-label" for="inlineRadio1">Male</label>
        </div>
    </div>
    <div class="col-6 offset-3">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="user_gender" id="inlineRadio2" value="femalle">
            <label class="form-check-label" for="inlineRadio2">Femalle</label>
        </div>
    </div>

    <div  class="button col-2 offset-6">
        <button  type="submit" class="btn btn-primary">Register</button>
        <a class="btn btn-default" href="login.php" role="button">Connecte toi !</a>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</form>
</body>
</html>


<?php

if (isset($_POST['user_firstname'])
    && isset($_POST['user_lastname'])
    && isset($_POST['user_mail'])
    && isset($_POST['user_mail'])
    && isset($_POST['user_password'])
    && isset($_POST['user_gender'])
    && !empty($_POST['user_firstname'])
    && !empty($_POST['user_lastname'])
    && !empty($_POST['user_mail'])
    && !empty($_POST['user_password'])
    && !empty($_POST['user_gender'])) {
        $dbh = new PDO('mysql:host=localhost;port=80;dbname=MyTwitter;', 'axeltwitter', '07072017' );
    $stmt=$dbh->prepare("SELECT mail FROM Users WHERE mail=:mail");
    $stmt->execute([":mail" => $_POST['user_mail']]);
    $user = $stmt->fetch();
    if ($user) {
        echo 'email déja utilisé';
    }else {
        $stmt = $dbh->prepare("INSERT INTO Users values(null, :firstname, :lastname, :mail, :password, :gender, :date)");
        $stmt->bindValue(':firstname', $_POST['user_firstname'], PDO::PARAM_STR);
        $stmt->bindValue(':lastname', $_POST['user_lastname'], PDO::PARAM_STR);
        $stmt->bindValue(':mail', $_POST['user_mail'], PDO::PARAM_STR);
        $stmt->bindValue(':password', $_POST['user_password'], PDO::PARAM_STR);
        $stmt->bindValue(':gender', $_POST['user_gender'], PDO::PARAM_STR);
        $date = new DateTime('now');
        $stmt->bindValue(':date', $date->format('Y-m-d H:i:s'));
        $res = $stmt->execute();
        echo "Entrée ajoutée dans la table";
        if ($stmt->errorCode() === '00000') {
            header('location:./login.php');
        }
    }
    }