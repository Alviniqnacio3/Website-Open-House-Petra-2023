<?php 
    // require "connect.php";
    if (isset($_SESSION['nrp'])){
        if(strlen($_SESSION['nrp'])!=9){
            header("location: ../../../daftar/");
        }
    }else{
        header("location: ../../../daftar/");
    }
?>