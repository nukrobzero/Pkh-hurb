 <?php include './process/check_user.php';
 include './process/connect.php';
 ?>
 <!-- Preloader Start -->
 <div id="preloader-active">
  <div class="preloader d-flex align-items-center justify-content-center">
    <div class="preloader-inner position-relative">
      <div class="preloader-circle"></div>
      <div class="preloader-img pere-text">
        <img src="assets/img/logo/logo.png" alt="">
      </div>
    </div>
  </div>
</div>
<!-- Preloader Start -->
<header>
  <!-- Header Start -->
  <div class="header-area">
    <div class="main-header ">
      <div class="header-top top-bg d-none d-lg-block">
       <div class="container-fluid">
         <div class="col-xl-12">
          <div class="row d-flex justify-content-between align-items-center">
            <div class="header-info-left d-flex">
              <div class="flag">
                <!-- <img src="assets/img/icon/header_icon.png" alt=""> -->
              </div>
                                    <!-- <div class="select-this">
                                        <form action="#">
                                            <div class="select-itms">
                                                <select name="select" id="select1">
                                                    <option value="">USA</option>
                                                    <option value="">SPN</option>
                                                    <option value="">CDA</option>
                                                    <option value="">USD</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <ul class="contact-now">     
                                        <li>+777 2345 7886</li>
                                      </ul> -->
                                    </div>
                                    <div class="header-info-right">
                                     <ul>                                          
                                       <!-- <li><a href="profile-index.php">My Account </a></li>
                                       <li><a href="cart.php">ตะกร้าสินค้า</a></li>
                                       <li><a href="checkout.html">Checkout</a></li> -->
                                     </ul>
                                   </div>
                                 </div>
                               </div>
                             </div>
                           </div>
                           <div class="header-bottom  header-sticky">
                            <div class="container-fluid">
                              <div class="row align-items-center">
                                <!-- Logo -->
                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
                                  <div class="logo">
                                    <a href="index.php"><img src="img/logoaas.png" alt=""></a>
                                  </div>
                                </div>
                                <div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
                                  <!-- Main-menu -->
                                  <div class="main-menu f-right d-none d-lg-block">
                                    <nav>                                                
                                      <ul id="navigation">                                                                                                                                     
                                        <li><a href="index.php">หน้าหลัก</a></li>
                                        <li><a href="index_search.php">รายการสินค้า</a></li>
                                        <!-- <li><a href="#">หน้ารายการ</a>
                                          <ul class="submenu">
                                            <li><?php 
                                            $user_id = isset($_SESSION["user_id"])?$_SESSION["user_id"]:'' ;
                                            $show_button_login = '<a href="./login.php">ล็อคอิน</a>'; 
                                            $show_user_info = '<a href="./login.php" hidden="">ล็อคอิน</a>';
                                            if ($user_username!='') {
                                              echo $show_user_info;
                                            }
                                            else {
                                             echo $show_button_login;
                                           }
                                           
                                           ?> </li>
                                           <li><a href="cart.php">ตะกร้าสินค้า</a></li>
                                           <li><?php 
                                           $user_id = isset($_SESSION["user_id"])?$_SESSION["user_id"]:'' ;
                                           $show_checkout = '<a href="checkout.php?user_id='.$user_id.'">ชำระเงิน</a>'; 
                                           $unshow_checkout = '<a href="checkout.php?user_id='.$user_id.'" hidden="">ชำระเงิน</a>';
                                           if ($user_username!='') {
                                            echo $show_checkout;
                                          }
                                          else {
                                           echo $unshow_checkout;
                                         }
                                         
                                         ?></li>
                                         <li><?php 
                                         $user_id = isset($_SESSION["user_id"])?$_SESSION["user_id"]:'' ;
                                         $show_uploadslip = '<a href="uploadslip.php?user_id='.$user_id.'">แจ้งชำระเงิน</a>'; 
                                         $unshow_uploadslip = '<a href="uploadslip.php?user_id='.$user_id.'" hidden="">แจ้งชำระเงิน</a>';
                                         if ($user_username!='') {
                                          echo $show_uploadslip;
                                        }
                                        else {
                                         echo $unshow_uploadslip;
                                       }
                                       ?></li>
                                       <li><?php 
                                         $user_id = isset($_SESSION["user_id"])?$_SESSION["user_id"]:'' ;
                                         $show_confirmation = '<a href="confirmation.php?user_id='.$user_id.'">ติดตามสินค้า</a>'; 
                                         $unshow_confirmation = '<a href="confirmation.php?user_id='.$user_id.'" hidden="">ติดตามสินค้า</a>';
                                         if ($user_username!='') {
                                          echo $show_confirmation;
                                        }
                                        else {
                                         echo $unshow_confirmation;
                                       }
                                       ?></li>
                                     </ul>
                                   </li> -->
                                   <li><a href="contact.php">ติดต่อเรา</a></li>
                                   <li><a href="about.php">เกี่ยวกับเรา</a></li>
                                 </ul>
                               </nav>
                             </div>
                           </div> 
                           <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
                            <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                              <li class="d-none d-xl-block">
                                <div class="form-box f-right ">
                                  <form method="get" action ="index_search.php" id="index_search">
                                    <input type="text" name="search" placeholder="ค้นหาสินค้าได้ที่นี่...">
                                    <div class="search-icon" onclick="clickAction()">
                                      <i class="fas fa-search special-tag"></i>
                                    </div>
                                  </form>
                                </div>
                              </li>
                              <li class=" d-none d-xl-block">
                                        <!-- <div class="favorit-items">
                                            <i class="far fa-heart"></i>
                                          </div> -->
                                        </li>
                                        <li>
                                          <div class="shopping-card">
                                            <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                                          </div>
                                        </li>
                                        <?php 
                                        $user_id = isset($_SESSION["user_id"])?$_SESSION["user_id"]:'' ;


                    // $user_status
                                        $button_status ="";
                                        $show_button_login = '<li class="d-none d-lg-block" disabled=""> <a href="./login.php" class="btn header-btn">ลงชื่อเข้าใช้..</a></li>'; 
                                        $show_user_info = ' <!-- Nav Item - User Information -->
                                        <li class="nav-item dropdown no-arrow" disabled="">
                                        <a class="nav-link dropdown-toggle" style="color:black" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="d-none d-lg-block" style="color:black">สวัสดีคุณ '.$user_username.'</span>
                                        </a>
                                        <!-- Dropdown - User Information -->
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="./profile-index.php?user_id='.$user_id.'">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        ข้อมูลส่วนตัวของฉัน
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="./my_order.php">
                                        <i class="fa-dropbox fa-sm fa-fw mr-2 text-gray-400"></i>
                                        รายการสั่งซื้อของฉัน
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="./process/logout_index.php" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        ออกจากระบบ
                                        </a>
                                        </div>
                                        </div>
                                        </li>';
                     //echo $user_status;

                                        if ($user_username!='') {
                                          echo $show_user_info;
                      //echo $show_confirm_button."<hr>".$show_edit_button."<hr>".$show_cancel_button;
                                        }
                                        else {
                                         echo $show_button_login;
                                       }
                                       
                                       ?>   
                                       
                                      

                                       
                                     </ul>
                                   </div>
                                   <!-- Mobile Menu -->
                                   <div class="col-12">
                                    <div class="mobile_menu d-block d-lg-none"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
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
                                <a class="btn btn-primary" href="./process/logout_index.php">ตกลง</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Header End -->
                      </header>
                      <script type="text/javascript">
                        var x = document.getElementById("index_search");

                        function clickAction(){
        x.submit();// Form submission
      }
    </script>