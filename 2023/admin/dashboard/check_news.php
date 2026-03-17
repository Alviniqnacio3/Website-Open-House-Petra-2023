<?php
require "../api/connect.php";
require "../api/check_integrity.php";

$query = "SELECT * FROM maintenance WHERE page = 'check_news'";
$result = $conn -> query($query);
if ($result -> num_rows > 0) {
    while($row = $result-> fetch_assoc()){
        if ($row["status"] === "maintenance") {
            header("location: maintenance.php");
        }
    }
}

$nrp_panit = $_SESSION['nrp'];

if ($_SESSION['kategori'] == "lk") {
    header("location: keteranganLK.php");
} 
else if ($_SESSION['kategori'] == "ukm") {
    header("location: keteranganUKM.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>News | Admin LKMM-TM XXXII</title>
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
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
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
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">List News</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th> ID </th>
                                                <th> Judul </th>
                                                <th> Tanggal </th>
                                                <th> Isi </th>
                                                <th> UKM </th>
                                                <th> Action </th>
                                            </tr>
                                            

                                            <?php
                                            $query = "SELECT * FROM news WHERE status is null or status = ''";
                                            $result = $conn->query($query);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $id = $row["id"];
                                                    $judul = $row["judul"];
                                                    $tanggal = $row["tanggal"];
                                                    $isi = $row["isi"];
                                                    $ukm = $row["ukm_lk"];
                                                    echo "<tr>";
                                                    echo "<td> $id </td>
                                                            <td> $judul </td>
                                                            <td> $tanggal </td>
                                                            <td> $isi </td>
                                                            <td> $ukm </td>
                                                            <td> <button onclick type='submit' class='btn btn-success'
                                                            data-bs-toggle = 'modal' data-bs-target = '#accModal'
                                                            data-id = '$id'
                                                            data-judul = '$judul' 
                                                            data-tanggal = '$tanggal' 
                                                            data-isi = '$isi'>
                                                            Accept</button>

                                                            <button type='submit' class='btn btn-danger'
                                                            data-bs-toggle = 'modal' data-bs-target = '#rejectModal'
                                                            data-id = '$id'
                                                            data-judul = '$judul' 
                                                            data-tanggal = '$tanggal' 
                                                            data-isi = '$isi'>
                                                            Reject</button>
                                                            </td>";
                                                    echo "</tr>";
                                                }
                                            }
                                            ?>

                                            <!-- <tr>
                                                    <td> 1 </td>
                                                    <td> judulnya </td>
                                                    <td> tanggalnya </td>
                                                    <td> isinya </td>
                                                    <td> kapan update </td>
                                                    <td> <button type='submit' class='btn btn-warning'>Edit</button>
                                                    </td>
                                                </tr> -->
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-wrapper">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">List News Diterima</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th> ID </th>
                                                <th> Judul </th>
                                                <th> Tanggal </th>
                                                <th> Isi </th>
                                                <th> UKM </th>
                                                <th> Notes </th>
                                            </tr>

                                            <?php
                                            $query = "SELECT * FROM news WHERE status = 'terima'";
                                            $result = $conn->query($query);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $id = $row["id"];
                                                    $judul = $row["judul"];
                                                    $tanggal = $row["tanggal"];
                                                    $isi = $row["isi"];
                                                    $ukm = $row["ukm_lk"];
                                                    $status = $row["notes"];
                                                    echo "<tr>";
                                                    echo "<td> $id </td>
                                                            <td> $judul </td>
                                                            <td> $tanggal </td>
                                                            <td> $isi </td>
                                                            <td> $ukm </td>
                                                            <td> $status </td>
                                                            ";
                                                            
                                                    echo "</tr>";
                                                }
                                            }
                                            ?>

                                            <!-- <tr>
                                                    <td> 1 </td>
                                                    <td> judulnya </td>
                                                    <td> tanggalnya </td>
                                                    <td> isinya </td>
                                                    <td> kapan update </td>
                                                    <td> <button type='submit' class='btn btn-warning'>Edit</button>
                                                    </td>
                                                </tr> -->
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-wrapper">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">List News Ditolak</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th> ID </th>
                                                <th> Judul </th>
                                                <th> Tanggal </th>
                                                <th> Isi </th>
                                                <th> UKM </th>
                                                <th> Notes </th>
                                            </tr>

                                            <?php
                                            $query = "SELECT * FROM news WHERE status = 'tolak'";
                                            $result = $conn->query($query);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $id = $row["id"];
                                                    $judul = $row["judul"];
                                                    $tanggal = $row["tanggal"];
                                                    $isi = $row["isi"];
                                                    $ukm = $row["ukm_lk"];
                                                    $status = $row["notes"];
                                                    echo "<tr>";
                                                    echo "<td> $id </td>
                                                            <td> $judul </td>
                                                            <td> $tanggal </td>
                                                            <td> $isi </td>
                                                            <td> $ukm </td>
                                                            <td> $status </td>
                                                            ";
                                                            
                                                    echo "</tr>";
                                                }
                                            }
                                            ?>

                                            <!-- <tr>
                                                    <td> 1 </td>
                                                    <td> judulnya </td>
                                                    <td> tanggalnya </td>
                                                    <td> isinya </td>
                                                    <td> kapan update </td>
                                                    <td> <button type='submit' class='btn btn-warning'>Edit</button>
                                                    </td>
                                                </tr> -->
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


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

    <script>
        function loading(){
            Swal.fire({
            title: "Loading",
            html: "please wait!!!<br>",
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            },
            });
        }
    </script>

    <!-- Modal Delete Pertanyaan -->
    <div class="modal fade" id="accModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form class="deleteForm" method="post" action="../api/terima_tolak_news.php">
                    <!-- Modal body -->
                    <div class="modal-body">
                        Apakah anda yakin ingin ACCEPT news ini?
                        <br>
                        Judul: <strong><span id="judul">ERROR</span></strong>
                        <input type="hidden" name="judul" id="judulInput">
                        <br>
                        Tanggal: <strong><span id="tanggal">ERROR</span></strong>
                        <input type="hidden" name="tanggal" id="tanggalInput">
                        <br>
                        Isi: <strong><span id="isi">ERROR</span></strong>
                        <input type="hidden" name="isi" id="isiInput">
                        <br>
                        <input type='hidden' name='id' id="idSlot">
                        <br>
                        Pilih "Confirm" dibawah ini jika yakin ingin ACCEPT news!
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button  onclick='loading()' type="submit" class="btn btn-success btn-ok" name = "terima">Confirm</button>
                </form>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="rejectModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form class="deleteForm" method="post" action="../api/terima_tolak_news.php">
                    <!-- Modal body -->
                    <div class="modal-body">
                        Apakah anda yakin ingin REJECT news ini?
                        <br>
                        Judul: <strong><span id="judul">ERROR</span></strong>
                        <input type="hidden" name="judul" id="judulInput">
                        <br>
                        Tanggal: <strong><span id="tanggal">ERROR</span></strong>
                        <input type="hidden" name="tanggal" id="tanggalInput">
                        <br>
                        Isi: <strong><span id="isi">ERROR</span></strong>
                        <input type="hidden" name="isi" id="isiInput">
                        <br>
                        <input type='hidden' name='id' id="idSlot">
                        <br>
                        <label for="alasan">Alasan reject: </label>
                        <textarea class="form-control" name="alasan" id="alasan" rows="3" required></textarea>
                        <br>
                        <br>
                        Pilih "Confirm" dibawah ini jika yakin ingin REJECT news!
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success btn-ok">Confirm</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>

    <script>
        <?php
        if(isset($_GET['status'])){
            if($_GET['status']==1){
                echo 'swal("Success","News berhasil di accept","success");';
            }
        }
        ?>
        $('#accModal').on('show.bs.modal', function (e) {
            $(this).find('#idSlot').val($(e.relatedTarget).data('id'));
            $(this).find('#judulInput').val($(e.relatedTarget).data('judul'));
            $(this).find('#tanggalInput').val($(e.relatedTarget).data('tanggal'));
            $(this).find('#isiInput').val($(e.relatedTarget).data('isi'));
            $(this).find('#judul').text($(e.relatedTarget).data('judul'));
            $(this).find('#tanggal').text($(e.relatedTarget).data('tanggal'));
            $(this).find('#isi').text($(e.relatedTarget).data('isi'));
        });

        $('#rejectModal').on('show.bs.modal', function (e) {
            $(this).find('#idSlot').val($(e.relatedTarget).data('id'));
            $(this).find('#judulInput').val($(e.relatedTarget).data('judul'));
            $(this).find('#tanggalInput').val($(e.relatedTarget).data('tanggal'));
            $(this).find('#isiInput').val($(e.relatedTarget).data('isi'));
            $(this).find('#judul').text($(e.relatedTarget).data('judul'));
            $(this).find('#tanggal').text($(e.relatedTarget).data('tanggal'));
            $(this).find('#isi').text($(e.relatedTarget).data('isi'));
        });


    </script>
    </div>
</body>

</html>