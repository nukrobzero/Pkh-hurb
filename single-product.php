<!doctype html>
<html lang="zxx">
<?php 
include "./process/connect.php";
//include "./process/check_user.php";
?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>P.PHUKA HERB สมุนไพรพ่อปู่พูคา - สินค้า </title>
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
							<h2>สินค้า</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- slider Area End-->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row justify-content-center">

				<div class="col-lg-12">
					<div class="product_img_slide owl-carousel">

						<?php 
						$sp_id = htmlspecialchars( isset($_GET['sp_id'])?$_GET['sp_id']:'');
						$cart_id = htmlspecialchars( isset($_GET['cart_id'])?$_GET['cart_id']:'');
						$sql ="SELECT * FROM sub_products 
						INNER JOIN products ON sub_products.pd_id = products.pd_id 
						INNER JOIN promotions ON sub_products.pro_id = promotions.p_id
						INNER JOIN material_cal ON sub_products.material_cal_idss = material_cal.material_cal_id WHERE sp_id = '$sp_id'";
						$result = $conn->query($sql);
						$row1 = $result->fetch_assoc(); 
						$discount_price = $row1["sp_price"] - $row1["sp_price"]*($row1["p_percent"]/100);
						$product_price = $row1["sp_price"];
						$sp_no = $row1["sp_no"];
						echo '
						<div class="single_product_img">
						<img src="img/uploads/sub_products/'.$row1["sp_img"].'" alt="#" class="img-fluid">
						</div>
						</div>
						</div>
						<div class="col-lg-8">
						<div class="single_product_text text-center">
						<h3>'.$row1["pd_name"].' ขนาด '.$row1["sp_volume"].' ซีซี</h3>
						<p>'.$row1["pd_detail"].'</p>

						
						<div class="card_area">
						<form class=" " action="./process/single-product.php?sp_id='.$sp_id.'&cart_id='.$cart_id.'" method="post" >
						<div class="product_count_area">
						<p>จำนวน</p>
						<div class="product_count d-inline-block">
						<span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
						<input class="product_count_item input-number" type="text"  min="1" max="'.$row1["sp_no"].'" value="1" id="product_count1" name="product_count">
						<input type="hidden" id="product_count1_hid" value="1">
						<span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
						</div>
						<div class="price">
						<ul>
						<li style="color:#ff003c;text-decoration:line-through" class="discount" id = "product_price">'.$product_price.' ฿</li>
						<li id="discount_price">'.$discount_price.' ฿</li>       
						</ul>
						</div>
						</div>
						<p class="text-center">
						สินค้าคงเหลือ<span> '.$sp_no.' </span> ขวด
						</p>
						<div class="add_to_cart">
						<button type="submit" class="btn_3">หยิบใส่ตะกร้า</button>
						</div>
						</form>
						</div>
						</div>
						</div>
						';
						?>
					</div>
				</div>
			</div>
			<!--================End Single Product Area =================-->
			<!-- subscribe part here -->
<!--   <section class="subscribe_part section_padding">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="subscribe_part_content">
            <h2>Get promotions & updates!</h2>
            <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources credibly innovate granular internal .</p>
            <div class="subscribe_form">
              <input type="email" placeholder="Enter your mail">
              <a href="#" class="btn_1">Subscribe</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</section> -->
<!-- subscribe part end -->

<footer>


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

<!-- swiper js -->
<script src="./assets/js/swiper.min.js"></script>
<!-- swiper js -->
<script src="./assets/js/mixitup.min.js"></script>
<script src="./assets/js/jquery.counterup.min.js"></script>
<script src="./assets/js/waypoints.min.js"></script>
<script type="text/javascript">

  // #product_count1
  // discount_price
  // product_price
  var sp_no_total = <?php echo $sp_no; ?>;
  var discount_price = <?php echo $discount_price; ?> ;
  var product_price = <?php echo $product_price; ?> ;
  var tmp_product_count = $("#product_count1").val();
  $(".inumber-decrement").click(function() {
  	if (tmp_product_count>1)
  		tmp_product_count--;
  	$("#product_count1").val(tmp_product_count);
  	cal_price();
  });

  $(".number-increment").click(function() {
  	if (tmp_product_count<sp_no_total)
  		tmp_product_count++;
  	$("#product_count1").val(tmp_product_count);
  	cal_price();
  });
  function cal_price(){
  	var tmp_discount_price = discount_price*$("#product_count1").val();
  	var tmp_product_price = product_price*$("#product_count1").val();
  	$("#product_count1_hid").val($("#product_count1").val()) ;
  	$("#discount_price").text(numberWithCommas(tmp_discount_price)+" ฿");
  	$("#product_price").text(numberWithCommas(tmp_product_price)+" ฿");
  }

  function numberWithCommas(number) {
  	var parts = number.toString().split(".");
  	parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  	return parts.join(".");
  }

</script>

</body>

</html>