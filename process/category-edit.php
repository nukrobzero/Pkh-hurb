 <?php include './check_user.php';
 include './connect.php';

 $ctg_id = htmlspecialchars( isset($_GET['ctg_id'])?$_GET['ctg_id']:'');
 $ctg_type = htmlspecialchars( isset($_POST['ctg_type'])?$_POST['ctg_type']:'');
 $p_title = isset($_POST["p_title"])?$_POST["p_title"]:'';

 $sql = "UPDATE category SET ctg_type='$ctg_type' WHERE ctg_id='$ctg_id'";
 $result = $conn->query($sql);

 if ($result === TRUE) {
 	echo " 
 	<script>
 	window.location.href='../category.php';
 	</script>
 	";
 } else {
 	//echo "Error updated record: " . $conn->error;
 	echo "
        <script> 
        alert('มีการกรอกข้อมูลซ้ำ');
        window.location.href ='../category-edit.php';
        </script>
        ";
 }

 $conn->close();

 ?>