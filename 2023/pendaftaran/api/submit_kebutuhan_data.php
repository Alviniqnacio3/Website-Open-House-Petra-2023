<?php
	include 'connect.php';
    // header("Content-Type: application/json");
	if($_SESSION['status']==0 || $_SESSION['nrp']=="" || !isset($_SESSION['nrp'])){
        header('location: ../../login.php');
    }
	
	if(isset($_POST))
	{	
        $portofolio = $_POST['portofolio'];
		$nrp = $_SESSION['nrp'];
		$error = 0;
		$allowed1 = array('JPG','JPEG','PNG','jpg','jpeg','png');
		$allowed2 = array('pdf','PDF');
		$target_dir = "../files/";

		// $vaksin = basename($_FILES["vaksin"]["name"]);
		$ktm = basename($_FILES["ktm"]["name"]);
		$nilai = basename($_FILES["nilai"]["name"]);
		$skkk = basename($_FILES["skkk"]["name"]);
		$kecurangan = basename($_FILES["kecurangan"]["name"]);
		$cv = basename($_FILES["cv"]["name"]);
	
		// $vaksin_ext = strtolower(pathinfo($vaksin,PATHINFO_EXTENSION));
		$ktm_ext = strtolower(pathinfo($ktm,PATHINFO_EXTENSION));
		$nilai_ext = strtolower(pathinfo($nilai,PATHINFO_EXTENSION));
		$skkk_ext = strtolower(pathinfo($skkk,PATHINFO_EXTENSION));
		$kecurangan_ext = strtolower(pathinfo($kecurangan,PATHINFO_EXTENSION));
		$cv_ext = strtolower(pathinfo($cv,PATHINFO_EXTENSION));

		// $vaksin = $target_dir."vaksin/".$nrp.".".$vaksin_ext;
		$ktm = $target_dir."ktm/".$nrp.".".$ktm_ext;
		$nilai = $target_dir."nilai/".$nrp.".".$nilai_ext;
		$skkk = $target_dir."skkk/".$nrp.".".$skkk_ext;
		$kecurangan = $target_dir."kecurangan/".$nrp.".".$kecurangan_ext;
		$cv = $target_dir."cv/".$nrp.".".$cv_ext;
		
		if ($_FILES['ktm']['size'] > 5000000000 || $_FILES['nilai']['size'] > 5000000000
		|| $_FILES['skkk']['size'] > 5000000000 || $_FILES['kecurangan']['size'] > 5000000000 || 
		$_FILES['cv']['size'] > 5000000000){
			$error = 1;
		}

		if(!in_array($ktm_ext,$allowed1) || !in_array($nilai_ext,$allowed1)
		|| !in_array($skkk_ext,$allowed1) || !in_array($kecurangan_ext,$allowed1) || !in_array($cv_ext,$allowed2)){
			$error = 1;
		}


		if($error==0 && $nrp!="" && $nrp!=null)
		{
			// move_uploaded_file($_FILES['vaksin']['tmp_name'], $vaksin);
			move_uploaded_file($_FILES['ktm']['tmp_name'], $ktm);
			move_uploaded_file($_FILES['nilai']['tmp_name'], $nilai);
			move_uploaded_file($_FILES['skkk']['tmp_name'], $skkk);
			move_uploaded_file($_FILES['kecurangan']['tmp_name'], $kecurangan);
			move_uploaded_file($_FILES['cv']['tmp_name'], $cv);


			// $vaksin = "vaksin/".$nrp.".".$vaksin_ext;
			$ktm = "ktm/".$nrp.".".$ktm_ext;
			$nilai = "nilai/".$nrp.".".$nilai_ext;
			$skkk = "skkk/".$nrp.".".$skkk_ext;
			$kecurangan = "kecurangan/".$nrp.".".$kecurangan_ext;
			$cv = "cv/".$nrp.".".$cv_ext;

			$sql = "UPDATE `pendaftar` 
			SET `ktm` = '".$ktm."', `chart` = '".$nilai."', 
			`skkk` = '".$skkk."', `kecurangan` = '".$kecurangan."', `cv` = '".$cv."', `portofolio` = '".$portofolio."' 
			WHERE `pendaftar`.`nrp` = '".$nrp."'";
			$query = mysqli_query($con,$sql);
			header('location: ../pilih_jadwal.php');
		}else{
			header('location: ../kebutuhan_data.php');
		}
	}
?>