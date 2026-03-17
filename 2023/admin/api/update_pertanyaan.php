<?php
    require "connect.php";
    require "check_integrity.php";

    print_r($_POST);
    $id = $_POST["id"];
    $pertanyaan = $_POST["pertanyaan"];
    $jenis = $_POST["jenis"];

    $query = "UPDATE pertanyaan SET pertanyaan = '$pertanyaan', jenis = '$jenis' WHERE id = '$id'";
    
    if ($conn->query($query) === TRUE) {
        // echo "Record updated successfully";
        //Redirect Back
        header("Location: ../dashboard/pertanyaanUKM.php?status=1");
    } else {
        echo "Error updating record: " . $conn->error;
    }

?>