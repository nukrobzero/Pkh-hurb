 <?php include './check_user.php';
 include './connect.php';

 $pdmm_id = htmlspecialchars( isset($_GET['pdmm_id'])?$_GET['pdmm_id']:'');
 $pdmm_status= ISSET($_GET["pdmm_status"])?$_GET["pdmm_status"]:'';
 $pdmm_username= ISSET($_GET["pdmm_username"])?$_GET["pdmm_username"]:'';

 $pdmm_status = htmlspecialchars( isset($_POST['pdmm_status'])?$_POST['pdmm_status']:'');
 //$user_username = isset($_SESSION["user_username"])?$_SESSION["user_username"]:'' ;

 $sql = "UPDATE products_manufacture_main SET pdmm_status='$pdmm_status' WHERE pdmm_id='$pdmm_id'";
 $result = $conn->query($sql);
 echo $conn->error;
 //echo $pdmm_id;
 if ($pdmm_status == 3) {
 	echo " 
 	<script>
 	window.location.href='../products-manufacture-main-show.php?pdmm_id=".$pdmm_id."&pdmm_status=".$pdmm_status."&pdmm_username=".$pdmm_username."';
 	</script>
 	";
 }
 else{
 	if ($result === TRUE) {
 		echo " 
 		<script>
 		window.location.href='../products-manufacture-show_list.php';
 		</script>
 		";
 	} else {
 	// echo "Error updated record: " . $conn->error;
 		echo "
 		<script> 
 		alert('มีการกรอกข้อมูลซ้ำ');
 		window.location.href ='../products-manufacture-main.php';
 		</script>
 		";
 	}
 }
 $conn->close();

 ?>