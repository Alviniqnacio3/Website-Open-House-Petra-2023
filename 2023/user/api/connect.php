<?php
	// $servername = "openhouse.petra.ac.id";
	// $username = "openhouse";
	// $password = "Petra2107!";
	// $dbname = "openhouse_2023test";

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "openhouse23";
  
	// Create connection
	$con = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($con->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
  
	session_start();

	function getMahasiswa($mahasiswa){
		global $con;
		$sql = "SELECT * FROM `token`";
		$query = mysqli_query($con,$sql);
		$data = mysqli_fetch_array($query); 

		$token = $data['token'];
		$url = "https://wgg.petra.ac.id/api/2023/mahasiswa/$mahasiswa";
		$url = curl_init($url);
		curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($url, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Authorization: Bearer ' . $token
			));
		$data = json_decode(curl_exec($url))->data;
		
		return $data;
	}

?>
