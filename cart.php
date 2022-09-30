<!doctype html>
<html lang="zxx">
 <?php 
 include './process/connect.php';
 ?>

 <head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>P.PHUKA HERB สมุนไพรพ่อปู่พูคา - ตะกร้าสินค้า </title>
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
  <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
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
              <h2>ตะกร้าสินค้า</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- slider Area End-->

  <!--================Cart Area =================-->
  <section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <form method="post" action="./process/cart.php">
          <table class="table nav-ask">
            <thead>
              <tr>
                <th scope="col">รายการสินค้า</th>
                <th scope="col">ราคา</th>
                <th scope="col">จำนวน</th>
                <th scope="col">ราคารวม</th>
                <th scope="col">ลบสินค้า</th>
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
                    while ($row = $result->fetch_assoc()) {
                      $discount_price = $row["sp_price"] - $row["sp_price"]*($row["p_percent"]/100);
                      //echo $row["p_percent"];
                      $product_price = $row["sp_price"];
                      $tatol_discount_price = $discount_price*$row["count"];
                      $sum_tatol_discount_price+=$tatol_discount_price;
                      echo '
                  <tr>
                    <td>
                      <div class="media">
                        <div class="d-flex">
                          <img src="img/uploads/sub_products/'.$row["sp_img"].'" alt="" />
                        </div>
                        <div class="media-body">
                          <p>'.$row["pd_name"].'</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <h5 style="color:#ff003c;text-decoration:line-through" id="product_price">'.number_format($product_price,2).'฿</h5>
                      <h5 id="discount_price">'.number_format($discount_price,2).'฿</h5>
                    </td>
                    <td>
                        <div class="product_count">
                          <span id="product_count_decrement'.$row["cart_p_id"].'" class="product_count_item input-number-decrement"> <i class="ti-minus"></i>
                          </span>
                          <input class="product_count_item" type="text" value="'.$row["count"].'" min="1" max="'.$row["sp_no"].'" id="product_count_item'.$row["cart_p_id"].'" name="product_count_item[]">
                          <input type="hidden" name="tmp_cart_product_id[]" value="'.$row["cart_p_id"].'">
                          <span id="product_count_increment'.$row["cart_p_id"].'" class="product_count_item input-number-increment"> <i class="ti-plus"></i>
                          </span>
                        </div>
                    </td>
                    <td>

                        <h5 id="tatol_discount_price'.$row["cart_p_id"].'">'.number_format($tatol_discount_price,2).' ฿</h5>
                    </td>
                    <td>
                        <a href="./process/cart-delete.php?cart_p_id='.$row["cart_p_id"].'"><button class="btn btn-success btn-user btn-block" type="button"><i class="fas fa-trash"></i></button></a>
                    </td>
                    </tr>
                    <script>
                      var product_count_item'.$row["cart_p_id"].' =parseInt($("#product_count_item'.$row["cart_p_id"].'").val()) ;
                        $("#product_count_decrement'.$row["cart_p_id"].'").click(function() {
                          if (product_count_item'.$row["cart_p_id"].' >1){
                          product_count_item'.$row["cart_p_id"].'-=1;
                          $("#product_count_item'.$row["cart_p_id"].'").val(product_count_item'.$row["cart_p_id"].');
                            cal_price'.$row["cart_p_id"].'(product_count_item'.$row["cart_p_id"].');
                            cal_sum_tatol'.$row["cart_p_id"].'(0);
                          }
                        });

                        $("#product_count_increment'.$row["cart_p_id"].'").click(function() {
                          if (product_count_item'.$row["cart_p_id"].' < '.$row["sp_no"].'){
                          product_count_item'.$row["cart_p_id"].'+=1;
                          $("#product_count_item'.$row["cart_p_id"].'").val(product_count_item'.$row["cart_p_id"].');
                            cal_price'.$row["cart_p_id"].'(product_count_item'.$row["cart_p_id"].');
                            cal_sum_tatol'.$row["cart_p_id"].'(1);
                          }
                        });

                        var d_price'.$row["cart_p_id"].' = '.$discount_price.';
                        function cal_price'.$row["cart_p_id"].'( num_product){
                          var tmp_discount_price = num_product*d_price'.$row["cart_p_id"].';

                          $("#tatol_discount_price'.$row["cart_p_id"].'").text(numberWithCommas(tmp_discount_price)+" .00 ฿");
                        }

                        function cal_sum_tatol'.$row["cart_p_id"].'(num){
                          var sum_tatol_discount_price = 0;
                          if(num==0)
                            sum_tatol_discount_price = parseInt($("#sum_tatol_discount_price_hidden").val())-d_price'.$row["cart_p_id"].';
                          else
                            sum_tatol_discount_price = parseInt($("#sum_tatol_discount_price_hidden").val())+d_price'.$row["cart_p_id"].';

                          $("#sum_tatol_discount_price").text(numberWithCommas(sum_tatol_discount_price)+" .00 ฿");
                          $("#sum_tatol_discount_price_hidden").val(sum_tatol_discount_price);
                        }
                    </script>
                      ';
                    }
                    } else {
                                echo "<stong>ไม่มีรายการสินค้า</stong>";
                                echo'
                                <style type="text/css">
                                .nav-ask{ display:none; }
                                </style>
                                ';
                                echo'<br>
                                <br>
                                <br>';
                              }
                    ?>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>
                        <h5>รวมทั้งสิ้น</h5>
                      </td>
                      <td>
                        <?php echo '<input type="hidden" name="" id="sum_tatol_discount_price_hidden" value="'.$sum_tatol_discount_price.'">'; ?>
                        <h5 id="sum_tatol_discount_price"><?php echo number_format($sum_tatol_discount_price,2); ?> ฿</h5>
                      </td>
                    </tr>
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="./index_search.php?search=">เลือกซื้อสินค้า</a>
            <?php 
            if ($sum_tatol_discount_price!=0) {?>
            <button class="btn_1 checkout_btn_1">สั่งซื้อสินค้า</button>             
        <?php } ?>
          </div>
          </form>
        </div>
      </div>
    </section>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
    <!--================End Cart Area =================-->

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

 <!-- Scrollup, nice-select, sticky -->
 <script src="./assets/js/jquery.scrollUp.min.js"></script>
 <script src="./assets/js/jquery.nice-select.min.js"></script>
 <script src="./assets/js/jquery.sticky.js"></script>
 <script src="./assets/js/jquery.magnific-popup.js"></script>

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

  // #product_count1
  // discount_price
  // product_price
  // var discount_price = <?php echo $discount_price; ?> ;
  // var product_price = <?php echo $product_price; ?> ;

  // $(".inumber-decrement").click(function() {
  //   cal_price();
  // });

  // $(".number-increment").click(function() {
  //   cal_price();
  // });
  // function cal_price(){
  //   var tmp_discount_price = discount_price*$("#product_count1").val();
  //   var tmp_product_price = product_price*$("#product_count1").val();
  //   $("#discount_price").text(numberWithCommas(tmp_discount_price)+" ฿");
  //   $("#product_price").text(numberWithCommas(tmp_product_price)+" ฿");
  // }

function numberWithCommas(number) {
    var parts = number.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}

</script>
</body>

</html>