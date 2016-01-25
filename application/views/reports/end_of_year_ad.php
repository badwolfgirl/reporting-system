<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="font-size:130%; border:1px solid #ccc">
			<tr>
				<td class="lftHeadCol"><h2><?=$mainh2?></h2></td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="font-size:130%; border:1px solid #ccc">
			<tr>
				<td class="lftHeadCol" colspan="2"><h3><?=$sect1h3?></h3></td>
				</tr>
			<tr>
				<td width="25%" class="lftFormCol">Recognition Meeting:</td>
				<td class="lftFormCol"><?php if($areadev[0]->recognition->recognition_meet == 'yes') echo "Meeting Held"; else echo "Meeting Not Held"; ?></td>
			</tr>
			<tr>
				<td class="lftFormCol">Important comments:</td>
				<td class="lftFormCol"><?=urldecode($areadev[0]->recognition->comments)?></td>
			</tr>
			</table></td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="font-size:130%; border:1px solid #ccc">
			<tr>
				<td colspan="2" class="lftHeadCol"><h3><?=$sect2h3?></h3></td>
				</tr>
				<tr>
					<td width="25%" class="lftHeadCol">Royalty</td>
					<td class="lftFormCol">$<?=$areadev[0]->expenses->royalty?></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Insurance</td>
					<td class="lftFormCol">$<?=$areadev[0]->expenses->insurance?></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Billing &amp; Collections</td>
					<td class="lftFormCol">$<?=$areadev[0]->expenses->billcoll?></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Fuel</td>
					<td class="lftFormCol">$<?=$areadev[0]->expenses->fuel?></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Mainenance</td>
					<td class="lftFormCol">$<?=$areadev[0]->expenses->maintenance?></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Cell Phone</td>
					<td class="lftFormCol">$<?=$areadev[0]->expenses->cellphone?></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Offie Phone/Fax</td>
					<td class="lftFormCol">$<?=$areadev[0]->expenses->officephone?></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Office Supplies</td>
					<td class="lftFormCol">$<?=$areadev[0]->expenses->officesupp?></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Business Meetings</td>
					<td class="lftFormCol">$<?=$areadev[0]->expenses->bussmeetings?></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Franchisee Recognition</td>
					<td class="lftFormCol">$<?=$areadev[0]->expenses->zeerecognition?></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Advertising Fund</td>
					<td class="lftFormCol">$<?=$areadev[0]->expenses->adFund?></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Local Advertising</td>
					<td class="lftFormCol">$<?=$areadev[0]->expenses->localAd?></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Licenses &amp; Fees</td>
					<td class="lftFormCol">$<?=$areadev[0]->expenses->licensefees?></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Business Taxes</td>
					<td class="lftFormCol">$<?=$areadev[0]->expenses->busstax?></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Other Expenses</td>
					<td class="lftFormCol">$<?=$areadev[0]->expenses->other?></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Grand Total</td>
					<td class="lftFormCol">$<?=$areadev[0]->expenses->total?></td>
				</tr>
			</table></td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="font-size:130%; border:1px solid #ccc">
			<tr>
				<td class="lftHeadCol" colspan="5"><h3><?=$sect3h3?></h3></td>
				</tr>
			<tr>
				<td colspan="2" class="lftHeadCol">&nbsp;</td>
				<td class="lftHeadCol">Annual Plan Meeting</td>
				<td class="lftHeadCol">Operating Unit Checklist</td>
				<td class="lftHeadCol"><span class="lftHeadCol">Important comments:</span></td>
				</tr>
<?php
	if($areadev[0]->frans){
			foreach($areadev[0]->frans as $key => $fran){
	
				if($key % 2 != 0)
					$sty = '_odd';
				else
					$sty = '';
				
?>
			<tr>
				<td width="5%" class="lftFormCol<?=$sty?>"><?=$areadev[0]->adID.' - '.$fran->franID?></td>
				<td width="20%" class="lftFormCol<?=$sty?>"><?=$fran->firstName.' '.$fran->lastName?></td>
				<td class="lftFormCol<?=$sty?>"><?php if($fran->meet_attended == 'yes') echo "Attended"; else echo "Not Attended"; ?></td>
				<td class="lftFormCol<?=$sty?>"><?php if($fran->unit_check == 'yes') echo "Completed"; else echo "Not Completed"; ?></td>
				<td class="lftFormCol<?=$sty?>"><?=urldecode($fran->comments)?></td>
				</tr>
<?php 
			} 
	}
?>
        </table></td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
		<tr>
			<td class="centHeadCol"><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
				<tr>
					<td class="centHeadCol"><a href="<?=$this->config->item('base_url')?>index.php/reports/end_of_year/print_report/<?=$areadev[0]->adID?>" onclick="basicPopup(this.href);return false">
					<img src="<?=$this->config->item('base_url')?>addons/icons/print.png" align="absmiddle" border="0" hspace="5" width="24" /> <span style="font-size:150%">Print Report</span>
				</a></td>
				</tr>
			</table></td>
		</tr>	
		</table></td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	</table>
<?php

//echo $this->functions->debug();

?>