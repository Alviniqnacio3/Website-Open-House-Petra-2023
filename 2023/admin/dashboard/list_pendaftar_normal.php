<?php
require "../api/connect.php";
require "../api/check_integrity.php";

$query = "SELECT * FROM maintenance WHERE page = 'list_pendaftarUKM'";
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>List Pendaftar UKM | Admin OPENHOUSE 2023</title>
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
                    <div class="row my-3 text-center">
                        <div class="col-xxl-6 stretch-card my-2">
                            <div class="card">
                                <div class="card-body d-flex align-items-center">
                                    <!-- Contoh -->
                                    <?php 
                                        $ukm= $_SESSION['nrp'];

                                        if($_SESSION["nrp"] == "martografi"){
                                            $ukm = "Martografi";
                                        }
                                        if($_SESSION["nrp"] == "ilustrasi"){
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
                                            $ukm = "catur";
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
                                        if($_SESSION["nrp"] == "basket"){
                                            $ukm = "Basket";
                                        }
                                        
                                        
                                        echo "<p class='fs-1 m-0 fw-semibold'>List Pendaftar UKM $ukm</p>";
                                        $sql = "SELECT * FROM `ukm` WHERE nama_ukm like '$ukm'";
                                        $query = mysqli_query($conn,$sql);
                                        $row = mysqli_fetch_array($query);
                                        $quota = $row['quota'];
                                        $quota_eb = $row["kuota_early_bird"];
                                        $tanggal_eb = $row["tanggal"];
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-2 stretch-card my-2">
                            <div class="card">
                                <div class="card-body row row-cols-1 d-flex justify-content-center align-items-center">
                                    <p class="col fs-5 m-0">Total Pendaftar</p>
                                    <?php 
                                    $query = "SELECT * FROM pendaftar_maba WHERE ukm = '$ukm' and cancel is null";
                                    $result = $conn->query($query);
                                    $jumlah = $result->num_rows > 0 ? $result->num_rows : 0;
                                    echo "<p class='col fs-2 m-0 fw-semibold'> $jumlah </p>" 
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-xl-2 stretch-card my-2">
                            <div class="card">
                                <div class="card-body row row-cols-1 d-flex justify-content-center align-items-center">
                                    <p class="col fs-5 m-0">Pendaftar Accepted</p>
                                    <?php 

                                    // $query = "SELECT count(*) as total FROM pendaftar_maba WHERE ukm = '$ukm' AND terima = 'terima'";
                                    // $result = mysqli_query($conn,$query);
                                    // $jumlah = mysqli_fetch_array($result);
                                    // $pendaftarAcc = $jumlah['total'];
                                    // echo "<p class='col fs-2 m-0 fw-semibold'> $pendaftarAcc</p>" 
                                    ?>
                                </div>
                            </div>
                        </div> -->

                        <div class="col-xxl-2 stretch-card my-2">
                            <div class="card">
                                <div class="card-body row row-cols-1 d-flex justify-content-center align-items-center">
                                    <p class="col fs-5 m-0">Pendaftar Confirmed</p>
                                    <?php 
                                    $sql = "SELECT count(id) as total FROM `pendaftar_maba` WHERE UKM like '$ukm' AND (pembayaran is NOT null or pembayaran != '') and cancel is null";
                                    $query = mysqli_query($conn,$sql);
                                    $countQuota = mysqli_fetch_array($query);
                                    $countQuota = $countQuota['total'];
                                    echo "<p class='col fs-2 m-0 fw-semibold'> $countQuota </p>" 
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-2 stretch-card my-2">
                            <div class="card">
                                <div class="card-body row row-cols-1 d-flex justify-content-center align-items-center">
                                    <p class="col fs-5 m-0">Quota</p>
                                    <?php 
                                    echo "<p class='col fs-2 m-0 fw-semibold'> $quota </p>" 
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-12">
                            <div class="row">
                                <p class="col-md-6 fs-3 m-0">Pendaftar:</p>
                                <div class="col-md-6 d-flex justify-content-md-end">
                                    <!-- <form method='post' action='../api/update_list_ukm.php'>
                                        <button type="submit" class="btn btn-success btn-ok mx-2 my-2" onclick="loading()" name='terima_semua'>Terima
                                            Semua</button>
                                    </form> -->
                                    <button class="btn btn-warning btn-ok mx-2 my-2"><a href='../api/download_csv.php?ukm=<?php echo $ukm ?>'style="text-decoration:none; color:white;">Download Semua</a></button>
                                </div>
                            </div>
                        </label>
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <!-- Tabel display maba yg dikasih point oleh salah satu ukm/lk -->
                                                <tr>
                                                    <th> Nama </th>
                                                    <th> Nrp </th>
                                                    <th> Fakultas </th>
                                                    <th> Jurusan </th>
                                                    <th> Angkatan </th>
                                                    <th> No.Telp / ID Line</th>
                                                    <th> Tanggal Pendaftaran</th>
                                                    <th>Tipe</th>
                                                    <th> Lihat Data </th>
                                                    <th>Bukti Pembayaran</th>
                                                </tr>

                                                <?php
                                                    $ukm = $_SESSION["nrp"];
                                                    $query = "SELECT * FROM pendaftar_maba WHERE ukm = '$ukm' and cancel is null";
                                                    $jumlah = 0;
                                                    $result = $conn->query($query);

                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            $jumlah = $jumlah + 1;
                                                            $nama = $row["nama"];
                                                            $nrp = $row["nrp"];
                                                            $fakultas = $row["fakultas"];
                                                            $jurusan = $row["jurusan"];
                                                            $angkatan = $row["angkatan"];
                                                            $telepon = $row["telepon"];
                                                            $tanggal = $row['tanggal'];
                                                            $tanggalPembayaran = $row['tanggal_pembayaran'];
                                                            $bukti = $row['pembayaran'];

                                                            if ($jumlah < $quota_eb) {
                                                                if ($tanggalPembayaran <= $tanggal_eb) {
                                                                    $sqlHangus = "SELECT * FROM `pendaftar_maba` WHERE id =".$row['id']." and ((tanggal + INTERVAL 1 HOUR)>tanggal_pembayaran or (tanggal + INTERVAL 1 HOUR)>now())";
                                                                    $queryHangus = mysqli_query($conn,$sqlHangus);
                                                                    $hangus = mysqli_fetch_array($queryHangus);
                                                                    if($hangus==null){
                                                                        $tipe = "Hangus";
                                                                    }else{
                                                                        $tipe = "Early Bird";
                                                                    }
                                                                }   
                                                                else {
                                                                    $tipe = 'Regular';
                                                                }                                      
                                                            }
                                                            else{
                                                                $tipe = 'Regular';
                                                            }

                                                                echo "<tr>";
                                                                echo "<td>$nama</td>
                                                                        <td>$nrp</td>
                                                                        <td>$fakultas</td>
                                                                        <td>$jurusan</td>
                                                                        <td>$angkatan</td>
                                                                        <td>$telepon</td>
                                                                        <td>$tanggal</td>
                                                                        <td>$tipe</td>
                                                                        <form method='post' action='../api/update_list_ukm.php'>
                                                                        <input type='text' hidden name = 'nrp' value = '$nrp'>
                                                                        <td><button type='submit'
                                                                        class='btn btn-primary me-2' name = 'lihat'>Lihat</button></td>
                                                                        </form>";
                                                                        if ($bukti!=null && $bukti!=""){
                                                                            echo "<td><button type='button' class='btn btn-success' data-bs-toggle='modal'
                                                                            data-bs-target='#exampleModal' data-src = '$bukti' >Lihat Bukti Pembayaran</button> </td>";
                                                                        }else{
                                                                            echo "<td>Tidak Ada Bukti Pembayaran</td>";
                                                                        }
                                                                echo"</tr>";
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

                    <div class="row">
                        <label class="col-12">
                            <div class="row">
                                <p class="col-md-6 fs-3 m-0">Pendaftar Canceled:</p>
                                <div class="col-md-6 d-flex justify-content-md-end">
                                    <!-- <form method='post' action='../api/update_list_ukm.php'>
                                        <button type="submit" class="btn btn-success btn-ok mx-2 my-2" onclick="loading()" name='terima_semua'>Terima
                                            Semua</button>
                                    </form> -->
                                </div>
                            </div>
                        </label>
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <!-- Tabel display maba yg dikasih point oleh salah satu ukm/lk -->
                                                <tr>
                                                    <th> Nama </th>
                                                    <th> Nrp </th>
                                                    <th> Fakultas </th>
                                                    <th> Jurusan </th>
                                                    <th> Angkatan </th>
                                                    <th> No.Telp / ID Line</th>
                                                    <th> Tanggal Pendaftaran</th>
                                                    <th>Tipe</th>
                                                    <th> Lihat Data </th>
                                                    <th>Bukti Pembayaran</th>
                                                </tr>

                                                <?php
                                                    $ukm = $_SESSION["nrp"];
                                                    $query = "SELECT * FROM pendaftar_maba WHERE ukm = '$ukm' and cancel is not null";
                                                    $jumlah = 0;
                                                    $result = $conn->query($query);

                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            $jumlah = $jumlah + 1;
                                                            $nama = $row["nama"];
                                                            $nrp = $row["nrp"];
                                                            $fakultas = $row["fakultas"];
                                                            $jurusan = $row["jurusan"];
                                                            $angkatan = $row["angkatan"];
                                                            $telepon = $row["telepon"];
                                                            $tanggal = $row['tanggal'];
                                                            $tanggalPembayaran = $row['tanggal_pembayaran'];
                                                            $bukti = $row['pembayaran'];

                                                            if ($jumlah < $quota_eb) {
                                                                if ($tanggalPembayaran <= $tanggal_eb) {
                                                                    $sqlHangus = "SELECT * FROM `pendaftar_maba` WHERE id =".$row['id']." and ((tanggal + INTERVAL 1 HOUR)>tanggal_pembayaran or (tanggal + INTERVAL 1 HOUR)>now())";
                                                                    $queryHangus = mysqli_query($conn,$sqlHangus);
                                                                    $hangus = mysqli_fetch_array($queryHangus);
                                                                    if($hangus==null){
                                                                        $tipe = "Hangus";
                                                                    }else{
                                                                        $tipe = "Early Bird";
                                                                    }
                                                                }   
                                                                else {
                                                                    $tipe = 'Regular';
                                                                }                                      
                                                            }
                                                            else{
                                                                $tipe = 'Regular';
                                                            }

                                                                echo "<tr>";
                                                                echo "<td>$nama</td>
                                                                        <td>$nrp</td>
                                                                        <td>$fakultas</td>
                                                                        <td>$jurusan</td>
                                                                        <td>$angkatan</td>
                                                                        <td>$telepon</td>
                                                                        <td>$tanggal</td>
                                                                        <td>$tipe</td>
                                                                        <form method='post' action='../api/update_list_ukm.php'>
                                                                        <input type='text' hidden name = 'nrp' value = '$nrp'>
                                                                        <td><button type='submit'
                                                                        class='btn btn-primary me-2' name = 'lihat'>Lihat</button></td>
                                                                        </form>";
                                                                        if ($bukti!=null && $bukti!=""){
                                                                            echo "<td><button type='button' class='btn btn-success' data-bs-toggle='modal'
                                                                            data-bs-target='#exampleModal' data-src = '$bukti' >Lihat Bukti Pembayaran</button> </td>";
                                                                        }else{
                                                                            echo "<td>Tidak Ada Bukti Pembayaran</td>";
                                                                        }
                                                                echo"</tr>";
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

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img class='mx-auto' id='foto' src='../../asset/Logo Warna.png' alt='' style='width: 80%;'>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

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
    </div>

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

    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script>
    $('#deleteModal').on('show.bs.modal', function(e) {
        $(this).find('#idSlot').val($(e.relatedTarget).data('id'));
        $(this).find('#pertanyaan').text($(e.relatedTarget).data('pertanyaan'));
        $(this).find('#jenis').text($(e.relatedTarget).data('jenis'));
        $(this).find('#pertanyaanInput').val($(e.relatedTarget).data('pertanyaan'));
        $(this).find('#jenisInput').val($(e.relatedTarget).data('jenis'));
    });

    $('#editModal').on('show.bs.modal', function(e) {
        $(this).find('#idSlot').val($(e.relatedTarget).data('id'));
        $(this).find('#pertanyaanInput').val($(e.relatedTarget).data('pertanyaan'));
        $(this).find('#jenisInput').val($(e.relatedTarget).data('jenis'));
    });

    $('#exampleModal').on('show.bs.modal', function(e) {
        console.log('masuk')
        $(this).find('#idSlot').val($(e.relatedTarget).data('id'));
        document.getElementById("foto").src = "../../user/files/pembayaran/" + $(e.relatedTarget).data('src');
    });

    <?php
        // echo $pendaftarAcc." ".$quota;
        // if($pendaftarAcc>$quota){
        //     echo 'swal("Warning","Pendaftar yang di terima lebih banyak dari quota yang di sediakan","warning");';
        // }
        ?>
    </script>

    <!-- Modal Detail -->

    </div>

</body>

</html>