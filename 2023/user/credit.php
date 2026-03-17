<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Credit | Open House 2023</title>
    <link rel="icon" type="image/x-icon" href="../asset/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Demo styles -->
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap');

    * {
        font-family: 'Montserrat', sans-serif;
    }

    body {
        background-image: url(../asset/bg_ukmlk.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        /* background-position: center center; */
        background-position-y: top;
        background-position-x: center;
    }

    /* @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    } */

    html,
    body {
        position: relative;
        height: 100%;
    }

    body {
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .swiper {
        width: 100vw;
        height: 100vh;
    }

    .swiper_card {
        width: 300px;
        height: 320px;
    }

    .swiper-slide {
        display: flex;
        align-items: center;
        justify-content: center;
        /* border-radius: 18px; */
        font-size: 22px;
        font-weight: bold;
        color: #fff;
    }

    #s1 {
        position: relative;
    }

    .overlay {
        justify-content: center;
        text-align: center;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        font-size: 40px;
    }

    .overlay-back {
        position: fixed;
        right: 50px;
        bottom: 50px;
        z-index: 99;
        justify-content: center;
        text-align: center;
    }

    .overlay h1 {
        top: 15%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        position: absolute;
        margin: 0;
        color: #FDCB00;
        text-shadow: 1px 1px 15px #27946D, 1px 1px 15px #27946D;
        white-space: nowrap;
    }

    /* media query for tablet devices */
    @media (max-width: 1023px) {
        .overlay {
            font-size: 30px;
        }

        .overlay h1 {
            top: 20%;
        }
    }

    /* media query for mobile devices */
    @media (max-width: 767px) {
        .swiper_card {
            width: 240px;
            height: 320px;
        }

        .overlay {
            font-size: 20px;
        }

        .overlay h1 {
            top: 20%;
        }

        .overlay-back {
            position: fixed;
            right: 0;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            bottom: 50px;
            z-index: 99;
        }
    }

    /* height < 800 */
    @media (max-height: 800px) and (max-width: 767px) {
        .overlay-back {
            position: fixed;
            right: 0;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            bottom: 0;
            z-index: 99;
        }
    }

    .button {
        border-radius: 15px;
        background-color: #27946D;
        border: none;
        color: #FDCB00;
        text-align: center;
        font-size: 20px;
        padding: 20px;
        width: 150px;
        transition: all 0.5s;
        cursor: pointer;
        margin: 5px;
    }

    .button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
    }

    .button span:after {
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 448 512'%3E%3C!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --%3E%3Cstyle%3Esvg%7Bfill:%23fdcb00%7D%3C/style%3E%3Cpath d='M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z'/%3E%3C/svg%3E");
        position: absolute;
        opacity: 0;
        top: 0;
        left: -20px;
        transition: 0.5s;
    }

    .button:hover span {
        padding-left: 25px;
    }

    .button:hover span:after {
        opacity: 1;
        left: 0;
    }
    </style>
</head>

<body>
    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="overlay-back">
            <!-- <i class="fa-solid fa-arrow-left" type="button" onclick="location.href='listUKM-LK.php'"></i> -->
            <button class="button" onclick="location.href='main.php'"><span>Home</span></button>
        </div>
        <div class="swiper-wrapper">
            <div id="s1" class="swiper-slide">
                <div class="overlay">
                    <!-- <i class="fa-solid fa-arrow-left" type="button" onclick="location.href='listUKM-LK.php'"></i> -->
                    <h1>BPH & SC</h1>
                </div>
                <div class="swiper_card card_div">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/BPH-Joshua Yordana.png" alt="" style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/BPH-Sentanu Chandra .png" alt="" style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/BPH-Tirza Ivena.png" alt="" style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/SC-Ester Joice .png" alt="" style="width:100%; height:100%"></div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/SC-Filvia Eugenia .png" alt="" style="width:100%; height:100%">
                        </div>
                    </div>
                </div>
            </div>

            <div id="s1" class="swiper-slide">
                <div class="overlay">
                    <!-- <i class="fa-solid fa-arrow-left" type="button" onclick="location.href='listUKM-LK.php'"></i> -->
                    <h1>IT</h1>
                </div>
                <div class="swiper_card card_div">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/IT - Alvin Iqnacio.png" alt="" style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/IT - Alexander Louiz Tanadi.png" alt=""
                                style="width:100%; height:100%"></div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/IT - Charles Wijaya.png" alt="" style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/IT - James Berlin Tungka.png" alt=""
                                style="width:100%; height:100%"></div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/IT - Mario Christopher.png" alt="" style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/IT - Richard Accita Sistwanto.png" alt=""
                                style="width:100%; height:100%">
                        </div>
                    </div>
                </div>
            </div>

            <div id="s1" class="swiper-slide">
                <div class="overlay">
                    <!-- <i class="fa-solid fa-arrow-left" type="button" onclick="location.href='listUKM-LK.php'"></i> -->
                    <h1>Event</h1>
                </div>
                <div class="swiper_card card_div">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/EVENT - Cindy Gosali.png" alt="" style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/EVENT - Felicia Febriana.png" alt=""
                                style="width:100%; height:100%"></div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/EVENT - Alexander Owen.png" alt="" style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/EVENT - Alvin Aprilianto.png" alt=""
                                style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/EVENT - Natan Kirana Tando.png" alt=""
                                style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/EVENT - Nelsen Wicaksono.png" alt=""
                                style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/EVENT - Sherin Tifani.png" alt="" style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/EVENT - Viorysca.png" alt="" style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/EVENT - Wahyu Nita Pratama.png" alt=""
                                style="width:100%; height:100%">
                        </div>
                    </div>
                </div>
            </div>

            <div id="s1" class="swiper-slide">
                <div class="overlay">
                    <!-- <i class="fa-solid fa-arrow-left" type="button" onclick="location.href='listUKM-LK.php'"></i> -->
                    <h1>Creative</h1>
                </div>
                <div class="swiper_card card_div">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/CREATIVE - JOSIA.png" alt="" style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/CREATIVE - NAOMI.png" alt="" style="width:100%; height:100%"></div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/CREATIVE - ANGEL.png" alt="" style="width:100%; height:100%"></div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/CREATIVE - AXEL.png" alt="" style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/CREATIVE - ELIS.png" alt="" style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/CREATIVE - GRACE.png" alt="" style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/CREATIVE - HELENA.png" alt="" style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/CREATIVE - SHAKA.png" alt="" style="width:100%; height:100%">
                        </div>
                    </div>
                </div>
            </div>

            <div id="s1" class="swiper-slide">
                <div class="overlay">
                    <!-- <i class="fa-solid fa-arrow-left" type="button" onclick="location.href='listUKM-LK.php'"></i> -->
                    <h1>Perlengkapan</h1>
                </div>
                <div class="swiper_card card_div">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/PERKAP - Sie Immanuel Ardiyan.png" alt=""
                                style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/PERKAP - Inne Veronica.png" alt="" style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/PERKAP - Averina Phoebe Tandiono.png" alt=""
                                style="width:100%; height:100%"></div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/PERKAP - Enrico Jonathan Setiawan.png" alt=""
                                style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/PERKAP - Frederick Silvanus.png" alt=""
                                style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/PERKAP - Jenisa Aurelia Usabeny.png" alt=""
                                style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/PERKAP - Jonathan Prawira Putra Hartono.png" alt=""
                                style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/PERKAP - Leonard Surya Tanaya.png" alt=""
                                style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/PERKAP - Margareth Tjandra.png" alt=""
                                style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/PERKAP - Richard Efrem.png" alt="" style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/PERKAP - Stefanus Vitorion Leten.png" alt=""
                                style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/PERKAP - Vincent Putra Gotama.png" alt=""
                                style="width:100%; height:100%">
                        </div>
                    </div>
                </div>
            </div>

            <div id="s1" class="swiper-slide">
                <div class="overlay">
                    <!-- <i class="fa-solid fa-arrow-left" type="button" onclick="location.href='listUKM-LK.php'"></i> -->
                    <h1>Sekretariat</h1>
                </div>
                <div class="swiper_card card_div">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/SEKRET - Jennifer Claudia Hengky.png" alt=""
                                style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/SEKRET - Ellena Arinda Luciana.png" alt=""
                                style="width:100%; height:100%"></div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/SEKRET - Audi Wibisono.png" alt="" style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/SEKRET - Caroline.png" alt="" style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/SEKRET - Irka Wulan Citra.png" alt=""
                                style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/SEKRET - Laurencia Mellyana.png" alt=""
                                style="width:100%; height:100%">
                        </div>
                        <div class="swiper-slide" style="width:max-content; height:max-content"><img
                                src="../asset/idcard/SEKRET - Tania Jessica.png" alt="" style="width:100%; height:100%">
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="swiper-pagination"></div>
    </div>


    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".card_div", {
        effect: "cards",
        grabCursor: true,
    });

    var swiper = new Swiper(".mySwiper", {
        direction: "vertical",
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
    </script>
</body>

</html>