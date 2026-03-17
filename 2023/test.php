<?php
include '../daftar/api/connect.php';
?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Send Email
//email peserta
$mail = new PHPMailer(true);

try {
    //server
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->setFrom('openhouse-wgg@petra.ac.id', 'OpenHouse');
    $mail->Username = 'openhouse-wgg@petra.ac.id'; //SMTP username gmail
    $mail->Password = 'qiikhtpcticwzigs'; //SMTP password gmail
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->addAddress('alviniqnacio3@gmail.com'); //Add tujuan email
    // $mail->addAddress('alviniqnacio@gmail.com');     //Add tujuan email
    // $mail->addAddress('alviniqnaciojr@gmail.com');     //Add tujuan email


    $mail->isHTML(true);
    $mail->Subject = "test email";
    $mail->Body = nl2br("testtt3");
    $mail->AltBody = '';
    // $mail->send();


    // echo 'message has been sent'.$emailpeserta;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
        (function () {
            var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/64b3df3694cf5d49dc63e4bc/1h5f9vrs5';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</head>

<body>
    <?php
    $sql = "SELECT * from ukm where nama_ukm = 'Modeling'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($query);

    //display image from blob file
    // echo '<img src="data:image/jpeg;base64,'.    base64_encode($row['poster']).'"/>';
    
    // $data = getMahasiswa("C14230077");
    // var_dump($data);
    
    // $dataKelompok = getKelompok($data->id_kelompok);
    // echo $dataKelompok->nama;
    

    //add semua kelompok ke database
    // $sql = "SELECT * FROM `token`";
    // $query = mysqli_query($con,$sql);
    // $data = mysqli_fetch_array($query); 
    
    // $token = $data['token'];
    // $url = "https://wgg.petra.ac.id/api/2023/kelompok";
    // $url = curl_init($url);
    // curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
    // curl_setopt($url, CURLOPT_HTTPHEADER, array(
    //     'Content-Type: application/json',
    //     'Authorization: Bearer ' . $token
    //     ));
    // $data = json_decode(curl_exec($url))->data;
    
    // foreach($data as $isi){
    
    //     $sql = "INSERT INTO `kelompok` (`id`, `id_wgg`, `nama_kelompok`) VALUES (NULL, '".$isi->id."', '".$isi->nama."')";
    //     // echo $sql.'<br>';
    //     $query = mysqli_query($con,$sql);
    // }
    
    // $result = file_get_contents("https://john.petra.ac.id/~justin/finger.php?s=c14210154");
    // var_dump(json_decode($result));
    // echo json_decode($result)->hasil[0]->nama;
    // function getStudentNameFinger($nrp)
    // {
    //     // IZIN AMBIL DATA YA PAK JUSTIN HEHEHE :)
    //     $getFingerJSON = json_decode(file_get_contents('http://john.petra.ac.id/~justin/finger.php?s=' . $nrp), true);
    //     $getFingerArray = array_pop($getFingerJSON);
    //     return ucwords(strtolower($getFingerArray[0]['nama']));
    // }
    ?>
</body>

</html>