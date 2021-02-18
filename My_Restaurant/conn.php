<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";
// Δημιουργία connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Έλεγχος connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}




