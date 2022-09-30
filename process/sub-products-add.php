<?php include './check_user.php';
include './connect.php';
$target_dir = "../img/uploads/sub_products/";
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
    //     echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
 } 
}


if ($uploadOk == 3) {

	$sp_price = isset($_POST["sp_price"])?$_POST["sp_price"]:'';
	$sp_volume = isset($_POST["sp_volume"])?$_POST["sp_volume"]:'';
  $sp_no = isset($_POST["sp_no"])?$_POST["sp_no"]:'';
  $sp_packeting_cost = isset($_POST["sp_packeting_cost"])?$_POST["sp_packeting_cost"]:'';

  $p_title = isset($_POST["p_title"])?$_POST["p_title"]:'';
  $pd_name = isset($_POST['pd_name'])?$_POST['pd_name']:'';
  $material_cal_name = isset($_POST["material_cal_name"])?$_POST["material_cal_name"]:'';

  $m_id = htmlspecialchars( isset($_GET['m_id'])?$_GET['m_id']:'');

     //echo $p_title."<br>".$sp_packeting_cost."<br>".$material_cal_name;

  // CONFIC VALUES
  $id_prefix ="SPD-"; 
  $id_length = 4;
  $id_insert = "";

  $sql_last_id = "SELECT MAX(sp_id) as sp_ids FROM sub_products ";
  $result_last_id = $conn->query($sql_last_id);
  $row_last_id = $result_last_id->fetch_assoc();

    // echo -$id_length;
  if ($row_last_id["sp_ids"]==""){
    $id_num = 1;
  }
  else{
    $new_id = intval (substr($row_last_id["sp_ids"], -$id_length) );
    $id_num = $new_id+1;
  }

  $id_with_zero = str_pad($id_num, $id_length, "0", STR_PAD_LEFT);
  $id_insert = $id_prefix.$id_with_zero;


  $sql = "INSERT INTO sub_products (sp_id,sp_volume,sp_price,sp_no,sp_img,sp_packeting_cost,pro_id,pd_id,material_cal_idss)
  VALUES ('$id_insert','$sp_volume','$sp_price','$sp_no','$file_name','$sp_packeting_cost','$p_title','$pd_name','$material_cal_name')"; 
  $result = mysqli_query($conn,$sql);

  if ($result) {
    echo "
    <script> 
    window.location.href ='../sub-products.php';
    </script>
    ";
  }
  else{
    $myFile = $target_file2;
    unlink($myFile) or die("Couldn't delete file");
    echo $conn->error;
    echo "เกิดข้อผิดพลาด!";
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