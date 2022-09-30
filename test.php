<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>  
<script type="text/javascript">
$(function(){
	$("#Add").click(function(){
		var $more = prompt("เบอร์โทรศัพท์อื่น","");
		if($more != null && $more != ""){
			var $old = $("#Phone").val();
			$("#Phone").val($old+","+$more);
		}	
	});
});
</script>
</head>
<body>
<label for="textfield"></label>
<input type="text" name="Phone" id="Phone" />
<button id="Add">+</button>
</body>
</html>
