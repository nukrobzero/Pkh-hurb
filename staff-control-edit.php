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

  <title>P.PHUKA HERB - แก้ไขข้อมูลพนักงาน</title>

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
          <h4 class="m-0 font-weight-bold text-primary">แก้ไขข้อมูลพนักงาน</h4>
        </div>
        <div class="card-body">
          <div class="form-group">
            <?php 
            $staff_id = htmlspecialchars(isset($_GET['staff_id'])?$_GET['staff_id']:'');
            $sql ="SELECT * FROM staff INNER JOIN positions ON staff.staff_status = positions.position_page_id where staff_id = '$staff_id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              $row1 = $result->fetch_assoc();
              $cate_positions = $row1["staff_status"];
            } else {
              echo "0 results";
            }
            ?>
            <form action="./process/staff-control-edit.php?staff_id=<?php echo $staff_id; ?>" method="post">
              <div class="form-group">
                <?php
                //$staff_code = "STAFF-".str_pad($row1["staff_id"], 6, "0", STR_PAD_LEFT);
                ?>
                <label class="m-0 font-weight-bold text-warning">รหัสผู้ใช้</label>
                <input type="text" disabled="" class="form-control form-control-user" id="exampleInputusercode" placeholder="" name="" value="<?php echo $row1["staff_id"] ?>">
              </div>
              <div class="form-group">
                <label class="m-0 font-weight-bold text-warning">ตำแหน่ง</label>  
                <select  class="form-control form-control-user" name="staff_status" >
                  <?php 
                  $sql = "SELECT * FROM positions";
                  $result = $conn->query($sql);   
                  if ($result->num_rows > 0) {
                    $selected;
                    while ( $row = $result->fetch_assoc())
                    {
                      if ($row["position_page_id"] == $cate_positions) {
                        $selected = 'selected';
                      }else{
                        $selected = '';
                      }
                      echo '<option value="'.$row["position_page_id"].'"'.$selected.'>'.$row["position_name"].'</option>';
                    }   
                  } else {
                    echo "0 results";
                  }
                    //$conn->close();
                  ?>
                </select>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label class="m-0 font-weight-bold text-warning">ชื่อผู้ใช้</label>
                  <input type="text" class="form-control form-control-user" id="exampleInputusername" placeholder="" name="staff_username" value="<?php echo $row1["staff_username"]; ?>">
                </div>
                <div class="col-sm-6">
                  <label class="m-0 font-weight-bold text-warning">รหัสผ่าน</label>
                  <input type="password" class="form-control form-control-user" id="exampleInputusername" placeholder="กรุณากรอกรหัสใหม่" name="staff_password" required="" value="">
                </div>
              </div>
              <div class="form-group">
                <label class="m-0 font-weight-bold text-warning">อีเมล์</label>
                <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="" name="staff_email" value="<?php echo $row1["staff_email"]; ?>">
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label class="m-0 font-weight-bold text-warning">ชื่อจริง</label>
                  <input type="text" class="form-control form-control-user" id="examplePreName" placeholder="" name="staff_pre_name" value="<?php echo $row1["staff_pre_name"]; ?>">
                </div>
                <div class="col-sm-6">
                  <label class="m-0 font-weight-bold text-warning">นามสกุล</label>
                  <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="" name="staff_last_name" value="<?php echo $row1["staff_last_name"]; ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="m-0 font-weight-bold text-warning">ชื่อเล่น</label>
                <input type="text" class="form-control form-control-user" id="exampleInputName" placeholder="" name="staff_nickname" value="<?php echo $row1["staff_nickname"]; ?>">
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label class="m-0 font-weight-bold text-warning">ว/ด/ป เกิด</label>
                  <input type="date" class="form-control form-control-user" id="exampleInputBirthdat" placeholder="" name="staff_birthday" value="<?php echo $row1["staff_birthday"]; ?>">
                </div>
                <div class="col-sm-6">
                  <label class="m-0 font-weight-bold text-warning">ว/ด/ป เริ่มงาน</label>
                  <input type="date" class="form-control form-control-user" id="exampleInputworkstart" placeholder="" name="staff_workstart" value="<?php echo $row1["staff_workstart"]; ?>">
                </div>
              </div>
              <?php 
                $tmpAge = $row1["staff_birthday"];
                $pieces = explode("-", $tmpAge);
                $age = date('Y')-$pieces[0];
                // echo $tmpAge." ".$pieces[0];
              ?>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label class="m-0 font-weight-bold text-warning">อายุ</label>
                  <input type="number" class="form-control form-control-user" id="exampleAge" placeholder="" name="staff_age" disabled="" value="<?php echo $age; ?>">
                </div>
                <div class="col-sm-6">
                  <label class="m-0 font-weight-bold text-warning">เพศ</label>
                  <?php
                  $male = '';
                  $female = '';
                  if ($row1["staff_sex"] == 'ชาย') {
                    $male = "selected";
                  }else {
                    $female = "selected";
                  }
                  ?>
                  <select  class="form-control form-control-user" id="exampleSex" name="staff_sex" >
                    <option value="ชาย" <?php echo $male; ?> >ชาย</option>
                    <option value="หญิง" <?php echo $female; ?> >หญิง</option>
                  </select>
                </div>
              </div> 
              <div class="form-group">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label class="m-0 font-weight-bold text-warning">บ้านเลขที่</label>
                    <input type="text" class="form-control form-control-user" id="codehome" name="staff_codehome" value="<?php echo $row1["staff_codehome"]; ?>">  
                  </div>
                  <div class="col-sm-6">
                    <label class="m-0 font-weight-bold text-warning">หมู่ที่</label>
                    <input type="text" class="form-control form-control-user" id="moo" name="staff_moo" value="<?php echo $row1["staff_moo"]; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label class="m-0 font-weight-bold text-warning">ตำบล</label>
                    <input type="text" class="form-control form-control-user" id="district" name="staff_district" value="<?php echo $row1["staff_district"]; ?>">  
                  </div>
                  <div class="col-sm-6">
                    <label class="m-0 font-weight-bold text-warning">อำเภอ</label>
                    <input type="text" class="form-control form-control-user" id="amphoe" name="staff_amphur" value="<?php echo $row1["staff_amphur"]; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label class="m-0 font-weight-bold text-warning">จังหวัด</label>
                    <input type="text" class="form-control form-control-user" id="province" name="staff_province" value="<?php echo $row1["staff_province"]; ?>">
                  </div> 
                  <div class="col-sm-6">
                    <label class="m-0 font-weight-bold text-warning">รหัส</label>
                    <input type="text" class="form-control form-control-user" id="zipcode" name="staff_postcode" value="<?php echo $row1["staff_postcode"]; ?>">
                  </div>
                </div> 
              </div>  
               <?php
                $row_tel_text ="";
                $sql_tel = "SELECT * FROM tel WHERE user_id = '".$staff_id."'";
                $result_tel = $conn->query($sql_tel);
                $k =0;
                // echo $conn->error.$staff_id;
                if ($result_tel->num_rows > 0) {
                    while ($row_tel = $result_tel->fetch_assoc()){
                      // echo $row_tel["tel"]." ";
                      if($k==0)
                        $row_tel_text .= $row_tel["tel"];
                      else
                        $row_tel_text .= ",".$row_tel["tel"];
                      $k++;
                      // echo $row_tel_text." ";
                    }
                } else {
                  echo "0 results";
                }
              ?>  
              <div class="form-group">
                <label class="m-0 font-weight-bold text-warning">เบอร์โทรศัพท์</label>
                <input type="text" class="form-control form-control-user" id="Phone" placeholder="" name="staff_tel" value="<?php echo $row_tel_text; ?>">
                <button id="Add" type="button">+</button>
              </div> 
              <br>
              <br>
              <button class="btn btn-primary btn-user btn-block" type="submit">
                บันทึก
              </button>
              <hr>
            </form>
            <a href="./staff-control.php"><button class="btn btn-success btn-user btn-block" type="button">
              ย้อนกลับ
            </button></a>                  
            
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
    <script type="text/javascript">
      $(function(){
        $("#Add").click(function(){
          var $more = prompt("เบอร์โทรศัพท์อื่น","");
          if($more != null && $more != ""){
            var $old = $("#Phone").val();
            if($old== null || $old == "")
              $("#Phone").val($more);
            else
              $("#Phone").val($old+","+$more);
          } 
        });
      });
  </script>

  </body>

  </html>
