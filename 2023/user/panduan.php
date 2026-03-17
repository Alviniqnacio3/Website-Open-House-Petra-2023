<?php
include 'api/connect.php';

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan Daftar | Open House 2023</title>
    <link rel="icon" type="image/x-icon" href="../asset/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="css/panduan.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <div class="container rounded-5 body-regist px-4 py-4 mb-5 text-break">
        <div class="">
            <center>
                <!-- VIDEO TUTORIAL DAFTAR (VIDEO BELUM SELESAI DI COMMENT DULU) -->
                <div class="col-12 col-sm-12 mt-5 mb-2">
                    <h3 id="title">Video Panduan Pendaftaran UKM</h3>
                </div>
                <div class="text-white text-center mb-5">
                    <video controls autoplay muted class="col-10 col-sm-10 col-md-8">
                        <source src="../asset/tutorfix.m4v" type="video/mp4">
                    </video>
                </div>

                <div class="col-12 col-sm-12 mt-3 mb-2">
                    <h3 id="guideline">Panduan Pendaftaran UKM</h3>
                    <p id="guide-text" style="color: #FBE99C;">
                        Bisa juga dilihat di :
                        <a id="guide-link" style="color: #FBE99C;"
                            href="https://drive.google.com/file/d/17EWO1FRyycBTQ41xryz5FxKk_7WX5_ry/view?usp=sharing"
                            target="_blank">petra.id/PanduanDaftarUKM</a>
                    </p>
                </div>
                <div class="col-10 col-sm-10 col-md-8 text-white text-center mb-5">
                    <iframe id="frame-doc"
                        src="https://drive.google.com/file/d/17EWO1FRyycBTQ41xryz5FxKk_7WX5_ry/preview" class="w-100"
                        allow="autoplay"></iframe>
                </div>
            </center>
        </div>
    </div>

    <script src=""></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
    Fancybox.bind("[data-fancybox]", {
        // Your custom options
    });
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
</body>

</html>