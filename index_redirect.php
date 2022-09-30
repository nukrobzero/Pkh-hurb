<?php
	// $url = isset($_GET["url"])?$_GET['url']:'';
	$url = isset($_SERVER['REQUEST_URI'])?$_SERVER['REQUEST_URI']:'';
	// echo "url = ".$url."</br>";
	$url = explode('/', $url);
	$slash = "";
	$tmp_url ="";
	for ($i=2;$i<count($url);$i++){
		if($i!=2){
			$slash ="/";
		}
		else{
			// $slash ="";
		}
		$tmp_url .= $slash.$url[$i] ;
	}
	// echo "".$tmp_url;

	$get = explode('?', $tmp_url);
	$tmp_get = "";
	for ($j=0; $j < count($get) ; $j++) { 
		if ($j==1){
			$tmp_get.=".php";

		}
		if($j!=0)
			$tmp_get.="?";
		@$tmp_get.=$get[$j];
	}
	// echo "<br>".count($get)." ".$tmp_get;

	if (count($get)== 1)
		$tmp_get = $tmp_url.".php";
	else {
			$tmp_get_go =explode('&', $get[1]);
			for ($j=0;$j<count($tmp_get_go);$j++){
				// echo "<br>".$tmp_get_go[$j]." ";
				$get_value = explode('=', $tmp_get_go[$j]);
				for ($k=0;$k<count($get_value);$k++){
					$value_name = $get_value[0];
					$value_value = $get_value[1];

					$_GET[$value_name] = isset($value_value)?$value_value:'';
				}
			}		
	}
	// echo "<br>".$get[0];
	// echo "<br>".$tmp_get;
	$uri_parts = explode('?', $tmp_get);
	// echo "<br>".$uri_parts[0];
	include $uri_parts[0];
?>