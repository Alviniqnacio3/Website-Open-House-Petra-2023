<?php
  require "../api/connect.php";
  require "../api/check_integrity.php";

  $query = "SELECT * FROM maintenance WHERE page = 'data_panitia'";
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
  // $_SESSION['nrp'] = "d11200333";
  // $_SESSION['nrp'] = "c14210154";
  // $_SESSION['nrp'] =  "d11200094";



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Panitia | Admin OPENHOUSE 2023</title>
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
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Data Panitia</h4>
                    <?php
                      $nrp = $_SESSION['nrp'];
                      $sql = "SELECT * FROM panitia WHERE nrp='$nrp'";
                      $result = $conn->query($sql);
                  
                      if($row = $result->fetch_assoc()) {
                          $nama_lengkap = $row['nama_lengkap'];
                          $nama_samaran = $row['nama_samaran'];
                          $meet = $row['meet'];
                          $line = $row['line'];
                      } else {
                        $nama_lengkap = "";
                        $nama_samaran = "";
                        $meet = "";
                        $line = "";
                      }
                    ?>
                    <form class="forms-sample" method="POST" action="../api/update_data_panitia.php">
                      <div class="form-group">
                        <label>Nama Samaran</label>
                        <input type="text" class="form-control" name="nama_samaran" placeholder="Nama Samaran" value="<?=$nama_samaran?>" required>
                      </div>
                      <div class="form-group">
                        <label>Link Google Meet</label>
                        <input type="text" class="form-control" name="meet" placeholder="Link Google Meet" value="<?=$meet?>" required>
                      </div>
                      <div class="form-group">
                        <label>ID Line Panitia</label>
                        <input type="text" class="form-control" name="line" placeholder="ID Line Panitia" value="<?=$line?>" required>
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Update Data</button>
                    </form>
                  </div>
                </div>
              </div>
              <!-- SLOT INTERVIEW -->
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tambah Slot Interview</h4>
                      <form class="forms-sample" method="POST" action="../api/tambah_slot.php">
                        <div class="form-group">
                          <label>Tanggal</label>
                          <select class="js-example-basic-single form-control" style="width:100%" name="tanggal" required>
                            <option value="2023-06-06">Selasa, 6 Juni 2023</option>
                            <option value="2023-06-07">Rabu, 7 Juni 2023</option>
                            <option value="2023-06-08">Kamis, 8 Juni 2023</option>
                            <option value="2023-06-09">Jumat, 9 Juni 2023</option>
                            <option value="2023-06-10">Sabtu, 10 Juni 2023</option>
                            <option value="2023-06-11">Minggu, 11 Juni 2023</option>
                            <option value="2023-06-12">Senin, 12 Mei 2023</option>

                          </select>
                        </div>
                        <div class="form-group">
                          <label>Jam</label>
                          <select class="js-example-basic-single form-control" style="width:100%" name="jam" required>
                            <option value="09:00:00">09.00 - 10.00</option>
                            <option value="10:00:00">10.00 - 11.00</option>
                            <option value="11:00:00">11.00 - 12.00</option>
                            <option value="12:00:00">12.00 - 13.00</option>
                            <option value="13:00:00">13.00 - 14.00</option>
                            <option value="14:00:00">14.00 - 15.00</option>
                            <option value="15:00:00">15.00 - 16.00</option>
                            <option value="16:00:00">16.00 - 17.00</option>
                            <option value="17:00:00">17.00 - 18.00</option>
                            <option value="18:00:00">18.00 - 19.00</option>
                            <option value="19:00:00">19.00 - 20.00</option>
                            <option value="20:00:00">20.00 - 21.00</option>


                          </select>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Tambah</button>
                      </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <!-- SLOT INTERVIEW -->
              <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Slot Wawancara Saya</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Tanggal </th>
                            <th> Jam </th>
                            <th> Status </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $sql = "SELECT jadwal_openreg.hari_tanggal AS tanggal, 
                            jadwal_openreg.id AS id, 
                            jadwal_openreg.jam AS jam, 
                            jadwal_openreg.status AS status, 
                            pendaftar.nama_lengkap AS nama_pendaftar, 
                            pendaftar.nrp AS nrp_pendaftar, 
                            panitia.nrp AS nrp_panit, 
                            panitia.nama_lengkap AS nama_panitia
                            FROM jadwal_openreg 
                            LEFT JOIN pendaftar ON jadwal_openreg.nrp_pendaftar=pendaftar.nrp 
                            LEFT JOIN panitia ON jadwal_openreg.nrp_panit=panitia.nrp 
                            WHERE nrp_panit LIKE '$nrp'
                            ORDER BY tanggal, jam ASC ";
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $nrp_pendaftar = $row['nrp_pendaftar'];
                                $nama_pendaftar = $row['nama_pendaftar'];
                                $tanggal = $row['tanggal'];
                                $jam = $row['jam'];
                                $nama_panitia = $row['nama_panitia'];
                                $status = $row['status'];
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
                                  <td>$tanggal</td>
                                  <td>$jam</td>";
                                if($status == "0"){
                                  echo "<td>
                                  <span class='badge badge-outline-success'>Available</span>
                                  <button class='btn btn-outline-light' data-bs-toggle='modal' 
                                  data-bs-target='#deleteModal' 
                                  data-id='$id' 
                                  data-tanggal='$tanggal' 
                                  data-jam='$jam' 
                                  >Delete Slot</button>
                                  </td>";
                                }else{
                                  echo "<td><div class='badge badge-outline-danger'>Booked</div></td>";
                                }
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
                Komitmen : <strong><span id="komitmen">ERROR</span></strong><br>
                Pengalaman : <strong><span id="pengalaman">ERROR</span></strong><br>
                Kelebihan : <strong><span id="kelebihan">ERROR</span></strong><br>
                Kekurangan : <strong><span id="kekurangan">ERROR</span></strong><br>
                Pilihan Divisi 1 : <strong><span id="divisi1">ERROR</span></strong><br>
                Pilihan Divisi 2 : <strong><span id="divisi2">ERROR</span></strong><br>
                Sertifikat Vaksin : <br><img src="ERROR" id="sertif_vaksin"><br>
                KTM : <br><img src="ERROR" id="ktm"><br>
                Chart : <br><img src="ERROR" id="chart"><br>
                SKKK : <br><img src="ERROR" id="skkk"><br>
                Kecurangan : <br><img src="ERROR" id="kecurangan"><br>
                Portofolio : <strong><a href="#" target="_blank" id="portofolio">Click Here</a></strong><br>
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
            $(this).find('#nama_pendaftar').text($(e.relatedTarget).data('nama_pendaftar'));
            $(this).find('#penawaran').text($(e.relatedTarget).data('penawaran'));
            $(this).find('#jurusan').text($(e.relatedTarget).data('jurusan'));
            $(this).find('#angkatan').text($(e.relatedTarget).data('angkatan'));
            $(this).find('#email').text($(e.relatedTarget).data('email'));
            $(this).find('#line').text($(e.relatedTarget).data('line'));
            $(this).find('#telp').text($(e.relatedTarget).data('telp'));
            $(this).find('#ipk').text($(e.relatedTarget).data('ipk'));
            $(this).find('#domisili').text($(e.relatedTarget).data('domisili'));
            $(this).find('#komitmen').text($(e.relatedTarget).data('komitmen'));
            $(this).find('#pengalaman').text($(e.relatedTarget).data('pengalaman'));
            $(this).find('#kelebihan').text($(e.relatedTarget).data('kelebihan'));
            $(this).find('#kekurangan').text($(e.relatedTarget).data('kekurangan'));
            $(this).find('#divisi1').text($(e.relatedTarget).data('divisi1'));
            $(this).find('#divisi2').text($(e.relatedTarget).data('divisi2'));
           
            $(this).find('#ktm').attr('src', "../../files/" + $(e.relatedTarget).data('ktm').toString());
            $(this).find('#chart').attr('src', "../../files/" + $(e.relatedTarget).data('chart').toString());
            $(this).find('#skkk').attr('src', "../../files/" + $(e.relatedTarget).data('skkk').toString());
            $(this).find('#kecurangan').attr('src', "../../files/" + $(e.relatedTarget).data('kecurangan').toString());
            $(this).find('#portofolio').attr('href', "../../files/" + $(e.relatedTarget).data('portofolio').toString());
            $(this).find('#interview').attr('href', './interview.php?nrp='+ $(e.relatedTarget).data('nrp') );
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