<?php
  require "../api/connect.php";
  require "../api/check_integrity.php";

  $query = "SELECT * FROM maintenance WHERE page = 'list_peserta'";
  $result = $conn -> query($query);
  if ($result -> num_rows > 0) {
      while($row = $result-> fetch_assoc()){
          if ($row["status"] === "maintenance") {
              header("location: maintenance.php");
          }
      }
  }

  $nrp_panit = $_SESSION['nrp'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>List Pendaftar | Admin OPENHOUSE 2023</title>
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
              <!-- SLOT INTERVIEW -->
              <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tabel Pendaftar</h4>
                    <div class="table-responsive">
                      <table class="table text-center">
                        <thead>
                          <tr>
                            <th class="fs-6"> Divisi </th>
                            <th class="fs-6"> Pilihan 1 </th>
                            <th class="fs-6"> Pilihan 2 </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="text-danger">
                            <th class="fs-6"> Acara </th>
                            <?php
                            $sql = "SELECT COUNT(divisi1) as count
                            FROM `pendaftar` 
                            JOIN jadwal_openreg ON jadwal_openreg.nrp_pendaftar = pendaftar.nrp
                            WHERE divisi1='Acara' AND jadwal_openreg.status =1";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                              echo '<th  class="fs-6">'.$row['count'].'</th>';
                            }
                            $sql = "SELECT COUNT(divisi2) as count
                            FROM `pendaftar` 
                            JOIN jadwal_openreg ON jadwal_openreg.nrp_pendaftar = pendaftar.nrp
                            WHERE divisi2='Acara' AND jadwal_openreg.status =1 ";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                              echo '<th  class="fs-6">'.$row['count'].'</th>';
                            }
                            ?>
                          </tr>
                          <tr class="text-warning">
                            <th  class="fs-6"> Creative </th>
                            <?php
                            $sql = "SELECT COUNT(divisi1) as count
                            FROM `pendaftar` 
                            JOIN jadwal_openreg ON jadwal_openreg.nrp_pendaftar = pendaftar.nrp
                            WHERE divisi1='Creative' AND jadwal_openreg.status =1 ";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                              echo '<th  class="fs-6">'.$row['count'].'</th>';
                            }
                            $sql = "SELECT COUNT(divisi2) as count
                            FROM `pendaftar` 
                            JOIN jadwal_openreg ON jadwal_openreg.nrp_pendaftar = pendaftar.nrp
                            WHERE divisi2='Creative' AND jadwal_openreg.status =1 ";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                              echo '<th  class="fs-6">'.$row['count'].'</th>';
                            }
                            ?>
                          </tr>
                          <tr class="text-success">
                            <th  class="fs-6"> Sekretariat </th>
                            <?php
                            $sql = "SELECT COUNT(divisi1) as count
                            FROM `pendaftar` 
                            JOIN jadwal_openreg ON jadwal_openreg.nrp_pendaftar = pendaftar.nrp
                            WHERE divisi1='Sekonkes' AND jadwal_openreg.status =1 ";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                              echo '<th  class="fs-6">'.$row['count'].'</th>';
                            }
                            $sql = "SELECT COUNT(divisi2) as count
                            FROM `pendaftar` 
                            JOIN jadwal_openreg ON jadwal_openreg.nrp_pendaftar = pendaftar.nrp
                            WHERE divisi2='Sekonkes' AND jadwal_openreg.status =1";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                              echo '<th  class="fs-6">'.$row['count'].'</th>';
                            }
                            ?>
                          </tr>
                          <tr class="text-info">
                            <th  class="fs-6"> IT </th>
                            <?php
                            $sql = "SELECT COUNT(divisi1) as count
                            FROM `pendaftar` 
                            JOIN jadwal_openreg ON jadwal_openreg.nrp_pendaftar = pendaftar.nrp
                            WHERE divisi1='IT' AND jadwal_openreg.status =1";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                              echo '<th class="fs-6">'.$row['count'].'</th>';
                            }
                            $sql = "SELECT COUNT(divisi2) as count
                            FROM `pendaftar` 
                            JOIN jadwal_openreg ON jadwal_openreg.nrp_pendaftar = pendaftar.nrp
                            WHERE divisi2='IT' AND jadwal_openreg.status =1";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                              echo '<th class="fs-6">'.$row['count'].'</th>';
                            }
                            ?>
                          </tr>
                          <tr class="text-primary">
                            <th class="fs-6"> Perlengkapan </th>
                            <?php
                            $sql = "SELECT COUNT(divisi1) as count
                            FROM `pendaftar` 
                            JOIN jadwal_openreg ON jadwal_openreg.nrp_pendaftar = pendaftar.nrp
                            WHERE divisi1='Perkapman' AND jadwal_openreg.status =1";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                              echo '<th class="fs-6">'.$row['count'].'</th>';
                            }
                            $sql = "SELECT COUNT(divisi2) as count
                            FROM `pendaftar` 
                            JOIN jadwal_openreg ON jadwal_openreg.nrp_pendaftar = pendaftar.nrp
                            WHERE divisi2='Perkapman' AND jadwal_openreg.status =1";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                              echo '<th class="fs-6">'.$row['count'].'</th>';
                            }
                            ?>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <?php
                     $sql = "SELECT COUNT(pendaftar.id) AS count FROM `pendaftar` 
                     JOIN jadwal_openreg ON jadwal_openreg.nrp_pendaftar = pendaftar.nrp
                     WHERE jadwal_openreg.status =1";
                     $result = $conn->query($sql);
                     while($row = $result->fetch_assoc()) {
                       echo '<p class="fs-6 mt-3">Jumlah Pendaftar : '.$row['count'].' </p>';
                     }
                    ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <!-- SLOT INTERVIEW -->
              <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">List Pendaftar</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> ID </th>
                            <th> NRP </th>
                            <th> Nama Lengkap </th>
                            <th> Jurusan </th>
                            <th> Angkatan </th>
                            <th> Pilihan Divisi 1 </th>
                            <th> Pilihan Divisi 2 </th>
                            <th> Link Jawaban </th>

                            <th> Email </th>
                            <th> Line </th>
                            <th> Telp </th>
                            <th> IPK </th>
                            <th> Domisili </th>
                            <th> KTM </th>
                            <th> chart </th>
                            <th> SKKK </th>
                            <th> Kecurangan </th>
                            <th> CV </th>
                            <th> Portofolio </th>
                            <!-- <th> Keterangan Lainnya </th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $sql = "SELECT * FROM pendaftar 
                            ORDER BY id ASC ";
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $nrp = $row['nrp'];
                                $nama_lengkap = $row['nama_lengkap'];
                                $jurusan = $row['jurusan'];
                                $angkatan = $row['angkatan'];
                                $email = $row['email'];
                                $line = $row['line'];
                                $telp = $row['telp'];
                                $ipk = $row['ipk'];
                                $domisili = $row['domisili'];
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
                                // $komitmen = $row['komitmen'];
                                // $pengalaman = $row['pengalaman'];
                                // $kelebihan = $row['kelebihan'];
                                // $kekurangan= $row['kekurangan'];

                                $ktm = $row['ktm'];
                                if($ktm != ""){
                                  $ktm = "<a href='https://openhouse.petra.ac.id/2023/pendaftaran/files/$ktm' target='_blank'>https://openhouse.petra.ac.id/2023/pendaftaran/files/$ktm</a>";
                                }
                                $chart = $row['chart'];
                                if($chart != ""){
                                  $chart = "<a href='https://openhouse.petra.ac.id/2023/pendaftaran/files/$chart' target='_blank'>https://openhouse.petra.ac.id/2023/pendaftaran/files/$chart</a>";
                                }
                                $skkk = $row['skkk'];
                                if($skkk != ""){
                                  $skkk = "<a href='https://openhouse.petra.ac.id/2023/pendaftaran/files/$skkk' target='_blank'>https://openhouse.petra.ac.id/2023/pendaftaran/files/$skkk</a>";
                                }
                                $kecurangan = $row['kecurangan'];
                                if($kecurangan != ""){
                                  $kecurangan = "<a href='https://openhouse.petra.ac.id/2023/pendaftaran/files/$kecurangan' target='_blank'>https://openhouse.petra.ac.id/2023/pendaftaran/files/$kecurangan</a>";
                                }
                                $portofolio = $row['portofolio'];
                                if($portofolio != ""){
                                  $portofolio = "<a href='$portofolio' target='_blank'>$portofolio</a>";
                                }
                                $cv = $row['cv'];
                                if($cv != ""){
                                  $cv = "<a href='https://openhouse.petra.ac.id/2023/pendaftaran/files/$cv' target='_blank'>https://openhouse.petra.ac.id/2023/pendaftaran/files/$cv</a>";
                                }

                                $sqltemp = "SELECT * FROM `interview` WHERE nrp ='$nrp'";
                                $query = $conn->query($sqltemp);
                                $hasil = $query->fetch_assoc() ;
                                if($hasil!=null){
                                  if($hasil['link_jawaban']!=null && $hasil['link_jawaban']!=""){
                                    $link_jawaban= $hasil['link_jawaban'];
                                  }else{
                                    $link_jawaban= 'Not yet Updated/Submited';
                                  }
                                }else{
                                  $link_jawaban= "No Interviews"; 
                                }
                                echo "<tr>
                                  <td>$id</td>
                                  <td>$nrp</td>
                                  <td>$nama_lengkap</td>
                                  <td>$jurusan</td>
                                  <td>$angkatan</td>
                                  <td>$divisi1</td>
                                  <td>$divisi2</td>
                                  <td>$link_jawaban</td>
                                  <td>$email</td>
                                  <td>$line</td>
                                  <td>$telp</td>
                                  <td>$ipk</td>
                                  <td>$domisili</td>
                                  <td>$ktm</td>
                                  <td>$chart</td>
                                  <td>$skkk</td>
                                  <td>$kecurangan</td>
                                  <td>$cv</td>
                                  <td>$portofolio</td>

                                  ";
                                echo "</tr>";
                              }
                            } else {
                              echo "<tr>
                              <td colspan='5'>0 results</td>
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
                IPK : <strong><span id="ipk">ERROR</span></strong><br>
                Pilihan Divisi 1 : <strong><span id="divisi1">ERROR</span></strong><br>
                Pilihan Divisi 2 : <strong><span id="divisi2">ERROR</span></strong><br>
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
            $(this).find('#jurusan').text($(e.relatedTarget).data('jurusan'));
            $(this).find('#angkatan').text($(e.relatedTarget).data('angkatan'));
            $(this).find('#ipk').text($(e.relatedTarget).data('ipk'));
            // $(this).find('#komitmen').text($(e.relatedTarget).data('komitmen'));
            // $(this).find('#pengalaman').text($(e.relatedTarget).data('pengalaman'));
            // $(this).find('#kelebihan').text($(e.relatedTarget).data('kelebihan'));
            // $(this).find('#kekurangan').text($(e.relatedTarget).data('kekurangan'));
            $(this).find('#divisi1').text($(e.relatedTarget).data('divisi1'));
            $(this).find('#divisi2').text($(e.relatedTarget).data('divisi2'));
          });
    </script>   


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
      if(isset($_GET['error']) && $_GET['error'] = '1'){
        echo "<script>
          swal({
            title: 'INPUT DITOLAK!',
            text: 'Anda sudah memiliki slot di tanggal tersebut!',
            icon: 'error',
            timer: 2000,
          });
          //setTimeout(function(){
          //  window.location.href = './data_panitia.php';
          //}, 2500);
        </script>";
      }

      $sql = "SELECT count(*) FROM `jadwal_openreg` WHERE nrp_panit='".$_SESSION['nrp']."' and status=0";
      $result = mysqli_query($conn,$sql);
      $result = mysqli_fetch_array($result);

      // if($result[0]<=5){
      //   echo "<script>
      //     swal({
      //       title: 'ALERT!!!',
      //       text: 'Slot wawancara anda kurang dari 5, silahkan membuat slot wawancara lagi',
      //       icon: 'error',
      //       timer: 2000,
      //     });
      //     //setTimeout(function(){
      //     //  window.location.href = './data_panitia.php';
      //     //}, 2500);
      //   </script>";
      // }
    ?>
  </body>
</html>