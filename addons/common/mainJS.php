
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
		
		
	/* Init DataTables */
	/*var oTable = $('.dataTable2').dataTable();
	
	 Apply the jEditable handlers to the table
	$('td', oTable.fnGetNodes()).editable( '../jeditable/ajax.jeditable.php', {
		"callback": function( sValue, y ) {
			alert(y);
			var aPos = oTable.fnGetPosition( this );
			oTable.fnUpdate( sValue, aPos[0], aPos[1] );
		},
		"submitdata": function ( value, settings ) {
			return {
				"row_id": this.parentNode.getAttribute('id'),
				"column": oTable.fnGetPosition( this )[2]
			};
		},
		"bJQueryUI": false,
		"bPaginate": true,
		"bLengthChange": false,
		"bFilter": true,
		"bSort": true,
		"bInfo": false,
		"bAutoWidth": true,
		"sPaginationType": "full_numbers",
		"height": "14px"
	} ); */
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

			  
 /* calculateTotalColTD('.units', '.units_ttl', '');  
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
  calculateTotalColTD('.addedCust', '.ttlddedCust', '.00');*/
  
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
		row.find(".rowMatchMsg").html('<img src="/addons/icons/green-checkmark.png" width="24" alt="good" style="margin:5px 5px -5px" />');
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
