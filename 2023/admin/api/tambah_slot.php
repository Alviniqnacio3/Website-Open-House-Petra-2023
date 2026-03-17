<?php
    require "connect.php";
    require "check_integrity.php";
    $nrp = $_SESSION['nrp'];
    
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];

    //Check dobel input
    $sql = "SELECT * FROM jadwal_openreg WHERE nrp_panit LIKE '$nrp' AND hari_tanggal LIKE '$tanggal' AND jam LIKE '$jam'";
    $result = $conn->query($sql);

    if($row = $result->fetch_assoc()) {
        header("Location: ../dashboard/data_panitia.php?error=1");
        die();
    }

    //SQL
    $sql = "INSERT INTO jadwal_openreg (nrp_panit, hari_tanggal, jam)
    VALUES ('$nrp', '$tanggal', '$jam')";
    
    if ($conn->query($sql) === TRUE) {
      // echo "New record created successfully";
      //Redirect Back
      header("Location: ../dashboard/data_panitia.php");
    } else {
      // echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>