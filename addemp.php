<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>
	<link rel="stylesheet" href="../CSS/menu.css" type="text/css">
	<link rel="stylesheet" href="../CSS/menusub.css" type="text/css">
	<link rel="stylesheet" href="../CSS/addform.css" type="text/css">
	<link rel="stylesheet" href="../CSS/button.css" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Itim&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<script   src="https://code.jquery.com/jquery-3.1.1.js"   integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="   crossorigin="anonymous">  
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

	<script type="text/javascript">
		function selectAll() {
			selectBox = document.getElementById("someId");

			for (var i = 0; i < selectBox.options.length; i++) {
				selectBox.options[i].selected = true;
			}
		}

		function removeOptions() {
			selectBox = document.getElementById("someId");
			var i;
			for (i = selectBox.options.length - 1; i >= 0; i--) {
				if (selectBox.options[i].selected)
					selectBox.remove(i);
			}

			selectBox = document.getElementById("someId");

			for (var i = 0; i < selectBox.options.length; i++) {
				selectBox.options[i].selected = true;
			}
		}

		function ListProvince(val){
            //We create ajax function
            $.ajax({
                type: "POST",
                url: "../listProvince.php",
                data: "id="+val,
                success: function(data){
                    $("#amphures").html(data);
                }
            });
        }
        
        function Listdistrict(val){
            //We create ajax function
            $.ajax({
                type: "POST",
                url: "../listdistrict.php",
                data: "id="+val,
                success: function(data){
                    $("#districts").html(data);
                }
            });
        }

	</script>
	<style>	
		body {
			font-family: 'Itim', cursive;
			color: black;
		}
		p{
			font-family: 'Itim', cursive;
			margin-left: 25px;
			float: left;
			color: black;
		}	
	</style>

</head>

<body>
	<?php
	$serverName = "localhost";
	$userName = "root";
	$userPassword = "123456789";
	$dbName = "project";
	$conn = mysqli_connect($serverName, $userName, $userPassword, $dbName);
	?>

<div class="container">
	<?php
		session_start();
	?>
		<nav id="menu_head">
			<ul>
				<li style="margin-left: 20%;"></li>
				<li style="float: left; margin-top: 0.5%; margin-left: 9%;">
					<a href="../homeemp.php">
						<img src="../logo.png" width="150" height="100">
					</a>
				</li>
				<li style="margin-top: 3.5%; float:right; margin-right: 10%;">	
					
						<?php
						if(isset($_SESSION['username'])) 
						{
							echo '<i class="fas fa-user" style="color: black;"><p>'.$_SESSION['username'].'&nbsp; </p></i> ';
							echo '<a href="../logout.php"><i class="fas fa-sign-out-alt" style="color: black;"><p>Logout &nbsp; </p></i></a>';
						}else{
							echo '<a href="../login.php"><i class="fas fa-user" style="color: black;"><p>เข้าระบบ&nbsp;</p></i></a>';
						}
						?>
					
				</li>
			</ul>
		</nav>
	<nav id="menu_sub">
		<ul class="top-level-menu">
			<?php
			$serverName = "localhost";
			$userName = "root";
			$userPassword = "123456789";
			$dbName = "project";
			$conn = mysqli_connect($serverName, $userName, $userPassword, $dbName);
			
			$sql = "SELECT * FROM project.employee q ,project.position w WHERE q.id_emp = '".$_SESSION['ide']."' AND q.id_pos = w.id_pos";
			$result = mysqli_query($conn,$sql);

			if($result == true){
				$row = mysqli_fetch_array($result);

                $sql1 = "SELECT * FROM project.position WHERE id_pos = '".$row['id_pos']."' ";
            
                $result1 = mysqli_query($conn,$sql1);  
				$row1 = mysqli_fetch_array($result1); 

			?>
			
				<li>
                    <a href="#">ข้อมูลค่าคงที่&nbsp;&nbsp;<i class="fas fa-caret-down"></i></a>
					<ul class="second-level-menu">
					<?php if($substr = substr($row1['level_per'], 0, 1)) { ?>
						<li>
							<a>ข้อมูลสมาชิก&nbsp;&nbsp;<i class="fas fa-caret-right"></i></a>
							<ul class="third-level-menu">
								<li><a href="/project/member/listmem.php"><i class="fas fa-list-ul"></i>&nbsp;&nbsp;แสดงข้อมูลสมาชิก</a></li>
								<li><a href="/project/member/addmem.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;เพิ่มข้อมูลสมาชิก</a></li>
							</ul>
						</li>
						<?php echo '</li>'; }?>
						<?php if($substr = substr($row1['level_per'], 1, 1)) { ?>
						<li>
							<a>ข้อมูลพนักงาน&nbsp;&nbsp;<i class="fas fa-caret-right"></i></a>
							<ul class="third-level-menu">
								<li><a href="/project/employee/listemp.php"><i class="fas fa-list-ul"></i>&nbsp;&nbsp;แสดงข้อมูลพนักงาน</a></li>
								<li><a href="/project/employee/addemp.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;เพิ่มข้อมูลพนักงาน</a></li>
							</ul>
						</li>
						<?php echo '</li>'; }?>
						<?php if($substr = substr($row1['level_per'], 2, 1)) { ?>
						<li>
							<a>ข้อมูลสินค้า&nbsp;&nbsp;<i class="fas fa-caret-right"></i></a>
							<ul class="third-level-menu">
								<li><a href="/project/product/listprod.php"><i class="fas fa-list-ul"></i>&nbsp;&nbsp;แสดงข้อมูลสินค้า</a></li>
								<li><a href="/project/product/addprod.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;เพิ่มข้อมูลสินค้า</a></li>
							</ul>
						</li>
						<?php echo '</li>'; }?>
						<?php if($substr = substr($row1['level_per'], 3, 1)) { ?>
						<li>
							<a>ข้อมูลประเภทสินค้า&nbsp;&nbsp;<i class="fas fa-caret-right"></i></a>
							<ul class="third-level-menu">
								<li><a href="/project/type/listtype.php"><i class="fas fa-list-ul"></i>&nbsp;&nbsp;แสดงข้อมูลประเภทสินค้า</a></li>
								<li><a href="/project/type/addtype.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;เพิ่มข้อมูลประเภทสินค้า</a></li>
							</ul>
						</li>
						<?php echo '</li>'; }?>
						<?php if($substr = substr($row1['level_per'], 4, 1)) { ?>
						<li>
							<a>ข้อมูลยี่ห้อสินค้า&nbsp;&nbsp;<i class="fas fa-caret-right"></i></a>
							<ul class="third-level-menu">
								<li><a href="/project/brand/listbrand.php"><i class="fas fa-list-ul"></i>&nbsp;&nbsp;แสดงข้อมูลยี่ห้อสินค้า</a></li>
								<li><a href="/project/brand/addbrand.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;เพิ่มข้อมูลยี่ห้อสินค้า</a></li>
							</ul>
						</li>
						<?php echo '</li>'; }?>
						<?php if($substr = substr($row1['level_per'], 5, 1)) { ?>
						<li>
							<a>ข้อมูลสีสินค้า&nbsp;&nbsp;<i class="fas fa-caret-right"></i></a>
							<ul class="third-level-menu">
								<li><a href="/project/color/listcolor.php"><i class="fas fa-list-ul"></i>&nbsp;&nbsp;แสดงข้อมูลสีสินค้า</a></li>
								<li><a href="/project/color/addcolor.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;เพิ่มข้อมูลสีสินค้า</a></li>
							</ul>
						</li>
						<?php echo '</li>'; }?>
						<?php if($substr = substr($row1['level_per'], 6, 1)) { ?>
						<li>
							<a>ข้อมูลรุ่นสินค้า&nbsp;&nbsp;<i class="fas fa-caret-right"></i></a>
							<ul class="third-level-menu">
								<li><a href="/project/gen/listgen.php"><i class="fas fa-list-ul"></i>&nbsp;&nbsp;แสดงข้อมูลรุ่นสินค้า</a></li>
								<li><a href="/project/gen/addgen.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;เพิ่มข้อมูลรุ่นสินค้า</a></li>
							</ul>
						</li>
						<?php echo '</li>'; }?>
						<?php if($substr = substr($row1['level_per'], 7, 1)) { ?>
						<li>
							<a>ข้อมูลขนาดสินค้า&nbsp;&nbsp;<i class="fas fa-caret-right"></i></a>
							<ul class="third-level-menu">
								<li><a href="/project/size/listsize.php"><i class="fas fa-list-ul"></i>&nbsp;&nbsp;แสดงข้อมูลขนาดสินค้า</a></li>
								<li><a href="/project/size/addsize.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;เพิ่มข้อมูลขนาดสินค้า</a></li>
							</ul>
						</li>
						<?php echo '</li>'; }?>
						<?php if($substr = substr($row1['level_per'], 8, 1)) { ?>
						<li>
							<a>ข้อมูลบริษัคู่ค้า&nbsp;&nbsp;<i class="fas fa-caret-right"></i></a>
							<ul class="third-level-menu">
								<li><a href="/project/company/listcom.php"><i class="fas fa-list-ul"></i>&nbsp;&nbsp;แสดงข้อมูลบริษัคู่ค้า</a></li>
								<li><a href="/project/company/addcom.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;เพิ่มข้อมูลบริษัคู่ค้า</a></li>
							</ul>
						</li>
						<?php echo '</li>'; }?>
						<?php if($substr = substr($row1['level_per'], 9, 1)) { ?>
						<li>
							<a>ข้อมูลราคาทุน&nbsp;&nbsp;<i class="fas fa-caret-right"></i></a>
							<ul class="third-level-menu">
								<li><a href="/project/costprice/listcostprice.php"><i class="fas fa-list-ul"></i>&nbsp;&nbsp;แสดงข้อมูลราคาทุน</a></li>
								<li><a href="/project/costprice/addcostprice.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;เพิ่มข้อมูลราคาทุน</a></li>
							</ul>
						</li>
						<?php echo '</li>'; }?>
						<?php if($substr = substr($row1['level_per'], 10, 1)) { ?>
						<li>
							<a>ข้อมูลตำแหน่ง&nbsp;&nbsp;<i class="fas fa-caret-right"></i></a>
							<ul class="third-level-menu">
								<li><a href="/project/pos/listpos.php"><i class="fas fa-list-ul"></i>&nbsp;&nbsp;แสดงข้อมูลตำแหน่ง</a></li>
								<li><a href="/project/pos/addpos.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;เพิ่มข้อมูลตำแหน่ง</a></li>
							</ul>
						</li>
						<?php echo '</li>'; }?>
						</ul>
					
					<li><a href="#">โปรโมชั่น&nbsp;&nbsp;<i class="fas fa-caret-down"></i></a>
					<ul class="second-level-menu">
						<?php if($substr = substr($row1['level_per'], 11, 1)) { ?>
						<li><a href="/project/promotion/listpro.php"><i class="fas fa-list-ul"></i>&nbsp;&nbsp;แสดงข้อมูลโปรโมชั่น</a>
						<?php echo '</li>'; }?>
						<?php if($substr = substr($row1['level_per'], 12, 1)) { ?>
						<li><a href="/project/promotion/addfree.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;เพิ่มโปรโมชันจัดส่งฟรี</a>
						<?php echo '</li>'; }?>
						<?php if($substr = substr($row1['level_per'], 13, 1)) { ?>
						<li><a href="/project/promotion/addprog.php"><i class="fas fa-cog"></i>&nbsp;&nbsp;เพิ่มโปรโมชันรุ่นของสินค้า</a>
						<?php echo '</li>'; }?>
						<?php if($substr = substr($row1['level_per'], 14, 1)) { ?>
						<li><a href="/project/promotion/addprop.php"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;เพิ่มโปรเลือกตามสินค้า</a>
						<?php echo '</li>'; }?>
						<?php if($substr = substr($row1['level_per'], 15, 1)) { ?>
						<li><a href="/project/promotion/delpro.php"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;ลบข้อมูลโปรโมชั่น</a>
						<?php echo '</li>'; }?>
					</ul>
					<li><a>เสนอ สั่งซื้อ รับสินค้า&nbsp;&nbsp;<i class="fas fa-caret-down"></i></a>
					<ul class="second-level-menu">
						<?php if($substr = substr($row1['level_per'], 16, 1)) { ?>
						<li><a>เสนอสินค้าส่วนพนักงาน&nbsp;&nbsp;<i class="fas fa-caret-right"></i></a>
						<ul class="third-level-menu">
								<li><a href="/project/pre/list_pre_emp.php"><i class="fas fa-list-ul"></i>&nbsp;&nbsp;รายการใบเสนอสินค้า</a></li>
								<li><a href="/project/pre/list_low_pre.php"><i class="fas fa-list-ul"></i>&nbsp;&nbsp;รายการสินค้าที่ต่ำกว่าจุดสั่งซื้อ</a></li>
								<li><a href="/project/pre/buypreprod.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;เพิ่มใบเสนอสินค้า</a></li>
							</ul>
						</li>
						<?php echo '</li>'; }?>
						<?php if($substr = substr($row1['level_per'], 17, 1)) { ?>
						<li><a>เสนอสินค้าส่วนหัวหน้า&nbsp;&nbsp;<i class="fas fa-caret-right"></i></a>
						<ul class="third-level-menu">
								<li><a href="/project/pre/list_pre.php"><i class="fas fa-list-ul"></i>&nbsp;&nbsp;รายการใบเสนอสินค้า</a></li>
							</ul>
						</li>
						<?php echo '</li>'; }?>
						<?php if($substr = substr($row1['level_per'], 18, 1)) { ?>
						<li><a>สั่งซื้อสินค้า&nbsp;&nbsp;<i class="fas fa-caret-right"></i></a>
							<ul class="third-level-menu">
							<li><a href="/project/order/list_order.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;รายการใบสั่งซื้อสินค้า</a></li>
							</ul>
						</li>
						<?php echo '</li>'; }?>
						<?php if($substr = substr($row1['level_per'], 19, 1)) { ?>
						<li><a>รับสินค้า&nbsp;&nbsp;<i class="fas fa-caret-right"></i></a>
							<ul class="third-level-menu">
								<li><a href="/project/receive/receive.php"><i class="fas fa-list-ul"></i>&nbsp;&nbsp;แสดงรายการรับสินค้า</a></li>
							</ul>
						</li>
						<?php echo '</li>'; }?>
					</ul>
					<li><a href="#">ขายสินค้า&nbsp;&nbsp;<i class="fas fa-caret-down"></i></a>
					<ul class="second-level-menu">
						<li><a><i class="fas fa-list-ul"></i>&nbsp;&nbsp;แสดงข้อมูลโปรโมชั่น</a></li>
						<li><a><i class="fas fa-plus"></i>&nbsp;&nbsp;เพิ่มข้อมูลโปรโมชั่น</a></li>
						<li><a><i class="fas fa-cog"></i>&nbsp;&nbsp;แก้ไขข้อมูลโปรโมชั่น</a></li>
						<li><a><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;ลบข้อมูลโปรโมชั่น</a></li>
					</ul>
					<li><a href="#">การส่งสินค้า&nbsp;&nbsp;<i class="fas fa-caret-down"></i></a>
					<ul class="second-level-menu">
						<li><a><i class="fas fa-list-ul"></i>&nbsp;&nbsp;แสดงข้อมูลโปรโมชั่น</a></li>
						<li><a><i class="fas fa-plus"></i>&nbsp;&nbsp;เพิ่มข้อมูลโปรโมชั่น</a></li>
						<li><a><i class="fas fa-cog"></i>&nbsp;&nbsp;แก้ไขข้อมูลโปรโมชั่น</a></li>
						<li><a><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;ลบข้อมูลโปรโมชั่น</a></li>
					</ul>
					<li><a href="#">รายงาน&nbsp;&nbsp;<i class="fas fa-caret-down"></i></a>
					<ul class="second-level-menu">
						<li><a><i class="fas fa-list-ul"></i>&nbsp;&nbsp;แสดงข้อมูลโปรโมชั่น</a></li>
						<li><a><i class="fas fa-plus"></i>&nbsp;&nbsp;เพิ่มข้อมูลโปรโมชั่น</a></li>
						<li><a><i class="fas fa-cog"></i>&nbsp;&nbsp;แก้ไขข้อมูลโปรโมชั่น</a></li>
						<li><a><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;ลบข้อมูลโปรโมชั่น</a></li>
					</ul>
			<?php } ?>
			</ul>
	</nav>
</div>

	<div class="wrap-contact100">
		<div class="contact100-form-title" style="background-color: white;">
			<span class="contact100-form-title-1">
				กรอกข้อมูลพนักงาน
			</span>
			<form class="contact100-form validate-form" id="form" method="post" action="addemp.php">
				<div class="wrap-input100">
					<span class="label-input100">ชื่อ :</span>
					<input class="input100" type="text" name="txtname" value="<?php echo $_POST['txtname'] ?>">
				</div>
				<div class="wrap-input100">
					<span class="label-input100">นามสกุล :</span>
					<input class="input100" type="text" name="txtsname" value="<?php echo $_POST['txtsname'] ?>">
				</div>
				เพศ :
				<input name="rdoSex" type="radio" value="M" <?php if ($_POST['rdoSex'] == "M") { ?>checked <?php } ?>>Man
				<input name="rdoSex" type="radio" value="W" <?php if ($_POST['rdoSex'] == "F") { ?>checked <?php } ?>>Woman

				วันเกิด :
				<input type="date" name="bdate" value="<?php echo $_POST['bdate'] ?>">
				<div class="wrap-input100">
					<span class="label-input100">E-mail :</span>
					<input class="input100" type="text" name="txtemail" value="<?php echo $_POST['txtemail'] ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ตัวอย่าง 5711110429@gmail.com">
				</div>
				<div>
					<div class="wrap-input100">
						<span class="label-input100">เบอร์โทรศัพท์ :</span>
						<input type="text" name="tel" style="margin-top: 20px;" maxlength="10" onkeypress="isInputNumber(event)"><br>
						<script>
							function isInputNumber(evt) {
								var ch = String.fromCharCode(evt.which);
								if (!(/[0-9]/.test(ch))) {
									evt.preventDefault();
								}
							}
						</script>
					</div>
					<select id="someId" name="selectName[]" multiple>

						<?php
						foreach ($_POST['selectName'] as $tel) {
							print "<option value='".$tel."'>".$tel."</option>";
						}
						if(isset($_POST['tel'])) print "<option value='".$_POST['tel']."'>".$_POST['tel']."</option>";
						?></select><br>
					<input type="submit" name="add" value="add" onclick="selectAll();" class="myButton">
					<input type="button" name="remove" value="remove" onClick="removeOptions();" class="myButton">

				</div>
				<div>
					<p>เลือกตำแหน่ง :
						<select name="cbbPosition">

							<?php

							$sql4 = "SELECT * FROM project.position";

							$query4 = mysqli_query($conn, $sql4);
							?><option>-----โปรดเลือก-----</option>
							<?php
							while ($result4 = mysqli_fetch_array($query4, MYSQLI_ASSOC)) {
								$e = "";
								if ($_POST['cbbPosition'] == $result4['id_pos']) $e = "selected";
								print "<option value='" . $result4["id_pos"] . "' " . $e . ">" . $result4["name_pos"] . "</option>";
							}

							?>
						</select></p>
				</div>
				<div class="wrap-input100">
					<span class="label-input100">เงินเดือน :</span>
					<input class="input100" type="text" name="txtsalary" value="<?php echo $_POST['txtnamebrand'] ?>" onkeypress="isInputNumber(event)">
				</div>

				<div class="wrap-input100">
					<span class="label-input100">ที่อยู่ :</span>
					<input class="input100" type="text" name="txtaddress" placeholder="กรุณากรอกบ้านเลขที่ ซอย ถนน และหมู่บ้าน(ถ้ามี)" value="<?php echo $_POST['txtnamebrand'] ?>">
				</div>
				<div>
				<br>
				เลือกจังหวัด :
                    <select name="cbbProvinces" onchange="ListProvince(this.value);">
                    <option value="">------โปรดเลือก------</option>
                    <?php
                    $query = "SELECT * FROM project.provinces";
                    $results=mysqli_query($conn, $query);
                   
                    foreach ($results as $provinces){
                ?>
                        <option value="<?php echo $provinces["id"];?>"><?php echo $provinces["namep_th"];?></option>
                <?php
                    }
                ?>
					</select>
				</div>
				
				<br>
				<br>
			<div>
			เลือกเขต :
					<select name="cbbAmphures" id="amphures" onchange="Listdistrict(this.value);">
                <option value="-">------โปรดเลือก------</option>
            </select>
        	</div>
		
		<br>
		<br>
		<div>
			เลือกแขวง :
					<select name="cbbDistricts" id="districts">
                    <option value="-">------โปรดเลือก------</option>
					</select>
					<br>
					<br>
		</div>		
		<div class="wrap-input100">
					<span class="label-input100">รหัสไปรษณีย์ :</span>
					<input class="input100" type="text" name="txtcode" value="<?php echo $_POST['txtcode'] ?>" maxlength="5" onkeypress="isInputNumber(event)">
				</div>		
				<div class="wrap-input100">
					<span class="label-input100">Username :</span>
					<input class="input100" type="text" name="txtusername" value="<?php echo $_POST['txtusername'] ?>" pattern="[A-Za-z]{6}" title="ห้ามมีอักษรพิเศษ">
				</div>
				<br>
				<div class="wrap-input100">
					<span class="label-input100">Password :</span>
					<input class="input100" type="password" name="txtpassword" value="<?php echo $_POST['txtpassword'] ?>">
				</div>
				<br>

				<input type="submit" name="submit" value="เพิ่มข้อมูลพนักงาน" class="myButton" onclick="selectAll();" formaction='saveemp.php'>
			</form>

		</div>
	</div>
</body>

</html>