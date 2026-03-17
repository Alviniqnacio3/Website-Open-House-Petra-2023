<!-- PAGE CEK STATUS PENDAFTARAN -->

<?php
include 'api/connect.php';
include 'api/session_check.php';


$query = "SELECT * FROM maintenance_user";
$result = $con -> query($query);
if ($result -> num_rows > 0) {
    while ($row = $result ->  fetch_assoc()) {
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Pendaftaran | Open House 2023</title>
    <link rel="icon" type="image/x-icon" href="../asset/favicon.png">
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
    <link rel="stylesheet" href="css/daftar.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <a id="cara-btn" class="btn p-0" href="panduan.php" target="_blank">
        <img class="img-fluid" src="../asset/panduan-btn.png" alt="">
    </a>
    <?php 
    include 'header.php';
    ?>

    <!-- <div class="container" style="margin-top:150px;">
        
    </div> -->

    <div class="container d-flex justify-content-center rounded-5 body-regist px-2 py-2 mb-5">
        <div class="col-10 col-md-10 text-white">
            <center>
                <h2 class="my-4" id="title">List Pendaftaran</h2>
            </center>
            <div class="container table-responsive mb-3">
                <table class="table table-borderless table-responsive">
                    <thead>
                        <tr>
                            <th class="col-sm-2 align-middle">Nama UKM</th>
                            <th class="col-sm-4 align-middle"><span style="display:inline;">Jadwal</span><span
                                    style="display:inline; visibility:hidden;">halohalohalo</span></th>
                            <th class="col-sm-1 align-middle">Kuota</th>
                            <th class="col-sm-1 align-middle">Harga</th>
                            <th class="col-sm-2 align-middle">Status</th>
                            <th class="col-sm-2 align-middle"><span style="display:inline;">Action</span><span
                                    style="display:inline; visibility:hidden;">actionaction</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $nrp = $_SESSION['nrp'];
                            $queryuser = "SELECT * FROM `pendaftar_maba` WHERE nrp LIKE '$nrp'";
                            $hsluser = mysqli_query($con, $queryuser);
                            while ($row = mysqli_fetch_assoc($hsluser)) {
                                $cancel = null;
                                $ukm = $row['UKM'];

                                // QUERY BUAT TAU BERAPA KUOTA UKM ITU
                                $query = "SELECT * FROM `ukm` WHERE nama_ukm LIKE '$ukm'";
                                $hslquery = mysqli_query($con,$query);
                                $hslquery = mysqli_fetch_assoc($hslquery);
                                if ($hslquery["audisi"]=='ya'){
                                    $tipePendaftaran = 'audisi';
                                    $tipe = "Reguler";
                                }else {
                                    if($hslquery['kuota_early_bird']==0){
                                        $tipePendaftaran = 'normal';
                                        $tipe = "Reguler";
                                    }else{
                                        $tipePendaftaran = 'early bird';
                                        $sql = "SELECT * FROM `pendaftar_maba` WHERE ukm='$ukm'";
                                        $query = mysqli_query($con,$sql);
                                        $count = 1; 
                                        while($rowCount = mysqli_fetch_assoc($query)){
                                            if ($rowCount['id']==$row['id']){
                                                break;
                                            }
                                            $count+=1;
                                        }
                                        if ($count < $hslquery['kuota_early_bird']){
                                            date_default_timezone_set('Asia/Jakarta');
                                            $phpdate = strtotime($hslquery['tanggal']);
                                            $mysqldate = date( 'Y-m-d', $phpdate );
                                            $nowDate = date('Y-m-d');
                                            if ($nowDate<=$mysqldate){
                                                $sqlHangus = "SELECT * FROM `pendaftar_maba` WHERE id =".$row['id']." and ((tanggal + INTERVAL 1 HOUR)>tanggal_pembayaran or (tanggal + INTERVAL 1 HOUR)>now())";
                                                $queryHangus = mysqli_query($con,$sqlHangus);
                                                $hangus = mysqli_fetch_array($queryHangus);
                                                if($hangus==null){
                                                    $tipe = "Hangus";
                                                }else{
                                                    $tipe = "Early Bird";
                                                }
                                            }else{
                                                $tipe = "Reguler";

                                            }
                                        }else{
                                            $tipe = "Reguler";
                                        }
                                    }
                                }

                                if ($row['cancel']!=null){
                                    $cancel = "canceled";
                                }
                                

                                ?>
                        <tr class="trow">
                            <td class="col-2 tdfirst align-middle">UKM <?php echo $row['UKM']; ?></td>
                            <td class="col-4 align-middle">
                                <p class="m-0"><?php echo $hslquery['jadwal']; ?></p>
                                <!-- <a tabindex="0" type="button" class="btn btn-jadwal" data-bs-toggle="popover"
                                            data-bs-custom-class="custom-popover" data-bs-trigger="focus"
                                            data-bs-title="Jadwal UKM Test" data-bs-content="">Lihat</a> -->
                            </td>
                            <td class="col-1 align-middle">
                                <?php echo $hslquery['quota']?></td>
                            <!-- menunggu acc -->
                            <!-- belum diterima -->
                            <?php 
                                        $terima = $row['terima'];
                                        $pembayaran = $row['pembayaran'];
                                        if(($terima==null || $terima=='') && $tipePendaftaran=='audisi'){
                                            //reguler
                                            if($tipe=="Reguler"){
                                                echo '<td class="col-2 align-middle"><span id="tipePembayaran'.$row['id'].'" class="badge text-bg-light">Reguler</span>';
                                                //early bird
                                            } elseif($tipe=="Early Bird"){
                                                echo '<td class="col-2 align-middle"><span id="tipePembayaran'.$row['id'].'" class="badge text-bg-primary">Early Bird</span>';
                                            }else if($tipe=="Hangus"){
                                                echo '<td class="col-2 align-middle"><span id="tipePembayaran'.$row['id'].'" class="badge text-bg-secondary">Hangus</span>';
                                            }
                                        if($ukm=="Test2"){
                                            if($cancel!="canceled"){
                                                ?>
                            <td class="col-2 align-middle"><span class="badge text-bg-warning">Belum Diterima</span>
                            </td>
                            <td class="col-2 tdlast align-middle">
                                <button type="button" data-bs-toggle="modal" data-bs-target="" class="btn btn-bayar"
                                    disabled>Bayar</button>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#batalmodal"
                                data-id="<?php echo $row['id'] ?>"
                                data-nama="<?php echo $row['UKM']?>"
                                class="btn btn-danger">Batal</button>
                            <?php
                                            }else{
                                                ?>
                            <td class="col-2 align-middle"><span class="badge text-bg-dark">Canceled</span></td>
                            <td class="col-2 tdlast align-middle">Canceled</td>
                                            <?php
                                            }
                                        }else{
                                            //closed
                                            echo '<td class="col-2 align-middle"><span class="badge text-bg-warning">Belum Diterima</span>
                                            <td class="col-2 tdlast align-middle">Closed</td>';
                                        }
                                            }else {
                                            // sudah diterima
                                            // belum bayar
                                            if($pembayaran==null || $pembayaran==''){
                                                //reguler
                                            if($tipe=="Reguler"){
                                                echo '<td class="col-2 align-middle"><span id="tipePembayaran'.$row['id'].'" class="badge text-bg-light">Reguler</span>';
                                                //early bird
                                            } elseif($tipe=="Early Bird"){
                                                echo '<td class="col-2 align-middle"><span id="tipePembayaran'.$row['id'].'" class="badge text-bg-primary">Early Bird</span>';
                                            }else if($tipe=="Hangus"){
                                                echo '<td class="col-2 align-middle"><span id="tipePembayaran'.$row['id'].'" class="badge text-bg-secondary">Hangus</span>';
                                            }
                                        if($ukm=="Test2"){
                                            if($cancel!="canceled"){
                                                ?>
                            <td class="col-2 align-middle"><span class="badge text-bg-danger">Belum Dibayar</span></td>
                            <td class="col-2 tdlast align-middle"><button type="button" data-bs-toggle="modal"
                                    data-id="<?php echo $row['id']?>" data-idUkm="<?php echo $hslquery['id']?>"
                                    data-namaUkm="<?php echo $hslquery['nama_ukm']?>" data-tipe="<?php echo $tipe?>"
                                    data-hargaNormal="<?php echo $hslquery['biaya']?>"
                                    data-hargaEarlyBird="<?php echo $hslquery['harga_early_bird']?>"
                                    data-tanggal="<?php echo $row['tanggal']?>" data-bs-target="#bayarmodal"
                                    class="btn btn-bayar">Bayar</button>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#batalmodal"
                                data-id="<?php echo $row['id']?>"
                                data-nama="<?php echo $row['UKM']?>"
                                class="btn btn-danger">Batal</button>
                            </td>
                            <?php
                                            }else{
                                                ?>
                            <td class="col-2 align-middle"><span class="badge text-bg-dark">Canceled</span></td>
                            <td class="col-2 tdlast align-middle">Canceled</td>
                                            <?php
                                            }
                                        }else{
                                            //closed
                                            echo '<td class="col-2 align-middle"><span class="badge text-bg-danger">Belum Dibayar</span></td>
                                            <td class="col-2 tdlast align-middle">Closed</td>';
                                        }
                                                
                                            }else{
                                                // sudah bayar
                                                //reguler
                                            if($tipe=="Reguler"){
                                                echo '<td class="col-2 align-middle"><span id="tipePembayaran'.$row['id'].'" class="badge text-bg-light">Reguler</span>';
                                                //early bird
                                            } else if($tipe=="Early Bird"){
                                                echo '<td class="col-2 align-middle"><span id="tipePembayaran'.$row['id'].'" class="badge text-bg-primary">Early Bird</span>';
                                            }else if($tipe=="Hangus"){
                                                echo '<td class="col-2 align-middle"><span id="tipePembayaran'.$row['id'].'" class="badge text-bg-secondary">Hangus</span>';
                                            }
                                                ?>
                            <td class="col-2 align-middle"><span class="badge text-bg-success">Sukses</span></td>
                            <td class="col-2 tdlast align-middle">
                                <button type="button" data-bs-toggle="modal" data-bs-target="" class="btn btn-bayar" disabled>Bayar</button>
                                <!-- <button type="button" data-bs-toggle="modal" data-bs-target="" class="btn btn-outline-danger" disabled>Batal</button> -->
                            </td>
                            <?php
                                            }
                                        }
                                    ?>

                        </tr>

                        <?php
                            };
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->

    <div class="modal fade" id="bayarmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header" style="border:none;">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="api/pembayaran.php" enctype="multipart/form-data">
                    <div class="modal-body mx-auto">
                        <!-- Title bayar ukm apa -->
                        <h1 class="fs-3 my-3 text-center" id="exampleModalLabel" style="font-weight:700;">Bayar UKM</h1>
                        <!-- img QRis -->
                        <img class="img-fluid" src="../asset/QRIS UKM Klub.png" alt="">
                        <!-- Detail harga -->
                        <p class="fs-6 fs-md-5 my-2 mt-3" style="font-weight:700;">Detail</p>
                        <!-- harga pendaftaran -->
                        <div class="row justify-content-between">
                            <div class="col-5">
                                <!-- regular/early bird -->
                                <p class="fs-6 fs-md-5 my-2">Harga Pendaftaran</p>
                            </div>
                            <div class="col-5">
                                <p class="fs-6 fs-md-5 my-2 text-end"><span id='price'>Rp 200.000</span></p>
                            </div>
                        </div>
                        <!-- kode unik -->
                        <div class="row justify-content-between">
                            <div class="col-5">
                                <p class="fs-6 fs-md-5 my-2">Kode Unik</p>
                            </div>
                            <div class="col-5">
                                <p class="fs-6 fs-md-5 my-2 text-end" id='kodeUnik'>Rp 1</p>
                            </div>
                        </div>
                        <!-- TOTAL -->
                        <div class="row justify-content-between">
                            <div class="col-5">
                                <p class="fs-6 fs-md-5 my-2" style="font-weight:700;">Total</p>
                            </div>
                            <div class="col-5">
                                <p class="fs-6 fs-md-5 my-2 text-end" style="font-weight:700;" id='total'>Rp 200.001</p>
                            </div>
                        </div>
                        <center>
                            <div id="w-unik" class="text-danger">PASTIKAN NOMINAL TERMASUK KODE UNIK!!</div>
                        </center>
                        <hr>
                        <!-- input -->
                        <div id="countdown">
                            <p class="fs-6 fs-md-5 my-2 text-danger text-center" style="font-weight:700;">Countdown
                                Pembayaran
                            </p>
                            <p class="fs-6 fs-md-5 my-2 text-danger text-center" id="timer"></p>
                        </div>
                        <h6 class="text-start" style="font-weight:700;">Foto Bukti Pembayaran</h6>
                        <input type="file" class="form-control" id="image" name="image" required
                            accept=".jpg, .jpeg, .png">
                    </div>
                    <div class="modal-footer d-flex justify-content-center mb-2" style="border:none;">
                        <input type="hidden" id="idPendaftar" name="idPendaftar" value="">
                        <input type="hidden" id="ukm" name="ukm" value="">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn-submit btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal batal -->
    <div class="modal fade" id="batalmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="border:none;">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-auto">
                    <!-- Title bayar ukm apa -->
                    <h1 class="fs-3 my-3 text-center" id="exampleModalLabel" style="font-weight:700;">Pembatalan
                        pendaftaran</h1>
                    <center>
                        <p>Apakah anda yakin ingin membatalkan pendaftaran anda pada UKM <span id="namaUkmBatal"><span></p>
                    </center>
                </div>
                <div class="modal-footer d-flex justify-content-center mb-2" style="border:none;">
                    <form method="post" action="api/pembatalan.php">
                        <input type="hidden" id="idBatal" name="idBatal" value="">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Batalkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
    nrp = '<?php echo $nrp ?>';

    var y = setInterval(function() {
        $.ajax({
            url: 'api/update_table.php',
            method: 'GET',
            data: {
                nrp: nrp
            },
            success: function(data) {
                data = JSON.parse(data);
                data.forEach(function(hasil) {
                    console.log(hasil);
                    if (document.getElementById("tipePembayaran" + hasil[0]).innerHTML != hasil[1]) {
                        location.reload();
                    }
                })

            }
        });

    }, 10000)
    newCountDownDate = new Date('');
    newCountDownDate.setHours(newCountDownDate.getHours() + 1);
    countDownDate = newCountDownDate;

    clicked = -1;

    $('#bayarmodal').on('show.bs.modal', function(e) {
        price = 0;
        if ($(e.relatedTarget).data('tipe') == 'Early Bird') {
            price = parseInt($(e.relatedTarget).data('hargaearlybird'));
        } else {
            price = parseInt($(e.relatedTarget).data('harganormal').replace(/\./g, ''), 10);
        }

        if ($(e.relatedTarget).data('tipe') == 'Reguler') {
            $('#countdown').attr('hidden', true);
        } else {
            $('#countdown').attr('hidden', false);
        }

        kode = parseInt($(e.relatedTarget).data('idukm'), 10);
        total = price + kode;

        $(this).find('#price').text('Rp ' + price);
        $(this).find('#kodeUnik').text('Rp ' + kode);
        $(this).find('#total').text('Rp ' + total);
        $(this).find('#idPendaftar').val($(e.relatedTarget).data('id'));
        $(this).find('#ukm').val($(e.relatedTarget).data('namaukm'));

        console.log($(this).find('#ukm').val());
        console.log($(this).find('#idPendaftar').val());





        countDownDate = new Date($(e.relatedTarget).data('tanggal'));
        countDownDate.setHours(countDownDate.getHours() + 1);
        countDownDate = countDownDate.getTime();

        clicked = $(e.relatedTarget).data('id');
    });

    $('#batalmodal').on('show.bs.modal', function(e) {
        $(this).find('#idBatal').val($(e.relatedTarget).data('id'));
        $(this).find('#namaUkmBatal').text($(e.relatedTarget).data('nama'));
    });

    var x = setInterval(function() {
        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;
        // console.log(distance);


        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("timer").innerHTML = hours + "h " +
            minutes + "m " + seconds + "s ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            if (document.getElementById("timer").innerHTML != "EXPIRED") {
                document.getElementById("timer").innerHTML = "EXPIRED";
            }

        }
    }, 1000);
    </script>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    //SWAL BAYAR
    function bayar(nama_ukm) {
        console.log(nama_ukm);
        Swal.fire({
            title: 'Sweet!',
            text: 'Modal with a custom image.',
            imageUrl: '../asset/qr-test.png',
            imageWidth: 400,
            imageHeight: 400,
            html: `<h5 class="text-center">Silakan Upload Bukti Pembayaran Biaya Pendaftaran UKM</h5>
            <form action="api/pembayaran.php" method="POST" enctype="multipart/form-data" id="pembayaran">
            <br>
            <h6 class="text-start">- UKM:</h6>
            <select class="form-control" id="inputUkm" name="inputUkm" required>
                <option value="" selected hidden>Pilih UKM</option>
            </select><br>
            <h6 class="text-start">- Foto Bukti Pembayaran:</h6>
            <input type="file" class="form-control" id="image" name="image" required accept=".jpg, .jpeg, .png">
            </form>`,
        });
    }
    </script> -->
    <script>
    // BUAT POPOVER LIHAT JADWAL
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
    const popover = new bootstrap.Popover('.popover-dismiss', {
        trigger: 'focus'
    })
    </script>

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

    <script>
    <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 0) {
            echo "Swal.fire('Success','Pendaftaran anda telah berhasil','success').then(function () {
                Swal.fire(
                    'Jadwal UKM tidak boleh bentrok',
                    'Jika mendaftar lebih dari 1 UKM pastikan jadwal UKM tidak bentrok dengan UKM lainnya',
                    'warning'
                );
            });";
        }else if($_GET['status'] == 1){
            echo "Swal.fire(
                'Error',
                'File gambar maksimal 2MB',
                'error'
            )";
        }else if($_GET['status'] == 2){
            echo "Swal.fire(
                'Error',
                'Tipe file anda salah.',
                'error'
            )";
        }else if($_GET['status'] == 3){
            echo "Swal.fire(
                'Error',
                'Input error, silahkan inputkan Ulang.',
                'error'
            )";
        }else if($_GET['status'] == 4){
            echo "Swal.fire('Success','Pembatalan anda telah berhasil.','success');";
        }else if($_GET['status'] == 5){
            echo "Swal.fire('Error','Pembatalan gagal, silahkan coba lagi.','error');";
        }
        
        else{
            echo "Swal.fire(
                'Jadwal UKM tidak boleh bentrok',
                'Jika mendaftar lebih dari 1 UKM pastikan jadwal UKM tidak bentrok dengan UKM lainnya',
                'warning'
            )";
        }
    }else{
        echo "Swal.fire(
            'Jadwal UKM tidak boleh bentrok',
            'Jika mendaftar lebih dari 1 UKM pastikan jadwal UKM tidak bentrok dengan UKM lainnya',
            'warning'
        )";
    }
    ?>
    </script>
</body>

</html>