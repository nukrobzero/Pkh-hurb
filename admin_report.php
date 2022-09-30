<?php include "./process/check_user.php";
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>P.PHUKA HERB - หน้ารายงานยอดขาย</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <style type="text/css">
    @media print {

      body * {
      /*width: 100% !important;
      position: absolute  !important;
      top: 0 !important;*/
      visibility: hidden;
    }

    .text-status{
      display: none;
    }
    .show_cost{
      display: none;
    }
    #section-to-print, #section-to-print * {
      visibility: visible;
    }
    #section-to-print {
      margin: 0;
      width: 100%;
      position: absolute;
      top: 0;
      left: 0;
    }
    .container-fluid,#wrapper{
      width: 100% !important;
      position: absolute  !important;
      top: 0 !important;
    }
    #accordionSidebar,.no_p{
      display: none;
    }
  }
</style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include "./components/allMenu.php";?>

    <!-- Begin Page Content -->
    <div class="container-fluid" >
      <!-- DataTales Example -->
      <div class="card shadow mb-4" id="section-to-print">
        <div class="card-header py-3">
          <h4 class="m-0 font-weight-bold text-primary">หน้ารายงานยอดขาย</h4>
        </div>
        <div class="card-body">
          <div class="col-12 row">
            <div class="col-md-12 col-sm-12 col-lg-6 col-12">
              <div class="no_p">
                <div class="col-sm-12 mb-3 mb-sm-0">
                  <label class="m-0 font-weight-bold text-warning">ประเภทสินค้า</label>
                  <select  class="form-control form-control-user" name="ctg_type" id="ctg_type">
                    <?php 
                    $sum_tatol_discount_price = 0;
                    $sum_tatol_product_price = 0;

                    $t_id = htmlspecialchars(isset($_GET["t_id"])?$_GET["t_id"]:'0');
                    $s_date = isset($_GET["s_date"])?$_GET["s_date"]:'0000-01-01';
                    $e_date = isset($_GET["e_date"])?$_GET["e_date"]:'9999-12-31';
                    if ($s_date ==''){
                      $s_date = "0001-01-01";
                    }
                    if ($e_date ==''){
                      $e_date = "9999-12-31";
                    }
                    $tmp_s_date = date('Y-m-d',strtotime($s_date));
                    $tmp_e_date = date('Y-m-d',strtotime($e_date));
         // echo $tmp_s_date.$tmp_e_date;
                    if ($t_id == 0 ){
                      $sql ="SELECT  pd_name,p_title,SUM(sp_no) AS sp_no,sp_price,b_date,SUM(count) AS count,status,p_percent
                      FROM bill_products INNER JOIN cart ON bill_products.cart_id = cart.cart_id INNER JOIN cart_product_list ON cart.cart_id = cart_product_list.cart_id INNER JOIN sub_products ON cart_product_list.sp_id = sub_products.sp_id INNER JOIN products ON sub_products.pd_id = products.pd_id INNER JOIN promotions ON sub_products.pro_id = promotions.p_id INNER JOIN category ON products.ctg_id = category.ctg_id WHERE bill_products.status = 3 AND bill_products.b_date>='$tmp_s_date' AND bill_products.b_date<='$tmp_e_date' group by sub_products.sp_id ORDER BY bill_products.b_date DESC"; 

                    }
                    else {
                     $sql ="SELECT  pd_name,p_title,SUM(sp_no) AS sp_no,sp_price,b_date,SUM(count) AS count,status,p_percent
                     FROM bill_products INNER JOIN cart ON bill_products.cart_id = cart.cart_id INNER JOIN cart_product_list ON cart.cart_id = cart_product_list.cart_id INNER JOIN sub_products ON cart_product_list.sp_id = sub_products.sp_id INNER JOIN products ON sub_products.pd_id = products.pd_id INNER JOIN promotions ON sub_products.pro_id = promotions.p_id INNER JOIN category ON products.ctg_id = category.ctg_id WHERE bill_products.status = 3 AND category.ctg_id =$t_id AND DATE(bill_products.b_date)>='$tmp_s_date' AND DATE(bill_products.b_date)<='$tmp_e_date' group by sub_products.sp_id ORDER BY sp_price DESC"; 
                   }

                   $result = $conn->query($sql);
                   echo $conn->error;
               // exit;

                   $sql_cate = "SELECT * FROM category";
                   $result_cate = $conn->query($sql_cate);  
                   echo '<option value="0">เลือกประเภทสินค้า</option>';
                   if ($result_cate->num_rows > 0) {
                    while ( $row_cate = $result_cate->fetch_assoc())
                    {
                      echo '<option value="'.$row_cate["ctg_id"].'">'.$row_cate["ctg_type"].'</option>';
                    }   
                  } else {
                    // echo "0 results";
                  }


                  ?>
                </select>
                <!-- </div> -->
              </div>
              <div class="form-group">
                <div class="col-sm-12 mb-3 mb-sm-0">
                  <label class="m-0 font-weight-bold text-warning">ว/ด/ป เริ่ม</label>
                  <input type="date" class="form-control form-control-user" id="start_date" placeholder="" name="user_birthday" value="<?php echo $s_date; ?>">
                </div>
                <div class="col-sm-12">
                  <label class="m-0 font-weight-bold text-warning">ว/ด/ป สิ้นสุด</label>
                  <input type="date" class="form-control form-control-user" id="end_date" placeholder="" name="user_birthday2" value="<?php echo $e_date; ?>">
                </div>
              </div>
            </div>

          </div>
          <div class="col-md-12 col-sm-12 col-lg-6 col-12">
            <canvas id="myChart"></canvas>
          </div>
        </div>
        <br>
        <br>
        
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ชื่อสินค้า</th>
                <th>โปรโมชั่น</th>
                <th>จำนวนที่ซื้อ</th>
                <th>ราคา/ขวด</th>
                <th>ราคา/ขวด(โปรโมชั่น)</th>
                <th>ยอดขาย</th>
                <th>ยอดขาย(มีส่วนลดโปรโมชั่น)</th>
                <th>วันที่ทำรายการ</th>
                <th>สถานะ</th>
              </tr>
            </thead>
            <tbody>
              <?php

              if ($result->num_rows > 0) {
                $i = 1;

                        // output data of each row
                while($row = $result->fetch_assoc()) {
                  $discount_price = $row["sp_price"] - $row["sp_price"]*($row["p_percent"]/100);
                  $product_price_tatol = $row["sp_price"]*$row["count"];
                  $tatol_discount_price = $discount_price*$row["count"];
                  $sum_tatol_discount_price+=$tatol_discount_price;
                  $sum_tatol_product_price+=$product_price_tatol;
                  $counts = $row["count"];
                  $discount_p = $row["sp_price"]*($row["p_percent"]/100);


                // $total_sp_packeting_cost = floatval($row["sp_packeting_cost"])*floatval($row["count"]);
                // $cost += floatval($material_use)*floatval($material_price);
                // $total_cost = $total_sp_packeting_cost+$cost;
                // $profit = $total_price - $total_cost;


                  $status_bill;
                  if ($row["status"]== 1) {
                    $status_bill = "โอนเงินแล้ว";
                  }else if ($row["status"]== 2) {
                    $status_bill = "กำลังเตรียมจัดส่ง";
                  }else if ($row["status"]== 3) {
                    $status_bill = "จัดส่งเรียบร้อยแล้ว";
                  }else{
                    $status_bill = "รอชำระเงิน";
                  }

                  $sp_price = number_format($row["sp_price"],2);
                  echo '
                  <tr>
                  <td>'.$row["pd_name"].'</td>
                  <td>'.$row["p_title"].'</td>
                  <td>'.$row["count"].'</td>
                  <td>'.$sp_price.'</td>
                  <td>'.number_format($discount_price,2).'</td>
                  <td>'.number_format($product_price_tatol,2).'</td>
                  <td>'.number_format($tatol_discount_price,2).'</td>
                  <td>'.$row["b_date"].'</td>
                  <td>'.$status_bill.'</td>
                  </tr>
                  ';
                  $i++;                     
                } 
              } else {
                // echo "0 results";
              }

              ?>
            </tbody>
          </table>
          
          <br>
          <br>
          <br>
          <div class="col-12">
            <!-- <?php echo '<input type="hidden" name="" id="sum_tatol_discount_price_hidden" value="'.$sum_tatol_product_price.'">'; 
            ?>
            <h5 id="sum_tatol_product_price">รวมยอดขาย :: <span style="color:#000000;background-color:#2CE1C9;" id="sum_tatol_product_price_num"><?php echo number_format($sum_tatol_product_price,2); ?> ฿</span></h5>

            <?php 
            $cost =0;
            $sql_cost = "SELECT SUM(pdm_cost) AS pdm_cost, SUM(pdm_profit) AS pdm_profit,pdm_no  FROM products_manufacture WHERE DATE(pdm_date)>='$tmp_s_date' AND DATE(pdm_date)<='$tmp_e_date'";
            $result_cost = $conn->query($sql_cost);  
            if ($result_cost->num_rows > 0) {
              $row_cost = $result_cost->fetch_assoc();
              $costs = $row_cost["pdm_cost"]; 
              $profits = $row_cost["pdm_profit"]; 
              $pdm_no = $row_cost["pdm_no"];
            }
            //cost/number
            if ($counts =='') {
              $counts = 0;
            }
            if ($costs !='') {
            	$cost_s = $costs/$pdm_no;
             $cost = $cost_s*$counts;
           }else{
             $cost = 0;
           }

            //profut/number
           if ($profits !='') {
            $profit_s = $profits/$pdm_no;
            $profit = $profit_s*$counts;
          }else{
           $profit = 0;
         }

         ?>
         <?php echo '<input type="hidden" name="" id="cost" value="'.$cost.'">'; ?>
         <h5 id="cost">ต้นทุน :: <span style="color:#000000;background-color:#2CE1C9;"><?php echo number_format($cost,2); ?> ฿</span></h5>
         <h5 id="cost">กำไร :: <span style="color:#000000;background-color:#2CE1C9;"><?php echo number_format($profit,2); ?> ฿</span></h5>


         <?php echo '<input type="hidden" name="" id="sum_tatol_discount_price_hidden" value="'.$sum_tatol_discount_price.'">'; ?>
         <h5 id="sum_tatol_discount_price">รวมยอดขาย(มีส่วนลดโปรโมชั่น) :: <span style="color:#000000;background-color:#2EC4EC;" id="sum_tatol_discount_price_num"><?php echo number_format($sum_tatol_discount_price,2); ?> ฿</span></h5> -->
 <!--          <?php
            //cost/number

         if ($costs !='') {
           $cost_s = $costs/$pdm_no;
           $cost_d = ($cost_s*$counts);
         }else{
           $cost_d = 0;
         }
            //profut/number
          //profut/number
           if ($profits !='') {
            $profit_s = $profits/$pdm_no;
            $profit_d = $profit_s*$counts;
          }else{
           $profit_d = 0;
         }
         ?>
         <?php echo '<input type="hidden" name="" id="cost_d" value="'.$cost_d.'">'; ?>
         <h5 id="cost_d">ต้นทุน :: <span style="color:#000000;background-color:#2EC4EC;"><?php echo number_format($cost_d,2); ?> ฿</span></h5>
         <h5 id="cost">กำไร :: <span style="color:#000000;background-color:#2EC4EC;"><?php echo number_format($profit_d,2); ?> ฿</span></h5> --> -->
       </div>

       <!-- </div> -->

     </div>
     <br>
     <br>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="js/utils.js"></script>

<script>
  //SET DEFALTE VALUE OF HTML CONTENT
  $('#ctg_type option[value="<?php echo $t_id; ?>"]').attr("selected",true);
  $("#sum_tatol_discount_price_num").text("<?php echo number_format($sum_tatol_discount_price,2); ?> ฿");
  $("#sum_tatol_product_price_num").text("<?php echo number_format($sum_tatol_product_price,2); ?> ฿");
  
  var tmp_s_date = "<?php echo $s_date; ?>";
  var tmp_e_date = "<?php echo $e_date; ?>";
  // alert(tmp_e_date);
  if(tmp_s_date=="0001-01-01")
    $( "#start_date" ).val("");
  if(tmp_e_date=="9999-12-31")
    $( "#end_date" ).val("");

  var type_id = $("#ctg_type").val();
  var s_date = $( "#start_date" ).val();
  var e_date = $( "#end_date" ).val();

  $( "#ctg_type" ).change(function() {
    type_id = $("#ctg_type").val();
    window.location.href="admin_report.php?t_id="+type_id+"&s_date="+s_date+"&e_date="+e_date;
  });

  $( "#start_date" ).change(function() {
    s_date = $( "#start_date" ).val();
    window.location.href="admin_report.php?t_id="+type_id+"&s_date="+s_date+"&e_date="+e_date;
  });
  $( "#end_date" ).change(function() {
    e_date = $( "#end_date" ).val();
    window.location.href="admin_report.php?t_id="+type_id+"&s_date="+s_date+"&e_date="+e_date;
  });
</script>
<script type="text/javascript">
  <?php
  if ($t_id == 0 ){
    $sql ="SELECT SUM(sp_price*count) AS product_price_tatol,SUM((sp_price-sp_price*(p_percent/100))*count) AS sum_tatol_discount_price, MONTH(b_date) AS b_date FROM bill_products INNER JOIN cart ON bill_products.cart_id = cart.cart_id INNER JOIN cart_product_list ON cart.cart_id = cart_product_list.cart_id INNER JOIN sub_products ON cart_product_list.sp_id = sub_products.sp_id INNER JOIN products ON sub_products.pd_id = products.pd_id INNER JOIN promotions ON sub_products.pro_id = promotions.p_id INNER JOIN category ON products.ctg_id = category.ctg_id WHERE bill_products.status = 3  group by MONTH(b_date) "; 

  }
  else {
    $sql ="SELECT SUM(sp_price*count) AS product_price_tatol,SUM((sp_price-sp_price*(p_percent/100))*count) AS sum_tatol_discount_price, MONTH(b_date) AS b_date FROM bill_products INNER JOIN cart ON bill_products.cart_id = cart.cart_id INNER JOIN cart_product_list ON cart.cart_id = cart_product_list.cart_id INNER JOIN sub_products ON cart_product_list.sp_id = sub_products.sp_id INNER JOIN products ON sub_products.pd_id = products.pd_id INNER JOIN promotions ON sub_products.pro_id = promotions.p_id INNER JOIN category ON products.ctg_id = category.ctg_id WHERE bill_products.status = 3 AND category.ctg_id =$t_id group by MONTH(b_date) "; 

  }
  $result = $conn->query($sql);
  $array_summary;
  while($row = $result->fetch_assoc()) {
    $i=$row["b_date"]-1;

    $array_summary[$i][0] = $row["product_price_tatol"];
    $array_summary[$i][1] = $row["sum_tatol_discount_price"];

    //echo 'alert(" '.$row["b_date"].' "+" '.$row["sum_tatol_discount_price"].' ");';
  }
  $sql_cost = "SELECT SUM(pdm_cost) AS pdm_cost, MONTH(pdm_date) AS pdm_date, SUM(pdm_no) AS pdm_no, SUM(count) AS count FROM products_manufacture INNER JOIN bill_products INNER JOIN cart ON bill_products.cart_id = cart.cart_id INNER JOIN cart_product_list ON cart.cart_id = cart_product_list.cart_id group by MONTH(pdm_date)";
  $result_cost = $conn->query($sql_cost);  
  if ($result_cost->num_rows > 0) {
    while($row_cost = $result_cost->fetch_assoc()) {
      $i=$row_cost["pdm_date"]-1;
      $cost_sum = $row_cost["pdm_cost"]/$row_cost["pdm_no"];
      $cost_sum_all = $cost_sum*($row_cost["count"]);
      $array_summary[$i][2] = $cost_sum_all; 
    }
  }
  echo "var array_summary_product_price_tatol =[];";
  echo "var array_summary_sum_tatol_discount_price =[];";
  echo "var array_cost =[];";
  for ( $i = 0; $i < 12; $i++) {
    if(!empty($array_summary[$i][0]))
      echo "array_summary_product_price_tatol[".$i."] = ".$array_summary[$i][0].";";
    else
      echo "array_summary_product_price_tatol[".$i."] = 0;";
    if(!empty($array_summary[$i][1]))
      echo "array_summary_sum_tatol_discount_price[".$i."] = ".$array_summary[$i][1].";";
    else
      echo "array_summary_sum_tatol_discount_price[".$i."] = 0;";
    if(!empty($array_summary[$i][2]))
      echo "array_cost[".$i."] = ".$array_summary[$i][2].";";
    else
      echo "array_cost[".$i."] = 0;";
  }
  $conn->close();
  ?>
  var MONTHS = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
  var color = Chart.helpers.color;

  var barChartData = {
    labels: MONTHS,
    datasets: [{
      label: 'ยอดขายรวม',
      backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
      borderColor: window.chartColors.red,
      borderWidth: 1,
      data: array_summary_product_price_tatol 
    }, {
      label: 'ยอดขายโปรโมชั่น',
      backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
      borderColor: window.chartColors.blue,
      borderWidth: 1,
      data: array_summary_sum_tatol_discount_price
    }, {
      label: 'รายจ่ายต้นทุน',
      backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
      borderColor: window.chartColors.green,
      borderWidth: 1,
      data: array_cost
    }
    ]

  };
  window.onload = function() {
    var ctx = document.getElementById('myChart').getContext('2d');
    window.myBar = new Chart(ctx, {
      type: 'bar',
      data: barChartData,
      options: {
        responsive: true,
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          text: 'กราฟรายงานยอดขาย ร้านสมุนไพรพ่อปู่พูคา'
        }
      }
    });

  };
</script>
</body>

</html>
