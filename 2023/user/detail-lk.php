<?php
include 'api/connect.php';

$query = "SELECT * FROM maintenance_user";
$result = $con -> query($query);
if ($result -> num_rows > 0) {
    while ($row = $result ->  fetch_assoc()) {
        if ($row["status"] === "maintenance") {
            header("Location: maintenance.php");
        }
    }
}

$lk = $_GET['lk'];
$query = "SELECT * FROM `lk` WHERE `nama_lk` LIKE '$lk'";
$lowerlk = strtolower($lk);
$queryfotolk = "SELECT * FROM `foto_kegiatan` WHERE `lk` LIKE '$lowerlk'";

$result = mysqli_query($con,$query);
$result = mysqli_fetch_assoc($result);

$resultfoto = mysqli_query($con,$queryfotolk);
$foto = mysqli_fetch_assoc($resultfoto);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail LK | Open House 2023</title>
    <link rel="icon" type="image/x-icon" href="../asset/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="css/detail.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <style>
    .swiper-slide img {
        width: 100%;
    }

    .yt {
        aspect-ratio: 16 / 9;
        width: 100%;
    }
    </style>
</head>

<body>
    <?php 
    include 'header.php';
    ?>
    <div class="container d-flex justify-content-center" style="margin-top:150px; margin-bottom:150px;">
        <div class="card rounded-5" style="background-color: #4b847d; color:#FBE99C;">
            <div class="card-body d-flex justify-content-center text-center row">
                <h1 class="card-title my-3 fw-bold"> <?php echo strtoupper($result['nama_lk']); ?>
                </h1>
                <div class="text-center">
                    <?php 
                        if($result['logo']!='' && $result['logo']!=null){
                    ?>
                        <img src="../admin/dashboard/<?php echo $result['logo']; ?>" class="rounded-circle" style="width :200px; background-color:white;" alt="...">
                    <?php }else{?>
                        <img src=" " class="rounded-circle" style="width :200px; background-color:white;" alt="...">
                    <?php };?>
                </div>
                <div class="col d-flex justify-content-end fs-3 my-3">
                    <a id="btn-visi" class="btnn fs-4 fw-bold" role="button">
                        Visi
                    </a>
                </div>
                <div class="col-6 fs-3 my-3">
                    <a id="btn-desc" class="focus btnn fs-4 fw-bold" role="button">
                        Deskripsi
                    </a>
                </div>
                <div class="col d-flex justify-content-start fs-3 my-3">
                    <a id="btn-misi" class="btnn fs-4 fw-bold" role="button">
                        Misi
                    </a>
                </div>
                <div class="isi" id="visi">
                    <div class="col-md-10 mx-auto fs-5">
                        <?php 
                            if($result['visi']!= '' && $result['visi'] != null){
                                echo nl2br($result['visi']);
                            }else{
                                echo "-";
                                
                            };
                        ?>
                    </div>
                </div>
                <div class="isi" id="desc">
                    <div class="col-md-10 mx-auto fs-5">
                        <?php 
                            if($result['deskripsi']!= '' && $result['deskripsi'] != null){
                                echo nl2br($result['deskripsi']);
                            }else{
                                echo "-";
                            };
                        ?>
                    </div>
                </div>
                <div class="isi" id="misi">
                    <div class="col-md-10 mx-auto fs-5">
                        <?php 
                            if($result['misi']!= '' && $result['misi'] != null){
                                echo nl2br($result['misi']);
                            }else{
                                echo "-";
                            };
                        ?>
                    </div>
                </div>

                <center>
                    <h4 class="mt-4 mb-1 fw-bold">Foto Kegiatan</h4>
                </center>
                <div class="container col-10 my-4">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 d-flex justify-content-center">
                        <?php
                            while($rowgambar = mysqli_fetch_assoc($resultfoto)){
                                if($rowgambar['foto'] !=null && $rowgambar['foto']!='' ){
                        ?>
                            <div class="col-md-3 d-flex align-items-center my-3">
                                <a id="foto" class="align-items-center" href="../admin/dashboard/<?php echo $rowgambar['foto']; ?>"
                                    data-fancybox="gallery" style="max-width:100%">
                                    <img src="../admin/dashboard/<?php echo $rowgambar['foto']; ?>" style="max-width:100%" />
                                </a>
                            </div>
                        <?php
                            }else{
                        ?>
                            <div class="col-md-3 d-flex align-items-center my-3">
                                <a id="foto" class="align-items-center" href=" "
                                    data-fancybox="gallery" style="max-width:100%">
                                    <img src=" " style="max-width:100%" />
                                </a>
                            </div>
                        <?php 
                            };
                        }
                        ?>
                    </div>
                </div>


                <center>
                    <h4 class="mt-4 mb-1 fw-bold">Video</h4>
                </center>
                <div class="container col-md-8 my-4">
                    <?php 
                        if($result['youtube']!= null && $result!= ''){
                            ?>
                                <iframe class="yt" src="<?php echo $result['youtube']; ?>" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                            <?php
                        }else{
                            echo "-";
                        }; 
                    ?>
                </div>

                <div class="container my-3">
                    <p class="fs-4 fw-bold">Contact</p>
                    <a href="https://instagram.com/<?php echo $result['instagram']; ?>" target="_blank" role="button"><i id="contact" class="fa-brands fa-instagram fa-3x mx-2"></i></a>
                    <a href="https://<?php echo $result['website']; ?>" target="_blank" role="button"><i id="contact" class="fa-solid fa-globe fa-3x mx-2"></i></a>
                    <a href="https://line.me/ti/p/<?php echo $result['oa']; ?>" target="_blank" role="button"><i id="contact" class="fa-brands fa-line fa-3x mx-2"></i></a>
                </div>
            </div>
        </div>
    </div>

    <script src="js/detail.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
    Fancybox.bind("[data-fancybox]", {
        // Your custom options
    });

    $('#desc').show();
    $('#visi,#misi').hide();

    $('#btn-visi').click(function() {
        $('#btn-desc').removeClass("focus");
        $('#btn-misi').removeClass("focus");
        if (!$('#btn-visi').hasClass("focus")) {
            $('#btn-visi').addClass("focus");
        }
        $('#desc').hide();
        $('#misi').hide();
        $('#visi').show();
    });
    $('#btn-desc').click(function() {
        $('#btn-visi').removeClass("focus");
        $('#btn-misi').removeClass("focus");
        if (!$('#btn-desc').hasClass("focus")) {
            $('#btn-desc').addClass("focus");
        }
        $('#visi').hide();
        $('#misi').hide();
        $('#desc').show();

    });
    $('#btn-misi').click(function() {
        $('#btn-visi').removeClass("focus");
        $('#btn-desc').removeClass("focus");
        if (!$('#btn-misi').hasClass("focus")) {
            $('#btn-misi').addClass("focus");
        }
        $('#visi').hide();
        $('#desc').hide();
        $('#misi').show();
    });
    </script>

</body>

</html>