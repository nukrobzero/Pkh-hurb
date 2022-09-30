<?php  include './check_user.php';
include './connect.php';

$pdm_id = htmlspecialchars(isset($_GET["pdm_id"])?$_GET["pdm_id"]:'');
$pdm_status = htmlspecialchars(isset($_GET["pdm_status"])?$_GET["pdm_status"]:'');
$sub_p_id = htmlspecialchars(isset($_GET["sp_id"])?$_GET["sp_id"]:'');

$pdm_status = htmlspecialchars(isset($_POST["pdm_status"])?$_POST["pdm_status"]:'');
$sp_no = htmlspecialchars(isset($_POST["sub_product_number"])?$_POST["sub_product_number"]:'');

//echo $sp_no.$sub_p_id;
if ($pdm_status==99) {
	$sql ="UPDATE products_manufacture SET pdm_status='$pdm_status' WHERE pdm_id='$pdm_id'";
}
else if ($pdm_status==1){
	$sql ="UPDATE products_manufacture SET pdm_status='$pdm_status' WHERE pdm_id='$pdm_id'";
}
$result = $conn->query($sql);

if ($result === TRUE) {
	echo " 
	<script>
	window.location.href='../products-manufacture-show_list.php';
	</script>
	";
} else {
	echo "Error updated record1: " . $conn->error;
}


?>