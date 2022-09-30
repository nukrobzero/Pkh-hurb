<?php include './check_user.php';
include './connect.php';
$user_pre_name = isset($_POST["user_pre_name"])?$_POST["user_pre_name"]:'';
$user_last_name = isset($_POST["user_last_name"])?$_POST["user_last_name"]:'';
$user_name = isset($_POST["user_name"])?$_POST["user_name"]:'';
$user_address = isset($_POST["user_address"])?$_POST["user_address"]:'';
$user_birthday = isset($_POST["user_birthday"])?$_POST["user_birthday"]:'';
$user_age = isset($_POST["user_age"])?$_POST["user_age"]:'';
$user_sex = isset($_POST["user_sex"])?$_POST["user_sex"]:'';
$user_username = isset($_POST["user_username"])?$_POST["user_username"]:'';
$user_password = isset($_POST["user_password"])?$_POST["user_password"]:'';
$user_repassword = isset($_POST["user_repassword"])?$_POST["user_repassword"]:'';
$user_status = isset($_POST["user_status"])?$_POST["user_status"]:'';
$user_tel = isset($_POST["user_tel"])?$_POST["user_tel"]:'';
$user_time = isset($_POST["user_time"])?$_POST["user_time"]:'';
$user_email = isset($_POST["user_email"])?$_POST["user_email"]:'';
$user_amphur = isset($_POST["user_amphur"])?$_POST["user_amphur"]:'';
$user_district = isset($_POST["user_district"])?$_POST["user_district"]:'';
$user_province	 = isset($_POST["user_province"])?$_POST["user_province"]:'';
$user_codehome = isset($_POST["user_codehome"])?$_POST["user_codehome"]:'';
$user_moo = isset($_POST["user_moo"])?$_POST["user_moo"]:'';
$user_mooban = isset($_POST["user_mooban"])?$_POST["user_mooban"]:'';
$user_postcode = isset($_POST["user_postcode"])?$_POST["user_postcode"]:'';

$user_password = md5($user_password);
$user_repassword = md5($user_repassword);

if($user_password == $user_repassword) {

	// CONFIC VALUES
	$id_prefix ="USER-"; 
	$id_length = 4;
	$id_insert = "";

	$sql_last_id = "SELECT MAX(user_id) as user_ids FROM users ";
	$result_last_id = $conn->query($sql_last_id);
	$row_last_id = $result_last_id->fetch_assoc();

		// echo -$id_length;
	if ($row_last_id["user_ids"]==""){
		$id_num = 1;
	}
	else{
		$new_id = intval (substr($row_last_id["user_ids"], -$id_length) );
		$id_num = $new_id+1;
	}

	$id_with_zero = str_pad($id_num, $id_length, "0", STR_PAD_LEFT);
	$id_insert = $id_prefix.$id_with_zero;


	$sql = "INSERT INTO users (user_id,user_pre_name,user_last_name,user_name,user_address,user_birthday,user_age,user_sex,user_username,user_password,user_tel,user_email,user_status,user_amphur,user_district,user_province,user_codehome,user_moo,user_mooban,user_postcode)
	VALUES ('$id_insert','$user_pre_name','$user_last_name','$user_name','$user_address','$user_birthday','$user_age','$user_sex','$user_username','$user_password','$user_tel','$user_email','1','$user_amphur','$user_district','$user_province','$user_codehome','$user_moo','$user_mooban','$user_postcode') ";
	$result = mysqli_query($conn,$sql);


	if ($result) {
		echo "
		<script> 
		window.location.href ='../users-control.php';
		</script>
		";
	}
	else{
	// echo mysqli_error($conn);
	// echo "เกิดข้อผิดพลาด!";
		echo "
		<script> 
		alert('มีการกรอกข้อมูลซ้ำ');
		window.location.href ='../users-control-add.php';
		</script>
		";
	}
}
else{
	echo "
	<script> 
	alert('รหัสผ่านไม่ตรงกัน');
	window.location.href ='../users-control-add.php';
	</script>"; 
}

?>
