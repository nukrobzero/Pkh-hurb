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

  <title>P.PHUKA HERB - เพิ่มสมาชิก</title>

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
      <div class="card shadow mb-4" width="800">
        <div class="card-header py-3">
          <h4 class="m-0 font-weight-bold text-primary">เพิ่มสมาชิก</h4>
        </div>
        <div class="card-body">
          <div class="form-group">
            <form action="./process/users-control-add.php" method="post">
              <div class="form-group">
                <label class="m-0 font-weight-bold text-warning">ชื่อผู้ใช้</label>
                <input type="username" class="form-control form-control-user" id="exampleInputusername" placeholder="ชื่อผู้ใช้" name="user_username" value="" required="">
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label class="m-0 font-weight-bold text-warning">รหัสผ่าน</label>
                  <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="รหัสผ่าน" name="user_password" required="">
                </div>
                <div class="col-sm-6">
                  <label class="m-0 font-weight-bold text-warning">ยืนยันรหัสผ่าน</label>
                  <input type="password" class="form-control form-control-user" id="exampleInputrerePassword" placeholder="ยืนยันรหัสผ่าน" name="user_repassword" required="">
                </div>
              </div>
              <div class="form-group">
                <label class="m-0 font-weight-bold text-warning">อีเมล์</label>
                <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="อีเมล์" name="user_email" value="" required="">
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label class="m-0 font-weight-bold text-warning">ชื่อจริง</label>
                  <input type="text" class="form-control form-control-user" id="examplePreName" placeholder="ชื่อจริง" name="user_pre_name" value="">
                </div>
                <div class="col-sm-6">
                  <label class="m-0 font-weight-bold text-warning">นามสกุล</label>
                  <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="นามสกุล" name="user_last_name" value="">
                </div>
              </div>
              <div class="form-group">
                <label class="m-0 font-weight-bold text-warning">ชื่อเล่น</label>
                <input type="text" class="form-control form-control-user" id="exampleInputName" placeholder="ชื่อเล่น" name="user_name" value="">
              </div>
              <div class="form-group">
                <label class="m-0 font-weight-bold text-warning">ว/ด/ป เกิด</label>
                <input type="date" class="form-control form-control-user" id="exampleInputBirthdat" placeholder="" name="user_birthday" value="">
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label class="m-0 font-weight-bold text-warning">อายุ</label>
                  <input type="number" class="form-control form-control-user" id="exampleAge" placeholder="อายุ" name="user_age" value="">
                </div>
                <div class="col-sm-6">
                  <label class="m-0 font-weight-bold text-warning">เพศ</label>
                  <select  class="form-control form-control-user" id="exampleSex" name="user_sex" >
                    <option value="ไม่มี">---โปรดเลือก---</option>
                    <option value="ชาย">ชาย</option>
                    <option value="หญิง">หญิง</option>
                  </select>
                </div>
              </div> 
              <div class="form-group">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label class="m-0 font-weight-bold text-warning">บ้านเลขที่</label>
                    <input type="text" class="form-control form-control-user" id="codehome" name="user_codehome" value="">  
                  </div>
                  <div class="col-sm-6">
                    <label class="m-0 font-weight-bold text-warning">หมู่ที่</label>
                    <input type="text" class="form-control form-control-user" id="moo" name="user_moo" value="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label class="m-0 font-weight-bold text-warning">ตำบล</label>
                    <input type="text" class="form-control form-control-user" id="district" name="user_district" value="">  
                  </div>
                  <div class="col-sm-6">
                    <label class="m-0 font-weight-bold text-warning">อำเภอ</label>
                    <input type="text" class="form-control form-control-user" id="amphoe" name="user_amphur" value="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label class="m-0 font-weight-bold text-warning">จังหวัด</label>
                    <input type="text" class="form-control form-control-user" id="province" name="user_province" value="">
                  </div> 
                  <div class="col-sm-6">
                    <label class="m-0 font-weight-bold text-warning">รหัส</label>
                    <input type="text" class="form-control form-control-user" id="zipcode" name="user_postcode" value="">
                  </div>
                </div> 
              </div>    
              <div class="form-group">
                <label class="m-0 font-weight-bold text-warning">เบอร์โทรศัพท์</label>
                <input type="number" class="form-control form-control-user" id="exampleInputTel" placeholder="เบอร์โทรศัพท์" name="user_tel" value="">
              </div> 
              <br>
              <br>
              <button class="btn btn-primary btn-user btn-block" type="submit">
                บันทึก
              </button>
              <hr>
              <a href="./users-control.php"><button class="btn btn-success btn-user btn-block" type="button">
                ย้อนกลับ
              </button></a>                  
            </form>
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

  <script type="text/javascript" src="js/thaipost_address/JQL.min.js"></script>
  <script type="text/javascript" src="js/thaipost_address/typeahead.bundle.js"></script>
  <link rel="stylesheet" href="css/thaipost_address/jquery.Thailand.min.css">
  <script type="text/javascript" src="js/thaipost_address/jquery.Thailand.min.js"></script>
  <script type="text/javascript">
    $.Thailand({
        $district: $('#district'), // input ของตำบล
        $amphoe: $('#amphoe'), // input ของอำเภอ
        $province: $('#province'), // input ของจังหวัด
        $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
      });
    </script>

  </body>

  </html>
