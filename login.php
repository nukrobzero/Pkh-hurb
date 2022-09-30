<?php  
	session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>P.PHUKA HERB- Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image">
                <!-- <img src="./img/logoaa.png"> -->
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">ยินดีต้อนรับ!</h1>
                  </div>
                  <form class="user" action="./process/check_login.php" method="post">
                  		<?php 
                  			$user_username = isset($_SESSION["user_username"])?$_SESSION["user_username"]:'' ;
                        $staff_username = isset($_SESSION["staff_username"])?$_SESSION["staff_username"]:'' ;
                  		?>
                    <div class="form-group">
                      <input type="username" class="form-control form-control-user" id="exampleInputusername" aria-describedby="userHelp" placeholder="ชื่อผู้ใช้..." name="username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="รหัสผ่าน" name="password">
                    </div>
                    <button class="btn btn-primary btn-user btn-block" type="submit">
                      ลงชื่อเข้าใช้
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.php">ลืมรหัสผ่าน?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">สมัครสมาชิก!</a>
                  </div>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="index.php">กลับหน้าหลัก</a>
                </div>
                <hr>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
