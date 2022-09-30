 <?php
 include './connect.php';
 include './check_user.php';

 $c_id = htmlspecialchars( isset($_GET['c_id'])?$_GET['c_id']:'');

 $c_name = htmlspecialchars( isset($_POST['c_name'])?$_POST['c_name']:'');
 $c_address = htmlspecialchars( isset($_POST['c_address'])?$_POST['c_address']:'');
 $c_email = htmlspecialchars( isset($_POST['c_email'])?$_POST['c_email']:'');
 $c_tel= htmlspecialchars( isset($_POST['c_tel'])?$_POST['c_tel']:'');
 $c_companyid = htmlspecialchars( isset($_POST['c_companyid'])?$_POST['c_companyid']:'');
 
 $sql = "UPDATE company SET c_name='$c_name',c_address='$c_address',c_email='$c_email',c_tel='$c_tel',c_companyid='$c_companyid' WHERE c_id='$c_id'";

 $result = $conn->query($sql);

 if ($result === TRUE) {
 	echo " 
 	<script>
 	window.location.href='../company.php';
 	</script>
 	";
 } else {
 	echo "Error updated record: " . $conn->error;
 }

 $conn->close();

 ?>