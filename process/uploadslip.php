<?php include './check_user.php';
include './connect.php';
$target_dir = "../img/uploads/uploadslip/";
$target_file = $target_dir;
// $cart_id = htmlspecialchars(isset($_GET["cart_id"])?$_GET["cart_id"]:'');
// $sql = "SELECT image FROM bill_products WHERE cart_id = $cart_id"; 
// $result = mysqli_query($conn,$sql);
// if ($result->num_rows > 0) {
//     $row = $result->fetch_assoc(); 
//     $target_file2 = $target_dir.$row["image"];                

//     $myFile = $target_file2;
//     unlink($myFile);
//     // unlink($myFile) or die("Couldn't delete file");
// }
$target_dir = "../img/uploads/uploadslip/";
$target_file = $target_dir;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$file_name = generateRandomString().".".$imageFileType;
$target_file2 = $target_dir.$file_name;   
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file2)) {

    	$uploadOk = 3;
        // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } 
}


if ($uploadOk == 3) {
	$user_id = isset($_SESSION["user_id"])?$_SESSION["user_id"]:'' ;
	$bp_id = isset($_GET["bp_id"])?$_GET["bp_id"]:'';
	$cart_id = isset($_GET["cart_id"])?$_GET["cart_id"]:'';
	$status = isset($_POST["status"])?$_POST["status"]:'';
	//$delivery = isset($_GET["delivery"])?$_GET["delivery"]:'';
    $sql_check_user = "SELECT * FROM bill_products where cart_id ='".$cart_id."'";
    $result_check_user = $conn->query($sql_check_user);

	if (mysqli_num_rows($result_check_user) > 0 ) {
        $sql ="UPDATE bill_products SET b_image='$file_name',status=1 WHERE cart_id='".$cart_id."'";
        $result = $conn->query($sql);
		//echo $conn->error;
		echo "
		<script> 
		alert('บันทึกเลขที่คำสั่งซื้อนี้แล้ว');
		window.location.href ='../my_order.php';
		</script>
		";
	}
	else{
        //echo "Error updated record: " . $conn->error;
        echo "
 		<script> 
 		alert('ไม่มีเลขที่คำสั่งซื้อนี้');
 		window.location.href ='../uploadslip.php?cart_id=".$cart_id."';
 		</script>
 		";
    }
}

function generateRandomString($length = 11 ) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    $date = date("Y-m-dH:i:s");
    return md5($randomString.$date);
}
?>
