<?php
// This file has been included into all the files where database is used, this file connects you to the database.
$server = "localhost";
$username = "root";
$password = "";
$database = "onlinevotesystem";

$conn = mysqli_connect($server, $username, $password, $database);
if(!$conn){
    die("Error ".mysqli_connect_error());

}

?>
