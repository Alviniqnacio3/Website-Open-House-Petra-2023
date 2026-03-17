<?php
    include 'api/connect.php';
    include 'api/session_check.php';
    $sql = "SELECT * FROM `pendaftar` WHERE nrp='".$_SESSION['nrp']."'";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($query);
    // if ($data!=null){
    //     if ($data['ktm']==null && $data['chart']==null && $data['skkk']==null && $data['kecurangan']==null){
    //         header("Location: kebutuhan_data.php");
    //     }else{
    //         $sql = "SELECT * FROM `jadwal_openreg` WHERE nrp_pendaftar = '".$_SESSION['nrp']."' ";
    //         $query = mysqli_query($con,$sql);
    //         $data2 = mysqli_fetch_array($query);
    //         if($data2==null){
    //             // header("Location: pilih_jadwal.php");
    //             header("Location: pengenalan.php?status=close");

    //         }else{
    //             header("Location: konfirmasi.php");
    //         }
    //     }
    // }else{
    //     header("Location: data_peserta.php");
    // }
    header("Location: pengumuman.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Jadwal | OPENHOUSE 2023</title>
    <link rel="icon" type="image/x-icon" href="../asset/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <link href="pendaftaran.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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

    <div class="container py-5 px-4">
        <div class="row ">
            <div class="col-lg-7 mx-auto">
                <div class="card mt-2 mx-auto p-4">
                    <div class="card-body">
                        <div class=" text-center my-3 ">
                            <h1>Pilih Jadwal Wawancara</h1>
                        </div>
                        <center>
                        <!-- <input name="onsite" id="onsite" onclick="hover(this.id)" type="submit" class="btn btn-outline-primary btn-send  pt-2 btn-block" value="Onsite">
                        <input name="online" id="online"  onclick="hover(this.id)" type="submit" class="btn btn-outline-primary btn-send  pt-2 btn-block" value="Online"> -->
                        </center>
                        <!-- <div id='containerOnsite' class="container" hidden>
                            <form action="api/submit_pilih_jadwal.php?status=onsite" method="POST" id="contact-form" role="form" class="needs-validation" novalidate>
                                <center>
                                    <p class="fs-5 my-2">Untuk pendaftaran onsite dapat langsung ke booth yang ada di gedung W</p>
                                    <p class="fs-5 fw-bold text-danger">Open Booth : Rabu-Jumat (7-9 Juni) jam 10-17 </p>
                                    <p class="text-center text-danger my-4">Note: Setelah mensubmit silahkan menghubungi Oficial Account Line dari Open House untuk menentukan jam wawancara</p>
                                    <input name="submit" onclick="" type="submit" class="btn btn-outline-primary btn-send  pt-2 btn-block" value="Submit">
                                <center>                            
                            </form>
                        </div> -->


                        <div id='containerOnline' class="container">
                            <form action="api/submit_pilih_jadwal.php" method="POST" id="contact-form" role="form" class="needs-validation" novalidate>
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group my-2">
                                                <label for="tanggal">Pilih Tanggal</label>
                                                <select id="tanggal" onchange="cekjam()" name="tanggal" class="form-select" required>
                                                    <option value="" selected hidden>Pilih Tanggal</option>
                                                    <?php
                                                    date_default_timezone_set('Asia/Jakarta');
                                                    $str = strtotime("10:30pm April 15 2014");
                                                    $date = date('a',$str);
                                                    $jam = date('h',$str);
                                                    // echo $date;
                                                    // echo $jam;  
                                                    

                                                    $sql = "SELECT count(*) FROM `jadwal_openreg` 
                                                    JOIN panitia ON panitia.nrp = jadwal_openreg.nrp_panit
                                                    WHERE status=0 AND panitia.divisi ='".$data['divisi1']."'
                                                    ORDER BY hari_tanggal"; 
                                                    $result = mysqli_query($con,$sql);
                                                    $row = mysqli_fetch_array($result);
                                                    
                                                    
                                                    // if ($date == 'pm'){
                                                    //     if ($jam < 6){
                                                    //         // jam 6 sore kurang
                                                    //         if($row > 5){
                                                    //             $sql = "SELECT distinct hari_tanggal FROM `jadwal_openreg` 
                                                    //             JOIN panitia ON panitia.nrp = jadwal_openreg.nrp_panit
                                                    //             WHERE status=0 AND panitia.divisi ='".$data['divisi1']."' AND hari_tanggal > now() + interval 1 day
                                                    //             ORDER BY hari_tanggal";
                                                    //             $temp = 0;
                                                    //         }else{
                                                    //             $sql = "SELECT distinct hari_tanggal FROM `jadwal_openreg` 
                                                    //             JOIN panitia ON panitia.nrp = jadwal_openreg.nrp_panit
                                                    //             WHERE status=0 AND (panitia.divisi ='".$data['divisi1']."' OR panitia.divisi='".$data['divisi2']."') AND hari_tanggal > now() + interval 1 day
                                                    //             ORDER BY hari_tanggal";
                                                    //             $temp = 1;
                                                    //         }
                                                            

                                                    //     }else{
                                                    //         $str = strtotime("June 10 2023");
                                                    //         // jam 6 sore lebih
                                                    //         if(date("Y-m-d",$str)==date("Y-m-d")){//hari sabtu
                                                    //             if($row > 5){
                                                    //                 $sql = "SELECT distinct hari_tanggal FROM `jadwal_openreg` 
                                                    //                 JOIN panitia ON panitia.nrp = jadwal_openreg.nrp_panit
                                                    //                 WHERE status=0 AND panitia.divisi ='".$data['divisi1']."' AND hari_tanggal > now() + interval 1 day
                                                    //                 ORDER BY hari_tanggal";
                                                    //                 $temp = 0;
                                                    //             }else{
                                                    //                 $sql = "SELECT distinct hari_tanggal FROM `jadwal_openreg` 
                                                    //                 JOIN panitia ON panitia.nrp = jadwal_openreg.nrp_panit
                                                    //                 WHERE status=0 AND (panitia.divisi ='".$data['divisi1']."' OR panitia.divisi='".$data['divisi2']."') AND hari_tanggal > now() + interval 1 day
                                                    //                 ORDER BY hari_tanggal";
                                                    //                 $temp = 1;
                                                    //             }
                                                    //         }else{
                                                    //             if($row > 5){
                                                    //                 $sql = "SELECT distinct hari_tanggal FROM `jadwal_openreg` 
                                                    //                 JOIN panitia ON panitia.nrp = jadwal_openreg.nrp_panit
                                                    //                 WHERE status=0 AND panitia.divisi ='".$data['divisi1']."' AND hari_tanggal > now() + interval 2 day
                                                    //                 ORDER BY hari_tanggal";
                                                    //                 $temp = 0;
                                                    //             }else{
                                                    //                 $sql = "SELECT distinct hari_tanggal FROM `jadwal_openreg` 
                                                    //                 JOIN panitia ON panitia.nrp = jadwal_openreg.nrp_panit
                                                    //                 WHERE status=0 AND (panitia.divisi ='".$data['divisi1']."' OR panitia.divisi='".$data['divisi2']."') AND hari_tanggal > now() + interval 2 day
                                                    //                 ORDER BY hari_tanggal";
                                                    //                 $temp = 1;
                                                    //             }
                                                    //         }
                                                    //     }
                                                
                                                    // }else{
                                                    //     //pagi siang
                                                    //     if($row > 5){
                                                    //         $sql = "SELECT distinct hari_tanggal FROM `jadwal_openreg` 
                                                    //         JOIN panitia ON panitia.nrp = jadwal_openreg.nrp_panit
                                                    //         WHERE status=0 AND panitia.divisi ='".$data['divisi1']."' AND hari_tanggal > now() + interval 1 day
                                                    //         ORDER BY hari_tanggal";
                                                    //         $temp = 0;
                                                    //     }else{
                                                    //         $sql = "SELECT distinct hari_tanggal FROM `jadwal_openreg` 
                                                    //         JOIN panitia ON panitia.nrp = jadwal_openreg.nrp_panit
                                                    //         WHERE status=0 AND (panitia.divisi ='".$data['divisi1']."' OR panitia.divisi='".$data['divisi2']."') AND hari_tanggal > now() + interval 1 day
                                                    //         ORDER BY hari_tanggal";
                                                    //         $temp = 1;
                                                    //     }
                                                    // }
                                                    $sql = "SELECT DISTINCT hari_tanggal
                                                    FROM `jadwal_openreg`
                                                    JOIN panitia ON panitia.nrp = jadwal_openreg.nrp_panit
                                                    WHERE status=0 AND CAST((CAST(hari_tanggal AS DATETIME)+jam) AS DATETIME) > now() + INTERVAL 1 hour
                                                    ORDER BY hari_tanggal";

                                                    $result = mysqli_query($con,$sql);
                                                    while($row = mysqli_fetch_array($result)){
                                                        $tanggal = "";
                                                        if ($row[0]=="2023-06-06"){
                                                            $tanggal = "Selasa, 6 Juni 2023";
                                                        }else if ($row[0]=="2023-06-07"){
                                                            $tanggal = "Rabu, 7 Juni 2023";
                                                        }else if ($row[0]=="2023-06-08"){
                                                            $tanggal = "Kamis, 8 Juni 2023";
                                                        }else if ($row[0]=="2023-06-09"){
                                                            $tanggal = "Jumat, 9 Juni 2023";
                                                        }else if ($row[0]=="2023-06-10"){
                                                            $tanggal = "Sabtu, 10 Juni 2023";
                                                        }else if ($row[0]=="2023-06-11"){
                                                            $tanggal = "Minggu, 11 Juni 2023";
                                                        }else if ($row[0]=="2023-06-12"){
                                                            $tanggal = "Senin, 12 Juni 2023";
                                                        }
                                                        echo "<option value='".$row[0]."'>".$tanggal."</option>";
                                                    }
                                                    $sql = "SELECT DISTINCT hari_tanggal
                                                    FROM `jadwal_openreg`
                                                    JOIN panitia ON panitia.nrp = jadwal_openreg.nrp_panit
                                                    WHERE status=0 AND CAST((CAST(hari_tanggal AS DATETIME)+jam) AS DATETIME) > now() + INTERVAL 1 hour
                                                    ORDER BY hari_tanggal";

                                                    $result = mysqli_query($con,$sql);
                                                    $row = mysqli_fetch_array($result);
                                                    if ($row==null){
                                                        echo "<option value=''>Slot Habis, Silahkan menghubungi Official Account Line dari Open House</option>";
                                                    }

                                                    

                                                    ?>
                                                </select>
                                                <div class="invalid-feedback">Tanggal belum dipilih!</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group my-2">
                                                <label for="jam">Pilih Jam</label>
                                                <select id="jam" name="jam" class="form-select" required>
                                                    <option value="" selected disabled>Pilih Jam</option>
                                                    
                                                </select>
                                                <div class="invalid-feedback">Jam belum dipilih!</div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-center text-danger my-4">NOTE : Data yang telah di submit tidak dapat di edit lagi, pastikan data anda sudah benar!</p>
                                    <center>
                                        <div class="col-md-12 mt-4">
                                            <input name="submit" onclick="" type="submit" class="btn btn-outline-primary btn-send  pt-2 btn-block"
                                                value="Submit">
                                        </div>
                                    </center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="../user/js/submit_pilih_jadwal.js"></script>
    <script src="../user/js/logout.js"></script>
    <script src="../user/js/cekjam.js"></script> -->


    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
        })
    })()

    function hover(id){
        console.log(id) 
        if (id == 'onsite'){
            $("#containerOnline").attr("hidden", true);
            $("#containerOnsite").attr("hidden", false);
        }else if (id == 'online'){
            $("#containerOnline").attr("hidden", false);
            $("#containerOnsite").attr("hidden", true);
        }
    }

    function cekjam(){
        var tanggal = $('#tanggal').val()
        var sql = "SELECT DISTINCT jam FROM `jadwal_openreg` JOIN panitia ON panitia.nrp = jadwal_openreg.nrp_panit WHERE status=0 AND hari_tanggal = '"+tanggal+"' AND CAST((CAST(hari_tanggal AS DATETIME)+jam) AS DATETIME) > now() + INTERVAL 1 hour ORDER BY jam";

        // if (temp == 0){
        //     var sql = "SELECT distinct jam FROM `jadwal_openreg` JOIN panitia ON panitia.nrp = jadwal_openreg.nrp_panit WHERE `status`=0 AND hari_tanggal = '"+tanggal+"' AND (panitia.divisi ='<?php echo $data['divisi1'];?>') ORDER BY jam";
        // }else{
        //     var sql = "SELECT distinct jam FROM `jadwal_openreg` JOIN panitia ON panitia.nrp = jadwal_openreg.nrp_panit WHERE `status`=0 AND hari_tanggal = '"+tanggal+"' AND (panitia.divisi ='<?php echo $data['divisi1'];?>' OR panitia.divisi='<?php echo $data['divisi2'];?>') ORDER BY jam";
            
        // }
        console.log(sql);

        $('.remove').remove()

        $.ajax({
            url : 'api/cekjam.php',
            method : 'GET',
            data : {tanggal: tanggal, sql: sql},
            success: function(data){
                console.log(data);
                data = JSON.parse(data);
                data.forEach(function(hasil){
                    console.log(hasil)
                    time = ''
                    if (hasil[0]=='09:00:00'){
                        time = '09:00-10:00'
                    }else if (hasil[0]=='10:00:00'){
                        time = '10:00-11.00'
                    }else if (hasil[0]=='11:00:00'){
                        time = '11:00-12:00'
                    }else if (hasil[0]=='12:00:00'){
                        time = '12:00-13:00'
                    }else if (hasil[0]=='13:00:00'){
                        time = '13:00-14:00'
                    }else if (hasil[0]=='14:00:00'){
                        time = '14:00-15:00'
                    }else if (hasil[0]=='15:00:00'){
                        time = '15:00-16:00'
                    }else if (hasil[0]=='16:00:00'){
                        time = '16:00-17:00'
                    }else if (hasil[0]=='17:00:00'){
                        time = '17:00-18:00'
                    }else if (hasil[0]=='18:00:00'){
                        time = '18:00-19:00'
                    }else if (hasil[0]=='19:00:00'){
                        time = '19:00-20:00'
                    }else if (hasil[0]=='20:00:00'){
                        time = '20:00-21:00'
                    }
                    var row = $("<option value= '"+hasil[0]+"' class = 'remove'>"+time+"</option> ");
                    $('#jam').append(row);
                });
            }
        });
    }
    </script>
</body>

</html>