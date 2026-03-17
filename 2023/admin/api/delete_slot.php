<?php
    require "connect.php";
    require "check_integrity.php";
    $nrp = $_SESSION['nrp'];
    
    $id = $_POST['id'];

    // Delete data
    $sql = "DELETE FROM jadwal_openreg WHERE id=$id AND status=0";

    if ($conn->query($sql) === TRUE) {
        // echo "Record deleted successfully";
        // die();
        header("Location: ../dashboard/data_panitia.php");
    } else {
        echo "Maaf slot baru saja terisi";
        // echo "Error deleting record: " . $conn->error;
    }
?>