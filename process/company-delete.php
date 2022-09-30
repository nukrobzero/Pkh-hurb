 <?php
 include './connect.php';
 include './check_user.php';
 
 $c_id = htmlspecialchars( isset($_GET['c_id'])?$_GET['c_id']:'');
 
 $sql = "DELETE  FROM company where c_id=$c_id";
 $result = $conn->query($sql);

 if ($result === TRUE) {
 	echo "
 	<script>
 	window.location.href='../company.php';
 	</script>
 	";
 } else {
 	echo "Error deleting record: " . $conn->error;
 }

 $conn->close();

 ?>