<?php
require "../api/connect.php";
require "../api/check_integrity.php";

print_r($_POST);

$page = $_POST["page"];
$status = $_POST["status"];

$query = "UPDATE maintenance SET status = '$status' WHERE page = '$page'";

if ($conn -> query($query) === true) {
    header("Location: ../dashboard/setting_maintenance.php?status=0");
}


?>