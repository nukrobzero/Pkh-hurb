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

  <title>P.PHUKA HERB - แก้ไขจัดการสิทธิ์การใช้งาน</title>

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
          <h4 class="m-0 font-weight-bold text-primary">แก้ไขจัดการสิทธิ์การใช้งาน</h4>
        </div>
        <div class="card-body">
          <div class="form-group">
            <?php 
            $staff_id = htmlspecialchars( isset($_GET['staff_id'])?$_GET['staff_id']:'');
            $sql = "SELECT * FROM staff INNER JOIN positions ON staff.staff_status = positions.position_page_id where staff_id = '$staff_id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              $row1 = $result->fetch_assoc();
              $cate_positions = $row1["staff_status"];
            } else {
              echo "0 results";
            }
            ?>
            <form action="./process/permissions-edit.php?staff_id=<?php echo $staff_id; ?>" method="post">
              <div class="form-group">
                <label class="m-0 font-weight-bold text-warning">ชื่อผู้ใช้</label>
                <input type="text" disabled="" class="form-control form-control-user" id="exampleInputuser_username" placeholder="" name="staff_username" value="<?php echo $row1["staff_username"]; ?>" required="">
              </div>
              <div class="form-group">
                <label class="m-0 font-weight-bold text-warning">อีเมล์</label>
                <input type="email" disabled="" class="form-control form-control-user" id="exampleInputuser_email" placeholder="" name="staff_email" value="<?php echo $row1["staff_email"]; ?>" required="">
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label class="ml-0 font-weight-bold text-warning">ตำแหน่ง</label>      
                  <select  class="form-control form-control-user" name="staff_status" >
                    <?php 
                    $sql = "SELECT * FROM positions";
                    $result = $conn->query($sql);   
                    if ($result->num_rows > 0) {
                      $selected;
                      while ( $row = $result->fetch_assoc())
                      {
                        if ($row["position_page_id"]==$cate_positions){
                          $selected = 'selected';
                        }
                        else{
                          $selected = '';
                        }
                        echo '<option value="'.$row["position_page_id"].'"'.$selected.'>'.$row["position_name"].'</option>';
                      }   
                    } else {
                      echo "0 results";
                    }
                    ?>
                  </select>
                </div>
              </div>
              <br>
              <button class="btn btn-primary btn-user btn-block" type="submit">
                บันทึก
              </button>
            </form>
            <hr>
            <a href="./permissions.php"><button class="btn btn-success btn-user btn-block" type="button">
              ย้อนกลับ
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
