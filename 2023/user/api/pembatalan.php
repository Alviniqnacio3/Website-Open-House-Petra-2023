<?php
require "connect.php";
require "session_check.php";

if(isset($_POST["idBatal"])){
    $id = $_POST['idBatal'];
    $sql = "UPDATE `pendaftar_maba` SET `cancel` = 'canceled' WHERE `pendaftar_maba`.`id` = $id";
    $query = mysqli_query($con,$sql);
    
    header("location:../daftar.php?status=4");
}else{
    header("location:../daftar.php?status=5");
}

?>