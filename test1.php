<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>
</head>
<body>
	<form id="form1" name="form1" method="post" action="">  
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
		</body>
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
		</script>
			</html>
