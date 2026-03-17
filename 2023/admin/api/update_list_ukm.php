<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

require "../api/connect.php";
require "../api/check_integrity.php";

session_start();
$_SESSION["nrpMaba"] = $_POST["nrp"];
$nrp = $_SESSION["nrpMaba"];
$ukm = $_SESSION["nrp"];
print_r($_POST);
if(isset($_POST["lihat"])){
    header("Location: ../dashboard/lihat_jawaban_ukm.php");
}
else if(isset($_POST["terima"])){
    $query = "UPDATE pendaftar_maba SET terima = 'terima' WHERE nrp = '$nrp' AND ukm = '$ukm'";

    if($conn -> query($query) === true){
        $mail = new PHPMailer(true);
            try {
        //server
                $mail->SMTPDebug = 0;                      
                $mail->isSMTP();                                            
                $mail->Host       = 'smtp.gmail.com';                     
                $mail->SMTPAuth   = true;                                  
                $mail->setFrom('openhouse-wgg@petra.ac.id', 'OpenHouse');
                $mail->Username   = 'openhouse-wgg@petra.ac.id';                     //SMTP username gmail
                $mail->Password   = 'qiikhtpcticwzigs';                       //SMTP password gmail
                $mail->SMTPSecure = 'tls';            
                $mail->Port       = 587;                                   
                $mail->addAddress($nrp . "@john.petra.ac.id");     //Add tujuan email

                $mail->isHTML(true);                                
                $mail->Subject = "Penerimaan mahasiswa dengan NRP ($nrp) untuk UKM $ukm";
                $mail->Body    = nl2br("Selamat anda telah diterima masuk ke dalam UKM $ukm");
                $mail->AltBody = "";
                $mail->send();

    // echo 'message has been sent'.$emailpeserta;
        }catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


        header("Location: ../dashboard/list_pendaftarUKM.php?status=0");
    }
    else{
        echo $conn -> error();
    }
}
else if(isset($_POST["terima_semua"])){
    $query = "UPDATE pendaftar_maba SET terima = 'terima' WHERE ukm = '$ukm'";
    $nrpSemua = array();
    $query2 = "SELECT * FROM pendaftar_maba WHERE ukm = '$ukm' AND terima IS NULL";
    $result = $conn->query($query2);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $nrpPendaftar = $row["nrp"];
            array_push($nrpSemua, $nrpPendaftar);
        }
    }
    // foreach($nrpSemua as $nrp){
    //     echo ($nrp . "@john.petra.ac.id");     //Add tujuan email
    // }
    // print_r($nrpSemua);

    if($conn -> query($query) === true){
        $mail = new PHPMailer(true);
            try {
        //server
                $mail->SMTPDebug = 0;                      
                $mail->isSMTP();                                            
                $mail->Host       = 'smtp.gmail.com';                     
                $mail->SMTPAuth   = true;                                  
                $mail->setFrom('openhouse-wgg@petra.ac.id', 'OpenHouse');
                $mail->Username   = 'openhouse-wgg@petra.ac.id';                     //SMTP username gmail
                $mail->Password   = 'qiikhtpcticwzigs';                       //SMTP password gmail
                $mail->SMTPSecure = 'tls';            
                $mail->Port       = 587;                                   
                foreach($nrpSemua as $nrp){
                    $mail->addAddress($nrp . "@john.petra.ac.id");     //Add tujuan email
                }
                $mail->isHTML(true);                                
                $mail->Subject = "Penerimaan mahasiswa dengan NRP ($nrp) untuk UKM $ukm";
                $mail->Body    = nl2br("Selamat anda telah diterima masuk ke dalam UKM $ukm");
                $mail->AltBody = "";
                $mail->send();

    // echo 'message has been sent'.$emailpeserta;
        }catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        header("Location: ../dashboard/list_pendaftarUKM.php?status=0");
    }
    else{
        echo $conn -> error();
    }
}

?>