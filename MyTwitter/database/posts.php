<?php
$dbh = new PDO('mysql:host=localhost;port=3306;dbname=MyTwitter;', 'root', 'password' );

$stmt=$dbh->prepare("create table if not exists posts(
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR (255),
    text MEDIUMTEXT NOT NULL ,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    user_id int 
)");
echo "préparation réussie!" .PHP_EOL;
$stmt->execute();
echo "execution reussie" .PHP_EOL;
var_dump($stmt->errorCode());