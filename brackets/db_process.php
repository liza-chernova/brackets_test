<?php


$dbHost = "127.0.0.1";
$dbName = "test";
$dbUser = "root";
$dbPassword = "";

$link = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
mysqli_set_charset($link, "utf8");