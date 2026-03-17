<?php
    include 'connect.php';

    if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		$query = mysqli_query($con, $_GET['sql']);
        $result = array();
        
        while($row = mysqli_fetch_array($query)){
            array_push($result, $row);
        }
        echo json_encode($result);
	}
?>