<?php
    include 'api/connect.php';
    include 'api/session_check.php';
    $sql = "SELECT * FROM `pendaftar` WHERE nrp='".$_SESSION['nrp']."'";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($query);
    // if ($data!=null){
    //     if ($data['ktm']==null && $data['chart']==null && $data['skkk']==null && $data['kecurangan']==null){
    //         header("Location: pengenalan.php?status=close");
    //     }else{
    //         $sql = "SELECT * FROM `jadwal_openreg` WHERE nrp_pendaftar = '".$_SESSION['nrp']."' ";
    //         $query = mysqli_query($con,$sql);
    //         $data = mysqli_fetch_array($query);
    //         if($data==null){
    //             // header("Location: pilih_jadwal.php");
    //             header("Location: pengenalan.php?status=close");

    //         }else{
    //             header("Location: konfirmasi.php");
    //         }
    //     }
    // }else{
    //     // header("Location: data_peserta.php");
    //     header("Location: pengenalan.php?status=close");

    // }
    header("Location: pengumuman.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kebutuhan data | OPENHOUSE 2023</title>
    <link rel="icon" type="image/x-icon" href="../asset/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <link href="pendaftaran.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
    <!-- <script src="../user/js/session_check.js"></script> -->
</head>

<body>
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
    
    <div class="container py-5 px-4">
        <div class="row ">
            <div class="col-lg-7 mx-auto">
                <div class="card mt-2 mx-auto p-4">
                    <div class="card-body">
                        <div class=" text-center my-3 ">
                            <h1>Kebutuhan Data</h1>
                        </div>
                        <div class="container">
                            <form action="api/submit_kebutuhan_data.php" method="post" id="contact-form" role="form" class="needs-validation" enctype="multipart/form-data" novalidate>
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group my-2">
                                                <label class="form-label mb-0" for="customFile"> KTM / Screenshot Biodata SIM</label>
                                                <br>
                                                <span style="font-size:12px;">Format file : JPG, JPEG, PNG</span>
                                                <input type="file" class="form-control" id="biodata" name="ktm" required accept=".jpg, .jpeg, .png">
                                                <div class="invalid-feedback">KTM / Screenshot Biodata SIM belum terisi!</div>
                                                <script>
                                                    var file = document.getElementById('biodata')
                                                    file.onchange = function(e) {
                                                    var ext = this.value.match(/\.([^\.]+)$/)[1];
                                                    switch (ext) {
                                                        case 'jpg':
                                                        case 'jpeg':
                                                        case 'png':
                                                        break;
                                                        default:
                                                        $(document).ready(function(){
                                                            swal("Data ditolak", "Anda memasukan data dengan format yang salah", "error");
                                                        })
                                                        this.value = '';
                                                    }
                                                    };
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group my-2">
                                                <label class="form-label mb-0" for="customFile"> Chart Transcript Petramobile</label>
                                                <br>
                                                <span style="font-size:12px;">Format file : JPG, JPEG, PNG</span>
                                                <input type="file" class="form-control" id="nilai" name="nilai" required accept=".jpg, .jpeg, .png">
                                                <div class="invalid-feedback">Chart Transcript belum terisi!</div>
                                                <script>
                                                    var file = document.getElementById('nilai')
                                                    file.onchange = function(e) {
                                                    var ext = this.value.match(/\.([^\.]+)$/)[1];
                                                    switch (ext) {
                                                        case 'jpg':
                                                        case 'jpeg':
                                                        case 'png':
                                                        break;
                                                        default:
                                                        $(document).ready(function(){
                                                            swal("Data ditolak", "Anda memasukan data dengan format yang salah", "error");
                                                        })
                                                        this.value = '';
                                                    }
                                                    };
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group my-2">
                                                <label class="form-label mb-0" for="customFile"> Transkrip SKKK</label>
                                                <br>
                                                <span style="font-size:12px;">Format file : JPG, JPEG, PNG</span>
                                                <input type="file" class="form-control" id="skkk" name="skkk" required accept=".jpg, .jpeg, .png">
                                                <div class="invalid-feedback">Transkrip SKKK belum terisi!</div>
                                                <script>
                                                    var file = document.getElementById('skkk')
                                                    file.onchange = function(e) {
                                                    var ext = this.value.match(/\.([^\.]+)$/)[1];
                                                    switch (ext) {
                                                        case 'jpg':
                                                        case 'jpeg':
                                                        case 'png':
                                                        break;
                                                        default:
                                                        $(document).ready(function(){
                                                            swal("Data ditolak", "Anda memasukan data dengan format yang salah", "error");
                                                        })
                                                        this.value = '';
                                                    }
                                                    };
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group my-2">
                                                <label class="form-label mb-0" for="customFile"> Bukti Kecurangan</label>
                                                <br>
                                                <span style="font-size:12px;">Format file : JPG, JPEG, PNG</span>
                                                <input type="file" class="form-control" id="kecurangan" name="kecurangan" required accept=".jpg, .jpeg, .png">
                                                <div class="invalid-feedback">Bukti Kecurangan belum terisi!</div>
                                                <script>
                                                    var file = document.getElementById('kecurangan')
                                                    file.onchange = function(e) {
                                                    var ext = this.value.match(/\.([^\.]+)$/)[1];
                                                    switch (ext) {
                                                        case 'jpg':
                                                        case 'jpeg':
                                                        case 'png':
                                                        break;
                                                        default:
                                                        $(document).ready(function(){
                                                            swal("Data ditolak", "Anda memasukan data dengan format yang salah", "error");
                                                        })
                                                        this.value = '';
                                                    }
                                                    };
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group my-2">
                                                <label class="form-label mb-0" for="customFile"> CV (Link Template CV : <a href="https://docs.google.com/document/d/1xM9O91bnjS9fXTgUg8P8AiTHfxeCZxtU6oZPpf6o__s/edit" target="_blank">Click disini</a>)</label>
                                                <br>
                                                <!-- <span style="font-size:12px;"><a href="Format CV.png" target="_blank">Click untuk mengetahui format CV</a></span> -->
                                                <!-- <br> -->
                                                <span style="font-size:12px;">Format file : PDF</span>
                                                <input type="file" class="form-control" id="cv" name="cv" required accept=".pdf">
                                                <div class="invalid-feedback">CV belum terisi!</div>
                                                <script>
                                                    var file = document.getElementById('cv')
                                                    file.onchange = function(e) {
                                                    var ext = this.value.match(/\.([^\.]+)$/)[1];
                                                    switch (ext) {
                                                        case 'pdf':
                                                        break;
                                                        default:
                                                        $(document).ready(function(){
                                                            swal("Data ditolak", "Anda memasukan data dengan format yang salah", "error");
                                                        })
                                                        this.value = '';
                                                    }
                                                    };
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group my-2">
                                                <label class="form-label mb-0" for="customFile"> Portofolio (khusus Creative)</label>
                                                <br>
                                                <!-- <span style="font-size:12px;">Link Drive</span> -->
                                                <textarea class="form-control" id="portofolio" name="portofolio"rows="1"
                                                    placeholder="Link Drive Portofolio"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-center text-danger my-4">NOTE : Data yang telah di submit tidak dapat di edit lagi, pastikan data anda sudah benar!</p>
                                    <center>
                                        <div class="col-md-12 mt-4">
                                            <button name="submit" id="submit" type="submit" class="btn btn-outline-primary btn-send  pt-2 btn-block" value="submit">Submit</button>
                                        </div>
                                    </center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="js/submit_kebutuhan_data.js"></script> -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
        })
    })()
    </script>
</body>

</html>
