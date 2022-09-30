 <?php
 include './connect.php';
 //include './check_user.php';

 $position_page_id = htmlspecialchars( isset($_GET['position_page_id'])?$_GET['position_page_id']:'');

 $position_name = isset($_POST["position_name"])?$_POST["position_name"]:'';
 
 $sql = "UPDATE positions SET position_name='$position_name' WHERE position_page_id='$position_page_id'";

 $result = $conn->query($sql);

 if ($result === TRUE) {
 	echo " 
 	<script>
 	window.location.href='../page-license.php';
 	</script>
 	";
 } else {
 	echo "Error updated record: " . $conn->error;
 }

 $conn->close();

 ?>