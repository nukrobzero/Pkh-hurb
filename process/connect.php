<?php

// Create connection
$conn = mysqli_connect('localhost','root','','p_pkh_db');

// Check connection
if($conn->connect_error){
	echo 'Faild to connect';
}
$conn->set_charset("utf8");



?>