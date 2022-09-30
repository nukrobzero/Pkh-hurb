 <?php include './check_user.php';
 include './connect.php';
 
 $ctg_id = htmlspecialchars( isset($_GET['ctg_id'])?$_GET['ctg_id']:'');
 
 $sql = "DELETE  FROM category where ctg_id=$ctg_id";
 $result = $conn->query($sql);

 if ($result === TRUE) {
 	echo "
 	<script>
 	window.location.href='../category.php';
 	</script>
 	";
 } else {
 	echo "Error deleting record: " . $conn->error;
 }

 $conn->close();

 ?>