<?php
include "user/api/connect.php";


$url = "https://wgg.petra.ac.id/api/auth/login";
$user = "c14210154@john.petra.ac.id";
$pass = "f@#Du5{CoC,6TmjsL$";
$postData = array(
    'email' => $user,
    'password' => $pass
);

$context = stream_context_create(array(
    'http' => array(
        'method' => 'POST',
        'header' => "Content-Type: application/json",
        'content' => json_encode($postData)
    )
));

$reponse = file_get_contents($url,false,$context);

$reponse = json_decode($reponse);

// var_dump($reponse);
// var_dump($reponse->access_token);
$token = $reponse->access_token;


$sql = "UPDATE `token` SET `token` = '$token' WHERE `token`.`id` = 1";
$query = mysqli_query($con,$sql);

?>