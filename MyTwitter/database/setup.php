<?php
$dbh = new PDO('mysql:host=localhost;port=3306;', 'root', 'password' );
$stmt = $dbh->prepare("create database IF NOT EXISTS MyTwitter;");
$stmt->execute();
$dbh = new PDO('mysql:host=localhost;port=3306;dbname=MyTwitter;', 'root', 'password' );
$stmt->execute();