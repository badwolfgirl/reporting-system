<table cellpadding="0" cellspacing="0" width="100%" style="font-size:14px;">
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
				<td colspan="2" style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:left;"><h3 style="color: #000000; font-size: 14px; margin:0; padding:5px 0; font-weight: normal;"><?=$sect1h3?></h3></td>
				</tr>
			<tr>
				<td width="25%" style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666;">Recognition Meeting:  </td>
				<td style="border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:right;"><?php if($emailData['recognition_meet'] == 'yes') echo "Meeting Held"; else echo "Meeting Not Held"; ?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666;">Important comments:</td>
				<td style="border-right:1px solid #666666; border-bottom:1px solid #666666; text-align:right;"><?=$emailData['comments']?></td>
			</tr>
			</table></td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td><table cellpadding="10" cellspacing="0" width="100%" style="border:1px solid #666666">
			<tr>
				<td colspan="2" style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:left;"><h3 style="color: #000000; font-size: 14px; margin:0; padding:5px 0; font-weight: normal;"><?=$sect2h3?> for <?=$emailData['tax_year']?></h3></td>
				</tr>
				<tr>
					<td width="25%" style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666;">Royalty:</td>
					<td style="border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:right;">$<?=$emailData['royalty']?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666;">Insurance:</td>
					<td style="border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:right;">$<?=$emailData['insurance']?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666;">Billing &amp; Collections:</td>
					<td style="border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:right;">$<?=$emailData['billcoll']?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666;">Fuel:</td>
					<td style="border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:right;">$<?=$emailData['fuel']?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666;">Mainenance:</td>
					<td style="border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:right;">$<?=$emailData['maintenance']?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666;">Cell Phone:</td>
					<td style="border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:right;">$<?=$emailData['cellphone']?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666;">Offie Phone/Fax:</td>
					<td style="border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:right;">$<?=$emailData['officephone']?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666;">Office Supplies:</td>
					<td style="border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:right;">$<?=$emailData['officesupp']?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666;">Business Meetings:</td>
					<td style="border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:right;">$<?=$emailData['bussmeetings']?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666;">Franchisee Recognition:</td>
					<td style="border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:right;">$<?=$emailData['zeerecognition']?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666;">Advertising Fund:</td>
					<td style="border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:right;">$<?=$emailData['adFund']?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666;">Local Advertising:</td>
					<td style="border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:right;">$<?=$emailData['localAd']?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666;">Licenses &amp; Fees:</td>
					<td style="border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:right;">$<?=$emailData['licensefees']?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666;">Business Taxes:</td>
					<td style="border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:right;">$<?=$emailData['busstax']?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666;">Other Expenses:</td>
					<td style="border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:right;">$<?=$emailData['other']?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; border-right:1px solid #666666; border-bottom:1px solid #666666;">Grand Total:</td>
					<td style="border-right:1px solid #666666; border-bottom:1px solid #666666; text-align:right;">$<?=$emailData['total']?></td>
				</tr>
			</table></td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td><table cellpadding="10" cellspacing="0" width="100%" style="border:1px solid #666666">
			<tr>
				<td colspan="5" style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666; text-align:left;"><h3 style="color: #000000; font-size: 14px; margin:0; padding:5px 0; font-weight: normal;"><?=$sect3h3?></h3></td>
				</tr>
			<tr>
				<td style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666;" colspan="2">&nbsp;</td>
				<td nowrap="nowrap" style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666;">Annual Plan Meeting</td>
				<td nowrap="nowrap" style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666;">Operating Unit Checklist</td>
				<td nowrap="nowrap" style="font-weight:bold; border-bottom:1px solid #666666; border-right:1px solid #666666;">Important comments:</td>
				</tr>
<?php
	if($emailData['frans']){
			foreach($emailData['frans'] as $key => $fran){
	
				if($key % 2 != 0)
					$sty = '_odd';
				else
					$sty = '';
				
?>
			<tr>
				<td width="5%" nowrap="nowrap" style="border-bottom:1px solid #666666; border-right:1px solid #666666; "><?=$areadev[0]->adID.' - '.$fran['franID']?></td>
				<td width="20%" nowrap="nowrap" style="border-bottom:1px solid #666666; border-right:1px solid #666666; "><?=$fran['firstName'].' '.$fran['lastName']?></td>
				<td style="border-bottom:1px solid #666666; border-right:1px solid #666666; "><?php if($fran['meet_attended'] == 'yes') echo "Attended"; else echo "Not Attended"; ?></td>
				<td style="border-bottom:1px solid #666666; border-right:1px solid #666666; "><?php if($fran['unit_check'] == 'yes') echo "Completed"; else echo "Not Completed"; ?></td>
				<td style="border-bottom:1px solid #666666; border-right:1px solid #666666; "><?=urldecode($fran['comments'])?></td>
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
		</table></td>
	</tr>
	</table>
