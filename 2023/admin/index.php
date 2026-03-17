<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin | OPENHOUSE 2023</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="./dashboard/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./dashboard/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./dashboard/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="./dashboard/assets/images/favicon.png" />
  </head>
  <body>
    <style>
      html{
        background: url("dashboard/assets/images/auth/gedungQ.jpg");
		    background-size: cover;
      }
    </style>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login</h3>
                <form method="POST" action="./api/check_login.php">
                  <div class="form-group">
                    <label>Username *</label>
                    <input type="text" class="form-control p_input" name="nrp">
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="password" class="form-control p_input" name="password">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="./dashboard/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="./dashboard/assets/js/off-canvas.js"></script>
    <script src="./dashboard/assets/js/hoverable-collapse.js"></script>
    <script src="./dashboard/assets/js/misc.js"></script>
    <script src="./dashboard/assets/js/settings.js"></script>
    <script src="./dashboard/assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
<?php
  if(isset($_GET['status'])){
    if ($_GET['status']==1){
      echo 'swal("Error","Username atau password salah","error")';
    }
    // $msg = $_GET['status'];
    // echo "<script>alert('$msg');</script>";
  }
?>
</script>
