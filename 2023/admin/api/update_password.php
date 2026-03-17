<?php
    require "connect.php";
    require "check_integrity.php";

    $kategori = $_SESSION["kategori"];
    $ukm_lk = $_SESSION["nrp"];

    print_r($_POST);
    $oldPass = $_POST['old_pass'];
    $password = $_POST["new_pass"];
    $confirmPass = $_POST['confirm_pass'];
    $db = "";
    if($_POST["tipe"] === "ukm"){
        $db = "ukm";
        $sql = "SELECT * FROM `ukm` where nama_ukm='$ukm_lk'";
    }
    else if($_POST["tipe"] === "lk"){
        $db = "lk";
        $sql = "SELECT * FROM `lk` where nama_lk='$ukm_lk'";
    }

    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
    if($oldPass == $row['password']){
        if ($password==$confirmPass){
            $query = $kategori == "ukm" ? "UPDATE $kategori SET password = '$password' WHERE nama_ukm = '$ukm_lk'" : "UPDATE $kategori SET password = '$password' WHERE nama_lk = '$ukm_lk'";

            if ($conn->query($query) === TRUE) {
                header("Location: ../dashboard/ganti_password.php?status=1");
            }
            else{
                echo "Error updating record: " . $conn->error();
            }
        }else{
            header("Location: ../dashboard/ganti_password.php?status=3");
        }
    }else{
        header("Location: ../dashboard/ganti_password.php?status=2");
    }


    

?>