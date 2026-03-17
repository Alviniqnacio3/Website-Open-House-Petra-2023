<?php 
    require "connect.php";
    require "session_check.php";

    $error = 0;
    $allowed1 = array('JPG','JPEG','PNG','jpg','jpeg','png');
    $allowed2 = array('pdf','PDF');
    $target_dir = "../files/";

    if (isset($_POST)) {
        $error2 = 0;
        $ukm = $_POST['inputUKM'];

        $sql = "SELECT * FROM `ukm` WHERE nama_ukm='$ukm'";
        $query = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($query);
        $quota = $row['quota'];

        $soldout = false;
        if ($row['audisi'] == 'ya') {
            $tipe = 'audisi';
            $sql = "SELECT count(*) as total FROM `pendaftar_maba` WHERE terima = 'terima' and ukm like '" . $ukm . "' and cancel is null";
        } else {
            $sql = "SELECT count(*) as total FROM `pendaftar_maba` WHERE ukm like '" . $ukm . "' and cancel is null";
            $tipe = 'normal';
            if ($row['kuota_early_bird'] == 0) {
                $tipePendaftaran = 'reguler';
            } else {
                $tipePendaftaran = 'early bird';
            }
        }
        $query = mysqli_query($con, $sql);
        $countQuota = mysqli_fetch_array($query);
        $countQuota = $countQuota['total'];

        if ($countQuota >= $quota) {
            $soldout = true;
        }

        // if($ukm!= "VG" && $ukm!="Selam"){
            $error2 = 99;
        // }

        
        if(!isset($_POST['inputNama'])){
            header("location:../pendaftaran2023.php?ukm=$ukm&&status=1");
            $error2 = 1;
        }else{
            $nama = $_POST['inputNama'];
        }
        if(!isset($_POST['inputNRP'])){
            header("location:../pendaftaran2023.php?ukm=$ukm&&status=2");
            $error2 = 1;
        }else{
            $nrp = $_POST['inputNRP'];
        }
        if(!isset($_POST['inputJurusan'])){
            header("location:../pendaftaran2023.php?ukm=$ukm&&status=3");
            $error2 = 1;
        }else{
            $jurusan = $_POST['inputJurusan'];
        }
        if(!isset($_POST['inputFakultas'])){
            header("location:../pendaftaran2023.php?ukm=$ukm&&status=4");
            $error2 = 1;
        }else{
            $fakultas = $_POST['inputFakultas'];
        }
        if(!isset($_POST['inputAngkatan'])){
            header("location:../pendaftaran2023.php?ukm=$ukm&&status=5");
            $error2 = 1;
        }else{
            $angkatan = $_POST['inputAngkatan'];
        }
        if(!isset($_POST['inputNoTelp'])){
            header("location:../pendaftaran2023.php?ukm=$ukm&&status=6");
            $error2 = 1;
        }else{
            $noTelp = $_POST['inputNoTelp'];
        }

        $sql = "SELECT * FROM `pendaftar_maba` WHERE nrp = '$nrp' and UKM='$ukm'";
        $query = mysqli_query($con,$sql);
        $check = mysqli_fetch_array($query);
        if ($check!=null){
            $error2 = 2;
        }


        if ($error2==0 && !$soldout){

            $besar = (int)$_POST['total_pertanyaan'];
            
            // input data ke database
            $query_input = "INSERT INTO `pendaftar_maba` (`id`, `nama`, `nrp`, `jurusan`, `fakultas`, `angkatan`,`UKM`,`telepon`) VALUES (NULL,'$nama','$nrp','$jurusan','$fakultas','$angkatan','$ukm','$noTelp')";
            $result = mysqli_query($con,$query_input);

            // ambil id dari pendaftar maba
            $check_id = "SELECT * FROM `pendaftar_maba` WHERE `nama` LIKE '$nama' AND `nrp` LIKE '$nrp' AND `jurusan` LIKE '$jurusan' AND `fakultas` LIKE '$fakultas' AND `angkatan` LIKE '$angkatan'";
            $result = mysqli_query($con, $check_id);
            $result = mysqli_fetch_assoc($result);
            $id=$result['id'];
            echo($id."<br>");
            
            for ($x = 1; $x <= $besar; $x++) {
                $jenisPertanyaan = $_POST['jenisPertanyaan_UKM'.$x];
                $idPertanyaan = $_POST['idPertanyaan_UKM'.$x];
                echo($jenisPertanyaan."  -   ".$idPertanyaan."<br>");
                if($jenisPertanyaan == "text"){
                    echo("text <br>");
                    $jawaban_pertanyaan = $_POST['pertanyaan_UKM'.$x];

                    $insertpertanyaan = "INSERT INTO `jawaban` (`id`, `id_pendaftar_maba`,`nrp_penjawab`, `id_pertanyaan`, `jawaban`) VALUES (NULL,'$id','$nrp','$idPertanyaan','$jawaban_pertanyaan')";
                    mysqli_query($con, $insertpertanyaan);
                }else if($jenisPertanyaan == "image"){
                    $jawaban_pertanyaan = basename($_FILES["pertanyaan_UKM".$x]["name"]);
                    $jawaban_pertanyaan_ext = strtolower(pathinfo($jawaban_pertanyaan,PATHINFO_EXTENSION));
                    $jawaban_pertanyaan = $target_dir."image/".$id."_".$nrp.".".$jawaban_pertanyaan_ext;
                    if ($_FILES["pertanyaan_UKM".$x]['size'] > 5000000000){
                        $error = 1;
                    }
                    if(!in_array($jawaban_pertanyaan_ext,$allowed1)){
                        $error = 1;
                    }

                    if($error==0 && $nrp!="" && $nrp!=null && $id!="" && $id!=null){
                        move_uploaded_file($_FILES["pertanyaan_UKM".$x]['tmp_name'], $jawaban_pertanyaan);

                        $jawaban_pertanyaan = "image/".$id."_".$nrp.".".$jawaban_pertanyaan_ext;
                        $insertpertanyaan = "INSERT INTO `jawaban` (`id`, `id_pendaftar_maba`,`nrp_penjawab`, `id_pertanyaan`, `jawaban`) VALUES (NULL,'$id','$nrp','$idPertanyaan','$jawaban_pertanyaan')";
                        mysqli_query($con, $insertpertanyaan);
                    }


                }else if($jenisPertanyaan ==  "else"){
                    $jawaban_pertanyaan = basename($_FILES["pertanyaan_UKM".$x]["name"]);
                    $jawaban_pertanyaan_ext = strtolower(pathinfo($jawaban_pertanyaan,PATHINFO_EXTENSION));
                    $jawaban_pertanyaan = $target_dir."pdf/".$id."_".$nrp.".".$jawaban_pertanyaan_ext;
                    if ($_FILES["pertanyaan_UKM".$x]['size'] > 5000000000){
                        $error = 1;
                    }
                    if(!in_array($jawaban_pertanyaan_ext,$allowed2)){
                        $error = 1;
                    }

                    if( $error==0 && $nrp!="" && $nrp!=null && $id!="" && $id!=null){
                        move_uploaded_file($_FILES["pertanyaan_UKM".$x]['tmp_name'], $jawaban_pertanyaan);

                        $jawaban_pertanyaan = "pdf/".$id."_".$nrp.".".$jawaban_pertanyaan_ext;
                        $insertpertanyaan = "INSERT INTO `jawaban` (`id`, `id_pendaftar_maba`,`nrp_penjawab`, `id_pertanyaan`, `jawaban`) VALUES (NULL,'$id','$nrp','$idPertanyaan','$jawaban_pertanyaan')";
                        mysqli_query($con, $insertpertanyaan);
                    }
                    
                }
            }
            header("location:../daftar.php?status=0");
        }else if($error2==1){
            header("location:../pendaftaran2023.php?ukm=$ukm&&status=8");
        }else if($error2==2){
            header("location:../pendaftaran2023.php?ukm=$ukm&&status=9");
        }else if($soldout){
            header("location:../pendaftaran2023.php?ukm=$ukm&&status=10");
        }else if($error2==99){
            header("location:../detail-ukm.php?ukm=$ukm&&status=99");
        }
    }else{
        header("location:../pendaftaran2023.php?ukm=$ukm&&status=7");
    }

    
?>
