<?php

$stArray = array();

//for($i = 25; $i <= 1000; $i += 25){
//	$stArray[]	= array("val" => $i, "text" => "$".$i);
//}


for($i = 50; $i <= 1000; $i += 50){
	$stArray[]	= array("val" => $i, "text" => "$ ".$i);
}

echo(json_encode($stArray));