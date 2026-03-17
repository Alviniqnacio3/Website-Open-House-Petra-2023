<?php	
	include 'connect.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require '../../PHPMailer/src/Exception.php';
	require '../../PHPMailer/src/PHPMailer.php';
	require '../../PHPMailer/src/SMTP.php';

	if($_SESSION['status']==0 || $_SESSION['nrp']=="" || !isset($_SESSION['nrp'])){
        header('location: ../../login.php');
    }
	
	if(isset($_POST['submit']))
	{
		$nrp = $_SESSION['nrp'];


		if (!isset($_GET['status'])){
			$tanggal = $_POST['tanggal'];
			$jam = $_POST['jam'];
			if($tanggal != null and $jam != null){ 
				$datapeserta = "select * from pendaftar where nrp='$nrp'";
				$datapeserta = mysqli_query($con,$datapeserta);
				$rowpeserta = mysqli_fetch_array($datapeserta);
				// var_dump($rowpeserta);

				// $countslot = "SELECT count(*) FROM `jadwal_openreg` 
				// JOIN panitia ON panitia.nrp = jadwal_openreg.nrp_panit
				// WHERE status=0 AND panitia.divisi ='".$rowpeserta['divisi1']."'
				// ORDER BY hari_tanggal";
				// $countslot = mysqli_query($con,$countslot);
				// $countslot = mysqli_fetch_array($countslot);

				// if($countslot < 5){
				// 	$id = "SELECT * FROM jadwal_openreg
				// 	JOIN panitia ON panitia.nrp = jadwal_openreg.nrp_panit
				// 	WHERE hari_tanggal = '".$tanggal."' AND jam = '".$jam."' AND status =0 and panitia.divisi ='".$rowpeserta['divisi1']."'
				// 	LIMIT 1";
				// }else{
				// 	$id = "SELECT * FROM jadwal_openreg
				// 	JOIN panitia ON panitia.nrp = jadwal_openreg.nrp_panit
				// 	WHERE hari_tanggal = '".$tanggal."' AND jam = '".$jam."' AND status =0 and (panitia.divisi ='".$rowpeserta['divisi1']."' OR panitia.divisi='".$rowpeserta['divisi2']."')
				// 	LIMIT 1";
				// }

				$id = "SELECT * FROM jadwal_openreg
				JOIN panitia ON panitia.nrp = jadwal_openreg.nrp_panit
				WHERE hari_tanggal = '".$tanggal."' AND jam = '".$jam."' AND status =0 
				LIMIT 1";
				

				$data = mysqli_query($con,$id);
				$rowjadwal = mysqli_fetch_array($data);


				$sql = "SELECT * FROM `jadwal_openreg` WHERE nrp_pendaftar = '$nrp'";
				$query = mysqli_query($con,$sql);
				$result = mysqli_fetch_array($query);
				
				if($result==null){
					$sql = "UPDATE jadwal_openreg
						SET status = 1, nrp_pendaftar='".$nrp."'
						WHERE id = ".$rowjadwal[0];
					$query = mysqli_query($con,$sql);
				}else{
					echo "<script>window.location.href='../../pendaftaran/konfirmasi.php';</script>";
				}

				$sql = "SELECT * FROM panitia WHERE nrp = '".$rowjadwal['nrp_panit']."' ";
				$query = mysqli_query($con,$sql);
				$rowpanit = mysqli_fetch_array($query);

				$emailpanit = $rowjadwal['nrp_panit'].'@john.petra.ac.id';
				$judulpanit = 'Slot Interview kamu di tanggal '.$tanggal.' jam '.$jam.' sudah di booking';
				$pesanpanit = "Halo ".$rowpanit['nama_lengkap'].", slot interview kamu sudah di booking dengan detail: <br>
				Tanggal		: ".$tanggal."<br>
				Jam			: ".$jam."<br>
				Link Meet	: ".$rowpanit['meet']."<br>
				Nama Peserta: ".$rowpeserta['nama_lengkap']."<br>
				ID Line		: ".$rowpeserta['line'];
				
				// echo $emailpanit;
				// echo $pesanpanit;	

				//email panit
				$mail = new PHPMailer(true);
				try {
					//server
					$mail->SMTPDebug = 2;                      
					$mail->isSMTP();                                            
					$mail->Host       = 'smtp.gmail.com';                     
					$mail->SMTPAuth   = true;                                  
					$mail->Username   = 'lkmmtm32@gmail.com';                     //SMTP username gmail
					$mail->Password   = 'qyhqrhibwidteged';                       //SMTP password gmail
					$mail->SMTPSecure = 'tls';            
					$mail->Port       = 587;                                   
				
					$mail->setFrom('lkmmtm32@gmail.com');
					$mail->addAddress($emailpanit);     //Add tujuan email
					$mail->isHTML(true);                                
					$mail->Subject = $judulpanit;
					$mail->Body    = $pesanpanit;
					$mail->AltBody = '';
					// $mail->send();
				
					echo 'Message has been sent';
				} catch (Exception $e) {
					echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
				}

				// header('location: ../../pendaftaran/konfirmasi.php');
				echo "<script>window.location.href='../../pendaftaran/konfirmasi.php';</script>";
				
			}else{
				header('loaction: ../../pendaftaran/pilih_jadwal.php');
			}
		}else{
			
			//kalau onsite
			$sql = "INSERT INTO `jadwal_openreg` (`id`, `nrp_panit`, `hari_tanggal`, `jam`, `status`, `nrp_pendaftar`)
			VALUES (NULL, 'onsite', now(), now(), '1', '$nrp')";
			$query = mysqli_query($con,$sql);
			header('location: ../../pendaftaran/konfirmasi.php');

		}
	}

	// if(isset($_POST['submitOnsite'])){
	// 	//kalau onsite
	// 	$sql = "INSERT INTO `jadwal_openreg` (`id`, `nrp_panit`, `hari_tanggal`, `jam`, `status`, `nrp_pendaftar`)
	// 	VALUES (NULL, 'onsite', now(), now(), '1', '$nrp')";
	// 	$query = mysqli_query($con,$sql);
	// }
	

	
?>
