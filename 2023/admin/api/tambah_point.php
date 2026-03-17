<?php

    require "connect.php";
    require "check_integrity.php";

    // var_dump($_POST);

    $ukm_lk = $_SESSION["nrp"];
    $kelompok = $_POST["Kelompok"];
    $nrp = $_POST['nrp'];
    $point = $_POST["point"];

    function getMahasiswa($mahasiswa){
		global $conn;
		$sql = "SELECT * FROM `token`";
		$query = mysqli_query($conn,$sql);
		$data = mysqli_fetch_array($query); 

		$token = $data['token'];
		$url = "https://wgg.petra.ac.id/api/2023/mahasiswa/$mahasiswa";
		$url = curl_init($url);
		curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($url, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Authorization: Bearer ' . $token
			));
        
		$data = json_decode(curl_exec($url));
        if($data->status=="success"){
            $data = $data->data;
        }else{
            $data = null;
        }
		
		return $data;
	}

    if ($kelompok=='Tidak Tahu'){
        if($nrp=="" || $nrp==null){
            header('location: ../dashboard/give_point.php?status=2');
        }else{
            $data = getMahasiswa($nrp);
            var_dump($data);
            if ($data == null){
                header("location: ../dashboard/give_point.php?status=3");
            }

            $idKelompok = $data->id_kelompok;

            $sql = "SELECT * FROM `kelompok` WHERE id_wgg=$idKelompok";
            $query = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($query);
            if($row!=null){
                $kelompok = $row['nama_kelompok'];
            }else{
                header("location: ../dashboard/give_point.php?status=4");
            }
        }
    }

    
    if($nrp!="" && $nrp!=null){
        $query = "INSERT INTO `score` (`id_kelompok`, `nama_kelompok`, `score`, `pemberi_score`) VALUES (NULL, '$kelompok', '$point', '$ukm_lk')";
        
        if($conn -> query($query) === true){
            $sql = "SELECT sum(score) as total FROM `score` WHERE nama_kelompok like '$kelompok'";
            $query = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($query);
            $total = $row['total'];
            
            $sql = mysqli_query($conn,"UPDATE `kelompok` SET `score` = '$total' WHERE nama_kelompok='$kelompok'");
            
            header("Location: ../dashboard/give_point.php?status=0");
        }else{
            header("location: ../dashboard/give_point.php?status=4");
        }
    }else{
        header('location: ../dashboard/give_point.php?status=2');
    }
?>