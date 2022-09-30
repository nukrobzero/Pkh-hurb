 <?php include './check_user.php';
 include './connect.php';

 $cart_id = htmlspecialchars( isset($_GET['cart_id'])?$_GET['cart_id']:'');
 $delivery_number = isset($_POST["delivery_number"])?$_POST["delivery_number"]:'';
 $status = isset($_POST["status"])?$_POST["status"]:'';

 $sql = "UPDATE bill_products SET delivery_number='$delivery_number' , status=3  WHERE cart_id='$cart_id'";
 $result = $conn->query($sql);

 if ($result === TRUE) {
 	echo " 
 	<script>
 	window.location.href='../admin_delivery.php';
 	</script>
 	";
 } else {
 	echo "Error updated record: " . $conn->error;
 	// echo "
  //       <script> 
  //       alert('มีการกรอกข้อมูลซ้ำ');
  //       window.location.href ='../category-edit.php';
  //       </script>
  //       ";
 }

 $conn->close();

 ?>