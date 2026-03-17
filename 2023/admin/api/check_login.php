<?php
require "connect.php";

$local = true;
$imap = false;
$loginValid = false;

$kategori = '';

$nrp = strtolower($_POST['nrp']);
$user = strtolower($_POST['nrp']);

$pass = $_POST["password"];

$sql = "SELECT * from lk where nama_lk='" . $user . "'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
if ($row != null) {
    if ($local == false) {
        if ($row['password'] == $pass) {
            $imap = true;
            $kategori = 'lk';
        }
    } else {
        $imap = true;
        $kategori = 'lk';
    }
}

$sql = "SELECT * from ukm where nama_ukm='" . $user . "'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
if ($row != null) {
    if ($local == false) {
        if ($row['password'] == $pass) {
            $imap = true;
            $kategori = 'ukm';
        }
    } else {
        $imap = true;
        $kategori = 'ukm';
    }
}



$sql = "SELECT * FROM panitia WHERE nrp='$nrp'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

if ($row != null) {
    if ($local == false) {
        $timeout = 30;
        $fp = fsockopen($host = 'john.petra.ac.id', $port = 110, $errno, $errstr, $timeout);
        $errstr = fgets($fp);

        if (substr($errstr, 0, 1) == '+') {
            fputs($fp, "USER " . $user . "\n");
            $errstr = fgets($fp);
            if (substr($errstr, 0, 1) == '+') {
                fputs($fp, "PASS " . $pass . "\n");
                $errstr = fgets($fp);
                if (substr($errstr, 0, 1) == '+') {
                    $imap = true;
                }
            }
        }
    } else {
        echo "masuk";
        $imap = true;
    }
    $kategori = 'panitia';
}

if ($user == "rekapoh") {
    if ($pass == "rekapOH2023") {
        $imap = true;
        $kategori = 'bem';
    }
}

if ($imap) {
    $_SESSION["nrp"] = $user;
    if ($kategori == 'panitia') {
        $_SESSION['nama'] = $row['nama_lengkap'];
    } else {
        $_SESSION['nama'] = $user;
    }
    $_SESSION["kategori"] = $kategori;
    if ($kategori != "bem") {
        header("Location: ../dashboard/index.php");
    } else {
        header("Location: ../dashboard/list_semua_pendaftar.php");
    }
} else {
    header("Location: ../?status=1");
}
// $conn->close();

// die();
