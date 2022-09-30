<?php 
include "./process/connect.php";
include "./process/check_user.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>P.PHUKA HERB - เสนอการผลิต</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include "./components/allMenu.php";?>

    <!-- Begin Page Content -->
    <div class="container pl-1">
      <!-- DataTales Example -->
      <div class="card shadow mb-4" width="800">
        <div class="card-header py-3">
          <h4 class="m-0 font-weight-bold text-primary">ใบเสนอการผลิต</h4>
        </div>
        <div class="card-body">
          
          <div class="form-group">
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-3">
                <label class="m-0 font-weight-bold text-warning">สินค้า</label>
                <form id="show-sub-products" action="#" method="post" enctype="multipart/form-data">
                  <select  class="form-control form-control-user" name="pd_name" id="pd_name" required="">
                    <?php 
                    $user_id = htmlspecialchars(isset($_GET["user_id"])?$_GET["user_id"]:'');

                    $staff_status = htmlspecialchars(isset($_GET["staff_status"])?$_GET["staff_status"]:'');

                    $pdmm_id = htmlspecialchars(isset($_GET["pdmm_id"])?$_GET["pdmm_id"]:'');
                    $sql = "SELECT * FROM products";
                    $result = $conn->query($sql);   
                    if ($result->num_rows > 0) {
                      echo '<option value="0">---เลือกสินค้า---</option>';
                      while ( $row = $result->fetch_assoc())
                      {
                        echo '<option value="'.$row["pd_id"].'">'.$row["pd_name"].'</option>';
                      }   
                    } else {
                      echo "0 results";
                    }
                    ?>
                  </select>
                </form>
              </div>
              <div class="col-sm-12">
                <label class="m-0 font-weight-bold text-warning">ข้อมูลสินค้า</label>  <div id="tmp-material_manufacture-group"> </div>
                <form id="show-table-menu">
                  <div class="form-inline " id="select-sub-product">
                    <!-- SHOW SUB-PRODUCT SELECT -->
                    <div id='show-select-sub-products'>
                      <select  class='type form-control' name='sp_volume' id='sp_id'>
                        <option value='0'>---เลือกสินค้า---</option>
                      </select>
                    </div>
                    <input type='number' placeholder='จำนวน' class='form-control ml-2' name='sp_no' id="sp_no" required="">
                    <button id="cal-manufacture" class="form-control ml-2 btn btn-primary">คำนวณการผลิต</button>
                  </div> 
                </form>
              </div>
            </div>
            <div id="show-table-manufacture">
              <div class="table-responsive show-table">
                <br>
                <hr>
                <table class="table table-bordered"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ลำดับ</th>
                      <th>ชื่อวัตถุดิบ</th>
                      <th>วัตถุดิบที่ใช้ (ต่อหน่วย)</th>
                      <th>วัตถุดิบที่ใช้ </th>
                      <th>วัตถุดิบที่เหลือ</th>
                      <!-- <th>ราคาวัตถุดิบ (ต่อชิ้น)</th> -->
                      <th>ราคาต้นทุน(บาท)</th>
                      <!-- <th>ราคาขาย</th> -->
                    </tr>
                  </thead>
                  <tbody id="show-table-manufacture2">

                  </tbody>
                </table>
              </div>
            </div>
            <br>
            <br>
            <form id="products-manufacture-add">
              <input type="hidden" name ="sub_id" id="sub_id" value="">
              <input type="hidden" name ="sub_no" id="sub_no" value="">

              <input type="hidden" name ="cost_tmp" id="cost_tmp" value="">
              <input type="hidden" name ="total_price_tmp" id="total_price_tmp" value="">
              <input type="hidden" name ="profit_tmp" id="profit_tmp" value="">
              <?php 
              echo '<input type="hidden" name ="pdmm_id" id="pdmm_id" value="'.$pdmm_id.'">';
              ?>
              


              <button class="btn btn-success btn-user btn-block" id ="add-manufacture" type="button" disabled="">
                บันทึกข้อมูล
              </button>  
            </form>            

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
  <script type="text/javascript">
    $("#material-form").hide();
    $("#group-amount").hide();
    $("#material-group").hide();
    $("#show-table-manufacture").hide();
    $("input[name=sp_cul_or_not]").change(function(){
      if($("input[name=sp_cul_or_not]:checked").val()=="1"){
        $("#group-amount").show();
        $("#material-form").show();
      }
      else{
        $("#group-amount").hide();
        $("#material-form").show();
      }
    });



    // $("#select-sub-product").html(select_sub_product_code_start());
    



            // function select_sub_product_code(p_id){

            //   <?php 
            //     $sql ="SELECT * FROM sub_products WHERE sp_id='sp_id'";
            //     $result = $conn->query($sql);
            //     if ($result->num_rows > 0) {
            //       while ( $row = $result->fetch_assoc())
            //       {

            //       }   
            //     } else {
            //       // echo "0 results";
            //     }
            //   ?>
            //   $tmp_string_code = "";
            //   $tmp_string_code += "<select  class='type form-control' name='sp_volume' >";
            //   $tmp_string_code += "<option value='0'>---เลือกสินค้า---</option>";

            //   $tmp_string_code += "</select>";
            //   $tmp_string_code += "<input type='number' id='no' placeholder='จำนวน' class='form-control ml-2' name='sp_no' required> ";
            //   return $tmp_string_code;
            // }

            // function select_sub_product_code_start(){
            //   $tmp_string_code = "";
            //   $tmp_string_code += "<select  class='type form-control' name='sp_volume' >";
            //   $tmp_string_code += "<option value='0'>---เลือกสินค้า---</option>";
            //   $tmp_string_code += "<div id='show-select-sub-products'></div>";
            //   $tmp_string_code += "</select>";
            //   $tmp_string_code += "";
            //   return $tmp_string_code;
            // }

          </script>
          <script type="text/javascript" src="./js/show-sub-products.js"></script>
          <script type="text/javascript" src="./js/products-manufacture-add.js"></script>
          <script type="text/javascript">
            
          </script>
        </body>
        </html>



