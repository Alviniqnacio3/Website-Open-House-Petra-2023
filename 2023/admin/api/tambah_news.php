<?php 
    require "connect.php";
    require "check_integrity.php";

    print_r($_SESSION);
    echo"<br>";
    print_r($_POST);
    $judul = $_POST["judul"];
    $tanggal = $_POST["tanggal"];
    $batasTanggal = date("Y-m-d");
    $isi = $_POST["isi"];
    $ukm_lk = $_SESSION["nrp"];
    $batasTanggal = date('Y-m-d', strtotime($batasTanggal . ' + 2 days'));
    echo"<br> $batasTanggal";
    echo"<br> $tanggal";

    $judul =str_replace('\'','\'\'',$judul);
    $isi =str_replace('\'','\'\'',$isi);


    if ($tanggal < $batasTanggal) {
        header("Location: ../dashboard/newsOH.php?status=0");
    }
    else {
        $query = "INSERT INTO news (judul, tanggal, isi, last_update, ukm_lk) VALUES ('$judul', '$tanggal', '$isi', SYSDATE(), '$ukm_lk')";

        if ($conn -> query($query) == true) {
            header("Location: ../dashboard/newsOH.php?status=1");
        }
        else{
            $conn -> error();
        }
    }
?>