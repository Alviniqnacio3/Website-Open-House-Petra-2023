<?php
    if($_SESSION['kategori']==null){
        header('location: ../index.php');
    }

    if($_SESSION['nrp']==null || $_SESSION['nrp']==''){
        header('location: ../index.php');
    }

    $valid = true;
?>