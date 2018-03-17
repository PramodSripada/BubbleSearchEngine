<?php
ini_set('display_errors', 1);
$contents = file_get_contents("sites.txt");
$data = array();
$data = explode(PHP_EOL, $contents);
$urls = array();
$c =0;
foreach ($data as $url) {
	$d = "<a href='"."http://".$url."'><br />".PHP_EOL;
	array_push($urls,$d);
	$c = $c+1;
	if($c>=10){
		break;
	}
}
file_put_contents ("test.html" , $urls);
echo "done";
redirect();

function redirect(){
 	echo "<script>location.href='crawler.php';</script>";
 }
?>