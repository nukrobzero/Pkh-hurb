<?php  include './check_user.php';
include './connect.php';
$sp_volume = htmlspecialchars(isset($_POST["sp_volume"])?$_POST["sp_volume"]:'');
$sp_no = htmlspecialchars(isset($_POST["sp_no"])?$_POST["sp_no"]:'');
$sql ="SELECT * FROM sub_products 
INNER JOIN material_cal ON sub_products.material_cal_idss = material_cal.material_cal_id
INNER JOIN material_products ON material_cal.material_cal_id = material_products.material_cal_ids 
INNER JOIN material ON material.m_id = material_products.mat_id 
WHERE sp_id='$sp_volume'";
$result = $conn->query($sql);
$i=1;

if ($result->num_rows > 0) {
	$total_price = 0;
	$cost = 0;
	$tmpCanclik = 0;
	while ( $row = $result->fetch_assoc())
	{
		$material_use = floatval($row["mp_volume"])*floatval($sp_no);
		$material_sum =floatval($row["m_no"])-$material_use;
		$total_price = floatval($row["sp_price"])*floatval($sp_no);
		$sp_packeting_cost = floatval($row["sp_packeting_cost"]);
		$total_sp_packeting_cost = floatval($row["sp_packeting_cost"])*floatval($sp_no);

		$material_price = floatval($row["mp_price"])/floatval($row["mp_unit"]);


			// $material_price_totol = floatval($row["m_no"])/floatval($row["m_price"]);
			// $material_price_sum = floatval($material_price)*floatval($material_price_totol);
		if ($material_sum<0){
			$tmpCanclik++;
			$sum_class ="btn-danger";
		}
		else {
			// echo '<input type="hidden" name ="canclick" id="canclick" value="1">';
			$sum_class ="";
		}
		$num_dregree = 2;
		$cost_all =  floatval($material_use)*floatval($material_price);

		// echo $material_price."|".$material_use."|".$cost_all." ".floatval($material_price)." ".floatval($material_use);

		echo "<tr>";
		echo '<td>'.$i.'</td>';
		echo '<td>'.$row["m_name"].'</td>';
		echo '<td>'.number_format($row["mp_volume"],$num_dregree).'</td>';
		echo '<td>'.number_format($material_use,$num_dregree).'</td>';
		echo '<td class="'.$sum_class.'">'.number_format($material_sum,$num_dregree).'</td>';
		echo '<td>'.number_format($cost_all,$num_dregree).'</td>';
		echo "</tr>"; 
		$cost += floatval($material_use)*floatval($material_price);
		$i++;
	}
	$total_cost = $total_sp_packeting_cost+$cost;
	$profit = $total_price - $total_cost;
	if ($profit<0){
		$profit_class ="btn-danger";
	}
	else {
		$profit_class ="";
	}
	echo "<tr>";
	echo '<td></td>';
	echo '<td></td>';
	echo '<td></td>';	
	echo '<td></td>';
	echo '<td></td>';
	echo '<td></td>';
	echo "</tr>";
	echo "<tr>";
	echo '<td></td>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td>ต้นทุนวัตถุดิบ</td>';
	echo '<td>'.number_format($cost,$num_dregree).'</td>';
	echo "</tr>";
	echo "<tr>";
	echo '<td></td>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td>ต้นทุนบรรจุภัณฑ์(ขวดละ '.$sp_packeting_cost.' บาท)</td>';
	echo '<td>'.number_format($total_sp_packeting_cost,$num_dregree).'</td>';
	echo "</tr>";
	echo "<tr>";
	echo '<td></td>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td>ต้นทุนรวม</td>';
	echo '<td>'.number_format($total_cost,$num_dregree).'</td>';
	echo "</tr>"; 
	echo "<tr>";
	echo '<td></td>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td>ราคาขายสินค้า</td>';
	echo '<td>'.number_format($total_price,$num_dregree).'</td>';
	echo "</tr>"; 
	echo "<tr>";
	echo '<td></td>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td>กำไร</td>';
	echo '<td class="'.$profit_class.'">'.number_format($profit,$num_dregree).'</td>';
	echo "</tr>"; 
	echo '<input type="hidden" name ="cost" id="cost" value="'.$total_cost.'">';
	echo '<input type="hidden" name ="total_price" id="total_price" value="'.$total_price.'">';
	echo '<input type="hidden" name ="profit" id="profit" value="'.$profit.'">';
	
	if ($tmpCanclik>0){
		echo '<input type="hidden" name ="canclick" id="canclick" value="0">';
		echo "
		<script> 
		alert('วัตถุดิบไม่เพียงพอ');
		</script>"; 
	}
	else{
		echo '<input type="hidden" name ="canclick" id="canclick" value="1">';
	}
} else {
	echo "ไม่มีข้อมูลสินค้าย่อย<br>";

}

?>