<?php
include 'api/connect.php';

$query = "SELECT * FROM maintenance_user";
$result = $con->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row["status"] === "maintenance") {
            header("Location: maintenance.php");
        }
    }
}

$ukm = $_GET['ukm'];
$query = "SELECT * FROM `ukm` WHERE `nama_ukm` LIKE '$ukm'";
$lowerukm = strtolower($ukm);
$queryfotoukm = "SELECT * FROM `foto_kegiatan` WHERE `ukm` LIKE '$lowerukm'";

$result = mysqli_query($con, $query);
$result = mysqli_fetch_assoc($result);

$resultfoto = mysqli_query($con, $queryfotoukm);
$foto = mysqli_fetch_assoc($resultfoto);

$nrp = $_SESSION['nrp'];

if($result==null){
    header("Location: listUKM-LK.php");
}

if ($result['audisi'] == 'ya') {
    $tipe = 'audisi';
    $sql = "SELECT count(*) as total FROM `pendaftar_maba` WHERE terima = 'terima' and ukm like '" . $ukm . "' and cancel is null";
} else {
    $sql = "SELECT count(*) as total FROM `pendaftar_maba` WHERE ukm like '" . $ukm . "' and cancel is null";
    $tipe = 'normal';
    if ($result['kuota_early_bird'] == 0) {
        $tipePendaftaran = 'reguler';
    } else {
        $tipePendaftaran = 'early bird';
    }
}

$soldout = false;
$query = mysqli_query($con, $sql);
$countQuota = mysqli_fetch_array($query);
$countQuota = $countQuota['total'];

if ($countQuota >= $result['quota']) {
    $soldout = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail UKM | Open House 2023</title>
    <link rel="icon" type="image/x-icon" href="../asset/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="css/detail.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js"
        integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
    <style>
        .swiper-slide img {
            width: 100%;
        }

        .yt {
            aspect-ratio: 16 / 9;
            width: 100%;
        }

        #foto {
            z-index: 0;
        }
    </style>
</head>

<body>
    <?php
    if ($result['livechat'] != '' && $result['livechat'] != null) {
        echo ($result['livechat']);
    }
    ;
    ?>

    <?php
    include 'header.php';
    ?>
    <div class="container d-flex justify-content-center" style="margin-top:150px; margin-bottom:150px;">
        <div class="card rounded-5" style="background-color: #4b847d; color:#FBE99C;">
            <div class="card-body d-flex justify-content-center text-center row">
                <h1 class="card-title my-3 fw-bold">UKM
                    <?php echo $result['nama_ukm']; ?>
                </h1>
                <div class="text-center">
                    <?php
                    if ($result['logo'] != '' && $result['logo'] != null) {
                        ?>
                        <img src="../admin/dashboard/<?php echo $result['logo']; ?>" class="rounded-circle"
                            style="width :200px; background-color:white;" alt="...">
                    <?php } else { ?>
                        <img src=" " class="rounded-circle" style="width :200px; background-color:white;" alt="...">
                    <?php }
                    ; ?>

                </div>
                <div class="col d-flex justify-content-end fs-3 my-3">
                    <a id="btn-visi" class="btnn fs-4 fw-bold" role="button">
                        Visi
                    </a>
                </div>
                <div class="col-6 fs-3 my-3">
                    <a id="btn-desc" class="focus btnn fs-4 fw-bold" role="button">
                        Deskripsi
                    </a>
                </div>
                <div class="col d-flex justify-content-start fs-3 my-3">
                    <a id="btn-misi" class="btnn fs-4 fw-bold" role="button">
                        Misi
                    </a>
                </div>
                <div class="isi" id="visi">
                    <div class="col-md-10 mx-auto fs-6">
                        <?php
                        if ($result['visi'] != '' && $result['visi'] != null) {
                            echo nl2br($result['visi']);
                        } else {
                            echo "-";
                        }
                        ;
                        ?>
                    </div>
                </div>
                <div class="isi" id="desc">
                    <div class="col-md-10 mx-auto fs-6">
                        <?php
                        if ($result['deskripsi'] != '' && $result['deskripsi'] != null) {
                            echo nl2br($result['deskripsi']);
                        } else {
                            echo "-";
                        }
                        ;
                        ?>
                    </div>
                </div>
                <div class="isi" id="misi">
                    <div class="col-md-10 mx-auto fs-6">
                        <?php
                        if ($result['misi'] != '' && $result['misi'] != null) {
                            echo nl2br($result['misi']);
                        } else {
                            echo "-";
                        }
                        ;

                        ?>
                    </div>
                </div>

                <div class="col-md-10 mt-5 mb-4">
                    <h4 class="fw-bold">Jadwal</h2>
                        <p class="fs-5 m-0">
                            <?php
                            if ($result['jadwal'] != '' && $result['jadwal'] != null) {
                                echo nl2br($result['jadwal']);
                            } else {
                                echo "-";
                            }
                            ;
                            ?>
                        </p>
                </div>
                <div class="container row text-white d-flex justify-content-center align-items-center">
                    <div class="col-md-5 fs-4 my-3" style="color:#FBE99C;">
                        <span class="fs-4 fw-bold">Kuota</span>
                        <p class="fs-2 m-0">
                            <?php
                            $quota = $result['quota'];
                            if ($result['quota'] != '' && $result['quota'] != null) {
                                echo $result['quota'];
                            } else {
                                echo "-";
                            }
                            ;
                            ?>
                        </p>
                    </div>
                    <div class="col-md-5 fs-4 my-3" style="color:#FBE99C;">
                        <span class="fs-4 fw-bold">Biaya</span>
                        <p class="fs-2 m-0">
                            <?php
                            if ($result['biaya'] != '' && $result['biaya'] != null) {
                                echo $result['biaya'];
                            } else {
                                echo "-";
                            }
                            ;
                            ?>
                        </p>
                    </div>
                    <div class="col-md-4 fs-4 my-3" style="color:#FBE99C;" hidden>
                        <span class="fs-4 fw-bold">No Rekening</span>
                        <p class="fs-3 m-0">
                            <?php
                            if ($result['no_rek'] != '' && $result['no_rek'] != null) {
                                echo $result['no_rek'];
                            } else {
                                echo "-";
                            }
                            ;
                            ?>
                        </p>
                    </div>
                </div>
                <!-- Earlybird -->
                <?php
                if ($result['kuota_early_bird'] != 0) {
                    ?>
                    <div class="container row text-white d-flex justify-content-center align-items-center">
                        <div class="col-md-4 fs-4 my-3" style="color:#FBE99C;">
                            <span class="fs-4 fw-bold">Kuota Early Bird</span>
                            <p class="fs-2 m-0">
                                <?php
                                if ($result['kuota_early_bird'] != 0) {
                                    echo $result['kuota_early_bird'];
                                } else {
                                    echo "-";
                                }
                                ?>
                            </p>
                        </div>
                        <div class="col-md-4 fs-4 my-3" style="color:#FBE99C;">
                            <span class="fs-4 fw-bold">Biaya Early Bird</span>
                            <p class="fs-2 m-0">
                                <?php
                                if ($result['harga_early_bird'] != 0) {
                                    echo $result['harga_early_bird'];
                                } else {
                                    echo "-";
                                }
                                ?>
                            </p>
                        </div>
                        <div class="col-md-4 fs-4 my-3" style="color:#FBE99C;">
                            <span class="fs-4 fw-bold">Tanggal Early Bird</span>
                            <p class="fs-3 m-0">
                                <?php
                                if ($result['tanggal'] != '' && $result['tanggal'] != null) {
                                    echo $result['tanggal'];
                                } else {
                                    echo "-";
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <center>
                    <h4 class="mt-4 mb-3 fw-bold">Poster</h4>
                    <div class="col-8 col-md-6">
                        <?php
                        if ($result['poster'] != '' && $result != null) {
                            ?>
                            <!-- <img src="../admin/dashboard/<?php //echo $result['poster']; ?>" alt="" style="width:100%"> -->
                            <a id="foto" href="../admin/dashboard/<?php echo $result['poster']; ?>"
                                data-fancybox="gallery-poster" style="max-width:100%">
                                <img src="../admin/dashboard/<?php echo $result['poster']; ?>" style="max-width:100%" />
                            </a>
                            <?php
                        } else {
                            ?>
                            <img src=" " alt="" style="width:100%">
                            <?php
                        }
                        ;
                        ?>

                    </div>
                </center>

                <center>
                    <h4 class="mt-4 mb-1 fw-bold">Foto Kegiatan</h4>
                </center>
                <div class="container col-10 my-4">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 d-flex justify-content-center">
                        <?php
                        $sql = "SELECT * FROM `foto_kegiatan` WHERE `ukm` LIKE '$ukm'";
                        $query = mysqli_query($con, $sql);

                        while ($rowgambar = mysqli_fetch_assoc($query)) {
                            // if($rowgambar['foto'] !=null && $rowgambar['foto']!='' ){
                            ?>
                            <div class="col-md-3 d-flex align-items-center my-3">
                                <a id="foto" class="align-items-center"
                                    href="../admin/dashboard/<?php echo $rowgambar['foto']; ?>" data-fancybox="gallery"
                                    style="max-width:100%">
                                    <img src="../admin/dashboard/<?php echo $rowgambar['foto']; ?>"
                                        style="max-width:100%" />
                                </a>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>

                <center>
                    <h4 class="mt-4 mb-1 fw-bold">Video</h4>
                </center>
                <div class="container col-md-8 my-4">
                    <?php
                    if ($result['youtube'] != null && $result != '') {
                        ?>
                        <iframe class="yt" src="<?php echo $result['youtube']; ?>" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                        <?php
                    } else {
                        echo "-";
                    }
                    ;
                    ?>

                </div>


                <div class="container my-3">
                    <p class="fs-4 fw-bold">Contact</p>
                    <a href="https://instagram.com/<?php echo $result['instagram']; ?>" target="_blank" role="button"><i
                            id="contact" class="fa-brands fa-instagram fa-3x mx-2"></i></a>
                </div>
                <div class="submit-button mt-3 mb-5 d-flex justify-content-center">
                    <?php
                    if (!$soldout) {
                        // if ($ukm == 'VG' || $ukm== 'Selam') {
                        //     echo '<button type="button" class="btn-D btn-daftar" name="pendaftaran" id="pendaftaran"
                        //     onclick="location.href=\'pendaftaran2023.php?ukm='.$ukm.'\'">Daftar</button>';
                        // }else{
                            echo '<div class="p-2" style="background-color:red; color:white; border:solid red; border-radius:15px; font-weight:700;">CLOSED</div>';
                        // }
                    } else {
                        echo '<div class="p-2" style="background-color:red; color:white; border:solid red; border-radius:15px; font-weight:700;">SOLD OUT</div>';
                        echo "<script>
                            $('#pendaftaran').prop('disabled', true);
                            swal('Kuota Penuh', 'Kuota dari UKM ini telah penuh', 'error');
                            </script>";
                    }

                    
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        <?php
        if (isset($_GET['status'])){
            if($_GET['status']==99){
                echo " swal('Close Registration', 'Pendaftaran telah tutup', 'error');";
            }
        } 
        ?>
    </script>
    <script src="js/detail.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        Fancybox.bind("[data-fancybox]", {
            // Your custom options
        });

        $('#desc').show();
        $('#visi,#misi').hide();

        $('#btn-visi').click(function () {
            $('#btn-desc').removeClass("focus");
            $('#btn-misi').removeClass("focus");
            if (!$('#btn-visi').hasClass("focus")) {
                $('#btn-visi').addClass("focus");
            }
            $('#desc').hide();
            $('#misi').hide();
            $('#visi').show();
        });
        $('#btn-desc').click(function () {
            $('#btn-visi').removeClass("focus");
            $('#btn-misi').removeClass("focus");
            if (!$('#btn-desc').hasClass("focus")) {
                $('#btn-desc').addClass("focus");
            }
            $('#visi').hide();
            $('#misi').hide();
            $('#desc').show();

        });
        $('#btn-misi').click(function () {
            $('#btn-visi').removeClass("focus");
            $('#btn-desc').removeClass("focus");
            if (!$('#btn-misi').hasClass("focus")) {
                $('#btn-misi').addClass("focus");
            }
            $('#visi').hide();
            $('#desc').hide();
            $('#misi').show();
        });
    </script>

</body>

</html>