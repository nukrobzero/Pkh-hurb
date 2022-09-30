 <?php include './check_user.php';
include './connect.php';

 $sp_id = htmlspecialchars( isset($_GET['sp_id'])?$_GET['sp_id']:'');

 $sql = "DELETE  FROM sub_products where sp_id='$sp_id'";
 $result = $conn->query($sql);

 if ($result === TRUE) {
 	echo "
 	<script>
 	window.location.href='../sub-products.php';
 	</script>
 	";
 } else {
 	echo "Error deleting record: " . $conn->error;
 }
 $conn->close();
 ?>