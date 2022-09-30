<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>P.PHUKA HERB - สมุนไพรพ่อปู่พูคา </title>
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

    <!-- slider Area Start-->
    <div class="slider-area ">
      <!-- Mobile Menu -->
      <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
        <div class="container">
          <div class="row">
            <div class="col-xl-12">
              <div class="hero-cap text-center">
                <h2>รายการสั่งซื้อของฉัน</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- slider Area End-->

    <!-- Latest Products Start -->
    <section class="latest-product-area latest-padding">
      <div class="container">
        <div class="row product-btn d-flex justify-content-between">
          <div class="properties__button">
            <!--Nav Button  -->
            <nav>                                                                                                
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">ทั้งหมด</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">ที่ต้องชำระเงิน</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">เช็คการชำระเงิน</a>
                <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact1" aria-selected="false">การจัดส่ง</a>
              </div>
            </nav>
            <!--End Nav Button  -->
          </div>
                       <!--  <div class="select-this d-flex">
                            <div class="featured">
                                <span>Short by: </span>
                            </div>
                            <form action="#">
                                <div class="select-itms">
                                    <select name="select" id="select1">
                                        <option value="">Featured</option>
                                        <option value="">Featured A</option>
                                        <option value="">Featured B</option>
                                        <option value="">Featured C</option>
                                    </select>
                                </div>
                            </form>
                          </div> -->
                        </div>
                        <!-- Nav Card -->
                        <div class="tab-content" id="nav-tabContent">
                          <!-- card one -->
                          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row">
                              <div class="card-body">
                               <?php
                               $bp_id= ISSET($_GET["bp_id"])?$_GET["bp_id"]:'';
                               $b_date= ISSET($_GET["b_date"])?$_GET["b_date"]:'';
                               $cart_id= ISSET($_GET["cart_id"])?$_GET["cart_id"]:'';
                               $user_id = isset($_SESSION["user_id"])?$_SESSION["user_id"]:'' ;
                               $sql ="SELECT * FROM bill_products INNER JOIN cart ON bill_products.cart_id = cart.cart_id  WHERE cart_user_id = '".$user_id."' ORDER BY bill_products.bp_id DESC";

                               $result = $conn->query($sql);

                               ?>   
                               <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th>ลำดับ</th>
                                      <th>คำสั่งซื้อ</th>
                                      <th>สถานะ</th>
                                      <th>วันที่ทำรายการ</th>
                                      <th>จัดการคำสั่งซื้อ</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                      $i = 1;
                        // output data of each row
                                      while($row = $result->fetch_assoc()) {
                                        $cart_code = "C-".str_pad($row["cart_id"], 6, "0", STR_PAD_LEFT);
                                        $status_bill;
                                        if ($row["status"]== 1) {
                                          $status_bill = "โอนเงินแล้ว";
                                          echo '
                                          <tr>
                                          <td>'.$i.'</td>
                                          <td>'.$cart_code.'</td>
                                          <td>'.$status_bill.'</td>
                                          <td>'.$row["b_date"].'</td>
                                          <td><a href="./uploadslip.php?cart_id='.$row["cart_id"].'&status='.$row["status"].'&b_date='.$row["b_date"].'"style="color:#000000;background-color:#6DFCED;">รายละเอียดสินค้า</a></td>
                                          </tr>
                                          ';
                                        }else if ($row["status"]== 2) {
                                          $status_bill = "กำลังเตรียมจัดส่ง";
                                          echo '
                                          <tr>
                                          <td>'.$i.'</td>
                                          <td>'.$cart_code.'</td>
                                          <td>'.$status_bill.'</td>
                                          <td>'.$row["b_date"].'</td>
                                          <td><a href="./uploadslip.php?cart_id='.$row["cart_id"].'&status='.$row["status"].'&b_date='.$row["b_date"].'&delivery_number='.$row["delivery_number"].'"style="color:#000000;background-color:#6DFCED;">รายละเอียดสินค้า</a></td>
                                          </tr>
                                          ';
                                        }else if ($row["status"]== 3) {
                                          $status_bill = "จัดส่งเรียบร้อยแล้ว";
                                          echo '
                                          <tr>
                                          <td>'.$i.'</td>
                                          <td>'.$cart_code.'</td>
                                          <td>'.$status_bill.'</td>
                                          <td>'.$row["b_date"].'</td>
                                          <td><a href="./uploadslip.php?cart_id='.$row["cart_id"].'&status='.$row["status"].'&b_date='.$row["b_date"].'&delivery_number='.$row["delivery_number"].'"style="color:#000000;background-color:#6DFCED;">รายละเอียดสินค้า</a></td>
                                          </tr>
                                          ';    
                                        }else{
                                          $status_bill = "รอชำระเงิน";
                                          echo '
                                          <tr>
                                          <td>'.$i.'</td>
                                          <td>'.$cart_code.'</td>
                                          <td>'.$status_bill.'</td>
                                          <td>'.$row["b_date"].'</td>
                                          <td><a href="./uploadslip.php?cart_id='.$row["cart_id"].'&status='.$row["status"].'&b_date='.$row["b_date"].'"style="color:#000000;background-color:#6DFCED;">ชำระเงิน</a></td>
                                          </tr>
                                          ';
                                        }
                                        
                                        $i++;                     
                                      } 
                                    } else {
                                      echo "0 results";
                                    }
                                    ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Card two -->
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                          <div class="row">
                           <div class="card-body">
                             <?php
                             $bp_id= ISSET($_GET["bp_id"])?$_GET["bp_id"]:'';
                             $b_date= ISSET($_GET["b_date"])?$_GET["b_date"]:'';
                             $cart_id= ISSET($_GET["cart_id"])?$_GET["cart_id"]:'';
                             $user_id = isset($_SESSION["user_id"])?$_SESSION["user_id"]:'' ;
                             $sql ="SELECT * FROM bill_products INNER JOIN cart ON bill_products.cart_id = cart.cart_id  WHERE cart_user_id = '".$user_id."'and status = 0 ORDER BY bill_products.bp_id DESC";

                             $result = $conn->query($sql);

                             ?>   
                             <div class="table-responsive">
                              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                  <tr>
                                    <th>ลำดับ</th>
                                    <th>คำสั่งซื้อ</th>
                                    <th>สถานะ</th>
                                    <th>วันที่ทำรายการ</th>
                                    <th>ชำระเงิน</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  if ($result->num_rows > 0) {
                                    $i = 1;
                        // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                      $cart_code = "C-".str_pad($row["cart_id"], 6, "0", STR_PAD_LEFT);
                                      $status_bill;
                                      if ($row["status"]== 1) {
                                        $status_bill = "โอนเงินแล้ว";
                                      }else if ($row["status"]== 2) {
                                        $status_bill = "กำลังเตรียมจัดส่ง";
                                      }else{
                                        $status_bill = "รอชำระเงิน";
                                      }
                                      echo '
                                      <tr>
                                      <td>'.$i.'</td>
                                      <td>'.$cart_code.'</td>
                                      <td>'.$status_bill.'</td>
                                      <td>'.$row["b_date"].'</td>
                                      <td><a href="./uploadslip.php?cart_id='.$row["cart_id"].'&status='.$row["status"].'&b_date='.$row["b_date"].'"style="color:#000000;background-color:#6DFCED;">ชำระเงิน</a></td>
                                      </tr>
                                      ';
                                      $i++;                     
                                    } 
                                  } else {
                                    echo "0 results";
                                  }
                                  ?>
                                </tbody>
                              </table>
                            </div>
                          </div>   
                        </div>
                      </div>
                      <!-- Card three -->
                      <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="row">
                          <div class="card-body">
                           <?php
                           $bp_id= ISSET($_GET["bp_id"])?$_GET["bp_id"]:'';
                           $b_date= ISSET($_GET["b_date"])?$_GET["b_date"]:'';
                           $cart_id= ISSET($_GET["cart_id"])?$_GET["cart_id"]:'';
                           $user_id = isset($_SESSION["user_id"])?$_SESSION["user_id"]:'' ;
                           $sql ="SELECT * FROM bill_products INNER JOIN cart ON bill_products.cart_id = cart.cart_id  WHERE cart_user_id = '".$user_id."'and status = 1 or status = 2 ORDER BY bill_products.bp_id DESC";

                           $result = $conn->query($sql);

                           ?>   
                           <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th>ลำดับ</th>
                                  <th>คำสั่งซื้อ</th>
                                  <th>สถานะ</th>
                                  <th>วันที่ทำรายการ</th>
                                  <th>รายละเอียดสินค้า</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                  $i = 1;
                        // output data of each row
                                  while($row = $result->fetch_assoc()) {
                                    $cart_code = "C-".str_pad($row["cart_id"], 6, "0", STR_PAD_LEFT);
                                    $status_bill;
                                    if ($row["status"]== 1) {
                                      $status_bill = "โอนเงินแล้ว";
                                    }else if ($row["status"]== 2) {
                                      $status_bill = "กำลังเตรียมจัดส่ง";
                                    }else{
                                      $status_bill = "รอชำระเงิน";
                                    }
                                    echo '
                                    <tr>
                                    <td>'.$i.'</td>
                                    <td>'.$cart_code.'</td>
                                    <td>'.$status_bill.'</td>
                                    <td>'.$row["b_date"].'</td>
                                    <td><a href="./uploadslip.php?cart_id='.$row["cart_id"].'&status='.$row["status"].'&b_date='.$row["b_date"].'"style="color:#000000;background-color:#6DFCED;">รายละเอียดสินค้า</a></td>
                                    </tr>
                                    ';
                                    $i++;                     
                                  } 
                                } else {
                                  echo "0 results";
                                }
                                ?>
                              </tbody>
                            </table>
                          </div>
                        </div>   
                      </div>
                    </div>
                    <!-- card foure -->
                    <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                      <div class="row">
                        <div class="card-body">
                         <?php
                         $bp_id= ISSET($_GET["bp_id"])?$_GET["bp_id"]:'';
                         $b_date= ISSET($_GET["b_date"])?$_GET["b_date"]:'';
                         $cart_id= ISSET($_GET["cart_id"])?$_GET["cart_id"]:'';
                         $user_id = isset($_SESSION["user_id"])?$_SESSION["user_id"]:'' ;
                         $sql ="SELECT * FROM bill_products INNER JOIN cart ON bill_products.cart_id = cart.cart_id  WHERE cart_user_id = '".$user_id."'and status = 3 ORDER BY bill_products.bp_id DESC";

                         $result = $conn->query($sql);

                         ?>   
                         <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th>ลำดับ</th>
                                <th>คำสั่งซื้อ</th>
                                <th>สถานะ</th>
                                <th>วันที่ทำรายการ</th>
                                <th>รายละเอียดสินค้า</th>
                                <th>หมายเลขพัสดุ</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              if ($result->num_rows > 0) {
                                $i = 1;
                        // output data of each row
                                while($row = $result->fetch_assoc()) {
                                  $cart_code = "C-".str_pad($row["cart_id"], 6, "0", STR_PAD_LEFT);
                                  $status_bill;
                                  if ($row["status"]== 2) {
                                    $status_bill = "กำลังเตรียมจัดส่ง";
                                  }else if ($row["status"]== 3) {
                                    $status_bill = "จัดส่งเรียบร้อยแล้ว";
                                  }else{
                                    $status_bill = "รอชำระเงิน";
                                  }
                                  echo '
                                  <tr>
                                  <td>'.$i.'</td>
                                  <td>'.$cart_code.'</td>
                                  <td>'.$status_bill.'</td>
                                  <td>'.$row["b_date"].'</td>
                                  <td><a href="./uploadslip.php?cart_id='.$row["cart_id"].'&status='.$row["status"].'&b_date='.$row["b_date"].'&delivery_number='.$row["delivery_number"].'"style="color:#000000;background-color:#6DFCED;">รายละเอียดสินค้า</a></td>
                                  <td>'.$row["delivery_number"].'</td>
                                  </tr>
                                  ';
                                  $i++;                     
                                } 
                              } else {
                                echo "0 results";
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>   
                    </div>
                  </div>
                  <!-- End Nav Card -->
                </div>
              </div>
            </section>
            <!-- Latest Products End -->
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