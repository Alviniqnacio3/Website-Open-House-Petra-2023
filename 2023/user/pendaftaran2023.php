<!-- PAGE FORM PENDAFTARAN -->

<?php
include 'api/connect.php';
// include 'header.php';
$query = "SELECT * FROM maintenance_user";
$result = $con -> query($query);
if ($result -> num_rows > 0) {
    while ($row = $result ->  fetch_assoc()) {
        if ($row["status"] === "maintenance") {
            header("Location: maintenance.php");
        }
    }
}

if (!isset($_GET['ukm'])) {
  header("Location:  listUKM-LK.php");
}


$nrp = $_SESSION['nrp'];
$queryuser = "SELECT * FROM `pendaftar_maba` WHERE nrp LIKE '$nrp'";
$hsluser = mysqli_query($con, $queryuser);
$hsluser = mysqli_fetch_assoc($hsluser);

$ukm = $_GET['ukm'];

$sql = "SELECT * FROM `ukm` WHERE nama_ukm like '$ukm'";
$query = mysqli_query($con,$sql);
$quota = mysqli_fetch_array($query);

$quota = $quota['quota'];

// if($ukm!="Selam" && $ukm !="VG"){
    header("Location:  detail-ukm.php?ukm=$ukm&&status=99");
// }

// TUNGGU 1 AGUSTUS
// header("location:main.php");
// var_dump($_SESSION);
?>

<script>
localStorage.clear();
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran | Open House 2023</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- sweet alert/modal -->
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

    
    <!-- design  -->
    <link rel="stylesheet" href="css/pendaftaran23.css">
</head>

<body>
    <?php 
    include 'header.php';
    ?>
    <div class="container d-flex justify-content-center rounded-5 body-regist px-2 py-2 mb-5">
        <div class="col-10 col-md-8 text-white">
            <center>
                <h3 class="my-4" id="title">PENDAFTARAN</h3>
            </center>
            <form action="api/daftar.php" method="POST" enctype="multipart/form-data">
                <!-- nama MHS, NRP MHS -->
                <div class="row">
                    <div class="col-sm-6 my-2">
                        <div class="d-flex justify-content-center">
                            <label for="inputNama" class="form-label">Nama</label>
                        </div>
                        <?php
                        if (isset($_SESSION['nama'])) {
                        ?>
                        <input class="form-control" id="inputNama" name="inputNama"
                            value="<?php echo $_SESSION['nama']; ?>" readonly>
                        <?php
                        } else {
                          ?>
                        <input class="form-control" id="inputNama" name="inputNama"
                            placeholder="Masukan nama lengkap anda" required>
                        <?php
                        }
                        ?>

                        <!-- SIMPEN BUAT KETERANGAN FORM NANTI (KALAU BUTUH) -->
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>  -->
                    </div>
                    <div class="col-sm-6 my-2">
                        <div class="d-flex justify-content-center">
                            <label for="inputNRP" class="form-label">NRP</label>
                        </div>
                        <?php
                        if (isset($_SESSION['nrp'])) {
                          ?>
                        <input class="form-control" id="inputNRP" name="inputNRP"
                            value="<?php echo $_SESSION['nrp']; ?>" readonly>
                        <?php
                        } else {
                          ?>
                        <input class="form-control" id="inputNRP" name="inputNRP" placeholder="Masukan NRP anda"
                            onchange="validate(this.id)" required>
                        <?php
                        }
                        ?>
                    </div>
                    <input class="form-control" id="inputUKM" name="inputUKM" value="<?php echo $_GET['ukm']; ?>"
                        hidden>
                </div>
                <!-- Jurusan MHS -->
                <div class="row">
                    <div class="col-sm-6 my-2">
                        <div class="d-flex justify-content-center">
                            <label for="inputJurusan" class="form-label">Jurusan</label>
                        </div>
                        <div class="dropdown d-grid">
                            <?php
                            if (isset($_SESSION['prodi'])) {
                              ?>
                            <select class="form-control" id="inputJurusan" name="inputJurusan"
                                value="<?php echo $_SESSION['prodi']; ?>" readonly>
                                <option value="<?php echo $_SESSION['prodi']; ?>"><?php echo $_SESSION['prodi']; ?>
                                </option>
                            </select>

                            <?php
                            } else {
                              ?>
                            <select class="form-control" id="inputJurusan" name="inputJurusan" required>
                                <option value="" selected hidden>Pilih jurusan anda</option>
                                <option value="English for Business">English for Business</option>
                                <option value="English for Creative Industry">English for Creative Industry</option>
                                <option value="Bahasa Mandarin">Bahasa Mandarin</option>
                                <option value="Teknik Sipil">Teknik Sipil</option>
                                <option value="Arsitektur">Arsitektur</option>
                                <option value="Teknik Elektro">Teknik Elektro</option>
                                <option value="Internet of Things">Internet of Things </option>
                                <option value="Sustainable Mechanical Engineering & Design">Sustainable Mechanical
                                    Engineering & Design
                                </option>
                                <option value="Otomotif">Otomotif</option>
                                <option value="Teknik Industri">Teknik Industri</option>
                                <option value="International Business Engineering">International Business Engineering
                                </option>
                                <option value="Informatika">Informatika</option>
                                <option value="Sistem Informasi Bisnis">Sistem Informasi Bisnis</option>
                                <option value="Data Science and Analytics">Data Science and Analytics</option>
                                <option value="Business Accounting">Business Accounting</option>
                                <option value="Tax Accounting">Tax Accounting</option>
                                <option value="International Business Accounting">International Business Accounting
                                </option>
                                <option value="Hotel Management">Hotel Management</option>
                                <option value="Creative Tourism">Creative Tourism</option>
                                <option value="Marketing Management">Marketing Management</option>
                                <option value="Business Management">Business Management</option>
                                <option value="Finance and Investment">Finance and Investment</option>
                                <option value="International Business Management">International Business Management
                                </option>
                                <option value="Interior Design and Styling">Interior Design and Styling</option>
                                <option value="Interior Product Design">Interior Product Design</option>
                                <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                                <option value="Desain Fashion dan Tekstil">Desain Fashion dan Tekstil</option>
                                <option value="International Program in Digital Media">International Program in Digital
                                    Media</option>
                                <option value="Strategic Communication">Strategic Communication</option>
                                <option value="Broadcast and Journalism">Broadcast and Journalism</option>
                                <option value="Pendidikan Guru Sekolah Dasar">Pendidikan Guru Sekolah Dasar</option>
                                <option value="Pendidikan Guru Pendidikan Anak Usia Dini">Pendidikan Guru Pendidikan
                                    Anak Usia Dini
                                </option>
                            </select>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                    <div class="col-sm-6 my-2">
                        <div class="d-flex justify-content-center">
                            <label for="inputFakultas" class="form-label">Fakultas</label>
                        </div>
                        <div class="dropdown d-grid">
                            <select class="form-control" id="inputFakultas" name="inputFakultas" required>
                                <option value="" selected hidden>Pilih fakultas anda</option>
                                <option value="Fakultas Bahasa dan Sastra">Fakultas Bahasa dan Sastra</option>
                                <option value="Fakultas Teknik Sipil & Perencanaan (FTSP)">Fakultas Teknik Sipil &
                                    Perencanaan (FTSP)
                                </option>
                                <option value="Fakultas Teknologi Industri (FTI)">Fakultas Teknologi Industri (FTI)
                                </option>
                                <option value="Fakultas Bisnis dan Ekonomi">Fakultas Bisnis dan Ekonomi</option>
                                <option value="Fakultas Seni & Desain">Fakultas Seni & Desain</option>
                                <option value="Fakultas Ilmu Komunikasi (FIKOM)">Fakultas Ilmu Komunikasi (FIKOM)
                                </option>
                                <option value="Fakultas Keguruan dan Ilmu Pendidikan">Fakultas Keguruan dan Ilmu
                                    Pendidikan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Angkatan MHS -->
                    <div class="col-sm-6 my-2">
                        <div class="d-flex justify-content-center">
                            <label for="inputAngkatan" class="form-label">Angkatan</label>
                        </div>
                        <div class="dropdown d-grid">
                            <?php
                            if (isset($_SESSION['angkatan'])) {
                              ?>
                            <select class="form-control" id="inputAngkatan" name="inputAngkatan"
                                value="<?php echo $_SESSION['angkatan']; ?>" readonly>
                                <option value="<?php echo $_SESSION['angkatan']; ?>">
                                    <?php echo $_SESSION['angkatan']; ?></option>
                            </select>

                            <?php
                            } else {
                              ?>
                            <select class="form-control" id="inputAngkatan" name="inputAngkatan" required>
                                <option value="" selected hidden>Pilih angkatan anda</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                            </select>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                    <div class="col-sm-6 my-2">

                        <div class="d-flex justify-content-center">
                            <label for="inputNoTelp" class="form-label">No Telepon/Id Line</label>
                        </div>
                        <input class="form-control" id="inputNoTelp" name="inputNoTelp"
                            placeholder="Masukan No.Telp/ID Line anda" required>

                    </div>
                </div>

                <div class="my-2" id="list_pertanyaan_ukm">
                    <div>
                        <?php
                        $id_pertanyaan = array();
                        if (isset($_GET['ukm'])) { // cek apakah "ukm" telah di set ato blm
                          // Variabel
                          $ukm = $_GET['ukm'];
                          $query = "SELECT * FROM pertanyaan where ukm='$ukm'";
                          $result = mysqli_query($con, $query);
                          // Untuk mengetahui skrg pertanyaan ke berapa
                          $quest_count = 1;

                          // Selama masih ada row di dalam result query database maka akan di loop sampai tidak ada lagi
                          while ($row = mysqli_fetch_assoc($result)) {
                            $question = $row['pertanyaan'];
                            $idquestion = $row['id'];
                            $questiontype = $row['jenis']; // kalo bisa nanti jenis di databasenya cuma bisa input (text, image)
                            // text, image, pdf/file
                            if ($questiontype == 'text') { ?>
                        <div class="my-2">
                            <div class="d-flex justify-content-center">
                                <label for="<?php echo $idquestion ?>"
                                    class="form-label"><?php echo $question ?></label>
                            </div>
                            <!-- INI UNTUK INPUT JAWABAN (TEXT) -->
                            <textarea type="text" class="form-control" id="<?php echo $idquestion ?>"
                                name="pertanyaan_UKM<?php echo $quest_count ?>" rows="2" required></textarea>
                            <!-- INI ID PERTANYAAN, GAK USAH DIUBAH -->
                            <input type="text" class="form-control" id="<?php echo $idquestion ?>"
                                name="idPertanyaan_UKM<?php echo $quest_count ?>" value="<?php echo $idquestion ?>"
                                hidden>
                            <!-- INI JENIS PERTANYAAN, GAK USAH DIUBAH -->
                            <input type="text" class="form-control" id="<?php echo $idquestion ?>"
                                name="jenisPertanyaan_UKM<?php echo $quest_count ?>" value="text" hidden>
                            <?php array_push($id_pertanyaan, $idquestion) ?>
                        </div>
                        <?php
                          $quest_count++;
                          $_POST['total_pertanyaan'] = $quest_count;
                          ?>
                        <?php } elseif ($questiontype == 'image') { ?>
                        <div class="my-3">
                            <div class="d-flex justify-content-center">
                                <label for="<?php echo $idquestion ?>"
                                    class="form-label"><?php echo $question ?></label>
                            </div>
                            <div class="d-flex req-item justify-content-center">
                                <label for="">required {*.jpg, *.jpeg, *.png}</label>
                            </div>
                            <!-- INI UNTUK INPUT FILE (IMAGE) -->
                            <input type="file" class="form-control" id="<?php echo $idquestion ?>"
                                name="pertanyaan_UKM<?php echo $quest_count ?>" accept=".jpg, .jpeg, .png" required>
                            <!-- UNTUK WARNING TEXT (TAMPIL SAAT USER SALAH UPLOAD FILE) -->
                            <div class="d-flex warning-text justify-content-center">
                                <label for="warning-text" hidden>Format file tidak sesuai. Mohon mengupload
                                    ulang</label>
                            </div>
                            <script>
                                var file = document.getElementById('<?php echo $idquestion ?>')
                                file.onchange = function (e) {
                                    var ext = this.value.match(/\.([^\.]+)$/)[1];
                                    switch (ext) {
                                        case 'jpg':
                                        case 'jpeg':
                                        case 'png':
                                            break;
                                        default:
                                            $(document).ready(function () {
                                                swal("Data ditolak",
                                                    "Anda memasukan data dengan format yang salah",
                                                    "error");
                                            })
                                            this.value = '';
                                    }
                                };
                            </script>
                            <!-- INI ID PERTANYAAN, GAK USAH DIUBAH!  -->
                            <input type="text" class="form-control" id="<?php echo $idquestion ?>"
                                name="idPertanyaan_UKM<?php echo $quest_count ?>" value="<?php echo $idquestion ?>"
                                hidden>
                            <!-- INI JENIS PERTANYAAN, GAK USAH DIUBAHa -->
                            <input type="text" class="form-control" id="<?php echo $idquestion ?>"
                                name="jenisPertanyaan_UKM<?php echo $quest_count ?>" value="image" hidden>
                            <?php array_push($id_pertanyaan, $idquestion) ?>
                        </div>
                        <?php
                        $quest_count++;
                        $_POST['total_pertanyaan'] = $quest_count;
                        ?>

                        <?php } else { ?>
                        <div class="mb-3">
                            <div class="d-flex justify-content-center">
                                <label for="<?php echo $idquestion ?>"
                                    class="form-label"><?php echo $question ?></label>
                            </div>
                            <div class="d-flex justify-content-center">
                                <label for="">required {*.pdf}</label>
                            </div>
                            <!-- INI UNTUK INPUT FILE (PDF) -->
                            <input type="file" class="form-control" id="<?php echo $idquestion ?>"
                                name="pertanyaan_UKM<?php echo $quest_count ?>" accept=".pdf" required>
                            <div class="d-flex warning-text justify-content-center">
                                <!-- UNTUK WARNING TEXT (TAMPIL SAAT USER SALAH UPLOAD FILE) -->
                                <label for="warning-text" hidden>Format file tidak sesuai. Mohon mengupload
                                    ulang</label>
                            </div>

                            <script>
                                var file = document.getElementById('<?php echo $idquestion ?>')
                                file.onchange = function (e) {
                                    var ext = this.value.match(/\.([^\.]+)$/)[1];
                                    switch (ext) {
                                        case 'pdf':
                                            break;
                                        default:
                                            $(document).ready(function () {
                                                swal("Data ditolak",
                                                    "Anda memasukan data dengan format yang salah",
                                                    "error");
                                            })
                                            this.value = '';
                                    }
                                };
                            </script>
                            <!-- INI ID PERTANYAAN, GAK USAH DIUBAH! -->
                            <input type="text" class="form-control" id="<?php echo $idquestion ?>"
                                name="idPertanyaan_UKM<?php echo $quest_count ?>" value="<?php echo $idquestion ?>"
                                hidden>
                            <!--  INI JENIS PERTANYAAN, GAK USAH DIUBAH! -->
                            <input type="text" class="form-control" id="<?php echo $idquestion ?>"
                                name="jenisPertanyaan_UKM<?php echo $quest_count ?>" value="else" hidden>
                            <?php array_push($id_pertanyaan, $idquestion) ?>
                        </div>
                        <?php
                        $quest_count++;
                        $_POST['total_pertanyaan'] = $quest_count;
                        ?>

                        <?php }
                          }
                        }
                        ?>
                        <!-- INI UNTUK TOTAL JENIS PERTANYAAN (UNTUK LOOPING MASUKIN DATABASE, GAK USAH DIUBAH! -->
                        <input type="text" class="form-control" id="total pertanyaan" name="total pertanyaan"
                            value="<?php echo $quest_count - 1 ?>" hidden>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <!-- INI UNTUK SUBMIT SEMUA, GAK USAH DIUBAH! -->
                    <button type="submit" class="btn btn-primary submit-button px-5" id="submitbutton"
                        name="submitbutton">Submit</button>
                </div>
            </form>
        </div>
    </div>


    <script>
    // script untuk mencari semua element yang memiliki class ".dropdown-item.no-<angka>"
    // lalu untuk setiap element tersebut diberi Listener jika di klik
    // maka akan mengubah text Dropdown field yang ada di atasnya menjadi pilihan user
    document.querySelectorAll('.dropdown-item.no-1').forEach(function(item) {
        item.addEventListener('click', function() {
            var dropdownToggle = document.getElementById("inputJurusan");
            dropdownToggle.textContent = this.textContent;
            dropdownToggle.classList.remove('dropdown-toggle');
        });
    });
    document.querySelectorAll('.dropdown-item.no-2').forEach(function(item) {
        item.addEventListener('click', function() {
            var dropdownToggle = document.getElementById("inputAngkatan");
            dropdownToggle.textContent = this.textContent;
            dropdownToggle.classList.remove('dropdown-toggle');
        });
    });
    document.querySelectorAll('.dropdown-item.no-3').forEach(function(item) {
        item.addEventListener('click', function() {
            var dropdownToggle = document.getElementById("inputFakultas");
            dropdownToggle.textContent = this.textContent;
            dropdownToggle.classList.remove('dropdown-toggle');
        });
    });

    // script untuk cek panjang NRP
    function validate(id) {
        var value = document.getElementById(id).value;
        if (value.length != 9) {
            $('#submitbutton').prop("disabled", true);
            console.log("masuk")
        } else {
            $('#submitbutton').prop("disabled", false);
            console.log("masuk")
        }
    }

    // sebagai variabel tinggi navbar
    var navbar = document.querySelector(".header");

    var navbarHeight = navbar.offsetHeight;

    document.documentElement.style.setProperty('--navbar-height', navbarHeight + 'px');

    //sticky navbar jika di scroll
    window.addEventListener("scroll", function() {
        var header = document.querySelector("header");
        var menuItem = document.querySelectorAll(".menu-item");
        header.classList.toggle("sticky", window.scrollY > 0);
    })

    //navbar
    const menuBtn = document.querySelector(".menu-btn");
    const menuItems = document.querySelector(".menu-items");
    const menuItem = document.querySelectorAll(".menu-item");

    // main toggle
    menuBtn.addEventListener("click", () => {
        toggle();
    });

    // toggle on item click if open
    menuItem.forEach((item) => {
        item.addEventListener("click", () => {
            if (menuBtn.classList.contains("open")) {
                toggle();
            }
        });
    });

    function toggle() {
        menuBtn.classList.toggle("open");
        menuItems.classList.toggle("open");
    }
    </script>

    
</body>


</html>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<?php

if (isset($_GET['status'])) {
  $msg = $_GET['status'];
  if ($msg == 1) {
    echo '<script>swal("Error","Nama belum terisi","error");</script>';
  } else if ($msg == 2) {
    echo '<script>swal("Error","NRP belum terisi","error");</script>';
  } else if ($msg == 3) {
    echo '<script>swal("Error","Jurusan belum terisi","error");</script>';
  } else if ($msg == 4) {
    echo '<script>swal("Error","Fakultas belum terisi","error");</script>';
  } else if ($msg == 5) {
    echo '<script>swal("Error","Angkatan belum terisi","error");</script>';
  } else if ($msg == 6) {
    echo '<script>swal("Error","No Telepon/Id Line belum terisi","error");</script>';
  } else if ($msg == 7) {
    echo '<script>swal("Error","Harap upload file sesuai jenis","error");</script>';
  }else if ($msg == 8) {
    echo '<script>swal("Error","Error server, gagal untuk melakukan pendaftaran. Silahkan daftar ulang.","error");</script>';
  }else if ($msg == 9) {
    echo '<script>swal({
        title: "Error",
        text: "Anda telah mendaftar pada UKM ini.",
        type: "error",
        timer: 5000,
      }, function(){
            window.location.href = "listUKM-LK.php";
      });</script>';
  }else if($msg==10){
    echo '<script>swal({
        title: "Error",
        text: "Kuota dari UKM ini telah habis.",
        type: "error",
        timer: 5000,
      }, function(){
            window.location.href = "listUKM-LK.php";
      });</script>';
  }
}

    $sql = "SELECT * FROM `ukm` WHERE nama_ukm='$ukm'";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($query);
    $quota = $row['quota'];

    $soldout = false;
    if ($row['audisi'] == 'ya') {
        $tipe = 'audisi';
        $sql = "SELECT count(*) as total FROM `pendaftar_maba` WHERE terima = 'terima' and ukm like '" . $ukm . "' and cancel is null";
    } else {
        $sql = "SELECT count(*) as total FROM `pendaftar_maba` WHERE ukm like '" . $ukm . "' and cancel is null";
        $tipe = 'normal';
        if ($row['kuota_early_bird'] == 0) {
            $tipePendaftaran = 'reguler';
        } else {
            $tipePendaftaran = 'early bird';
        }
    }
    $query = mysqli_query($con, $sql);
    $countQuota = mysqli_fetch_array($query);
    $countQuota = $countQuota['total'];

    if ($countQuota >= $quota) {
        echo '<script>swal({
            title: "Error",
            text: "Kuota dari UKM ini telah habis.",
            type: "error",
            timer: 5000,
        }, function(){
                window.location.href = "listUKM-LK.php";
        });</script>';
    }
?>