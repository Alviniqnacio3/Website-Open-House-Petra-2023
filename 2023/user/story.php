<?php
// include "loader.php"; 
// include "header.php";
include "./api/connect.php";
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Story | Open House 2023</title>
    <link rel="icon" type="image/x-icon" href="../asset/favicon.png">
    <link rel="stylesheet" href="css/story.css">
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
</head>

<body>
    <div class="container align-items-center justify-content-center px-3" style="margin-top: 150px;">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-9 my-2">
                <div class="row align-items-top justify-content-center">
                    <div class="col-2 col-md-1 mt-2" style=" padding-right:0">
                        <img id="i1" src="../asset/astro.png" alt="" class="rounded-circle"
                            style="max-width: 100%; background-color:#F8BB8C;">
                    </div>
                    <div class="col-10 col-md-11 my-2 px-3">
                        <h5 id="h1" class="px-3"></h5>
                        <div id="c1" class="chat p-3">
                            <p id="p1" class="fs-5 m-0"></p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-top justify-content-center">
                    <div class="col-2 col-md-1 mt-2" style=" padding-right:0">
                        <img id="i2" src="../asset/Logo Warna.png" alt="" class="rounded-circle"
                            style="max-width: 100%; background-color:#CAB6FF;">
                    </div>
                    <div class="col-10 col-md-11 my-2 px-3">
                        <h5 id="h2"></h5>
                        <div id="c2" class="chat p-3">
                            <p id="p2" class=" fs-5 m-0"></p>
                        </div>
                    </div>
                </div>
                <div class="row d-flex align-items-top justify-content-center">
                    <div class="col-2 col-md-1 mt-2" style=" padding-right:0">
                        <img id="i3" src="../asset/astro.png" alt="" class="rounded-circle"
                            style="max-width: 100%; background-color:#F8BB8C;">
                    </div>
                    <div class="col-10 col-md-11 my-2 px-3">
                        <h5 id="h3"></h5>
                        <div id="c3" class="chat p-3">
                            <p id="p3" class="fs-5 m-0"></p>
                        </div>
                    </div>
                </div>
                <div class="row d-flex align-items-top justify-content-center">
                    <div class="col-2 col-md-1 mt-2" style=" padding-right:0">
                        <img id="i4" src="../asset/Logo Warna.png" alt="" class="rounded-circle"
                            style="max-width: 100%; background-color:#CAB6FF;">
                    </div>
                    <div class="col-10 col-md-11 my-2 px-3">
                        <h5 id="h4"></h5>
                        <div id="c4" class="chat p-3">
                            <p id="p4" class=" fs-5 m-0"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 my-2">
                <img id="planet1" src="../asset/planet 1.png" alt="" style="max-width: 100%;">
            </div>

        </div>

        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-3 my-2" id="img-desktop">
                <img id="planet2-1" src="../asset/planet 2.png" alt="" style="max-width: 100%;">
            </div>
            <div class="col-md-9">
                <div class="row d-flex align-items-top justify-content-center">
                    <div class="col-2 col-md-1 mt-2" style=" padding-right:0">
                        <img id="i5" src="../asset/astro.png" alt="" class="rounded-circle"
                            style="max-width: 100%; background-color:#F8BB8C;">
                    </div>
                    <div class="col-10 col-md-11 my-2 px-3">
                        <h5 id="h5"></h5>
                        <div id="c5" class="chat p-3">
                            <p id="p5" class="fs-5 m-0"></p>
                        </div>
                    </div>
                </div>
                <div class="row d-flex align-items-top justify-content-center">
                    <div class="col-2 col-md-1 mt-2" style=" padding-right:0">
                        <img id="i6" src="../asset/Logo Warna.png" alt="" class="rounded-circle"
                            style="max-width: 100%; background-color:#CAB6FF;">
                    </div>
                    <div class="col-10 col-md-11 my-2 px-3">
                        <h5 id="h6"></h5>
                        <div id="c6" class="chat p-3">
                            <p id="p6" class=" fs-5 m-0"></p>
                        </div>
                    </div>
                </div>
                <div class="row d-flex align-items-top justify-content-center">
                    <div class="col-2 col-md-1 mt-2" style=" padding-right:0">
                        <img id="i7" src="../asset/astro.png" alt="" class="rounded-circle"
                            style="max-width: 100%; background-color:#F8BB8C;">
                    </div>
                    <div class="col-10 col-md-11 my-2 px-3">
                        <h5 id="h7"></h5>
                        <div id="c7" class="chat p-3">
                            <p id="p7" class="fs-5 m-0"></p>
                        </div>
                    </div>
                </div>
                <div class="row d-flex align-items-top justify-content-center">
                    <div class="col-2 col-md-1 mt-2" style=" padding-right:0">
                        <img id="i8" src="../asset/Logo Warna.png" alt="" class="rounded-circle"
                            style="max-width: 100%; background-color:#CAB6FF;">
                    </div>
                    <div class="col-10 col-md-11 my-2 px-3">
                        <h5 id="h8"></h5>
                        <div id="c8" class="chat p-3">
                            <p id="p8" class=" fs-5 m-0"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 my-2" id="img-mobile">
                <img id="planet2-2" src="../asset/planet 2.png" alt="" style="max-width: 100%;">
            </div>
        </div>

        <div class="d-flex justify-content-center my-4">
            <button type="button" id="btnn" onclick="location.href='listUKM-LK.php'" class="btnn fourth">Lanjut</button>
        </div>
    </div>

</body>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollTrigger/1.0.5/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/TextPlugin.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12/dist/gsap.min.js"></script>
<script src="js/story.js"></script>

</html>