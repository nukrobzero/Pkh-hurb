<?php include './check_user.php';
include './connect.php';
$staff_pre_name = isset($_POST["staff_pre_name"])?$_POST["staff_pre_name"]:'';
$staff_last_name = isset($_POST["staff_last_name"])?$_POST["staff_last_name"]:'';
$staff_nickname = isset($_POST["staff_nickname"])?$_POST["staff_nickname"]:'';
$staff_address = isset($_POST["staff_address"])?$_POST["staff_address"]:'';
$staff_birthday = isset($_POST["staff_birthday"])?$_POST["staff_birthday"]:'';
$staff_age = isset($_POST["staff_age"])?$_POST["staff_age"]:'';
$staff_sex = isset($_POST["staff_sex"])?$_POST["staff_sex"]:'';
$staff_username = isset($_POST["staff_username"])?$_POST["staff_username"]:'';
$staff_password = isset($_POST["staff_password"])?$_POST["staff_password"]:'';
$staff_repassword = isset($_POST["staff_repassword"])?$_POST["staff_repassword"]:'';
$staff_status = isset($_POST["staff_status"])?$_POST["staff_status"]:'';
$staff_tel = isset($_POST["staff_tel"])?$_POST["staff_tel"]:'';
$staff_workstart = isset($_POST["staff_workstart"])?$_POST["staff_workstart"]:'';
$staff_email = isset($_POST["staff_email"])?$_POST["staff_email"]:'';
$staff_amphur = isset($_POST["staff_amphur"])?$_POST["staff_amphur"]:'';
$staff_district = isset($_POST["staff_district"])?$_POST["staff_district"]:'';
$staff_province	 = isset($_POST["staff_province"])?$_POST["staff_province"]:'';
$staff_codehome = isset($_POST["staff_codehome"])?$_POST["staff_codehome"]:'';
$staff_moo = isset($_POST["staff_moo"])?$_POST["staff_moo"]:'';
$staff_postcode = isset($_POST["staff_postcode"])?$_POST["staff_postcode"]:'';

// echo $staff_province." ".$staff_amphur;

$staff_password = md5($staff_password);
$staff_repassword = md5($staff_repassword);

if($staff_password == $staff_repassword) {
	// CONFIC VALUES
	$id_prefix ="STAFF-"; 
	$id_length = 4;
	$id_insert = "";

	$sql_last_id = "SELECT MAX(staff_id) as staff_ids FROM staff";
	$result_last_id = $conn->query($sql_last_id);
	$row_last_id = $result_last_id->fetch_assoc();

		// echo -$id_length;
	if ($row_last_id["staff_ids"]==""){
		$id_num = 1;
	}
	else{
		$new_id = intval (substr($row_last_id["staff_ids"], -$id_length) );
		$id_num = $new_id+1;
	}

	$id_with_zero = str_pad($id_num, $id_length, "0", STR_PAD_LEFT);
	$id_insert = $id_prefix.$id_with_zero;

	$sql = "INSERT INTO staff (staff_id,staff_pre_name,staff_last_name,staff_nickname,staff_address,staff_birthday,staff_age,staff_sex,staff_username,staff_password,staff_workstart,staff_email,staff_status,staff_amphur,staff_district,staff_province,staff_codehome,staff_moo,staff_postcode)
	VALUES ('$id_insert','$staff_pre_name','$staff_last_name','$staff_nickname','$staff_address','$staff_birthday','$staff_age','$staff_sex','$staff_username','$staff_password','$staff_workstart','$staff_email','97','$staff_amphur','$staff_district','$staff_province','$staff_codehome','$staff_moo','$staff_postcode') ";
	$result = mysqli_query($conn,$sql);


	if ($result) {
		$staff_tel_a = $pieces = explode(",", $staff_tel);
		$j=0;
		for ($i=0; $i < count($staff_tel_a); $i++) { 
			$tmp_tel = $staff_tel_a[$i];
			$sql_tel = "INSERT INTO tel (user_id,tel)
			VALUES ('$id_insert','$tmp_tel')
			";
			$result_tel = mysqli_query($conn,$sql_tel);
			if ($result_tel){
				$j++;
			}
			else{
				echo $conn->error.$tmp_tel;
			}
		}
		if ($j==count($staff_tel_a)){
			echo "
				<script> 
				window.location.href ='../staff-control.php';
				</script>
				";
		}
		
	}
	else{
		echo mysqli_error($conn);
	// echo "เกิดข้อผิดพลาด!";
		echo "
		<script> 
		alert('มีการกรอกข้อมูลซ้ำ');
		window.location.href ='../staff-control-add.php';
		</script>
		";
	}
}
else{
	echo "
	<script> 
	alert('รหัสผ่านไม่ตรงกัน');
	window.location.href ='../staff-control-add.php';
	</script>"; 
}

?>
