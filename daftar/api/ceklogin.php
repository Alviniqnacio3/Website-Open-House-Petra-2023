<?php
	include 'connect.php';
    // header("Content-Type: application/json");
	$local = true;
	$imap = false;
    $user = trim(strtolower($_POST['nrp']));
	$pass = $_POST['password'];

	// $user = "C14230077";
	// ambil nrp (tahun angkatan)
	$character = str_split($user);
	$tahun = $character[3].$character[4];
	settype($tahun,'int');

	if($tahun==23){
		echo "ANGKATAN 23";
		$data = getMahasiswa($user);
		var_dump($data);
		$nrp = $data->nrp;
		$nama = $data -> nama;
		$prodi = $data -> prodi;
		$id_kelompok = $data -> id_kelompok;


		if(isset($data)){
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				if ($local==false){
					$timeout = 30;
					$fp = fsockopen ($host='john.petra.ac.id',$port=110,$errno,$errstr,$timeout);
					$errstr = fgets ($fp); 

					if (substr ($errstr,0,1) == '+'){ 
						fputs ($fp,"USER ".$user."\n");
						$errstr = fgets ($fp);
						if (substr ($errstr,0,1) == '+')
						{
							fputs ($fp,"PASS ".$pass."\n");
							$errstr = fgets ($fp);
							if (substr ($errstr,0,1) == '+')
							{
								$imap = true;
								$loginValid = true;
								$_SESSION['nrp'] = $nrp;
								$_SESSION['nama'] = $nama;
								$_SESSION['prodi'] = $prodi;
								$_SESSION['angkatan'] = "2023";
								$_SESSION['id_kelompok']=$id_kelompok;
							}
						}
					}
				}else{
					$imap = true;
					$_SESSION['nrp'] = $nrp;
					$_SESSION['nama'] = $nama;
					$_SESSION['prodi'] = $prodi;
					$_SESSION['angkatan'] = "2023";
					$_SESSION['id_kelompok']=$id_kelompok;
				}
			}
		}else{
			header("Location: ../index.php?status=0");
		}

	}else{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			if ($local==false){
				$timeout = 30;
				$fp = fsockopen ($host='john.petra.ac.id',$port=110,$errno,$errstr,$timeout);
				$errstr = fgets ($fp); 

				if (substr ($errstr,0,1) == '+'){ 
					fputs ($fp,"USER ".$user."\n");
					$errstr = fgets ($fp);
					if (substr ($errstr,0,1) == '+')
					{
						fputs ($fp,"PASS ".$pass."\n");
						$errstr = fgets ($fp);
						if (substr ($errstr,0,1) == '+')
						{
							$imap = true;
							$loginValid = true;
						}
					}
				}
			}else{
				$imap = true;
			}
		}
	}

	
	/* Return Data */
	if($imap){
		$_SESSION['nrp'] = $user;
		$_SESSION['status'] = 1;
		if(isset($_SESSION['id_kelompok'])){
			$sql = "SELECT * FROM `kelompok` WHERE id_wgg=".$_SESSION['id_kelompok'];
			$query = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($query);
			if ($row!=null){
				$_SESSION['nama_kelompok']=$row['nama_kelompok'];
			}else{
				header("Location: ../index.php?status=1");
			}
		}else{
			$_SESSION['nama_kelompok']= null;
		}

		// $query = "SELECT * FROM mahasiswa_baru WHERE nrp = '$user'";
		// $result = $con -> query($query);

		// if ($result -> num_rows > 0) {
			header("Location: ../../2023/user/main.php");
		// }
		// else {
		// 	$query = "INSERT INTO mahasiswa_baru(nrp) VALUES('$user')";
		// 	if ($con->query($query) === true) {
		// 		if ($tahun == 23) {
		// 			header("Location: ../../2023/user/story.php");
		// 		}
		// 		else{
		// 			header("Location: ../../2023/user/main.php");
		// 		}

		// 	}
		// }

        // $result = array(
        // 	"status" => 1,
        // 	"error" => "Success",
        // 	'redirect' => "pendaftaran/data_peserta.php"
		// );
		// header("Location: ../pengenalan.php");

		// header("Location: ../../login.php?status=0");

	}else if(!$loginValid){
		header("Location: ../index.php?status=0");
	}
	else{
		// $result = array(
        // 	"status" => 0,
        // 	"error" => "wrong username or password",
        // 	'redirect' => "../"
		// );
		header("Location: ../index.php?status=0");
	}
?>
