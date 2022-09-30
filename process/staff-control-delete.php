 <?php include './check_user.php';
include './connect.php';
 $staff_id = htmlspecialchars( isset($_GET['staff_id'])?$_GET['staff_id']:'');

 $sql = "DELETE  FROM staff where staff_id='$staff_id'";
 $result = $conn->query($sql);

 if ($result === TRUE) {
 	echo "
 	<script>
 	window.location.href='../staff-control.php';
 	</script>
 	";
 } else {
 	echo "Error deleting record: " . $conn->error;
 }

 $conn->close();

 ?>