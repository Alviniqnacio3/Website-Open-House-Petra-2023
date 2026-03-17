<?php
// include "loader.php"; 
include 'api/connect.php';
include 'header.php';
$query = "SELECT * FROM maintenance_user";
$result = $con->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row["status"] === "maintenance") {
            header("Location: maintenance.php");
        }
    }
}

// TUNGGU 1 AGUSTUS BARU DIBUKA
// header("location:main.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News | Open House 2023</title>
    <link rel="icon" type="image/x-icon" href="../asset/favicon.png">
    <!-- <link rel="stylesheet" href="main.css"> -->
    <!-- AJAX -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js"
        integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/newsUKM.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/gsap@3.12/dist/gsap.min.js"></script> -->
</head>

<body>
    <?php
    include 'header.php';
    ?>

    <?php
    // var_dump($nrp);
    $nrp = $_SESSION['nrp'];
    $query = "SELECT * FROM `pendaftar_maba` WHERE `nrp` LIKE '$nrp'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);


    // BELUM DAFTAR
    if (mysqli_num_rows($result) == 0 || $row['UKM'] == '' || $row['UKM'] == null) {
        ?>
        <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
            <h1 id="title" class="text-center" style="font-size: 50px; color:#FBE99C;">
                Anda Belum Daftar UKM
            </h1>
        </div>
        <?php
    } else {
        $ukm = $row['UKM'];

        $query = "SELECT * FROM `pendaftar_maba` WHERE `nrp` LIKE '$nrp' and terima ='terima'";
        $result = mysqli_query($con, $query);
        $allUkm = false;
        while ($rowAllUKM = mysqli_fetch_assoc($result)) {
            if (!($rowAllUKM['pembayaran'] == '' || $rowAllUKM['pembayaran'] == null)) {
                $allUkm = true;
            }
        }
        // belum diterima
        if ($allUkm == false) {
            if ($row['terima'] == null || $row['terima'] == '') {
                ?>
                <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
                    <h1 id="title" class="text-center" style="font-size: 50px; color:#FBE99C;">
                        Silakan Menunggu Konfirmasi Dari Pihak UKM
                    </h1>
                </div>
                <?php
            } else {
                // sudah diterima
                // belum bayar
                if ($row['pembayaran'] == null || $row['pembayaran'] == '') {
                    // BELUM BAYAR
                    ?>
                    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
                        <h1 id="title" class="text-center" style="font-size: 50px; color:#FBE99C;">
                            Anda Belum Upload Bukti Pembayaran Biaya Pendaftaran UKM
                        </h1>
                    </div>
                    <?php
                    // sudah bayar
                } else {
                    ?>

                    <div class="container pt-5 mt-5">
                        <div class="row">
                            <div class="col-lg-10 mx-auto">
                                <div class="card my-3 mx-auto p-2" style="background-color:#FBE99C">
                                    <div class="card-body">
                                        <div class=" text-start">
                                            <div class="row align-items-center">
                                                <!-- <img src="../asset/renang.png" class="card-img-top" style="width:90px" alt="..."> -->
                                                <h1 class="col-12 mt-0 mb-0" style="color:#4b847d; font-weight:700;">NEWS UKM</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
        } else {
            ?>
        <?php
        $nrp = $_SESSION['nrp'];
        $query = "SELECT * FROM `pendaftar_maba` WHERE `nrp` LIKE '$nrp'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);

        // Check if all UKMs have already been accepted and paid
        $allUKMsAcceptedAndPaid = true;
        $query = "SELECT * FROM `pendaftar_maba` WHERE `nrp` LIKE '$nrp' and terima ='terima'";
        $result = mysqli_query($con, $query);
        while ($rowAllUKM = mysqli_fetch_assoc($result)) {
            if (empty($rowAllUKM['pembayaran'])) {
                $allUKMsAcceptedAndPaid = false;
                break;
            }
        }

        if (!$allUKMsAcceptedAndPaid) {
            echo '<div class="container pt-5 mt-5">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="card my-3 mx-auto p-2" style="background-color:#FBE99C">
                        <div class="card-body">
                            <div class="text-start">
                                <div class="row align-items-center">
                                    <!-- <img src="../asset/renang.png" class="card-img-top" style="width:90px" alt="..."> -->
                                    <h1 class="col-10 mt-0 mb-0" style="color:#4b847d; font-weight:700;">Pembayaran & Penerimaan UKM</h1>
                                    <button class="btn col-1 btn-primary" id="myButton">Check</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="card my-3 mx-auto p-2" style="background-color:#FBE99C">
                        <div class="card-body">
                            <div class=" text-start">
                                <div class="row align-items-center">
                                    <!-- <img src="../asset/renang.png" class="card-img-top" style="width:90px" alt="..."> -->
                                    <h1 class="col-9 mt-0 mb-0" style="color:#4b847d; font-weight:700;">NEWS UKM</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
        } else {
            echo '
            <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="card my-3 mx-auto p-2" style="background-color:#FBE99C">
                        <div class="card-body">
                            <div class=" text-start">
                                <div class="row align-items-center">
                                    <!-- <img src="../asset/renang.png" class="card-img-top" style="width:90px" alt="..."> -->
                                    <h1 class="col-9 mt-0 mb-0" style="color:#4b847d; font-weight:700;">NEWS UKM</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
        }
        ?>



        <?php
        }


    }
    ;
    ?>

    <div class="container col-lg-8 mx-auto" id="detailnewsUKM" name="detailnewsUKM" hidden>
        <div class="accordion" id="accordion_news">
            <?php
            $sql = "SELECT * FROM `pendaftar_maba` WHERE `nrp` LIKE '$nrp' and terima ='terima' and pembayaran!=''";
            $queryPendaftar = mysqli_query($con, $sql);
            while ($rowPendaftar = mysqli_fetch_array($queryPendaftar)) {
                $query = "SELECT * FROM news WHERE ukm_lk LIKE '" . $rowPendaftar['UKM'] . "' and status = 'terima'";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $judul = $row['judul'];
                    $isi = $row['isi'];
                    $tanggal = $row['tanggal'];
                    $ukm = $rowPendaftar['UKM'];
                    ?>

                    <div class="accordion-item mb-2">
                        <?php
                        $tanggalskrg = date("Y-m-d");
                        if (strtotime($tanggalskrg) >= strtotime($tanggal)) {
                            ?>
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#id_news<?php echo $id; ?>" aria-expanded="false"
                                    aria-controls="id_news<?php echo $id; ?>">

                                    <div class="row">
                                        <div class="col-3 d-flex align-items-center justify-content-center">
                                            <!-- ini buat logo ukm -->
                                            <img src="../asset/astro.png" class="card-img-top img-fluid" style="max-width: 90px;"
                                                alt="...">
                                        </div>
                                        <div class="col-9">
                                            <div class="d-flex flex-column justify-content-center">
                                                <div class='card-header border-0'>
                                                    <!-- judul -->
                                                    <h2 class='my-2'>
                                                        <?php echo $judul; ?>
                                                    </h2>
                                                    <!-- tanggal -->
                                                    <h5 class='my-2'>
                                                        <?php echo 'UKM '; ?>
                                                        <?php echo $ukm; ?>
                                                        <?php echo '/'; ?>
                                                        <?php echo $tanggal; ?>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </button>
                            </h2>
                            <div id="id_news<?php echo $id; ?>" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <?php echo $isi; ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
            }
            ;
            ?>
        </div>
    </div>

    <!-- ////////////////////////////// BUAT ALERT+PAGE PAS BELOM DAFTAR ATAU BAYAR ///////////////////////////////////////// -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php

    $nrp = $_SESSION['nrp'];
    $query = "SELECT * FROM `pendaftar_maba` WHERE `nrp` LIKE '$nrp'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 0 || $row['UKM'] == '' || $row['UKM'] == null) {
        // alert belom daftar
        echo "<script>
              swal({
                title: 'Anda Belum Daftar UKM',
                text: 'Silahkan daftar terlebih dahulu',
                icon: 'error'
              });
              setTimeout(function(){
               window.location.href = 'listUKM-LK.php?';
              }, 2500);
            </script>";
    } else {
        $namaukm = strtoupper($row['UKM']);
        $query = "SELECT * FROM `pendaftar_maba` WHERE `nrp` LIKE '$nrp' and terima ='terima'";
        $result = mysqli_query($con, $query);
        $allUkm = '';
        $adaYangBelumDibayar = false;
        while ($rowAllUKM = mysqli_fetch_assoc($result)) {
            if ($rowAllUKM['pembayaran'] == '' || $rowAllUKM['pembayaran'] == null) {
                $allUkm .= '<option value="' . $rowAllUKM['UKM'] . '">' . $rowAllUKM['UKM'] . '</option>';
                $adaYangBelumDibayar = true;
            } else {
                $allUkm .= '<option value="' . $rowAllUKM['UKM'] . '" disabled>' . $rowAllUKM['UKM'] . '</option>';
                echo " <script>
                    $('#newsUKM').prop('hidden', false);
                    $('#detailnewsUKM').prop('hidden', false);
                </script>";
            }
        }
        if ($row['terima'] == null && $row['terima'] == '') {
            // BELUM DITERIMA
            // alert tunggu konfirmasi
            echo "<script>
                    swal({
                    title: 'Menunggu Konfirmasi Pihak UKM',
                    text: 'Silahkan menunggu konfirmasi dari UKM',
                    icon: 'error'
                    });
                //   setTimeout(function(){
                //    window.location.href = 'listUKM-LK.php';
                //   }, 2500);
                </script>";

            echo " <script>
                    $('#newsUKM').prop('hidden', false);
                    $('#detailnewsUKM').prop('hidden', false);
                </script>";
        } else if ($row['terima'] != null || $row['terima'] == 'terima') {
            // SUDAH DITERIMA
    
            // belum bayar
            if ($row['pembayaran'] == null || $row['pembayaran'] == '' || $adaYangBelumDibayar) {
                // form pembayaran ama pemberitahuan kalo udh masok, jadi 1 aja
    
                echo '<script>
                Swal.fire({
                    title: "Anda Telah Diterima di UKM yang anda daftar",
                    html: `<h5 class="text-center">Silakan Upload Bukti Pembayaran Biaya Pendaftaran UKM</h5>
                                            <form action="api/pembayaran.php" method="POST" enctype="multipart/form-data" id="pembayaran">
                                            <br>
                                            <h6 class="text-start">- UKM:</h6>
                                                <select class="form-control" id="inputUkm" name="inputUkm" required>
                                                    <option value="" selected hidden>Pilih UKM</option>
                                                    ' . $allUkm . '  
                                                </select><br>
                                                <h6 class="text-start">- Foto Bukti Pembayaran:</h6>
                                                <input type="file" class="form-control" id="image" name="image" required accept=".jpg, .jpeg, .png">                            
                                            </form>`,
                    confirmButtonText: "Submit",
                    icon: "success",
                    showCloseButton: true,
                    // showCancelButton: true,
                    confirmButtonText: "Upload",
                    // cancelButtonText: "Nanti Saja",
                    confirmButtonColor: "green",
                    cancelButtonColor: "#d33",
                    focusConfirm: false,
                    preConfirm: () => {
                        const image = Swal.getPopup().querySelector("#image").value;
                        const ukm = Swal.getPopup().querySelector("#inputUkm").value;
                        if (image == "" || image == null) {
                            Swal.showValidationMessage(`Silahkan upload bukti pembayaran terlebih dahulu`)
                        } else if (ukm == "" || ukm == null || ukm == "Pilih UKM") {
                            Swal.showValidationMessage(`Silahkan pilih UKM terlebih dahulu`)
                        } else {
                            console.log("masuk else");
                            console.log(image);
                            document.getElementById("pembayaran").submit();
                            return { image: image }
                        }
                    }
                });
            
                        </script>';

                // KALO BERHASIL UPLOAD BUKTI, DIA SWAL INI  ===============================================================
                //     echo "<script>
                // swal({
                //     title: 'Terima Kasih',
                //     text: 'Dimohon untuk menunggu konfirmasi dari pihak UKM.',
                //     icon: 'success'
                // });
                // </script>";
    
            } else {
                // sudah bayar
    
                echo " <script>
                        $('#newsUKM').prop('hidden', false);
                        $('#detailnewsUKM').prop('hidden', false);
                    </script>";
            }
            ;


        }


    }
    ;
    ?>

    <?php
    $namaukm = strtoupper($row['UKM']);
    $query = "SELECT * FROM `pendaftar_maba` WHERE `nrp` LIKE '$nrp' and terima ='terima'";
    $result = mysqli_query($con, $query);
    $allUkm = '';
    $adaYangBelumDibayar = false;
    while ($rowAllUKM = mysqli_fetch_assoc($result)) {
        if ($rowAllUKM['pembayaran'] == '' || $rowAllUKM['pembayaran'] == null) {
            $allUkm .= '<option value="' . $rowAllUKM['UKM'] . '">' . $rowAllUKM['UKM'] . '</option>';
            $adaYangBelumDibayar = true;
        } else {
            $allUkm .= '<option value="' . $rowAllUKM['UKM'] . '" disabled>' . $rowAllUKM['UKM'] . '</option>';
            echo " <script>
                $('#newsUKM').prop('hidden', false);
                $('#detailnewsUKM').prop('hidden', false);
              </script>";
        }
    }
    ?>
    <script>
        document.getElementById('myButton').onclick = function () {
            Swal.fire({
                title: "Anda Telah Diterima di UKM yang anda daftar",
                html: `<h5 class="text-center">Silakan Upload Bukti Pembayaran Biaya Pendaftaran UKM</h5>
            <form action="api/pembayaran.php" method="POST" enctype="multipart/form-data" id="pembayaran">
            <br>
            <h6 class="text-start">- UKM:</h6>
            <select class="form-control" id="inputUkm" name="inputUkm" required>
                <option value="" selected hidden>Pilih UKM</option>
                <?php echo $allUkm; ?>  
            </select><br>
            <h6 class="text-start">- Foto Bukti Pembayaran:</h6>
            <input type="file" class="form-control" id="image" name="image" required accept=".jpg, .jpeg, .png">
            </form>`,
                confirmButtonText: "Upload",
                icon: "success",
                showCloseButton: true,
                confirmButtonColor: "green",
                cancelButtonColor: "#d33",
                focusConfirm: false,
                preConfirm: () => {
                    const image = Swal.getPopup().querySelector("#image").value;
                    const ukm = Swal.getPopup().querySelector("#inputUkm").value;
                    if (image == "" || image == null) {
                        Swal.showValidationMessage(`Silahkan upload bukti pembayaran terlebih dahulu`)
                    } else if (ukm == "" || ukm == null || ukm == "Pilih UKM") {
                        Swal.showValidationMessage(`Silahkan pilih UKM terlebih dahulu`)
                    } else {
                        console.log("masuk else");
                        console.log(image);
                        document.getElementById("pembayaran").submit();
                        return { image: image }
                    }
                }
            });
        };
    </script>
</body>

<?php
if (isset($_GET['status'])) {
    $msg = $_GET['status'];
    if ($msg == 0) {
        echo '<script>swal({
        title: "Terima Kasih",
        text: "Bukti Pembayaran anda telah terkirim.",
        icon: "success"
    });</script>';
    } else if ($msg == 1) {
        echo '<script>swal({
        title: "Error",
        text: "File gambar maksimal 2MB.",
        icon: "error"
    });</script>';
    } else if ($msg == 2) {
        echo '<script>swal({
        title: "Error",
        text: "Tipe file anda salah.",
        icon: "error"
    });</script>';
    } else if ($msg == 3) {
        echo '<script>swal({
        title: "Error",
        text: "Input error, silahkan inputkan Ulang.",
        icon: "error"
    });</script>';
    }
}
?>