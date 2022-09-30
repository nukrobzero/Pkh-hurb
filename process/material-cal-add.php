<?php  //include './check_user.php';
include './connect.php';

$pd_mc_id = isset($_POST["pd_mc_id"])?$_POST["pd_mc_id"]:'';
$material_cal_name = isset($_POST["material_cal_name"])?$_POST["material_cal_name"]:'';
$material_cal_detail = isset($_POST["material_cal_detail"])?$_POST["material_cal_detail"]:'';
$material_cal_or_not = isset($_POST["material_cal_or_not"])?$_POST["material_cal_or_not"]:'';

$m_name = isset($_POST["m_name"])?$_POST["m_name"]:'';
$mp_volume = isset($_POST["mp_volume"])?$_POST["mp_volume"]:'';
$mp_unit = isset($_POST["mp_unit"])?$_POST["mp_unit"]:'';
$mp_price = isset($_POST["mp_price"])?$_POST["mp_price"]:'';

//echo $m_name[0]." and ".$mp_volume[0];

$m_id = htmlspecialchars( isset($_GET['m_id'])?$_GET['m_id']:'');

$sql = "INSERT INTO material_cal (pd_mc_id,material_cal_name,material_cal_detail,material_cal_or_not)
VALUES ('$pd_mc_id','$material_cal_name','$material_cal_detail','$material_cal_or_not') ";
$result = mysqli_query($conn,$sql);

$material_cal_ids = mysqli_insert_id($conn);

$amount = isset($_POST["amount"])?$_POST["amount"]:'';
$check_mtr = 1;
if ($result){
  for ($j=0; $j <$amount ; $j++) {
    $mp_volume1 = $mp_volume[$j];
    $mp_unit1 = $mp_unit[$j];
    $mp_price1 = $mp_price[$j];
    @$m_name1 = $m_name[$j];
    $mp_volume = isset($mp_volume)?$mp_volume:'0';
    $mp_unit = isset($mp_unit)?$mp_unit:'0';
    $mp_price = isset($mp_price)?$mp_price:'0';
    $m_name1 = isset($m_name1)?$m_name1:'0';

    //echo $m_name1." ";
    if($m_name1!='0'){
      $sql2 = "INSERT INTO material_products (mp_volume,mp_unit,mp_price,mat_id,material_cal_ids)
      VALUES ('$mp_volume1','$mp_unit1','$mp_price1','$m_name1','$material_cal_ids')"; 
      $result2 = mysqli_query($conn,$sql2);

      if (!$result) {
        echo $conn->error."<br>";
        $check_mtr = 0;
      }
    }
  }
}
else {
  $check_mtr = 0;
  echo "เกิดข้อผิดพลาด".$conn->error;
}

if ($check_mtr) {
  echo "
  <script> 
  window.location.href ='../material-cal.php';
  </script>
  ";
}
?>
