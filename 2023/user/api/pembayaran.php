<?php 
    require "connect.php";
    require "session_check.php";

    $error = 0;
    $allowed = array('JPG','JPEG','PNG','jpg','jpeg','png');

    $target_dir = "../files/pembayaran/";
    if(isset($_POST)){
        if (isset($_FILES)) {
            $nrp = $_SESSION['nrp'];
            if (isset($_POST['idPendaftar'])){
                $id = $_POST['idPendaftar'];
            }else{
                $error = 3;
            }

            if (isset($_POST['ukm'])){
                $ukm = $_POST['ukm'];
            }else{
                $error = 3;
            }


            $pembayaran = basename($_FILES["image"]["name"]);
            $pembayaran_ext = strtolower(pathinfo($pembayaran,PATHINFO_EXTENSION));
            $pembayaran = $target_dir.$id."_".$nrp."_".$ukm.".".$pembayaran_ext;

            if ($_FILES["image"]['size'] > 2000000){
                $error = 1;
            }

            if(!in_array($pembayaran_ext,$allowed)){
                $error = 2;
            }


            if($error==0 && $nrp!="" && $nrp!=null && $id!="" && $id!=null){
                if (move_uploaded_file($_FILES["image"]['tmp_name'], $pembayaran)){
                    $pembayaran = $id."_".$nrp."_".$ukm.".".$pembayaran_ext;
                    $insertpembayaran = "UPDATE `pendaftar_maba` SET `pembayaran` = '$pembayaran', `tanggal_pembayaran` = now() WHERE `pendaftar_maba`.`id` = '$id';";
                    mysqli_query($con, $insertpembayaran);
                    header("location:../daftar.php?status=0");
                }else{
                    header("location:../daftar.php?status=3");
                };

                
            }else{
                header("location:../daftar.php?status=$error");
            }
        };
    }

?>