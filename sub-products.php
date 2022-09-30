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

  <title>P.PHUKA HERB - ข้อมูลรายการสินค้า</title>

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
          <h4 class="m-0 font-weight-bold text-primary">ข้อมูลรายการสินค้า</h4>
        </div>
        <div class="card-body">
         <?php
         $pd_id = ISSET($_GET["pd_id"])?$_GET["pd_id"]:'';
         if ($pd_id=='') {
           $sql ="SELECT * FROM sub_products 
           INNER JOIN products ON sub_products.pd_id = products.pd_id 
           INNER JOIN promotions ON sub_products.pro_id = promotions.p_id
           INNER JOIN material_cal ON sub_products.material_cal_idss = material_cal.material_cal_id ORDER BY sub_products.sp_id DESC ";
         }
         else{
          $sql ="SELECT * FROM sub_products 
          INNER JOIN products ON sub_products.pd_id = products.pd_id 
          INNER JOIN promotions ON sub_products.pro_id = promotions.p_id 
          INNER JOIN material_cal ON sub_products.material_cal_idss = material_cal.material_cal_id WHERE sub_products.pd_id =".$pd_id;
        }


        $result = $conn->query($sql);
        ?>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ลำดับที่</th>
                <th>สินค้า</th>
                <th>สูตรการผลิต</th>
                <th>โปรโมชั่น</th>
                <th>ขนาดขวด (ซีซี)</th>
                <th>ราคาบรรจุภัณฑ์</th>
                <th>ราคาสินค้า/ขวด (บาท)</th>
                <th>จำนวนคงเหลือ</th>
                <th>รูป</th>
                <th>ลบ</th>
                <th>แก้ไข</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ลำดับที่</th>
                <th>สินค้า</th>
                <th>สูตรการผลิต</th>
                <th>โปรโมชั่น</th>
                <th>ขนาดขวด (ซีซี)</th>
                <th>ราคาบรรจุภัณฑ์</th>
                <th>ราคาสินค้า/ขวด (บาท)</th>
                <th>จำนวนคงเหลือ</th>
                <th>รูป</th>
                <th>ลบ</th>
                <th>แก้ไข</th>
              </tr>
            </tfoot>
            <tbody>
              <?php
                    // if ($pd_id !='') {
                    //   $sql ="SELECT * FROM products WHERE pd_id='$pd_id'";
                    // }
                    // else {
                    //   $sql ="SELECT * FROM products";
                    // }
                    //   $pd_name = $sp_id;

                    //   $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                $i = 1;
                $num_dregree = 2;
                        // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo '
                  <tr>
                  <td>'.$i.'</td>
                  <td>'.$row["pd_name"].'</td>
                  <td>'.$row["material_cal_name"].'</td>                       
                  <td>'.$row["p_title"].'</td>
                  <td>'.$row["sp_volume"].'</td>
                  <td>'.number_format($row["sp_packeting_cost"],$num_dregree).'</td>
                  <td>'.number_format($row["sp_price"],$num_dregree).'</td>
                  <td>'.$row["sp_no"].'</td>
                  <td><a href="./img/uploads/sub_products/'.$row["sp_img"].'" target="_blank"><img src="./img/uploads/sub_products/'.$row["sp_img"].'"  class="img-responsive" width="100" height="100"></a></td>
                  <td><a href="./process/sub-products-delete.php?sp_id='.$row["sp_id"].'"data-toggle="modal" data-target="#deleteModal'.$row["sp_id"].'">ลบ</a></td>
                  <td><a href="./sub-products-edit.php?sp_id='.$row["sp_id"].'">แก้ไข</a></td>
                  </tr>
                  <div class="modal fade" id="deleteModal'.$row["sp_id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">คุณต้องการจะลบข้อมูล  :: '.$row["pd_name"].' ?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
                  </div>
                  <div class="modal-body">โปรดเลือก "ตกลง" เพื่อทำการลบข้อมูล.</div>
                  <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                  <a class="btn btn-danger" href="./process/sub-products-delete.php?sp_id='.$row["sp_id"].' ">ตกลง</a>
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
        <a href="./sub-products-add.php"><button class="btn btn-success btn-user btn-block" type="button">
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

</body>

</html>
