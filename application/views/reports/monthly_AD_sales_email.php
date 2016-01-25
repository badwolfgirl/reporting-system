<table cellpadding="0" cellspacing="0" width="90%">
	<tr>
		<td><table cellpadding="10" cellspacing="0" width="100%" style="border:1px solid #666666">
			<tr>
				<td style="font-weight:bold; text-align:left;"><h2 style="color: #000000; font-size: 16px; font-weight: normal; margin:0; padding:0;"><?=$mainh2?></h2></td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td><table cellpadding="10" cellspacing="0" width="100%" style="border:1px solid #666666">
	<tr>
		<td colspan="11" style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:left;"><h3 style="color: #000000; font-size: 14px; margin:0; padding:5px 0; font-weight: normal;"><?=$sect1h3?></h3></td>
		<td style="font-weight:bold; border-bottom:1px solid #666666; text-align:right;" colspan="7"><h3 style="color: #000000; font-size: 14px; margin:0; padding:5px 0; font-weight: normal;">Monthly Sales Total: <strong>$<?=$emailData['total_month_sales_dollars']?></strong></h3></td>
	</tr>
<?php
	if(isset($emailData['billCollects'])){
?>
	<tr>
		<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:right;" colspan="17">Billing & Collections</td>
		<td style="font-weight:bold; border-bottom:1px solid #666666; text-align:right;"><?=$emailData['billCollects']?></td>
		</tr>
<?php
	}
	if(isset($emailData['adFundRoyalty'])){
?>
	<tr>
		<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:right;" colspan="17">Ad Fund Royalty</td>
		<td style="font-weight:bold; border-bottom:1px solid #666666; text-align:right;"><?=$emailData['adFundRoyalty']?></td>
		</tr>
<?php
	}
	if(isset($emailData['royaltyDue'])){
?>
	<tr>
		<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:right;" colspan="17">Royalty Due</td>
		<td style="font-weight:bold; border-bottom:1px solid #666666; text-align:right;"><?=$emailData['royaltyDue']?></td>
		</tr>
<?php
	}
?>
	<tr>
		<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:left;" colspan="6"><h3 style="color: #000000; font-size: 14px; margin:0; padding:5px 0; font-weight: normal;"><?=$sect2h3?></h3></td>
		<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:center;" colspan="5"><h4 style="color: #333; font-size: 12px; font-weight: normal; text-align:center; margin:0; padding:0;">Service Type</h4></td>
		<td style="font-weight:bold; border-bottom:1px solid #666666; text-align:center;" colspan="7"><h4 style="color: #333; font-size: 12px; font-weight: normal; text-align:center; margin:0; padding:0;">Customer Type</h4></td>
	</tr>
	<tr>
		<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:left;">Franchisee</td>
		<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:center;"># of Units</td>
		<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:center;"># of Techs</td>
		<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:center;"># of Vehicles<br />Repaired</td>
		<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:center;"># of Days<br />Worked</td>
		<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:center;"># of Accounts<br />Worked</td>
		<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:center;">Paint Sales</td>
		<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:center;">PDR Sales</td>
		<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:center;">Interior<br />Sales</td>
		<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:center;">Other Sales</td>
		<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:center;"><span style="font-size:120%">Total</span></td>
		<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:center;">Retail</td>
		<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:center;">Dealer New</td>
		<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:center;">Dealer Used</td>
		<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:center;">Dealer<br />Service</td>
		<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:center;">Fleet</td>
		<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:center;">Other</td>
		<td style="font-weight:bold; border-bottom:1px solid #666666; text-align:center;"><span style="font-size:120%">Total</span></td>
		</tr>
<?php
	foreach($emailData['frans'] as $key => $data){ 
?>
	<tr class="salesrow">
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:left;"><strong><?=$data['firstName']?> <?=$data['lastName']?></strong><br /><?=$areadev[0]->adID?> - <?=$data['franID']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;"><?=$data['units']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;"><?=$data['techs']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;"><?=$data['vehicles_repaired']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;"><?=$data['days_worked']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;"><?=$data['accounts_worked']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;"><?=$data['paint_sales']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;"><?=$data['PDR_sales']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;"><?=$data['interior_sales']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;"><?=$data['other_sales']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;" nowrap="nowrap">$ <?=$data['service_type_total']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;"><?=$data['retail_dollars']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;"><?=$data['dealer_new_dollars']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;"><?=$data['dealer_used_dollars']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;"><?=$data['dealer_service_dollars']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;"><?=$data['fleet_dollars']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;"><?=$data['other_dollars']?></td>
		<td style="border-bottom:1px dotted #666666; text-align:right;" nowrap="nowrap">$ <?=$data['customer_type_total']?></span></td>
		</tr>
<?php
	}  
?>
	<tr>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;"><span style="font-size:120%">Totals</span></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;"><?=$emailData['ttlUnits']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;"><?=$emailData['ttlTechs']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;"><?=$emailData['ttlVehRepairs']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;"><?=$emailData['ttlDaysWrkd']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;"><?=$emailData['ttlAccountsWrkd']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;">$<?=$emailData['ttlPaintSales']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;">$<?=$emailData['ttlPdrSales']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;">$<?=$emailData['ttlInteriorSales']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;">$<?=$emailData['ttlOtherSales']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;">$<?=$emailData['ttlAddedService']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;">$<?=$emailData['ttlRetail']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;">$<?=$emailData['ttlDealerNew']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;">$<?=$emailData['ttlDealerUsed']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;">$<?=$emailData['ttlDealerServ']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;">$<?=$emailData['ttlFleet']?></td>
		<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:right;">$<?=$emailData['ttlOther']?></td>
		<td style="border-bottom:1px dotted #666666; text-align:right;">$<?=$emailData['ttlAddedCustomer']?></td>
		</tr>	
	<tr>
		<td colspan="18" style="font-weight:bold; border-bottom:1px solid #CCCCCC; text-align:left;">Special Comments submitted:</td>
	</tr>
	<tr>
		<td colspan="18" style="text-align:left;"><?=$emailData['comments']?></td>
	</tr>
</table>
<div>
</div>
