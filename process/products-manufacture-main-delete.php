 <?php include './check_user.php';
 include './connect.php';
 $pdmm_id = htmlspecialchars( isset($_GET['pdmm_id'])?$_GET['pdmm_id']:'');
 $pdmm_status= ISSET($_GET["pdmm_status"])?$_GET["pdmm_status"]:'';

 $pdm_id = isset($_GET['pdm_id'])?$_GET['pdm_id']:'';
 $user_username = isset($_SESSION["user_username"])?$_SESSION["user_username"]:'' ;
 $sql = "DELETE  FROM products_manufacture where pdm_id='$pdm_id'";
 $result = $conn->query($sql);
 //echo "Error deleting record: " . $conn->error;
 if ($result === TRUE) {
 	$sql2= "SELECT * FROM products_manufacture_main INNER JOIN products_manufacture ON products_manufacture_main.pdmm_id=products_manufacture.pd_main_id WHERE pdmm_username='$user_username' and pdmm_status = 0";
 	$result2 = $conn->query($sql2);

 	if (mysqli_num_rows($result2) == 0) {
 		//exit();
 		$sql3 = "DELETE  FROM products_manufacture_main where pdmm_username='$user_username' and pdmm_status=0";
 		$result3 = $conn->query($sql3);

 	}
 	else{

 	}
 	echo " 
 	<script>
 	window.location.href='../products-manufacture-main.php';
 	</script>
 	";
 }
 else{

 	echo "Error deleting record: " . $conn->error;
 }

 $conn->close();

 ?>