
<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td><table cellpadding="10" cellspacing="0" width="100%" style="border:1px solid #666666">
			<tr>
				<td class="lftHeadCol"><h2><?=$mainh2?></h2></td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td><table cellpadding="10" cellspacing="0" width="100%" style="border:1px solid #666666">
			<tr>
				<td colspan="12" class="lftGridCol_hd"><h3><?=$sect1h3?></h3></td>
				<td class="rgtGridCol_hd" colspan="6"><h3>Monthly Sales Total:</h3></td>
				<td class="rgtGridColLast_hd" colspan="1"><h3><strong>$<?=$totalSales?></strong></h3></td>
			</tr>
<?php
	if($areadev[0]->billColl2 == 'yes'){
?>
			<tr>
				<td class="rgtGridCol_hd" colspan="18"><h3>Billing & Collections:</h3></td>
				<td class="rgtGridColLast_hd" colspan="1"><h3>$<?php echo round((str_replace(array(',','.00'), '', $totalSales)*2)/100, 2); ?></h3></td>
			</tr>
<?php
	}
	if($areadev[0]->adFund1 == 'yes'){
?>
			<tr>
				<td class="rgtGridCol_hd" colspan="18"><h3>Ad Fund Royalty:</h3></td>
				<td class="rgtGridColLast_hd" colspan="1"><h3>$<?php echo round((str_replace(array(',','.00'), '', $totalSales)*1)/100, 2); ?></h3></td>
			</tr>
<?php
	}
	if($areadev[0]->royalty7 == 'yes'){
?>
			<tr>
				<td class="rgtGridCol_hd" colspan="18"><h3>Royalty Dues:</h3></td>
				<td class="rgtGridColLast_hd" colspan="1"><h3>$<?php echo round((str_replace(array(',','.00'), '', $totalSales)*7)/100, 2); ?></h3></td>
			</tr>
<?php
	}elseif(isset($reports[0]->royaltyDue) && $reports[0]->royaltyDue != '0.00'){
?>
	<tr>
		<td class="rgtGridCol_hd" colspan="18"><h3>Royalty Dues:</h3></td>
		<td class="rgtGridColLast_hd" colspan="1"><h3>$<?php echo number_format($reports[0]->royaltyDue, 2); ?></h3></td>
	</tr>
<?php
	}
?>
			<tr>
				<td class="lftGridCol_hd" colspan="7"><h3><?=$sect2h3?></h3></td>
				<td class="centGridCol_hd" colspan="5"><h4>Service Type</h4></td>
				<td class="centGridColLast_hd" colspan="7"><h4>Customer Type</h4></td>
			</tr>
			<tr>
				<td class="lftGridCol_hd" colspan="2">Franchisee</td>
				<td class="centGridCol_hd"># of Units</td>
				<td class="centGridCol_hd"># of Techs</td>
				<td class="centGridCol_hd"># of Vehicles<br />Repaired</td>
				<td class="centGridCol_hd"># of Days<br />Worked</td>
				<td class="centGridCol_hd"># of Accounts<br />Worked</td>
				<td class="centGridCol_hd servCol">Paint Sales</td>
				<td class="centGridCol_hd servCol">PDR Sales</td>
				<td class="centGridCol_hd servCol">Interior<br />Sales</td>
				<td class="centGridCol_hd servCol">Other Sales</td>
				<td class="centGridCol_hd servCol"><span style="font-size:120%">Total</span></td>
				<td class="centGridCol_hd custCol">Retail</td>
				<td class="centGridCol_hd custCol">Dealer New</td>
				<td class="centGridCol_hd custCol">Dealer Used</td>
				<td class="centGridCol_hd custCol">Dealer<br />Service</td>
				<td class="centGridCol_hd custCol">Fleet</td>
				<td class="centGridCol_hd custCol">Other</td>
				<td class="centGridColLast_hd custCol"><span style="font-size:120%">Total</span></td>
			</tr>
	<?php 
	
	if($reports[0] != false){
	foreach($reports as $key => $report){ 
	
		if($report->franID == $areadev[0]->franID){
	?>
			<tr class="salesrow">
				<td class="lftGridCol" colspan="2"><strong><?=$report->firstName.' '.$report->lastName?></strong><br /><?=$report->adID.' - '.$report->franID?></td>
				<td class="rgtGridCol"><?=$report->units?></td>
				<td class="rgtGridCol"><?=$report->techs?></td>
				<td class="rgtGridCol"><?=$report->vehicles_repaired?></td>
				<td class="rgtGridCol"><?=$report->days_worked?></td>
				<td class="rgtGridCol"><?=$report->accounts_worked?></td>
				<td class="rgtGridCol"><?=$report->paint_sales?></td>
				<td class="rgtGridCol"><?=$report->PDR_sales?></td>
				<td class="rgtGridCol"><?=$report->interior_sales?></td>
				<td class="rgtGridCol"><?=$report->other_sales?></td>
				<td class="rgtGridCol">$ <?=$report->service_type_total?></td>
				<td class="rgtGridCol"><?=$report->retail_dollars?></td>
				<td class="rgtGridCol"><?=$report->dealer_new_dollars?></td>
				<td class="rgtGridCol"><?=$report->dealer_used_dollars?></td>
				<td class="rgtGridCol"><?=$report->dealer_service_dollars?></td>
				<td class="rgtGridCol"><?=$report->fleet_dollars?></td>
				<td class="rgtGridCol"><?=$report->other_dollars?></td>
				<td class="rgtGridColLast">$ <?=$report->customer_type_total?></span></td>
			</tr>
	<?php
		}
		if($report->franID != $areadev[0]->franID){
	
	?>
			<tr class="salesrow">
				<td class="lftGridCol" colspan="2"><strong><?=$report->firstName.' '.$report->lastName?></strong><br /><?=$report->adID.' - '.$report->franID?></td>
				<td class="rgtGridCol"><?=$report->units?></td>
				<td class="rgtGridCol"><?=$report->techs?></td>
				<td class="rgtGridCol"><?=$report->vehicles_repaired?></td>
				<td class="rgtGridCol"><?=$report->days_worked?></td>
				<td class="rgtGridCol"><?=$report->accounts_worked?></td>
				<td class="rgtGridCol"><?=$report->paint_sales?></td>
				<td class="rgtGridCol"><?=$report->PDR_sales?></td>
				<td class="rgtGridCol"><?=$report->interior_sales?></td>
				<td class="rgtGridCol"><?=$report->other_sales?></td>
				<td class="rgtGridCol">$ <?=$report->service_type_total?></td>
				<td class="rgtGridCol"><?=$report->retail_dollars?></td>
				<td class="rgtGridCol"><?=$report->dealer_new_dollars?></td>
				<td class="rgtGridCol"><?=$report->dealer_used_dollars?></td>
				<td class="rgtGridCol"><?=$report->dealer_service_dollars?></td>
				<td class="rgtGridCol"><?=$report->fleet_dollars?></td>
				<td class="rgtGridCol"><?=$report->other_dollars?></td>
				<td class="rgtGridColLast">$ <?=$report->customer_type_total?></span></td>
			</tr>
	<?php 
		}
	} ?>          
			<tr>
				<td  class="lftGridCol" colspan="2" align="right"><span style="font-size:120%">Totals</span></td>
				<td class="rgtGridCol"><?=$totalUnits?></td>
				<td class="rgtGridCol"><?=$totalTechs?></td>
				<td class="rgtGridCol"><?=$totalVehicles?></td>
				<td class="rgtGridCol"><?=$totalDays?></td>
				<td class="rgtGridCol"><?=$totalAccounts?></td>
				<td class="rgtGridCol">$<?=$totalPaint?></td>
				<td class="rgtGridCol">$<?=$totalPDR?></td>
				<td class="rgtGridCol">$<?=$totalInterior?></td>
				<td class="rgtGridCol">$<?=$totalOtherS?></td>
				<td class="rgtGridCol">$<?=$totalServTtl?></td>
				<td class="rgtGridCol">$<?=$totalRetail?></td>
				<td class="rgtGridCol">$<?=$totalDealNew?></td>
				<td class="rgtGridCol">$<?=$totalDealUsed?></td>
				<td class="rgtGridCol">$<?=$totalDealServ?></td>
				<td class="rgtGridCol">$<?=$totalFleet?></td>
				<td class="rgtGridCol">$<?=$totalOtherC?></td>
				<td class="rgtGridColLast">$<?=$totalCustTtl?></td>
			</tr>	
	<?php if($notes){?>
			<tr>
				<td class="lftGridColLast" colspan="20"><h3>Special Comments Recorded</h3>
					<p><?=$notes?></p></td>
			</tr>
	<?php }?>
	
	<?php }else{ ?> 
			<tr>
				<td class="centGridColLast_hd" colspan="20"><h3><?=$reports['msg']?></h3></td>
			</tr>	
	<?php } ?>        
			<tr>
				<td colspan="20" align="center"><br /><input type="button" value="Print this page" onclick="docuPrint()"></td>
			</tr>		
	</table></td>
	</tr></table>
<div>
</div>

