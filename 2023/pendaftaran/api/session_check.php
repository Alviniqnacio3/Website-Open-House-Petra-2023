<?php
    // session_start();
    // if (!isset($_SESSION['nrp']) || $_SESSION['nrp'] == "") {
    //    $result = 0;
    // } else {
    //     $result = 1;
    // }
    // echo json_encode($result);
    $nrp = $_SESSION['nrp'];
    $status = $_SESSION['status'];
    if($_SESSION['status']==0 || $_SESSION['nrp']=="" || !isset($_SESSION['nrp'])){
        header('location: ../login.php');
    }
?>