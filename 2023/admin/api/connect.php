<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "openhouse23";

// $servername = "openhouse.petra.ac.id";
// $username = "openhouse";
// $password = "Petra2107!";
// $dbname = "openhouse_2023test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
