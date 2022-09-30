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

  <title>P.PHUKA HERB - โปรโมชั่น</title>

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
                <h4 class="m-0 font-weight-bold text-primary">โปรโมชั่น</h4>
              </div>
              <div class="card-body">
               <?php
               $sql ="SELECT * FROM promotions ORDER BY p_id DESC";
               $result = $conn->query($sql);
               ?>   
               <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ลำดับที่</th>
                      <th>ชื่อโปรโมชั่น</th>
                      <th>ลดกี่เปอร์เซ็น</th>
                      <th>ราคา/บาท</th>
                      <th>เริ่มวันที่</th>
                      <th>สิ้นสุดวันที่</th>
                      <th>รูป</th>
                      <th>ลบ</th>
                      <th>แก้ไข</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ลำดับที่</th>
                      <th>ชื่อโปรโมชั่น</th>
                      <th>ลดกี่เปอร์เซ็น</th>
                      <th>ราคา/บาท</th>
                      <th>เริ่มวันที่</th>
                      <th>สิ้นสุดวันที่</th>
                      <th>รูป</th>
                      <th>ลบ</th>
                      <th>แก้ไข</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                      $i = 1;
                      $num_dregree = 2;
                        // output data of each row
                      while($row = $result->fetch_assoc()) {
                        echo '
                        <tr>
                        <td>'.$i.'</td>
                        <td>'.$row["p_title"].'</td>
                        <td>'.$row["p_percent"].'</td>
                        <td>'.number_format($row["p_bath"],$num_dregree).'</td>
                        <td>'.$row["p_pre_date"].'</td>
                        <td>'.$row["p_pre_date"].'</td>
                        <td><a href="./img/uploads/promotions/'.$row["p_img"].'" target="_blank"><img src="./img/uploads/promotions/'.$row["p_img"].'"  class="img-responsive" width="100" height="100"></a></td>
                        <td><a href="./process/promotions-delete.php?p_id='.$row["p_id"].'" data-toggle="modal" data-target="#deleteModal'.$row["p_id"].'">ลบ</a></td>
                        <td><a href="./promotions-edit.php?p_id='.$row["p_id"].'">แก้ไข</a></td>
                        </tr>
                        <div class="modal fade" id="deleteModal'.$row["p_id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">คุณต้องการจะลบโปรโมชั่น :: '.$row["p_title"].' ?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">โปรดเลือก "ตกลง" เพื่อทำการลบข้อมูล.</div>
                              <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                                <a class="btn btn-danger" href="./process/promotions-delete.php?p_id='.$row["p_id"].' ">ตกลง</a>
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
              <br>
              <br>
              <a href="./promotions-add.php"><button class="btn btn-success btn-user btn-block" type="button">
                เพิ่ม
              </button></a>
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
  
  <!-- Edit data-->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">คุณต้องการจะแก้ไขข้อมูล?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">โปรดเลือก "ตกลง" เพื่อทำการแก้ไขข้อมูล.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
          <a class="btn btn-warning" href="./promotions-edit.php?p_id=<?php echo $edit_id; ?>">ตกลง</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Delete data-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">คุณต้องการจะลบข้อมูล?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">โปรดเลือก "ตกลง" เพื่อทำการลบข้อมูล.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
          <a class="btn btn-danger" href="./process/promotions-delete.php?p_id=<?php echo $delete_id; ?>">ตกลง</a>
        </div>
      </div>
    </div>
  </div>
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
