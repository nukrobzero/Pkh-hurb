<?php 
include "./process/connect.php";
?>
<!doctype html>
<html lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>P.PHUKA HERB สมุนไพรพ่อปู่พูคา - แก้ไขที่อยู่การจัดส่ง </title>
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
                        <h2>แก้ไขที่อยู่การจัดส่ง</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- slider Area End-->

  <!--================Checkout Area =================-->
  <section class="checkout_area section_padding">
    <div class="container">
      
      <div class="billing_details">
        <?php 
            $user_id = htmlspecialchars(isset($_GET['user_id'])?$_GET['user_id']:'');
            $sql ="SELECT * FROM users where user_id = '$user_id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
            } else {
              echo "0 results";
            }
            ?>
        <div class="row">
          <div class="col-lg-10 container">
            <h3>ที่อยู่ในการจัดส่ง</h3>
            <form class="row contact_form" action="./process/checkout-edit.php?user_id=<?php echo $user_id; ?>" method="post" novalidate="novalidate">
              <div class="col-md-6 form-group">
                <label class="m-0 font-weight-bold text-warning">ชื่อจริง</label>
                <input type="text"class="form-control form-control-user" id="examplePreName" placeholder="ชื่อจริง" name="user_pre_name" value="<?php echo $row["user_pre_name"]; ?>">
              </div>
              <div class="col-md-6 form-group p_star">
                <label class="m-0 font-weight-bold text-warning">นามสกุล</label>
                <input type="text"class="form-control form-control-user" id="exampleLastName" placeholder="นามสกุล" name="user_last_name" value="<?php echo $row["user_last_name"]; ?>">
              </div>
              <div class="col-md-6 form-group p_star">
                <label class="m-0 font-weight-bold text-warning">หมู่บ้าน</label>
                <input type="text" class="form-control form-control-user" id="mooban" name="user_mooban"placeholder="ชื่อหมู่บ้าน" value="<?php echo $row["user_mooban"]; ?>">
              </div>
              <div class="col-md-6 form-group p_star">
                <label class="m-0 font-weight-bold text-warning">บ้านเลขที่</label>
                <input type="text" class="form-control form-control-user" id="codehome" name="user_codehome"placeholder="บ้านเลขที่" value="<?php echo $row["user_codehome"]; ?>">
              </div>
              <div class="col-md-6 form-group p_star">
                <label class="m-0 font-weight-bold text-warning">หมู่ที่</label>
                <input type="text" class="form-control form-control-user" id="moo" name="user_moo"placeholder="หมู่ที่" value="<?php echo $row["user_moo"]; ?>">
              </div>
              <div class="col-md-6 form-group p_star">
                <label class="m-0 font-weight-bold text-warning">ตำบล</label>
                <input type="text" class="form-control form-control-user" id="district" name="user_district" value="<?php echo $row["user_district"]; ?>">
              </div>
              <div class="col-md-6 form-group p_star">
                <label class="m-0 font-weight-bold text-warning">อำเภอ</label>
                <input type="text" class="form-control form-control-user" id="amphoe" name="user_amphur" value="<?php echo $row["user_amphur"]; ?>">
              </div>
              <div class="col-md-6 form-group p_star">
                <label class="m-0 font-weight-bold text-warning">จังหวัด</label>
                <input type="text" class="form-control form-control-user" id="province" name="user_province" value="<?php echo $row["user_province"]; ?>">
              </div>
              <div class="col-md-6 form-group p_star">
                <label class="m-0 font-weight-bold text-warning">รหัสไปรษณีย์</label>
                <input type="text" class="form-control form-control-user" id="zipcode" name="user_postcode" value="<?php echo $row["user_postcode"]; ?>">
              </div>
              <div class="col-md-6 form-group p_star">
                <label class="m-0 font-weight-bold text-warning">เบอร์โทรศัพท์</label>
                <input type="number" class="form-control form-control-user" id="exampleInputTel" placeholder="" name="user_tel" value="<?php echo $row["user_tel"]; ?>">
              </div>
              <div class="col-md-4 form-group p_star">
              <button class="btn btn-primary btn-user btn-block" type="submit">
                บันทึก
              </button>
            </div>
            </form>
            <hr>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Checkout Area =================-->


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
      $.Thailand({
          $district: $('#district'), // input ของตำบล
          $amphoe: $('#amphoe'), // input ของอำเภอ
          $province: $('#province'), // input ของจังหวัด
          $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
        });
      </script>
      
</body>

</html>