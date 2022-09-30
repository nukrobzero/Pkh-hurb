 <?php
 include './connect.php';
 include './check_user.php';
 
 $m_id = htmlspecialchars( isset($_GET['m_id'])?$_GET['m_id']:'');

 $sql = "DELETE  FROM material where m_id=$m_id";
 $result = $conn->query($sql);

 if ($result === TRUE) {
 	echo "
 	<script>
 	window.location.href='../material.php';
 	</script>
 	";
 } else {
 	echo "Error deleting record: " . $conn->error;
 }

 $conn->close();

 ?>