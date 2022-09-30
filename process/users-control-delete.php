 <?php include './check_user.php';
include './connect.php';
 $user_id = isset($_GET['user_id'])?$_GET['user_id']:'';

 $sql = "DELETE  FROM users where user_id='$user_id'";
 $result = $conn->query($sql);

 if ($result === TRUE) {
 	echo "
 	<script>
 	window.location.href='../users-control.php';
 	</script>
 	";
 } else {
 	echo "Error deleting record: " . $conn->error;
 }

 $conn->close();

 ?>