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
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ | Open House 2023</title>
    <link rel="icon" type="image/x-icon" href="../asset/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="css/faqpage.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>

    <?php
    include 'header.php';
    ?>

    <div class="container-fluid body-faq">
        <h1 id="faq" class="d-flex justify-content-center mb-4">Frequently Asked Questions</h1>
        <center>
            <div class="accordion col-md-8" id="accordionExample">
                <div class="accordion-item border-start-0 border-end-0 border-top-0">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <strong>Bagaimana cara mendaftar UKM?</strong>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-break text-start">
                            Untuk cara mendaftar UKM dapat dilihat di : <br>
                            <a href="panduan.php"
                                target="_blank">Panduan Daftar UKM</a>
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-start-0 border-end-0">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <strong>Apakah hanya boleh daftar 1 UKM?</strong>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-break text-start">
                            Tidak, kalian boleh daftar lebih dari 1 UKM asal jadwalnya tidak bertabrakan.
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item border-start-0 border-end-0">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapseTwo">
                            <strong>Apakah UKM Fitness ada?</strong>
                        </button>
                    </h2>
                    <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-break text-start">
                            Tidak ada. <br>
                            UKM Fitness dan UKM lain yg tidak ada di website openhouse tidak termasuk UKM resmi periode tahun 2023-2024.
                        </div>
                    </div>
                </div>

            </div>
        </center>

    </div>

    <script>
    // sebagai variabel tinggi navbar
    var navbar = document.querySelector(".header");

    var navbarHeight = navbar.offsetHeight;

    document.documentElement.style.setProperty('--navbar-height', navbarHeight + 'px');

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