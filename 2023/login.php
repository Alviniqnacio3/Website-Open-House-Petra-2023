<?php
// if(date("Y-m-d h:i:sa")>date("Y-m-d h:i:sa",strtotime("11:59pm june 10 2023"))){// close regist
// 	header("location: pendaftaran/coming_soon.php");
// 	// echo 'asdf';
// }else if(date("Y-m-d h:i:sa")<date("Y-m-d h:i:sa",strtotime("11:59pm june 4 2023"))){// open regist
// 	header("location: pendaftaran/coming_soon.php");
// }
header("location: ../daftar/");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | OPENHOUSE 2023</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="asset/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="utilslogin.css">
    <link rel="stylesheet" type="text/css" href="login.css">
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>

<body>
    <div id='stars'></div>
    <div id='stars2'></div>
    <div id='stars3'></div>
    <div class="limiter">
        <div class="overlay" style="width: 250px;">
            <img src="asset/logo_pcuwggoh.png" class="img-fluid">
        </div>
        <div class="container-login100">
            <div class="wrap-login100">

                <form class="login100-form validate-form" method="post" action="pendaftaran/api/ceklogin.php">
                    <span class="login100-form-title mb-4" style="font-weight:700;">
                        Login
                    </span>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="nrp" id="nrp">
                        <span class="focus-input100" data-placeholder="NRP"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="password" id="password">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="login.js"></script>
</body>

</html>
<?php
  if(isset($_GET['status'])){
    $msg = $_GET['status'];
	if ($msg == 0){
		echo '<script>swal("Error","Nrp atau Password Salah","error");</script>';

	}
  }
?>