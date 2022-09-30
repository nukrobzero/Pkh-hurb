<?php  include './check_user.php';
include './connect.php';
	// $user_id = htmlspecialchars( isset($_GET['user_id'])?$_GET['user_id']:'');
$pdm_username = htmlspecialchars(isset($_POST["pdm_username"])?$_POST["pdm_username"]:''); 
$sp_volume = isset($_POST["sub_id"])?$_POST["sub_id"]:'';
$sp_no = htmlspecialchars(isset($_POST["sub_no"])?$_POST["sub_no"]:'');

$total_cost = htmlspecialchars(isset($_POST["cost_tmp"])?$_POST["cost_tmp"]:'');
$total_price = htmlspecialchars(isset($_POST["total_price_tmp"])?$_POST["total_price_tmp"]:'');
$profit = htmlspecialchars(isset($_POST["profit_tmp"])?$_POST["profit_tmp"]:'');
$pdmm_id = htmlspecialchars(isset($_POST["pdmm_id"])?$_POST["pdmm_id"]:'');

$user_id = $_SESSION["user_id"];
$user_username = $_SESSION["user_username"];
	// echo $pmm_id."potato".$profit;
$sql1 = "SELECT * FROM products_manufacture_main INNER JOIN products_manufacture ON products_manufacture_main.pdmm_id = products_manufacture.pd_main_id WHERE products_manufacture_main.pdmm_username = '$user_username' and products_manufacture_main.pdmm_status = 0";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0){
	$row1 = $result1->fetch_assoc(); 
	$pdmm_id = $row1["pdmm_id"];
	// CONFIC VALUES
	$id_prefix ="PDM-"; 
	$id_length = 4;
	$id_insert_pdm = "";

	$sql_last_id = "SELECT MAX(pdm_id) as pdm_ids FROM products_manufacture ";
	$result_last_id = $conn->query($sql_last_id);
	$row_last_id = $result_last_id->fetch_assoc();

		// echo -$id_length;
	if ($row_last_id["pdm_ids"]==""){
		$id_num = 1;
	}
	else{
		$new_id = intval (substr($row_last_id["pdm_ids"], -$id_length) );
		$id_num = $new_id+1;
	}

	$id_with_zero = str_pad($id_num, $id_length, "0", STR_PAD_LEFT);
	$id_insert_pdm = $id_prefix.$id_with_zero;	

	$sql_pmm_check = "SELECT * FROM products_manufacture_main WHERE pdmm_id = '$pdmm_id'";
	$result_pmm_check = $conn->query($sql_pmm_check);  

	if ($result_pmm_check->num_rows > 0) {
		$sql ="INSERT INTO products_manufacture (pdm_id,sub_p_id,pdm_cost,pdm_total_price,pdm_profit,pdm_status,pdm_no,pdm_username,pd_main_id )
		VALUES ('$id_insert_pdm','$sp_volume','$total_cost','$total_price','$profit','0','$sp_no','$user_username','$pdmm_id')";
		$result = $conn->query($sql);
	}

}
else {
	$sql_pmm = "INSERT INTO products_manufacture_main (pdmm_status,pdmm_username)
	VALUES (0,'$user_username')";
	$result_pmm = $conn->query($sql_pmm);
	$last_id = $conn->insert_id;
	//echo $last_id;
	// CONFIC VALUES
	$id_prefix ="PDM-"; 
	$id_length = 4;
	$id_insert_pdm = "";

	$sql_last_id = "SELECT MAX(pdm_id) as pdm_ids FROM products_manufacture ";
	$result_last_id = $conn->query($sql_last_id);
	$row_last_id = $result_last_id->fetch_assoc();

		// echo -$id_length;
	if ($row_last_id["pdm_ids"]==""){
		$id_num = 1;
	}
	else{
		$new_id = intval (substr($row_last_id["pdm_ids"], -$id_length) );
		$id_num = $new_id+1;
	}

	$id_with_zero = str_pad($id_num, $id_length, "0", STR_PAD_LEFT);
	$id_insert_pdm = $id_prefix.$id_with_zero;

	
	$sql ="INSERT INTO products_manufacture (pdm_id,sub_p_id,pdm_cost,pdm_total_price,pdm_profit,pdm_status,pdm_no,pdm_username,pd_main_id )
	VALUES ('$id_insert_pdm','$sp_volume','$total_cost','$total_price','$profit','0','$sp_no','$user_username','$last_id')";
	$result = $conn->query($sql);
	echo $pdmm_id;
			// if ($result) {
			// 	echo $conn->error;
			// } else {
			// 	echo $conn->error;


}




?>