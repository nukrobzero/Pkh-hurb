<?php  include './check_user.php';
	include './connect.php';
	$pd_name = htmlspecialchars(isset($_POST["pd_name"])?$_POST["pd_name"]:'');
	$sql ="SELECT * FROM sub_products INNER JOIN material_cal ON sub_products.material_cal_idss = material_cal.material_cal_id  WHERE pd_id='$pd_name'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo "<select  class='type form-control' name='sp_volume' id='sp_id' >";
		echo '<option value="0">---เลือกข้อมูลสินค้า---</option>';
		while ( $row = $result->fetch_assoc())
		{	
			echo "<option value='".$row["sp_id"]."'>ราคา ( ".$row["sp_price"]." ) , ขนาดขวด ( ".$row["sp_volume"]." ซีซี) , สูตรที่ใช้ ( ".$row["material_cal_name"]." )</option>";
		}
		echo "</select>";   
	} else {
		echo "<select  class='type form-control' name='sp_volume' id='sp_id' >";
		echo "<option value='0'>---ไม่มีข้อมูลสินค้า---</option>";
		echo "</select>";
	}

?>