<?php
require "../api/connect.php";
require "../api/check_integrity.php";
$query = "SELECT * FROM maintenance WHERE page = 'pertanyaanUKM'";
$result = $conn -> query($query);
if ($result -> num_rows > 0) {
    while($row = $result-> fetch_assoc()){
        if ($row["status"] === "maintenance") {
            header("location: maintenance.php");
        }
    }
}

if ($_SESSION['kategori']=="lk"){
    header("location: keteranganLK.php");
}else if($_SESSION['kategori']=="panitia"){
    header("location: index.php");
}
header("location: list_pendaftarUKM.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pertanyaan UKM | Admin OPENHOUSE 2023</title>
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
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Input Pertanyaan</h4>
                                    <form class="forms-sample" action="../api/tambah_pertanyaan.php" method="post">
                                        <div class="form-group">
                                            <label>Pertanyaan:</label>
                                            <input type="text" class="form-control" name="pertanyaan"
                                                placeholder="Pertanyaan" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Upload</label>
                                            <select class="js-example-basic-single form-control" style="width:30%"
                                                name="Jenis Upload" required>
                                                <option value="text">Text</option>
                                                <option value="image">Gambar</option>
                                                <option value="PDF">PDF</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary me-2">Upload Pertanyaan</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">List Pertanyaan</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th> Pertanyaan </th>
                                                    <th> Jenis </th>
                                                    <th> Edit/Delete </th>
                                                </tr>

                                                <?php
                                                $ukm = $_SESSION["nrp"];

                                                $query = "SELECT * FROM pertanyaan WHERE ukm LIKE '$ukm'";
                                                $result = $conn->query($query);
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        $pertanyaan = $row["pertanyaan"];
                                                        $tipe = $row["jenis"];
                                                        echo "<td>$pertanyaan</td>";
                                                        echo "<td>$tipe</td>";


                                                        $id = $row["id"];

                                                        echo "<td><button type='submit' class='btn btn-warning'
                                                                data-bs-toggle = 'modal' data-bs-target = '#editModal'
                                                                data-id = '$id' data-pertanyaan = '$pertanyaan' data-jenis = '$tipe'
                                                                >Edit</button>
                                                                
                                                                
                                                                <button type='submit'class='btn btn-danger' data-bs-toggle='modal' 
                                                                data-bs-target ='#deleteModal'
                                                                data-id = '$id'
                                                                data-pertanyaan = '$pertanyaan'
                                                                data-jenis = '$tipe'
                                                                >Delete</button></td>";
                                                        echo "</tr>";
                                                    }
                                                }
                                                ?>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
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
        <!-- End custom js for this page -->

        <!-- MODAL START -->

        <!-- Modal Delete Pertanyaan -->
        <div class="modal fade" id="deleteModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Confirmation</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form class="deleteForm" method="post" action="../api/delete_pertanyaan.php">
                        <!-- Modal body -->
                        <div class="modal-body">
                            Apakah anda yakin ingin menghapus pertanyaan ini?
                            <br>
                            Pertanyaan : <strong><span id="pertanyaan">ERROR</span></strong>
                            <input type="hidden" name="pertanyaan" id="pertanyaanInput">
                            <br>
                            Jenis : <strong><span id="jenis">ERROR</span></strong>
                            <input type="hidden" name="jenis" id="jenisInput">
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
    </div>

    <!-- Modal Delete Pertanyaan -->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form class="deleteForm" method="post" action="../api/update_pertanyaan.php">
                    <!-- Modal body -->
                    <div class="modal-body">
                        Apakah anda yakin ingin mengganti pertanyaan ini?
                        <br>
                        <p>Pertanyaan:</p>
                        <input class="js-example-basic-single form-control" name="pertanyaan" id="pertanyaanInput"
                            value="">
                        <br>
                        <p>Jenis:</p>
                        <!-- <input name="jenis" id="jenisInput"> -->

                        <select class="js-example-basic-single form-control" style="width:30%" name="jenis"
                            id="jenisInput" required>
                            <option value="text">Text</option>
                            <option value="image">Gambar</option>
                            <option value="PDF">PDF</option>
                        </select>

                        <br>
                        <input type='hidden' name='id' id="idSlot">
                        <br>
                        Pilih "Confirm" dibawah ini jika sudah yakin dengan pertanyaan yang diganti!
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

    <script>
        $('#deleteModal').on('show.bs.modal', function (e) {
            $(this).find('#idSlot').val($(e.relatedTarget).data('id'));
            $(this).find('#pertanyaan').text($(e.relatedTarget).data('pertanyaan'));
            $(this).find('#jenis').text($(e.relatedTarget).data('jenis'));
            $(this).find('#pertanyaanInput').val($(e.relatedTarget).data('pertanyaan'));
            $(this).find('#jenisInput').val($(e.relatedTarget).data('jenis'));
        });

        $('#editModal').on('show.bs.modal', function (e) {
            $(this).find('#idSlot').val($(e.relatedTarget).data('id'));
            $(this).find('#pertanyaanInput').val($(e.relatedTarget).data('pertanyaan'));
            $(this).find('#jenisInput').val($(e.relatedTarget).data('jenis'));
        });

        <?php 
        if(isset($_GET['status'])){
            if ($_GET['status']==0){
                echo 'swal("Success","Pertanyaan berhasil ditambahkan","success")';
            }else if($_GET['status']==1){
                echo 'swal("Success","Pertanyaan berhasil diupdate","success")';
            }
            else if($_GET['status']==2){
                echo 'swal("Success","Pertanyaan berhasil didelete","success")';
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

    <!-- Modal Detail -->

    </div>

</body>

</html>