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

  <title>P.PHUKA HERB - ใบเสนอการผลิต</title>

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
          <?php
                 // $pdm_status = htmlspecialchars(isset($_GET["pdm_status"])?$_GET["pdm_status"]:'');
                 //echo "$user_username";
          $user_id = $_SESSION["user_id"];
          $user_username = $_SESSION["user_username"];
          $pdmm_id = isset($_GET["pdmm_id"])?$_GET["pdmm_id"]:'';
          $manufacture_code ="";
          if ($pdmm_id != '') {

           $sql ="SELECT * FROM products_manufacture INNER JOIN products_manufacture_main ON products_manufacture.pd_main_id = products_manufacture_main.pdmm_id INNER JOIN sub_products ON products_manufacture.sub_p_id = sub_products.sp_id INNER JOIN products ON sub_products.pd_id = products.pd_id  WHERE products_manufacture_main.pdmm_id = '".$pdmm_id."' ";
           $manufacture_code ="PDM-00000".$pdmm_id;
         }
         else{

           $sql ="SELECT * FROM products_manufacture INNER JOIN products_manufacture_main ON products_manufacture.pd_main_id = products_manufacture_main.pdmm_id INNER JOIN sub_products ON products_manufacture.sub_p_id = sub_products.sp_id INNER JOIN products ON sub_products.pd_id = products.pd_id  WHERE products_manufacture_main.pdmm_id = 0 ";
         }

         $result = $conn->query($sql);
           // echo $conn->error;
         ?>  

         <?php
         $pdmm_status= ISSET($_GET["pdmm_status"])?$_GET["pdmm_status"]:'';
         $pdmm_username= ISSET($_GET["pdmm_username"])?$_GET["pdmm_username"]:'';
         $button_status ="";
         if ($pdmm_status==99 or $pdmm_status==2 or $pdmm_status==0 or $pdmm_status==1 or $pdmm_status==4 ) {
          $button_status = "hidden";
        }
        echo '
        <h4 class="m-0 font-weight-bold text-primary">ใบเสนอการผลิต </h4>
        <hr class="border-bottom-info">
        <a href="./products-manufacture-add.php?pdmm_id='.$pdmm_id.'">
        <button '.$button_status.'>เพิ่มสินค้า</button>
        </a>
        ';
        ?>

      </div>
      <div class="card-body">
        <form action="./process/products-manufacture-main.php?pdmm_id=<?php echo $pdmm_id; ?>&pdmm_username=<?php echo $pdmm_username; ?>" method="post" 
          id="pd_confirm">
          <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-3">
              <label class="m-0 font-weight-bold text-warning">รหัสใบเสนอการผลิต</label>
              <input type='text' class='form-control form-control-user' value="<?php echo $manufacture_code; ?>" disabled="">
            </div>
            <?php
            $status;
            $pdmm_username;
            if ($pdmm_status== 2) {
              $status = "อนุมัติการผลิต";
            }else if ($pdmm_status== 3) {
              $status = "อยู่ระหว่างการแก้ไข";
            }else if ($pdmm_status== 99) {
              $status = "ยกเลิกรายการ";
            }else if ($pdmm_status== 4) {
              $status = "ผลิตเรียบร้อยแล้ว";
            }else{
              $status = "รอตรวจสอบ";
            }
            ?>
            <div class="col-sm-12 mb-3 mb-sm-3">
              <label class="m-0 font-weight-bold text-warning">สถานะ</label>
              <input type='text' class='form-control form-control-user' value="<?php echo $status; ?>" disabled="">
            </div>
            <div class="col-sm-12">
              <label class="m-0 font-weight-bold text-warning">ผู้ออกใบเสนอการผลิต</label>
              <input type='text' placeholder="<?php echo $pdmm_username; ?>" class='form-control form-control-user' disabled="">
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ลำดับที่</th>
                  <th>รหัสบิลสินค้า</th>
                  <th>ชื่อสินค้า</th>
                  <th>ต้นทุนวัตถุดิบ (บาท)</th>
                  <th>ต้นทุนบรรจุภัณฑ์ (บาท)</th>
                  <th>ต้นทุนรวม (บาท)</th>
                  <th>ราคาสินค้ารวม</th>
                  <th>จำนวนผลิต  (ขวด/ชิ้น)</th>
                  <th>กำไร (บาท)</th>
                </tr>
              </thead>
            <!-- <tfoot>
              <tr>
                <th>ลำดับที่</th>
                <th>รหัสบิลสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>ราคาสินค้ารวม (บาท)</th>
                <th>ต้นทุนรวม (บาท)</th>
                <th>กำไร (บาท)</th>
                <th>จำนวนที่ผลิต</th>
                <th>สินค้าคงเหลือ</th>                     
                <th>วันที่เสนอการผลิต</th>
                <th>สถานะ</th>
                <th>ผู้ออกใบเสนอ</th>
              </tr>
            </tfoot> -->
            <tbody>
              <?php
              $pdmm_status= ISSET($_GET["pdmm_status"])?$_GET["pdmm_status"]:'';

              $sum_profit_material_cost =0;
              $sum_profit_pack_cost=0;
              $sum_pdm_cost=0;
              $sum_pdm_total_price=0;
              $sum_pdm_no=0;
              $sum_pdm_profit=0;
              $num_dregree = 2;
              if ($result->num_rows > 0) {
                $i = 1;
                        // output data of each row
                while($row = $result->fetch_assoc()) {
                 //$product_code = "PDMM-".str_pad($row["pdm_id"], 6, "0", STR_PAD_LEFT);
                 $show_link = "";
                 if ($pdmm_status==2 or $pdmm_status==3 or $pdmm_status==4) {
                   $show_link = '<a href="./products-manufacture-approve-show.php?pdm_id='.$row["pdm_id"].'&pdmm_id='.$row["pdmm_id"].'&sub_p_id='.$row["sub_p_id"].'&pd_id='.$row["pd_id"].'&pdm_no='.$row["pdm_no"].'&pdmm_status='.$row["pdmm_status"].'" >'.$row["pdm_id"].'</a>';
                 }else{
                  $show_link = $row["pdm_id"];
                }

                  // $status;
                  // if ($row["pdm_status"]== 1) {
                  //   $status = "อนุมัติการผลิต";
                  // }else if ($row["pdm_status"]== 0) {
                  //   $status = "กำลังพิจารณา";
                  // }else if ($row["pdm_status"]== 99) {
                  //   $status = "ยกเลิกรายการ";
                  // }else{
                  //   $status = "รอตรวจสอบ";
                  // }
                $delete_button ="";
                if ($pdmm_status==99 or $pdmm_status==2 or $pdmm_status==0 or $pdmm_status==1 or $pdmm_status==4) {
                  $delete_button = 'style="display:none"';
                }
                $show_delete_button = '<a href="./process/products-manufacture-main-delete.php?pdm_id='.$row["pdm_id"].'&pdmm_id='.$row["pdmm_id"].'&pdmm_status='.$row["pdmm_status"].'"'.$delete_button.'class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a>';

                $profit_pack_cost = number_format($row["sp_packeting_cost"])*number_format($row["pdm_no"]);
                $profit_material_cost =$row["pdm_cost"]-$profit_pack_cost;

                echo '
                <tr>
                <td>'.$i.'</td>
                <td>'.$show_link.'</td>
                <td>'.$row["pd_name"].'</td>
                <td>'.number_format($profit_material_cost,$num_dregree).'</td>
                <td>'.number_format($profit_pack_cost,$num_dregree).'</td>
                <td>'.number_format($row["pdm_cost"],$num_dregree).'</td>
                <td>'.number_format($row["pdm_total_price"],$num_dregree).'</td>
                <td>'.number_format($row["pdm_no"]).'</td>
                <td>'.number_format($row["pdm_profit"],$num_dregree).'</td>
                <td>'.$show_delete_button.'</td>
                <input name="sub_id[]" type="hidden" value="'.$row["sp_id"].'">
                <input name="sub_no[]" type="hidden" value="'.$row["sp_no"].'">
                <input name="pdm_no[]" type="hidden" value="'.$row["pdm_no"].'">
                <input name="c_pmm_id" id="tmp_pmm_id" type="hidden" value="'.$pdmm_id.'">
                </tr>';
                $sum_profit_material_cost+=$profit_material_cost;
                $sum_profit_pack_cost+=$profit_pack_cost;
                $sum_pdm_cost+=$row["pdm_cost"];
                $sum_pdm_total_price+=$row["pdm_total_price"];
                $sum_pdm_no+=$row["pdm_no"];
                $sum_pdm_profit+=$row["pdm_profit"];
                $i++;                       
              }
            } else {
                // echo "0 results";
            }
            $conn->close();
            ?>

          </tbody>
          <tfoot>
            <tr>
              <td></td>
              <td></td>
              <td>รวม</td>
              <td><?php echo number_format($sum_profit_material_cost,$num_dregree); ?></td>
              <td><?php echo number_format($sum_profit_pack_cost,$num_dregree); ?></td>
              <td><?php echo number_format($sum_pdm_cost,$num_dregree); ?></td>
              <td><?php echo number_format($sum_pdm_total_price,$num_dregree); ?></td>
              <td><?php echo number_format($sum_pdm_no); ?></td>
              <td><?php echo number_format($sum_pdm_profit,$num_dregree); ?></td>
              <td></td>
            </tr>
          </tfoot>
        </table>
      </div>

      <hr>
      <?php
      $pdmm_status= ISSET($_GET["pdmm_status"])?$_GET["pdmm_status"]:'';
      $button_status ="";
      $button_status_show ="";
      $button_comfirm_show ="";
      if ($pdmm_status==99) {
        $button_status = "disabled";
        $button_status_show = "hidden";
        $button_comfirm_show = "hidden";
      }
      else if ($pdmm_status==3) {
        $button_status = "hidden";
        $button_comfirm_show = "hidden";
      }
      else if ($pdmm_status==0) {
        $button_status_show = "hidden";
        $button_comfirm_show = "hidden";
      }
      else if ($pdmm_status==1) {
        $button_status_show = "hidden";
        $button_comfirm_show = "hidden";
      }
      else if ($pdmm_status==2) {
        $button_status_show = "hidden";
        $button_status = "hidden";
      }
      else if ($pdmm_status==4) {
        $button_status_show = "hidden";
        $button_status = "hidden";
        $button_comfirm_show = "hidden";
      }
      $show_okcon_button = '<button class="btn btn-primary btn-user btn-block" id ="add-manufacture4" name="pdmm_status" value="4" type="button" '.$button_comfirm_show.'> 
      ดำเนินการเรียบร้อยแล้ว
      </button>';
      $show_ok_button = '<button class="btn btn-primary btn-user btn-block" id ="add-manufacture1" name="pdmm_status" value="1" type="submit" '.$button_status_show.'> 
      บันทึกใบเสนอการผลิต
      </button>';  
      $show_edit_button = '<hr><button class="btn btn-warning btn-user btn-block" id ="add-manufacture1" name="pdmm_status" value="3" type="submit" '.$button_status.'> 
      แก้ไขใบเสนอการผลิต
      </button>'; 
      $show_confirm_button = '<hr><button class="btn btn-info btn-user btn-block" id ="add-manufacture2" name="pdmm_status" value="2" type="submit" '.$button_status.'> 
      อนุมัติใบเสนอการผลิต
      </button>'; 
      $show_cancel_button = '<hr><button class="btn btn-danger btn-user btn-block" id ="add-manufacture3" name="pdmm_status" value="99" type="submit" '.$button_status.'> 
      ยกเลิกใบเสนอการผลิต
      </button>';
        //echo $user_status;
      if ($user_status==99) {
        echo $show_okcon_button , $show_ok_button , $show_edit_button , $show_confirm_button , $show_cancel_button;
      }
      else if ($user_status==98) {
       echo $show_okcon_button , $show_ok_button , $show_edit_button  , $show_cancel_button;
     }

     ?>   
     <hr>
     <a href="products-manufacture-show_list.php"><button class="btn btn-success btn-user btn-block" type="button" id ="back-manufacture1">
      ย้อนกลับ
    </button></a>
  </form>
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
<script src="js/products-manufacture-confirm.js"></script>
</body>

</html>
