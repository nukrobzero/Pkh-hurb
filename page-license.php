<?php 
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

  <title>P.PHUKA HERB - จัดการสิทธิการเข้าถึงหน้ารายการ</title>

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
          <h4 class="m-0 font-weight-bold text-primary">จัดการสิทธิการเข้าถึงหน้ารายการ</h4>
        </div>
        <div class="card-body">
         <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ตำแหน่ง</th>
                <th>หน้าโปรโมชั่น</th>
                <th>หน้าบริษัทคู่ค้า</th>
                <th>หน้าจัดการตำแหน่งผู้ใช้</th>
                <th>หน้าจัดการสมาชิก</th>
                <th>หน้าสินค้า</th>
                <th>หน้าประเภทสินค้า</th>
                <th>หน้าข้อมูลสินค้า</th>
                <th>หน้าเพิ่มวัตถุดิบ</th>
                <th>หน้าเสนอการผลิต</th>
                <th>หน้าอนุมัติการผลิต</th>
                <th>หน้าสั่งการผลิต</th>
                <th>หน้าจัดการสิทธิ์</th>
                <th>หน้าหลักแอดมิน</th>
                <th>สูตรการผลิต</th>
                <th>หน้าจัดการพนักงาน</th>
                <th>หน้าจัดการการโอนเงิน</th>
                <th>หน้าจัดการการส่งสินค้า</th>
                <th>ลบ</th>
                <th>แก้ไข</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // $sql ="SELECT * FROM page_license INNER JOIN positions ON page_license.position_ids = pages.position_page_id INNER JOIN pages ON page_license.page_ids = pages.pages_id";
              $sql = "SELECT * FROM positions ORDER BY position_page_id DESC";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                $i = 1;
                        // output data of each row
                while($row = $result->fetch_assoc()) {
                  // $postion_id = $row["position_page_id"];


                  echo '
                  <tr class="text-center">

                  <td class="text-left font-weight-bold">'.$row["position_name"].'</td>
                  <td><input type="checkbox" class="check_license" value="1/'.$row["position_page_id"].'" id="1'.$row["position_page_id"].'" name="pomotion[]"></td>
                  <td><input type="checkbox" class="check_license" value="2/'.$row["position_page_id"].'" id="2'.$row["position_page_id"].'" name="company[]"></td>
                  <td><input type="checkbox" class="check_license" value="3/'.$row["position_page_id"].'" id="3'.$row["position_page_id"].'" name="permission[]"></td>
                  <td><input type="checkbox" class="check_license" value="4/'.$row["position_page_id"].'" id="4'.$row["position_page_id"].'" name="users_manage[]"></td>
                  <td><input type="checkbox" class="check_license" value="5/'.$row["position_page_id"].'" id="5'.$row["position_page_id"].'" name="products[]"></td>
                  <td><input type="checkbox" class="check_license" value="6/'.$row["position_page_id"].'" id="6'.$row["position_page_id"].'" name="category[]"></td>
                  <td><input type="checkbox" class="check_license" value="7/'.$row["position_page_id"].'" id="7'.$row["position_page_id"].'" name="sub_products[]"></td>
                  <td><input type="checkbox" class="check_license" value="8/'.$row["position_page_id"].'" id="8'.$row["position_page_id"].'" name="material[]"></td>
                  <td><input type="checkbox" class="check_license" value="9/'.$row["position_page_id"].'" id="9'.$row["position_page_id"].'" name="products_manufacture[]"></td>
                  <td><input type="checkbox" class="check_license" value="10/'.$row["position_page_id"].'" id="10'.$row["position_page_id"].'" name="confirm_products_manufacture[]"></td>
                  <td><input type="checkbox" class="check_license" value="11/'.$row["position_page_id"].'" id="11'.$row["position_page_id"].'" name="products_manufacture_approve[]"></td>
                  <td><input type="checkbox" class="check_license" value="12/'.$row["position_page_id"].'" id="12'.$row["position_page_id"].'" name="license[]"></td>
                  <td><input type="checkbox" class="check_license" value="13/'.$row["position_page_id"].'" id="13'.$row["position_page_id"].'" name="admin_index[]"></td>
                  <td><input type="checkbox" class="check_license" value="14/'.$row["position_page_id"].'" id="14'.$row["position_page_id"].'" name="calculator[]"></td>
                  <td><input type="checkbox" class="check_license" value="15/'.$row["position_page_id"].'" id="15'.$row["position_page_id"].'" name="staff[]"></td>
                  <td><input type="checkbox" class="check_license" value="18/'.$row["position_page_id"].'" id="18'.$row["position_page_id"].'" name="admin_uploadslip[]"></td>
                  <td><input type="checkbox" class="check_license" value="22/'.$row["position_page_id"].'" id="22'.$row["position_page_id"].'" name="admin_delivery[]"></td>

                  <td><a href="./process/page-license-delete.php?position_page_id='.$row["position_page_id"].'"data-toggle="modal" data-target="#deleteModal'.$row["position_page_id"].'">ลบ</a></td>
                  <td><a href="./page-license-edit.php?position_page_id='.$row["position_page_id"].'">แก้ไข</a></td>

                  </tr>

                  <div class="modal fade" id="deleteModal'.$row["position_page_id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">คุณต้องการจะลบตำแหน่ง  :: '.$row["position_name"].' ?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
                  </div>
                  <div class="modal-body">โปรดเลือก "ตกลง" เพื่อทำการลบข้อมูล.</div>
                  <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                  <a class="btn btn-danger" href="./process/page-license-delete.php?position_page_id='.$row["position_page_id"].' ">ตกลง</a>
                  </div>
                  </div>
                  </div>
                  </div>

                  ';
                  $i++;                       
                }
              } else {
                echo "0 results";
              }
              
              ?>
            </tbody>
          </table>
        </div>
        <br>
        <br>
        <a href="page-license-add.php"><button class="btn btn-success btn-user btn-block" type="button">
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
<script src="js/check_license.js"></script>
<script type="text/javascript">
  // alert(0);
  <?php
  $sql2 ="SELECT * FROM page_license";
  $result2 = $conn->query($sql2);
  echo $conn->error;
  if($result2->num_rows > 0){
    while($row2 = $result2->fetch_assoc()) {
      if(intval($row2["page_ids"]) <= 22){
        $tmpId = $row2["page_ids"].$row2["position_ids"];
        $checkk = $row2["permission"]
        ?>
        var tmpId = "<?php echo $tmpId; ?>";
        var checkk = "<?php echo $checkk; ?>";
          // alert(checkk);
          if(checkk=="1")
            $("#"+tmpId).prop('checked', true);
          else
            $(tmpId).prop('checked', false);
          <?php
        }
      }
    }
    else {

    }
    $conn->close();
    ?>
  </script>
</body>

</html>
