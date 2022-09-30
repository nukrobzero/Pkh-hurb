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
    $sp_cul_or_not = isset($_POST["sp_cul_or_not"])?$_POST["sp_cul_or_not"]:'';
    $sp_packeting_cost = isset($_POST["sp_packeting_cost"])?$_POST["sp_packeting_cost"]:'';

    $p_title = isset($_POST["p_title"])?$_POST["p_title"]:'';
    $pd_name = isset($_POST['pd_name'])?$_POST['pd_name']:'';

    $m_name = isset($_POST["m_name"])?$_POST["m_name"]:'';
    $mp_unit = isset($_POST["mp_unit"])?$_POST["mp_unit"]:'';
    $mp_volume = isset($_POST["mp_volume"])?$_POST["mp_volume"]:'';

    $m_id = htmlspecialchars( isset($_GET['m_id'])?$_GET['m_id']:'');

    // echo $p_title."<br>".$sp_packeting_cost."<br>";
    $sql = "INSERT INTO sub_products (sp_volume,sp_price,sp_no,sp_cul_or_not,sp_img,sp_packeting_cost,pro_id,pd_id)
    VALUES ('$sp_volume','$sp_price','$sp_no','$sp_cul_or_not','$file_name','$sp_packeting_cost','$p_title','$pd_name')"; 
    $result = mysqli_query($conn,$sql);
    $sub_po_id = mysqli_insert_id($conn);
    
    $amount = isset($_POST["amount"])?$_POST["amount"]:'';
    $check_mtr = 1;
    if ($result){
        for ($j=0; $j <$amount ; $j++) {
            $mp_volume1 = $mp_volume[$j];
            @$m_name1 = $m_name[$j];
            $mp_volume = isset($mp_volume)?$mp_volume:'0';
            $m_name1 = isset($m_name1)?$m_name1:'0';
            

            if($m_name1!='0'){
                $sql2 = "INSERT INTO material_products (mp_unit,mp_volume,sub_po_id,mat_id)
                VALUES ('$mp_unit','$mp_volume1','$sub_po_id','$m_name1')"; 
                $result2 = mysqli_query($conn,$sql2);
    
                if (!$result) {
                    echo $conn->error."<br>";
                    $check_mtr = 0;
                }
            }
        }
    }
        else {
            $check_mtr = 0;
            echo "add sub product ".$conn->error;
        }

        if ($check_mtr) {
          echo "
          <script> 
          window.location.href ='../sub-products.php';
          </script>
          ";
      }
      else{
          $myFile = $target_file2;
          unlink($myFile) or die("Couldn't delete file");
      // echo $conn->error;
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