
<?php
//Servera autentifikācija
$servername = "localhost";
$username = "root";
$password = "";
//Izmantotās datubāzes nosaukums
$database_in_use = "musculus";
//Pieslēdzas datubāzei
$conn = new mysqli($servername, $username, $password, $database_in_use);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "<br>";
?>