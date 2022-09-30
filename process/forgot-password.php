 <?php
 include './connect.php';
 include './check_user.php';


 $user_password = htmlspecialchars( isset($_POST['user_password'])?$_POST['user_password']:'');

 $user_password = md5($user_password);
 
 $sql = "UPDATE users SET user_password='$user_password' WHERE user_username='$user_username'  ";
 $result = $conn->query($sql);
 echo $user_username;
 if ($result === TRUE ) {
		// echo "Error updated record: " . $conn->error;
 	echo "
 	<script>
 	alert('แก้ไขรหัสผ่านเรียบร้อยแล้ว');
 	window.location.href='../forgot-password.php';
 	</script>
 	";
 } else {
 	echo "Error updated record: " . $conn->error;
 }

 $conn->close();

 ?>