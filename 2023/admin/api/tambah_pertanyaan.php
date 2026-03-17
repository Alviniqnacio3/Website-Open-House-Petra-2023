<?php

require "connect.php";
require "check_integrity.php";

             
$ukm = $_SESSION["nrp"];
$pertanyaan = $_POST["pertanyaan"];
$jenis = strtolower($_POST["Jenis_Upload"]);

$query = "INSERT INTO pertanyaan (ukm, pertanyaan, jenis) VALUES ('$ukm','$pertanyaan','$jenis')";


if($conn -> query($query) === true){
    header("Location: ../dashboard/pertanyaanUKM.php?status=0");
}
else{
    $conn -> error();
}


?>