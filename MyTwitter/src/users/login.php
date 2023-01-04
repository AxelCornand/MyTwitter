<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>

<?php
session_start();
if (isset($_SESSION['user'])){
    header('location:./../../index.php');
 }else{
     ?>

<form action="#" method="post">
    <div class="col-6 offset-3">
        <label class="form-label" for="mail">Mail :</label>
        <input type="email" class="form-control"  id="mail" name="user_mail" >
        <?php
        if (!empty($_POST['user_mail'])&&filter_var($_POST['user_mail'], FILTER_VALIDATE_EMAIL)){
            echo 'parfait';
        }else {
            echo 'mauvais prénom';
        }
        ?>
    </div>
    <div class="col-6 offset-3">
                <label class="form-label"  for="password">Mot de passe :</label>
                <input type="password"  class="form-control" id="password" name="user_password" >
                <button class="mask"  onclick="showHide()" type="button" title="Mask/Unmask password to check content">Show</button>
                <script>
                    function showHide() {
                        let showHide=document.getElementById('password');
                        if(showHide.type === "password"){
                            showHide.setAttribute('type', 'text');
                        } else {
                            showHide.setAttribute('type', 'password');
                        }
                    }
                </script>
                <?php
                    if (isset($_POST['user_password']) && !empty($_POST['user_password'])<=5){
                        echo 'parfait';
                    }else {
                        echo 'mot de passe erroné';
                }
                ?>
            </div>

    <div  class="button col-2 offset-6">
        <button  type="submit" class="btn btn-primary">Connection</button>
        <a class="btn btn-default" href="registration.php" role="button">Créer un compte!</a>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</form>
</body>
</html>

<?php
    $dbh = new PDO('mysql:host=localhost;port=80;dbname=MyTwitter;', 'axeltwitter', '07072017' );
$mailco = $_POST['user_mail'];
$mdpco = $_POST['user_password'];

if (isset($mailco)
    && (isset($mdpco))
) {
    $stmt = $dbh->prepare("SELECT * FROM Users where mail = :mail and `password` = :`password`");
    $stmt->execute([":mail" => $mailco, ":password" => $mdpco]);
    $res = $stmt->fetch();
    if ($stmt->errorCode() === '00000' && $res) {
        $_SESSION['user'] = $res;
        header('location:../.././index.php');
    }
}
}
