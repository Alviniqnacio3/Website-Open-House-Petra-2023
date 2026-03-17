<?php
// include "loader.php"; 
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
    // var_dump($nrp);
    $nrp = $_SESSION['nrp'];
    $query = "SELECT * FROM `pendaftar_maba` WHERE `nrp` LIKE '$nrp'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    ?>

    <?php
    include 'header.php';
    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-10 mt-5 pt-5 mx-auto">
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
    </div>

    <div class="container col-lg-8 mx-auto" id="detailnewsUKM" name="detailnewsUKM">
        <div class="accordion" id="accordion_news">
            <?php
            $sql = "SELECT * FROM `pendaftar_maba` WHERE `nrp` LIKE '$nrp' and (pembayaran!='' or pembayaran is not null)";
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

                    $queryukm = "SELECT * FROM `ukm` WHERE `nama_ukm` LIKE '$ukm'";
                    $resultukm = mysqli_query($con,$queryukm);
                    $rowukm = mysqli_fetch_assoc($resultukm);
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

                        <div class="col-11 row">
                            <div class="col-3 col-md-2 px-1 d-flex align-items-center justify-content-center">
                                <!-- ini buat logo ukm -->
                                <img id="img_card" src="../admin/dashboard/<?php echo $rowukm['logo']; ?>" class="card-img-top rounded-circle"alt="...">
                            </div>
                            <div class="col-9 col-md-10 d-flex align-items-center">
                                <div class="d-flex flex-column justify-content-center">
                                    <div class='card-header border-0'>
                                        <!-- judul -->
                                        <h2 id="jdl" class='my-2 text-break'>
                                            <?php echo $judul; ?>
                                        </h2>
                                        <!-- tanggal -->
                                        <h5 id="tgl" class='my-2 text-break'>
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
                        <p id="isi_news" class="m-0">
                            <?php echo $isi; ?>
                        </p>

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

    <script>
    //NAVBAR
    //sticky navbar jika di scroll
    window.addEventListener("scroll", function() {
        var header = document.querySelector("header");
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