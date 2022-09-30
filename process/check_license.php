<?php include './connect.php';
include './check_user.php';
	$send =  isset($_GET["s"])?$_GET["s"]:'';
	$check =  isset($_GET["c"])?$_GET["c"]:'';
	
	$pieces = explode("/", $send);
	$page_ids = $pieces[0];
	$position_ids = $pieces[1];
	// echo $pieces[0]." ".$pieces[1]." ".$check;

	// position_ids='$position_ids',page_ids='$page_ids',
	$sql0 = "SELECT * FROM page_license WHERE position_ids='$position_ids' and page_ids='$page_ids' ";
	$result0 = $conn->query($sql0);
	
	if ($result0->num_rows > 0) {
		$sql ="UPDATE page_license SET permission = '$check' WHERE position_ids='$position_ids' and page_ids='$page_ids' ";
		$result = $conn->query($sql);
	}
	else {
		$sql2 = "INSERT INTO page_license (position_ids,page_ids,permission)
		VALUES ('$position_ids','$page_ids','$check')"; 
		$result2 = mysqli_query($conn,$sql2);

		echo $conn->error;
	}
?>