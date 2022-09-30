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

  <title>P.PHUKA HERB - สั่งการผลิต</title>

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
          <h4 class="m-0 font-weight-bold text-primary">ข้อมูลสินค้าที่ผลิต</h4>
        </div>
        <div class="card-body">
          <?php
          $pdm_id= ISSET($_GET["pdm_id"])?$_GET["pdm_id"]:'';
          $sub_p_id= ISSET($_GET["sub_p_id"])?$_GET["sub_p_id"]:'';
          $pd_id= ISSET($_GET["pd_id"])?$_GET["pd_id"]:'';
          $pdm_no= ISSET($_GET["pdm_no"])?$_GET["pdm_no"]:'';
          //$pdm_username= ISSET($_GET["pdm_username"])?$_GET["pdm_username"]:'';
          $pmm_id = htmlspecialchars(isset($_GET["pmm_id"])?$_GET["pmm_id"]:'');
          $pdmm_status= ISSET($_GET["pdmm_status"])?$_GET["pdmm_status"]:'';
          ?>
          <div class="form-group">
            <form method="post" action="./process/products-manufacture-approve-change-status.php?pdm_id=<?php echo $pdm_id; ?>&pdm_status=<?php echo $pdm_status; ?>&sp_id=<?php echo $sub_p_id; ?>">
              <div class="form-group">
                <?php
                //$product_code = "PDMM-".str_pad($pdm_id, 6, "0", STR_PAD_LEFT);
                ?>
                <label class="m-0 font-weight-bold text-warning">รหัสบิลสินค้า</label>
                <input type="text" disabled="" class="form-control form-control-user" id="exampleInputusercode" placeholder="" name="" value="<?php echo $pdm_id; ?>">
              </div>
              <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-3">
                  <label class="m-0 font-weight-bold text-warning">สินค้า</label>
                  <!-- <form id="show-sub-products" action="#" method="post" enctype="multipart/form-data"> -->
                    <select  class="form-control form-control-user input-lock" name="pd_name" id="pd_name">
                      <?php 


                      $sql = "SELECT * FROM products";
                      $result = $conn->query($sql);   
                      if ($result->num_rows > 0) {
                        while ( $row = $result->fetch_assoc())
                        {
                          if($row["pd_id"]!=$pd_id)
                            echo '<option value="'.$row["pd_id"].'">'.$row["pd_name"].'</option>';
                          else
                            echo '<option value="'.$row["pd_id"].'" selected>'.$row["pd_name"].'</option>';
                        }   
                      } else {
                        echo "0 results";
                      }

                          // pd_name sp_id pd_no

                      ?>
                    </select>
                    <!-- </form> -->
                  </div>
                  <div class="col-sm-12">
                    <label class="m-0 font-weight-bold text-warning">ข้อมูลสินค้า</label>  
                    <div id="tmp-material_manufacture-group"> </div>
                    <!-- <form id="show-table-menu"> -->
                      <div class="form-inline " id="select-sub-product">
                        <!-- SHOW SUB-PRODUCT SELECT -->
                        <div id='show-select-sub-products'>
                          <?php 
                          if ($pdm_id !='' and $sub_p_id !='' and $pd_id !='' and $pdm_no !='') {

                            $pd_name = $sub_p_id;
                            $sql ="SELECT * FROM sub_products WHERE pd_id='$pd_id'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                              echo "<select  class='type form-control input-lock' name='sp_volume' id='sp_id' >";
                              while ( $row = $result->fetch_assoc())
                              {
                                if($row["sp_id"]!=$pd_name)
                                  echo "<option value='".$row["sp_id"]."'>ราคา ( ".$row["sp_price"]." บาท) , ขนาดขวด ( ".$row["sp_volume"]." ซีซี)</option>";
                                else 
                                  echo "<option value='".$row["sp_id"]."' selected>ราคา ( ".$row["sp_price"]." บาท) , ขนาดขวด ( ".$row["sp_volume"]." ซีซี)</option>";
                              }
                              echo "</select>";   
                            } else {
                                      // echo $conn->error;
                              echo "<select  class='type form-control' name='sp_volume' id='sp_id' >";
                              echo "<option value='0'>---เลือกสินค้า---</option>";
                              echo "</select>";
                            }
                          }
                          ?>
                        </div> 
                        <input type='number' placeholder="จำนวน ( <?php echo $pdm_no;?> ชิ้น/ขวด)" class='form-control ml-2 input-lock' name='sp_no' id="sp_no" value="" required>
                        <!-- <button id="cal-manufacture" class="form-control ml-2 btn btn-primary">คำนวณการผลิต</button> -->
                      </div> 
                      <!-- <?php
                      $pdm_username;
                      $status;
                      if ($pdm_status== 1) {
                        $status = "กำลังผลิต";
                      }else if ($pdm_status== 0) {
                        $status = "กำลังพิจารณา";
                      }else if ($pdm_status== 99) {
                        $status = "ยกเลิกรายการ";
                      }else{
                        $status = "รอตรวจสอบ";
                      }
                      ?> -->

                      <!-- <label class="mt-1 font-weight-bold text-warning">สถานะ</label> -->
                      <!-- <div class="form-group "> -->
                        <!-- <label class="mt-3 m-0 font-weight-bold text-warning">สถานะ</label>
                          <input type='text' class='form-control ml-0 input-lock' value="<?php echo $status; ?>"> -->
                          <!-- </div> -->
                          <!-- </form> -->
                        <!-- <label class="mt-3 m-0 font-weight-bold text-warning">ผู้ออกใบเสนอการผลิต</label>
                          <input type='text' placeholder="<?php echo $pdm_username; ?>" class='form-control ml-0 input-lock'> -->
                        </div>
                      </div>
                      <div id="show-table-manufacture1">
                        <div class="table-responsive show-table">
                          <hr>
                          <table class="table table-bordered"  width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อวัตถุดิบ</th>
                                <th>วัตถุดิบที่ใช้ (ต่อหน่วย)</th>
                                <th>วัตถุดิบที่ใช้ </th>
                                <th>วัตถุดิบที่เหลือ</th>
                                <!-- <th>ราคาวัตถุดิบ (ต่อชิ้น)</th> -->
                                <th>ราคาต้นทุน(บาท)</th>
                                <!-- <th>ราคาขาย</th> -->
                              </tr>
                            </thead>
                            <tbody id="show-table-manufacture3">
                              <?php
                              $sp_volume = $sub_p_id;
                              $sp_no = $pdm_no;

                              $sql ="SELECT * FROM sub_products 
                              INNER JOIN material_cal ON sub_products.material_cal_idss = material_cal.material_cal_id
                              INNER JOIN material_products ON material_cal.material_cal_id = material_products.material_cal_ids 
                              INNER JOIN material ON material.m_id = material_products.mat_id 
                              WHERE sp_id='$sp_volume'";
                              $result = $conn->query($sql);
                              $i=1;
                              if ($result->num_rows > 0) {
                                $total_price = 0;
                                $cost = 0;
                                $tmpCanclik = 0;
                                while ( $row = $result->fetch_assoc())
                                {
                              // $material_sum = 0;
                                  $material_use = floatval($row["mp_volume"])*floatval($sp_no);
                                  $material_sum =floatval($row["m_no"])-$material_use;
                                  $total_price = floatval($row["sp_price"])*floatval($sp_no);
                                  $sp_packeting_cost = floatval($row["sp_packeting_cost"]);
                                  $total_sp_packeting_cost = floatval($row["sp_packeting_cost"])*floatval($sp_no);
                                  $m_id = $row["m_id"];
                                  $sub_product_number = $row["sp_no"]+$pdm_no;

                                  $material_price = floatval($row["mp_price"])/floatval($row["mp_unit"]);
                              // $material_price_totol = floatval($row["m_no"])/floatval($row["m_price"]);
                              // $material_price_sum = floatval($material_price)*floatval($material_price_totol);
                                  if ($material_sum<0){
                                    $tmpCanclik++;
                                    $sum_class ="btn-danger";
                                  }
                                  else {
      // echo '<input type="hidden" name ="canclick" id="canclick" value="1">';
                                    $sum_class ="";
                                  }
                                  $num_dregree = 2;
                                  $cost_all =  floatval($material_use)*floatval($material_price);

                                  echo "<tr>";
                                  echo '<td>'.$i.'</td>';
                                  echo '<td>'.$row["m_name"].'</td>';
                                  echo '<td>'.number_format($row["mp_volume"],$num_dregree).'</td>';
                                  echo '<td >'.number_format($material_use,$num_dregree).'</td>';
                                  echo '<td class="'.$sum_class.'">'.number_format($material_sum,$num_dregree).'</td>';
                                  echo '<td>'.number_format($cost_all,$num_dregree).'</td>';
                                  echo "</tr>"; 
                                  $cost += floatval($material_use)*floatval($material_price);
                                  $i++;
                                  echo '<input type="hidden" name="mtr_id[]" value="'.$m_id.'">';
                                  echo '<input type="hidden" name="mtrs_id[]" value="'.$material_sum.'">';
                                }
                                echo '<input type="hidden" name="sub_product_number" value="'.$sub_product_number.'">';
                                $total_cost = $total_sp_packeting_cost+$cost;
                                $profit = $total_price - $total_cost;
                                if ($profit<0){
                                  $profit_class ="btn-danger";
                                }
                                else {
                                  $profit_class ="";
                                }
                                echo "<tr>";
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td></td>';
                                echo "</tr>";
                                echo "<tr>";
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td>ต้นทุนวัตถุดิบ</td>';
                                echo '<td>'.number_format($cost,$num_dregree).'</td>';
                                echo "</tr>";
                                echo "<tr>";
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td>ต้นทุนบรรจุภัณฑ์(ขวดละ '.$sp_packeting_cost.' บาท)</td>';
                                echo '<td>'.number_format($total_sp_packeting_cost,$num_dregree).'</td>';
                                echo "</tr>";
                                echo "<tr>";
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td>ต้นทุนรวม</td>';
                                echo '<td>'.number_format($total_cost,$num_dregree).'</td>';
                                echo "</tr>"; 
                                echo "<tr>";
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td>ราคาขายสินค้า</td>';
                                echo '<td>'.number_format($total_price,$num_dregree).'</td>';
                                echo "</tr>"; 
                                echo "<tr>";
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td>กำไร</td>';
                                echo '<td class="'.$profit_class.'">'.number_format($profit,$num_dregree).'</td>';
                                echo "</tr>"; 
                                echo '<input type="hidden" name ="cost" id="cost" value="'.$cost.'">';
                                echo '<input type="hidden" name ="total_price" id="total_price" value="'.$total_price.'">';
                                echo '<input type="hidden" name ="profit" id="profit" value="'.$profit.'">';
                                if ($tmpCanclik>0){
                                  echo '<input type="hidden" name ="canclick" id="canclick" value="0">';
                                }
                                else{
                                  echo '<input type="hidden" name ="canclick" id="canclick" value="1">';
                                }
                              } else {
                                echo "ไม่มีข้อมูลสินค้าย่อย<br>";

                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <br>
                      <br>

                   <!--  <form id="products-manufacture-add">
                      <input type="hidden" name ="sub_id" id="sub_id" value="">
                      <input type="hidden" name ="sub_no" id="sub_no" value="">

                      <input type="hidden" name ="cost_tmp" id="cost_tmp" value="">
                      <input type="hidden" name ="total_price_tmp" id="total_price_tmp" value="">
                      <input type="hidden" name ="profit_tmp" id="profit_tmp" value="">
                    </form>  -->
                    <!-- <?php 
                    // $user_status
                    $button_status ="";
                    if ($pdm_status==4) {
                      $button_status = "disabled";
                    }
                    $show_confirm_button = '<button class="btn btn-primary btn-user btn-block" id ="add-manufacture1" name="pdm_status" value="4" type="submit" '.$button_status.'> 
                    ดำเนินการเรียบร้อยแล้ว
                    </button>'; 
                    $show_cancel_button = '<button class="btn btn-danger btn-user btn-block" id ="add-manufacture1" name="pdm_status" value="99" type="submit" '.$button_status.'> 
                    ยกเลิกรายการ
                    </button>
                    ';
                     //echo $user_status;
                    if ($user_status==99) {
                      echo $show_confirm_button."<hr>";
                    }
                    ?> -->
                  </form>

                  <!-- <a href="./products-manufacture-approve.php"><button class="btn btn-success btn-user btn-block">
                    ย้อนกลับ
                  </button></a>  -->

                  <hr> 
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
        <script type="text/javascript">
          $("#material-form").hide();
          $("#group-amount").hide();
          $("#material-group").hide();
          $("#show-table-manufacture").hide();
          $("input[name=sp_cul_or_not]").change(function(){
            if($("input[name=sp_cul_or_not]:checked").val()=="1"){
              $("#group-amount").show();
              $("#material-form").show();
            }
            else{
              $("#group-amount").hide();
              $("#material-form").show();
            }
          });

        </script>
        <script type="text/javascript" src="./js/show-sub-products.js"></script>
        <script type="text/javascript" src="./js/products-manufacture-add.js"></script>
        <script type="text/javascript">
          $("#show-table-manufacture3").show();
          $inputs = $(".input-lock");
          $inputs.prop("disabled", true);


        </script>
      </body>
      </html>



