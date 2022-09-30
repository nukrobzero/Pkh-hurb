<!doctype html>
<?php 
include "./process/connect.php";
// $url= ISSET($_GET["url"])?$_GET["url"]:'';
//     echo "URL = ".$url;
//include "./process/check_user.php";
?>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>P.PHUKA HERB สมุนไพรพ่อปู่พูคา - หน้าหลัก </title>
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

	<main>

		<!-- slider Area Start -->
		<div class="slider-area ">
			<?php
			$sql ="SELECT * FROM promotions where p_id !=1 ORDER BY RAND() LIMIT 1 ";
			$result = $conn->query($sql);

			while ($row = $result->fetch_assoc()) {
				echo '
				<!-- Mobile Menu -->
				<div class="slider-active">
				<div class="single-slider slider-height" data-background="assets/img/hero/h1_hero.jpg">
				<div class="container">
				<div class="row d-flex align-items-center justify-content-between">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-none d-md-block mt-auto">
				<div class="hero__img" data-animation="bounceIn" data-delay=".4s">
				<img src="img/uploads/promotions/'.$row["p_img"].'" style="max-height: 650px;" alt="">
				</div>
				</div>
				<div class="col-xl-3 col-lg-5 col-md-3 col-sm-8 mt-auto">
				<div class="hero__caption">
				<span data-animation="fadeInRight" data-delay=".4s">ลด'.$row["p_percent"].'%</span>
				<h1 data-animation="fadeInRight" data-delay=".6s">'.$row["p_title"].'</h1>
				<p data-animation="fadeInRight" data-delay=".8s">ตั้งแต่วันนี้ถึง '.$row["p_pos_date"].' เท่านั้น!!!</p>
				<!-- Hero-btn -->
				<div class="hero__btn" data-animation="fadeInRight" data-delay="1s">
				<a href="./index_search.php?search=" class="btn hero-btn">ซื้อเลย!!!</a>
				</div>
				</div>
				</div>
				</div>
				</div>
				</div>

				<div class="single-slider slider-height" data-background="assets/img/hero/h1_hero.jpg">
				<div class="container">
				<div class="row d-flex align-items-center justify-content-between">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-none d-md-block mt-auto"">
				<div class="hero__img" data-animation="bounceIn" data-delay=".4s">
				<img src="img/uploads/promotions/'.$row["p_img"].'" style="max-height: 650px;" alt="">
				</div>
				</div>
				<div class="col-xl-3 col-lg-5 col-md-3 col-sm-8 mt-auto"">
				<div class="hero__caption">
				<span data-animation="fadeInRight" data-delay=".4s">ลด'.$row["p_percent"].'%</span>
				<h1 data-animation="fadeInRight" data-delay=".6s">'.$row["p_title"].'</h1>
				<p data-animation="fadeInRight" data-delay=".8s">ตั้งแต่วันนี้ถึง '.$row["p_pos_date"].' เท่านั้น!!!</p>
				<div class="hero__btn" data-animation="fadeInRight" data-delay="1s">
				<a href="./index_search.php?search=" class="btn hero-btn">ซื้อเลย!!!</a>
				</div>
				</div>
				</div>
				</div>
				</div>
				</div>

				</div>
				</div>
				';
			}
			?>  
			<!-- slider Area End-->
			<!-- Category Area Start-->
			<section class="category-area section-padding30">
				<div class="container-fluid">
					<!-- Section Tittle -->
					<div class="row">
						<div class="col-lg-12">
							<div class="section-tittle text-center mb-85">
								<h2>ประเภทสินค้า</h2>
							</div>
						</div>
					</div>
					<?php
					$sql ="SELECT * FROM category  where ctg_id !=1";
					$result = $conn->query($sql);

					?>   
					<div class="row">
						<?php
						while ($row = $result->fetch_assoc()) {
							echo '
							<div class="col-xl-4 col-lg-6">
							<div class="single-category mb-30">
							<div class="category-img">
							<img src="assets/img/categori/cat10.png" alt=""> 
							<div class="category-caption">
							<h2>'.$row["ctg_type"].'</h2>
							<!-- <span class="best"><a href="#"><?php echo $row["p_title"];?></a></span>
							<span class="collection"><?php echo $row["p_title"];?></span> -->
							</div>
							</div>
							</div>
							</div>
							';

						}
						?>

                    <!-- 
                     <div class="col-xl-4 col-lg-6">
                        <div class="single-category mb-30">
                            <div class="category-img text-center">
                                <div class="category-caption">
                                    <h2><?php echo $row["ctg_type"];?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6">
                        <div class="single-category mb-30">
                            <div class="category-img text-center">
                                <div class="category-caption">
                                    <h2><?php echo $row["ctg_type"];?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6">
                        <div class="single-category mb-30">
                            <div class="category-img text-center">
                                <div class="category-caption">
                                    <h2><?php echo $row["ctg_type"];?></h2>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        <!-- Category Area End-->
        <!-- Latest Products Start -->
        <section class="latest-product-area padding-bottom">
        	<div class="container">
        		<div class="row product-btn d-flex justify-content-end align-items-end">
        			<!-- Section Tittle -->
        			<div class="col-xl-4 col-lg-5 col-md-5">
        				<div class="section-tittle mb-30">
        					<h2>สินค้าทั้งหมด</h2>
        				</div>
        			</div>
        			<div class="col-xl-8 col-lg-7 col-md-7">
        				<div class="properties__button f-right">
        					<!--Nav Button  -->
        					<nav>                                                                                                
        						<div class="nav nav-tabs" id="nav-tab" role="tablist">
        							<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">ทั้งหมด</a>
        						</div>
        					</nav>
        					<!--End Nav Button  -->
        				</div>
        			</div>
        		</div>
        		<!-- Nav Card -->
        		<div class="tab-content" id="nav-tabContent">
        			<!-- card one -->
        			<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        				<div class="row">
        					<?php 
        					$sql ="SELECT * FROM sub_products 
        					INNER JOIN products ON sub_products.pd_id = products.pd_id 
        					INNER JOIN promotions ON sub_products.pro_id = promotions.p_id
        					INNER JOIN material_cal ON sub_products.material_cal_idss = material_cal.material_cal_id ORDER BY sub_products.sp_id DESC limit 6";
        					$result = $conn->query($sql);

        					while ($row = $result->fetch_assoc()) {
        						$discount_price = $row["sp_price"] - $row["sp_price"]*($row["p_percent"]/100);
        						echo '
        						<div class="col-xl-4 col-lg-4 col-md-6">
        						<div class="single-product mb-60">
        						<div class="product-img">
        						<a href="single-product.php?sp_id='.$row["sp_id"].'"><img src="img/uploads/sub_products/'.$row["sp_img"].'" alt=""></a>
        						<div class="new-product">
        						<span>New</span>
        						</div>
        						</div>
        						<div class="product-caption">
        						<h4><a href="single-product.php?sp_id='.$row["sp_id"].'">'.$row["pd_name"].' ขนาด '.$row["sp_volume"].' ซีซี</a></h4>
        						<div class="price">
            						<ul>
                						<li>'.$discount_price.' ฿</li>
                						<li class="discount">'.$row["sp_price"].' ฿</li>
            						</ul>
        						</div>
        						</div>
        						</div>
        						</div>';
        					}
        					?>
        					</div>
        				</div>
        			</div>
        			
        		</div>
        		<!-- End Nav Card -->
        	</div>
        </section>
        <!-- Latest Products End -->
        <!-- Gallery Start-->
        <!-- <div class="gallery-wrapper lf-padding">
        	<div class="gallery-area">
        		<div class="container-fluid">
        			<div class="row">
        				<div class="gallery-items">
        					<img src="assets/img/gallery/gallery1.jpg" alt="">
        				</div> 
        				<div class="gallery-items">
        					<img src="assets/img/gallery/gallery2.jpg" alt="">
        				</div>
        				<div class="gallery-items">
        					<img src="assets/img/gallery/gallery3.jpg" alt="">
        				</div>
        				<div class="gallery-items">
        					<img src="assets/img/gallery/gallery4.jpg" alt="">
        				</div>
        				<div class="gallery-items">
        					<img src="assets/img/gallery/gallery5.jpg" alt="">
        				</div>
        			</div>
        		</div>
        	</div>
        </div> -->
        <!-- Gallery End-->

    </main>
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

    	</body>
    	</html>