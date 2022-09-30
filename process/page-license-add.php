 <?php //include './check_user.php';
include './connect.php';


$position_name = isset($_POST["position_name"])?$_POST["position_name"]:'';


$sql = "INSERT INTO positions (position_name)
VALUES ('$position_name') ";
$result = mysqli_query($conn,$sql);

//echo $position_name;

if ($result) {
	echo "
	<script> 
	window.location.href ='../page-license.php';
	</script>
	";
}
else{
	echo mysqli_error($conn);
	echo "เกิดข้อผิดพลาด!";
}

 ?>