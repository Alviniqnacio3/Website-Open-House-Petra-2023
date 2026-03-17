<?php
	include 'connect.php';
    // header("Content-Type: application/json");
	$local = true;
	$imap = false;
    $user = strtolower($_POST['nrp']);
	$pass = $_POST['password'];

	//untuk publish
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
	
	/* Return Data */
	if($imap){
		$_SESSION['nrp'] = $user;
		$_SESSION['status'] = 1;
        // $result = array(
        // 	"status" => 1,
        // 	"error" => "Success",
        // 	'redirect' => "pendaftaran/data_peserta.php"
		// );
		// header("Location: ../pengenalan.php");
		header("Location: ../pengumuman.php");

		// header("Location: ../../login.php?status=0");

	}else if(!$loginValid){
		header("Location: ../../login.php?status=0");
	}
	else{
		// $result = array(
        // 	"status" => 0,
        // 	"error" => "wrong username or password",
        // 	'redirect' => "../"
		// );
		header("Location: ../../login.php?status=0");
	}
			
	// echo json_encode($result);
?>
