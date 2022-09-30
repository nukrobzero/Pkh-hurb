<?php 
include "./process/connect.php";
?>
<!doctype html>
<html lang="zxx">


<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>P.PHUKA HERB สมุนไพรพ่อปู่พูคา - แจ้งการโอนเงิน </title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="site.webmanifest">
  <link rel="shortcut icon" type="image/x-icon" href="./img/logoaa.png">

  <!-- CSS here -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/flaticon.css">
  <link rel="stylesheet" href="assets/css/slicknav.css">
  <link rel="stylesheet" href="assets/css/animate.min.css">
  <link rel="stylesheet" href="assets/css/magnific-popup.css">
  <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="assets/css/themify-icons.css">
  <link rel="stylesheet" href="assets/css/slick.css">
  <link rel="stylesheet" href="assets/css/nice-select.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <style type="text/css">
  @media print {
      
    body * {
      /*width: 25cm;*/
      padding: 0;
      margin: 0;
      visibility: hidden;
      /*display: none;*/
    }
    body{
      /*display: none;*/
    }
    .hidden_print ,.hidden_print *{
      display: none;
      /*height: 0px !important;*/
    }
    .section_print ,.section_print *{
      visibility: visible;
      /*margin-top: -5%; */
      /*display: block !important;*/
      /*position: absolute;*/
      /*width: 100%;*/
      /*height: 800px;*/
      /*top:0;*/
    }
    .section_print{
      margin-top: -50%; 
    }
    #employee_name{
      visibility: visible;
      display: inline  !important;
    }
  }
  </style>
</head>

<body>
  <div class="hidden_print">
 <?php include "./components/header_index.php";?>

 <!-- slider Area Start-->
 <div class="slider-area ">
  <!-- Mobile Menu -->
  <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="hero-cap text-center">
            <h2>แจ้งการโอนเงิน</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- slider Area End-->

<!--================Checkout Area =================-->
<section class="checkout_area section_padding">
  <div class="container section_print">

    <div class="billing_details">
      <div class="row">
        <div class="col-lg-12">
          <?php
          $cart_id= ISSET($_GET["cart_id"])?$_GET["cart_id"]:'';
          ?>
          <form class="row contact_form" action="./process/uploadslip.php?cart_id=<?php echo $cart_id; ?>" method="post" novalidate="novalidate" enctype="multipart/form-data">
            <div class="col-lg-10 container">
              <h3>แจ้งการโอนเงิน</h3>
              <div class="col-lg-12">

                <div class="order_details_iner">
                  <div class="bg-light d-flex justify-content-between">
                    <?php 
                    $status= ISSET($_GET["status"])?$_GET["status"]:'';
                    $cart_id= ISSET($_GET["cart_id"])?$_GET["cart_id"]:'';
                    $b_date= ISSET($_GET["b_date"])?$_GET["b_date"]:'';
                    $sql = "SELECT * FROM  bill_products WHERE cart_id = '$cart_id'";
                    $result = $conn->query($sql);
                    $cart_code = "C-".str_pad($cart_id, 6, "0", STR_PAD_LEFT);
                    $status_bill;
                    if ($status== 1) {
                      $status_bill = "โอนเงินแล้ว";
                    }else if ($status== 2) {
                      $status_bill = "กำลังเตรียมจัดส่ง";
                    }else if ($status== 3) {
                      $status_bill = "จัดส่งเรียบร้อยแล้ว";
                    }else{
                      $status_bill = "รอชำระเงิน";
                    }
                    ?>
                    <div><h3>คำสั่งซื้อ: <?php echo $cart_code;?></h3><h3>วันที่ทำรายการ: <?php echo $b_date;?></h3></div>
                    <h3 class="hidden_print">สถานะ :<div style="color:#000000;background-color:#6DFCED;"> <?php echo $status_bill; ?></div>
                    </div>
                  </h3>
                  <br>
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col" colspan="2">รายการสินค้า</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">ราคาต่อหน่วย</th>
                        <th scope="col">จำนวน</th>
                        <th scope="col">ราคารวม</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sp_id = htmlspecialchars( isset($_GET['sp_id'])?$_GET['sp_id']:'');
                      $bp_id = isset($_GET["bp_id"])?$_GET["bp_id"]:'';
                      $sp_no= ISSET($_GET["sp_no"])?$_GET["sp_no"]:'';
                      $cart_user_id= ISSET($_GET["cart_user_id"])?$_GET["cart_user_id"]:'';
                      $cart_id= ISSET($_GET["cart_id"])?$_GET["cart_id"]:'';
                      $delivery_number= ISSET($_GET["delivery_number"])?$_GET["delivery_number"]:'';

                      $user_username = isset($_SESSION["user_username"])?$_SESSION["user_username"]:'' ;
                      $user_id = isset($_SESSION["user_id"])?$_SESSION["user_id"]:'' ;

                      $sql = "SELECT * FROM  bill_products INNER JOIN  cart ON bill_products.cart_id = cart.cart_id INNER JOIN cart_product_list ON cart.cart_id = cart_product_list.cart_id INNER JOIN sub_products ON cart_product_list.sp_id = sub_products.sp_id INNER JOIN products ON sub_products.pd_id = products.pd_id INNER JOIN promotions ON sub_products.pro_id = promotions.p_id WHERE cart_user_id = '".$user_id."' and cart_status = 1 and cart.cart_id = '".$cart_id."'ORDER BY cart_p_id DESC";
                      $result = $conn->query($sql);
                      $sum_tatol_discount_price = 0;
                      if ($result->num_rows > 0) {
                        $i = 1;
                        while ($row = $result->fetch_assoc()) {
                          $discount_price = $row["sp_price"] - $row["sp_price"]*($row["p_percent"]/100);
                      //echo $row["p_percent"];
                          $product_price = $row["sp_price"];
                          $tatol_discount_price = $discount_price*$row["count"];
                          $sum_tatol_discount_price+=$tatol_discount_price;

                          echo '
                          <tr>
                          <th><span>'.$i.'.</span></th>
                          <th colspan="2">
                          <div class="media">
                          <div class="d-flex">
                          <img src="img/uploads/sub_products/'.$row["sp_img"].'" alt="" width="200" height="100" />
                          </div>
                          <div class="media-body">
                          <th colspan="3"><span>'.$row["pd_name"].'</span></th>
                          </div>
                          </div>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th> <span>'.number_format($discount_price,2).' ฿</span></th>    
                          <th>x '.$row["count"].'</th>
                          <th> <span id="tatol_discount_price'.$row["cart_p_id"].'"class="last">'.number_format($tatol_discount_price,2).' ฿</span></th>
                          </tr>

                          ';
                          $i++;
                        }
                      }
                ///query printf bill
                      // $employee_id= ISSET($_GET["employee_id"])?$_GET["employee_id"]:'';
                      $sql_printf_bill = "SELECT * FROM bill_products INNER JOIN staff ON bill_products.employee_id = staff.staff_id WHERE bill_products.cart_id = '$cart_id'";
                      $result_printf_bill = $conn->query($sql_printf_bill);
                      $row_printf_bill = $result_printf_bill->fetch_assoc();
                      // echo "<span  id='employee_name' style='display: none;'>".$row_printf_bill["staff_pre_name"]." ".$row_printf_bill["staff_last_name"]."</span>";
                      // echo $conn->error;
                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col" colspan="2">ยอดรวม</th>
                        <?php echo '<input type="hidden" name="" id="sum_tatol_discount_price_hidden" value="'.$sum_tatol_discount_price.'">'; ?>
                        <th scope="col" id="sum_tatol_discount_price"><?php echo number_format($sum_tatol_discount_price,2); ?> ฿</th>
                        <th scope="col"></th>
                      </tr>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col" colspan="2">ค่าจัดส่ง</th>
                        <?php echo '<input type="hidden" name="" id="delivery" value="">'; ?>
                        <th scope="col" >
                          <span id="delivery_budget" style="color:#000"><?php echo number_format(0,0); ?></span>.00 ฿
                        </th>
                        <th scope="col"></th>
                      </tr>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col" colspan="2">ยอดรวมทั้งสิ้น</th>
                        <?php echo '<input type="hidden" name="" id="sum_tatol_discount_price_hidden2" value="'.$sum_tatol_discount_price.'">'; ?>
                        <th scope="col" id="sum_tatol_discount_price2"><?php echo number_format($sum_tatol_discount_price,2); ?> .00 ฿</th>
                        <th scope="col"></th>
                      </tr>

                      <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">
                          <?php 
                           echo "<span class='section_print' id='employee_name' style='display: none;'>"."ลงชื่อ"." ".$row_printf_bill["staff_pre_name"]." ".$row_printf_bill["staff_last_name"]." "." พนักงานผู้ดำเนินการ"."</span>";
                          ?>
                        </th>
                        <!-- <th scope="col"></th> -->
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <?php 
          $hide_uploadslip = "";
          if ($status == 1) {
            $hide_uploadslip = "hidden";
            echo '
            <div class="col-md-12 form-group p_star">
            <label class="m-0 font-weight-bold text-warning" '.$hide_uploadslip.'>แนบหลักฐานการโอนเงิน</label>
            <input type="file" class="form-control form-control-user" id="fileToUpload" placeholder="" name="fileToUpload" value="" required="" '.$hide_uploadslip.'>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="col-md-4 form-group p_star " '.$hide_uploadslip.'>
            <button class="btn btn-primary" '.$hide_uploadslip.'>
            ยืนยัน
            </button>
            </div>';
          }else if ($status == 0) {
           echo '
           <div class="col-md-12 form-group p_star">
           <label class="m-0 font-weight-bold text-warning" '.$hide_uploadslip.'>แนบหลักฐานการโอนเงิน</label>
           <input type="file" class="form-control form-control-user" id="fileToUpload" placeholder="" name="fileToUpload" value="" required="" '.$hide_uploadslip.'>
           </div>
           <br>
           <br>
           <br>
           <br>
           <div class="col-md-4 form-group p_star " '.$hide_uploadslip.'>
           <button class="btn btn-primary" '.$hide_uploadslip.'>
           ยืนยัน
           </button>
           </div>';
         }else if ($status == 2 or $status == 3) {
          echo '
          <div class="hidden_print"><h3>หมายเลขพัสดุ : <label style="color:#000000;background-color:#6DFCED;font-family:verdana">'.$delivery_number.'</label></h3></div>
          ';
        }

        ?>
        
        <br>
        <br>
        <br>
        <br>
        <br>
      </form>
      <hr>
    </div>
    <?php 
    if ($status == 2 or $status == 3) { ?>
    <div class="form-group">
          <button class="form-control btn btn-primary hidden_print" id="print" onclick="print()">พิมพ์ใบเสร็จ</button>
        </div>
      <?php } ?>
  </div>
</div>
</div>
</div>
</section>
<!--================End Checkout Area =================-->
<footer>
  <div class="col-xl-5 col-lg-5 col-md-5">
   <div class="footer-copy-right f-right">
     <!-- social -->
     <div class="footer-social">
       <a href="#"><i class="fab fa-twitter"></i></a>
       <a href="#"><i class="fab fa-facebook-f"></i></a>
       <a href="#"><i class="fab fa-behance"></i></a>
       <a href="#"><i class="fas fa-globe"></i></a>
     </div>
   </div>
 </div>
</div>
</div>
</div>

<!-- Footer End-->
</footer>

<!-- JS here -->

<!-- All JS Custom Plugins Link Here here -->
<script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>

<!-- Jquery, Popper, Bootstrap -->
<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="./assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="./assets/js/owl.carousel.min.js"></script>
<script src="./assets/js/slick.min.js"></script>

<!-- One Page, Animated-HeadLin -->
<script src="./assets/js/wow.min.js"></script>
<script src="./assets/js/animated.headline.js"></script>
<script src="./assets/js/jquery.magnific-popup.js"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="./assets/js/jquery.scrollUp.min.js"></script>
<script src="./assets/js/jquery.nice-select.min.js"></script>
<script src="./assets/js/jquery.sticky.js"></script>

<!-- contact js -->
<script src="./assets/js/contact.js"></script>
<script src="./assets/js/jquery.form.js"></script>
<script src="./assets/js/jquery.validate.min.js"></script>
<script src="./assets/js/mail-script.js"></script>
<script src="./assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->	
<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/main.js"></script>

<script type="text/javascript" src="js/thaipost_address/JQL.min.js"></script>
<script type="text/javascript" src="js/thaipost_address/typeahead.bundle.js"></script>
<link rel="stylesheet" href="css/thaipost_address/jquery.Thailand.min.css">
<script type="text/javascript" src="js/thaipost_address/jquery.Thailand.min.js"></script>


<script type="text/javascript">
  // var check_on_page = 0;
  $("#delivery_budget").text(50);
  var sum =0 ;
  sum = parseInt($("#delivery_budget").text()) + parseInt($("#sum_tatol_discount_price_hidden2").val());

  $("#sum_tatol_discount_price2").text(numberWithCommas(sum) + ".00 ฿");

  $("input[name='delivery']").change(function() {
    sum =0 ;
    $("#delivery_budget").text($(this).val());
    sum = parseInt($("#delivery_budget").text()) + parseInt($("#sum_tatol_discount_price_hidden2").val());
    
    $("#sum_tatol_discount_price2").text(numberWithCommas(sum) + ".00 ฿");
    // $("#sum_tatol_discount_price_hidden2").val(sum);
    
  });

  function numberWithCommas2(number) {
    var parts = number.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
  }
  function numberWithCommas(x) {
    return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
  }
</script>


</body>

</html>