<?php
    require "connect.php";
    require "check_integrity.php";

    $nrp = $_SESSION['nrp'];
    
    $id = $_POST['id'];

    $sql = "DELETE FROM pertanyaan WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // echo "Record deleted successfully";
        // die();
        header("Location: ../dashboard/pertanyaanUKM.php?status=2");
    }

?>