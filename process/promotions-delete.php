 <?php include './check_user.php';
include './connect.php';

 $p_id = htmlspecialchars( isset($_GET['p_id'])?$_GET['p_id']:'');

 
 $sql = "DELETE  FROM promotions where p_id=$p_id";
 $result = $conn->query($sql);

 if ($result === TRUE) {
 	echo "
 	<script>
 	window.location.href='../promotions.php';
 	</script>
 	";
 } else {
 	echo "Error deleting record: " . $conn->error;
 }

 $conn->close();

 ?>