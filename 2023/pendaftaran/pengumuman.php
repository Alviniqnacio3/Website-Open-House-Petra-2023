<?php
    
    // if(date("Y-m-d h:i:sa")>date("Y-m-d h:i:sa",strtotime("11:59pm june 10 2023"))){// close regist
    //     // header("location: coming_soon.php");
    //     // echo 'asdf';
    // }else if(date("Y-m-d h:i:sa")<date("Y-m-d h:i:sa",strtotime("11:59pm june 4 2023"))){// open regist
    //     header("location: coming_soon.php");
    // }
    // include 'api/connect.php';
    // include 'api/session_check.php';
    header("location: ../user/comingsoon.html");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman | OPENHOUSE 2023</title>
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

<body>
    <?php 
        // if(isset($_GET['status'])){
        //     echo '<script>swal("Error","Pendaftaran Open House telah ditutup","error");</script>';
        // }
    ?>
    <nav id="nav" class="navbar navbar-expand-lg sticky-top bg-light" style="height: max-content;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <span class="navbar-brand mx-3 h1" id="logo">Open House 2023</span>
            </a>
            <button class="navbar-toggler my-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end bg-light" id="navbarCollapse">
                <div class="navbar-nav">
                    <a style="user-select: none;" class="nav-link px-3 rounded" href="api/logout.php">Log Out</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- bg -->
    <div id='stars'></div>
    <div id='stars2'></div>
    <div id='stars3'></div>

    <div class="fix">
        <div class="container pt-5 px-4 my-5">
            <div class="col-lg-7 mx-auto">
                <center>
                    <h1 class="text-white">&#127881;Congratulations!&#127881;</h1>
                </center>
                <p class="text-center text-white my-4 fs-4">
                    Selamat bagi 32 pendaftar yang telah terpilih menjadi panitia Open House 2023
                </p>
            </div>
        </div>
    </div>

    <div class="container text-center">
        <div class="row row-cols-sm-1 row-cols-md-2">
            
            <div class="col-md-5 mx-auto">
                <div class="card my-5">
                    <div class="card-header">
                        <center>
                            <p class="fs-3 fw-bold my-1">Acara</p>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover text-start">
                            <tbody>
                                <tr>
                                    <td class="fs-5 fw-semibold col-sm-10">Natan Kirana Tando</td>
                                    <td class="fs-5 fw-semibold">c14210266</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Alvin Aprilianto</td>
                                    <td class="fs-5 fw-semibold">d11220114</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Alexander Owen</td>
                                    <td class="fs-5 fw-semibold">d11200140</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Nelsen Wicaksono</td>
                                    <td class="fs-5 fw-semibold">c14210197</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Wahyu Nita Pratama</td>
                                    <td class="fs-5 fw-semibold">d11220241</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Viorysca</td>
                                    <td class="fs-5 fw-semibold">d12220101</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Sherin Tifani</td>
                                    <td class="fs-5 fw-semibold">d11220028</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-5 mx-auto">
                <div class="card my-5">
                    <div class="card-header">
                        <center>
                            <p class="fs-3 fw-bold my-1">Creative</p>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover text-start">
                            <tbody>
                                <tr>
                                    <td class="fs-5 fw-semibold col-sm-10">Elisya Vivian Mely Liustanto</td>
                                    <td class="fs-5 fw-semibold">d11220078</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Made Helena Audrey Felicia W A</td>
                                    <td class="fs-5 fw-semibold">d11220162</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Angel Cynthia Agustina</td>
                                    <td class="fs-5 fw-semibold">d11220258</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Nicholas Shaka Agung</td>
                                    <td class="fs-5 fw-semibold">d11220297</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Jonathan Axel Widjanarko</td>
                                    <td class="fs-5 fw-semibold">d11220304</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Graciella Kusnanto</td>
                                    <td class="fs-5 fw-semibold">d11220213</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-5 mx-auto">
                <div class="card my-5">
                    <div class="card-header">
                        <center>
                            <p class="fs-3 fw-bold my-1">IT</p>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover text-start">
                            <tbody>
                                <tr>
                                    <td class="fs-5 fw-semibold col-sm-10">Mario Christopher</td>
                                    <td class="fs-5 fw-semibold">c14210156</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">James Berlin Tungka</td>
                                    <td class="fs-5 fw-semibold">c14210026</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Charles Wijaya</td>
                                    <td class="fs-5 fw-semibold">c14220046</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Richard Accita Sistwanto</td>
                                    <td class="fs-5 fw-semibold">c14220059</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-5 mx-auto">
                <div class="card my-5">
                    <div class="card-header">
                        <center>
                            <p class="fs-3 fw-bold my-1">Sekretariat</p>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover text-start">
                            <tbody>
                                <tr>
                                    <td class="fs-5 fw-semibold col-sm-10">Laurencia Mellyana</td>
                                    <td class="fs-5 fw-semibold">d11210197</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Caroline</td>
                                    <td class="fs-5 fw-semibold">d11210090</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Audi Wibisono</td>
                                    <td class="fs-5 fw-semibold">d11210105</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Rechelli</td>
                                    <td class="fs-5 fw-semibold">f11220065</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Tania Jessica</td>
                                    <td class="fs-5 fw-semibold">c14220181</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-5 mx-auto">
                <div class="card my-5">
                    <div class="card-header">
                        <center>
                            <p class="fs-3 fw-bold my-1">Perlengkapan</p>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover text-start">
                            <tbody>
                                <tr>
                                    <td class="fs-5 fw-semibold col-sm-10">Margareth Tjandra</td>
                                    <td class="fs-5 fw-semibold">c14220029</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Vincent Putra Gotama</td>
                                    <td class="fs-5 fw-semibold">c14220111</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Jenisa Aurelia Usabeny</td>
                                    <td class="fs-5 fw-semibold">d12200086</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Averina Phoebe Tandiono</td>
                                    <td class="fs-5 fw-semibold">e12200117</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Jonathan Prawira Putra Hartono</td>
                                    <td class="fs-5 fw-semibold">e11210013</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Enrico Jonathan Setiawan</td>
                                    <td class="fs-5 fw-semibold">c13220032</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Richard Efrem</td>
                                    <td class="fs-5 fw-semibold">c14220270</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Leonard Surya Tanaya</td>
                                    <td class="fs-5 fw-semibold">c14220187</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Frederick Silvanus</td>
                                    <td class="fs-5 fw-semibold">c14220170</td>
                                </tr>
                                <tr>
                                    <td class="fs-5 fw-semibold">Stefanus Vitorion Leten</td>
                                    <td class="fs-5 fw-semibold">d11220172</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>