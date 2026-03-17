<?php

require "../api/connect.php";
require "../api/check_integrity.php";

$ukm = $_SESSION["nrp"];

$query = "UPDATE ukm SET harga_early_bird = '0', tanggal = NULL, kuota_early_bird = '0' WHERE nama_ukm = '$ukm'";

if ($conn -> query($query) === true) {
    header("Location: ../dashboard/keteranganUKM.php?status=10");
}

?>