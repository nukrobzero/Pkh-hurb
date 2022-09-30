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

  <title>P.PHUKA HERB - อนุมัติการผลิต</title>

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
          <h4 class="m-0 font-weight-bold text-primary">อนุมัติการผลิต</h4>
        </div>
        <div class="card-body">
         <?php
               // $pdm_status = htmlspecialchars(isset($_GET["pdm_status"])?$_GET["pdm_status"]:'');
               //echo "$user_username";
         $user_id = $_SESSION["user_id"];
         $user_username = $_SESSION["user_username"];

         if ($user_status==99) {

           $sql ="SELECT pdmm_id,pdmm_status,pdmm_username ,SUM(pdm_no) AS pdm_no,SUM(sp_packeting_cost) AS sp_packeting_cost,SUM(pdm_cost) AS pdm_cost,SUM(pdm_total_price) AS pdm_total_price,SUM(pdm_profit) AS pdm_profit,pdmm_date FROM products_manufacture_main INNER JOIN products_manufacture ON products_manufacture_main.pdmm_id = products_manufacture.pd_main_id INNER JOIN sub_products ON products_manufacture.sub_p_id = sub_products.sp_id INNER JOIN products ON sub_products.pd_id = products.pd_id Group by products_manufacture_main.pdmm_id ORDER BY products_manufacture_main.pdmm_id DESC";
         }
         else{

          $sql ="SELECT pdmm_id,pdmm_status,pdmm_username ,SUM(pdm_no) AS pdm_no,SUM(sp_packeting_cost) AS sp_packeting_cost,SUM(pdm_cost) AS pdm_cost,SUM(pdm_total_price) AS pdm_total_price,SUM(pdm_profit) AS pdm_profit,pdmm_date FROM products_manufacture_main INNER JOIN products_manufacture ON products_manufacture_main.pdmm_id = products_manufacture.pd_main_id INNER JOIN sub_products ON products_manufacture.sub_p_id = sub_products.sp_id INNER JOIN products ON sub_products.pd_id = products.pd_id  WHERE products_manufacture_main.pdmm_username = '".$user_username."'Group by products_manufacture_main.pdmm_id ORDER BY products_manufacture_main.pdmm_id DESC ";
        }

        $result = $conn->query($sql);
        ?>   
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ลำดับที่</th>
                <th>รหัสใบเสนอการผลิต</th>
                <th>ต้นทุนรวม (บาท)</th>
                <th>ราคาขายสินค้า</th>
                <th>จำนวนที่ผลิตรวม (ขวด)</th>
                <th>กำไร</th>
                <th>วันที่เสนอการผลิต</th>
                <th>สถานะ</th>
                <th>ผู้ออกใบเสนอ</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ลำดับที่</th>
                <th>รหัสใบเสนอการผลิต</th>
                <th>ต้นทุนรวม (บาท)</th>
                <th>ราคาสินค้ารวม</th>
                <th>จำนวนที่ผลิตรวม (ขวด)</th>
                <th>กำไร</th>
                <th>วันที่เสนอการผลิต</th>
                <th>สถานะ</th>
                <th>ผู้ออกใบเสนอ</th>
              </tr>
            </tfoot>
            <tbody>
              <?php
              if ($result->num_rows > 0) {
                $i = 1;
                        // output data of each row
                while($row = $result->fetch_assoc()) {
                  $product_code = "PDM-".str_pad($row["pdmm_id"], 6, "0", STR_PAD_LEFT);
                  $status;
                  if ($row["pdmm_status"]== 2) {
                    $status = "อนุมัติการผลิต";
                  }else if ($row["pdmm_status"]== 3) {
                    $status = "อยู่ระหว่างการแก้ไข";
                  }else if ($row["pdmm_status"]== 99) {
                    $status = "ยกเลิกรายการ";
                  }else if ($row["pdmm_status"]== 4) {
                    $status = "ผลิตเรียบร้อยแล้ว";
                  }else{
                    $status = "รอตรวจสอบ";
                  }
                  $num_dregree = 2;
                  $profit_pack_cost =0;
                  $profit_material_cost = 0;

                  $profit_pack_cost = $row["sp_packeting_cost"]*$row["pdm_no"];
                  $profit_material_cost =$row["pdm_cost"]-$profit_pack_cost;
                  echo '
                  <tr>
                  <td>'.$i.'</td>
                  <td><a href="./products-manufacture-main-show.php?pdmm_id='.$row["pdmm_id"].'&pdmm_status='.$row["pdmm_status"].'&pdmm_username='.$row["pdmm_username"].'">'.$product_code.'</a></td>
                  <td>'.number_format($row["pdm_cost"],$num_dregree).'</td>
                  <td>'.number_format($row["pdm_total_price"],$num_dregree).'</td>
                  <td>'.number_format($row["pdm_no"]).'</td>
                  <td>'.number_format($row["pdm_profit"],$num_dregree).'</td>
                  <td>'.$row["pdmm_date"].'</td>
                  <td>'.$status.'</td>
                  <td>'.$row["pdmm_username"].'</td>
                  </tr>';
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
