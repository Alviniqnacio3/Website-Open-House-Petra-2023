<?php
    require "connect.php";
    require "check_integrity.php";
    $nrp = $_SESSION['nrp'];

    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\Exception;

    // require '../../PHPMailer/src/Exception.php';
    // require '../../PHPMailer/src/PHPMailer.php';
    // require '../../PHPMailer/src/SMTP.php';
    
    $nama_samaran = $_POST['nama_samaran'];
    $meet = $_POST['meet'];
    $scheme = parse_url($meet, PHP_URL_SCHEME);
    if (empty($scheme)){
        $meet = 'https://' . ltrim($meet, '/');
    }
    $line = $_POST['line'];



    //SQL
    $sql = "UPDATE panitia SET nama_samaran='$nama_samaran', meet='$meet', line='$line' WHERE nrp='$nrp'";

    if ($conn->query($sql) === TRUE) {
        // // echo "Record updated successfully";

        // //Cari semua peserta
        // $sql = "SELECT jadwal_openreg.*, peserta.email, peserta.nama_lengkap FROM jadwal_openreg 
        //         LEFT JOIN peserta ON jadwal_openreg.nrp_peserta = peserta.nrp 
        //         WHERE jadwal_openreg.nrp_panit LIKE '$nrp' AND jadwal_openreg.status IS TRUE";
        // $result = $conn->query($sql);
        
        // if ($result->num_rows > 0) {
        //     // output data of each row
        //     while($row = $result->fetch_assoc()) {
        //         $nrp_peserta = $row['nrp_peserta'];
        //         $nama_lengkap = $row['nama_lengkap'];
        //         $email = $row['email'];

        //         //Format Email untuk setiap peserta
        //         $emailpeserta = $email;
		// 		$judulpeserta = '[UPDATE] Perubahan Link Meet / ID Line Panitia';
		// 		$pesanpeserta = "Halo ".$nama_lengkap.", panitia yang akan mewawancarai kamu telah mengubah Link Meet / ID Line dengan detail sebagai berikut:<br>
		// 		ID Line    : ".$line."<br>
		// 		Link Meet  : ".$meet."<br><br>
		// 		Terimakasih untuk perhatiannya!";

        //         //Send Email
        //         //email peserta
		// 		$mail = new PHPMailer(true);
		// 		try {
		// 			//server
		// 			$mail->SMTPDebug = 2;                      
		// 			$mail->isSMTP();                                            
		// 			$mail->Host       = 'smtp.gmail.com';                     
		// 			$mail->SMTPAuth   = true;                                  
		// 			$mail->Username   = 'lkmmtm32@gmail.com';                     //SMTP username gmail
		// 			$mail->Password   = 'qyhqrhibwidteged';                       //SMTP password gmail
		// 			$mail->SMTPSecure = 'tls';            
		// 			$mail->Port       = 587;                                   
				
		// 			$mail->addAddress($emailpeserta);     //Add tujuan email
		// 			$mail->isHTML(true);                                
		// 			$mail->Subject = $judulpeserta;
		// 			$mail->Body    = $pesanpeserta;
		// 			$mail->AltBody = '';
		// 			$mail->send();
					
		// 			//echo 'message has been sent';
		// 		}catch (Exception $e) {
		// 			//echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		// 		}
        //     }
        // }

        //Redirect Back
        // header("Location: ../dashboard/data_panitia.php");
        echo "<script>window.location.href='../dashboard/data_panitia.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }

?>