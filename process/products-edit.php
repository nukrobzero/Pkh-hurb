 <?php include './check_user.php';
 include './connect.php';
 
 $pd_id = htmlspecialchars( isset($_GET['pd_id'])?$_GET['pd_id']:'');

 $pd_name = htmlspecialchars( isset($_POST['pd_name'])?$_POST['pd_name']:'');
 $pd_detail = htmlspecialchars( isset($_POST['pd_detail'])?$_POST['pd_detail']:'');

 $p_title = htmlspecialchars( isset($_POST["p_title"])?$_POST["p_title"]:'');
 $ctg_type = htmlspecialchars( isset($_POST["ctg_type"])?$_POST["ctg_type"]:'');

 $sql = "UPDATE products SET pd_name='$pd_name',promo_id='$p_title',ctg_id='$ctg_type',pd_detail='$pd_detail' WHERE pd_id='$pd_id'";

 $result = $conn->query($sql);

 if ($result) {
 	echo "
 	<script> 
 	window.location.href ='../products.php';
 	</script>
 	";
 }
 else{
 	// echo "Error updated record: " . $conn->error;
 	echo "
 	<script> 
 	alert('มีการกรอกข้อมูลซ้ำ');
 	window.location.href ='../products-edit.php';
 	</script>
 	";
 }
 ?>