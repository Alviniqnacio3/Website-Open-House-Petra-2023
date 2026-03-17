<?php
    include 'api/connect.php';
    // if(date("Y-m-d h:i:sa")>date("Y-m-d h:i:sa",strtotime("11:59pm june 10 2023"))){// close regist
    //     // header("location: coming_soon.php");
    //     // echo 'asdf';
    // }else if(date("Y-m-d h:i:sa")<date("Y-m-d h:i:sa",strtotime("11:59pm june 4 2023"))){// open regist
    //     // header("location: coming_soon.php");
    // }else{
    //     header("location: pengenalan.php");
    // }
    header("Location: pengumuman.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran | OPENHOUSE 2023</title>
    <link rel="icon" type="image/x-icon" href="../asset/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <link href="pendaftaran.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- <script src="js/session_check.js"></script> -->

</head>

<style>
    body {
        overflow: hidden;
    }
    #title {
        margin-top: -5%;
    }

</style>

<body>
    <!-- bg -->
    <div id='stars'></div>
    <div id='stars2'></div>
    <div id='stars3'></div>



    <div class="fix vh-100">
        <!-- <section class="vh-100"> -->
        <div class="container py-5 px-4 my-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-7 mx-auto">
                <form action="api/redirect.php" method="post">
                    <center>
                        <h1 class="text-white" id="title"><strong>OPEN RECRUITMENT OPENHOUSE IN MAINTENANCE</strong></h1>
                    </center>
                    
                </form>
            </div>
            </div>
        </div>
        <!-- </section> -->
    </div>