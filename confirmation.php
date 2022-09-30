<!doctype html>
<html lang="zxx">
<?php 
 include './process/connect.php';
 ?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>P.PHUKA HERB สมุนไพรพ่อปู่พูคา - ติดตามสถานะสินค้า </title>
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
                          <h2>ติดตามสถานะสินค้า</h2>
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
        <div class="col-lg-12">
          <div class="confirmation_tittle">
            <span>Thank you. Your order has been received.</span>
          </div>
        </div>
        <div class="form-box f-right ">
                                  <form method="get" action ="index_search.php" id="index_search">
                                    <input type="text" name="search" placeholder="ค้นหาหมายเลขรายการสั่งซื้อของคุณได้ที่นี่...">
                                    <div class="search-icon" onclick="clickAction()">
                                      <i class="fas fa-search special-tag"></i>
                                    </div>
                                  </form>
                                </div>
                                <div class="order_details_iner">
            <div class="bg-light d-flex justify-content-between">
              <div><h3>รายละเอียดการสั่งซื้อ</h3></div>
                 <div><a href="#" style="color:#000000;background-color:#6DFCED;">จัดการคำสั่งซื้อ</a></div>
              </div>
              <br>
            <table class="table table-borderless">
              <form action="./process/checkout.php" method="_GET">
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
                  <th scope="col">จำนวน</th>
                </tr>
              </thead>
              <tbody>
                <?php
                	$search =  htmlspecialchars( isset($_GET['search'])?$_GET['search']:'');

                	$bp_id = htmlspecialchars( isset($_GET['bp_id'])?$_GET['bp_id']:'');
                    $sp_id = htmlspecialchars( isset($_GET['sp_id'])?$_GET['sp_id']:'');
                    $sp_no= ISSET($_GET["sp_no"])?$_GET["sp_no"]:'';
                    $cart_user_id= ISSET($_GET["cart_user_id"])?$_GET["cart_user_id"]:'';
                    $cart_id = htmlspecialchars( isset($_GET['cart_id'])?$_GET['cart_id']:'');

                    $user_username = isset($_SESSION["user_username"])?$_SESSION["user_username"]:'' ;
                    $user_id = isset($_SESSION["user_id"])?$_SESSION["user_id"]:'' ;
  
                    $sql = "SELECT * FROM bill_products INNER JOIN cart ON bill_products.cart_id = cart.cart_id INNER JOIN cart_product_list ON cart.cart_id = cart_product_list.cart_id INNER JOIN sub_products ON cart_product_list.sp_id = sub_products.sp_id INNER JOIN products ON sub_products.pd_id = products.pd_id INNER JOIN promotions ON sub_products.pro_id = promotions.p_id WHERE cart_user_id = '".$user_id."' and cart_status = 1 LIKE '%".$search."%' ORDER BY bill_products.bp_id DESC";
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
                  <th>x '.$row["count"].'</th>
                </tr>
              
              ';
              $i++;
                    }
                  }
                    echo $conn->error;
                    ?>
              </tbody>
              
            </form>
            </table>
          </div>
        </div>
        <!-- <div class="col-lg-6 col-lx-4">
          <div class="single_confirmation_details">
            <h4>Billing Address</h4>
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
        <div class="col-lg-6 col-lx-4">
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
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="order_details_iner">
            <h3>Order Details</h3>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col" colspan="2">Product</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th colspan="2"><span>Pixelstore fresh Blackberry</span></th>
                  <th>x02</th>
                  <th> <span>$720.00</span></th>
                </tr>
                <tr>
                  <th colspan="2"><span>Pixelstore fresh Blackberry</span></th>
                  <th>x02</th>
                  <th> <span>$720.00</span></th>
                </tr>
                <tr>
                  <th colspan="2"><span>Pixelstore fresh Blackberry</span></th>
                  <th>x02</th>
                  <th> <span>$720.00</span></th>
                </tr>
                <tr>
                  <th colspan="3">Subtotal</th>
                  <th> <span>$2160.00</span></th>
                </tr>
                <tr>
                  <th colspan="3">shipping</th>
                  <th><span>flat rate: $50.00</span></th>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th scope="col" colspan="3">Quantity</th>
                  <th scope="col">Total</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div> -->
      </div>
    </div>
  </section>
  <!--================ confirmation part end =================-->

  <footer>
    <!-- Footer Start-->
    
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
                        var x = document.getElementById("index_search");

                        function clickAction(){
        x.submit();// Form submission
      }
    </script>
        
</body>

</html>