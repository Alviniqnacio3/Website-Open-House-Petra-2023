<?php
require "../api/connect.php";
require "../api/check_integrity.php";

print_r($_POST);

$status = $_POST["status"];

$query = "UPDATE maintenance_user SET status = '$status'";
if ($conn -> query($query)) {
    header("Location: ../dashboard/setting_maintenance_user.php?status=0");
}


?>