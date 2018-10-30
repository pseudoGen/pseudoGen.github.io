<?php

$username = [];
$username[] = "abc";
$username[] = "def";
$email = [];
$email[] = "abc@xyz.com";
$email[] = "def@xyz.com";
$r = $_REQUEST["email"];
$q = $_REQUEST["username"];

$myObj->available="true";
if(!empty($q)){
foreach ($username as $value) {
	if($q == $value){
		$myObj->available="false";
		$myObj->searchTerm = $q;
	}
	# code...
}
}

if(!empty($r)){
foreach ($email as $v) {
	if($r == $v){
		$myObj->available="false";
		$myObj->searchTerm = $r;
	}
	# code...
}
}



$myJSON = json_encode($myObj);

echo $myJSON;
?> 