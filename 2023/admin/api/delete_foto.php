<?php
    require "connect.php";
    require "check_integrity.php";

    print_r($_POST);
    $id = $_POST["id"];
    $kategori = $_SESSION["kategori"];
    $tipe = $_POST["tipe"];
    $path = "";
    $query ="";
    if ($tipe == "") {
        $query = "SELECT * FROM foto_kegiatan WHERE id = '$id'";
    }
    else if ($kategori == "ukm") {
        $query = "SELECT * FROM ukm WHERE id = '$id'";
    }
    else if ($kategori == "lk") {
        $query = "SELECT * FROM lk WHERE id = '$id'";
    }
    
    $result = $conn -> query($query);
    if ($result -> num_rows > 0) {
        while($row = $result ->fetch_assoc()){
            if ($tipe == "logo") {
                $path = "../dashboard/" .$row["logo"];
            }
            else if ($tipe == "poster") {
                $path = "../dashboard/" .$row["poster"];
            }
            else{
                $path = "../dashboard/" .$row["foto"];
            }
        }
        
    }

    
    
    if (unlink($path)) {

        $query = "";
        if ($kategori == "ukm") {
            if ($tipe == "logo") {
                $query = "UPDATE ukm SET logo = '' WHERE id = '$id'";
            }
            else if ($tipe == "poster") {
                $query = "UPDATE ukm SET poster = '' WHERE id = '$id'";
            }
            else{
                $query = "DELETE FROM foto_kegiatan WHERE id = '$id'";
            }
        }
        else if ($kategori == "lk") {
            if ($tipe == "logo") {
                $query = "UPDATE lk SET logo = '' WHERE id = '$id'";
            }
            else if ($tipe == "poster") {
                $query = "UPDATE lk SET poster = '' WHERE id = '$id'";
            }
            else{
                $query = "DELETE FROM foto_kegiatan WHERE id = '$id'";
            }
        }
        
        
        
        if ($conn->query($query) === true) {
            if ($kategori == "ukm") {
                header("Location: ../dashboard/keteranganUKM.php?status=3");
            }
            else if ($kategori == "lk") {
                header("Location: ../dashboard/keteranganLK.php?status=3");
            }
        }
    }else{
        $query = "";
        if ($kategori == "ukm") {
            if ($tipe == "logo") {
                $query = "UPDATE ukm SET logo = '' WHERE id = '$id'";
            }
            else if ($tipe == "poster") {
                $query = "UPDATE ukm SET poster = '' WHERE id = '$id'";
            }
            else{
                $query = "DELETE FROM foto_kegiatan WHERE id = '$id'";
            }
        }
        else if ($kategori == "lk") {
            if ($tipe == "logo") {
                $query = "UPDATE lk SET logo = '' WHERE id = '$id'";
            }
            else if ($tipe == "poster") {
                $query = "UPDATE lk SET poster = '' WHERE id = '$id'";
            }
            else{
                $query = "DELETE FROM foto_kegiatan WHERE id = '$id'";
            }
        }
        
        
        
        if ($conn->query($query) === true) {
            if ($kategori == "ukm") {
                header("Location: ../dashboard/keteranganUKM.php?status=3");
            }
            else if ($kategori == "lk") {
                header("Location: ../dashboard/keteranganLK.php?status=3");
            }
        }
    }

?>