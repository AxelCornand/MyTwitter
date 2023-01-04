<?php
$dbh = new PDO('mysql:host=localhost;port=80;dbname=MyTwitter;', 'axeltwitter', '07072017' );
$stmt = $dbh->prepare("create database IF NOT EXISTS MyTwitter;");
$stmt->execute();
$dbh = new PDO('mysql:host=localhost;port=80;dbname=MyTwitter;', 'axeltwitter', '07072017' );
$stmt->execute();