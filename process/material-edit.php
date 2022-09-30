 <?php include './check_user.php';
 include './connect.php';
 
 $m_id = htmlspecialchars( isset($_GET['m_id'])?$_GET['m_id']:'');

 $m_name = htmlspecialchars( isset($_POST['m_name'])?$_POST['m_name']:'');
 $m_detail = htmlspecialchars( isset($_POST['m_detail'])?$_POST['m_detail']:'');
 $m_no = htmlspecialchars( isset($_POST['m_no'])?$_POST['m_no']:'');


 $sql = "UPDATE material SET m_name='$m_name',m_detail='$m_detail',m_no='$m_no' WHERE m_id='$m_id'";

 $result = $conn->query($sql);

 if ($result === TRUE) {
 	echo " 
 	<script>
 	window.location.href='../material.php';
 	</script>
 	";
 } else {
 	// echo "Error updated record: " . $conn->error;
 	echo "
 	<script> 
 	alert('มีการกรอกข้อมูลซ้ำ');
 	window.location.href ='../material-edit.php';
 	</script>
 	";
 }
 ?>