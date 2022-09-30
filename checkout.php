<!doctype html>
<html lang="zxx">
<?php 
 include './process/connect.php';
 ?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>P.PHUKA HERB สมุนไพรพ่อปู่พูคา - ชำระเงิน </title>
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
</head>

<body>

  <?php include "./components/header_index.php";?>

    <!-- slider Area Start-->
    <div class="slider-area ">
      <!-- Mobile Menu -->
      <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
          <div class="container">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="hero-cap text-center">
                          <h2>ชำระเงิน</h2>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- slider Area End-->

  <!--================ confirmation part start =================-->
  <section class="confirmation_part section_padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-lx-4">
          <?php 
            $user_id = isset($_SESSION["user_id"])?$_SESSION["user_id"]:'' ;
            $sql ="SELECT * FROM users where user_id = '$user_id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
            } else {
              echo "0 results";
            }
            ?>
          <div class="single_confirmation_details">
            <div class="bg-light d-flex justify-content-between">
              <div><h4>ที่อยู่ในการจัดส่ง</h4></div>
                 <div><a href="./checkout-edit.php?user_id=<?php echo $user_id; ?>" style="color:#000000;background-color:#6DFCED;">แก้ไข</a></div>
              </div>
              <hr>
            <ul>
              <li>
                <p>ชื่อ-สกุล</p><span>: <?php echo $row["user_pre_name"]; ?>  <?php echo $row["user_last_name"]; ?></span>
              </li>
              <li>
                <p>ที่อยู่</p><span>: <?php echo $row["user_codehome"]; ?>  หมู่. <?php echo $row["user_moo"]; ?> หมู่บ้าน <?php echo $row["user_mooban"]; ?>  ต. <?php echo $row["user_district"]; ?></span>
              </li>
              <li>
                <p>เขต/อำเภอ</p><span>: <?php echo $row["user_amphur"]; ?></span>
              </li>
              <li>
                <p>จังหวัด</p><span>: <?php echo $row["user_province"]; ?></span>
              </li>
              <li>
                <p>รหัสไปรษณีย์</p><span>: <?php echo $row["user_postcode"]; ?></span>
              </li>
              <li>
                <p>โทรศัพท์</p><span>: <?php echo $row["user_tel"]; ?></span>
              </li>
            </ul>
         </div>
        </div>
        <!-- <div class="col-lg-6 col-lx-4">
          <div class="single_confirmation_details">
            <h4>shipping Address</h4>
            <ul>
              <li>
                <p>Street</p><span>: 56/8</span>
              </li>
              <li>
                <p>city</p><span>: Los Angeles</span>
              </li>
              <li>
                <p>country</p><span>: United States</span>
              </li>
              <li>
                <p>postcode</p><span>: 36952</span>
              </li>
            </ul>
          </div>
        </div>
      </div> -->
      <div class="row">
        <div class="col-lg-12">
          
          <div class="order_details_iner">
            <div class="bg-light d-flex justify-content-between">
              <div><h3>รายละเอียดการสั่งซื้อ</h3></div>
                 <div><a href="./cart.php" style="color:#000000;background-color:#6DFCED;">แก้ไข</a></div>
              </div>
              <br>
            <table class="table table-borderless">
              <?php
              $bp_id= ISSET($_GET["bp_id"])?$_GET["bp_id"]:'';
              $cart_id= ISSET($_GET["cart_id"])?$_GET["cart_id"]:'';
              $status= ISSET($_GET["status"])?$_GET["status"]:'';
              $b_date= ISSET($_GET["b_date"])?$_GET["b_date"]:'';
               ?>
              <form action="./process/checkout.php?bp_id=<?php echo $bp_id; ?>&cart_id=<?php echo $cart_id; ?>&status=<?php echo $status; ?>&b_date=<?php echo $b_date; ?>" method="_GET">
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
                    $sp_no= ISSET($_GET["sp_no"])?$_GET["sp_no"]:'';
                    $cart_user_id= ISSET($_GET["cart_user_id"])?$_GET["cart_user_id"]:'';

                    $user_username = isset($_SESSION["user_username"])?$_SESSION["user_username"]:'' ;
                    $user_id = isset($_SESSION["user_id"])?$_SESSION["user_id"]:'' ;
  
                    $sql = "SELECT * FROM cart INNER JOIN cart_product_list ON cart.cart_id = cart_product_list.cart_id INNER JOIN sub_products ON cart_product_list.sp_id = sub_products.sp_id INNER JOIN products ON sub_products.pd_id = products.pd_id INNER JOIN promotions ON sub_products.pro_id = promotions.p_id WHERE cart_user_id = '".$user_id."' and cart_status = 0 ORDER BY cart_p_id DESC";
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
                    echo $conn->error;
                    ?>
              </tbody>
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col"colspan="2">รูปแบบการจัดส่ง</th> 
                  <th scope="col"colspan="2">
                      <input type="radio" id="delivery1" name="delivery" value="50" checked="">
                      <label for="delivery1"> ส่งธรรมดา(+50 ฿)</label>   
                  </th>
                  <th scope="col"colspan="2">
                      <input type="radio" id="delivery2" name="delivery" value="100">
                      <label for="delivery2"> ส่งด่วน(+100 ฿)</label>   
                  </th>
                      <br>
                    </div>   
                  
                </tr>
              </thead>
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
                  <th scope="col" id="sum_tatol_discount_price2"><?php echo number_format($sum_tatol_discount_price,2); ?> ฿</th>
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
                  <!-- <th scope="col"></th> -->
                  <th colspan="2" class="text-right checkout_btn_inner float-right">
                    <button class="btn_1 checkout_btn_1" >ยืนยันคำสั่งซื้อ</button>
                  </th>
                </tr>
              </tfoot>
            </form>
            </table>
          </div>
        </div>
      </div>
    </div>
      
  </section>
  <!--================ confirmation part end =================-->

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