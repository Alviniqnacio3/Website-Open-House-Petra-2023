<?php
    require "connect.php";
    require "check_integrity.php";
    $ukm = $_SESSION['nrp'];
    // print_r($_SESSION);
    // echo "<br>";
    // print_r($_POST);

    $harga_eb = $_POST['harga_early'];
    $tanggal_eb = $_POST['tanggal_early'];
    $kuota_eb = $_POST['kuota_early'];
    $batasTanggal = date("Y-m-d");
    // echo $batasTanggal;
    // echo "<br>";
    // echo $tanggal_eb;
    if ($tanggal_eb <= $batasTanggal) {
        header("Location: ../dashboard/keteranganUKM.php?status=9");
    }
    else{
        $query = "UPDATE ukm SET harga_early_bird = '$harga_eb', tanggal = '$tanggal_eb', kuota_early_bird = '$kuota_eb' WHERE nama_ukm = '$ukm'";
        if ($conn->query($query) === true) {
            header("Location: ../dashboard/keteranganUKM.php?status=1");
        }
    }

?>