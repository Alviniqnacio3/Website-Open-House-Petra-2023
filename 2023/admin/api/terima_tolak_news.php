<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

require "../api/connect.php";
require "../api/check_integrity.php";

$id = $_POST["id"];
$notes = $_POST["alasan"];


print_r($_POST);

if (isset($_POST["terima"])) {
    $query = "UPDATE news SET status = 'terima', kirim = 'tidak' WHERE id = '$id'";
}
else {        
    $query = "UPDATE news SET status = 'tolak' , notes = '$notes' WHERE id = '$id'";
}

if ($conn -> query($query) == true) {
    if (isset($_POST["terima"])) {

    //Send Email
    //email peserta
    // $mail = new PHPMailer(true);
    //     try {
    //     //server
    //         $mail->SMTPDebug = 0;                      
    //         $mail->isSMTP();                                            
    //         $mail->Host       = 'smtp.gmail.com';                     
    //         $mail->SMTPAuth   = true;                                  
    //         $mail->setFrom('openhouse-wgg@petra.ac.id', 'OpenHouse');
    //         $mail->Username   = 'openhouse-wgg@petra.ac.id';                     //SMTP username gmail
    //         $mail->Password   = 'qiikhtpcticwzigs';                       //SMTP password gmail
    //         $mail->SMTPSecure = 'tls';            
    //         $mail->Port       = 587;                                   
            
    //         $query = "SELECT * FROM news WHERE id = '$id'";
    //         $result = $conn -> query($query);
    //         if ($result -> num_rows > 0) {
    //             while ($row = $result->fetch_assoc()) {
    //                 $judul = $row["judul"];
    //                 $tanggal = $row["tanggal"];
    //                 $isi = $row["isi"];
    //                 $ukm = $row["ukm_lk"];
    //                 $tanggal = date('d F Y', strtotime($tanggal));
    //                 $query2 = "SELECT * FROM pendaftar_maba WHERE ukm = '$ukm' AND terima = 'terima'";

    //                 $result2 = $conn -> query($query2);
    //                 if ($result2 -> num_rows > 0) {
    //                     while ($row2 = $result2->fetch_assoc()) {
    //                         $nrp = $row2["nrp"];
    //                         $mail->addAddress($nrp . "@john.petra.ac.id");     //Add tujuan email
    //                     }
    //                 }
    //             }
    //         }

    //         $mail->isHTML(true);                                
    //         $mail->Subject = $judul . " pada tanggal $tanggal UKM $ukm";
    //         $mail->Body    = nl2br($isi);
    //         $mail->AltBody = $isi;
    //         $mail->send();

    // // echo 'message has been sent'.$emailpeserta;
    //     }catch (Exception $e) {
    //         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //     }
    }
    header("Location: ../dashboard/check_news.php?status=1");
}

?>