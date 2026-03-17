<?php
	include 'connect.php';
	if($_SESSION['status']==0 || $_SESSION['nrp']=="" || !isset($_SESSION['nrp'])){
        header('location: ../../login.php');
    }

	if(isset($_POST['submit']))
	{
		$nrp = $_SESSION['nrp'];
		$nama = $_POST['nama'];
		$jurusan = $_POST['jurusan'];
		$angkatan =$_POST['angkatan'];
		$email = $_POST['email'];
		$idline = $_POST['id_line'];
		$telp = $_POST['no_telp'];
		$ipk = $_POST['ipk'];
		$domisili = $_POST['domisili'];
		// $pengalaman = $_POST['pengalaman'];
		// $kelebihan = $_POST['kelebihan'];
		// $kekurangan = $_POST['kekurangan'];
		// $komitmen = $_POST['komitmen'];
		$div1 = $_POST['div1'];
		$div2 = $_POST['div2'];
		$imap = false;

		
		if($nrp!=null && $nama!=null && $jurusan!=null && $angkatan!=null && $email!=null && $idline!=null && $telp!=null && $ipk!=null 
        && $domisili!=null && $div1!=null
		) 
		{
			if($nrp!="" && $nrp!=null){
				if($div2 != null){
					$sql = "INSERT INTO `pendaftar` (`id`, `nrp`, `nama_lengkap`, `jurusan`, `angkatan`, `email`, `line`, `telp`, `ipk`, `domisili`, `divisi1`, `divisi2`, `ktm`, `chart`, `skkk`, `kecurangan`, `cv`, `portofolio`) 
					VALUES (DEFAULT, '".$nrp."', '".$nama."', '".$jurusan."', '".$angkatan."', '".$email."', '".$idline."', '".$telp."', '".$ipk."', '".$domisili."' , '".$div1."', '".$div2."', NULL, NULL, NULL, NULL, NULL, NULL)";
					$query = mysqli_query($con, $sql);
					$imap = true;
				} else{
					$sql = "INSERT INTO `pendaftar` (`id`, `nrp`, `nama_lengkap`, `jurusan`, `angkatan`, `email`, `line`, `telp`, `ipk`, `domisili`, `divisi1`, `ktm`, `chart`, `skkk`, `kecurangan`, `cv`, `portofolio`) 
					VALUES (DEFAULT, '".$nrp."', '".$nama."', '".$jurusan."', '".$angkatan."', '".$email."', '".$idline."', '".$telp."', '".$ipk."', '".$domisili."' , '".$div1."', NULL, NULL, NULL, NULL, NULL, NULL)";
					$query = mysqli_query($con, $sql);

					
					$imap = true;
				}
			}
		}
		
		
		if($imap){
			// $result = array(
			// 	"status" => 1,
			// 	"error" => "Success",
			// 	'redirect' => "pendaftaran/kebutuhan_data.php"
			// );
			header("Location: ../kebutuhan_data.php");
		}else{
			// $result = array(
			// 	"status" => 0,
			// 	"error" => "Failed",
			// 	'redirect' => "none"
			// );
			header("Location: ../data_peserta.php");
		}
	}
?>
