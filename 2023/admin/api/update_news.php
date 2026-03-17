<?php
    require "connect.php";
    require "check_integrity.php";

    print_r($_POST);
    $id = $_POST["id"];
    $judul = $_POST["judul"];
    $tanggal = $_POST["tanggal"];
    $isi = $_POST["isi"];
    $batasTanggal = date("Y-m-d");
    $batasTanggal = date('Y-m-d', strtotime($batasTanggal . ' + 2 days'));

    if ($tanggal < $batasTanggal) {
        header("Location: ../dashboard/newsOH.php?status=3");
    }
    else{
        $query = "SELECT * FROM news WHERE id = '$id'";
    $result = $conn -> query($query);
    if ($result -> num_rows >0) {
        while ($row = $result -> fetch_assoc()) {
            $judulLama = $row["judul"];
            $tanggalLama = $row["tanggal"];
            $isiLama = $row["isi"];
        }
    }

    echo $tanggal . "<br>";
    echo $tanggalLama;

    if(!(($tanggal == $tanggalLama)) && ($judul == $judulLama) && ($isi == $isiLama) ){
        echo"halo";
        $query = "UPDATE news SET judul = '$judul', tanggal = '$tanggal', isi = '$isi', last_update = SYSDATE() WHERE id = '$id'";

        if ($conn->query($query) === TRUE) {
            // echo "Record updated successfully";
            //Redirect Back
        
            header("Location: ../dashboard/newsOH.php?status=2");
        } else {
            echo "Error updating record: " . $conn->error();
        }
    }
    else if (!(($judul == $judulLama) && ($tanggal == $tanggalLama) && ($isi == $isiLama))) {
        $query = "UPDATE news SET judul = '$judul', tanggal = '$tanggal', isi = '$isi', last_update = SYSDATE(), status = '', notes = '' WHERE id = '$id'";
    
        if ($conn->query($query) === TRUE) {
            // echo "Record updated successfully";
            //Redirect Back
        
            header("Location: ../dashboard/newsOH.php?status=2");
        } else {
            echo "Error updating record: " . $conn->error();
        }
    }
    else{
        header("Location: ../dashboard/newsOH.php?status=2");
    }    
    }
?>