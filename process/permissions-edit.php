 <?php include './check_user.php';
include './connect.php';

 $staff_id = htmlspecialchars( isset($_GET['staff_id'])?$_GET['staff_id']:'');

 $staff_status = htmlspecialchars( isset($_POST["staff_status"])?$_POST["staff_status"]:'');

 
 $sql = "UPDATE staff SET staff_status='$staff_status' WHERE staff_id='$staff_id'";

 $result = $conn->query($sql);

 if ($result === TRUE) {
 	echo " 
 	<script>
 	window.location.href='../permissions.php';
 	</script>
 	";
 } else {
 	echo "Error updated record: " . $conn->error;
 }

 $conn->close();

 ?>