<?php
$dbh = new PDO('mysql:host=localhost;port=80;dbname=MyTwitter;', 'axeltwitter', '07072017' );
$stmt = $dbh->prepare("create table if not exists Users (
                                     id INT PRIMARY KEY AUTO_INCREMENT,
                                     firstname VARCHAR(255) NOT NULL ,
                                     lastname VARCHAR(255) NOT NULL ,
                                     mail VARCHAR(255) NOT NULL ,
                                     password VARCHAR(255) NOT NULL ,
                                     gender varchar(10) NOT NULL ,
                                     date date NOT NULL 
                                     
);");
$stmt->execute();
if ($stmt) {
    echo "execution réussie" . PHP_EOL;
} else {
    echo "echec" . PHP_EOL;
}