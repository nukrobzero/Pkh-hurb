 <?php include './check_user.php';
 include './connect.php';

 $product_count_item = ( isset($_POST['product_count_item'])?$_POST['product_count_item']:'');
 $tmp_cart_product_id = ( isset($_POST['tmp_cart_product_id'])?$_POST['tmp_cart_product_id']:'');
 // $sp_no= ISSET($_POST["product_count"])?$_POST["product_count"]:'';

 $user_username = isset($_SESSION["user_username"])?$_SESSION["user_username"]:'' ;
 $user_id = isset($_SESSION["user_id"])?$_SESSION["user_id"]:'' ;
 
 // CHECK ERROR
 $err = 0;
 foreach ($product_count_item as $index => &$value ) 
 {
 	//echo $value." ".$tmp_cart_product_id[$index]." ";
 	$cart_product_id = $tmp_cart_product_id[$index];
 	$sql2 =  "UPDATE cart_product_list SET count='$value' WHERE cart_p_id='$cart_product_id'";
 	$result2 = $conn->query($sql2);
 	
 	if ($result2 === TRUE) {

	 } else {
	 	$err++;
	 	echo "Error updated record: " . $conn->error;
	 		// echo "
	 		// <script> 
	 		// alert('มีการกรอกข้อมูลซ้ำ');
	 		// window.location.href ='../single-product.php?sp_id=5';
	 		// </script>
	 }
	 	
 }
 if ($err==0){
	 		echo " 
	 		<script>
	 		window.location.href='../checkout.php';
	 		</script>
	 		";
 }
 else{
 	echo "Error updated record";
 }

 ?>