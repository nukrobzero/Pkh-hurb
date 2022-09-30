 <?php
 include './connect.php';
 include './check_user.php';
 $sub_id =  isset($_POST['sub_id'])?$_POST['sub_id']:'';
 $sub_no =  isset($_POST['sub_no'])?$_POST['sub_no']:'';
 $count =  isset($_POST['count'])?$_POST['count']:'';
 $bp_id = htmlspecialchars( isset($_GET['bp_id'])?$_GET['bp_id']:'');


 $sql_product = "SELECT * FROM bill_products INNER JOIN cart ON bill_products.cart_id = cart.cart_id INNER JOIN cart_product_list ON cart.cart_id = cart_product_list.cart_id INNER JOIN sub_products ON cart_product_list.sp_id = sub_products.sp_id WHERE bill_products.bp_id = '$bp_id' and cart.cart_status =1";

 $result_product = $conn->query($sql_product);
 
 while ( $row_product = $result_product->fetch_assoc()) {
 	echo $row_product["sp_id"]." ".$row_product["count"]." ".$row_product["sp_no"]."<br>";
 	$sp_id_tmp = $row_product["sp_id"];
 	$sp_no_tmp = $row_product["count"];
 	$sp_no_storge =  $row_product["sp_no"];
 	$sp_no_sum = $sp_no_storge + $sp_no_tmp;

 	//exit;

 	$sql2 = "UPDATE sub_products SET sp_no='$sp_no_sum' WHERE sp_id='$sp_id_tmp'";
 	$result2 = $conn->query($sql2);
 	if ($result2){
 		$sql_delete_bill = "DELETE  FROM bill_products where bp_id=$bp_id";
 		$result_delete_bill = $conn->query($sql_delete_bill);

 		if ($result_delete_bill){

 			echo " 
 			<script>
 			window.location.href='../admin_uploadslip.php';
 			</script>
 			";
 		}
 		else{
 			$sql_recheck = "UPDATE sub_products SET sp_no='$sp_no_storge' WHERE sp_id='$sp_id_tmp'";
 			$result_recheck = $conn->query($sql_recheck);
 			echo $conn->error;
 		}

 	}

 }

 $conn->close();

 ?>