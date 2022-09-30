<?php include './check_user.php';
include './connect.php';
$sp_id= ISSET($_GET["sp_id"])?$_GET["sp_id"]:'';


$sp_price = isset($_POST["sp_price"])?$_POST["sp_price"]:'';
$sp_volume = isset($_POST["sp_volume"])?$_POST["sp_volume"]:'';
$sp_no = isset($_POST["sp_no"])?$_POST["sp_no"]:'';
$sp_packeting_cost = isset($_POST["sp_packeting_cost"])?$_POST["sp_packeting_cost"]:'';

$p_title = isset($_POST["p_title"])?$_POST["p_title"]:'';
$pd_name = isset($_POST['pd_name'])?$_POST['pd_name']:'';
$material_cal_name = isset($_POST["material_cal_name"])?$_POST["material_cal_name"]:'';


$sql = "UPDATE sub_products  SET sp_price='$sp_price',sp_volume='$sp_volume',pro_id='$p_title',pd_id='$pd_name',sp_packeting_cost='$sp_packeting_cost',sp_no='$sp_no',material_cal_idss='$material_cal_name' WHERE sp_id='$sp_id'"; 
$result = $conn->query($sql);

if ($result) {
          echo "
          <script> 
          window.location.href ='../sub-products.php';
          </script>
          ";
      }
      else{
          // $myFile = $target_file2;
          // unlink($myFile) or die("Couldn't delete file");
      echo $conn->error;
          echo "เกิดข้อผิดพลาด!";
      }
?>