 <?php include './check_user.php';
 include './connect.php';
 $p_id = htmlspecialchars( isset($_GET['p_id'])?$_GET['p_id']:'');

 $p_percent = htmlspecialchars( isset($_POST['p_percent'])?$_POST['p_percent']:'');
 $p_bath = htmlspecialchars( isset($_POST['p_bath'])?$_POST['p_bath']:'');
 $p_pre_date= htmlspecialchars( isset($_POST['p_pre_date'])?$_POST['p_pre_date']:'');
 $p_pos_date= htmlspecialchars( isset($_POST['p_pos_date'])?$_POST['p_pos_date']:'');
 $p_title= htmlspecialchars( isset($_POST['p_title'])?$_POST['p_title']:'');

 $sql = "UPDATE promotions SET p_percent='$p_percent',p_bath='$p_bath',p_pre_date='$p_pre_date',p_pos_date='$p_pos_date',p_title='$p_title' WHERE p_id='$p_id'";

 $result = $conn->query($sql);

 if ($result === TRUE) {
 	echo " 
 	<script>
 	window.location.href='../promotions.php';
 	</script>
 	";
 } else {
 	// echo "Error updated record: " . $conn->error;
 	echo "
 	<script> 
 	alert('มีการกรอกข้อมูลซ้ำ');
 	window.location.href ='../promotions-edit.php';
 	</script>
 	";
 }
 ?>