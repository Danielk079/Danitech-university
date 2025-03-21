<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "danitech_db";


$conn = new mysqli($host, $user,$password, $database);

if(!$conn){
    die("Failed to connect to the database");
}
?>