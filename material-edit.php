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

  <title>P.PHUKA HERB - แก้ไขข้อมูลวัตถุดิบ</title>

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
                <h4 class="m-0 font-weight-bold text-primary">แก้ไขข้อมูลวัตถุดิบ</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <?php 
                  $m_id = htmlspecialchars( isset($_GET['m_id'])?$_GET['m_id']:'');
                  $sql = "SELECT * FROM material WHERE m_id = $m_id";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                  } else {
                    echo "0 results";
                  }
                  ?>
                   <form method="post" action="./process/material-edit-img.php?m_id=<?php echo $m_id; ?>" enctype="multipart/form-data">
                  <div class="form-group row">
                    <div class="col-12 mb-3 mb-sm-0 text-center">
                      <img src="./img/uploads/material/<?php echo $row["m_img"]; ?>" height="200" ><br>
                      <br>
                      <input type="file" name="fileToUpload"  id="fileToUpload" required="">
                      <button type="submit" class="btn btn-info btn-user">
                        แก้ไขรูปสินค้า
                      </button>
                    </div> 
                  </div>
                </form>
                  <form action="./process/material-edit.php?m_id=<?php echo $m_id ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="m-0 font-weight-bold text-warning">ชื่อวัตถุดิบ</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputm_name" placeholder="" name="m_name" value="<?php echo $row["m_name"]; ?>" required="">
                    </div>
                    <div class="form-group">
                      <label class="m-0 font-weight-bold text-warning">รายละเอียดวัตถุดิบ</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputm_detail" placeholder="" name="m_detail" value="<?php echo $row["m_detail"]; ?>">
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <label class="m-0 font-weight-bold text-warning">จำนวน (กรัม)</label>
                        <input type="number" class="form-control form-control-user" id="examplem_no" placeholder="" name="m_no" value="<?php echo $row["m_no"]; ?>" required="">
                      </div>
                    </div>
                    <br>
                    <br>
                    <button class="btn btn-primary btn-user btn-block" type="submit">
                      บันทึก
                    </button>
                  </form>
                  <hr>
                  <a href="./material.php"><button class="btn btn-success btn-user btn-block" type="button">
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
