 <?php
 include './connect.php';
 include './check_user.php';
 
 $material_cal_id = htmlspecialchars( isset($_GET['material_cal_id'])?$_GET['material_cal_id']:'');

 $sql = "DELETE  FROM material_cal where material_cal_id=$material_cal_id";
 $result = $conn->query($sql);

 if ($result === TRUE) {
 	echo "
 	<script>
 	window.location.href='../material-cal.php';
 	</script>
 	";
 } else {
 	echo "Error deleting record: " . $conn->error;
 }

 $conn->close();

 ?>