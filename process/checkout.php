<?php include './check_user.php';
	include './connect.php';  

// $cart_id = isset($_GET["cart_id"])?$_GET["cart_id"]:'';
// $bp_id = isset($_POST["bp_id"])?$_POST["bp_id"]:'';
// $status = isset($_POST["status"])?$_POST["status"]:'';
// $image = isset($_POST["image"])?$_POST["image"]:'';
// $b_date = isset($_POST["b_date"])?$_POST["b_date"]:'';
// $employee_id = isset($_POST["employee_id"])?$_POST["employee_id"]:'';
$user_username = isset($_SESSION["user_username"])?$_SESSION["user_username"]:'' ;
$user_id = isset($_SESSION["user_id"])?$_SESSION["user_id"]:'' ;

$bp_id= ISSET($_GET["bp_id"])?$_GET["bp_id"]:'';
$cart_id= ISSET($_GET["cart_id"])?$_GET["cart_id"]:'';
$status= ISSET($_GET["status"])?$_GET["status"]:'';
$b_date= ISSET($_GET["b_date"])?$_GET["b_date"]:'';
$delivery = isset($_GET["delivery"])?$_GET["delivery"]:'';
// echo $delivery;
// exit;
$sql_check_user = "SELECT * FROM cart where cart_user_id ='$user_id' and cart_status=0";
$result_check_user = $conn->query($sql_check_user);


if (mysqli_num_rows($result_check_user) > 0 ){
	$row_check_user = $result_check_user->fetch_assoc();
	$cart_id = $row_check_user["cart_id"];

	// CONFIC VALUES
		$id_prefix ="BILL-"; 
		$id_length = 4;
		$id_insert = "";

		$sql_last_id = "SELECT MAX(bp_id) as bp_ids FROM bill_products ";
		$result_last_id = $conn->query($sql_last_id);
		$row_last_id = $result_last_id->fetch_assoc();

		// echo -$id_length;
		if ($row_last_id["bp_ids"]==""){
			$id_num = 1;
		}
		else{
			$new_id = intval (substr($row_last_id["bp_ids"], -$id_length) );
			$id_num = $new_id+1;
		}

		$id_with_zero = str_pad($id_num, $id_length, "0", STR_PAD_LEFT);
		$id_insert = $id_prefix.$id_with_zero;

	$sql = "INSERT INTO bill_products (bp_id,status,delivery,cart_id)
	VALUES ('$id_insert',0,'$delivery','$cart_id')";
	$result = mysqli_query($conn,$sql);

	if ($result) {
		$sql2 =  "UPDATE cart SET cart_status='1' WHERE cart_id='".$cart_id."'";
	 	$result2 = $conn->query($sql2);
	 	//echo $cart_id,$cart_status,$delivery;
		echo "
		<script> 
		window.location.href ='../uploadslip.php?cart_id=".$cart_id."';
		</script>
		";
		//echo $conn->error;
	}
	else{
		echo mysqli_error($conn);
		// echo "เกิดข้อผิดพลาด!";
		// echo "
	 //        <script> 
	 //        alert('มีการกรอกข้อมูลซ้ำ');
	 //        window.location.href ='../checkout.php?user_id='".$user_id."'';
	 //        </script>
	 //        ";
	}
}
?>