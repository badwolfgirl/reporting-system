<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td><table cellpadding="10" cellspacing="0" width="100%" style="border:1px solid #666666">
			<tr>
				<td class="lftGridCol_hd"><h2><?=$mainh2?></h2></td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td><table cellpadding="10" cellspacing="0" width="100%" style="border:1px solid #666666">
			<tr>
				<td class="lftGridCol_hd" colspan="2"><h3><?=$sect1h3?></h3></td>
				</tr>
			<tr>
				<td width="25%" class="lftGridCol">Recognition Meeting:</td>
				<td class="lftGridCol"><?php if($areadev[0]->recognition->recognition_meet == 'yes') echo "Meeting Held"; else echo "Meeting Not Held"; ?></td>
			</tr>
			<tr>
				<td class="lftGridCol">Important comments:</td>
				<td class="lftGridCol"><?=urldecode($areadev[0]->recognition->comments)?></td>
			</tr>
			</table></td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td><table cellpadding="10" cellspacing="0" width="100%" style="border:1px solid #666666">
			<tr>
				<td colspan="2" class="lftGridCol_hd"><h3><?=$sect2h3?></h3></td>
				</tr>
				<tr>
					<td width="25%" class="lftGridCol">Royalty</td>
					<td class="lftGridCol">$<?=$areadev[0]->expenses->royalty?></td>
				</tr>
				<tr>
					<td class="lftGridCol">Insurance</td>
					<td class="lftGridCol">$<?=$areadev[0]->expenses->insurance?></td>
				</tr>
				<tr>
					<td class="lftGridCol">Billing &amp; Collections</td>
					<td class="lftGridCol">$<?=$areadev[0]->expenses->billcoll?></td>
				</tr>
				<tr>
					<td class="lftGridCol">Fuel</td>
					<td class="lftGridCol">$<?=$areadev[0]->expenses->fuel?></td>
				</tr>
				<tr>
					<td class="lftGridCol">Mainenance</td>
					<td class="lftGridCol">$<?=$areadev[0]->expenses->maintenance?></td>
				</tr>
				<tr>
					<td class="lftGridCol">Cell Phone</td>
					<td class="lftGridCol">$<?=$areadev[0]->expenses->cellphone?></td>
				</tr>
				<tr>
					<td class="lftGridCol">Offie Phone/Fax</td>
					<td class="lftGridCol">$<?=$areadev[0]->expenses->officephone?></td>
				</tr>
				<tr>
					<td class="lftGridCol">Office Supplies</td>
					<td class="lftGridCol">$<?=$areadev[0]->expenses->officesupp?></td>
				</tr>
				<tr>
					<td class="lftGridCol">Business Meetings</td>
					<td class="lftGridCol">$<?=$areadev[0]->expenses->bussmeetings?></td>
				</tr>
				<tr>
					<td class="lftGridCol">Franchisee Recognition</td>
					<td class="lftGridCol">$<?=$areadev[0]->expenses->zeerecognition?></td>
				</tr>
				<tr>
					<td class="lftGridCol">Advertising Fund</td>
					<td class="lftGridCol">$<?=$areadev[0]->expenses->adFund?></td>
				</tr>
				<tr>
					<td class="lftGridCol">Local Advertising</td>
					<td class="lftGridCol">$<?=$areadev[0]->expenses->localAd?></td>
				</tr>
				<tr>
					<td class="lftGridCol">Licenses &amp; Fees</td>
					<td class="lftGridCol">$<?=$areadev[0]->expenses->licensefees?></td>
				</tr>
				<tr>
					<td class="lftGridCol">Business Taxes</td>
					<td class="lftGridCol">$<?=$areadev[0]->expenses->busstax?></td>
				</tr>
				<tr>
					<td class="lftGridCol">Other Expenses</td>
					<td class="lftGridCol">$<?=$areadev[0]->expenses->other?></td>
				</tr>
				<tr>
					<td class="lftGridCol">Grand Total</td>
					<td class="lftGridCol">$<?=$areadev[0]->expenses->total?></td>
				</tr>
			</table></td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td><table cellpadding="10" cellspacing="0" width="100%" style="border:1px solid #666666">
			<tr>
				<td class="lftGridCol_hd" colspan="5"><h3><?=$sect3h3?></h3></td>
				</tr>
			<tr>
				<td colspan="2" class="lftGridCol">&nbsp;</td>
				<td class="lftGridCol">Annual Plan Meeting</td>
				<td class="lftGridCol">Operating Unit Checklist</td>
				<td class="lftGridCol">Important comments:</td>
				</tr>
<?php
	if($areadev[0]->frans){
			foreach($areadev[0]->frans as $key => $fran){
?>
			<tr>
				<td width="5%" nowrap="nowrap" class="lftGridCol"><?=$areadev[0]->adID.' - '.$fran->franID?></td>
				<td width="20%" class="lftGridCol"><?=$fran->firstName.' '.$fran->lastName?></td>
				<td class="lftGridCol"><?php if($fran->meet_attended == 'yes') echo "Attended"; else echo "Not Attended"; ?></td>
				<td class="lftGridCol"><?php if($fran->unit_check == 'yes') echo "Completed"; else echo "Not Completed"; ?></td>
				<td class="lftGridCol"><?=urldecode($fran->comments)?></td>
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
				<td align="center"><table cellpadding="10" cellspacing="0" width="100%" style="border:1px solid #666666">
			<tr>
				<td align="center" class="lftGridCol_hd"><input type="button" value="Print this page" onclick="window.print()"></td>
			</tr>
		</table></td>
	</tr>
	</table>
