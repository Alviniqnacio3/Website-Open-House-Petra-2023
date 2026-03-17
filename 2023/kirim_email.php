<?php 
include "admin/api/connect.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

date_default_timezone_set('Asia/Jakarta');
$tanggal = date("Y-m-d");
$query = "SELECT * FROM news WHERE tanggal<now() AND status = 'terima' and kirim!='kirim'";

$result = $conn -> query($query);
// var_dump($tanggal); 

if ($result ->  num_rows > 0) {
    while ($row = $result -> fetch_assoc()) {
        $id = $row["id"];
        $query = "UPDATE news SET kirim = 'kirim' WHERE id = '$id'";
        if ($conn -> query($query) === true) {
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
            
                $query = "SELECT * FROM news WHERE id = '$id'";
                $result = $conn -> query($query);
                if ($result -> num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $judul = $row["judul"];
                        $tanggal = $row["tanggal"];
                        $isi = $row["isi"];
                        $ukm = $row["ukm_lk"];
                        $tanggal = date('d F Y', strtotime($tanggal));
                        $query2 = "SELECT * FROM pendaftar_maba WHERE ukm = '$ukm' AND (pembayaran is not null and pembayaran!='') ";

                        $result2 = $conn -> query($query2);
                        if ($result2 -> num_rows > 0) {
                            while ($row2 = $result2->fetch_assoc()) {
                                $nrp = $row2["nrp"];
                                $mail->addAddress($nrp . "@john.petra.ac.id");     //Add tujuan email
                                // echo $nrp;

                            }
                        }
                    }
                }
                $mail->isHTML(true);                                
                $mail->Subject = $judul;
                $mail->Body    = nl2br($isi);
                $mail->AltBody = $isi;
                $mail->send();
            }catch (Exception $e) {
                // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
}else{
    // echo "none";
}

?>
