<?php 
    require "connect.php";
    require "check_integrity.php";

    echo "<br>";
    print_r($_SESSION);

    $ukm_lk = $_SESSION["nrp"];
    if ($_SESSION["kategori"] == "ukm") {
        $query = "SELECT * FROM foto_kegiatan WHERE ukm = '$ukm_lk'";
    }
    else if ($_SESSION["kategori"] == "lk") {
        $query = "SELECT * FROM foto_kegiatan WHERE lk = '$ukm_lk'";
    }


    $oversize = false;

    echo $_FILES["foto_kegiatan"]["size"];

    if($_FILES["foto_kegiatan"]["size"]>2000000 || $_FILES["foto_kegiatan"]["size"]==0 ){
        $oversize = true;
    }

    if ($counter < 5 && !$oversize) {
        $name = $_FILES["foto_kegiatan"]["name"];
        $image_temp_name = $_FILES['foto_kegiatan']['tmp_name']; 
        $img_ex = pathinfo($name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex); 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($img_ex_lc, $allowTypes)){ 
            $new_img_name = "uploads/" . uniqid("IMG-", true).'.'.$img_ex_lc;
            $path = "../dashboard/" . $new_img_name;
            move_uploaded_file($image_temp_name, $path);
            $ukm_lk = $_SESSION["nrp"];
            $query = "";

            if ($_SESSION["kategori"] == "ukm") {
                $query = "INSERT INTO foto_kegiatan (foto, ukm, lk) VALUES('$new_img_name', '$ukm_lk', NULL)";
            }
            else if ($_SESSION["kategori"] == "lk") {
                $query = "INSERT INTO foto_kegiatan (foto, ukm, lk) VALUES('$new_img_name', NULL, '$ukm_lk')";
            }

            $kategori = $_SESSION["kategori"];
            if ($conn -> query($query) === true) {
                if ($kategori == "ukm") {
                    header("Location: ../dashboard/keteranganUKM.php?status=2");
                }
                else if ($kategori == "lk") {
                    header("Location: ../dashboard/keteranganLK.php?status=2");
                }   
            }
        }
    }
    else {
        $kategori = $_SESSION["kategori"];
        if($oversize){
            if ($kategori == "ukm") {
                header("Location: ../dashboard/keteranganUKM.php?status=5");
            }
            else if ($kategori == "lk") {
                header("Location: ../dashboard/keteranganLK.php?status=5");
            }   
        }else{
            if ($kategori == "ukm") {
                header("Location: ../dashboard/keteranganUKM.php?status=4");
            }
            else if ($kategori == "lk") {
                header("Location: ../dashboard/keteranganLK.php?status=4");
            }   
        }
    }

?>