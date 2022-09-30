 <?php include './check_user.php';
include './connect.php';
 $user_pre_name = htmlspecialchars( isset($_POST['user_pre_name'])?$_POST['user_pre_name']:'');
 $user_last_name = htmlspecialchars( isset($_POST['user_last_name'])?$_POST['user_last_name']:'');
 $user_name = htmlspecialchars( isset($_POST['user_name'])?$_POST['user_name']:'');
 $user_address = htmlspecialchars( isset($_POST['user_address'])?$_POST['user_address']:'');
 $user_birthday = htmlspecialchars( isset($_POST['user_birthday'])?$_POST['user_birthday']:'');
 $user_age = htmlspecialchars( isset($_POST['user_age'])?$_POST['user_age']:'');
 $user_sex = htmlspecialchars( isset($_POST['user_sex'])?$_POST['user_sex']:'');
 $user_password = htmlspecialchars( isset($_POST['user_password'])?$_POST['user_password']:'');
 $user_tel = htmlspecialchars( isset($_POST['user_tel'])?$_POST['user_tel']:'');


 $ad_amphur = htmlspecialchars( isset($_POST['ad_amphur'])?$_POST['ad_amphur']:'');
 $ad_district = htmlspecialchars( isset($_POST['ad_district'])?$_POST['ad_district']:'');
 $ad_province = htmlspecialchars( isset($_POST['ad_province'])?$_POST['ad_province']:'');
 $ad_postcode = htmlspecialchars( isset($_POST['ad_postcode'])?$_POST['ad_postcode']:'');
 $ad_user_name = htmlspecialchars( isset($_POST['ad_user_name'])?$_POST['ad_user_name']:'');
 $ad_codehome = htmlspecialchars( isset($_POST['ad_codehome'])?$_POST['ad_codehome']:'');
 $ad_moo = htmlspecialchars( isset($_POST['ad_moo'])?$_POST['ad_moo']:'');
 $ad_mooban = htmlspecialchars( isset($_POST['ad_mooban'])?$_POST['ad_mooban']:'');

 $user_password = md5($user_password);
 //echo $ad_amphur."-".$ad_amphur."-".$ad_province."-".$ad_postcode;
 $sql = "UPDATE users SET user_pre_name='$user_pre_name',user_last_name='$user_last_name',user_name='$user_name',user_address='$user_address',user_birthday='$user_birthday',user_age='$user_age',user_sex='$user_sex',user_password='$user_password',user_tel='$user_tel' WHERE user_username='$user_username'  ";
 $result = $conn->query($sql);

 $sql1 = "SELECT * FROM address WHERE ad_user_name='$user_username'";
 $result1 = $conn->query($sql1);


 if ($result === TRUE ) {
 	if($result1->num_rows > 0){
 		$sql2 = "UPDATE address SET ad_amphur='$ad_amphur',ad_district='$ad_district',ad_province='$ad_province',ad_postcode='$ad_postcode',ad_codehome='$ad_codehome',ad_moo='$ad_moo' WHERE ad_user_name='$user_username' ";
 	}
 	else {
 		$sql2 = "INSERT INTO address (ad_amphur,ad_district,ad_province,ad_postcode,ad_user_name,ad_codehome,ad_moo,ad_mooban)
 		VALUES ('$ad_amphur','$ad_district','$ad_province','$ad_postcode','$user_username','$ad_codehome','$ad_moo','$ad_mooban') ";
 	}
 	$result2 = $conn->query($sql2);
 	// echo "insert address ".$conn->error;
 	if ($result2 === TRUE ) {
 		echo "
 		<script>
 		window.location.href='../profile.php';
 		</script>
 		";
 	}
 } else {
 	echo "Error updated record: " . $conn->error;
 }

 $conn->close();

 ?>