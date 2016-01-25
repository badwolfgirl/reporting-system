<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>COP Monthly Reporting</title>

<link href="<?=$this->config->item('base_url')?>addons/common/main.css" rel="stylesheet">
<link href="<?=$this->config->item('base_url')?>addons/jquery/css/custom-theme/jquery-ui-1.10.0.custom.css" rel="stylesheet">
		
<script src="<?=$this->config->item('base_url')?>addons/jquery/js/jquery-1.9.0.js"></script>
<script src="<?=$this->config->item('base_url')?>addons/jquery/js/jquery-ui-1.10.0.custom.js"></script>

</head>
<body>
<table width="50%" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td align="center"><div id="container">
			<div id="body">
      <img src="<?=$this->config->item('base_url')?>addons/images/logo.png" width="600" />
<?php 
if(isset($_GET['err'])) echo '<div class="noteError">'.urldecode($_GET['err']).'</div>';
if(isset($_GET['wrn'])) echo '<div class="noteWarning">'.urldecode($_GET['wrn']).'</div>';
if(isset($_GET['inf'])) echo '<div class="noteInfo">'.urldecode($_GET['inf']).'</div>';
?>
				<form name="formLogin" id="formLogin" action="login/do_login" method="post">
					<table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
						<tr>
							<td class="lftHeadCol" colspan="2"><h2 style="text-align:left">Please login here</h2></td>
						</tr>
						<tr>
							<td class="lftHeadCol">Username</td>
							<td class="lftHeadCol"><input name="username" type="text"  id="username_id"  title="Username" size="50"   /></td>
						</tr>
						<tr>
							<td class="lftHeadCol">Password</td>
							<td class="lftHeadCol"><input name="password" type="password" id="password"   title="Password" size="50"  /></td>
						</tr>
						<tr>
							<td colspan="2" class="lftHeadCol" align="right"><input name="login" value="Login" type="submit" /></td>
						</tr>
					</table>
				</form>
			</div>
			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
		</div></td>
	</tr>
</table>
</body>
</html>