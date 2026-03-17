<?php
  require "../api/connect.php";
  require "../api/check_integrity.php";

  $query = "SELECT * FROM maintenance WHERE page = 'index'";
  $result = $conn -> query($query);
  if ($result -> num_rows > 0) {
      while($row = $result-> fetch_assoc()){
          if ($row["status"] === "maintenance") {
              header("location: maintenance.php");
          }
      }
  }

  if ($_SESSION['kategori']=="lk"){
    header("location: keteranganLK.php");
}else if($_SESSION['kategori']=="ukm"){
    header("location: keteranganLK.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard | Admin OPENHOUSE 23</title>
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
    <style>
      img{
        max-width: 350px;
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
      </div>
      <!-- partial:partials/_sidebar.html -->
      <?php
        include "./partials/_sidebar.php";
      ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <?php
          include "./partials/_navbar.php";
        ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">10</h3>
                          <p class="text-success ms-2 mb-0 font-weight-medium">orang</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Pendaftar</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">5</h3>
                          <p class="text-success ms-2 mb-0 font-weight-medium">orang</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Panitia</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">5</h3>
                          <p class="text-success ms-2 mb-0 font-weight-medium">/10</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-danger">
                          <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Slot Wawancara</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><?=$_SESSION['nrp']?></h3>
                          <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Expense current</h6>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="row">
              <div class="col-md-6 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title mb-1">My Interview</h4>
                      <!-- <p class="text-muted mb-1">Your data status</p> -->
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="preview-list">
                          <?php
                            $nrp = $_SESSION['nrp'];
                            $sql = "SELECT jadwal_openreg.hari_tanggal AS tanggal, 
                            jadwal_openreg.jam AS jam, 
                            pendaftar.nama_lengkap AS nama_pendaftar, 
                            pendaftar.nrp AS nrp_pendaftar, 
                            pendaftar.jurusan AS jurusan, 
                            pendaftar.angkatan AS angkatan, 
                            pendaftar.email AS email, 
                            pendaftar.line AS line, 
                            pendaftar.telp AS telp,
                            pendaftar.ipk AS ipk, 
                            -- pendaftar.asal AS asal, 
                            pendaftar.domisili AS domisili, 
                            -- pendaftar.lk_asal AS lk_asal, 
                            -- pendaftar.lk_tujuan AS lk_tujuan, 
                            -- pendaftar.sertif_vaksin AS sertif_vaksin,
                            -- pendaftar.komitmen AS komitmen,
                            -- pendaftar.pengalaman AS pengalaman,
                            -- pendaftar.kelebihan AS kelebihan,
                            -- pendaftar.kekurangan AS kekurangan,
                            pendaftar.divisi1 AS divisi1,
                            pendaftar.divisi2 AS divisi2, 
                            pendaftar.ktm AS ktm, 
                            -- pendaftar.nilai AS nilai, 
                            pendaftar.chart AS chart,
                            pendaftar.skkk AS skkk, 
                            pendaftar.kecurangan AS kecurangan, 
                            pendaftar.cv AS cv,
                            pendaftar.portofolio AS portofolio, 
                            panitia.nama_lengkap AS nama_panitia, 
                            panitia.divisi AS divisi_panitia, 
                            panitia.meet AS meet_panitia  
                            FROM jadwal_openreg 
                            INNER JOIN pendaftar ON jadwal_openreg.nrp_pendaftar=pendaftar.nrp 
                            INNER JOIN panitia ON jadwal_openreg.nrp_panit=panitia.nrp 
                            WHERE jadwal_openreg.status = 1 AND jadwal_openreg.nrp_panit LIKE '$nrp'
                            ORDER BY tanggal, jam ASC ";
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                $nrp_pendaftar = $row['nrp_pendaftar'];
                                $nama_pendaftar = $row['nama_pendaftar'];
                                $tanggal = $row['tanggal'];
                                if ($tanggal=="2023-06-06"){
                                    $tanggal = "Selasa, 6 Juni 2023";
                                }else if ($tanggal=="2023-06-07"){
                                    $tanggal = "Rabu, 7 Juni 2023";
                                }else if ($tanggal=="2023-06-08"){
                                    $tanggal = "Kamis, 8 Juni 2023";
                                }else if ($tanggal=="2023-06-09"){
                                    $tanggal = "Jumat, 9 Juni 2023";
                                }else if ($tanggal=="2023-06-10"){
                                    $tanggal = "Sabtu, 10 Juni 2023";
                                }else if ($tanggal=="2023-06-11"){
                                    $tanggal = "Minggu, 11 Juni 2023";
                                }else if ($tanggal=="2023-06-12"){
                                  $tanggal = "Senin, 12 Juni 2023";
                                }
                                $jam = $row['jam'];
                                $nama_panitia = $row['nama_panitia'];
                                $divisi_panitia = $row['divisi_panitia'];
                                $meet_panitia = $row['meet_panitia'];
                                $jurusan = $row['jurusan'];
                                $angkatan = $row['angkatan'];
                                $email = $row['email'];
                                $line = $row['line'];
                                $telp = $row['telp'];
                                $ipk = $row['ipk'];
                                // $asal = $row['asal'];
                                $domisili = $row['domisili'];
                                // $lk_asal = $row['lk_asal'];
                                // $lk_tujuan = $row['lk_tujuan'];
                                // $sertif_vaksin = $row['sertif_vaksin'];
                                // $komitmen = $row['komitmen'];
                                // $pengalaman = $row['pengalaman'];
                                // $kelebihan = $row['kelebihan'];
                                // $kekurangan= $row['kekurangan'];
                                $divisi1= $row['divisi1'];
                                if ($row['divisi1'] == "Perkapman"){
                                  $divisi1 = "Perlengkapan";
                                } elseif ($row['divisi1'] == "Sekonkes"){
                                  $divisi1 = "Sekretariat";
                                }
                                $divisi2= $row['divisi2'];
                                if ($row['divisi2'] == "Perkapman"){
                                  $divisi2 = "Perlengkapan";
                                } elseif ($row['divisi2'] == "Sekonkes"){
                                  $divisi2 = "Sekretariat";
                                }
                                $ktm = $row['ktm'];
                                $chart = $row['chart'];
                                // $nilai = $row['nilai'];
                                $skkk = $row['skkk'];
                                $kecurangan = $row['kecurangan'];
                                $portofolio = $row['portofolio'];
                                $cv = $row['cv'];
                                echo "
                                <div class='preview-item border-bottom'>
                                  <div class='preview-thumbnail'>
                                    <div class='preview-icon bg-primary'>
                                      <i class='mdi mdi-clock'></i>
                                    </div>
                                  </div>
                                  <div class='preview-item-content d-sm-flex flex-grow'>
                                    <div class='flex-grow'>
                                      <h6 class='preview-subject'>$nama_pendaftar [$nrp_pendaftar]</h6>
                                      <p class='text-muted mb-0'>$tanggal | $jam</p>
                                    </div>
                                    <div class='me-auto text-sm-right pt-2 pt-sm-0'>
                                      <button class='btn btn-outline-danger' data-bs-toggle='modal' 
                                      data-bs-target='#detailModal' 
                                      data-nrp='$nrp_pendaftar' 
                                      data-nama_pendaftar='$nama_pendaftar' 
                                      data-jurusan='$jurusan' 
                                      data-angkatan='$angkatan' 
                                      data-email='$email' 
                                      data-line='$line' 
                                      data-telp='$telp'
                                      data-ipk='$ipk' 
                                      data-domisili='$domisili' 
                                      data-divisi1='$divisi1' 
                                      data-divisi2='$divisi2'  
                                      data-ktm='$ktm' 
                                      data-chart='$chart' 
                                      data-skkk='$skkk' 
                                      data-kecurangan='$kecurangan'
                                      data-cv='$cv' 
                                      data-portofolio='$portofolio' 
                                      >Check Data</button>
                                      <a href='$meet_panitia' target='_blank'><button class='btn btn-outline-success'>Join Meet</button></a>
                                      <a href='./interview.php?nrp=$nrp_pendaftar' target='_blank'><button class='btn btn-outline-light'>Interview</button></a>
                                      </div>
                                  </div>
                                </div>";
                              }
                            } else {
                              echo "0 results";
                            }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Today Interview</h4>
                    <div class="preview-list">
                      <?php
                        $nrp = $_SESSION['nrp'];
                        $sql = "SELECT jadwal_openreg.hari_tanggal AS tanggal, 
                        jadwal_openreg.jam AS jam, 
                        pendaftar.nama_lengkap AS nama_pendaftar, 
                        pendaftar.nrp AS nrp_pendaftar, 
                        pendaftar.jurusan AS jurusan, 
                        pendaftar.angkatan AS angkatan, 
                        pendaftar.email AS email, 
                        pendaftar.line AS line, 
                        pendaftar.telp AS telp,
                        pendaftar.ipk AS ipk, 
                        -- pendaftar.asal AS asal, 
                        pendaftar.domisili AS domisili, 
                        -- pendaftar.lk_asal AS lk_asal, 
                        -- pendaftar.lk_tujuan AS lk_tujuan, 
                        -- pendaftar.sertif_vaksin AS sertif_vaksin,
                        -- pendaftar.komitmen AS komitmen,
                        -- pendaftar.pengalaman AS pengalaman,
                        -- pendaftar.kelebihan AS kelebihan,
                        -- pendaftar.kekurangan AS kekurangan,
                        pendaftar.divisi1 AS divisi1,
                        pendaftar.divisi2 AS divisi2, 
                        pendaftar.ktm AS ktm, 
                        -- pendaftar.nilai AS nilai, 
                        pendaftar.chart AS chart,
                        pendaftar.skkk AS skkk, 
                        pendaftar.kecurangan AS kecurangan, 
                        pendaftar.cv AS cv,
                        pendaftar.portofolio AS portofolio, 
                        panitia.nama_lengkap AS nama_panitia, 
                        panitia.divisi AS divisi_panitia, 
                        panitia.meet AS meet_panitia
                        FROM jadwal_openreg 
                        INNER JOIN pendaftar ON jadwal_openreg.nrp_pendaftar=pendaftar.nrp 
                        INNER JOIN panitia ON jadwal_openreg.nrp_panit=panitia.nrp 
                        WHERE jadwal_openreg.status = 1 
                        ORDER BY jam, tanggal ASC 
                        ";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            $nrp_pendaftar = $row['nrp_pendaftar'];
                            $nama_pendaftar = $row['nama_pendaftar'];
                            $tanggal = $row['tanggal'];
                            $jam = $row['jam'];
                            // CEK JARAK WAKTU DENGAN SEKARANG
                            $datetime1 = new DateTime("now");
                            $datetime2 = new DateTime("$tanggal $jam");
                            $interval = $datetime1->diff($datetime2);
                            $elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
                            // $elapsed = $interval->format('Starts in %h hours %i minutes %s seconds');
                            // echo $elapsed;
                            $monthdiff = (int)$interval->format('%m');
                            $daydiff = (int)$interval->format('%a');
                            $hourdiff = (int)$interval->format('%h');
                            $mindiff = (int)$interval->format('%i');
                            if($monthdiff != 0 || $daydiff != 0){
                              continue;
                            }
                            //END CEK JARAK WAKTU
                            $nama_panitia = $row['nama_panitia'];
                            $divisi_panitia = $row['divisi_panitia'];
                            $meet_panitia = $row['meet_panitia'];
                            $jurusan = $row['jurusan'];
                            $angkatan = $row['angkatan'];
                            $email = $row['email'];
                            $line = $row['line'];
                            $telp = $row['telp'];
                            $ipk = $row['ipk'];
                            // $asal = $row['asal'];
                            $domisili = $row['domisili'];
                            // $lk_asal = $row['lk_asal'];
                            // $lk_tujuan = $row['lk_tujuan'];
                            // $sertif_vaksin = $row['sertif_vaksin'];
                            // $komitmen = $row['komitmen'];
                            // $pengalaman = $row['pengalaman'];
                            // $kelebihan = $row['kelebihan'];
                            // $kekurangan= $row['kekurangan'];
                            $divisi1= $row['divisi1'];
                            if ($row['divisi1'] == "Perkapman"){
                              $divisi1 = "Perlengkapan";
                            } elseif ($row['divisi1'] == "Sekonkes"){
                              $divisi1 = "Sekretariat";
                            }
                            $divisi2= $row['divisi2'];
                            if ($row['divisi2'] == "Perkapman"){
                              $divisi2 = "Perlengkapan";
                            } elseif ($row['divisi2'] == "Sekonkes"){
                              $divisi2 = "Sekretariat";
                            }
                            $ktm = $row['ktm'];
                            $chart = $row['chart'];
                            // $nilai = $row['nilai'];
                            $skkk = $row['skkk'];
                            $kecurangan = $row['kecurangan'];
                            $cv = $row['cv'];
                            $portofolio = $row['portofolio'];
                            if ($tanggal=="2023-06-06"){
                                $tanggal = "Selasa, 6 Juni 2023";
                            }else if ($tanggal=="2023-06-07"){
                                $tanggal = "Rabu, 7 Juni 2023";
                            }else if ($tanggal=="2023-06-08"){
                                $tanggal = "Kamis, 8 Juni 2023";
                            }else if ($tanggal=="2023-06-09"){
                                $tanggal = "Jumat, 9 Juni 2023";
                            }else if ($tanggal=="2023-06-10"){
                                $tanggal = "Sabtu, 10 Juni 2023";
                            }else if ($tanggal=="2023-06-11"){
                                $tanggal = "Minggu, 11 Juni 2023";
                            }else if ($tanggal=="2023-06-12"){
                              $tanggal = "Senin, 12 Juni 2023";
                            }
                            echo "
                            <div class='preview-item border-bottom'>
                              <div class='preview-item-content d-sm-flex flex-grow'>
                                <div class='flex-grow'>
                                  <h6 class='preview-subject'>$nama_pendaftar [$nrp_pendaftar]</h6>
                                  <p class='text-muted mb-0'>$tanggal | $jam</p>
                                  <p class='text-muted mb-0'>Panitia: $nama_panitia</p>
                                </div>
                                <div class='me-auto text-sm-right pt-2 pt-sm-0'>
                                  <button class='btn btn-outline-danger' data-bs-toggle='modal' 
                                  data-bs-target='#detailModal' 
                                  data-nrp='$nrp_pendaftar' 
                                  data-nama_pendaftar='$nama_pendaftar' 
                                  data-jurusan='$jurusan' 
                                  data-angkatan='$angkatan' 
                                  data-email='$email' 
                                  data-line='$line' 
                                  data-telp='$telp' 
                                  data-ipk='$ipk' 
                                  data-domisili='$domisili' 
                                  data-divisi1='$divisi1' 
                                  data-divisi2='$divisi2'  
                                  data-ktm='$ktm' 
                                  data-chart='$chart' 
                                  data-skkk='$skkk' 
                                  data-kecurangan='$kecurangan'
                                  data-cv='$cv' 
                                  data-portofolio='$portofolio' 
                                  >Check Data</button>
                                  <a href='$meet_panitia' target='_blank'><button class='btn btn-outline-success'>Join Meet</button></a>
                                  <a href='./interview.php?nrp=$nrp_pendaftar' target='_blank'><button class='btn btn-outline-light'>Interview</button></a>
                                </div>
                              </div>
                            </div>";
                          }
                        } else {
                          echo "0 results";
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">List Interview</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Nama Pendaftar </th>
                            <th> Tanggal </th>
                            <th> Jam </th>
                            <th> Panitia </th>
                            <th> Divisi Panitia </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $sql = "SELECT jadwal_openreg.hari_tanggal AS tanggal, 
                            jadwal_openreg.jam AS jam, 
                            pendaftar.nama_lengkap AS nama_pendaftar, 
                            pendaftar.nrp AS nrp_pendaftar, 
                            pendaftar.jurusan AS jurusan, 
                            pendaftar.angkatan AS angkatan, 
                            pendaftar.email AS email, 
                            pendaftar.line AS line, 
                            pendaftar.telp AS telp,
                            pendaftar.ipk AS ipk, 
                            -- pendaftar.asal AS asal, 
                            pendaftar.domisili AS domisili, 
                            -- pendaftar.lk_asal AS lk_asal, 
                            -- pendaftar.lk_tujuan AS lk_tujuan, 
                            -- pendaftar.sertif_vaksin AS sertif_vaksin,
                            -- pendaftar.komitmen AS komitmen,
                            -- pendaftar.pengalaman AS pengalaman,
                            -- pendaftar.kelebihan AS kelebihan,
                            -- pendaftar.kekurangan AS kekurangan,
                            pendaftar.divisi1 AS divisi1,
                            pendaftar.divisi2 AS divisi2, 
                            pendaftar.ktm AS ktm, 
                            -- pendaftar.nilai AS nilai, 
                            pendaftar.chart AS chart,
                            pendaftar.skkk AS skkk, 
                            pendaftar.kecurangan AS kecurangan, 
                            pendaftar.cv AS cv,
                            pendaftar.portofolio AS portofolio, 
                            panitia.nama_lengkap AS nama_panitia, 
                            panitia.divisi AS divisi_panitia, 
                            panitia.meet AS meet_panitia 
                            FROM jadwal_openreg 
                            INNER JOIN pendaftar ON jadwal_openreg.nrp_pendaftar=pendaftar.nrp 
                            INNER JOIN panitia ON jadwal_openreg.nrp_panit=panitia.nrp 
                            WHERE jadwal_openreg.status = 1 
                            ORDER BY tanggal, jam ASC ";
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                $nrp_pendaftar = $row['nrp_pendaftar'];
                                $nama_pendaftar = $row['nama_pendaftar'];
                                $tanggal = $row['tanggal'];
                                $jam = $row['jam'];
                                $nama_panitia = $row['nama_panitia'];
                                $divisi_panitia = $row['divisi_panitia'];
                                if ($row['divisi_panitia'] == "Perkapman"){
                                  $divisi_panitia = "Perlengkapan";
                                } elseif ($row['divisi_panitia'] == "Sekonkes"){
                                  $divisi_panitia = "Sekretariat";
                                }
                                $meet_panitia = $row['meet_panitia'];
                                $jurusan = $row['jurusan'];
                                $angkatan = $row['angkatan'];
                                $email = $row['email'];
                                $line = $row['line'];
                                $telp = $row['telp'];
                                $ipk = $row['ipk'];
                                // $asal = $row['asal'];
                                $domisili = $row['domisili'];
                                // $lk_asal = $row['lk_asal'];
                                // $lk_tujuan = $row['lk_tujuan'];
                                // $sertif_vaksin = $row['sertif_vaksin'];
                                // $komitmen = $row['komitmen'];
                                // $pengalaman = $row['pengalaman'];
                                // $kelebihan = $row['kelebihan'];
                                // $kekurangan= $row['kekurangan'];
                                $divisi1= $row['divisi1'];
                                if ($row['divisi1'] == "Perkapman"){
                                  $divisi1 = "Perlengkapan";
                                } elseif ($row['divisi1'] == "Sekonkes"){
                                  $divisi1 = "Sekretariat";
                                }
                                $divisi2= $row['divisi2'];
                                if ($row['divisi2'] == "Perkapman"){
                                  $divisi2 = "Perlengkapan";
                                } elseif ($row['divisi2'] == "Sekonkes"){
                                  $divisi2 = "Sekretariat";
                                }
                                $ktm = $row['ktm'];
                                $chart = $row['chart'];
                                // $nilai = $row['nilai'];
                                $skkk = $row['skkk'];
                                $kecurangan = $row['kecurangan'];
                                $cv = $row['cv'];
                                $portofolio = $row['portofolio'];
                                if ($tanggal=="2023-06-06"){
                                    $tanggal = "Selasa, 6 Juni 2023";
                                }else if ($tanggal=="2023-06-07"){
                                    $tanggal = "Rabu, 7 Juni 2023";
                                }else if ($tanggal=="2023-06-08"){
                                    $tanggal = "Kamis, 8 Juni 2023";
                                }else if ($tanggal=="2023-06-09"){
                                    $tanggal = "Jumat, 9 Juni 2023";
                                }else if ($tanggal=="2023-06-10"){
                                    $tanggal = "Sabtu, 10 Juni 2023";
                                }else if ($tanggal=="2023-06-11"){
                                    $tanggal = "Minggu, 11 Juni 2023";
                                }else if ($tanggal=="2023-06-12"){
                                  $tanggal = "Senin, 12 Juni 2023";
                                }
                                echo "<tr>
                                <td>$nama_pendaftar</td>
                                <td>$tanggal</td>
                                <td>$jam</td>
                                <td>$nama_panitia</td>
                                <td>$divisi_panitia</td>
                                <td>
                                  <button class='btn btn-outline-danger' data-bs-toggle='modal' 
                                  data-bs-target='#detailModal' 
                                  data-nrp='$nrp_pendaftar' 
                                  data-nama_pendaftar='$nama_pendaftar' 
                                  data-jurusan='$jurusan' 
                                  data-angkatan='$angkatan' 
                                  data-email='$email' 
                                  data-line='$line' 
                                  data-telp='$telp'
                                  data-ipk='$ipk' 
                                  data-domisili='$domisili' 
                                  data-divisi1='$divisi1' 
                                  data-divisi2='$divisi2'  
                                  data-ktm='$ktm' 
                                  data-chart='$chart' 
                                  data-skkk='$skkk' 
                                  data-kecurangan='$kecurangan' 
                                  data-cv='$cv'
                                  data-portofolio='$portofolio' 
                                  >Check Data</button>
                                  <a href='$meet_panitia' target='_blank'><button class='btn btn-outline-success'>Join Meet</button></a>
                                  <a href='./interview.php?nrp=$nrp_pendaftar' target='_blank'><button class='btn btn-outline-light'>Interview</button></a>
                                </td>
                              </tr>";
                              }
                            } else {
                              echo "<tr>
                              <td colspan='6'>0 results</td>
                              </tr>";
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
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
    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Detail Pendaftar</h4>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                NRP : <strong><span id="nrp">ERROR</span></strong><br>
                Nama : <strong><span id="nama_pendaftar">ERROR</span></strong><br>
                Jurusan : <strong><span id="jurusan">ERROR</span></strong><br>
                Angkatan : <strong><span id="angkatan">ERROR</span></strong><br>
                Email : <strong><span id="email">ERROR</span></strong><br>
                Line : <strong><span id="line">ERROR</span></strong><br>
                Telp : <strong><span id="telp">ERROR</span></strong><br>
                IPK : <strong><span id="ipk">ERROR</span></strong><br>
                Domisili : <strong><span id="domisili">ERROR</span></strong><br>
                Pilihan Divisi 1 : <strong><span id="divisi1">ERROR</span></strong><br>
                Pilihan Divisi 2 : <strong><span id="divisi2">ERROR</span></strong><br>
                CV : <strong><a href="#" target="_blank" id="cv">Click Here</a></strong><br>
                Portofolio : <strong><a target="_blank" id="portofolio">Click Here</a></strong><br>
                KTM : <br><img src="ERROR" id="ktm"><br>
                Chart : <br><img src="ERROR" id="chart"><br>
                SKKK : <br><img src="ERROR" id="skkk"><br>
                Kecurangan : <br><img src="ERROR" id="kecurangan"><br>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-ok" data-bs-dismiss="modal">Ok</button>
            </div>

            </div>
        </div>
    </div>
    <script>
      $('#detailModal').on('show.bs.modal', function(e) {
            $(this).find('#nrp').text($(e.relatedTarget).data('nrp'));
            $(this).find('#nama_pendaftar').text($(e.relatedTarget).data('nama_pendaftar'));
            $(this).find('#penawaran').text($(e.relatedTarget).data('penawaran'));
            $(this).find('#jurusan').text($(e.relatedTarget).data('jurusan'));
            $(this).find('#angkatan').text($(e.relatedTarget).data('angkatan'));
            $(this).find('#email').text($(e.relatedTarget).data('email'));
            $(this).find('#line').text($(e.relatedTarget).data('line'));
            $(this).find('#telp').text($(e.relatedTarget).data('telp'));
            $(this).find('#ipk').text($(e.relatedTarget).data('ipk'));
            $(this).find('#domisili').text($(e.relatedTarget).data('domisili'));
            // $(this).find('#komitmen').text($(e.relatedTarget).data('komitmen'));
            // $(this).find('#pengalaman').text($(e.relatedTarget).data('pengalaman'));
            // $(this).find('#kelebihan').text($(e.relatedTarget).data('kelebihan'));
            // $(this).find('#kekurangan').text($(e.relatedTarget).data('kekurangan'));
            $(this).find('#divisi1').text($(e.relatedTarget).data('divisi1'));
            $(this).find('#divisi2').text($(e.relatedTarget).data('divisi2'));
           
            $(this).find('#ktm').attr('src', "../../pendaftaran/files/" + $(e.relatedTarget).data('ktm').toString());
            $(this).find('#chart').attr('src', "../../pendaftaran/files/" + $(e.relatedTarget).data('chart').toString());
            $(this).find('#skkk').attr('src', "../../pendaftaran/files/" + $(e.relatedTarget).data('skkk').toString());
            $(this).find('#kecurangan').attr('src', "../../pendaftaran/files/" + $(e.relatedTarget).data('kecurangan').toString());
            $(this).find('#portofolio').attr('href', $(e.relatedTarget).data('portofolio').toString());
            $(this).find('#cv').attr('href', "../../pendaftaran/files/" + $(e.relatedTarget).data('cv').toString());
            $(this).find('#interview').attr('href', './interview.php?nrp='+ $(e.relatedTarget).data('nrp') );
        });
    </script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php
          $sql = "SELECT count(*) FROM `jadwal_openreg` WHERE nrp_panit='".$_SESSION['nrp']."' and status=0";
          $result = mysqli_query($conn,$sql);
          $result = mysqli_fetch_array($result);
    
          if($result[0]<=5){
            echo "<script>
              swal({
                title: 'ALERT!!!',
                text: 'Slot wawancara anda kurang dari 5, silahkan membuat slot wawancara lagi',
                icon: 'error',
                timer: 2000,
              });
              //setTimeout(function(){
              //  window.location.href = './data_panitia.php';
              //}, 2500);
            </script>";
          }
    ?>
  </body>
</html>