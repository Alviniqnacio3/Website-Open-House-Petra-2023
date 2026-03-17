<?php
    include 'api/connect.php';
    include 'api/session_check.php';
    $sql = "SELECT * FROM `pendaftar` WHERE nrp='".$_SESSION['nrp']."'";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($query);
    // if ($data!=null){
    //     if ($data['ktm']==null && $data['chart']==null && $data['skkk']==null && $data['kecurangan']==null){
    //         // header("Location: kebutuhan_data.php");
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
    // header("Location: pengumuman.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peserta | OPENHOUSE 2023</title>
    <link rel="icon" type="image/x-icon" href="../asset/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <link href="pendaftaran.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
    <!-- <script src="js/session_check.js"></script> -->

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

    <div class="container py-5 px-4 fix">
        <div class="row ">
            <div class="col-lg-7 mx-auto">
                <div class="card mt-2 mx-auto p-4">
                    <div class="card-body">
                        <div class=" text-center my-3 ">
                            <h1>Data Peserta</h1>
                        </div>
                        <div class="container">
                            <form action="api/submit_data_peserta.php" method="post" id="contact-form"
                                role="form" class="needs-validation" novalidate>
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group my-2">
                                                <label for="nama">Nama Lengkap</label>
                                                <input id="nama" type="text" name="nama" class="form-control"
                                                    placeholder="Nama Lengkap" required>
                                                <div class="invalid-feedback">Nama lengkap belum terisi!</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group my-2">
                                                <label for="nrp">NRP</label>
                                                <input id="nrp" type="text" name="nrp" class="form-control"
                                                    placeholder="NRP" disabled required="required"
                                                    value="<?php echo $nrp; ?>">
                                                <div class="invalid-feedback">Nrp belum terisi!</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group my-2">
                                                <label for="jurusan">Jurusan</label>
                                                <select id="jurusan" name="jurusan" class="form-select"
                                                    required="required">
                                                    <option value="" selected hidden>Pilih Jurusan</option>
                                                    <option value="English for Business">English for Business</option>
                                                    <option value="English for Creative Industry">English for Creative
                                                        Industry</option>
                                                    <option value="Bahasa Mandarin">Bahasa Mandarin</option>
                                                    <option value="Teknik Sipil">Teknik Sipil</option>
                                                    <option value="Arsitektur">Arsitektur</option>
                                                    <option value="Teknik Elektro">Teknik Elektro</option>
                                                    <option value="Internet of Things">Internet of Things </option>
                                                    <option value="Sustainable Mechanical Engineering & Design">
                                                        Sustainable Mechanical Engineering & Design</option>
                                                    <option value="Otomotif">Otomotif</option>
                                                    <option value="Teknik Industri">Teknik Industri</option>
                                                    <option value="International Business Engineering">International
                                                        Business Engineering</option>
                                                    <option value="Informatika">Informatika</option>
                                                    <option value="Sistem Informasi Bisnis">Sistem Informasi Bisnis
                                                    </option>
                                                    <option value="Data Science and Analytics">Data Science and
                                                        Analytics</option>
                                                    <option value="Business Accounting">Business Accounting</option>
                                                    <option value="Tax Accounting">Tax Accounting</option>
                                                    <option value="International Business Accounting">International
                                                        Business Accounting</option>
                                                    <option value="Hotel Management">Hotel Management</option>
                                                    <option value="Creative Tourism">Creative Tourism</option>
                                                    <option value="Marketing Management">Marketing Management</option>
                                                    <option value="Business Management">Business Management</option>
                                                    <option value="Finance and Investment">Finance and Investment
                                                    </option>
                                                    <option value="International Business Management">International
                                                        Business Management</option>
                                                    <option value="Interior Design and Styling">Interior Design and
                                                        Styling</option>
                                                    <option value="Interior Product Design">Interior Product Design
                                                    </option>
                                                    <option value="Desain Komunikasi Visual">Desain Komunikasi Visual
                                                    </option>
                                                    <option value="Desain Fashion dan Tekstil">Desain Fashion dan
                                                        Tekstil</option>
                                                    <option value="International Program in Digital Media">International
                                                        Program in Digital Media</option>
                                                    <option value="Strategic Communication">Strategic Communication
                                                    </option>
                                                    <option value="Broadcast and Journalism">Broadcast and Journalism
                                                    </option>
                                                    <option value="Pendidikan Guru Sekolah Dasar">Pendidikan Guru
                                                        Sekolah Dasar</option>
                                                    <option value="Pendidikan Guru Pendidikan Anak Usia Dini">Pendidikan
                                                        Guru Pendidikan Anak Usia Dini</option>
                                                </select>
                                                <div class="invalid-feedback">Jurusan belum dipilih!</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group my-2">
                                                <label for="angkatan">Angkatan</label>
                                                <select id="angkatan" name="angkatan" class="form-select"
                                                    required="required">
                                                    <option value="" selected hidden>Pilih Angkatan</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                </select>
                                                <div class="invalid-feedback">Angkatan belum dipilih!</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group my-2">
                                                <label for="form_email">Email</label>
                                                <input id="form_email" type="email" name="email" class="form-control"
                                                    placeholder="Email" required="required">
                                                <div class="invalid-feedback">Tolong memasukan email yang valid!</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group my-2">
                                                <label for="id_line">ID Line</label>
                                                <input id="id_line" type="text" name="id_line" class="form-control"
                                                    placeholder="ID Line" required="required">
                                                <div class="invalid-feedback">Id line belum terisi!</div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group my-2">
                                                <label for="no_telp">No Telp/WA</label>
                                                <input id="no_telp" type="text" name="no_telp" class="form-control"
                                                    placeholder="No Telp/WA" required="required" pattern="08[0-9]{7,}">
                                                <div class="invalid-feedback">Pastikan nomor telepon berformat 08xxx!
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group my-2">
                                                <label for="asal">IPK</label>
                                                <input id="ipk" type="text" name="ipk" class="form-control"
                                                    placeholder="IPK" required="required">
                                                <div class="invalid-feedback">IPK belum terisi!</div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group my-2">
                                                <label for="domisili">Domisili Sekarang</label>
                                                <input id="domisili" type="text" name="domisili" class="form-control"
                                                    placeholder="Domisili Sekarang" required="required">
                                                <span style="font-size:12px;">Ex :jl. Siwalankerto</span>
                                                <div class="invalid-feedback">Domisili sekarang belum terisi!</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group my-2">
                                                <label for="div1">Divisi Pilihan 1</label>
                                                <select id="div1" name="div1" class="form-select" required="required">
                                                    <option value="" selected hidden>Pilih Divisi</option>
                                                    <option value="Acara">Acara</option>
                                                    <option value="Creative">Creative</option>
                                                    <option value="Sekonkes">Sekretariat</option>
                                                    <option value="IT">IT</option>
                                                    <option value="Perkapman">Perlengkapan</option>
                                                </select>
                                                <div class="invalid-feedback">Divisi belum dipilih!</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group my-2">
                                                <label for="div2">Divisi Pilihan 2</label>
                                                <select id="div2" name="div2" class="form-select">
                                                    <option value="" selected hidden>Pilih Divisi</option>
                                                    <option value="Acara">Acara</option>
                                                    <option value="Creative">Creative</option>
                                                    <option value="Sekonkes">Sekretariat</option>
                                                    <option value="IT">IT</option>
                                                    <option value="Perkapman">Perlengkapan</option>
                                                </select>
                                                <!-- <div class="invalid-feedback">Divisi belum dipilih!</div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-center text-danger my-4">NOTE : Data yang telah di submit tidak dapat
                                        di edit lagi, pastikan data anda sudah benar!</p>
                                    <center>
                                        <div class="col-md-12 mt-4">
                                            <input name="submit" type="submit"
                                                class="btn btn-outline-primary btn-send  pt-2 btn-block" value="Submit">
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

</body>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})()
</script>

</html>