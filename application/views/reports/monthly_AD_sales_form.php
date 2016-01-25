<?php
$attributes = array(
	'name' => 'adSales',
	'id' => 'adSales'
); 
$year 			=  date('Y', mktime(0, 0, 0, date("n")  , date("j")-30, date("Y")));
?>

<?=form_open('reports/monthly_AD_sales/create/'.$areadev[0]->adID, $attributes);?>
<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td><table cellpadding="8" cellspacing="2" width="100%" style="border:1px solid #ccc">
			<tr>
				<td class="lftHeadCol">
				<h2><?=$mainh2?> 
						<select name="month" id="month" style="width:150px;">
							<option value="<?=date('m', mktime(0, 0, 0, date("m")-1  , date("d"), date("Y")))?>"><?=date('F', mktime(0, 0, 0, date("m")-1  , date("d"), date("Y")))?></option>
						</select>
						
						<select name="year" id="year" style="width:100px">
							<option value="<?=$year?>"><?=$year;?></option>
						</select></h2>
						</td>
					</tr>
				</table></td>
			</tr>
			<tr>
				<td height="10"></td>
			</tr>
			<tr class="salesForm">
				<td><table cellpadding="8" width="100%" cellspacing="2" style="border:1px solid #ccc;">
					<tr>
						<td colspan="11" class="lftHeadCol"><h3><?=$sect1h3?></h3></td>
						<td class="rgtHeadCol" colspan="8">Monthly Sales Total: $ <input class="ttlMonthlySales totals" name="total_month_sales_dollars" type="text" size="12" value="<?php if(isset($_POST['total_month_sales_dollars'])) echo $_POST['total_month_sales_dollars']; elseif(isset($total_month_sales_dollars)) echo $total_month_sales_dollars; else echo '0'; ?>"  readonly="readonly" style=" color:#666"></td>
					</tr>
					<tr>
						<td valign="top" colspan="11" rowspan="3" class="lftHeadCol"><span style=" font-size:110%; font-weight:normal">
							<p>Please use the form below to fill in your monthly sales. In the first section, please enter in the sales detail. The number of units/vans the Franchisee has, the number of techs that are working for them, the number of vehicles that they worked on, the number of days they worked, and the number of accounts worked on. The second section is for the type of service preformed, Paint, PDR, Interior, or Other. The third section is for the type of customer the jobs were performed for, Retail, Dealers New, Used or Service, Fleet, or Other. The Franchisees total for Service HAS TO MATCH the total for Customer. If they match, you will see <img src="<?=$this->config->item('base_url')?>addons/icons/green-checkmark.png" align="absmiddle" style="width:18px; height:18px" /> at the end of the row.</p>
							<p>When you fill out the fields below, the totals at the top right will generate based on the sales amount. If you do not see a change in the total, try leaving the field you are in by tabbing over or clicking on another field. You can not change the Monthly Sales Total amount! That will calculate based on your entries below.</p>
							<p>If the checkboxes next to a dues amount is checked, then that dues field will calculate based on your entries below as well. If your amount is different, you can uncheck the box to </p>
						</span></td>
						<td colspan="5" class="rgtHeadCol">Billing & Collections<br /><span style="color:#666; font-size:90%; font-weight:normal">(Checkbox checked for auto calculation)</span></td>
						<td class="rgtHeadCol">2% <input type="checkbox" name="bcOn" id="bcOn" <?php if($areadev[0]->billColl2 == 'yes') echo ' checked="checked"'; ?>></td>
						<td class="rgtHeadCol" colspan="2"><input class="billCollects dues" name="billCollects" type="text" size="12" <?php if($areadev[0]->billColl2 == 'yes') echo ' readonly="readonly" style=" color:#666"'; ?> value="<?php if(isset($_POST['billCollects'])) echo $_POST['billCollects']; elseif(isset($billCollects)) echo $billCollects; else echo '0'; ?>"></td>
					</tr>
					<tr>
						<td colspan="5" class="rgtHeadCol">Ad Fund Royalty<br /><span style="color:#666; font-size:90%; font-weight:normal">(Checkbox checked for auto calculation)</span></td>
						<td class="rgtHeadCol">1% <input type="checkbox" name="adfOn" id="adfOn" <?php if($areadev[0]->adFund1 == 'yes') echo ' checked="checked"'; ?>></td>
						<td class="rgtHeadCol" colspan="2"><input class="adFundRoyalty dues" name="adFundRoyalty" type="text" size="12" <?php if($areadev[0]->adFund1 == 'yes') echo ' readonly="readonly"  style="color:#666"'; ?> value="<?php if(isset($_POST['adFundRoyalty'])) echo $_POST['adFundRoyalty']; elseif(isset($adFundRoyalty)) echo $adFundRoyalty; else echo '0'; ?>"></td>
					</tr>
					<tr>
						<td colspan="5" class="rgtHeadCol">Royalty Dues<br /><span style="color:#666; font-size:90%; font-weight:normal">(Checkbox checked for auto calculation)</span></td>
						<td class="rgtHeadCol">7% <input type="checkbox" name="royOn" id="royOn" <?php if($areadev[0]->royalty7 == 'yes') echo ' checked="checked"'; ?>></td>
						<td class="rgtHeadCol" colspan="2"><input class="royaltyDue dues" name="royaltyDue" type="text" size="12" <?php if($areadev[0]->royalty7 == 'yes') echo ' readonly="readonly" style="color:#666"'; ?> value="<?php if(isset($_POST['royaltyDue'])) echo $_POST['royaltyDue']; elseif(isset($royaltyDue)) echo $royaltyDue; else echo '0'; ?>"></td>
					</tr>
<?php					
	if($this->session->userdata('type') != 0){
?>					
					<tr>
						<td colspan="11" class="rgtHeadCol">&nbsp;</td>
						<td colspan="5" class="rgtHeadCol">Total Dues</td>
						<td class="rgtHeadCol">&nbsp;</td>
						<td class="rgtHeadCol" colspan="2"><input class="ttlDues totals" name="total_dues" type="text" size="12"   readonly="readonly" style=" color:#666" value="<?php if(isset($_POST['total_dues'])) echo $_POST['total_dues']; elseif(isset($total_dues)) echo $total_dues; else echo '0'; ?>"></td>
					</tr>
<?php					
	}else{
		if(isset($_POST['total_dues'])) $ttldues = $_POST['total_dues']; elseif(isset($total_dues)) $ttldues = $total_dues; else $ttldues = '0';
		echo '<input class="ttlDues" name="total_dues" type="hidden" value="'.$ttldues.'">';
	}
?>					
					<tr>
						<td class="lftHeadCol" colspan="6"><h3><?=$sect2h3?></h3></td>
						<td class="centHeadCol" colspan="5"><h4>Service Type<!-- <span style="font-size:80%">(No $ or commas needed!)</span>--></h4></td>
						<td class="centHeadCol" colspan="7"><h4>Customer Type<!--  <span style="font-size:80%">(No $ or commas needed!)</span>--></h4></td>
						<td class="centHeadCol" width="50"></td>
					</tr>
					<tr>
						<td class="lftHeadCol">Franchisee</td>
						<td class="centHeadCol">Total #<br />of Units</td>
						<td class="centHeadCol"># of<br />Techs</td>
						<td class="centHeadCol"># of<br />Vehicles<br />Repaired</td>
						<td class="centHeadCol"># of<br />Days<br />Worked</td>
						<td class="centHeadCol"># of<br />Accounts<br />Worked</td>
						<td class="centHeadCol servCol">Paint<br />Sales</td>
						<td class="centHeadCol servCol">PDR<br />Sales</td>
						<td class="centHeadCol servCol">Interior<br />Sales</td>
						<td class="centHeadCol servCol">Other<br />Sales</td>
						<td class="centHeadCol servCol" style="background-color:#e8f0ff"><span style="font-size:120%">Total</span></td>
						<td class="centHeadCol custCol">Retail</td>
						<td class="centHeadCol custCol">Dealer<br />New</td>
						<td class="centHeadCol custCol">Dealer<br />Used</td>
						<td class="centHeadCol custCol">Dealer<br />Service</td>
						<td class="centHeadCol custCol">Fleet</td>
						<td class="centHeadCol custCol">Other</td>
						<td class="centHeadCol custCol" style="background-color:#ffffe9"><span style="font-size:120%">Total</span></td>
						<td class="centHeadCol diffCol">(Difference)</td>
					</tr>
					<?php 
					if($franAD){
						foreach($franAD as $key => $fAD){ 
						
							/*if(isset($fAD->sales) && $fAD->sales != 0){
								$totalUnits 						=  $totalUnits+$fAD->units;
								$totalTechs 						=  $totalTechs+$fAD->techs;
								$totalVehicles 					=  $totalVehicles+$fAD->vehicles_repaired;
								$totalDays 							=  $totalDays+$fAD->days_worked;
								$totalAccounts 					=  $totalAccounts+$fAD->accounts_worked;
							}*/
					?>
					<tr class="salesrow">
						<td class="lftFormCol"><strong><?=$fAD->firstName.' '.$fAD->lastName?></strong><br /><?=$areadev[0]->adID.' - '.$fAD->franID?>
							<input name="frans[<?=$key?>][firstName]" type="hidden" value="<?=$fAD->firstName?>">
							<input name="frans[<?=$key?>][lastName]" type="hidden" value="<?=$fAD->lastName?>">
							<input name="frans[<?=$key?>][franID]" type="hidden" value="<?=$fAD->franID?>">
						</td>
						<td class="centFormCol"><input name="frans[<?=$key?>][units]" class="units" type="text" size="4" maxlength="1" value="<?php if(isset($_POST['frans'][$key]['units'])) echo $_POST['frans'][$key]['units']; elseif(isset($fAD->units)) echo $fAD->units; else echo '0'; ?>" title="# of Units"></td>
						<td class="centFormCol"><input name="frans[<?=$key?>][techs]" class="techs" type="text" size="4" value="<?php if(isset($_POST['frans'][$key]['techs'])) echo $_POST['frans'][$key]['techs']; elseif(isset($fAD->techs)) echo $fAD->techs; else echo '0'; ?>" title="# of Techs"></td>
						<td class="centFormCol"><input name="frans[<?=$key?>][vehicles_repaired]" class="vehRepairs" type="text" size="4" value="<?php if(isset($_POST['frans'][$key]['vehicles_repaired'])) echo $_POST['frans'][$key]['vehicles_repaired']; elseif(isset($fAD->vehicles_repaired)) echo $fAD->vehicles_repaired; else echo '0'; ?>" title="# of Vehiles Repaired"></td>
						<td class="centFormCol"><input name="frans[<?=$key?>][days_worked]" class="daysWrkd" type="text" size="4" value="<?php if(isset($_POST['frans'][$key]['days_worked'])) echo $_POST['frans'][$key]['days_worked']; elseif(isset($fAD->days_worked)) echo $fAD->days_worked; else echo '0'; ?>" title="# of Days Worked"></td>
						<td class="centFormCol"><input name="frans[<?=$key?>][accounts_worked]" class="accountsWrkd" type="text" size="4" value="<?php if(isset($_POST['frans'][$key]['accounts_worked'])) echo $_POST['frans'][$key]['accounts_worked']; elseif(isset($fAD->accounts_worked)) echo $fAD->accounts_worked; else echo '0'; ?>" title="# of Accounts Worked"></td>
						<td class="centFormCol"><input name="frans[<?=$key?>][paint_sales]" class="paintSales serv" type="text" size="8" value="<?php if(isset($_POST['frans'][$key]['paint_sales'])) echo $_POST['frans'][$key]['paint_sales']; elseif(isset($fAD->paint_sales)) echo $fAD->paint_sales;  else echo '0'; ?>" title="Paint Sales"></td>
						<td class="centFormCol"><input name="frans[<?=$key?>][PDR_sales]" class="pdrSales serv" type="text" size="8" value="<?php if(isset($_POST['frans'][$key]['PDR_sales'])) echo $_POST['frans'][$key]['PDR_sales']; elseif(isset($fAD->PDR_sales)) echo $fAD->PDR_sales;  else echo '0'; ?>" title="PDR Sales"></td>
						<td class="centFormCol"><input name="frans[<?=$key?>][interior_sales]" class="interiorSales serv" type="text" size="8" value="<?php if(isset($_POST['frans'][$key]['interior_sales'])) echo $_POST['frans'][$key]['interior_sales']; elseif(isset($fAD->interior_sales)) echo $fAD->interior_sales; else echo '0'; ?>" title="Interior Sales"></td>
						<td class="centFormCol"><input name="frans[<?=$key?>][other_sales]" class="otherSales serv" type="text" size="8" value="<?php if(isset($_POST['frans'][$key]['other_sales'])) echo $_POST['frans'][$key]['other_sales']; elseif(isset($fAD->other_sales)) echo $fAD->other_sales; else echo '0'; ?>" title="Other Sales"></td>
						<td class="centFormCol"><input name="frans[<?=$key?>][service_type_total]" class="addedServ" type="text" size="8"  readonly="readonly" style=" color:#666" value="<?php if(isset($_POST['frans'][$key]['service_type_total'])) echo $_POST['frans'][$key]['service_type_total']; elseif(isset($fAD->service_type_total)) echo $fAD->service_type_total; else echo '0'; ?>"></td>
						<td class="centFormCol"><input name="frans[<?=$key?>][retail_dollars]" class="retail cust" type="text" size="8" value="<?php if(isset($_POST['frans'][$key]['retail_dollars'])) echo $_POST['frans'][$key]['retail_dollars']; elseif(isset($fAD->retail_dollars)) echo $fAD->retail_dollars; else echo '0'; ?>" title="Retail"></td>
						<td class="centFormCol"><input name="frans[<?=$key?>][dealer_new_dollars]" class="dealerNew cust" type="text" size="8" value="<?php if(isset($_POST['frans'][$key]['dealer_new_dollars'])) echo $_POST['frans'][$key]['dealer_new_dollars']; elseif(isset($fAD->dealer_new_dollars)) echo $fAD->dealer_new_dollars; else echo '0'; ?>" title="Dealer New"></td>
						<td class="centFormCol"><input name="frans[<?=$key?>][dealer_used_dollars]" class="dealerUsed cust" type="text" size="8" value="<?php if(isset($_POST['frans'][$key]['dealer_used_dollars'])) echo $_POST['frans'][$key]['dealer_used_dollars']; elseif(isset($fAD->dealer_used_dollars)) echo $fAD->dealer_used_dollars; else echo '0'; ?>" title="Dealer Used"></td>
						<td class="centFormCol"><input name="frans[<?=$key?>][dealer_service_dollars]" class="dealerServ cust" type="text" size="8" value="<?php if(isset($_POST['frans'][$key]['dealer_service_dollars'])) echo $_POST['frans'][$key]['dealer_service_dollars']; elseif(isset($fAD->dealer_service_dollars)) echo $fAD->dealer_service_dollars; else echo '0'; ?>" title="Dealer Service"></td>
						<td class="centFormCol"><input name="frans[<?=$key?>][fleet_dollars]" class="fleet cust" type="text" size="8" value="<?php if(isset($_POST['frans'][$key]['fleet_dollars'])) echo $_POST['frans'][$key]['fleet_dollars']; elseif(isset($fAD->fleet_dollars)) echo $fAD->fleet_dollars; else echo '0'; ?>" title="Fleet"></td>
						<td class="centFormCol"><input name="frans[<?=$key?>][other_dollars]" class="other cust" type="text" size="8" value="<?php if(isset($_POST['frans'][$key]['other_dollars'])) echo $_POST['frans'][$key]['other_dollars']; elseif(isset($fAD->other_dollars)) echo $fAD->other_dollars; else echo '0'; ?>" title="Other"></td>
						<td class="centFormCol"><input name="frans[<?=$key?>][customer_type_total]" class="addedCust" type="text" size="8"  readonly="readonly" style=" color:#666" value="<?php if(isset($_POST['frans'][$key]['customer_type_total'])) echo $_POST['frans'][$key]['customer_type_total']; elseif(isset($fAD->customer_type_total)) echo $fAD->customer_type_total; else echo '0'; ?>"></td>
						<td class="centFormCol" align="center">
							<span class="rowMatchMsg" style="font-weight:bold"></span>
							<input name="frans[<?=$key?>][matches]" class="matched" type="hidden">
						</td>	
					</tr>
					<?php 
						}
					}
					//if($franchisees){
						if(isset($key))
							$newKey = $key+1;
						else
							$newKey = 1;
							
						foreach($franchisees as $key => $fran){ 
						
							/*if(isset($fran->sales) && $fran->sales != 0){
								$totalUnits 						=  $totalUnits+$fran->units;
								$totalTechs 						=  $totalTechs+$fran->techs;
								$totalVehicles 					=  $totalVehicles+$fran->vehicles_repaired;
								$totalDays 							=  $totalDays+$fran->days_worked;
								$totalAccounts 					=  $totalAccounts+$fran->accounts_worked;
							}*/
						
							if($newKey % 2 != 0)
								$sty = '_odd';
							else
								$sty = '';
							
						
						?>
					<tr class="salesrow">
						<td class="lftFormCol<?=$sty?>"><strong><?=$fran->firstName.' '.$fran->lastName?></strong><br /><?=$areadev[0]->adID.' - '.$fran->franID?>
							<input name="frans[<?=$newKey?>][firstName]" type="hidden" value="<?=$fran->firstName?>">
							<input name="frans[<?=$newKey?>][lastName]" type="hidden" value="<?=$fran->lastName?>">
							<input name="frans[<?=$newKey?>][franID]" type="hidden" size="8" value="<?=$fran->franID?>">
						</td>
						<td class="centFormCol<?=$sty?>"><input name="frans[<?=$newKey?>][units]" class="units" type="text" size="4" maxlength="1" value="<?php if(isset($_POST['frans'][$key]['units'])) echo $_POST['frans'][$key]['units']; elseif(isset($fran->units)) echo $fran->units; else echo '0'; ?>" title="# of Units"></td>
						<td class="centFormCol<?=$sty?>"><input name="frans[<?=$newKey?>][techs]" class="techs" type="text" size="4" value="<?php if(isset($_POST['frans'][$key]['techs'])) echo $_POST['frans'][$key]['techs']; elseif(isset($fran->techs)) echo $fran->techs; else echo '0'; ?>"  title="# of Techs"/></td>
						<td class="centFormCol<?=$sty?>"><input name="frans[<?=$newKey?>][vehicles_repaired]" class="vehRepairs" type="text" size="4" value="<?php if(isset($_POST['frans'][$key]['vehicles_repaired'])) echo $_POST['frans'][$key]['vehicles_repaired']; elseif(isset($fran->vehicles_repaired)) echo $fran->vehicles_repaired; else echo '0'; ?>" title="# of Vehicles Repaired"></td>
						<td class="centFormCol<?=$sty?>"><input name="frans[<?=$newKey?>][days_worked]" class="daysWrkd" type="text" size="4" value="<?php if(isset($_POST['frans'][$key]['days_worked'])) echo $_POST['frans'][$key]['days_worked']; elseif(isset($fran->days_worked)) echo $fran->days_worked; else echo '0'; ?>" title="# of Days Worked"></td>
						<td class="centFormCol<?=$sty?>"><input name="frans[<?=$newKey?>][accounts_worked]" class="accountsWrkd" type="text" size="4" value="<?php if(isset($_POST['frans'][$key]['accounts_worked'])) echo $_POST['frans'][$key]['accounts_worked']; elseif(isset($fran->accounts_worked)) echo $fran->accounts_worked; else echo '0'; ?>" title="# of Accounts Worked"></td>
						<td class="centFormCol<?=$sty?>"><input name="frans[<?=$newKey?>][paint_sales]" class="paintSales serv" type="text" size="8" value="<?php if(isset($_POST['frans'][$key]['paint_sales'])) echo $_POST['frans'][$key]['paint_sales']; elseif(isset($fran->paint_sales)) echo $fran->paint_sales; else echo '0'; ?>" title="Paint Sales"></td>
						<td class="centFormCol<?=$sty?>"><input name="frans[<?=$newKey?>][PDR_sales]" class="pdrSales serv" type="text" size="8" value="<?php if(isset($_POST['frans'][$key]['PDR_sales'])) echo $_POST['frans'][$key]['PDR_sales']; elseif(isset($fran->PDR_sales)) echo $fran->PDR_sales; else echo '0'; ?>" title="PDR Sales"></td>
						<td class="centFormCol<?=$sty?>"><input name="frans[<?=$newKey?>][interior_sales]" class="interiorSales serv" type="text" size="8" value="<?php if(isset($_POST['frans'][$key]['interior_sales'])) echo $_POST['frans'][$key]['interior_sales']; elseif(isset($fran->interior_sales)) echo $fran->interior_sales; else echo '0'; ?>" title="Interior Sales"></td>
						<td class="centFormCol<?=$sty?>"><input name="frans[<?=$newKey?>][other_sales]" class="otherSales serv" type="text" size="8" value="<?php if(isset($_POST['frans'][$key]['other_sales'])) echo $_POST['frans'][$key]['other_sales']; elseif(isset($fran->other_sales)) echo $fran->other_sales; else echo '0'; ?>" title="Other Sales"></td>
						<td class="centFormCol<?=$sty?>"><input name="frans[<?=$newKey?>][service_type_total]" class="addedServ" type="text" size="8"  readonly="readonly" style=" color:#666" value="<?php if(isset($_POST['frans'][$key]['service_type_total'])) echo $_POST['frans'][$key]['service_type_total']; elseif(isset($fran->service_type_total)) echo $fran->service_type_total; else echo '0'; ?>"></td>
						<td class="centFormCol<?=$sty?>"><input name="frans[<?=$newKey?>][retail_dollars]" class="retail cust" type="text" size="8" value="<?php if(isset($_POST['frans'][$key]['retail_dollars'])) echo $_POST['frans'][$key]['retail_dollars']; elseif(isset($fran->retail_dollars)) echo $fran->retail_dollars; else echo '0'; ?>" title="Retail"></td>
						<td class="centFormCol<?=$sty?>"><input name="frans[<?=$newKey?>][dealer_new_dollars]" class="dealerNew cust" type="text" size="8" value="<?php if(isset($_POST['frans'][$key]['dealer_new_dollars'])) echo $_POST['frans'][$key]['dealer_new_dollars']; elseif(isset($fran->dealer_new_dollars)) echo $fran->dealer_new_dollars; else echo '0'; ?>" title="Dealer New"></td>
						<td class="centFormCol<?=$sty?>"><input name="frans[<?=$newKey?>][dealer_used_dollars]" class="dealerUsed cust" type="text" size="8" value="<?php if(isset($_POST['frans'][$key]['dealer_used_dollars'])) echo $_POST['frans'][$key]['dealer_used_dollars']; elseif(isset($fran->dealer_used_dollars)) echo $fran->dealer_used_dollars; else echo '0'; ?>" title="Dealer Used"></td>
						<td class="centFormCol<?=$sty?>"><input name="frans[<?=$newKey?>][dealer_service_dollars]" class="dealerServ cust" type="text" size="8" value="<?php if(isset($_POST['frans'][$key]['dealer_service_dollars'])) echo $_POST['frans'][$key]['dealer_service_dollars']; elseif(isset($fran->dealer_service_dollars)) echo $fran->dealer_service_dollars; else echo '0'; ?>" title="Dealer Service"></td>
						<td class="centFormCol<?=$sty?>"><input name="frans[<?=$newKey?>][fleet_dollars]" class="fleet cust" type="text" size="8" value="<?php if(isset($_POST['frans'][$key]['fleet_dollars'])) echo $_POST['frans'][$key]['fleet_dollars']; elseif(isset($fran->fleet_dollars)) echo $fran->fleet_dollars; else echo '0'; ?>" title="Fleet"></td>
						<td class="centFormCol<?=$sty?>"><input name="frans[<?=$newKey?>][other_dollars]" class="other cust" type="text" size="8" value="<?php if(isset($_POST['frans'][$key]['other_dollars'])) echo $_POST['frans'][$key]['other_dollars']; elseif(isset($fran->other_dollars)) echo $fran->other_dollars; else echo '0'; ?>" title="Other"></td>
						<td class="centFormCol<?=$sty?>"><input name="frans[<?=$newKey?>][customer_type_total]" class="addedCust" type="text" size="8"  readonly="readonly" style=" color:#666" value="<?php if(isset($_POST['frans'][$key]['customer_type_total'])) echo $_POST['frans'][$key]['customer_type_total']; elseif(isset($fran->customer_type_total)) echo $fran->customer_type_total; else echo '0'; ?>"></td>
						<td class="centFormCol<?=$sty?>" align="center">
							<span class="rowMatchMsg" style="font-weight:bold"></span>
							<input name="frans[<?=$newKey?>][matches]" class="matched" type="hidden">
						</td>	
					</tr>
					<?php
							$newKey++;
						}
					//} 
					?>          
					<tr class="totalsrow">
						<td align="right" class="lftHeadTTLCol" style="background-color:#f6f6f6;"><span style="font-size:120%">Totals</span></td>
						<td class="centFormTTLCol"><input class="units_ttl" name="ttlUnits" type="text" size="4" readonly="readonly" style=" color:#666" value="<?php if(isset($_POST['ttlUnits'])) echo $_POST['ttlUnits']; elseif(isset($totalUnits)) echo $totalUnits; else echo '0'; ?>"></td>
						<td class="centFormTTLCol"><input class="techs_ttl" name="ttlTechs" type="text" size="4"  readonly="readonly" style=" color:#666" value="<?php if(isset($_POST['ttlTechs'])) echo $_POST['ttlTechs']; elseif(isset($totalTechs)) echo $totalTechs; else echo '0'; ?>"></td>
						<td class="centFormTTLCol"><input class="vehRepairs_ttl" name="ttlVehRepairs" type="text" size="4" readonly="readonly" style=" color:#666" value="<?php if(isset($_POST['ttlVehRepairs'])) echo $_POST['ttlVehRepairs']; elseif(isset($totalVehicles)) echo $totalVehicles; else echo '0'; ?>"></td>
						<td class="centFormTTLCol"><input class="daysWrkd_ttl" name="ttlDaysWrkd" type="text" size="4" readonly="readonly" style=" color:#666" value="<?php if(isset($_POST['ttlDaysWrkd'])) echo $_POST['ttlDaysWrkd']; elseif(isset($totalDays)) echo $totalDays; else echo '0'; ?>"></td>
						<td class="centFormTTLCol"><input class="accountsWrkd_ttl" name="ttlAccountsWrkd" type="text" size="4" readonly="readonly" style=" color:#666" value="<?php if(isset($_POST['ttlAccountsWrkd'])) echo $_POST['ttlAccountsWrkd']; elseif(isset($totalAccounts)) echo $totalAccounts; else echo '0'; ?>"></td>
						<td class="centFormTTLCol"><input class="paintSales_ttl " name="ttlPaintSales" type="text" size="8"  readonly="readonly" style=" color:#666" value="<?php if(isset($_POST['ttlPaintSales'])) echo $_POST['ttlPaintSales']; elseif(isset($totalPaint)) echo $totalPaint; else echo '0'; ?>"></td>
						<td class="centFormTTLCol"><input class="pdrSales_ttl " name="ttlPdrSales" type="text" size="8"  readonly="readonly" style=" color:#666" value="<?php if(isset($_POST['ttlPdrSales'])) echo $_POST['ttlPdrSales']; elseif(isset($totalPDR)) echo $totalPDR; else echo '0'; ?>"></td>
						<td class="centFormTTLCol"><input class="interiorSales_ttl " name="ttlInteriorSales" type="text" size="8"  readonly="readonly" style=" color:#666" value="<?php if(isset($_POST['ttlInteriorSales'])) echo $_POST['ttlInteriorSales']; elseif(isset($totalInterior)) echo $totalInterior; else echo '0'; ?>"></td>
						<td class="centFormTTLCol"><input class="otherSales_ttl " name="ttlOtherSales" type="text" size="8"  readonly="readonly" style=" color:#666" value="<?php if(isset($_POST['ttlOtherSales'])) echo $_POST['ttlOtherSales']; elseif(isset($totalOtherS)) echo $totalOtherS; else echo '0'; ?>"></td>
						<td class="centFormTTLCol"><input class="ttlAddedService " name="ttlAddedService" type="text" size="8"  readonly="readonly" style=" color:#666" value="<?php if(isset($_POST['ttlAddedService'])) echo $_POST['ttlAddedService']; elseif(isset($totalServTtl)) echo $totalServTtl; else echo '0'; ?>"></td>
						<td class="centFormTTLCol"><input class="retail_ttl " name="ttlRetail" type="text" size="8"  readonly="readonly" style=" color:#666" value="<?php if(isset($_POST['ttlRetail'])) echo $_POST['ttlRetail']; elseif(isset($totalRetail)) echo $totalRetail; else echo '0'; ?>"></td>
						<td class="centFormTTLCol"><input class="dealerNew_ttl " name="ttlDealerNew" type="text" size="8"  readonly="readonly" style=" color:#666" value="<?php if(isset($_POST['ttlDealerNew'])) echo $_POST['ttlDealerNew']; elseif(isset($totalDealNew)) echo $totalDealNew; else echo '0'; ?>"></td>
						<td class="centFormTTLCol"><input class="dealerUsed_ttl " name="ttlDealerUsed" type="text" size="8"  readonly="readonly" style=" color:#666" value="<?php if(isset($_POST['ttlDealerUsed'])) echo $_POST['ttlDealerUsed']; elseif(isset($totalDealUsed)) echo $totalDealUsed; else echo '0'; ?>"></td>
						<td class="centFormTTLCol"><input class="dealerServ_ttl " name="ttlDealerServ" type="text" size="8"  readonly="readonly" style=" color:#666" value="<?php if(isset($_POST['ttlDealerServ'])) echo $_POST['ttlDealerServ']; elseif(isset($totalDealServ)) echo $totalDealServ; else echo '0'; ?>"></td>
						<td class="centFormTTLCol"><input class="fleet_ttl " name="ttlFleet" type="text" size="8"  readonly="readonly" style=" color:#666" value="<?php if(isset($_POST['ttlFleet'])) echo $_POST['ttlFleet']; elseif(isset($totalFleet)) echo $totalFleet; else echo '0'; ?>"></td>
						<td class="centFormTTLCol"><input class="other_ttl " name="ttlOther" type="text" size="8"  readonly="readonly" style=" color:#666" value="<?php if(isset($_POST['ttlOther'])) echo $_POST['ttlOther']; elseif(isset($totalOtherC)) echo $totalOtherC; else echo '0'; ?>"></td>
						<td class="centFormTTLCol"><input class="ttlAddedCustomer" name="ttlAddedCustomer" type="text" size="8"  readonly="readonly" style=" color:#666" value="<?php if(isset($_POST['ttlAddedCustomer'])) echo $_POST['ttlAddedCustomer']; elseif(isset($totalCustTtl)) echo $totalCustTtl; else echo '0'; ?>"></td>
						<td class="centFormTTLCol"><span class="ttlMatchMsg"></span></td>	
					</tr>	
			</table></td>
		</tr>
		<tr>
			<td height="10"></td>
		</tr>
		<tr>
			<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
				<tr>
					<td class="lftFormCol"><h3>Enter your email(s) if you would like a confirmation: <span style="font-size:80%;">(Please enter valid emails. They will be saved for next month!)</span></h3> <input name="emailTags" id="emails" value="" size="60"></td>
				</tr>
				<tr>
					<td class="lftFormCol"><h3>Special comments for email here:</h3><textarea name="comments" style="width:99%;" rows="2"></textarea></td>
				</tr>
				<tr>
					<td class="lftFormCol"><div class="note"><p><strong>Note: </strong> New Techs should not begin training until they have SIGNED a franchise agreement or an employee non-competition agreement. <br /> Include employee sales in their franchisee/employer sales.</p></div>
						<div class="buttons">
							<input name="reset" type="button" onClick="window.location.href=window.location.href" value="Reset" />&nbsp;&nbsp;|&nbsp;&nbsp;
							<input type="submit" name="action" value="Save Form" />&nbsp;&nbsp;|&nbsp;&nbsp;
							<input type="submit" name="action" value="<?=$button?>" />
							<input type="hidden" value="<?=$action?>" name="adSalesSubmit" /><input type="hidden" value="<?=$areadev[0]->adID?>" name="adID" /></div>
						<div style="clear:both;"></div></td>
				</tr>
			</table></td>
		</tr>
	</table>
</form>
<?php
//echo $this->functions->debug();