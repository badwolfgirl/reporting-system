<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>COP Monthly Reporting</title>

<link href="<?=$this->config->item('base_url')?>addons/common/main.css" rel="stylesheet">
<style>
body {
	margin:10px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:10px;
	padding:0px;
}
</style>
<script src="<?=$this->config->item('base_url')?>addons/jquery/js/jquery-1.9.0.js"></script>
<script src="<?=$this->config->item('base_url')?>addons/jquery/js/jquery-ui-1.10.0.custom.js"></script>
<script>
	
$(document).ready(function(){

  calculateTotalColTD('.units', '.units_ttl', '');  
  calculateTotalColTD('.techs', '.techs_ttl', ''); 
  calculateTotalColTD('.vehRepairs', '.vehRepairs_ttl', ''); 
  calculateTotalColTD('.daysWrkd', '.daysWrkd_ttl', ''); 
  calculateTotalColTD('.accountsWrkd', '.accountsWrkd_ttl', '');
  calculateTotalColTD('.paintSales', '.paintSales_ttl', '.00');
  calculateTotalColTD('.pdrSales', '.pdrSales_ttl', '.00');
  calculateTotalColTD('.interiorSales', '.interiorSales_ttl', '.00');
  calculateTotalColTD('.otherSales', '.otherSales_ttl', '.00');
  calculateTotalColTD('.addedServ', '.ttlAddedServ', '.00');
  calculateTotalColTD('.retail', '.retail_ttl', '.00');
  calculateTotalColTD('.dealerNew', '.dealerNew_ttl', '.00');
  calculateTotalColTD('.dealerUsed', '.dealerUsed_ttl', '.00');
  calculateTotalColTD('.dealerServ', '.dealerServ_ttl', '.00');
  calculateTotalColTD('.fleet', '.fleet_ttl', '.00');
  calculateTotalColTD('.other', '.other_ttl', '.00');
  calculateTotalColTD('.addedCust', '.ttlddedCust', '.00');
	
});
	
function docuPrint(){
	if(confirm('REMINDER: Make sure you choose Landscape for the orientation and Shrink to Page! Click OK to continue.')) {
		window.print();
	}
}

function calculateTotalColTD( src, total, dec ) {
	var sum = 0,
	tbl = $(src).closest('table');
	tbl.find(src).each(function( index, elem ) {
		var val = parseFloat($(elem).html());
		if( !isNaN( val ) ) {
			sum += val;
		}
	});
	tbl.find(total).html(sum.toFixed(2));
}

</script>

</head>
<body>
<table width="99%" cellpadding="0" cellspacing="0">
	<tr>
		<td>

	<div style="padding:10px;">
	
