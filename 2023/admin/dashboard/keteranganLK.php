<?php
require "../api/connect.php";
require "../api/check_integrity.php";

$query = "SELECT * FROM maintenance WHERE page = 'keteranganLK'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row["status"] === "maintenance") {
            header("location: maintenance.php");
        }
    }
}

if ($_SESSION['kategori'] == "ukm") {
    header("location: keteranganUKM.php");
} else if ($_SESSION['kategori'] == "panitia") {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Keterangan LK | Admin OPENHOUSE 2023</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
        </div>
        <!-- partial:partials/_sidebar.php -->
        <?php
        include "./partials/_sidebar.php";
        ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.php -->
            <?php
            include "./partials/_navbar.php";
            ?>

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Input keterangan LK</h4>
                                    <form class="forms-sample" action="../api/tambah_keteranganLK.php" method="post"
                                        enctype="multipart/form-data">

                                        <?php
                                        $visi = "";
                                        $misi = "";
                                        $deskripsi = "";
                                        $instagram = "";
                                        $website = "";
                                        $youtube = "";
                                        $oa = "";
                                        $lk = $_SESSION["nrp"];

                                        $query = "SELECT * FROM lk WHERE nama_lk = '$lk'";
                                        $result = $conn->query($query);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $logo = $row['logo'];
                                                $poster = $row['poster'];
                                                $visi = $row["visi"];
                                                $misi = $row["misi"];
                                                $deskripsi = $row["deskripsi"];
                                                $instagram = $row["instagram"];
                                                $oa = $row["oa"];
                                                $youtube = $row["youtube"];
                                                $website = $row["website"];
                                            }
                                        }
                                        ?>


                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Logo LK :</label>
                                                <br>
                                                <span style="font-size:12px;">Format file : JPG, JPEG, PNG (MAX 2MB)</span>
                                                <?php
                                                if ($logo == null) {
                                                    echo '<input type="file" class="form-control" id="logo" name="logo" required
                                                    accept=".jpg, .jpeg, .png">';
                                                } else {
                                                    echo '<input type="file" class="form-control" id="logo" name="logo"
                                                    accept=".jpg, .jpeg, .png">';
                                                }

                                                ?>
                                                <!-- <input type="file" class="form-control" id="logo" name="logo"
                                                    accept=".jpg, .jpeg, .png"> -->
                                                <!-- <div class="invalid-feedback">Logo belum terisi!</div> -->
                                                <script>
                                                    var file = document.getElementById('logo')
                                                    file.onchange = function(e) {
                                                        var ext = this.value.match(/\.([^\.]+)$/)[1];
                                                        console.log(ext)
                                                        switch (ext) {
                                                            case 'jpg':
                                                            case 'jpeg':
                                                            case 'png':
                                                                break;
                                                            default:
                                                                $(document).ready(function() {
                                                                    swal("Data ditolak",
                                                                        "Anda memasukan data dengan format yang salah",
                                                                        "error");
                                                                })
                                                                this.value = '';
                                                        }
                                                    };
                                                </script>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Poster :</label>
                                                <br>
                                                <span style="font-size:12px;">Format file : JPG, JPEG, PNG (MAX 2MB)</span>
                                                <?php
                                                // if($poster==null){
                                                //     echo '<input type="file" class="form-control" id="poster" name="poster"
                                                //     required accept=".jpg, .jpeg, .png">';
                                                // }else{
                                                //     echo '<input type="file" class="form-control" id="poster" name="poster"
                                                //     accept=".jpg, .jpeg, .png">';
                                                // }
                                                ?>

                                                <input type="file" class="form-control" id="poster" name="poster"
                                                    accept=".jpg, .jpeg, .png">
                                                <!-- <div class="invalid-feedback">Poster belum terisi!</div> -->
                                                <script>
                                                    var file = document.getElementById('poster')
                                                    file.onchange = function(e) {
                                                        var ext = this.value.match(/\.([^\.]+)$/)[1];
                                                        switch (ext) {
                                                            case 'jpg':
                                                            case 'jpeg':
                                                            case 'png':
                                                                break;
                                                            default:
                                                                $(document).ready(function() {
                                                                    swal("Data ditolak",
                                                                        "Anda memasukan data dengan format yang salah",
                                                                        "error");
                                                                })
                                                                this.value = '';
                                                        }
                                                    };
                                                </script>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Visi : </label>
                                            <textarea type='text' class='form-control' name='visi' placeholder='Visi LK'
                                                style='height:100px;' required><?php echo $visi ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Misi : </label>
                                            <textarea type='text' class='form-control' name='misi'
                                                placeholder=' Misi LK' style='height:100px;'
                                                required><?= $misi ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi : </label>
                                            <textarea type='text' class='form-control' name='deskripsi'
                                                placeholder='Deskripsi tentang LK' style='height:100px;'
                                                required><?= $deskripsi ?></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Instagram : </label>
                                                <input type='text' class='form-control' name='ig'
                                                    value='<?= $instagram ?>' placeholder='Instagram LK' required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Link Website LK : </label>
                                                <input type='text' class='form-control' name='link_web'
                                                    value='<?= $website ?>' placeholder='Link Website LK'>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>OA Line (jika ada) : </label>
                                                <input type='text' class='form-control' name='oa' value='<?= $oa ?>'
                                                    placeholder='OA Line'>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Link video via youtube (jika ada) : </label>
                                                <input type='text' class='form-control' name='link_yt'
                                                    value='<?= $youtube ?>' placeholder='Video UKM'>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-6 form-group">
                                <form class="forms-sample" action="../api/tambah_foto_kegiatan.php" method="post"
                                    enctype="multipart/form-data">
                                    <label>Foto Kegiatan LK: LK (Landscape, max. 5 foto) (MAX 2MB)</label>
                                    <br>
                                    <span style="font-size:12px;">Format file : JPG, JPEG, PNG</span>
                                    <input type="file" class="form-control" id="foto_kegiatan" name="foto_kegiatan"
                                        required accept=".jpg, .jpeg, .png">
                                    <!-- <div class="invalid-feedback">Poster belum terisi!</div> -->
                                    <script>
                                        var file = document.getElementById('foto_kegiatan')
                                        file.onchange = function(e) {
                                            var ext = this.value.match(/\.([^\.]+)$/)[1];
                                            switch (ext) {
                                                case 'jpg':
                                                case 'jpeg':
                                                case 'png':
                                                    break;
                                                default:
                                                    $(document).ready(function() {
                                                        swal("Data ditolak",
                                                            "Anda memasukan data dengan format yang salah",
                                                            "error");
                                                    })
                                                    this.value = '';
                                            }
                                        };
                                    </script>
                                    <br>
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">List Foto</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th> No </th>
                                            <th> Action </th>
                                        </tr>

                                        <?php
                                        $lk = $_SESSION["nrp"];
                                        $query = "SELECT * FROM lk WHERE nama_lk = '$lk'";
                                        $result = $conn->query($query);
                                        $id = "";
                                        $imgLogo = "";
                                        $imgPoster = "";
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $id = $row["id"];
                                                $imgLogo = $row["logo"];
                                                $imgPoster = $row["poster"];
                                            }
                                        }

                                        $counter = 1;
                                        if ($imgLogo != "") {
                                            echo "<tr>
                                            <td> Logo </td>
                                            <td> <button type='button' class='btn btn-primary' data-bs-toggle='modal'
                                                    data-bs-target='#exampleModal' data-src = '$imgLogo' >
                                                    Lihat Foto
                                                </button>
                                                </button>
                                                <button type='submit' class='btn btn-danger'
                                                data-bs-toggle='modal'
                                                data-bs-target='#deleteModal'
                                                data-id = '$id'
                                                data-tipe = 'logo'
                                                >Hapus Foto</button>
                                                </td>
                                            </tr>";
                                            $counter++;
                                        }
                                        if ($imgPoster != "") {
                                            echo "<tr>
                                            <td> Poster </td>
                                            <td> <button type='button' class='btn btn-primary' data-bs-toggle='modal'
                                                    data-bs-target='#exampleModal' data-src = '$imgPoster' >
                                                    Lihat Foto
                                                </button>
                                                </button>
                                                <button type='submit' class='btn btn-danger'
                                                data-bs-toggle='modal'
                                                data-bs-target='#deleteModal'
                                                data-id = '$id'
                                                data-tipe = 'poster'
                                                >Hapus Foto</button>
                                                </td>
                                            </tr>";
                                        }

                                        ?>

                                        <?php
                                        $query = "";
                                        $ukm_lk = $_SESSION["nrp"];
                                        if ($_SESSION["kategori"] == "ukm") {
                                            $query = "SELECT * FROM foto_kegiatan WHERE ukm = '$ukm_lk'";
                                        } else if ($_SESSION["kategori"] == "lk") {
                                            $query = "SELECT * FROM foto_kegiatan WHERE lk = '$ukm_lk'";
                                        }
                                        $result = $conn->query($query);
                                        $counter = 1;
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $img = $row["foto"];
                                                $id = $row["id"];
                                                echo "<tr>
                                                    <td> Foto Kegiatan $counter </td>
                                                    <td> <button type='button' class='btn btn-primary' data-bs-toggle='modal'
                                                            data-bs-target='#exampleModal' data-src = '$img' >
                                                            Lihat Foto
                                                        </button>
                                                        </button>
                                                        <button type='submit' class='btn btn-danger'
                                                        data-bs-toggle='modal'
                                                        data-bs-target='#deleteModal'
                                                        data-id = '$id'
                                                        >Hapus Foto</button>
                                                    </td>
                                                </tr>";
                                                $counter++;
                                            }
                                        }

                                        ?>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <?php
                    include "./partials/_footer.html";
                    ?>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="assets/vendors/chart.js/Chart.min.js"></script>
        <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
        <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
        <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="assets/js/off-canvas.js"></script>
        <script src="assets/js/hoverable-collapse.js"></script>
        <script src="assets/js/misc.js"></script>
        <script src="assets/js/settings.js"></script>
        <script src="assets/js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="assets/js/dashboard.js"></script>
        <!-- End custom js for this page -->

        <!-- MODAL START -->

        <!-- modal gambar -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img class='mx-auto' id='foto' src='../../asset/Logo Warna.png' alt='' style='width: 80%;'>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Delete Pertanyaan -->
        <div class="modal fade" id="deleteModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Confirmation</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form class="deleteForm" method="post" action="../api/delete_foto.php">
                        <!-- Modal body -->
                        <div class="modal-body">
                            Apakah anda yakin ingin menghapus foto ini?
                            <br>
                            <input type='hidden' name='id' id="idSlot">
                            <input type="hidden" name="tipe" id="tipe">
                            <br>
                            Pilih "Confirm" dibawah ini jika yakin ingin menghapus foto ini!
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success btn-ok">Confirm</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Delete Pertanyaan -->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form class="deleteForm" method="post" action="../api/update_pertanyaan.php">
                    <!-- Modal body -->
                    <div class="modal-body">
                        Apakah anda yakin ingin mengganti pertanyaan ini?
                        <br>
                        <p>Pertanyaan:</p>
                        <input name="pertanyaan" id="pertanyaanInput" value="">
                        <br>
                        <br>
                        <p>Jenis:</p>
                        <input name="jenis" id="jenisInput">
                        <br>
                        <input type='hidden' name='id' id="idSlot">
                        <br>
                        Pilih "Confirm" dibawah ini jika sudah yakin dengan pertanyaan yang diganti!
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success btn-ok">Confirm</button>
                </form>
            </div>

        </div>
    </div>
    </div>



    <script>
        $('#deleteModal').on('show.bs.modal', function(e) {
            $(this).find('#idSlot').val($(e.relatedTarget).data('id'));
            $(this).find('#tipe').val($(e.relatedTarget).data('tipe'));
        });

        $('#editModal').on('show.bs.modal', function(e) {
            $(this).find('#idSlot').val($(e.relatedTarget).data('id'));
            $(this).find('#pertanyaanInput').val($(e.relatedTarget).data('pertanyaan'));
            $(this).find('#jenisInput').val($(e.relatedTarget).data('jenis'));
        });

        $('#exampleModal').on('show.bs.modal', function(e) {
            $(this).find('#idSlot').val($(e.relatedTarget).data('id'));
            document.getElementById("foto").src = "./" + $(e.relatedTarget).data('src');
        });

        <?php
        if (isset($_GET['status'])) {
            if ($_GET['status'] == 1) {
                echo 'swal("Success","Keterangan Telah di Update","success")';
            } else if ($_GET['status'] == 2) {
                echo 'swal("Success","Foto Telah di Update","success")';
            } else if ($_GET['status'] == 3) {
                echo 'swal("Success","Foto Telah di hapus","success")';
            } else if ($_GET['status'] == 4) {
                echo 'swal("Error","Maksimal foto yang dapat di upload adalah 5 foto","error")';
            } else if ($_GET['status'] == 5) {
                echo 'swal("Error","Maksimal size foto yang dapat di upload adalah 2MB","error")';
            } else if ($_GET['status'] == 6) {
                echo 'swal("Error","Logo yang anda upload melebihi 2MB","error")';
            } else if ($_GET['status'] == 7) {
                echo 'swal("Error","Poster yang anda upload melebihi 2MB","error")';
            } else if ($_GET['status'] == 8) {
                echo 'swal("Error","Error server, silahkan coba upload ulang","error")';
            }
        }
        ?>
    </script>

    <!-- Modal Detail -->

    </div>

</body>

</html>