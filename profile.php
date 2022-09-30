<?php 
include "./process/connect.php";
include "./process/check_user.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>P.PHUKA HERB - ข้อมูลส่วนตัว</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

   <?php include "./components/allMenu.php";?>

    <!-- Begin Page Content -->
    <div class="container pl-1">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h4 class="m-0 font-weight-bold text-primary">ข้อมูลส่วนตัว</h4>
        </div>
        <div class="card-body">
          <div class="form-group">
            <?php 
            $sql ="SELECT * FROM users where user_username = '$user_username'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
            } else {
              echo "0 results";
            }
            ?>
            <div class="form-group">
              <label class="m-0 font-weight-bold text-warning">ชื่อผู้ใช้</label>
              <input type="username" disabled="" class="form-control form-control-user" id="exampleInputusername" placeholder="" name="user_username" value="<?php echo $row["user_username"]; ?>">
            </div>
            <div class="form-group">
              <label class="m-0 font-weight-bold text-warning">รหัสผ่าน</label>
              <input type="password" disabled="" class="form-control form-control-user" id="exampleInputPassword" placeholder="" name="user_password" value="<?php echo $row["user_password"]; ?>">
            </div>
            <div class="form-group">
              <label class="m-0 font-weight-bold text-warning">อีเมล์</label>
              <input type="email" disabled="" class="form-control form-control-user" id="exampleInputEmail" placeholder="อีเมล์" name="user_email" value="<?php echo $row["user_email"]; ?>">
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label class="m-0 font-weight-bold text-warning">ชื่อจริง</label>
                <input type="text" disabled="" class="form-control form-control-user" id="examplePreName" placeholder="ชื่อจริง" name="user_pre_name" value="<?php echo $row["user_pre_name"]; ?>">
              </div>
              <div class="col-sm-6">
                <label class="m-0 font-weight-bold text-warning">นามสกุล</label>
                <input type="text" disabled="" class="form-control form-control-user" id="exampleLastName" placeholder="นามสกุล" name="user_last_name" value="<?php echo $row["user_last_name"]; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="m-0 font-weight-bold text-warning">ชื่อเล่น</label>
              <input type="text" disabled="" class="form-control form-control-user" id="exampleInputName" placeholder="" name="user_name" value="<?php echo $row["user_name"]; ?>">
            </div>
            <div class="form-group">
              <label class="m-0 font-weight-bold text-warning">ว/ด/ป เกิด</label>
              <input type="text" disabled="" class="form-control form-control-user" id="exampleInputBirthdat" placeholder="" name="user_birthday" value="<?php echo $row["user_birthday"]; ?>">
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label class="m-0 font-weight-bold text-warning">อายุ</label>
                <input type="number" disabled="" class="form-control form-control-user" id="exampleAge" placeholder="" name="user_age" value="<?php echo $row["user_age"]; ?>">
              </div>
              <div class="col-sm-6">
                <label class="m-0 font-weight-bold text-warning">เพศ</label>
                <input type="text" disabled="" class="form-control form-control-user" id="exampleSex" placeholder="" name="user_sex" value="<?php echo $row["user_sex"]; ?>">
              </div>
            </div> 
            <div class="form-group">
              <?php 
              $sql1 ="SELECT * FROM address where ad_user_name = '$user_username' ";
              $result1 = $conn->query($sql1);
              if ($result1->num_rows > 0) {
                $row1 = $result1->fetch_assoc();
              } else {
                echo "0 results";
              }
              $conn->close();
              ?>
              <label class="m-0 font-weight-bold text-warning">ที่อยู่</label>
              <textarea class="form-control" disabled="">บ้านเลขที่ <?php echo $row1["ad_codehome"]; ?> หมู่ที่ <?php echo $row1["ad_moo"]; ?>  ตำบล <?php echo $row1["ad_district"]; ?> อำเภอ <?php echo $row1["ad_amphur"]; ?> จังหวัด <?php echo $row1["ad_province"]; ?> <?php echo $row1["ad_postcode"]; ?> </textarea>
            </div>
            <div class="form-group">
              <label class="m-0 font-weight-bold text-warning">เบอร์โทรศัพท์</label>
              <input type="number" disabled="" class="form-control form-control-user" id="exampleInputTel" placeholder="" name="user_tel" value="<?php echo $row["user_tel"]; ?>">
            </div> 
            <br>
            <br>
            <a href="./profile-edit.php"><button class="btn btn-primary btn-user btn-block" type="button">
              แก้ไข
            </button></a>
            <hr>
            <a href="./admin-index.php"><button class="btn btn-success btn-user btn-block" type="button">
              กลับหน้าหลัก
            </button></a>                  
          </div>    
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">คุณต้องการจะออกจากระบบ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">โปรดเลือก "ตกลง" เพื่อทำการออกจากระบบ.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
          <a class="btn btn-primary" href="./process/logout.php">ตกลง</a>
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

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
