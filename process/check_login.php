<?php session_start();
include './connect.php';

$username = htmlspecialchars( isset($_POST['username'])?$_POST['username']:'');
$password = isset($_POST['password'])?$_POST['password']:'';
$password = md5($password);

// $staff_username = htmlspecialchars( isset($_POST['staff_username'])?$_POST['staff_username']:'');
// $staff_password	 = isset($_POST['staff_password'])?$_POST['staff_password']:'';
// $staff_password =md5($staff_password);

	// echo $name.$password;
$sql_u = "SELECT * FROM users WHERE user_username = '$username' and user_password = '$password' ";
// $sql_s = "SELECT * FROM staff WHERE staff_username = '$staff_username' and staff_password = '$staff_password' ";
$result_u = $conn->query($sql_u);
// $result_u = mysqli_query($conn,$sql_u);
// $result_s = mysqli_query($conn,$sql_s);

if ($result_u->num_rows > 0) {
	$row = $result_u->fetch_assoc();
	$_SESSION["user_username"] = $username;
	$_SESSION["user_id"] = $row["user_id"];
	$_SESSION["user_status"] = $row["user_status"];
	//echo 1;
	echo "
	<script>
	window.location.href='../index.php';
	</script>
	";
}
else {
	$sql_s = "SELECT * FROM staff WHERE staff_username = '$username' and staff_password = '$password' ";
	// $sql_s = "SELECT * FROM staff WHERE staff_username = '$staff_username' and staff_password = '$staff_password' ";
	$result_s= $conn->query($sql_s);
	if ($result_s->num_rows > 0) {
		$row = $result_s->fetch_assoc();
		$_SESSION["user_username"] = $username;
		$_SESSION["user_id"] = $row["staff_id"];
		$_SESSION["user_status"] = $row["staff_status"];
		//echo 2;
		echo "
		<script>
		window.location.href='../admin-index.php';
		</script>
		";
	}
	else {
		//echo 3;
		echo "
		<script>
		alert('ผู้ใช้ หรือ รหัสผ่าน ผิดพลาด');
		window.location.href='../login.php';
		</script>
		";
	}
}


	// echo "
	// <script>
	// alert('ผู้ใช้ หรือ รหัสผ่าน ผิดพลาด');
	// window.location.href='../login.php';
	// </script>";


$conn->close();
?>