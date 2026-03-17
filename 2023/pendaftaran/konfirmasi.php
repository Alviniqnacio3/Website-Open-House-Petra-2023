<?php
    include 'api/connect.php';
    include 'api/session_check.php';
    $sql = "SELECT * FROM `pendaftar` WHERE nrp='".$_SESSION['nrp']."'";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($query);
    // if ($data!=null){
    //     if ($data['ktm']==null && $data['chart']==null && $data['skkk']==null && $data['kecurangan']==null){
    //         // header("Location: kebutuhan_data.php");
    //         header("Location: pengenalan.php?status=close");
    //     }else{
    //         $sql = "SELECT * FROM `jadwal_openreg` WHERE nrp_pendaftar = '".$_SESSION['nrp']."' ";
    //         $query = mysqli_query($con,$sql);
    //         $data2 = mysqli_fetch_array($query);
    //         if($data2==null){
    //             header("Location: pilih_jadwal.php");
    //         }else{
    //             // header("Location: konfirmasi.php");
    //         }
    //     }
    // }else{
    //     // header("Location: data_peserta.php");
    //     header("Location: pengenalan.php?status=close");

    // }
    header("Location: pengumuman.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi | OPENHOUSE 2023</title>
    <link rel="icon" type="image/x-icon" href="../asset/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <link href="pendaftaran.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- <script src="../user/js/session_check.js"></script> -->
</head>

<body>
    <nav id="nav" class="navbar navbar-expand-lg sticky-top bg-light" style="height: max-content;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <span class="navbar-brand mx-3 h1" id="logo">Open House 2023</span>
            </a>
            <button class="navbar-toggler my-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end bg-light" id="navbarCollapse">
                <div class="navbar-nav">
                    <a style="user-select: none;" class="nav-link px-3 rounded" href="api/logout.php">Log Out</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- bg -->
    <div id='stars'></div>
    <div id='stars2'></div>
    <div id='stars3'></div>
    <section class="vh-100">
        <div class="container h-100 px-4">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="row ">
                    <div class="col-lg-7 mx-auto" id="table">
                        <div class="card mt-2 mx-auto p-4">
                            <div class="card-body">
                                <div class=" text-center mt-3 mb-5 ">
                                    <h1>Jadwal Wawancara</h1>
                                </div>
                                <div class="container">
                                    <table class="table">
                                        <tbody>
                                            <?php
                                        $sql = "SELECT * FROM jadwal_openreg
                                        LEFT JOIN panitia ON panitia.nrp = jadwal_openreg.nrp_panit
                                        WHERE nrp_pendaftar = '".$_SESSION['nrp']."'";
                                        $query = mysqli_query($con,$sql);
                                        $result = mysqli_fetch_array($query);
                                        
                                        $pewawancara = $result['nama_samaran'];
                                        $line = $result['line'];
                                        $tanggal = $result['hari_tanggal'];
                                        if ($tanggal=="2022-12-17"){
                                            $tanggal = "Sabtu, 17 Desember 2022";
                                        }else if ($tanggal=="2022-12-19"){
                                            $tanggal = "Senin, 19 Desember 2022";
                                        }else if ($tanggal=="2022-12-20"){
                                            $tanggal = "Selasa, 20 Desember 2022";
                                        }else if ($tanggal=="2022-12-21"){
                                            $tanggal = "Rabu, 21 Desember 2022";
                                        }
                                        $jam = $result['jam'];
                                        $time = '';
                                        // if ($jam=='09:00:00'){
                                        //     $time = '09:00-10:00';
                                        // }else if ($jam=='10:00:00'){
                                        //     $time = '10:00-11.00';
                                        // }else if ($jam=='11:00:00'){
                                        //     $time = '11:00-12:00';
                                        // }else if ($jam=='12:00:00'){
                                        //     $time = '12:00-13:00';
                                        // }else if ($jam=='13:00:00'){
                                        //     $time = '13:00-14:00';
                                        // }else if ($jam=='14:00:00'){
                                        //     $time = '14:00-15:00';
                                        // }else if ($jam=='15:00:00'){
                                        //     $time = '15:00-16:00';
                                        // }else if ($jam=='16:00:00'){
                                        //     $time = '16:00-17:00';
                                        // }
                                        $meet = $result['meet'];
                                        if($pewawancara==null){
                                            $pewawancara = "onsite";
                                        }

                                        if($line==null){
                                            $line = "onsite";
                                        }

                                        if($meet==null){
                                            $meet = "onsite";
                                        }
                                    ?>
                                            <tr>
                                                <td>Pewawancara </td>
                                                <td>: </td>
                                                <td class="text-break"> <?php echo $pewawancara ?></td>
                                            </tr>
                                            <tr>
                                                <td>ID Line </td>
                                                <td>: </td>
                                                <td> <?php echo $line ?></td>
                                            </tr>
                                            <tr>
                                                <td>Hari, Tanggal </td>
                                                <td>: </td>
                                                <!-- ex: Senin, 14-11-2022 -->
                                                <td> <?php echo $tanggal?></td>
                                            </tr>
                                            <tr>
                                                <td>Jam </td>
                                                <td>: </td>
                                                <!-- ex: 12:00 -->
                                                <td> <?php echo $jam ?></td>
                                            </tr>
                                            <tr>

                                                <td>Link Meet </td>
                                                <td>: </td>
                                                <!-- <td><a href="" class="text-break"></a></td> -->
                                                <td> <a href="<?php echo $meet?>"
                                                        class="text-break"><?php echo $meet ?></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p class="text-center">Good Luck!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <script src="../user/js/logout.js"></script>
</body>

</html>