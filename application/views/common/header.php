<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if IE 7 ]>		 <html class="no-js ie ie7 lte7 lte8 lte9" lang="en-US"> <![endif]-->
<!--[if IE 8 ]>		 <html class="no-js ie ie8 lte8 lte9" lang="en-US"> <![endif]-->
<!--[if IE 9 ]>		 <html class="no-js ie ie9 lte9>" lang="en-US"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js" lang="en-US"> <!--<![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Monthly Reporting System</title>

		
<link href="<?=$this->config->item('base_url')?>addons/common/main.css" rel="stylesheet">

<link href="<?=$this->config->item('base_url')?>addons/tag-it-master/css/jquery.tagit.css" rel="stylesheet" type="text/css">
		
<link href="<?=$this->config->item('base_url')?>addons/DataTables/media/css/demo_page.css" rel="stylesheet">
<link href="<?=$this->config->item('base_url')?>addons/DataTables/media/css/demo_table.css" rel="stylesheet">
<link href="<?=$this->config->item('base_url')?>addons/jquery/css/custom-theme/jquery-ui-1.10.0.custom.css" rel="stylesheet">

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


<script>
$(document).unbind('keydown').bind('keydown', function (event) {
    var doPrevent = false;
    if (event.keyCode === 8) {
        var d = event.srcElement || event.target;
        if ((d.tagName.toUpperCase() === 'INPUT' && (d.type.toUpperCase() === 'TEXT' || d.type.toUpperCase() === 'PASSWORD')) 
             || d.tagName.toUpperCase() === 'TEXTAREA') {
            doPrevent = d.readOnly || d.disabled;
        }
        else {
            doPrevent = true;
        }
    }

    if (doPrevent) {
        event.preventDefault();
    }
});
$(document).ready(function(){
		
	$(".damagePics").colorbox({rel:'damagePics', height:"75%"});
	
	getPriceRange()   
	
	$('.dataTable').dataTable( {
		    "bJQueryUI": false,
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bSort": true,
        "bInfo": false,
        "bAutoWidth": true,
				"sPaginationType": "full_numbers"
    } );
	$('.dataTable2').dataTable( {
		    "bJQueryUI": false,
        "bPaginate": true,
        "bLengthChange": false,
				"iDisplayLength": 5,
        "bFilter": true,
        "bSort": false,
        "bInfo": false,
        "bAutoWidth": true,
				"sPaginationType": "full_numbers"
    } )/*.makeEditable()*/;	
		
	$('.dataTable3').dataTable( {
		    "bJQueryUI": false,
        "bPaginate": true,
        "bLengthChange": false,
				"iDisplayLength": 5,
        "bFilter": false,
        "bSort": false,
        "bInfo": false,
        "bAutoWidth": true,
				"sPaginationType": "full_numbers"
    } );
		
	$('.dataTable4').dataTable( {
		    "bJQueryUI": false,
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": false,
        "bAutoWidth": true,
				"sPaginationType": "full_numbers",
				"aaSorting": [[7,'desc'], [1,'desc']]
    } );
	
	$(window).keydown(function(event){
		if(event.keyCode == 13) {
			event.preventDefault();
			return false;
		}
	});


	$('.serv, .cust, .totals, .dues, .expense, .expenseTotal').priceFormat({
			prefix: '',
			thousandsSeparator: ',',
			vMin: '-99999999.99',
			nBracket: '(,)'
	});

	$(function() {
		$( document ).tooltip({ track: true });
	});


	$('input#emails').val("<?=$this->session->userdata('emails')?>");
	$('#emails').tagit({
		singleFieldDelimiter: '|'	
	});
	
	$('.req_pCont').blur(function() { 
		
		$("input.req_pCont").rules("add", {
			required: true,
			messages: {
				required: "Specify the name"
			}
		});		
		
	});
	
	$('.salesForm input').blur(function() {
	
	 	var class1 = $(this).attr('class').split(' ')[0];
	 	var class2 = $(this).attr('class').split(' ')[1];
			
		if(!$(this).val()) {
			$(this).val('0');
		}			
		if(class2 != null){
			if(class2 == 'serv'){
				calculateTotalRow(this, 'input.serv', 'input.addedServ');
				calculateTotal(this, 'input.serv', 'input.ttlMonthlySales', 'input.ttlAddedService');
			
			}else if(class2 == 'cust'){
				calculateTotalRow(this, 'input.cust', 'input.addedCust'); 
				calculateTotal(this, 'input.cust', 'input.ttlMonthlySales', 'input.ttlAddedCustomer');
			}
			doesMatch(this);
			checkRun();
			totalPrecents(this);
		}
		calculateTotalCol(this, 'input.'+class1, 'input.'+class1+'_ttl', class2); 
	});

	$('#bcOn').click(function() {
		if(!$('#bcOn').is(':checked')){
			$('input.billCollects').css("color","#000000");// CHANGE TO NOT BE READ ONLY
			$('input.billCollects').attr('readonly', false);// CHANGE TO NOT BE READ ONLY
		}else if($('#bcOn').is(':checked')){
			$('input.billCollects').css("color","#666666");// CHANGE TO READ ONLY
			$('input.billCollects').attr('readonly', true);// CHANGE TO READ ONLY
			calcPrecent('#bcOn', 2, "input.billCollects", "billsC");
		}
	});	
	$('#adfOn').click(function() {
		if(!$('#adfOn').is(':checked')){
			$('input.adFundRoyalty').css("color","#000000");// CHANGE TO BLACK TEXT
			$('input.adFundRoyalty').attr('readonly', false);// CHANGE TO NOT BE READ ONLY
		}else if($('#adfOn').is(':checked')){
			$('input.adFundRoyalty').css("color","#666666");// CHANGE TO READ ONLY
			$('input.adFundRoyalty').attr('readonly', true);// CHANGE TO READ ONLY
			calcPrecent('#adfOn', 1, "input.adFundRoyalty", "adFund");
		}
	});		
	$('#royOn').click(function() {
		if(!$('#royOn').is(':checked')){
			$('input.royaltyDue').css("color","#000000");	// CHANGE TO BLACK TEXT
			$('input.royaltyDue').attr('readonly', false);// CHANGE TO NOT BE READ ONLY
		}else if($('#royOn').is(':checked')){
			$('input.royaltyDue').css("color","#666666");// CHANGGE TO GREY TEXT
			$('input.royaltyDue').attr('readonly', true);// CHANGE TO READ ONLY
			calcPrecent('#royOn', 7, "input.royaltyDue", "royal");
		}
	});

			  
	$('.expense').blur(function()  {
	  var total = 0;
	
	  $('.expense').each(function () {
		total += parseFloat($(this).val().replace(/\,/g,''));
		//alert(total);
	  });
	
	  $('.expenseTotal').val(total.toFixed(2));
	});
	
	
	getStates();
			
});

function doesMatch(src){
	
	var row 				= $(src).closest('tr');
	var servVal				= row.find("input.addedServ").val();
	var custVal				= row.find("input.addedCust").val();
	
	if(servVal != custVal){
		var diff = parseFloat(servVal-custVal);
		row.find(".rowMatchMsg").html(diff.toFixed(2));
		row.find("input.matched").val(diff + " off!");
	}else{
		row.find(".rowMatchMsg").html('<img src="<?=$this->config->item('base_url')?>addons/icons/green-checkmark.png" width="24" alt="good" style="margin:5px 5px -5px" />');
		row.find("input.matched").val('Matched');
	}
	
}


function checkRun(){

	if(!$('#bcOn').is(':checked')){
		$('input.billCollects').css("color","#000000");// CHANGE TO NOT BE READ ONLY
		$('input.billCollects').attr('readonly', false);// CHANGE TO NOT BE READ ONLY
	}else if($('#bcOn').is(':checked')){
		$('input.billCollects').css("color","#666666");// CHANGE TO READ ONLY
		$('input.billCollects').attr('readonly', true);// CHANGE TO READ ONLY
		calcPrecent('#bcOn', 2, "input.billCollects", "billsC");
	}

	if(!$('#adfOn').is(':checked')){
		$('input.adFundRoyalty').css("color","#000000");// CHANGE TO BLACK TEXT
		$('input.adFundRoyalty').attr('readonly', false);// CHANGE TO NOT BE READ ONLY
	}else if($('#adfOn').is(':checked')){
		$('input.adFundRoyalty').css("color","#666666");// CHANGE TO READ ONLY
		$('input.adFundRoyalty').attr('readonly', true);// CHANGE TO READ ONLY
		calcPrecent('#adfOn', 1, "input.adFundRoyalty", "adFund");
	}

	if(!$('#royOn').is(':checked')){
		$('input.royaltyDue').css("color","#000000");	// CHANGE TO BLACK TEXT
		$('input.royaltyDue').attr('readonly', false);// CHANGE TO NOT BE READ ONLY
	}else if($('#royOn').is(':checked')){
		$('input.royaltyDue').css("color","#666666");// CHANGGE TO GREY TEXT
		$('input.royaltyDue').attr('readonly', true);// CHANGE TO READ ONLY
		calcPrecent('#royOn', 7, "input.royaltyDue", "royal");
	}
		
}

function calcPrecent(src, percent, field, type){

	var tbl 					= $(src).closest('table');	
	var salesTtl			= tbl.find("input.ttlMonthlySales").val();
	
	result 						= (parseFloat(salesTtl * percent)/100);
	tbl.find(field).val(result.toFixed(2));
	totalPrecents(src);	
}

function totalPrecents(src){
	var tbl 					= $(src).closest('table');	
	
	var royDues				= tbl.find("input.royaltyDue").val();
	var adfDues				= tbl.find("input.adFundRoyalty").val();
	var bcDues				= tbl.find("input.billCollects").val();
	var salesTtl			= tbl.find("input.ttlMonthlySales").val();
	
	ttlDues 					= (parseFloat(royDues)+parseFloat(adfDues)+parseFloat(bcDues));
	//ttlWPer 					= (parseFloat(salesTtl)+parseFloat(ttlDues));
	
	tbl.find('input.ttlDues').val(ttlDues.toFixed(2));
	//tbl.find('input.ttlWithDues').val(ttlWPer.toFixed(2));
}

function calculateTotal( src, amounts, total1, total2 ) {
	
	var sum = 0,
	tbl = $(src).closest('table');
	
	tbl.find(amounts).each(function( index, elem ) {
		var val = parseFloat($(elem).val().replace(/\,/g,''));
		if( !isNaN( val ) ) {
			sum += val;
		}
	});
	tbl.find(total1).val(sum.toFixed(2));
	tbl.find(total2).val(sum.toFixed(2));
}

function calculateTotalRow( src, amounts, total ) {
	var sum = 0,
	tbl = $(src).closest('tr');
	tbl.find(amounts).each(function( index, elem ) {
		var val = parseFloat($(elem).val().replace(/\,/g,''));
		if( !isNaN( val ) ) {
			sum += val;
		}
	});
	tbl.find(total).val(sum.toFixed(2));
}

function calculateTotalCol( src, amounts, total, class2 ) {
	var sum = 0,
	tbl = $(src).closest('table');
	tbl.find(amounts).each(function( index, elem ) {
		var val = parseFloat($(elem).val().replace(/\,/g,''));
		if( !isNaN( val ) ) {
			sum += val;
		}
	});
	
	if(class2)
		tbl.find(total).val(sum.toFixed(2));
	else
		tbl.find(total).val(sum);
		
	//tbl.find(total).val(sum.toFixed(2));
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
	//tbl.find(total).html(sum);
	tbl.find(total).html(sum.toFixed(2));
}

function addSalesRow(){
	
	num = (1+($("#sCont tr").length-3));
	alert(num);
	
	$("#sCont tr:last").before('<tr class="row"></tr>');		
	$("#sCont .row:last").append('<td class="lftFormCol">'+num+'</td>');	
	$("#sCont .row:last").append('<td class="lftFormCol"><input name="sConts['+num+'][name]" size="20" type="text" maxlength="256"></td>');	
	$("#sCont .row:last").append('<td class="lftFormCol"><input name="sConts['+num+'][phone]" size="20" type="text" maxlength="13"></td>');				
	$("#sCont .row:last").append('<td class="lftFormCol"><input name="sConts['+num+'][email]" size="30" class="pEmail" type="text"></td>');	
	$("#sCont .row:last").append('<td class="lftFormCol"><input name="sConts['+num+'][address]" size="30" type="text" maxlength="256"></td>');	
	$("#sCont .row:last").append('<td class="lftFormCol"><input name="sConts['+num+'][city]" size="30" type="text" maxlength="128"></td>');	
	$("#sCont .row:last").append('<td class="lftFormCol"><select name="sConts['+num+'][state]" class="stateSelect"></td>');	
	$("#sCont .row:last").append('<td class="lftFormCol"><input name="sConts['+num+'][zip]" size="5" maxlength="5" type="text"></td>');	
	
	getStates();
}
function addFranRow(){
		
	num = (1+($("#pCont tr").length-3));
	alert(num);

	$("#pCont tr:last").before('<tr class="row"></tr>');			
	$("#pCont .row:last").append('<td class="lftFormCol">'+num+'</td>');		
	$("#pCont .row:last").append('<td class="lftFormCol"><input name="pConts['+num+'][name]" size="20" type="text" maxlength="256"></td>');
	$("#pCont .row:last").append('<td class="lftFormCol"><input name="pConts['+num+'][phone]" size="20" type="text" maxlength="13"></td>');				
	$("#pCont .row:last").append('<td class="lftFormCol"><input name="pConts['+num+'][email]" size="30" class="pEmail" type="text"></td>');	
	$("#pCont .row:last").append('<td class="lftFormCol"><input name="pConts['+num+'][address]" size="30" type="text" maxlength="256"></td>');	
	$("#pCont .row:last").append('<td class="lftFormCol"><input name="pConts['+num+'][city]" size="30" type="text" maxlength="128"></td>');	
	$("#pCont .row:last").append('<td class="lftFormCol"><select name="pConts['+num+'][state]" class="stateSelect"></select></td>');	
	$("#pCont .row:last").append('<td class="lftFormCol"><input name="pConts['+num+'][zip]" size="5" maxlength="5" type="text"></td>');	
	
	getStates();
}

function getStates(){ 
	$.ajax({
		url: "<?=$this->config->item('base_url')?>addons/common/states.php",		
		dataType: "json",
		success: function(msg){   
			var stateOpts = null;
			$(".stateSelect").append('<option selected="selected" value="<?php echo NULL;?>">Choose State</option>');
			for (var i in msg){
				$(".stateSelect").append('<option value="'+msg[i]["val"]+'">'+msg[i]["text"]+'</option>');
			}
			$("select").chosen();
		},
		error: function(msg){
			alert('ajax Failed'); 	
		}
	});
}

function getPriceRange(){ 
	$.ajax({
		url: "<?=$this->config->item('base_url')?>addons/common/priceRange.php",		
		dataType: "json",
		success: function(msg){   
			$(".priceRange").append('<option selected="selected" value="0">Select</option>');
			for (var i in msg){
				$(".priceRange").append('<option value="'+msg[i]["val"]+'">'+msg[i]["text"]+'</option>');
			}
			$("select.priceRange").chosen();
		},
		error: function(msg){
			alert('ajax Failed'); 	
		}
	});
}
// Popup window function
	function basicPopup(url) {
		popupWindow = window.open(url,'popUpWindow','height=600,width=800,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
	}


</script>

</head>
<body>
<a name="top"></a>
<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td>

<div id="container">
	<div id="header">
		<div class="miniMenu" style="text-align:right; margin-top:10px;">
			<span style="margin:0 5px 0;">Welcome <strong><?=$this->session->userdata('name')?></strong>. <br />If this is not you, please <a href="<?=$this->config->item('base_url')?>index.php/login/logout">Logout</a>!</span>
		</div>
		<div style="float:left"><a href="<?=$this->config->item('base_url')?>"><img src="<?=$this->config->item('base_url')?>addons/images/logo.png" width="300" /></a></div>
		<div style="float:left; margin-top:20px;"><h1> <?php if(isset($pageName)) echo '> '.$pageName; ?></h1></div>
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

	
