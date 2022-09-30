 <?php
 include './connect.php';
 include './check_user.php';
 $sub_id =  isset($_POST['sub_id'])?$_POST['sub_id']:'';
 $sub_no =  isset($_POST['sub_no'])?$_POST['sub_no']:'';
 $count =  isset($_POST['count'])?$_POST['count']:'';
 $bp_id = htmlspecialchars( isset($_GET['bp_id'])?$_GET['bp_id']:'');
 $b_image = htmlspecialchars( isset($_GET['b_image'])?$_GET['b_image']:'');
 $status = htmlspecialchars( isset($_GET['status'])?$_GET['status']:'');


//DELETE ORDER 
 date_default_timezone_set('Asia/Bangkok');	 	
 $strDateDel = date('Y-m-d h:i:s',strtotime("-3 day"));
 $sql_check_time_out = "SELECT * FROM bill_products WHERE b_date < '".$strDateDel."' and b_image='' and status !=1 and status !=2 and status !=3 ";
 $result_check_time_out = $conn->query($sql_check_time_out);

 if ($result_check_time_out->num_rows > 0){	
 	while ( $row_check_time_out = $result_check_time_out->fetch_assoc()) {
 		$bil_id = $row_check_time_out["bp_id"];
 		$cart_ids = $row_check_time_out["cart_id"];
 		
 		if ($bp_id = '$bp_id'){
 			$sql_product = "SELECT * FROM bill_products INNER JOIN cart ON bill_products.cart_id = cart.cart_id INNER JOIN cart_product_list ON cart.cart_id = cart_product_list.cart_id INNER JOIN sub_products ON cart_product_list.sp_id = sub_products.sp_id WHERE bill_products.bp_id = '$bil_id' and cart.cart_status =1 and bill_products.status!=2 and bill_products.status!=3";

 			$result_product = $conn->query($sql_product);
 			while ( $row_product = $result_product->fetch_assoc()) {
	 		//echo $row_product["sp_id"]." ".$row_product["count"]." ".$row_product["sp_no"]."<br>";
 				$sp_id_tmp = $row_product["sp_id"];
 				$sp_no_tmp = $row_product["count"];
 				$sp_no_storge =  $row_product["sp_no"];
 				$sp_no_sum = $sp_no_storge + $sp_no_tmp;
 				$cart_id = $row_product["cart_id"];
 				$image = $row_product["b_image"];

	 		//echo "test".$sp_id_tmp." ".$sp_no_sum;
 				$sql2 = "UPDATE sub_products SET sp_no='$sp_no_sum' WHERE sp_id='$sp_id_tmp'";
 				$result2 = $conn->query($sql2);

 				$strSQL = "DELETE FROM bill_products WHERE bp_id = '$bil_id'";
 				$resultSQL = $conn->query($strSQL);

 				$str_del_cart = "DELETE FROM cart WHERE cart_id = $cart_id";
 				$result_del_cart = $conn->query($str_del_cart);

 				if ($image!= ''){
 					$file_path = "../img/uploads/uploadslip/".$image;
 					unlink($file_path);



 				}
 				echo " 
 				<script>
 				window.location.href='../admin_uploadslip.php';
 				</script>
 				";

	 		// if ($result2){
	 		// 	echo " 
	 		// 	<script>
	 		// 	window.location.href='../admin_uploadslip.php';
	 		// 	</script>
	 		// 	";

	 		// }
	 		// else{
	 		// 	$sql_recheck = "UPDATE sub_products SET sp_no='$sp_no_storge' WHERE sp_id='$sp_id_tmp'";
	 		// 	$result_recheck = $conn->query($sql_recheck);
	 		// 	echo $conn->error;
	 		// }

 			}
 		}
 	}
 }
 else{
 	echo " 
 	<script>
 	window.location.href='../admin_uploadslip.php';
 	</script>
 	";
 }
 $conn->close();

 ?>