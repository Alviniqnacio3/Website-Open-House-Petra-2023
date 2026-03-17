<?php
    include 'connect.php';
    include 'session_check.php';
    $sql = "SELECT * FROM `pendaftar` WHERE nrp='".$_SESSION['nrp']."'";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($query);
    if ($data!=null){
        if ($data['ktm']==null && $data['chart']==null && $data['skkk']==null && $data['kecurangan']==null){
            header("Location: ../kebutuhan_data.php");
        }else{
            $sql = "SELECT * FROM `jadwal_openreg` WHERE nrp_pendaftar = '".$_SESSION['nrp']."' ";
            $query = mysqli_query($con,$sql);
            $data = mysqli_fetch_array($query);
            if($data==null){
                header("Location: ../pilih_jadwal.php");
            }else{
                header("Location: ../konfirmasi.php");
            }
        }
    }else{
        header("Location: ../data_peserta.php");
    }
?>