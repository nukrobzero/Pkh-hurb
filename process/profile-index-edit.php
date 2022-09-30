 <?php include './check_user.php';
 include './connect.php';
 $user_id = htmlspecialchars( isset($_GET['user_id'])?$_GET['user_id']:'');
 $user_pre_name = htmlspecialchars( isset($_POST['user_pre_name'])?$_POST['user_pre_name']:'');
 $user_last_name = htmlspecialchars( isset($_POST['user_last_name'])?$_POST['user_last_name']:'');
 $user_name = htmlspecialchars( isset($_POST['user_name'])?$_POST['user_name']:'');
 $user_address = htmlspecialchars( isset($_POST['user_address'])?$_POST['user_address']:'');
 $user_birthday = htmlspecialchars( isset($_POST['user_birthday'])?$_POST['user_birthday']:'');
 $user_age = htmlspecialchars( isset($_POST['user_age'])?$_POST['user_age']:'');
 $user_sex = htmlspecialchars( isset($_POST['user_sex'])?$_POST['user_sex']:'');
 $user_password = htmlspecialchars( isset($_POST['user_password'])?$_POST['user_password']:'');
 $user_tel = htmlspecialchars( isset($_POST['user_tel'])?$_POST['user_tel']:'');
 $user_amphur = isset($_POST["user_amphur"])?$_POST["user_amphur"]:'';
 $user_district = isset($_POST["user_district"])?$_POST["user_district"]:'';
 $user_province	 = isset($_POST["user_province"])?$_POST["user_province"]:'';
 $user_codehome = isset($_POST["user_codehome"])?$_POST["user_codehome"]:'';
 $user_moo = isset($_POST["user_moo"])?$_POST["user_moo"]:'';
 $user_mooban = isset($_POST["user_mooban"])?$_POST["user_mooban"]:'';
 $user_postcode = isset($_POST["user_postcode"])?$_POST["user_postcode"]:'';

 $user_id = htmlspecialchars(isset($_GET['user_id'])?$_GET['user_id']:'');

 
 $sql = "UPDATE users SET user_pre_name='$user_pre_name',user_last_name='$user_last_name',user_name='$user_name',user_address='$user_address',user_birthday='$user_birthday',user_age='$user_age',user_sex='$user_sex',user_tel='$user_tel',user_amphur='$user_amphur',user_district='$user_district',user_province='$user_province',user_codehome='$user_codehome',user_moo='$user_moo',user_mooban='$user_mooban',user_postcode='$user_postcode' WHERE user_id='$user_id'";
 $result = $conn->query($sql);
 if ($result === TRUE ) {
		// echo "Error updated record: " . $conn->error;
 	echo "
 	<script>
 	window.location.href='../profile-index.php?user_id=$user_id'
 	</script>
 	";
 } else {
 	echo "Error updated record: " . $conn->error;
 	// echo "
 	// <script> 
 	// alert('มีการกรอกข้อมูลซ้ำ');
 	// window.location.href ='../users-control-edit.php';
 	// </script>
 	// ";
 }

 $conn->close();

 ?>