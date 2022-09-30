<?php session_start();
$pieces = dirname($_SERVER['PHP_SELF']);
$pieces = explode("/", $pieces);
$page;

if(@$pieces[2]!=""){
	include '../process/connect.php';
	$page = "/".$pieces[2]."/".basename($_SERVER['PHP_SELF']);
}
else {
	include './process/connect.php';
	$page = "/".basename($_SERVER['PHP_SELF']);
}

$user_username = isset($_SESSION["user_username"])?$_SESSION["user_username"]:'' ;
$user_status = isset($_SESSION["user_status"])?$_SESSION["user_status"]:'' ;


$sql = "SELECT * FROM page_license INNER JOIN pages ON  page_license.page_ids = pages.pages_id INNER JOIN sub_pages ON pages.pages_id = sub_pages.pages_ids WHERE (( pages.page_path = '".$page."' and page_license.permission = 1 and page_license.position_ids='".$user_status."' ) or ( sub_pages.sub_pages_path = '".$page."' and page_license.permission = 1 and page_license.position_ids='".$user_status."' )) ";
$result = $conn->query($sql);
echo $conn->error; 

// IF PAGE SET LICENSE AND SET PAGE CAN BE GET IN THIS PAGE
if($result->num_rows >0 ){
		// echo "1".$page.$user_username;
}
else {
	$sql_double_check = "SELECT * FROM pages INNER JOIN sub_pages ON  pages.pages_id = sub_pages.pages_ids WHERE pages.page_path = '".$page."'";
	$result2 = $conn->query($sql_double_check);
	// if page not set on database
	if($result2->num_rows == 0 ){
		//echo "01".$result2->num_rows;
	}
	// if page set on database but not set page_license
	else{
		//echo "00".$result2->num_rows;

		// if not login
		if ($user_username=='' or $staff_username=='') {
			echo "
			<script>
			window.location.href ='./login.php';
			</script>
			";
		}
		// if loined
		else {
			echo "
			<script>
			window.location.href ='./index.php';
			</script>
			";
		}
		exit;
	}
}




?>