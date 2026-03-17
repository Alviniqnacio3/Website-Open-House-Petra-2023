<?php
    require "connect.php";
    require "check_integrity.php";
    $nrp = $_POST['nrp'];
    $div = $_POST['div'];

    $delete  = unlink("../jawaban/".$nrp."_jwb_".$div.".pdf");
    if($delete){
        if ($div=="div1"){
            $sql = "UPDATE interview SET file_jawaban1 = NULL WHERE nrp='$nrp'";
            if ($conn->query($sql) === TRUE) {
                //Redirect Back
                header("Location: ../dashboard/interview.php?nrp=$nrp");
            } else {
                echo "Error delete: " . $conn->error;
            }
        }elseif($div=="div2"){
            $sql = "UPDATE interview SET file_jawaban2 = NULL WHERE nrp='$nrp'";
            if ($conn->query($sql) === TRUE) {
                //Redirect Back
                header("Location: ../dashboard/interview.php?nrp=$nrp");
            } else {
                echo "Error delete: " . $conn->error;
            }
        }
    }else{
        echo "delete not success";
    }

?>