<?php
    
    // if(date("Y-m-d h:i:sa")>date("Y-m-d h:i:sa",strtotime("11:59pm june 10 2023"))){// close regist
    //     // header("location: coming_soon.php");
    //     // echo 'asdf';
    // }else if(date("Y-m-d h:i:sa")<date("Y-m-d h:i:sa",strtotime("11:59pm june 4 2023"))){// open regist
    //     header("location: coming_soon.php");
    // }
    include 'api/connect.php';
    include 'api/session_check.php';

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

<body>
    <?php 
        if(isset($_GET['status'])){
            echo '<script>swal("Error","Pendaftaran Open House telah ditutup","error");</script>';
        }
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
        <!-- <section class="vh-100"> -->
        <div class="container py-5 px-4 my-5">
            <!-- <div class="row d-flex justify-content-center align-items-center h-100"> -->
            <div class="col-lg-7 mx-auto">
                <form action="api/redirect.php" method="post">
                    <center>
                        <h1 class="text-white">Welcome to Open Recruitment Panitia Open House 2023!</h1>
                    </center>
                    <p class="text-center text-white my-4 fs-5">Open House merupakan wadah untuk memperkenalkan
                        UKM, Klub, dan LK
                        yang ada di Universitas Kristen Petra</p>
                    <div class="row text-center text-white my-4">
                        <div class="col-md-6 my-2">
                            <p class="mb-0">Pendaftaran</p>
                            <span class="fs-3 fw-semibold">
                                5-10 Juni 2023
                            </span>
                        </div>  
                        <div class="col-md-6 my-2">
                            <p class="mb-0">Interview</p>
                            <span class="fs-3 fw-semibold">
                                6-11 Juni 2023
                            </span>
                        </div>
                    </div>

                    <center>
                        <?php
                                    include 'api/session_check.php';
                                    $sql = "SELECT * FROM `pendaftar` WHERE nrp='".$_SESSION['nrp']."'";
                                    $query = mysqli_query($con, $sql);
                                    $data = mysqli_fetch_array($query);
                                    if ($data!=null){
                                        if ($data['ktm']==null && $data['chart']==null && $data['skkk']==null && $data['kecurangan']==null){
                                            // header("Location: kebutuhan_data.php");
                                            echo '<span class="text-white" style="font-size:18px;">Progress Pendaftaran : 1/3</span>';
                                            echo '<div class="progress">
                                                        <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>';
                                            $value="Lanjutkan Pendaftaran";
                                        }else{
                                            $sql = "SELECT * FROM `jadwal_openreg` WHERE nrp_pendaftar = '".$_SESSION['nrp']."' ";
                                            $query = mysqli_query($con,$sql);
                                            $data = mysqli_fetch_array($query);
                                            if($data==null){
                                                // header("Location: pilih_jadwal.php");
                                                echo '<span class="text-white" style="font-size:18px;">Progress Pendaftaran : 2/3</span>';
                                                echo '<div class="progress">
                                                        <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>';
                                                $value="Lanjutkan Pendaftaran";
                                            }else{
                                                // header("Location: konfirmasi.php");
                                                echo '<span class="text-white" style="font-size:18px;">Progress Pendaftaran : 3/3</span>';
                                                echo '<div class="progress">
                                                        <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>';
                                                $value="Lihat Info Interview";
                                            }
                                        }
                                    }else{
                                        $value="Mulai Pendaftaran";
                                        echo '<span class="text-white" style="font-size:18px;">Progress Pendaftaran : 0/3</span>';
                                        echo '<div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>';
                                        $value="Mulai Pendaftaran";
                                    }
                                    echo '<input name="submit" type="submit" class="btn btn-primary btn-send my-3 btn-block mx-auto" value="'.$value.'">';
                                ?>
                    </center>
                </form>
            </div>
            <!-- </div> -->
        </div>
        <!-- </section> -->


        <div class="container py-5 px-4 my-5">
            <center>
                <h2 class="text-white mb-5">Pilihan Divisi</h2>
            </center>
            <div class="col-lg-7 mx-auto">
                <center>
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="card" style="width: 18rem; height: 25rem">
                                    <div class="card-header">
                                        <i class="fa-sharp fa-solid fa-microphone fa-10x my-3"></i>
                                    </div>
                                    <div class="card-body">
                                        <h4>Acara</h4>
                                        <p class="card-text">Divisi yang bertugas untuk membuat konsep kegiatan serta
                                            mengatur jalannya kegiatan Open House</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card" style="width: 18rem; height: 25rem">
                                    <div class="card-header">
                                        <i class="fa-solid fa-camera fa-10x my-3"></i>
                                    </div>
                                    <div class="card-body">
                                        <h4>Creative</h4>
                                        <p class="card-text">Divisi yang bertugas untuk membuat desain untuk materi
                                            publikasi dan dekorasi, serta dokumentasi acara</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card" style="width: 18rem; height: 25rem">
                                    <div class="card-header">
                                        <i class="fa-solid fa-list-check fa-10x my-3"></i>
                                    </div>
                                    <div class="card-body">
                                        <h4>Sekretariat</h4>
                                        <p class="card-text">Divisi yang bertugas untuk mengolah data booth, data UKM, pendaftaran maba ke UKM,
                                            serta memegang OA Line Open House</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card" style="width: 18rem; height: 25rem">
                                    <div class="card-header">
                                        <i class="fa-solid fa-laptop-code fa-10x my-3"></i>
                                    </div>
                                    <div class="card-body">
                                        <h4>IT</h4>
                                        <p class="card-text">Divisi yang bertugas untuk mengolah website dan database
                                            pendaftar serta segala informasi yang perlu diberikan selama kegiatan Open
                                            House</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card" style="width: 18rem; height: 25rem">
                                    <div class="card-header">
                                        <i class="fa-solid fa-screwdriver-wrench fa-10x my-3"></i>
                                    </div>
                                    <div class="card-body">
                                        <h4>Perlengkapan</h4>
                                        <p class="card-text">Divisi yang bertugas untuk menyiapkan segala kebutuhan
                                            kegiatan serta menjadi operator multimedia selama
                                            kegiatan Open House</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </center>
            </div>
        </div>
    </div>