<?php
  require "../api/connect.php";
  require "../api/check_integrity.php";

  $query = "SELECT * FROM maintenance WHERE page = 'list_panitia'";
  $result = $conn -> query($query);
  if ($result -> num_rows > 0) {
      while($row = $result-> fetch_assoc()){
          if ($row["status"] === "maintenance") {
              header("location: maintenance.php");
          }
      }
  }

  $limit = 7;
  $nrp_panit = $_SESSION['nrp'];

  $sql = "SELECT COUNT(nrp_panit) AS slot FROM `jadwal_openreg` WHERE nrp_panit LIKE '$nrp_panit'";
  $result = $conn->query($sql);
  
  if($row = $result->fetch_assoc()) {
    $slot = (int)$row['slot'];
  } else {
    $slot = 0;
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>List Panitia | Admin OPENHOUSE 2023</title>
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
                    <h4 class="card-title">Slot Interview</h4>
                    <div class="table-responsive">
                      <table class="table text-center">
                        <thead>
                          <tr>
                            <th class="fs-6"> Divisi </th>
                            <th class="fs-6"> Total Slot </th>
                            <th class="fs-6"> Booked Slot </th>
                            <th class="fs-6"> Invalid Slot </th>
                            <th class="fs-6"> Active Slot </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="text-danger">
                            <th class="fs-6"> BPH </th>
                            <?php
                            $sql = "SELECT p.divisi, COUNT(*) as total, (
                                SELECT COUNT(*) as total
                                FROM `jadwal_openreg` 
                                JOIN panitia ON panitia.nrp=jadwal_openreg.nrp_panit
                                WHERE jadwal_openreg.status=1 AND panitia.divisi = p.divisi 
                                GROUP BY panitia.divisi) as booked, (
                                SELECT COUNT(*)
                              FROM `jadwal_openreg` 
                              JOIN panitia ON panitia.nrp=jadwal_openreg.nrp_panit
                              WHERE jadwal_openreg.status=0 AND panitia.divisi = p.divisi  AND jadwal_openreg.hari_tanggal < now() + INTERVAL 1 DAY) AS invalid
                            FROM `jadwal_openreg` 
                            JOIN panitia AS p ON p.nrp=jadwal_openreg.nrp_panit
                            WHERE p.divisi = 'BPH'
                            GROUP BY p.divisi";
                            $result = mysqli_query($conn,$sql);
                            $row = mysqli_fetch_array($result);
                            if ($row != null){
                              echo '<th  class="fs-6">'.$row['total'].'</th>';
                              if ($row['booked']==null){
                                echo '<th  class="fs-6">0</th>';
                              }else{
                                echo '<th  class="fs-6">'.$row['booked'].'</th>';
                              }
                              if ($row['invalid']==null){
                                echo '<th  class="fs-6">0</th>';
                              }else{
                                echo '<th  class="fs-6">'.$row['invalid'].'</th>';
                              }
                              echo '<th  class="fs-6">'.($row['total']-$row['booked']-$row['invalid']).'</th>';
                            }else{
                              echo '<th  class="fs-6">0</th>';
                              echo '<th  class="fs-6">0</th>';
                              echo '<th  class="fs-6">0</th>';
                              echo '<th  class="fs-6">0</th>';
                            }
                            
                            ?>
                          </tr>
                          <tr class="text-danger">
                            <th class="fs-6"> Acara </th>
                            <?php
                            $sql = "SELECT p.divisi, COUNT(*) as total, (
                              SELECT COUNT(*) as total
                              FROM `jadwal_openreg` 
                              JOIN panitia ON panitia.nrp=jadwal_openreg.nrp_panit
                              WHERE jadwal_openreg.status=1 AND panitia.divisi = p.divisi 
                              GROUP BY panitia.divisi) as booked, (
                              SELECT COUNT(*)
                            FROM `jadwal_openreg` 
                            JOIN panitia ON panitia.nrp=jadwal_openreg.nrp_panit
                            WHERE jadwal_openreg.status=0 AND panitia.divisi = p.divisi  AND jadwal_openreg.hari_tanggal < now() + INTERVAL 1 DAY) AS invalid
                          FROM `jadwal_openreg` 
                          JOIN panitia AS p ON p.nrp=jadwal_openreg.nrp_panit
                          WHERE p.divisi = 'Acara'
                          GROUP BY p.divisi";
                          $result = mysqli_query($conn,$sql);
                          $row = mysqli_fetch_array($result);
                          if ($row != null){
                            echo '<th  class="fs-6">'.$row['total'].'</th>';
                            if ($row['booked']==null){
                              echo '<th  class="fs-6">0</th>';
                            }else{
                              echo '<th  class="fs-6">'.$row['booked'].'</th>';
                            }
                            if ($row['invalid']==null){
                              echo '<th  class="fs-6">0</th>';
                            }else{
                              echo '<th  class="fs-6">'.$row['invalid'].'</th>';
                            }
                            echo '<th  class="fs-6">'.($row['total']-$row['booked']-$row['invalid']).'</th>';
                          }else{
                            echo '<th  class="fs-6">0</th>';
                            echo '<th  class="fs-6">0</th>';
                            echo '<th  class="fs-6">0</th>';
                            echo '<th  class="fs-6">0</th>';
                          }
                            
                            ?>
                          </tr>
                          <tr class="text-warning">
                            <th  class="fs-6"> Creative </th>
                            <?php
                            $sql = "SELECT p.divisi, COUNT(*) as total, (
                              SELECT COUNT(*) as total
                              FROM `jadwal_openreg` 
                              JOIN panitia ON panitia.nrp=jadwal_openreg.nrp_panit
                              WHERE jadwal_openreg.status=1 AND panitia.divisi = p.divisi 
                              GROUP BY panitia.divisi) as booked, (
                              SELECT COUNT(*)
                            FROM `jadwal_openreg` 
                            JOIN panitia ON panitia.nrp=jadwal_openreg.nrp_panit
                            WHERE jadwal_openreg.status=0 AND panitia.divisi = p.divisi  AND jadwal_openreg.hari_tanggal < now() + INTERVAL 1 DAY) AS invalid
                          FROM `jadwal_openreg` 
                          JOIN panitia AS p ON p.nrp=jadwal_openreg.nrp_panit
                          WHERE p.divisi = 'Creative'
                          GROUP BY p.divisi";
                          $result = mysqli_query($conn,$sql);
                          $row = mysqli_fetch_array($result);
                          if ($row != null){
                            echo '<th  class="fs-6">'.$row['total'].'</th>';
                            if ($row['booked']==null){
                              echo '<th  class="fs-6">0</th>';
                            }else{
                              echo '<th  class="fs-6">'.$row['booked'].'</th>';
                            }
                            if ($row['invalid']==null){
                              echo '<th  class="fs-6">0</th>';
                            }else{
                              echo '<th  class="fs-6">'.$row['invalid'].'</th>';
                            }
                            echo '<th  class="fs-6">'.($row['total']-$row['booked']-$row['invalid']).'</th>';
                          }else{
                            echo '<th  class="fs-6">0</th>';
                            echo '<th  class="fs-6">0</th>';
                            echo '<th  class="fs-6">0</th>';
                            echo '<th  class="fs-6">0</th>';
                          }
                            ?>
                          </tr>
                          <tr class="text-success">
                            <th  class="fs-6"> Sekretariat </th>
                            <?php
                            $sql = "SELECT p.divisi, COUNT(*) as total, (
                              SELECT COUNT(*) as total
                              FROM `jadwal_openreg` 
                              JOIN panitia ON panitia.nrp=jadwal_openreg.nrp_panit
                              WHERE jadwal_openreg.status=1 AND panitia.divisi = p.divisi 
                              GROUP BY panitia.divisi) as booked, (
                              SELECT COUNT(*)
                            FROM `jadwal_openreg` 
                            JOIN panitia ON panitia.nrp=jadwal_openreg.nrp_panit
                            WHERE jadwal_openreg.status=0 AND panitia.divisi = p.divisi  AND jadwal_openreg.hari_tanggal < now() + INTERVAL 1 DAY) AS invalid
                          FROM `jadwal_openreg` 
                          JOIN panitia AS p ON p.nrp=jadwal_openreg.nrp_panit
                          WHERE p.divisi = 'sekonkes'
                          GROUP BY p.divisi";
                          $result = mysqli_query($conn,$sql);
                          $row = mysqli_fetch_array($result);
                          if ($row != null){
                            echo '<th  class="fs-6">'.$row['total'].'</th>';
                            if ($row['booked']==null){
                              echo '<th  class="fs-6">0</th>';
                            }else{
                              echo '<th  class="fs-6">'.$row['booked'].'</th>';
                            }
                            if ($row['invalid']==null){
                              echo '<th  class="fs-6">0</th>';
                            }else{
                              echo '<th  class="fs-6">'.$row['invalid'].'</th>';
                            }
                            echo '<th  class="fs-6">'.($row['total']-$row['booked']-$row['invalid']).'</th>';
                          }else{
                            echo '<th  class="fs-6">0</th>';
                            echo '<th  class="fs-6">0</th>';
                            echo '<th  class="fs-6">0</th>';
                            echo '<th  class="fs-6">0</th>';
                          }
                            ?>
                          </tr>
                          <tr class="text-info">
                            <th  class="fs-6"> IT </th>
                            <?php
                            $sql = "SELECT p.divisi, COUNT(*) as total, (
                              SELECT COUNT(*) as total
                              FROM `jadwal_openreg` 
                              JOIN panitia ON panitia.nrp=jadwal_openreg.nrp_panit
                              WHERE jadwal_openreg.status=1 AND panitia.divisi = p.divisi 
                              GROUP BY panitia.divisi) as booked, (
                              SELECT COUNT(*)
                            FROM `jadwal_openreg` 
                            JOIN panitia ON panitia.nrp=jadwal_openreg.nrp_panit
                            WHERE jadwal_openreg.status=0 AND panitia.divisi = p.divisi  AND jadwal_openreg.hari_tanggal < now() + INTERVAL 1 DAY) AS invalid
                          FROM `jadwal_openreg` 
                          JOIN panitia AS p ON p.nrp=jadwal_openreg.nrp_panit
                          WHERE p.divisi = 'IT'
                          GROUP BY p.divisi";
                          $result = mysqli_query($conn,$sql);
                          $row = mysqli_fetch_array($result);
                          if ($row != null){
                            echo '<th  class="fs-6">'.$row['total'].'</th>';
                            if ($row['booked']==null){
                              echo '<th  class="fs-6">0</th>';
                            }else{
                              echo '<th  class="fs-6">'.$row['booked'].'</th>';
                            }
                            if ($row['invalid']==null){
                              echo '<th  class="fs-6">0</th>';
                            }else{
                              echo '<th  class="fs-6">'.$row['invalid'].'</th>';
                            }
                            echo '<th  class="fs-6">'.($row['total']-$row['booked']-$row['invalid']).'</th>';
                          }else{
                            echo '<th  class="fs-6">0</th>';
                            echo '<th  class="fs-6">0</th>';
                            echo '<th  class="fs-6">0</th>';
                            echo '<th  class="fs-6">0</th>';
                          }
                            ?>
                          </tr>
                          <tr class="text-primary">
                            <th class="fs-6"> Perlengkapan </th>
                            <?php
                            $sql = "SELECT p.divisi, COUNT(*) as total, (
                              SELECT COUNT(*) as total
                              FROM `jadwal_openreg` 
                              JOIN panitia ON panitia.nrp=jadwal_openreg.nrp_panit
                              WHERE jadwal_openreg.status=1 AND panitia.divisi = p.divisi 
                              GROUP BY panitia.divisi) as booked, (
                              SELECT COUNT(*)
                            FROM `jadwal_openreg` 
                            JOIN panitia ON panitia.nrp=jadwal_openreg.nrp_panit
                            WHERE jadwal_openreg.status=0 AND panitia.divisi = p.divisi  AND jadwal_openreg.hari_tanggal < now() + INTERVAL 1 DAY) AS invalid
                          FROM `jadwal_openreg` 
                          JOIN panitia AS p ON p.nrp=jadwal_openreg.nrp_panit
                          WHERE p.divisi = 'Perkapman'
                          GROUP BY p.divisi";
                          $result = mysqli_query($conn,$sql);
                          $row = mysqli_fetch_array($result);
                          if ($row != null){
                            echo '<th  class="fs-6">'.$row['total'].'</th>';
                            if ($row['booked']==null){
                              echo '<th  class="fs-6">0</th>';
                            }else{
                              echo '<th  class="fs-6">'.$row['booked'].'</th>';
                            }
                            if ($row['invalid']==null){
                              echo '<th  class="fs-6">0</th>';
                            }else{
                              echo '<th  class="fs-6">'.$row['invalid'].'</th>';
                            }
                            echo '<th  class="fs-6">'.($row['total']-$row['booked']-$row['invalid']).'</th>';
                          }else{
                            echo '<th  class="fs-6">0</th>';
                            echo '<th  class="fs-6">0</th>';
                            echo '<th  class="fs-6">0</th>';
                            echo '<th  class="fs-6">0</th>';
                          }
                            ?>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

              <!-- SLOT INTERVIEW -->
              <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">List Panitia</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Nama Lengkap </th>
                            <th> Nama Samaran </th>
                            <th> Divisi </th>
                            <th> Meet </th>
                            <th> Line </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $sql = "SELECT * FROM panitia 
                            ORDER BY divisi ASC ";
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $nrp = $row['nrp'];
                                $nama_lengkap = $row['nama_lengkap'];
                                $nama_samaran = $row['nama_samaran'];
                                $divisi = $row['divisi'];
                                if ($row['divisi'] == "Perkapman"){
                                  $divisi = "Perlengkapan";
                                } elseif ($row['divisi'] == "Sekonkes"){
                                  $divisi = "Sekretariat";
                                }
                                $meet = $row['meet'];
                                $line = $row['line'];
                                echo "<tr>
                                  <td>$nama_lengkap</td>
                                  <td>$nama_samaran</td>
                                  <td>$divisi</td>
                                  <td>$meet</td>
                                  <td>$line</td>
                                  ";
                                echo "</tr>";
                              }
                            } else {
                              echo "<tr>
                              <td colspan='5'>0 results</td>
                              </tr>";
                            }
                          ?>
                          <!-- <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td>
                              <img src="assets/images/faces/face2.jpg" alt="image" />
                              <span class="ps-2">Estella Bryan</span>
                            </td>
                            <td> 02312 </td>
                            <td> $14,500 </td>
                            <td> Website </td>
                            <td> Cash on delivered </td>
                            <td> 04 Dec 2019 </td>
                            <td>
                              <div class="badge badge-outline-warning">Pending</div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td>
                              <img src="assets/images/faces/face5.jpg" alt="image" />
                              <span class="ps-2">Lucy Abbott</span>
                            </td>
                            <td> 02312 </td>
                            <td> $14,500 </td>
                            <td> App design </td>
                            <td> Credit card </td>
                            <td> 04 Dec 2019 </td>
                            <td>
                              <div class="badge badge-outline-danger">Rejected</div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td>
                              <img src="assets/images/faces/face3.jpg" alt="image" />
                              <span class="ps-2">Peter Gill</span>
                            </td>
                            <td> 02312 </td>
                            <td> $14,500 </td>
                            <td> Development </td>
                            <td> Online Payment </td>
                            <td> 04 Dec 2019 </td>
                            <td>
                              <div class="badge badge-outline-success">Approved</div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td>
                              <img src="assets/images/faces/face4.jpg" alt="image" />
                              <span class="ps-2">Sallie Reyes</span>
                            </td>
                            <td> 02312 </td>
                            <td> $14,500 </td>
                            <td> Website </td>
                            <td> Credit card </td>
                            <td> 04 Dec 2019 </td>
                            <td>
                              <div class="badge badge-outline-success">Approved</div>
                            </td>
                          </tr> -->
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

    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- MODAL START -->
    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Detail Peserta</h4>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                NRP : <strong><span id="nrp">ERROR</span></strong><br>
                Nama : <strong><span id="nama_peserta">ERROR</span></strong><br>
                Jurusan : <strong><span id="jurusan">ERROR</span></strong><br>
                Angkatan : <strong><span id="angkatan">ERROR</span></strong><br>
                Email : <strong><span id="email">ERROR</span></strong><br>
                Line : <strong><span id="line">ERROR</span></strong><br>
                Telp : <strong><span id="telp">ERROR</span></strong><br>
                Asal : <strong><span id="asal">ERROR</span></strong><br>
                Domisili : <strong><span id="domisili">ERROR</span></strong><br>
                LK Asal : <strong><span id="lk_asal">ERROR</span></strong><br>
                LK Tujuan : <strong><span id="lk_tujuan">ERROR</span></strong><br>
                Sertifikat Vaksin : <img src="ERROR" id="sertif_vaksin"><br>
                KTM : <img src="ERROR" id="ktm"><br>
                Nilai : <img src="ERROR" id="nilai"><br>
                SKKK : <img src="ERROR" id="skkk"><br>
                Kecurangan : <img src="ERROR" id="kecurangan"><br>
                CV : <strong><span id="cv">ERROR</span></strong><br>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-ok" data-bs-dismiss="modal">Ok</button>
            </div>

            </div>
        </div>
    </div>

    <!-- Modal Delete Slot -->
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Confirmation</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            
            <form class="deleteForm" method="post" action="../api/delete_slot.php">
            <!-- Modal body -->
            <div class="modal-body">
                Apakah anda yakin ingin menghapus slot ini?
                <br>
                Tanggal : <strong><span id="tanggal">ERROR</span></strong>
                <input type="hidden" name="tanggal" id="tanggalInput">
                <br>
                Jam : <strong><span id="jam">ERROR</span></strong>
                <input type="hidden" name="jam" id="jamInput">
                <br>
                <input type='hidden' name='id' id="idSlot">
                <br>
                Pilih "Confirm" dibawah ini jika yakin ingin menghapus slot!
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
      $('#detailModal').on('show.bs.modal', function(e) {
          $(this).find('#nrp').text($(e.relatedTarget).data('nrp'));
          $(this).find('#nama_peserta').text($(e.relatedTarget).data('nama_peserta'));
          $(this).find('#penawaran').text($(e.relatedTarget).data('penawaran'));
          $(this).find('#jurusan').text($(e.relatedTarget).data('jurusan'));
          $(this).find('#angkatan').text($(e.relatedTarget).data('angkatan'));
          $(this).find('#email').text($(e.relatedTarget).data('email'));
          $(this).find('#line').text($(e.relatedTarget).data('line'));
          $(this).find('#telp').text($(e.relatedTarget).data('telp'));
          $(this).find('#asal').text($(e.relatedTarget).data('asal'));
          $(this).find('#domisili').text($(e.relatedTarget).data('domisili'));
          $(this).find('#lk_asal').text($(e.relatedTarget).data('lk_asal'));
          $(this).find('#lk_tujuan').text($(e.relatedTarget).data('lk_tujuan'));
          $(this).find('#sertif_vaksin').attr('src', toString($(e.relatedTarget).data('sertif_vaksin')));
          $(this).find('#ktm').attr('src', toString($(e.relatedTarget).data('ktm')));
          $(this).find('#nilai').attr('src', toString($(e.relatedTarget).data('nilai')));
          $(this).find('#skkk').attr('src', toString($(e.relatedTarget).data('skkk')));
          $(this).find('#kecurangan').attr('src', toString($(e.relatedTarget).data('kecurangan')));
          $(this).find('#cv').text($(e.relatedTarget).data('cv'));
      });

      $('#deleteModal').on('show.bs.modal', function(e) {
          $(this).find('#idSlot').val($(e.relatedTarget).data('id'));
          $(this).find('#tanggal').text($(e.relatedTarget).data('tanggal'));
          $(this).find('#jam').text($(e.relatedTarget).data('jam'));
          $(this).find('#tanggalInput').val($(e.relatedTarget).data('tanggal'));
          $(this).find('#jamInput').val($(e.relatedTarget).data('jam'));
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