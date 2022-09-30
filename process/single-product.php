 <?php include './check_user.php';
 include './connect.php';

 $sp_id = htmlspecialchars( isset($_GET['sp_id'])?$_GET['sp_id']:'');
 $sp_no= ISSET($_POST["product_count"])?$_POST["product_count"]:'';
 $cart_id = htmlspecialchars( isset($_GET['cart_id'])?$_GET['cart_id']:'');
 $user_username = isset($_SESSION["user_username"])?$_SESSION["user_username"]:'' ;
 $user_id = isset($_SESSION["user_id"])?$_SESSION["user_id"]:'' ;
 
// echo $sp_no."/".$sp_id;
 // exit;
 $sql1 = "SELECT * FROM cart INNER JOIN cart_product_list ON cart.cart_id = cart_product_list.cart_id INNER JOIN sub_products ON cart_product_list.sp_id = sub_products.sp_id WHERE cart.cart_user_id = '$user_id' and cart_product_list.sp_id =  '$sp_id' and cart.cart_status = 0";
 $result1 = $conn->query($sql1);
// IF ALREADY HAVE PRODUCT IN CART
 if (mysqli_num_rows($result1) > 0) {
 	$row1 = $result1->fetch_assoc(); 
 	$new_sp_no = $row1["count"]+$sp_no;
 	$cart_p_id = $row1["cart_p_id"];
 	$sql2 =  "UPDATE cart_product_list SET count='$new_sp_no' WHERE cart_p_id='$cart_p_id'";
 	$result2 = $conn->query($sql2);
// UPDATE PRODUCT REDUCE WITH ADD TO CART 
 	$sp_id_tmp = $row1["sp_id"];
 	$sp_no_tmp = $row1["count"];
 	$sp_no_storge =  $row1["sp_no"];
 	$sp_no_sum = $sp_no_storge - $sp_no_tmp;
 	$sql3 = "UPDATE sub_products SET sp_no='$sp_no_sum' WHERE sp_id='$sp_id_tmp'";
 	$result3 = $conn->query($sql3);

	//echo $new_sp_no,$sp_no_sum,$sp_no_tmp ;

 	if ($result3 === TRUE) {
 		// echo $conn->error;
 		// exit;
 		echo " 
 		<script>
 		window.location.href='../cart.php?cart_id=".$cart_id."';
 		</script>
 		";
 	} else {
	 	// echo "Error updated record: " . $conn->error;
	 		// echo "
	 		// <script> 
	 		// alert('มีการกรอกข้อมูลซ้ำ');
	 		// window.location.href ='../single-product.php?sp_id=5';
	 		// </script>
	 		// ";
 	}

 }
 else {
 	$sql_check_user = "SELECT * FROM cart where cart_user_id ='$user_id' and cart_status = 0";
 	$result_check_user = $conn->query($sql_check_user);
 	$row_check_user = $result_check_user->fetch_assoc();

 //NO HAVE ALREADY CART AND CAR PRODUCT LIST
 	// echo $row_check_user;
 	if (mysqli_num_rows($result_check_user)==0){

 		$sql =  "INSERT INTO cart (cart_user_id,cart_status)
 		VALUES ('$user_id',0) ";
 		$result = $conn->query($sql);
 		//echo $conn->error;
 		$last_id = $conn->insert_id;
 		$sql1 =  "INSERT INTO cart_product_list (sp_id,cart_id,count)
 		VALUES ('$sp_id','$last_id','$sp_no') ";
 		$result1 = $conn->query($sql1);

// UPDATE PRODUCT REDUCE WITH ADD TO CART 
 		$sql2 = "SELECT * FROM cart INNER JOIN cart_product_list ON cart.cart_id = cart_product_list.cart_id INNER JOIN sub_products ON cart_product_list.sp_id = sub_products.sp_id WHERE cart.cart_user_id = '$user_id' and cart_product_list.sp_id =  '$sp_id' and cart.cart_status = 0";
 		$result2 = $conn->query($sql2);
 		$row1 = $result2->fetch_assoc();
 		$sp_id_tmp = $row1["sp_id"];
 		$sp_no_tmp = $row1["count"];
 		$sp_no_storge =  $row1["sp_no"];
 		$sp_no_sum = $sp_no_storge - $sp_no_tmp;
 		$sql3 = "UPDATE sub_products SET sp_no='$sp_no_sum' WHERE sp_id='$sp_id_tmp'";
 		$result3 = $conn->query($sql3);
 		//echo $conn->error;
 		if ($result === TRUE) {
 			//exit;
 			echo " 
 			<script>
 			window.location.href='../cart.php?cart_id=".$last_id."';
 			</script>
 			";

 		} else {
		 	// echo "Error updated record: " . $conn->error;
		 		// echo "
		 		// <script> 
		 		// alert('มีการกรอกข้อมูลซ้ำ');
		 		// window.location.href ='../single-product.php?sp_id=5';
		 		// </script>
		 		// ";
 		}
 	}
 	else {
 		$last_id = $row_check_user["cart_id"];
 		$sql1 =  "INSERT INTO cart_product_list (sp_id,cart_id,count)
 		VALUES ('$sp_id','$last_id','$sp_no') ";
 		$result1 = $conn->query($sql1);

// UPDATE PRODUCT REDUCE WITH ADD TO CART  		
 		$sql2 = "SELECT * FROM cart INNER JOIN cart_product_list ON cart.cart_id = cart_product_list.cart_id INNER JOIN sub_products ON cart_product_list.sp_id = sub_products.sp_id WHERE cart.cart_user_id = '$user_id' and cart_product_list.sp_id =  '$sp_id' and cart.cart_status = 0";
 		$result2 = $conn->query($sql2);
 		$row1 = $result2->fetch_assoc();
 		$sp_id_tmp = $row1["sp_id"];
 		$sp_no_tmp = $row1["count"];
 		$sp_no_storge =  $row1["sp_no"];
 		$sp_no_sum = $sp_no_storge - $sp_no_tmp;
 		$sql3 = "UPDATE sub_products SET sp_no='$sp_no_sum' WHERE sp_id='$sp_id_tmp'";
 		$result3 = $conn->query($sql3);
 		//echo $conn->error;
 		if ($result1 === TRUE) {
 			//exit;
 			echo " 
 			<script>
 			window.location.href='../cart.php?cart_id=".$last_id."';
 			</script>
 			";

 		} else {
		 	// echo "Error updated record: " . $conn->error;
		 		// echo "
		 		// <script> 
		 		// alert('มีการกรอกข้อมูลซ้ำ');
		 		// window.location.href ='../single-product.php?sp_id=5';
		 		// </script>
		 		// ";
 		}
 	}

 }
 $conn->close();

 ?>