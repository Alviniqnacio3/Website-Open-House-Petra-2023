<?php
include "api/connect.php";

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
    <title>Open House 2023</title>
    <link rel="icon" type="image/x-icon" href="../asset/favicon.png">
    <link rel="stylesheet" href="css/main.css">
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

    <div class="wrapper">
        <!-- <div id="loading" class="d-flex align-items-center justify-content-center"
            style="height:100vh; background-color:white; width:100vw">
            <img id="logo" src="../asset/Logo Warna.png" alt="" style="width: 200px">
        </div> -->
        <?php
        include 'header.php';
        ?>
        <div id="tit" class="container d-flex align-items-center justify-content-center"
            style="height: 100vh; width:100%; max-width:100%;">
            <h1 id="title" class="text-center">
                Welcome to Open House 2023
            </h1>
        </div>

        <div class="container d-flex align-items-center justify-content-center px-3" style="height: 100vh;">
            <div id="whatis" class="row d-flex align-items-center justify-content-center">
                <div class="col-sm my-2">
                    <img id="logo-muter" src="../asset/logo-muter.png" alt="" style="max-width: 100%;">
                </div>
                <div id="desc" class="col-sm text-center text-white my-2 px-3">
                    <h1 id="tujuan">Tujuan OH23</h1>
                    <p class="fs-5">Membantu mahasiswa menemukan serta mengembangkan bakat dan minat yang mereka miliki
                        dengan memperkenalkan UKM & LK yang ada di Universitas Kristen Petra.</p>
                </div>
            </div>
        </div>
        <div id="ukmlk" class="row d-flex align-items-center my-4" style="height:100vh;">
            <div id="ukm" class="col-md-8 text-white p-4 mb-4">
                <!-- singkatan -->
                <h1 id="ukm_sgkt" class="fw-bold">UKM</h1>
                <!-- kepanjangan -->
                <h1 id="ukm_kpj">Unit Kegiatan Mahasiswa</h1>
                <!-- penjelasan -->
                <p id="ukm_pj" class="m-0">UKM adalah wadah bagi mahasiswa untuk menyalurkan bakat dan minat yang mereka
                    miliki.
                    Terdapat 31 UKM yang dapat diikuti oleh mahasiswa.
                </p>
                <button type="button" id="btnn" onclick="location.href='listUKM-LK.php'" class="btnn fourth"
                    style="margin-left:0;">Lihat</button>
            </div>
            <div class="row justify-content-end p-0">
                <div id="lk" class="col-md-8 text-white text-end p-4" style="background-color: blue; ">
                    <h1 id="lk_sgkt" class="fw-bold">LK</h1>
                    <h1 id="lk_kpj">Lembaga Kemahasiswaan</h1>
                    <p id="lk_pj" class="m-0">Dengan mengikuti LK, mahasiswa dapat mencari pengalaman berorganisasi
                        serta melatih soft skill.</p>
                    <button type="button" id="btnn" onclick="location.href='listUKM-LK.php'" class="btnn fourth"
                        style="float: right; margin-right:0;">Lihat</button>
                </div>
            </div>
        </div>
        <div id="contact" class="container row d-flex flex-column mx-auto justify-content-center my-4"
            style="height:100vh;">
            <center>
                <h1 class="mb-3" id="contact_title">Contact Us</h1>
                <div class="row justify-content-center">
                    <a id="contact_link" class="col-lg-3 text-center mx-2 my-2 p-2" href="https://lin.ee/OraOz3R"
                        target="_blank" role="button">
                        <i class="fa-brands fa-line fa-3x mx-2"></i>
                        <p class="fs-4 fw-semibold m-0">@736bnmte</p>
                    </a>
                    <a id="contact_link" class="col-lg-3 text-center mx-2 my-2 p-2"
                        href="https://instagram.com/openhouse.pcu" target="_blank" role="button">
                        <i class="fa-brands fa-instagram fa-3x mx-2"></i>
                        <p class="fs-4 fw-semibold m-0">openhouse.pcu</p>
                    </a>
                </div>
            </center>

        </div>
    </div>


</body>
<!-- <script src=" https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/gsap.min.js">
            </script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollTrigger/1.0.5/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/TextPlugin.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12/dist/gsap.min.js"></script>
<script src="js/main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
<?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 0) {
            echo 'swal("Success","Pendaftaran anda telah berhasil","success")';
        } else if ($_GET['status'] == 1) {
            echo 'swal("Error","Leaderboard hanya bisa digunakan oleh mahasiswa baru","error")';
        }
        ;
    }



    ?>
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
// MODAL UNTUK REGIST IN DAN REGIST OUT OPEN HOUSE 2023 
// Swal.fire({
//     html: `<h1 class="text-start"><center><a href=\'https://petra.id/PreTestOpenHouse2023\' target="blank">Regist In</a></center></h1>`,
//     showCloseButton: true,
//     confirmButtonText: "Regist In",
//     confirmButtonColor: "red"
// });

// Swal.fire({
//     title: 'Regist In',
//     text: "Bagi yang belum regist in, silakan regist in terlebih dahulu.",
//     icon: 'warning',
//     showCloseButton: true,
//     confirmButtonColor: '#3085d6',
//     confirmButtonText: 'Link Regist In'
// }).then((result) => {
//     if (result.isConfirmed) {
//         window.open('https://petra.id/PreTestOpenHouse2023', '_blank');
//     }
// });

// Swal.fire({
//     title: 'Absensi',
//     text: "Bagi yang belum regist in maupun regist out, silakan klik link di bawah.",
//     icon: 'warning',
//     showCloseButton: true,
//     confirmButtonColor: '#3085d6',
//     cancelButtonColor: '#3085d6',
//     confirmButtonText: 'Link Regist In',
//     showCancelButton: true,
//     cancelButtonText: 'Link Regist Out'
// }).then((result) => {
//     if (result.isConfirmed) {
//         window.open('https://petra.id/PreTestOpenHouse2023', '_blank');
//     } else if (result.dismiss === Swal.DismissReason.cancel) {
//         // Code inside this block will run when the cancel button (close button) is clicked
//         window.open('https://petra.id/PostTestOpenHouse2023', '_blank');
//     }
// });


// Swal.fire({
//     html: `<h1 class="text-start"><center><a href=\'https://petra.id/PostTestOpenHouse2023\' target="blank">Click here for Regist Out</a></center></h1>`,
//     confirmButtonText: "Submit",
//     confirmButtonText: "Close",
//     confirmButtonColor: "red"
// }); 
</script>

</html>