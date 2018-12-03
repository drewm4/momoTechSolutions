<?php
//hostinger server and database info stored as php variables
//11.12.18 is config for LOCAL SERVER 
$host = "localhost";
$user = "u545559186_gahu";
$password = "momo1234!";
$database = "u545559186_gahu";

//create connection using MySQLi with aforementioned variables using $conn function

$conn = mysqli_connect($host, $user, $password, $database);

//check connection

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
