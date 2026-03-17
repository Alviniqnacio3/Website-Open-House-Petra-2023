<?php
    require "connect.php";
    require "check_integrity.php";
    $nrp = $_POST['nrp'];
    $nrp_panit = $_SESSION['nrp'];

    //SQL
    $sql = "UPDATE interview SET submit=TRUE, submit_by='$nrp_panit' WHERE nrp='$nrp'";

    if ($conn->query($sql) === TRUE) {
        // echo "Record updated successfully";
        //Redirect Back
        header("Location: ../dashboard/interview.php?nrp=$nrp");
    } else {
        echo "Error updating record: " . $conn->error;
    }

?>