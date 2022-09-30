 <?php include './check_user.php';
include './connect.php';

 $cart_p_id = htmlspecialchars( isset($_GET['cart_p_id'])?$_GET['cart_p_id']:'');
 $user_id = isset($_SESSION["user_id"])?$_SESSION["user_id"]:'' ;
 $sp_id = htmlspecialchars( isset($_GET['sp_id'])?$_GET['sp_id']:'');
 $sp_no= ISSET($_POST["product_count"])?$_POST["product_count"]:'';

// UPDATE PRODUCT ADD WITH ADD TO CART
$sql1 = "SELECT * FROM cart INNER JOIN cart_product_list ON cart.cart_id = cart_product_list.cart_id INNER JOIN sub_products ON cart_product_list.sp_id = sub_products.sp_id WHERE cart_product_list.cart_p_id=$cart_p_id";
 $result1 = $conn->query($sql1);
 while ( $row1 = $result1->fetch_assoc()) {
 	$sp_id_tmp = $row1["sp_id"];
 	$sp_no_tmp = $row1["count"];
 	$sp_no_storge =  $row1["sp_no"];
 	$sp_no_sum = $sp_no_storge + $sp_no_tmp;
 	$sql3 = "UPDATE sub_products SET sp_no='$sp_no_sum' WHERE sp_id='$sp_id_tmp'";
 	$result3 = $conn->query($sql3);
 	//echo $sp_id_tmp,$sp_no_sum,$sp_no_tmp ;
}
// echo $conn->error;
//  		exit;
 $sql = "DELETE  FROM cart_product_list where cart_p_id=$cart_p_id";
 $result = $conn->query($sql);

 if ($result === TRUE) {
 	$sql2= "SELECT * FROM cart INNER JOIN cart_product_list ON cart.cart_id=cart_product_list.cart_id WHERE cart_user_id=$user_id and cart_status = 0";
 	$result2 = $conn->query($sql2);

	 if (mysqli_num_rows($result2) == 0) {
	 	$sql3 = "DELETE  FROM cart where cart_user_id=$user_id and cart_status=0";
 		$result3 = $conn->query($sql3);

	 }
	 else{

	 }
 	echo "
 	<script>
 	window.location.href='../cart.php';
 	</script>
 	";
 } else {
 	echo "Error deleting record: " . $conn->error;
 }

 $conn->close();

 ?>