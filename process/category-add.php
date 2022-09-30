<?php include './check_user.php';
	include './connect.php';  ?>
<?php
$p_id = isset($_POST["p_title"])?$_POST["p_title"]:'';
$ctg_type = isset($_POST["ctg_type"])?$_POST["ctg_type"]:'';

$sql = "INSERT INTO category (ctg_type)
VALUES ('$ctg_type') ";
$result = mysqli_query($conn,$sql);

if ($result) {
	echo "
	<script> 
	window.location.href ='../category.php';
	</script>
	";
}
else{
	// echo mysqli_error($conn);
	// echo "เกิดข้อผิดพลาด!";
	echo "
        <script> 
        alert('มีการกรอกข้อมูลซ้ำ');
        window.location.href ='../category-add.php';
        </script>
        ";
}

?>
