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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKM & LK | Open House 2023</title>
    <link rel="icon" type="image/x-icon" href="../asset/favicon.png">
    <link rel="stylesheet" href="css/listUKM-LK.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js"
        integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/gsap@3.12/dist/gsap.min.js"></script> -->
</head>

<body>
    <a id="cara-btn" class="btn p-0" href="panduan.php" target="_blank">
        <img class="img-fluid" src="../asset/panduan-btn.png" alt="">
    </a>
    <?php
    include 'header.php';
    ?>
    <style>
        body {
            font-family: Monterrat, sans-serif;
            background-color: black;
        }
    </style>

    <div class="container text-center text-white" style="margin-top: 150px;">
        <h1 id="judul" class="fw-bold">UKM & LK</h1>
    </div>

    <div class="col-10 mx-auto my-4" id="planet-mobile">

        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 katagori">
            <div class="col-md-3 my-2">
                <label for="insight">
                    <img class="card-img-top planet" src="../asset/Insight.png" alt="">
                    <input type="checkbox" id="insight" class="filter" hidden>
                </label>
            </div>
            <div class="col-md-3 my-2">
                <label for="olahraga">
                    <img class="card-img-top planet" src="../asset/Olahraga.png" alt="">
                    <input type="checkbox" id="olahraga" class="filter" hidden>
                </label>
            </div>
            <div class="col-md-3 my-2">
                <label for="seni">
                    <img class="card-img-top planet" src="../asset/Seni.png" alt="">
                    <input type="checkbox" id="seni" class="filter" hidden>
                </label>
            </div>

            <div class="col-md-3 my-2">
                <label for="lembaga">
                    <img class="card-img-top planet" src="../asset/LK.png" alt="">
                    <input type="checkbox" id="lembaga" class="filter" hidden>
                </label>
            </div>
        </div>
    </div>

    <div class="container">

        <?php
        $nrp = $_SESSION['nrp'];
        $queryuser = "SELECT * FROM `pendaftar_maba` WHERE nrp LIKE '$nrp'";
        $hsluser = mysqli_query($con, $queryuser);
        $hsluser = mysqli_fetch_assoc($hsluser);

        $queryukm = "SELECT * FROM `ukm`";
        $querylk = "SELECT * FROM `lk`";

        $hslukm = mysqli_query($con, $queryukm);
        $hsllk = mysqli_query($con, $querylk);
        while ($rowlk = mysqli_fetch_assoc($hsllk)) {
            if ($rowlk['nama_lk'] != 'Test2' && $rowlk['nama_lk'] != 'BPMF 1' && $rowlk['nama_lk'] != 'BPMF 3') {
                ?>
                <div class="item lembaga my-2 mx-2">
                    <div class="card" style="width: 18rem; height: 21rem; border: none;">
                        <?php
                        if ($rowlk['logo'] != '' && $rowlk['logo'] != null) {
                            ?>
                            <img id="img_card" src="../admin/dashboard/<?php echo $rowlk['logo']; ?>" class="card-img-top"
                                alt="...">
                            <?php
                        } else {
                        }
                        ;
                        ?>
                        <div id="content_card" class="card-img-overlay d-flex align-items-end justify-content-center">
                            <p class="card-text fw-bold fs-5">
                                <?php echo $rowlk['nama_lk'] ?>
                            </p>
                        </div>
                        <div id="content_card" class="card-img-overlay d-flex align-items-top justify-content-end">
                            <p class="card-text">
                                <span class="badge text-bg-dark">LK</span>
                            </p>
                        </div>
                        <div class="overlay">
                            <button type="button" class="btn btn-primary"
                                onclick="location.href='detail-lk.php?lk=<?php echo $rowlk['nama_lk']; ?>'">Lihat</button>
                        </div>
                    </div>
                </div>
                <?php
            }
            ;

            while ($rowukm = mysqli_fetch_assoc($hslukm)) {
                $soldout = false;
                // if ($rowukm['audisi'] == 'ya') {
                //     $tipe = 'audisi';

                //     $sql = "SELECT count(*) as total FROM `pendaftar_maba` WHERE terima = 'terima' and ukm like '" . $rowukm['nama_ukm'] . "' and cancel is null";
                // } else {
                    $sql = "SELECT count(*) as total FROM `pendaftar_maba` WHERE ukm like '" . $rowukm['nama_ukm'] . "'";
                    $tipe = 'normal';
                    if ($rowukm['kuota_early_bird'] == 0) {
                        $tipePendaftaran = 'reguler';
                    } else {
                        $tipePendaftaran = 'early bird';
                    }
                // }
                $query = mysqli_query($con, $sql);
                $countQuota = mysqli_fetch_array($query);
                $countQuota = $countQuota['total'];

                if ($countQuota >= $rowukm['quota']) {
                    $soldout = true;
                }


                if ($rowukm['nama_ukm'] != 'Test') {
                    ?>
                    <?php if (
                        $rowukm['nama_ukm'] == 'Martografi' || $rowukm['nama_ukm'] == 'Ilustrasi' || $rowukm['nama_ukm'] == 'Modeling' || $rowukm['nama_ukm'] == 'Teater' ||
                        $rowukm['nama_ukm'] == 'Chinese Art' || $rowukm['nama_ukm'] == 'Dance' || $rowukm['nama_ukm'] == 'Dekorasi' || $rowukm['nama_ukm'] == 'Paduan Suara' ||
                        $rowukm['nama_ukm'] == 'Orkestra' || $rowukm['nama_ukm'] == 'ASFS' || $rowukm['nama_ukm'] == 'VG'
                    ) { ?>
                        <div class="item seni my-2 mx-2">
                        <?php } elseif (
                        $rowukm['nama_ukm'] == 'Taekwondo' || $rowukm['nama_ukm'] == 'Badminton' || $rowukm['nama_ukm'] == 'Tenis Lapangan' ||
                        $rowukm['nama_ukm'] == 'Futsal' || $rowukm['nama_ukm'] == 'Voli' || $rowukm['nama_ukm'] == 'Tenis Meja' || $rowukm['nama_ukm'] == 'Catur' ||
                        $rowukm['nama_ukm'] == 'Selam' || $rowukm['nama_ukm'] == 'Fitness' || $rowukm['nama_ukm'] == 'Esport' || $rowukm['nama_ukm'] == 'Cycling' ||
                        $rowukm['nama_ukm'] == 'Renang' || $rowukm['nama_ukm'] == 'Basket'
                    ) { ?>
                            <div class="item olahraga my-2 mx-2">
                            <?php } elseif (
                        $rowukm['nama_ukm'] == 'Pengembangan Diri' || $rowukm['nama_ukm'] == 'MATRAPENZA' || $rowukm['nama_ukm'] == 'MENWA' ||
                        $rowukm['nama_ukm'] == 'English Debate' || $rowukm['nama_ukm'] == 'EMR' || $rowukm['nama_ukm'] == 'Menulis Kreatif' || $rowukm['nama_ukm'] == 'MATRAPALA'
                    ) { ?>
                                <div class="item insight my-2 mx-2">
                                <?php } else {
                        echo '<div class="item seni my-2 mx-2">';
                    }
                    ; ?>
                                <div class="card" style="width: 18rem; height: 21rem; border: none;">
                                    <?php
                                    if ($rowukm['logo'] != '' && $rowukm['logo'] != null) {
                                        ?>
                                        <img id="img_card" src="../admin/dashboard/<?php echo $rowukm['logo']; ?>" class="card-img-top"
                                            alt="...">
                                        <?php
                                    }
                                    ;
                                    ?>

                                    <div id="content_card" class="card-img-overlay d-flex align-items-end justify-content-center">
                                        <p class="card-text fw-bold fs-5">
                                            <?php echo $rowukm['nama_ukm'] ?>
                                        </p>
                                    </div>

                                    <div id="content_card" class="card-img-overlay d-flex align-items-top justify-content-end">
                                        <p class="card-text">
                                            <?php
                                            if ($tipe == 'audisi') {
                                                echo '<span class="badge text-bg-success">Audisi</span>';
                                            } else {
                                                echo '<span class="badge text-bg-info">Normal</span>';
                                            }
                                            ?>


                                        </p>
                                    </div>

                                    <?php
                                    if ($soldout) {
                                        echo '<div id="content_card" class="card-img-overlay d-flex align-items-top justify-content-start">
                                <p class="card-text">
                                    <span class="badge text-bg-danger">Sold Out</span>
                                </p>
                            </div>';
                                    }
                                    ?>

                                    <div class="overlay">
                                        <button type="button" class="btn btn-primary"
                                            onclick="location.href='detail-ukm.php?ukm=<?php echo $rowukm['nama_ukm']; ?>'">Lihat</button>
                                        <?php
                                        // Jadinya harus lihat detail baru bisa daftar
                                        // $temp = "location.href="."'pendaftaran2023.php?ukm=".$rowukm['nama_ukm']."'";
                                        //     if(!isset($hsluser["terima"])){
                                        //         echo '<button type="button" class="btn btn-primary" onclick="'.$temp.'">Daftar</button>';
                            
                                        //     };
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                }
            }
            ;
        }
        ?>
            </div>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/Flip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/Draggable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollTrigger/1.0.5/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js"></script>

<script src="js/listUKM-LK.js"></script>

<script>
    var $katagori = document.querySelector('.katagori');

    $katagori.addEventListener("click", function (ev) {
        if (ev.target.tagName == "INPUT") {
            if (ev.target.checked) {
                ev.target.parentNode.classList.add("selected");
            } else {
                ev.target.parentNode.classList.remove("selected");
            }
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Swal.fire({
    //     title: 'Pendaftaran Belum Dibuka!',
    //     html: "Pendaftaran UKM akan dibuka sekitar bulan Agustus melalui website ini. Stay Tune!<br><br>Follow Instagram <a href='https://www.instagram.com/openhouse.pcu' target='_blank'>@openhouse.pcu</a> untuk informasi lainnya.",
    //     icon: 'info',
    //     showCloseButton: true,
    //     confirmButtonText: 'Link Instagram',
    //     cancelButtonColor: 'red',
    //     cancelButtonText: 'Close',
    //     showCancelButton: true
    // }).then((result) => {
    //     if (result.isConfirmed) {
    //         window.open('https://www.instagram.com/openhouse.pcu', '_blank');
    //     }
    // });
</script>

</html>