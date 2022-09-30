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

  <title>P.PHUKA HERB - เพิ่มข้อมูลสูตรการผลิต</title>

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
          <h4 class="m-0 font-weight-bold text-primary">เพิ่มข้อมูลสูตรการผลิต</h4>
        </div>
        <div class="card-body">
          <form action="./process/material-cal-add.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label class="m-0 font-weight-bold text-warning">ชื่อสูตรการผลิต</label>
                  <input type="text" class="form-control form-control-user" id="exampleInputm_detail" placeholder="ชื่อสูตรการผลิต" name="material_cal_name" required="">
                </div>                  
                <div class="col-sm-6">
                  <label class="m-0 font-weight-bold text-warning">สินค้า</label>
                  <select  class="form-control form-control-user" name="pd_mc_id">
                    <?php 
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
                </div>
              </div>
              <div class="form-group">
                <label class="m-0 font-weight-bold text-warning">รายละเอียดสูตรการผลิต</label>
                <input type="text" class="form-control form-control-user" id="exampleInputm_detail" placeholder="รายละเอียดสินค้า..." name="material_cal_detail" value="">
              </div>
              <label class="m-0 font-weight-bold text-warning">สูตรคำนวณ : </label>
              <input type="radio" class="form-control-label" name="material_cal_or_not" value="1"> มี</input>
              <input type="radio" class="form-control-label" name="material_cal_or_not" value="0" checked=""> ไม่มี</input>
              <hr>
              <div id="group-amount">
                <label class="m-0 font-weight-bold text-warning">วัตถุดิบที่ต้องใช้</label>

                <select id="amount" name="amount" class="form-control form-control-user">
                  <option value="0">ไม่มี</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                  <option>7</option>
                  <option>8</option>
                  <option>9</option>
                  <option>10</option>
                  <option>11</option>
                  <option>12</option>
                  <option>13</option>
                  <option>14</option>
                  <option>15</option>
                </select> 
              </div>
            </div>
            <div id="material-group">
              <label class="m-0 font-weight-bold text-warning">เลือกวัตถุดิบ</label>
              <?php 
              $sql = "SELECT * FROM material";
              $result = $conn->query($sql); 
              $i=0;
              $tmprowId;
              $tmprowName;
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc() ){
                  $tmprowId[$i]=$row["m_id"];
                  $tmprowName[$i]=$row["m_name"];
                  $i++;
                }

              } else {
                echo "0 results";
              }
              // $conn->close();
              echo '<div id="tmp-material-group"> </div>';

              ?>
              <div class="form-inline">
                <input type='number' placeholder='จำนวน' class='form-control' name='packeting-no' id="packeting-no" required>
                <button id="cal-volume" type="button" class="form-control ml-2 btn btn-primary">คำนวณการผลิต</button>
                <button id="cal-reset" type="button" class="form-control ml-2 btn btn-success">คืนค่า</button>
              </div> 
            </div>
            <br>
            <br>
            <button class="btn btn-primary btn-user btn-block" type="submit">
              บันทึก
            </button>
          </form>
          <hr>
          <a href="./material-cal.php"><button class="btn btn-success btn-user btn-block" type="button">
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
<script type="text/javascript">
  $("#material-form").hide();
  $("#group-amount").hide();
  $("#material-group").hide();
  $("input[name=material_cal_or_not]").change(function(){
    if($("input[name=material_cal_or_not]:checked").val()=="1"){
      $("#group-amount").show();
      $("#material-form").show();
    }
    else{
      $("#group-amount").hide();
      $("#material-form").hide();
      $("#material-group").hide();
    }
  });

  <?php 
  echo '
  $("#amount").change(function(){
    var amount = $("#amount").val();
    $("#material-group").show();
    var tmtText = textAmount(amount);

    $("#tmp-material-group").html(tmtText);
  });

  function textAmount(amount){
    var tmptext = "";
    var tmprowIdt ='.json_encode($tmprowId).';
    var tmprowNamet ='.json_encode($tmprowName).';
    for (var i = 0; i < parseInt(amount); i++) {
      tmptext+= "<div  class=\'form-group row\'>";
      tmptext+= "<div  class=\'col-sm-3 mb-3 mb-sm-0\'>";
      tmptext+= "<select  class=\'form-control form-control-user\' name=\'m_name[]\' >";
      tmptext+= "<option value=\'0\'>ไม่มี</option>";
      for (var j = 0; j < '.$result->num_rows.'; j++) {
        tmptext+= "<option value=\'"+tmprowIdt[j]+"\'>"+tmprowNamet[j]+"</option>";
      }
      tmptext+= "</select>";
      tmptext+= "</div>";
      tmptext+= "<div  class=\'col-sm-3\'>";
      tmptext+= "<input type=\'number\'  step=\'any\' placeholder=\'ส่วนผสมที่ใช้ (กรัม)\' class=\'form-control form-control-user\' id = \'mp_unit"+i+"\' name=\'mp_unit[]\' >";
      tmptext+= "</div>";
      tmptext+= "<div  class=\'col-sm-2\'>";
      tmptext+= "<input type=\'number\'  step=\'any\' placeholder=\'ราคาส่วนผสมที่ใช้ (บาท)\' class=\'form-control form-control-user\' id = \'mp_price"+i+"\' name=\'mp_price[]\' >";
      tmptext+= "</div>";
      tmptext+= "<div  class=\'col-sm-3\'>";
      tmptext+= "<input type=\'number\'  step=\'any\' placeholder=\'ส่วนผสมที่ได้ต่อ 1 ขวด\' class=\'form-control form-control-user\' id = \'mp_volume"+i+"\' name=\'mp_volume[]\' >";
      tmptext+= "</div>";
      tmptext+= "</div>";
    } 
    return tmptext;
  }
  ';
  ?>

  $("#cal-volume").click(function(){
    var amount = $("#amount").val();
    var packeting_no = parseInt($("#packeting-no").val());
    if(!Number.isNaN(packeting_no) && packeting_no!=0){
      for (var i = 0; i < parseInt(amount); i++) {
        var mp_unit = parseInt($("#mp_unit"+i).val());
        var mp_volume = mp_unit/packeting_no;
        $("#mp_volume"+i).val(mp_volume)
      }
    }
  });

  $("#cal-reset").click(function(){
   var tmp_mt_volume = "";
   var amount = $("#amount").val();
   if (amount>0){

   }
   else {
    var tmp_mt_volume ="0";
  }

  for (var i = 0; i < parseInt(amount); i++) {
    $("#mp_volume"+i).val(tmp_mt_volume[i]);
    $("#mp_unit"+i).val(tmp_mt_unit[i])
    $("#mp_price"+i).val(tmp_mt_price[i])
  }
});
</script>
</body>
</html>
