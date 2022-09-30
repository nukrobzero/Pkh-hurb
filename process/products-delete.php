 <?php include './check_user.php';
include './connect.php';
 $pd_id = htmlspecialchars( isset($_GET['pd_id'])?$_GET['pd_id']:'');
 
 $sql = "DELETE  FROM products where pd_id='$pd_id'";
 $result = $conn->query($sql);

 if ($result === TRUE) {
 	echo "
 	<script>
 	window.location.href='../products.php';
 	</script>
 	";
 } else {
 	echo "Error deleting record: " . $conn->error;
 }

 $conn->close();

 ?>