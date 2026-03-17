<?php
  require "../api/connect.php";
  require "../api/check_integrity.php";

  $query = "SELECT * FROM maintenance WHERE page = 'interview'";
  $result = $conn -> query($query);
  if ($result -> num_rows > 0) {
      while($row = $result-> fetch_assoc()){
          if ($row["status"] === "maintenance") {
              header("location: maintenance.php");
          }
      }
  }
  $nrp = $_GET['nrp'];
  $nrp_panit = $_SESSION["nrp"];
  $edit = true;
  // $disabled = "";
  // $allow_update= true;

  // $jwbdiv1_exist = false;
  // $jwbdiv2_exist = false;

  //Cek Jika NRP Belum ada di DB
  $sql = "SELECT * FROM interview WHERE nrp='$nrp'";
  $result = $conn->query($sql);

  if($row = $result->fetch_assoc()) {
    //Nothing
    if($row['submit'] == '1'){
      $edit = false;
    }
  } else {
    //Insert to DB
    $sql = "INSERT INTO interview (nrp, update_by)
    VALUES ('$nrp', '$nrp_panit')";
    
    if ($conn->query($sql) === TRUE) {
      //SUCCESS
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  $sql = "SELECT * FROM interview WHERE nrp='$nrp'";
  $result = $conn->query($sql);

  if($row = $result->fetch_assoc()) {
      $last_update = $row['last_update'];
      $submit_by = $row['submit_by'];
      $update_by = $row['update_by'];
      $link_jawaban = $row['link_jawaban'];
  }

  // $sql = "SELECT file_jawaban1, file_jawaban2 FROM interview WHERE nrp = '$nrp'"; 
  // $result = $conn->query($sql);

  // if($row = $result->fetch_assoc()){
  //   if(($row['file_jawaban1'] == null) && ($row['file_jawaban2'] == null)){
  //     $allow_update = true;
  //   } elseif($row['file_jawaban1'] == null){
  //     $allow_update = true;
  //   } elseif ($row['file_jawaban2'] == null){
  //     $allow_update = true;
  //   } else{
  //     $allow_update = false;
  //   }
  // }

  // if(file_exists("../jawaban/".$nrp."_jwb_div1.pdf")){
  //   $jwbdiv1_exist = true;
  // }

  // if(file_exists("../jawaban/".$nrp."_jwb_div2.pdf")){
  //   $jwbdiv2_exist = true;
  // }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Interview | Admin OPENHOUSE 2023</title>
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
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>

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
                    <div class="d-flex justify-content-between">
                      <h4 class="card-title">Interview - <?=$nrp?></h4>
                      <p><i>Last updated on <?=$last_update?> by <?=$update_by?></i></p>
                    </div>
                    <?php
                      $sql = "SELECT nama_lengkap, divisi1, divisi2 FROM pendaftar WHERE nrp = '$nrp'"; 
                      $result = $conn->query($sql);
                      
                      if($row = $result->fetch_assoc()) {
                        $div1 = $row['divisi1'];
                        if ($div1 == "Perkapman"){
                          $div1 = "Perlengkapan";
                        }elseif($div1 == "Sekonkes"){
                          $div1 = "Sekretariat";
                        }
                        echo '<h4 class="my-2">Nama : '.$row['nama_lengkap'].'</h4>';
                        echo '<h4 class="text-info">Divisi 1 : '.$div1.'</h4>';
                        // echo '<h4 class="mb-4">Pertanyaan Divisi 1: <a href="../pertanyaan/'.$row['divisi1'].'.docx" target="_blank">click here</a></h4>';
                        if($row['divisi2'] != null){
                          $div2 = $row['divisi2'];
                          if ($div2 == "Perkapman"){
                            $div2 = "Perlengkapan";
                          }elseif($div2 == "Sekonkes"){
                            $div2 = "Sekretariat";
                          }
                          echo '<h4 class="text-warning">Divisi 2 : '.$div2.'</h4>';
                          // echo '<h4 class="mb-4">Pertanyaan Divisi 2: <a href="../pertanyaan/'.$row['divisi2'].'.docx" target="_blank">click here</a></h4>';
                        }elseif($row['divisi2'] == null){
                          $disabled = "disabled";
                        }
                      } else {
                        echo '<h4>Error Pendaftar tidak ditemukan</h4>';
                      }
                    ?>
                    <h4>Link Pertanyaan Interview : <a href="https://docs.google.com/document/d/1E5Pbmpl5yHhzObWwW6TwTxtr1nuYjfqaK1iN72xon0g/edit#heading=h.ulkxxccdiiph" target="_blank">Click sini</a></h4>
                    <form class="forms-sample" method="POST" action="../api/update_interview.php" enctype="multipart/form-data">
                      <input type="hidden" name="nrp" value="<?=$nrp?>"></input>
                        <div class="row my-3">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label> Link Jawaban Google Docs : </label>
                              <input type="text" class="form-control" name="link_jawaban" placeholder="Link Google Docs" required>
                            </div>
                            <?php
                            if($link_jawaban != null){
                              echo '<span class="fs-6">Link Jawaban : <a href="'.$link_jawaban.'" target="_blank">'.$link_jawaban.'</a></span>';
                            }
                            ?>

                            <!-- <div class="form-group my-2">
                            <h4 class="text-info">Upload Docx Jawaban Divisi 1</h4>
                            <?php
                            // if($jwbdiv1_exist){
                            //   echo '<input type="file" class="form-control" id="jwbdiv1" name="jwbdiv1" accept=".pdf" disabled>';
                            // }else{
                            //   echo '<input type="file" class="form-control" id="jwbdiv1" name="jwbdiv1" accept=".pdf">';
                            // }
                            ?>
                            <script>
                                var file = document.getElementById('jwbdiv1')
                                file.onchange = function(e) {
                                var ext = this.value.match(/\.([^\.]+)$/)[1];
                                switch (ext) {
                                    case 'pdf':
                                    break;
                                    default:
                                    $(document).ready(function(){
                                        swal("Data ditolak", "Anda memasukan data dengan format yang salah", "error");
                                    })
                                    this.value = '';
                                }
                                };
                            </script>
                            </div>
                            <div class="col-md-6">
                              <?php 
                                // if($jwbdiv1_exist){
                                //   echo '
                                //   <a href="../jawaban/'.$nrp.'_jwb_div1.pdf" target="_blank">
                                //     <button type="button" id="downloadbtn1" class="btn btn-primary me-2 my-2">View div1</button>
                                //   </a>
                                //   <button type="button" id="deletebtn1" class="btn btn-danger me-2 my-2" data-bs-toggle="modal" data-bs-target="#delModal" data-nrp="'.$nrp.'" data-div="div1">Delete div1</button>';
                                // }
                              ?>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group my-2">
                            <h4 class="text-warning">Upload Docx Jawaban Divisi 2</h4>
                            <?php 
                            // if($disabled!="" || $jwbdiv2_exist){
                            //   echo '<input type="file" class="form-control" id="jwbdiv2" name="jwbdiv2" accept=".pdf" disabled>';
                            //   echo '<p class="text-danger">Pendaftar hanya mendaftar 1 divisi</p>';
                            // } else{
                            //   echo '<input type="file" class="form-control" id="jwbdiv2" name="jwbdiv2" accept=".pdf">';
                            // }
                            ?>
                            <script>
                                var file = document.getElementById('jwbdiv2')
                                file.onchange = function(e) {
                                var ext = this.value.match(/\.([^\.]+)$/)[1];
                                switch (ext) {
                                    case 'pdf':
                                    break;
                                    default:
                                    $(document).ready(function(){
                                        swal("Data ditolak", "Anda memasukan data dengan format yang salah", "error");
                                    })
                                    this.value = '';
                                }
                                };
                            </script>
                            </div>
                            <div class="col-md-6">
                              <?php 
                                // if($jwbdiv2_exist){
                                //   echo '
                                //   <a href="../jawaban/'.$nrp.'_jwb_div2.pdf" target="_blank">
                                //     <button type="button" id="downloadbtn2" class="btn btn-primary me-2 my-2">View div2</button>
                                //   </a>
                                //   <button type="button" id="deletebtn2" class="btn btn-danger me-2 my-2" data-bs-toggle="modal" data-bs-target="#delModal" data-nrp="'.$nrp.'" data-div="div2">Delete div2</button>';
                                // }
                              ?> -->
                            <!-- </div> -->
                          </div>
                        </div>
                      
                      <?php
                        // if($allow_update){
                        //   echo '<button type="submit" id="saveButton" class="btn btn-warning me-2 my-2">Update Answer</button>';
                        // }
                      ?>
                      <button type="submit" id="saveButton" class="btn btn-warning me-2 my-2">Update Answer</button>
                      <button type="button" id="submitButton" class='btn btn-outline-light' data-bs-toggle='modal' data-bs-target='#lockModal' data-nrp='<?=$nrp?>'>Submit Answer</button>
                      <span style="color: red;" id="lockedWarning" hidden><i> Jawaban terkunci, sudah disubmit oleh <?=$submit_by?></i></span>
                    </form>

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

    <!-- Modal Delete Answer -->
    <div class="modal fade" id="delModal">
          <div class="modal-dialog">
              <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4>
                </div>
                <form class="lockForm" method="post" action="../api/del_answer.php">
                <!-- Modal body -->
                <div class="modal-body">
                    Apakah anda yakin untuk menghapus jawaban ini?
                    <input type='hidden' name='nrp' id="nrp">
                    <input type='hidden' name='div' id="div">
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success btn-ok">Delete</button>
                </form>
                </div>
              </div>
          </div>
      </div>

      <!-- Modal Lock Answer -->
      <div class="modal fade" id="lockModal">
          <div class="modal-dialog">
              <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4>
                </div>
                <form class="lockForm" method="post" action="../api/lock_answer.php">
                <!-- Modal body -->
                <div class="modal-body">
                    Jawaban yang sudah di submit tidak bisa di edit. Apakah anda yakin ingin submit jawaban ini?
                    <input type='hidden' name='nrp' id="nrp">
                    <br><br>
                    Pilih "Confirm" dibawah ini jika yakin ingin submit jawaban!
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

      $('#lockModal').on('show.bs.modal', function(e) {
          $(this).find('#nrp').val($(e.relatedTarget).data('nrp'));
      });

      $('#delModal').on('show.bs.modal', function(e) {
          $(this).find('#nrp').val($(e.relatedTarget).data('nrp'));
          $(this).find('#div').val($(e.relatedTarget).data('div'));
      });

      function countScore(){
        var part1 = 20;
        var part2 = 30;
        var part3 = 35;
        var part4 = 10;
        var part5 = 5;
        //Part 1
        var sp1 = parseInt($("#s1").val()) + parseInt($("#s2").val()) + parseInt($("#s3").val()) + parseInt($("#s4").val());
        //Part 2
        var sp2 = parseInt($("#s5").val()) + parseInt($("#s6").val()) + parseInt($("#s7").val()) + parseInt($("#s8").val()) + parseInt($("#s9").val()) + parseInt($("#s10").val());
        //Part 3
        var sp3 = parseInt($("#s11").val()) + parseInt($("#s12").val()) + parseInt($("#s13").val()) + parseInt($("#s14").val());
        //Part 4 - Wawancara
        var sp4 = parseInt($("#wawancara").val());
        //Part 4 - Wawancara
        var sp5 = parseInt($("#cv").val());
        var totalScore = sp1+sp2+sp3+sp4+sp5;

        $("#score").text(totalScore);
      }

      $("input").on("change", function(e){
        countScore();
        $('#submitButton').attr('disabled', 'disabled');
      });

      $("textarea").on("change", function(e){
        countScore();
        $('#submitButton').attr('disabled', 'disabled');
      });

      $(document).ready(function (){
        countScore();
      });

    </script>
    <?php
      //Disable edit jika tidak punya akses
      if(!$edit){
        echo "<script>
        $('textarea').attr('disabled', 'disabled');
        $('input').attr('disabled', 'disabled');
        $('#saveButton').attr('disabled', 'disabled');
        $('#submitButton').attr('disabled', 'disabled');
        $('#lockedWarning').removeAttr('hidden');
        </script>";
      }
    ?>
  </body>
</html>