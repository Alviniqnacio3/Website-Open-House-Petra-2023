<?php
require "../api/connect.php";
require "../api/check_integrity.php";

$query = "SELECT * FROM maintenance WHERE page = 'keteranganUKM'";
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
// header("location: list_pendaftarUKM.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Keterangan UKM | Admin OPENHOUSE 2023</title>
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
                                    <h4 class="card-title">Input keterangan UKM</h4>
                                    <form class="forms-sample" action="../api/tambah_keteranganUKM.php" method="post"
                                        enctype="multipart/form-data">

                                        <?php
                                            $visi ="";
                                            $misi = "";
                                            $deskripsi = "";
                                            $jadwal = "";
                                            $biaya = "";
                                            $rekening = "";
                                            $instagram = "";
                                            $kuota = "";
                                            $youtube = "";
                                            $ukm = $_SESSION["nrp"];

                                            $query = "SELECT * FROM ukm WHERE nama_ukm = '$ukm'";
                                            $result = $conn -> query($query);
                                            if ($result -> num_rows > 0) {
                                                while ($row = $result -> fetch_assoc()) {
                                                    $logo = $row["logo"];
                                                    $poster = $row['poster'];
                                                    $visi = $row["visi"];
                                                    $misi = $row["misi"];
                                                    $deskripsi = $row["deskripsi"];
                                                    $biaya = $row["biaya"];
                                                    $jadwal = $row["jadwal"];
                                                    $instagram = $row["instagram"];
                                                    $youtube = $row["youtube"];
                                                    $rekening = $row["no_rek"];
                                                    $kuota = $row["quota"];
                                                }
                                            }
                                        ?>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Logo UKM :</label>
                                                <br>
                                                <span style="font-size:12px;">Format file : JPG, JPEG, PNG (MAX 2MB)</span>
                                                <?php 
                                                if($logo==null){
                                                    echo '<input type="file" class="form-control" id="logo" name="logo" required
                                                    accept=".jpg, .jpeg, .png">';
                                                }else{
                                                    echo '<input type="file" class="form-control" id="logo" name="logo"
                                                    accept=".jpg, .jpeg, .png">';
                                                }
                                                ?>
                                                
                                                <div class="invalid-feedback">Logo belum terisi!</div>
                                                <script>
                                                    var file = document.getElementById('logo')
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
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Poster :</label>
                                                <br>
                                                <span style="font-size:12px;">Format file : JPG, JPEG, PNG (MAX 2MB)</span>
                                                <?php 
                                                if($poster==null){
                                                    echo '<input type="file" class="form-control" id="poster" name="poster"
                                                    required accept=".jpg, .jpeg, .png">';
                                                }else{
                                                    echo '<input type="file" class="form-control" id="poster" name="poster"
                                                    accept=".jpg, .jpeg, .png">';
                                                }
                                                ?>
                                                
                                                <div class="invalid-feedback">Poster belum terisi!</div>
                                                <script>
                                                    var file = document.getElementById('poster')
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
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Visi : </label>
                                            <textarea type='text' class='form-control' name='visi' placeholder='Visi UKM'
                                            style='height:100px;' required ><?=$visi?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Misi : </label>
                                            <textarea type='text' class='form-control' name='misi'
                                                placeholder='Misi UKM' style='height:100px;'
                                                required ><?=$misi?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi : </label>
                                            <textarea type='text' class='form-control' name='deskripsi'
                                                placeholder='Deskripsi tentang UKM' style='height:100px;'
                                                required><?=$deskripsi?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Jadwal : </label>
                                            <textarea type='text' class='form-control' name='jadwal'
                                                placeholder='Jadwal UKM' style='height:100px;' required><?=$jadwal?></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Biaya : </label>
                                                <input type='text' class='form-control' name='biaya' value='<?=$biaya?>'
                                                    placeholder='Biaya mengikuti UKM' required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>No. Rekening : </label>
                                                <input type='text' class='form-control' name='no_rek' value='<?=$rekening?>'
                                                    placeholder='Nomor Rekening UKM' required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Instagram : </label>
                                                <input type='text' class='form-control' name='ig' value='<?=$instagram?>'
                                                    placeholder= 'Instagram UKM' required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Kuota : </label>
                                                <input type='text' class='form-control' name='kuota' value='<?=$kuota?>'
                                                    placeholder='Kuota UKM' required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Link video via youtube (jika ada) : </label>
                                            <input type='text' class='form-control' name='link_yt' value='<?=$youtube?>'
                                                placeholder='Video UKM'>
                                        </div>
                                        <button type="submit" class="btn btn-primary me-2">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-6 form-group">
                                <form class="forms-sample" action="../api/tambah_foto_kegiatan.php" method="post"
                                        enctype="multipart/form-data">
                                <label>Foto Kegiatan UKM (Landscape, max. 5 foto) (MAX 2MB):</label>
                                <br>
                                <span style="font-size:12px;">Format file : JPG, JPEG, PNG</span>
                                <input type="file" class="form-control" id="foto_kegiatan" name="foto_kegiatan" required
                                    accept=".jpg, .jpeg, .png">
                                <div class="invalid-feedback">Poster belum terisi!</div>
                                <script>
                                    var file = document.getElementById('foto_kegiatan')
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
                                <br>
                                <button type="submit" class="btn btn-primary me-2">Submit</button></form>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">List Foto</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th> No </th>
                                            <th> Action </th>
                                        </tr>

                                        <?php
                                            $ukm = $_SESSION["nrp"];
                                            $query = "SELECT * FROM ukm WHERE nama_ukm = '$ukm'";
                                            $result = $conn -> query($query);
                                            $id = "";
                                            $imgLogo = "";
                                            $imgPoster = "";
                                            if ($result -> num_rows > 0) {
                                                while ($row = $result -> fetch_assoc()) {
                                                    $id = $row["id"];
                                                    $imgLogo = $row["logo"];
                                                    $imgPoster = $row["poster"];
                                                }
                                            }

                                            $counter = 1;
                                            if ($imgLogo != "") {
                                                echo "<tr>
                                            <td> Logo </td>
                                            <td> <button type='button' class='btn btn-primary' data-bs-toggle='modal'
                                                    data-bs-target='#exampleModal' data-src = '$imgLogo' >
                                                    Lihat Foto
                                                </button>
                                                </button>
                                                <button type='submit' class='btn btn-danger'
                                                data-bs-toggle='modal'
                                                data-bs-target='#deleteFoto'
                                                data-id = '$id'
                                                data-tipe = 'logo'
                                                >Hapus Foto</button>
                                                </td>
                                            </tr>";
                                            $counter++;    
                                            }
                                            if ($imgPoster != "") {
                                                echo "<tr>
                                            <td> Poster </td>
                                            <td> <button type='button' class='btn btn-primary' data-bs-toggle='modal'
                                                    data-bs-target='#exampleModal' data-src = '$imgPoster' >
                                                    Lihat Foto
                                                </button>
                                                </button>
                                                <button type='submit' class='btn btn-danger'
                                                data-bs-toggle='modal'
                                                data-bs-target='#deleteFoto'
                                                data-id = '$id'
                                                data-tipe = 'poster'
                                                >Hapus Foto</button>
                                                </td>
                                            </tr>";
                                            }
                                            
                                        ?>

                                        <?php
                                            $query = "";
                                            $ukm_lk = $_SESSION["nrp"];
                                            if ($_SESSION["kategori"] == "ukm") {
                                                $query = "SELECT * FROM foto_kegiatan WHERE ukm = '$ukm_lk'";
                                            }
                                            else if ($_SESSION["kategori"] == "lk") {
                                                $query = "SELECT * FROM foto_kegiatan WHERE lk = '$ukm_lk'";
                                            }
                                            $result = $conn -> query($query);
                                            $counter = 1;
                                            if ($result -> num_rows > 0) {
                                                while($row = $result -> fetch_assoc()){
                                                    $img = $row["foto"];
                                                    $id = $row["id"];
                                                    echo "<tr>
                                                    <td> Foto Kegiatan $counter </td>
                                                    <td> <button type='button' class='btn btn-primary' data-bs-toggle='modal'
                                                            data-bs-target='#exampleModal' data-src = '$img' >
                                                            Lihat Foto
                                                        </button>
                                                        </button>
                                                        <button type='submit' class='btn btn-danger'
                                                        data-bs-toggle='modal'
                                                        data-bs-target='#deleteFoto'
                                                        data-id = '$id'
                                                        >Hapus Foto</button>
                                                    </td>
                                                </tr>";
                                                $counter++;
                                                }
                                            }
                                            

                                        ?>

                                        <!-- <tr>
                                            <td> 1 </td>
                                            <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                    Lihat Foto
                                                </button>
                                                </button>
                                                <button type='submit' class='btn btn-danger'>Hapus Foto</button>
                                            </td>
                                        </tr> -->
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="card">
                        <div class="card-body">

                        <?php
                            $ukm = $_SESSION["nrp"]; 
                            $query = "SELECT * FROM ukm WHERE nama_ukm = '$ukm'";
                            $result = $conn->query($query);
                            
                            var_dump($result);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $harga_early = $row["harga_early_bird"] ?? 0;
                                    $tanggal_early = $row["tanggal"];
                                    // $tanggal_early = date_format($tanggal_early, "d/m/Y");
                                    $kuota_early = $row["kuota_early_bird"] ?? 0;
                                }
                            }

                        ?>

                        <form class="forms-sample" action="../api/update_early_bird.php" method="post"
                        enctype="multipart/form-data">
                        <h4 class="card-title">Form Early Bird: <?php echo "$tanggal_early"?></h4>
                            
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Harga Early Bird :  </label>
                                    <input type='text' class='form-control' name='harga_early' value='<?=$harga_early?>'
                                        placeholder= 'Harga Early Bird' required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                        <label>Tanggal Early Bird : </label>
                                        <input type="date" class="form-control" name="tanggal_early" placeholder="Tanggal"
                                            required value='<?="$tanggal_early"?>'>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                        <label>Kuota Early Bird : </label>
                                        <input type='text' class='form-control' name='kuota_early' value='<?=$kuota_early?>'
                                        placeholder= 'Kuota Early Bird' required>
                                </div>
                            </div>

                            <button type="submit" name = "submit" class="btn btn-primary btn-ok">Submit</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle = 'modal' data-bs-target="#deleteModal"
                            data-harga = "<?= $harga_early ?>" data-tanggal = "<?= $tanggal_early ?>" data-kuota = "<?= $kuota_early ?>"
                            >Delete</button>
                        </form>
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

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img class='mx-auto' id = 'foto' src='../../asset/Logo Warna.png' alt='' style='width: 80%;'>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal Delete EarlyBird -->
        <div class="modal fade" id="deleteModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Confirmation</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form class="deleteForm" method="post" action="../api/delete_keterangan_early_bird.php">
                        <!-- Modal body -->
                        <div class="modal-body">
                            Apakah anda yakin ingin menghapus keterangan ini?
                            <br>
                            Harga Early Bird: <strong><span id="harga_eb">ERROR</span></strong>
                            <br>
                            Tanggal Early Bird: <strong><span id="tanggal_eb">ERROR</span></strong>
                            <br>
                            Kuota Early Bird: <strong><span id="kuota_eb">ERROR</span></strong>
                            <br>
                            Pilih "Confirm" dibawah ini jika yakin ingin menghapus keterangan ini!
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
    <div class="modal fade" id="deleteFoto">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Confirmation</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form class="deleteForm" method="post" action="../api/delete_foto.php">
                        <!-- Modal body -->
                        <div class="modal-body">
                            Apakah anda yakin ingin menghapus Foto ini?
                            <br>
                            <input type='hidden' name='id' id="idSlot">
                            <input type="hidden" name = "tipe" id = "tipe">
                            Pilih "Confirm" dibawah ini jika yakin ingin menghapus keterangan ini!
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success btn-ok">Confirm</button>
                    </form>
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
                        <input name="pertanyaan" id="pertanyaanInput" value="">
                        <br>
                        <br>
                        <p>Jenis:</p>
                        <input name="jenis" id="jenisInput">
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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('#deleteModal').on('show.bs.modal', function (e) {
            $(this).find('#harga_eb').text($(e.relatedTarget).data('harga'));
            $(this).find('#tanggal_eb').text($(e.relatedTarget).data('tanggal'));
            $(this).find('#kuota_eb').text($(e.relatedTarget).data('kuota'));
        });

        $('#deleteFoto').on('show.bs.modal', function (e) {

            $(this).find('#idSlot').val($(e.relatedTarget).data('id'));
            $(this).find('#tipe').val($(e.relatedTarget).data('tipe'));
            // $(this).find('#harga_eb').text($(e.relatedTarget).data('harga'));
            // $(this).find('#tanggal_eb').text($(e.relatedTarget).data('tanggal'));
            // $(this).find('#kuota_eb').text($(e.relatedTarget).data('kuota'));
        });

        $('#editModal').on('show.bs.modal', function (e) {
            $(this).find('#idSlot').val($(e.relatedTarget).data('id'));
            $(this).find('#pertanyaanInput').val($(e.relatedTarget).data('pertanyaan'));
            $(this).find('#jenisInput').val($(e.relatedTarget).data('jenis'));
        });

        $('#exampleModal').on('show.bs.modal', function (e) {
            $(this).find('#idSlot').val($(e.relatedTarget).data('id'));
            document.getElementById("foto").src = "./" + $(e.relatedTarget).data('src');
        });
        //alert
        <?php 
        if(isset($_GET['status'])){
            if ($_GET['status']==1){
                echo 'swal("Success","Keterangan Telah di Update","success")';
            }else if($_GET['status']==2){
                echo 'swal("Success","Foto Telah di Update","success")';
            }
            else if($_GET['status']==3){
                echo 'swal("Success","Foto Telah di hapus","success")';
            }
            else if($_GET['status']==4){
                echo 'swal("Error","Maksimal foto yang dapat di upload adalah 5 foto","error")';
            }
            else if($_GET['status']==5){
                echo 'swal("Error","Maksimal size foto yang dapat di upload adalah 2MB","error")';
            }
            else if($_GET['status']==6){
                echo 'swal("Error","Logo yang anda upload melebihi 2MB","error")';
            }
            else if($_GET['status']==7){
                echo 'swal("Error","Poster yang anda upload melebihi 2MB","error")';
            }else if($_GET['status']==8){
                echo 'swal("Error","Error server, silahkan coba upload ulang","error")';
            }else if($_GET['status']==9){
                echo 'swal("Error","Error, Cek lagi tanggal yang dimasukkan","error")';
            }
            else if ($_GET['status']==10){
                echo 'swal("Success","Keterangan Telah Berhasil di Delete","success")';
            }
        }
        ?>
    </script>
    

    <!-- Modal Detail -->

</body>

</html>