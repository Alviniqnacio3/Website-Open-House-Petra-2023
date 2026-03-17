<?php
    require "../api/connect.php";
    require "../api/check_integrity.php";

    $query = "SELECT * FROM maintenance WHERE page = 'ganti_password'";
    $result = $conn -> query($query);
    if ($result -> num_rows > 0) {
        while($row = $result-> fetch_assoc()){
            if ($row["status"] === "maintenance") {
                header("location: maintenance.php");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Ganti Password | Admin OPENHOUSE 2023</title>
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
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <!-- contoh -->
                                    <?php 
                                        $ukm = "";
                                        $lk = "";

                                        if($_SESSION["nrp"] == "ukm martografi"){
                                            $ukm = "Martografi";
                                        }
                                        if($_SESSION["nrp"] == "ukm ilustrasi"){
                                            $ukm = "Ilustrasi";
                                        }
                                        if($_SESSION["nrp"] == "modeling"){
                                            $ukm = "Modeling";
                                        }
                                        if($_SESSION["nrp"] == "teater"){
                                            $ukm = "Teater";
                                        }
                                        if($_SESSION["nrp"] == "vg"){
                                            $ukm = "VG";
                                        }
                                        if($_SESSION["nrp"] == "asfs"){
                                            $ukm = "ASFS";
                                        }
                                        if($_SESSION["nrp"] == "dekorasi"){
                                            $ukm = "Dekorasi";
                                        }
                                        if($_SESSION["nrp"] == "chinese art"){
                                            $ukm = "Chinese Art";
                                        }
                                        if($_SESSION["nrp"] == "dance"){
                                            $ukm = "Dance";
                                        }
                                        if($_SESSION["nrp"] == "taekwondo"){
                                            $ukm = "Taekwondo";
                                        }
                                        if($_SESSION["nrp"] == "badminton"){
                                            $ukm = "Badminton";
                                        }
                                        if($_SESSION["nrp"] == "tenis lapangan"){
                                            $ukm = "Tenis Lapangan";
                                        }
                                        if($_SESSION["nrp"] == "futsal"){
                                            $ukm = "Futsal";
                                        }
                                        if($_SESSION["nrp"] == "voli"){
                                            $ukm = "Voli";
                                        }
                                        if($_SESSION["nrp"] == "tenis meja"){
                                            $ukm = "Tenis Meja";
                                        }
                                        if($_SESSION["nrp"] == "catur"){
                                            $ukm = "Catur";
                                        }
                                        if($_SESSION["nrp"] == "selam"){
                                            $ukm = "Selam";
                                        }
                                        if($_SESSION["nrp"] == "fitness"){
                                            $ukm = "Fitness";
                                        }
                                        if($_SESSION["nrp"] == "esport"){
                                            $ukm = "Esport";
                                        }
                                        if($_SESSION["nrp"] == "cycling"){
                                            $ukm = "Cycling";
                                        }
                                        if($_SESSION["nrp"] == "renang"){
                                            $ukm = "Renang";
                                        }
                                        if($_SESSION["nrp"] == "english debate"){
                                            $ukm = "English Debate";
                                        }
                                        if($_SESSION["nrp"] == "pengembangan diri"){
                                            $ukm = "Pengembangan Diri";
                                        }
                                        if($_SESSION["nrp"] == "menulis kreatif"){
                                            $ukm = "Menulis Kreatif";
                                        }
                                        if($_SESSION["nrp"] == "paduan suara"){
                                            $ukm = "Paduan Suara";
                                        }


                                        if($_SESSION["nrp"] == "bem"){
                                            $lk = "BEM";
                                        }
                                        if($_SESSION["nrp"] == "persma"){
                                            $lk = "PERSMA";
                                        }
                                        if($_SESSION["nrp"] == "tps"){
                                            $lk = "TPS";
                                        }
                                        if($_SESSION["nrp"] == "pelma"){
                                            $lk = "PELMA";
                                        }
                                        if($_SESSION["nrp"] == "mpm"){
                                            $lk = "MPM";
                                        }
                                        if($_SESSION["nrp"] == "bpmf 1"){
                                            $lk = "BPMF 1";
                                        }
                                        if($_SESSION["nrp"] == "bpmf 2"){
                                            $lk = "BPMF 2";
                                        }
                                        if($_SESSION["nrp"] == "bpmf 3"){
                                            $lk = "BPMF 3";
                                        }

                                        

                                        $hasil = $_SESSION["kategori"] == "ukm" ? "UKM " . $ukm : "LK " . $lk;
                                        $tipe = $_SESSION["kategori"] == "ukm" ? 'ukm' : 'lk';
                                        echo "<h4 class='card-title'>Ganti Password $hasil</h4>
                                            <form class='forms-sample' action='../api/update_password.php' method='post'>
                                                <div class='form-group'>
                                                    <label>Password Lama:</label>
                                                    <input type='password' class='form-control' name='old_pass'
                                                    placeholder='Password Lama' required>
                                                </div>
                                                <div class='form-group'>
                                                    <label>Password Baru:</label>
                                                    <input type='password' class='form-control' name='new_pass'
                                                    placeholder='Password Baru' required>
                                                </div>
                                                <div class='form-group'>
                                                    <label>Konfirmasi Password:</label>
                                                    <input type='password' class='form-control' name='confirm_pass'
                                                    placeholder='Konfirmasi Password Baru' required>
                                                </div>
                                                <input type='text' hidden name = 'tipe' value='$tipe'>
                                                <button type='submit' class='btn btn-primary me-2'>Change Password</button>
                                            </form>"
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <?php
                    include "./partials/_footer.html";
                    ?>
                    <!-- partial -->
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

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            <?php 
            if(isset($_GET['status'])){
                if ($_GET['status']==1){
                    echo 'swal("Success","Password berhasil di ganti","success")';
                }else if ($_GET['status']==2){
                    echo 'swal("Error","Password lama salah","error")';
                }else if ($_GET['status']==3){
                    echo 'swal("Error","Password baru tidak sesuai dengan password konfirmasi","error")';
                }
            }
            ?>
        </script>
    </div>

</body>

</html>