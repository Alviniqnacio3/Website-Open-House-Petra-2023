<?php
// include "api/connect.php";

if (isset($_SESSION['nrp'])){
    if(strlen($_SESSION['nrp'])!=9){
        header("location: ../../daftar/");
    }
}else{
    header("location: ../../daftar/");
}
?>
<header class="header">
        <a href="https://openhouse.petra.ac.id/2023/user/main.php"><img src="../asset/Logo Warna.png" alt="" style="width: 60px;"></a>
        <div class="menu-btn">
            <div class="menu-btn__lines"></div>
        </div>
        <ul class="menu-items px-0">
            <li><a href="main.php" class="menu-item">Home</a></li>

            <?php 
            // $_SESSION['nrp']="c14210026";
            if (isset($_SESSION['nrp'])){
                echo '<li><a href="listUKM-LK.php" class="menu-item">UKM & LK</a></li>
                <li><a href="leaderboard.php" class="menu-item">Leaderboard</a></li>
                <li><a href="daftar.php" class="menu-item">Pendaftaran</a></li>
                <li><a href="newsUKM.php" class="menu-item">News</a></li>
                <li><a href="faqpage.php" class="menu-item">FAQ</a></li>
                <li><a href="credit.php" class="menu-item">Committee</a></li>
                <li><a href="api/logout.php" class="menu-item">Log Out</a></li>';
            }else{
                echo '<li><a href="../daftar/" class="menu-item">Log In</a></li>';
            }
            //<li><a href="newsUKM.php" class="menu-item">News</a></li>
            ?>  
        </ul>
    </header>
