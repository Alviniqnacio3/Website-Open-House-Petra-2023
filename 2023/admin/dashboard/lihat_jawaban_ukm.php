<?php
require "../api/connect.php";
require "../api/check_integrity.php";

$query = "SELECT * FROM maintenance WHERE page = 'lihat_jawaban_ukm'";
$result = $conn -> query($query);
if ($result -> num_rows > 0) {
    while($row = $result-> fetch_assoc()){
        if ($row["status"] === "maintenance") {
            header("location: maintenance.php");
        }
    }
}
if ($_SESSION['kategori'] == "lk") {
    header("location: keteranganLK.php");
} else if ($_SESSION['kategori'] == "panitia") {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pertanyaan & Jawaban UKM | Admin OPENHOUSE 2023</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
        </div>
        <!-- partial:partials/_sidebar.php -->
        <?php
        include "./partials/_sidebar.php";
        ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.php -->
            <?php
            include "./partials/_navbar.php";
            ?>

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row my-3 text-center">
                        <div class="col-md-12 stretch-card my-2">
                            <div class="card">
                                <div class="card-body  align-items-center">
                                    <!-- Contoh -->
                                    <?php
                                    $ukm = "";
                                    $nrpMaba = $_SESSION["nrpMaba"];
                                    if ($_SESSION["nrp"] == "ukm martografi") {
                                        $ukm = "Martografi";
                                    }
                                    if ($_SESSION["nrp"] == "ukm ilustrasi") {
                                        $ukm = "Ilustrasi";
                                    }
                                    if ($_SESSION["nrp"] == "modeling") {
                                        $ukm = "Modeling";
                                    }
                                    if ($_SESSION["nrp"] == "teater") {
                                        $ukm = "Teater";
                                    }
                                    if ($_SESSION["nrp"] == "vg") {
                                        $ukm = "VG";
                                    }
                                    if ($_SESSION["nrp"] == "asfs") {
                                        $ukm = "ASFS";
                                    }
                                    if ($_SESSION["nrp"] == "dekorasi") {
                                        $ukm = "Dekorasi";
                                    }
                                    if ($_SESSION["nrp"] == "chinese art") {
                                        $ukm = "Chinese Art";
                                    }
                                    if ($_SESSION["nrp"] == "dance") {
                                        $ukm = "Dance";
                                    }
                                    if ($_SESSION["nrp"] == "taekwondo") {
                                        $ukm = "Taekwondo";
                                    }
                                    if ($_SESSION["nrp"] == "badminton") {
                                        $ukm = "Badminton";
                                    }
                                    if ($_SESSION["nrp"] == "tenis lapangan") {
                                        $ukm = "Tenis Lapangan";
                                    }
                                    if ($_SESSION["nrp"] == "futsal") {
                                        $ukm = "Futsal";
                                    }
                                    if ($_SESSION["nrp"] == "voli") {
                                        $ukm = "Voli";
                                    }
                                    if ($_SESSION["nrp"] == "tenis meja") {
                                        $ukm = "Tenis Meja";
                                    }
                                    if ($_SESSION["nrp"] == "catur") {
                                        $ukm = "catur";
                                    }
                                    if ($_SESSION["nrp"] == "selam") {
                                        $ukm = "Selam";
                                    }
                                    if ($_SESSION["nrp"] == "fitness") {
                                        $ukm = "Fitness";
                                    }
                                    if ($_SESSION["nrp"] == "esport") {
                                        $ukm = "Esport";
                                    }
                                    if ($_SESSION["nrp"] == "cycling") {
                                        $ukm = "Cycling";
                                    }
                                    if ($_SESSION["nrp"] == "renang") {
                                        $ukm = "Renang";
                                    }
                                    if ($_SESSION["nrp"] == "english debate") {
                                        $ukm = "English Debate";
                                    }
                                    if ($_SESSION["nrp"] == "pengembangan diri") {
                                        $ukm = "Pengembangan Diri";
                                    }
                                    if ($_SESSION["nrp"] == "menulis kreatif") {
                                        $ukm = "Menulis Kreatif";
                                    }
                                    if ($_SESSION["nrp"] == "paduan suara") {
                                        $ukm = "Paduan Suara";
                                    }
                                    echo "<p class='fs-1 m-0 fw-semibold'>List Pertanyaan dan jawaban UKM $ukm</p>";
                                    echo "<br>";

                                    $ukm = $_SESSION["nrp"];

                                    $query = "SELECT * FROM jawaban WHERE nrp_penjawab = '$nrpMaba'";
                                    $result = $conn->query($query);
                                    if ($result->num_rows > 0) {
                                        $textAnswers = ''; // Variabel untuk jawaban teks
                                        $pdfAnswers = ''; // Variabel untuk jawaban PDF
                                        $imageAnswers = ''; // Variabel untuk jawaban gambar
                                    
                                        while ($row = $result->fetch_assoc()) {
                                            $idPertanyaan = $row["id_pertanyaan"];
                                            $jawaban = $row["jawaban"];
                                    
                                            $query2 = "SELECT * FROM pertanyaan WHERE id = '$idPertanyaan' AND ukm = '$ukm'";
                                            $result2 = $conn->query($query2);
                                    
                                            if ($result2->num_rows > 0) {
                                                while ($row2 = $result2->fetch_assoc()) {
                                    
                                                    $pertanyaan = $row2["pertanyaan"];
                                    
                                                    if ($row2["jenis"] == "text") {
                                                        $textAnswers .= "<h3 class='text-start'>&nbsp; - $pertanyaan </h3>";
                                                        $textAnswers .= "<h3 class='text-start mb-5'>&emsp;&emsp;Jawaban: <b>$jawaban</b> </h3>";
                                                    } else if (($row2["jenis"] == "pdf") || ($row2["jenis"] == "PDF")) {
                                                        $pdfAnswers .= "<h3 class='text-start'>&nbsp; - $pertanyaan </h3>";
                                                        $pdfAnswers .= "<h3 class='text-start mb-5'>&emsp;&emsp;Jawaban: <a href='../../user/files/$jawaban'>Link PDF</a></h3>";
                                                    } else if ($row2["jenis"] == "image") {
                                                        $imageAnswers .= "<h3 class='text-start'>&nbsp; - $pertanyaan </h3>";
                                                        $imageAnswers .= "<h3 class='text-start mb-5'>&emsp;&emsp;Jawaban: <a href='../../user/files/$jawaban'>Link Foto</a></h3>";
                                                    }
                                                }
                                            }
                                        }
                                    
                                        echo "<section class='text-start'><h3>Soal Text:</h3>$textAnswers</section><br>"; // Cetak jawaban teks
                                        echo "<section class='text-start'><h3>Soal PDF:</h3>$pdfAnswers</section><br>"; // Cetak jawaban PDF
                                        echo "<section class='text-start'><h3>Soal Image:</h3>$imageAnswers</section>"; // Cetak jawaban gambar
                                    }
                                    
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- main-panel ends -->
                </div>
                <!-- page-body-wrapper ends -->
            </div>
            <!-- container-scroller -->
            <!-- plugins:js -->
            <script src="assets/vendors/js/vendor.bundle.base.js"></script>
            <!-- endinject -->
            <!-- Plugin js for this page -->
            <script src="assets/vendors/chart.js/Chart.min.js"></script>
            <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
            <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
            <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
            <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
            <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
            <!-- End plugin js for this page -->
            <!-- inject:js -->
            <script src="assets/js/off-canvas.js"></script>
            <script src="assets/js/hoverable-collapse.js"></script>
            <script src="assets/js/misc.js"></script>
            <script src="assets/js/settings.js"></script>
            <script src="assets/js/todolist.js"></script>
            <!-- endinject -->
            <!-- Custom js for this page -->
            <script src="assets/js/dashboard.js"></script>
            <!-- End custom js for this page -->

            <!-- Modal Detail -->

        </div>

</body>

</html>