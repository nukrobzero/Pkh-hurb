 <?php 
 // include './check_user.php';
 include './connect.php';

 $sub_id =  isset($_POST['sub_id'])?$_POST['sub_id']:'';
 $sub_no =  isset($_POST['sub_no'])?$_POST['sub_no']:'';
 $pdm_no =  isset($_POST['pdm_no'])?$_POST['pdm_no']:'';

 $pmm_id = htmlspecialchars( isset($_POST["c_pmm_id"])?$_POST["c_pmm_id"]:'');

 // echo $sub_no[0]."a";
 for ($i=0; $i < count($sub_id); $i++) { 
 	$sp_id_tmp = $sub_id[$i];
 	$sp_no_tmp = $sub_no[$i];
 	$pdm_no_tmp = $pdm_no[$i];
 	// echo $sp_no_tmp." ".$pdm_no_tmp." ";
 	$sp_no_sum = $sp_no_tmp + $pdm_no_tmp;
 	// echo $sp_no_sum." ";
 	$sql2 = "UPDATE sub_products SET sp_no='$sp_no_sum' WHERE sp_id='$sp_id_tmp'";
 	$result2 = $conn->query($sql2);
 	if ($result2){
 		$sql_m ="SELECT * FROM sub_products 
 		INNER JOIN material_cal ON sub_products.material_cal_idss = material_cal.material_cal_id
 		INNER JOIN material_products ON material_cal.material_cal_id = material_products.material_cal_ids 
 		INNER JOIN material ON material.m_id = material_products.mat_id 
 		WHERE sp_id='$sp_id_tmp'";
 		$result_m = $conn->query($sql_m);
 		// $sp_no_tmp number of sub products in database
 		while ( $row_m = $result_m->fetch_assoc())
       	{
			$mtr_id_tmp = $row_m["m_id"];
			$material_use = floatval($row_m["mp_volume"])*floatval($pdm_no_tmp);
			$material_sum =floatval($row_m["m_no"])-$material_use;
			// echo $row_m["mp_volume"]."--".$pdm_no_tmp." ";
			// echo $material_use."--".$material_sum." ";
			$sql3 = "UPDATE material SET m_no='$material_sum' WHERE m_id='$mtr_id_tmp' ";
			$result3 = $conn->query($sql3);
			if ($result3 === TRUE) {
				$sql = "UPDATE products_manufacture_main SET pdmm_status=4 WHERE pdmm_id='$pmm_id'";
 				$result2 = $conn->query($sql);
 				// echo "3".$conn->error;
			}
			else{
				echo "Error updated record3: " . $conn->error;
			}
		}
 	}

 }

 ?>