<?php include './check_user.php';
	include './connect.php'; 


$c_name = isset($_POST["c_name"])?$_POST["c_name"]:'';
$c_address = isset($_POST["c_address"])?$_POST["c_address"]:'';
$c_email = isset($_POST["c_email"])?$_POST["c_email"]:'';
$c_tel = isset($_POST["c_tel"])?$_POST["c_tel"]:'';
$c_companyid = isset($_POST["c_companyid"])?$_POST["c_companyid"]:'';

$sql = "INSERT INTO company (c_name,c_address,c_email,c_tel,c_companyid)
VALUES ('$c_name','$c_address','$c_email','$c_tel','$c_companyid') ";
$result = mysqli_query($conn,$sql);


if ($result) {
	echo "
	<script> 
	window.location.href ='../company.php';
	</script>
	";
}
else{
	echo mysqli_error($conn);
	echo "เกิดข้อผิดพลาด!";
}

?>
