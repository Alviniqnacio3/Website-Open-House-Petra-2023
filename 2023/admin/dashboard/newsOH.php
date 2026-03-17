<?php
require "../api/connect.php";
require "../api/check_integrity.php";

$query = "SELECT * FROM maintenance WHERE page = 'newsOH'";
$result = $conn -> query($query);
if ($result -> num_rows > 0) {
    while($row = $result-> fetch_assoc()){
        if ($row["status"] === "maintenance") {
            header("location: maintenance.php");
        }
    }
}

$nrp_panit = $_SESSION['nrp'];

if ($_SESSION['kategori']=="lk"){
    header("location: keteranganLK.php");
}else if($_SESSION['kategori']=="panitia"){
    header("location: index.php");
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
                        <div class="col-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Tambah News</h4>
                                    <form class="forms-sample" method="POST" action="../api/tambah_news.php">
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input type="text" class="form-control" name="judul" placeholder="Judul"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input type="date" class="form-control" name="tanggal" placeholder="Tanggal"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label>Isi News</label>
                                            <textarea class="form-control" name="isi" required></textarea>
                                        </div>
                                        <button onclick="loading()" type="submit" class="btn btn-primary me-2">Tambah
                                            News</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">List News</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th> Judul </th>
                                                    <th> Tanggal </th>
                                                    <th> Isi </th>
                                                    <th> Last Update </th>
                                                    <th> Status </th>
                                                    <th> Notes </th>
                                                    <th> Action </th>
                                                </tr>

                                                <?php
                                                $ukm_lk = $_SESSION["nrp"];
                                                $query = "SELECT * FROM news WHERE ukm_lk = '$ukm_lk' AND status = 'terima'";
                                                $result = $conn->query($query);
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        $id = $row["id"];
                                                        $judul = $row["judul"];
                                                        $tanggal = $row["tanggal"];
                                                        $isi = $row["isi"];
                                                        $lastUpdate = $row["last_update"];
                                                        $status = $row["status"];
                                                        $notes = $row["notes"];
                                                        echo "<tr>";
                                                        echo "
                                                            <td> $judul </td>
                                                            <td> $tanggal </td>
                                                            <td> $isi </td>
                                                            <td> $lastUpdate </td>
                                                            <td> $status </td>
                                                            <td> $notes </td>
                                                            <td> accepted </td>
                                                            ";
                                                        echo "</tr>";
                                                    }
                                                }
                                                ?>


                                                <?php
                                                $ukm_lk = $_SESSION["nrp"];
                                                $query = "SELECT * FROM news WHERE ukm_lk = '$ukm_lk' AND (status = 'tolak' OR status is null or status='')";
                                                $result = $conn->query($query);
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        $id = $row["id"];
                                                        $judul = $row["judul"];
                                                        $tanggal = $row["tanggal"];
                                                        $isi = $row["isi"];
                                                        $lastUpdate = $row["last_update"];
                                                        $status = $row["status"];
                                                        $notes = $row["notes"];
                                                        echo "<tr>";
                                                        echo "
                                                            <td> $judul </td>
                                                            <td> $tanggal </td>
                                                            <td> $isi </td>
                                                            <td> $lastUpdate </td>
                                                            <td> $status </td>
                                                            <td> $notes </td>
                                                            <td> <button type='submit' class='btn btn-warning'
                                                            data-bs-toggle = 'modal' data-bs-target = '#editModal'
                                                            data-id = '$id'
                                                            data-judul = '$judul' 
                                                            data-tanggal = '$tanggal' 
                                                            data-isi = '$isi'>
                                                            Edit</button>

                                                            <button type='submit' class='btn btn-danger'
                                                            data-bs-toggle = 'modal' data-bs-target = '#deleteModal'
                                                            data-id = '$id'
                                                            data-judul = '$judul' 
                                                            data-tanggal = '$tanggal' 
                                                            data-isi = '$isi'>
                                                            Delete</button>
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


        <!-- Modal Delete Pertanyaan -->
        <div class="modal fade" id="editModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Confirmation</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form class="deleteForm" method="post" action="../api/update_news.php">
                        <!-- Modal body -->
                        <div class="modal-body">
                            Apakah anda yakin ingin mengganti news ini?
                            <br>
                            <br>
                            <p>Judul :</p>
                            <input class="js-example-basic-single form-control" name="judul" id="judulInput" value=""
                                required>
                            <br>
                            <p>Tanggal :</p>

                            <input type="date" class="form-control" name="tanggal" placeholder="Tanggal"
                                id="tanggalInput" required>

                            <br>
                            <p>Isi :</p>
                            <input class="js-example-basic-single form-control" name="isi" id="isiInput" value=""
                                required>

                            <br>
                            <input type='hidden' name='id' id="idSlot">
                            <br>
                            Pilih "Confirm" dibawah ini jika sudah yakin dengan news yang diganti!
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success btn-ok">Confirm</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form class="deleteForm" method="post" action="../api/delete_news.php">
                    <!-- Modal body -->
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus news ini?
                        <br>
                        Judul: <strong><span id="judul">ERROR</span></strong>
                        <input type="hidden" name="judul" id="judulInput">
                        <br>
                        Tanggal: <strong><span id="tanggal">ERROR</span></strong>
                        <input type="hidden" name="tanggal" id="tanggalInput">
                        <br>
                        Isi: <strong><span id="isi">ERROR</span></strong>
                        <input type="hidden" name="isi" id="isiInput">
                        <input type="hidden" name="isiLama" id="isiInput2">
                        <br>
                        <input type='hidden' name='id' id="idSlot">
                        <br>
                        Pilih "Confirm" dibawah ini jika yakin ingin menghapus pertanyaan!
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success btn-ok">Confirm</button>
                </form>
            </div>
        </div>
    </div>


    <script>

        $('#editModal').on('show.bs.modal', function (e) {
            $(this).find('#idSlot').val($(e.relatedTarget).data('id'));
            $(this).find('#judulInput').val($(e.relatedTarget).data('judul'));
            $(this).find('#tanggalInput').val($(e.relatedTarget).data('tanggal'));
            $(this).find('#isiInput').val($(e.relatedTarget).data('isi'));
        });

        $('#deleteModal').on('show.bs.modal', function (e) {
            $(this).find('#idSlot').val($(e.relatedTarget).data('id'));
            $(this).find('#judulInput').val($(e.relatedTarget).data('judul'));
            $(this).find('#tanggalInput').val($(e.relatedTarget).data('tanggal'));
            $(this).find('#isiInput').val($(e.relatedTarget).data('isi'));
            $(this).find('#judul').text($(e.relatedTarget).data('judul'));
            $(this).find('#tanggal').text($(e.relatedTarget).data('tanggal'));
            $(this).find('#isi').text($(e.relatedTarget).data('isi'));
        });

        <?php 
        if(isset($_GET['status'])){
            if ($_GET['status']==0){
                echo 'swal("Error","Gagal! Jika mau menambahkan news harus h-2!","error")';
            }else if($_GET['status']==1){
                echo 'swal("Success","News berhasil ditambahkan","success")';
            }
            else if($_GET['status']==2){
                echo 'swal("Success","News berhasil diupdate","success")';
            }
            else if ($_GET['status']==3){
                echo 'swal("Error","Gagal! Jika mau mengupdate news harus h-2!","error")';
            }
            else if($_GET['status']==4){
                echo 'swal("Success","News berhasil dihapus","success")';
            }
            
        }
        ?>

    </script>
    </div>
</body>

</html>