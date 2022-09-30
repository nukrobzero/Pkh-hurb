<?php  include './check_user.php';
include './connect.php';

$pdm_id = htmlspecialchars(isset($_GET["pdm_id"])?$_GET["pdm_id"]:'');
$pdm_status = htmlspecialchars(isset($_GET["pdm_status"])?$_GET["pdm_status"]:'');
$sub_p_id = htmlspecialchars(isset($_GET["sp_id"])?$_GET["sp_id"]:'');

$pdm_status = htmlspecialchars(isset($_POST["pdm_status"])?$_POST["pdm_status"]:'');
$sp_no = htmlspecialchars(isset($_POST["sub_product_number"])?$_POST["sub_product_number"]:'');
$mtr_id = isset($_POST["mtr_id"])?$_POST["mtr_id"]:'';
$mtrs_id = isset($_POST["mtrs_id"])?$_POST["mtrs_id"]:'';
//echo $sp_no.$sub_p_id;

if ($pdm_status==4){
	$sql ="UPDATE products_manufacture SET pdm_status='$pdm_status' WHERE pdm_id='$pdm_id'";

	$sql2 = "UPDATE sub_products SET sp_no=$sp_no WHERE sp_id='$sub_p_id'";
	$result2 = $conn->query($sql2);
	if ($result2 === TRUE) {
		for($i = 0; $i < count($mtr_id) ; $i++) {
			$mtr_id_tmp = $mtr_id[$i];
			$mtrs_id_tmp = $mtrs_id[$i];
			$sql3 = "UPDATE material SET m_no=$mtrs_id_tmp WHERE m_id='$mtr_id_tmp'";
			$result3 = $conn->query($sql3);
			if ($result3 === TRUE) {

			}
			else{
				echo "Error updated record3: " . $conn->error;
			}
		}
	}
	else {
		echo "Error updated record2: " . $conn->error;
	}
}
$result = $conn->query($sql);

if ($result === TRUE) {
	echo " 
	<script>
	window.location.href='../products-manufacture-approve.php';
	</script>
	";
} else {
	echo "Error updated record1: " . $conn->error;
}


?>