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

  <title>P.PHUKA HERB - จัดการตำแหน่งผู้ใช้</title>

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
          <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">จัดการตำแหน่งผู้ใช้</h4>
              </div>
              <div class="card-body">
               <?php
               $sql ="SELECT * FROM staff INNER JOIN positions ON staff.staff_status = positions.position_page_id ORDER BY staff.staff_id DESC";
               $result = $conn->query($sql);
               ?>   
               <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ลำดับที่</th>
                      <th>ชื่อผู้ใช้</th>
                      <th>อีเมล์</th>
                      <th>ตำแหน่ง</th>
                      <th>แก้ไข</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ลำดับที่</th>
                      <th>ชื่อผู้ใช้</th>
                      <th>อีเมล์</th>
                      <th>ตำแหน่ง</th>
                      <th>แก้ไข</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                      $i = 1;
                        // output data of each row
                      while($row = $result->fetch_assoc()) {
                        echo '
                        <tr>
                        <td>'.$i.'</td>
                        <td>'.$row["staff_username"].'</td>
                        <td>'.$row["staff_email"].'</td>
                        <td>'.$row["position_name"].'</td>
                        <td><a href="./permissions-edit.php?staff_id='.$row["staff_id"].'"data-toggle="modal" data-target="#editModal'.$row["staff_id"].'">แก้ไข</a></td>
                        </tr>
                        <div class="modal fade" id="editModal'.$row["staff_id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">คุณต้องการจะแก้ไขสิทธิ์การใช้งาน :: '.$row["staff_username"].' ?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">โปรดเลือก "ตกลง" เพื่อทำการแก้ไขสิทธิ์การใช้งาน.</div>
                              <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                                <a class="btn btn-warning" href="./permissions-edit.php?staff_id='.$row["staff_id"].' ">ตกลง</a>
                              </div>
                            </div>
                          </div>
                        </div>';
                        $i++;                       
                      }
                    } else {
                      echo "0 results";
                    }
                    $conn->close();
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
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
