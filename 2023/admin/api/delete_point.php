<?php
    require "connect.php";
    require "check_integrity.php";
    
    $id = $_POST['id'];
    $sql = "SELECT * FROM `score` where id_kelompok = $id";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
    $kelompok = $row['nama_kelompok'];

    $sql = "DELETE FROM score WHERE id_kelompok= $id";

    if ($conn->query($sql) === TRUE) {
        // echo "Record deleted successfully";
        // die();
        $sql = "SELECT sum(score) as total FROM `score` WHERE nama_kelompok like '$kelompok'";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($query);
        if ($row['total']!=null){
            $total = $row['total'];
        }else{
            $total = 0;
        }

        $sql = "UPDATE `kelompok` SET `score` = '$total' WHERE nama_kelompok='$kelompok'";
        echo $sql;
        $query = mysqli_query($conn,$sql);
        
        header("Location: ../dashboard/give_point.php?status=1");
    }

?>