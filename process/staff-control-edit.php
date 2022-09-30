 <?php include './check_user.php';
 include './connect.php';
 $staff_id = htmlspecialchars( isset($_GET['staff_id'])?$_GET['staff_id']:'');

 $staff_username = isset($_POST["staff_username"])?$_POST["staff_username"]:'';
 $staff_password = isset($_POST["staff_password"])?$_POST["staff_password"]:'';
 $staff_pre_name = isset($_POST["staff_pre_name"])?$_POST["staff_pre_name"]:'';
 $staff_last_name = isset($_POST["staff_last_name"])?$_POST["staff_last_name"]:'';
 $staff_nickname = isset($_POST["staff_nickname"])?$_POST["staff_nickname"]:'';
 $staff_address = isset($_POST["staff_address"])?$_POST["staff_address"]:'';
 $staff_birthday = isset($_POST["staff_birthday"])?$_POST["staff_birthday"]:'';
 $staff_age = isset($_POST["staff_age"])?$_POST["staff_age"]:'';
 $staff_sex = isset($_POST["staff_sex"])?$_POST["staff_sex"]:'';
 $staff_password = isset($_POST["staff_password"])?$_POST["staff_password"]:'';
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
 
 $staff_password = md5($staff_password);

 //echo $staff_province,$staff_district;
 $sql = "UPDATE staff SET staff_username='$staff_username',staff_password='$staff_password',staff_pre_name='$staff_pre_name',staff_last_name='$staff_last_name',staff_nickname='$staff_nickname',staff_address='$staff_address',staff_birthday='$staff_birthday',staff_age='$staff_age',staff_sex='$staff_sex',staff_tel='$staff_tel',staff_workstart='$staff_workstart',staff_email='$staff_email',staff_status='$staff_status',staff_amphur='$staff_amphur',staff_district='$staff_district',staff_province='$staff_province',staff_codehome='$staff_codehome',staff_moo='$staff_moo',staff_postcode='$staff_postcode' WHERE staff_id='$staff_id' ";
 $result = $conn->query($sql);
 if ($result === TRUE ) {
		// echo "Error updated record: " . $conn->error;
 	 $sql_del = "DELETE  FROM tel where user_id='$staff_id'";
 	$result_del = $conn->query($sql_del);
 	if ($result_del === TRUE ) {
 		$staff_tel_a = $pieces = explode(",", $staff_tel);
		$j=0;
		for ($i=0; $i < count($staff_tel_a); $i++) { 
			$tmp_tel = $staff_tel_a[$i];
			$sql_tel = "INSERT INTO tel (user_id,tel)
			VALUES ('$staff_id','$tmp_tel')
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

 } else {
 	//echo "Error updated record: " . $conn->error;
 	echo "
 	<script> 
 	alert('มีการกรอกข้อมูลซ้ำ');
 	window.location.href ='../staff-control-edit.php';
 	</script>
 	";
 }

 $conn->close();

 ?>