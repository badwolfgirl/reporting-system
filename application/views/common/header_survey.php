<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if IE 7 ]>		 <html class="no-js ie ie7 lte7 lte8 lte9" lang="en-US"> <![endif]-->
<!--[if IE 8 ]>		 <html class="no-js ie ie8 lte8 lte9" lang="en-US"> <![endif]-->
<!--[if IE 9 ]>		 <html class="no-js ie ie9 lte9>" lang="en-US"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js" lang="en-US"> <!--<![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Monthly Reporting</title>

		
<link href="<?=$this->config->item('base_url')?>addons/common/main.css" rel="stylesheet">

<link href="<?=$this->config->item('base_url')?>addons/tag-it-master/css/jquery.tagit.css" rel="stylesheet" type="text/css">
		
<link href="<?=$this->config->item('base_url')?>addons/DataTables/media/css/demo_page.css" rel="stylesheet">
<link href="<?=$this->config->item('base_url')?>addons/DataTables/media/css/demo_table.css" rel="stylesheet">
<link href="<?=$this->config->item('base_url')?>addons/jquery/css/custom-theme/jquery-ui-1.10.0.custom.css" rel="stylesheet">

<link href="<?=$this->config->item('base_url')?>addons/uploadify/uploadify.css" rel="stylesheet" />

<link href="<?=$this->config->item('base_url')?>addons/chosen/chosen.css" rel="stylesheet">
<link href="<?=$this->config->item('base_url')?>addons/colorbox-master/example1/colorbox.css" rel="stylesheet" />
		
<script src="<?=$this->config->item('base_url')?>addons/jquery/js/jquery-1.9.0.js"></script>
<script src="<?=$this->config->item('base_url')?>addons/jquery/js/jquery-ui-1.10.0.custom.js"></script>

<script type="text/javascript" language="javascript" src="<?=$this->config->item('base_url')?>addons/chosen/chosen.jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?=$this->config->item('base_url')?>addons/DataTables/media/js/jquery.dataTables.js"></script>

<script type="text/javascript" language="javascript" src="<?=$this->config->item('base_url')?>addons/price_format/jquery.price_format.js"></script>

<script src="<?=$this->config->item('base_url')?>addons/tag-it-master/js/tag-it.js" type="text/javascript" charset="utf-8"></script>
<script src="<?=$this->config->item('base_url')?>addons/jeditable/jquery.jeditable.js" type="text/javascript" charset="utf-8"></script>

<script src="<?=$this->config->item('base_url')?>addons/colorbox-master/jquery.colorbox.js"></script>
<script src="<?=$this->config->item('base_url')?>addons/uploadify/jquery.uploadify.v2.1.4.min.js"></script>

<?php include($this->config->item('base_url')."addons/common/mainJS.php"); ?>

</head>
<body>
<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td>

<div id="container">
	<div id="header">
		<div class="miniMenu" style="text-align:right; margin-top:10px;">
			<span style="margin:0 5px 0;">Welcome <strong><?=$this->session->userdata('name')?></strong>. <br />If this is not you, please <a href="<?=$this->config->item('base_url')?>index.php/login/logout">Logout</a>!</span>
		</div>
		<div style="float:left"><a href="<?=$this->config->item('base_url')?>"><img src="<?=$this->config->item('base_url')?>addons/images/logo.png" width="300" /></a></div>
		<div style="float:left"><h1><?=$mainH1?> <?php if(isset($pageName)) echo '> '.$pageName; ?></h1></div>
		<div style="clear:both"></div>		
	</div>
	<div id="body">
<?php 
if(isset($_GET['msg'])) echo '<div class="noteSuccess">'.urldecode($_GET['msg']).'</div>';
if(isset($msg)) echo '<div class="noteSuccess">'.urldecode($msg).'</div>';
if(isset($_GET['err'])) echo '<div class="noteError">'.urldecode($_GET['err']).'</div>';
if(isset($err)) echo '<div class="noteError">'.urldecode($err).'</div>';
if(isset($_GET['wrn'])) echo '<div class="noteWarning">'.urldecode($_GET['wrn']).'</div>';
if(isset($_GET['inf'])) echo '<div class="noteInfo">'.urldecode($_GET['inf']).'</div>';
?>

	
