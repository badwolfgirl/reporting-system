<?php
$date 			= date($this->uri->segment(6).'-'.$this->uri->segment(5).'-01');
$lastMonth 	= strtotime ( '-1 month' , strtotime ( $date ) ) ;
$nextMonth 	= strtotime ( '+1 month' , strtotime ( $date ) ) ;
?>	
<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
			<tr>
				<td class="lftHeadCol"><h2><?=$mainh2?></h2></td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="font-size:120%; border:1px solid #ccc">
	<tr>
		<td colspan="12" class="lftHeadCol"><h3><?=$sect1h3?></h3></td>
		<td class="rgtHeadCol" colspan="6"><h3>Monthly Sales Total:</h3></td>
		<td class="rgtHeadCol" colspan="1"><h3><strong>$<?php echo number_format($totalSales,2)?></strong></h3></td>
	</tr>
<?php
	if($areadev[0]->billColl2 == 'yes'){
?>
	<tr>
		<td class="rgtHeadCol" colspan="18"><h3>Billing & Collections:</h3></td>
		<td class="rgtHeadCol" colspan="1"><h3>$<?php echo number_format((str_replace(array(',','.00'), '', $totalSales)*2)/100, 2); ?></h3></td>
		</tr>
<?php
	}
	if($areadev[0]->adFund1 == 'yes'){
?>
	<tr>
		<td class="rgtHeadCol" colspan="18"><h3>Ad Fund Royalty:</h3></td>
		<td class="rgtHeadCol" colspan="1"><h3>$<?php echo number_format((str_replace(array(',','.00'), '', $totalSales)*1)/100, 2); ?></h3></td>
		</tr>
<?php
	}
	if($areadev[0]->royalty7 == 'yes'){
?>
	<tr>
		<td class="rgtHeadCol" colspan="18"><h3>Royalty Dues:</h3></td>
		<td class="rgtHeadCol" colspan="1"><h3>$<?php echo number_format((str_replace(array(',','.00'), '', $totalSales)*7)/100, 2); ?></h3></td>
	</tr>
<?php
	}elseif(isset($reports[0]->royaltyDue) && $reports[0]->royaltyDue != '0.00'){
?>
	<tr>
		<td class="rgtHeadCol" colspan="18"><h3>Royalty Dues:</h3></td>
		<td class="rgtHeadCol" colspan="1"><h3>$<?php echo number_format($reports[0]->royaltyDue, 2); ?></h3></td>
	</tr>
<?php
	}
?>
	<tr>
		<td class="lftHeadCol" colspan="7"><h3><?=$sect2h3?></h3></td>
		<td class="centHeadCol" colspan="5"><h4>Service Type</h4></td>
		<td class="centHeadCol" colspan="7"><h4>Customer Type</h4></td>
	</tr>
	<tr>
		<td class="lftHeadCol" colspan="2">Franchisee</td>
		<td class="centHeadCol"># of Units</td>
		<td class="centHeadCol"># of Techs</td>
		<td class="centHeadCol"># of Vehicles<br />Repaired</td>
		<td class="centHeadCol"># of Days<br />Worked</td>
		<td class="centHeadCol"># of Accounts<br />Worked</td>
		<td class="centHeadCol servCol">Paint Sales</td>
		<td class="centHeadCol servCol">PDR Sales</td>
		<td class="centHeadCol servCol">Interior<br />Sales</td>
		<td class="centHeadCol servCol">Other Sales</td>
		<td class="centHeadCol servCol"><span style="font-size:120%">Total</span></td>
		<td class="centHeadCol custCol">Retail</td>
		<td class="centHeadCol custCol">Dealer New</td>
		<td class="centHeadCol custCol">Dealer Used</td>
		<td class="centHeadCol custCol">Dealer<br />Service</td>
		<td class="centHeadCol custCol">Fleet</td>
		<td class="centHeadCol custCol">Other</td>
		<td class="centHeadCol custCol"><span style="font-size:120%">Total</span></td>
	</tr>
	<?php 
	if($reports[0] != false){
	foreach($reports as $key => $report){ 
		if($report->franID == $areadev[0]->franID){
	?>
	<tr class="salesrow">
		<td class="rgtFormCol" colspan="2"><strong><?=$report->firstName.' '.$report->lastName?></strong><br /><?=$report->adID.' - '.$report->franID?></td>
		<td class="rgtFormCol"><?=$report->units?></td>
		<td class="rgtFormCol"><?=$report->techs?></td>
		<td class="rgtFormCol"><?=$report->vehicles_repaired?></td>
		<td class="rgtFormCol"><?=$report->days_worked?></td>
		<td class="rgtFormCol"><?=$report->accounts_worked?></td>
		<td class="rgtFormCol"><?=number_format($report->paint_sales, 2)?></td>
		<td class="rgtFormCol"><?=number_format($report->PDR_sales, 2)?></td>
		<td class="rgtFormCol"><?=number_format($report->interior_sales, 2)?></td>
		<td class="rgtFormCol"><?=number_format($report->other_sales, 2)?></td>
		<td class="rgtFormCol">$<?=number_format($report->service_type_total, 2)?></td>
		<td class="rgtFormCol"><?=number_format($report->retail_dollars, 2)?></td>
		<td class="rgtFormCol"><?=number_format($report->dealer_new_dollars, 2)?></td>
		<td class="rgtFormCol"><?=number_format($report->dealer_used_dollars, 2)?></td>
		<td class="rgtFormCol"><?=number_format($report->dealer_service_dollars, 2)?></td>
		<td class="rgtFormCol"><?=number_format($report->fleet_dollars, 2)?></td>
		<td class="rgtFormCol"><?=number_format($report->other_dollars, 2)?></td>
		<td class="rgtFormCol">$<?=number_format($report->customer_type_total, 2)?></span></td>
	</tr>
	<?php
		}
	}
	foreach($reports as $key => $report){ 
	if($report->franID != $areadev[0]->franID){
		
							if($key % 2 != 0)
								$sty = '_odd';
							else
								$sty = '';
							
		
	?>
	<tr class="salesrow">
		<td class="rgtFormCol<?=$sty?>" colspan="2"><strong><?=$report->firstName.' '.$report->lastName?></strong><br /><?=$report->adID.' - '.$report->franID?></td>
		<td class="rgtFormCol<?=$sty?>"><?=$report->units?></td>
		<td class="rgtFormCol<?=$sty?>"><?=$report->techs?></td>
		<td class="rgtFormCol<?=$sty?>"><?=$report->vehicles_repaired?></td>
		<td class="rgtFormCol<?=$sty?>"><?=$report->days_worked?></td>
		<td class="rgtFormCol<?=$sty?>"><?=$report->accounts_worked?></td>
		<td class="rgtFormCol<?=$sty?>"><?=number_format($report->paint_sales, 2)?></td>
		<td class="rgtFormCol<?=$sty?>"><?=number_format($report->PDR_sales, 2)?></td>
		<td class="rgtFormCol<?=$sty?>"><?=number_format($report->interior_sales, 2)?></td>
		<td class="rgtFormCol<?=$sty?>"><?=number_format($report->other_sales, 2)?></td>
		<td class="rgtFormCol<?=$sty?>">$<?=number_format($report->service_type_total, 2)?></td>
		<td class="rgtFormCol<?=$sty?>"><?=number_format($report->retail_dollars, 2)?></td>
		<td class="rgtFormCol<?=$sty?>"><?=number_format($report->dealer_new_dollars, 2)?></td>
		<td class="rgtFormCol<?=$sty?>"><?=number_format($report->dealer_used_dollars, 2)?></td>
		<td class="rgtFormCol<?=$sty?>"><?=number_format($report->dealer_service_dollars, 2)?></td>
		<td class="rgtFormCol<?=$sty?>"><?=number_format($report->fleet_dollars, 2)?></td>
		<td class="rgtFormCol<?=$sty?>"><?=number_format($report->other_dollars, 2)?></td>
		<td class="rgtFormCol<?=$sty?>">$<?=number_format($report->customer_type_total, 2)?></span></td>
	</tr>
	<?php }
	} ?>          
	<tr>
		<td class="lftFormTTLCol" colspan="2" align="right"><span style="font-size:120%">Totals</span></td>
		<td class="rgtFormTTLCol"><?=$totalUnits?></td>
		<td class="rgtFormTTLCol"><?=$totalTechs?></td>
		<td class="rgtFormTTLCol"><?=$totalVehicles?></td>
		<td class="rgtFormTTLCol"><?=$totalDays?></td>
		<td class="rgtFormTTLCol"><?=$totalAccounts?></td>
		<td class="rgtFormTTLCol">$<?=$totalPaint?></td>
		<td class="rgtFormTTLCol">$<?=$totalPDR?></td>
		<td class="rgtFormTTLCol">$<?=$totalInterior?></td>
		<td class="rgtFormTTLCol">$<?=$totalOtherS?></td>
		<td class="rgtFormTTLCol">$<?=$totalServTtl?></td>
		<td class="rgtFormTTLCol">$<?=$totalRetail?></td>
		<td class="rgtFormTTLCol">$<?=$totalDealNew?></td>
		<td class="rgtFormTTLCol">$<?=$totalDealUsed?></td>
		<td class="rgtFormTTLCol">$<?=$totalDealServ?></td>
		<td class="rgtFormTTLCol">$<?=$totalFleet?></td>
		<td class="rgtFormTTLCol">$<?=$totalOtherC?></td>
		<td class="rgtFormTTLCol">$<?=$totalCustTtl?></td>
	</tr>	
	<?php }else{ ?> 
	<tr>
		<td class="centHeadCol" colspan="20"><h3><?=$reports['msg']?></h3></td>
	</tr>	
	<?php } ?>        
</table></td>
		</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="font-size:120%; border:1px solid #ccc">
	<?php if($notes){?>
	<tr>
		<td class="lftFormCol" colspan="20"><h3>Special Comments Recorded</h3>
			<p><?=$notes?></p></td>
	</tr>
	<?php }?>
		</table></td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
		<tr>
			<td class="centHeadCol" colspan="20">
				<a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_AD_sales/print_report/<?=$areadev[0]->adID?>/<?php echo $this->uri->segment(5).'/'.$this->uri->segment(6)?>" onclick="basicPopup(this.href);return false">
					<img src="<?=$this->config->item('base_url')?>addons/icons/print.png" align="absmiddle" border="0" hspace="5" width="24" /> <span style="font-size:150%">Print Report</span>
				</a>
			</td>
		</tr>	
<?php if($this->session->userdata('adID') == '-1'){ ?>
	<tr>
		<td class="lftHeadCol" colspan="10"><a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_AD_sales/view/<?=$areadev[0]->adID?>/<?=date('m/Y',$lastMonth)?>"><?=date('F',$lastMonth)?>'s Report</a></td>
		<td class="rgtHeadCol" colspan="10"><a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_AD_sales/view/<?=$areadev[0]->adID?>/<?=date('m/Y',$nextMonth)?>"><?=date('F',$nextMonth)?>'s Report</a></td>
	</tr>	
<?php } ?>
		</table></td>
	</tr>
	</table>
<div>
</div>

