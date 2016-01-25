<?php


function unlinkImg($deleteFile){
	if(unlink($deleteFile)){
		return true;
	}else{
		return false;
	}
}
function uploadImg($img, $fileNm, $maxW, $maxH, $cat){
	
	$results['targetPath']			= $_SERVER['DOCUMENT_ROOT'] .'/media/images/price_guide_photos/'.$cat.'/';
  $results['actualName']      = $img['name'];
  
  $results['ext']             = explode('.', $img['name']);
  $c                          = count($results['ext']);
  $c                          = $c-1; 
   
	$results['fileName']				= $fileNm.'.'.$results['ext'][$c];
	$results['targetFile']	 		= str_replace('//','/',$results['targetPath']) . $results['fileName'];
	
	if(move_uploaded_file($img['tmp_name'],$results['targetFile'])) {
		$results['readyImg']			= resizeImg($results['targetFile'], $maxW, $maxH);
		if(!$results['readyImg'])
			$results['note'] = $results['readyImg']['note'];
		else
			$results['note'] 				.= 'Success!';
	}else{
		$results['note'] 					= 'Error with moving file!';
	}
	return $results;
}
// IMAGE RESIZE FUNCTION
function resizeImg($origPath, $mW, $mH){
	// Read the size
	$rst['size']		= GetImageSize($origPath);
	$w							= $rst['size'][0];
	$h							= $rst['size'][1];
	// Proportionally resize the image to the max sizes specified above
	$xRatio					= $mW / $w;
	$yRatio					= $mH / $h;
	if(($w <= $mW) && ($h <= $mH)){
		$tnW					= $w;
		$tnH					= $h;
	}elseif(($xRatio * $h) < $mH){
		$tnH					= ceil($xRatio * $h);
		$tnW					= $mW;
	}else{
		$tnW					= ceil($yRatio * $w);
		$tnH					= $mH;
	}
	// Create the new image!
	if($rst['size']['mime'] == 'image/jpg' || $rst['size']['mime'] == 'image/jpeg'){
		$rst['src']				= imagecreatefromjpeg($origPath);
		$rst['dst']				= ImageCreateTrueColor($tnW, $tnH);
		$rst['resize']		= ImageCopyResized($rst['dst'], $rst['src'], 0, 0, 0, 0, $tnW, $tnH, $w, $h);
		$rst['imgMod']		= imagejpeg($rst['dst'], $origPath, 100);
	}else{
		$rst['note']			= 'Error with file type!';
		return false;
	}
		
	return $rst;
}


if (!empty($_FILES)) {
	
	$name = explode('.',$_FILES['name']);
	
	$filename = $name[0] . substr(md5($_SERVER['REMOTE_ADDR'].date('Y-m-d H:i:s')), 0, 8);

/*if($_POST['adType']){
switch ($_POST['adType']) {
    case 'bkgd':
        $mxW = 1200;
        $mxH = 800;
        break;
}
}elseif($_POST['maxW'] && $_POST['maxH']){
    $mxW = $_POST['maxW'];
    $mxH = $_POST['maxH'];
}else{
    $mxW = 800;
    $mxH = 600;
}*/

$file = uploadImg($_FILES['Filedata'], $filename, 1800, 1200, $_POST['category']);

echo "<pre>";		
print_r($_FILES);
//print_r($file);
echo "</pre>";	

}
?>