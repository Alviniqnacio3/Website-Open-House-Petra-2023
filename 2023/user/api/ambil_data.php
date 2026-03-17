<?php 
    require "connect.php";
    require "session_check.php";

    if($_SERVER['REQUEST_METHOD'] == "GET")
	{
        $query = "SELECT * FROM `kelompok` ORDER BY score DESC";
		$query = mysqli_query($con, $query);
        $result = array();
        
        while($row = mysqli_fetch_array($query)){
            array_push($result, $row);
        }
        echo json_encode($result);
	}

?>