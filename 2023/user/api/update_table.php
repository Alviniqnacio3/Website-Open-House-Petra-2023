<?php 
    require "connect.php";
    require "session_check.php";

    if($_SERVER['REQUEST_METHOD'] == "GET")
	{
        $result = array();

        $nrp = $_GET['nrp'];
        $queryuser = "SELECT * FROM `pendaftar_maba` WHERE nrp LIKE '$nrp'";
        $hsluser = mysqli_query($con, $queryuser);
        while ($row = mysqli_fetch_assoc($hsluser)) {
            $ukm = $row['UKM'];

            // QUERY BUAT TAU BERAPA KUOTA UKM ITU
            $query = "SELECT * FROM `ukm` WHERE nama_ukm LIKE '$ukm'";
            $hslquery = mysqli_query($con,$query);
            $hslquery = mysqli_fetch_assoc($hslquery);
            if ($hslquery["audisi"]=='ya'){
                $tipePendaftaran = 'audisi';
                $tipe = "Reguler";
            }else {
                if($hslquery['kuota_early_bird']==0){
                    $tipePendaftaran = 'normal';
                    $tipe = "Reguler";
                }else{
                    $tipePendaftaran = 'early bird';
                    $sql = "SELECT * FROM `pendaftar_maba` WHERE ukm='$ukm'";
                    $query = mysqli_query($con,$sql);
                    $count = 1; 
                    while($rowCount = mysqli_fetch_assoc($query)){
                        if ($rowCount['id']==$row['id']){
                            break;
                        }
                        $count+=1;
                    }
                    if ($count < $hslquery['kuota_early_bird']){
                        date_default_timezone_set('Asia/Jakarta');
                        $phpdate = strtotime($hslquery['tanggal']);
                        $mysqldate = date( 'Y-m-d', $phpdate );
                        $nowDate = date('Y-m-d');
                        if ($nowDate<=$mysqldate){
                            $sqlHangus = "SELECT * FROM `pendaftar_maba` WHERE id =".$row['id']." and ((tanggal + INTERVAL 1 HOUR)>tanggal_pembayaran or (tanggal + INTERVAL 1 HOUR)>now())";
                            $queryHangus = mysqli_query($con,$sqlHangus);
                            $hangus = mysqli_fetch_array($queryHangus);
                            if($hangus==null){
                                $tipe = "Hangus";
                            }else{
                                $tipe = "Early Bird";
                            }
                        }else{
                            $tipe = "Reguler";

                        }
                    }else{
                        $tipe = "Reguler";
                    }
                }
            }    
            $data = array($row['id'],$tipe);
            array_push($result, $data);
        }
	}
    echo json_encode($result);


?>