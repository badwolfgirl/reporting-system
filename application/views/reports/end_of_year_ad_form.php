<?php
$attributes = array(
	'name'	=> 'eoy_AD',
	'id' 		=> 'eoy_AD'
);

$lastyear 			=  date("Y",strtotime("-1 year"));
$prevyear 			=  date("Y",strtotime("-2 year"));


?>

<?=form_open('reports/end_of_year/create_AD/'.$areadev[0]->adID, $attributes);?>
<input name="adID" type="hidden" size="6" maxlength="6" value="<?=$areadev[0]->adID?>">
<input name="franID" type="hidden" size="6" maxlength="6" value="<?=$areadev[0]->franID?>">
<input name="year" type="hidden" size="6" maxlength="6" value="<?=$lastyear?>">
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
		<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
			<tr>
				<td class="lftHeadCol" colspan="2"><h3><?=$sect1h3?></h3></td>
				</tr>
			<tr>
				<td width="25%" class="lftHeadCol">Recognition Meeting Held?</td>
				<td class="lftFormCol">				
        	<input type="radio" name="recognition_meet" value="yes" <?php 
						if((isset($_POST['recognition_meet']) && $_POST['recognition_meet'] == 'yes') || 
						(isset($yer_saves[0]->recognition_meet) && $yer_saves[0]->recognition_meet == 'yes')) echo 'checked="checked"';
						?> id="recognition_meet_1"> Yes&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" name="recognition_meet" value="no" <?php 
						if((isset($_POST['recognition_meet']) && $_POST['recognition_meet'] == 'no') || 
						(isset($yer_saves[0]->recognition_meet) && $yer_saves[0]->recognition_meet == 'no') || 
						(isset($yer_saves[0]->saved) && $yer_saves[0]->saved == 0)) echo 'checked="checked"';
						 ?> id="recognition_meet_0"> No
				</td>
			</tr>
			<tr>
				<td class="lftHeadCol">Important comments:</td>
				<td class="lftFormCol"><textarea name="comments" style="width:100%" rows="2"><?php
					if(isset($_POST['comments'])) echo $_POST['comments']; 
					elseif(isset($yer_saves[0]->comments)) echo urldecode($yer_saves[0]->comments); 			
				?></textarea></td>
			</tr>
			</table></td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr class="endyrForm">
		<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
			<tr>
				<td colspan="2" class="lftHeadCol"><h3><?=$sect2h3?> </h3>
				<span style="font-size:120%; font-weight:normal; color:#666">If you have completed the <?=$prevyear?> Area Operating Expenses, please select <?=$prevyear?> before submitting the form.
				</span></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Tax Year</td>
					<td class="lftFormCol"><select id="tax_year" name="tax_year">
					<option disabled="disabled">----------------------</option>
					<option value="<?=$prevyear?>" <?php 
						if((isset($_POST['year']) && $_POST['year'] == $prevyear) || 
						(isset($yee_saves[0]->year) && $yee_saves[0]->year == $prevyear)) echo 'selected="selected"'; ?>><?=$prevyear?></option>
					<option value="<?=$lastyear?>" <?php 
						if(isset($yee_saves[0]->saved) && $yee_saves[0]->saved == 0) echo 'selected="selected"';
						if((isset($_POST['year']) && $_POST['year'] == $lastyear) || 
						(isset($yee_saves[0]->year) && $yee_saves[0]->year == $lastyear)) echo 'selected="selected"'; ?>><?=$lastyear?></option>
				</select></td>
				</tr>
				<tr>
					<td width="25%" class="lftHeadCol">Royalty</td>
					<td class="lftFormCol">$
						<input class="expense add" name="royalty" id="royalty" value="<?php
							if(isset($yee_saves[0]->royalty)) echo $yee_saves[0]->royalty;
							elseif(isset($_POST['royalty'])) echo $_POST['royalty']; 
							else echo '0'; 
							?>" size="35"></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Insurance</td>
					<td class="lftFormCol">$
						<input class="expense add" name="insurance" id="insurance" value="<?php 
							if(isset($yee_saves[0]->insurance)) echo $yee_saves[0]->insurance;
							elseif(isset($_POST['insurance'])) echo $_POST['insurance']; 
							else echo '0'; ?>" size="35"></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Billing &amp; Collections</td>
					<td class="lftFormCol">$
						<input class="expense add" name="billcoll" id="billcoll" value="<?php 
							if(isset($yee_saves[0]->billcoll)) echo $yee_saves[0]->billcoll;
							elseif(isset($_POST['billcoll'])) echo $_POST['billcoll']; 
							else echo '0'; ?>" size="35"></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Fuel</td>
					<td class="lftFormCol">$
						<input class="expense add" name="fuel" id="fuel" value="<?php 
							if(isset($yee_saves[0]->fuel)) echo $yee_saves[0]->fuel;
							elseif(isset($_POST['fuel'])) echo $_POST['fuel']; 
							else echo '0'; ?>" size="35"></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Mainenance</td>
					<td class="lftFormCol">$
						<input class="expense add" name="maintenance" id="maintenance" value="<?php 
							if(isset($yee_saves[0]->maintenance)) echo $yee_saves[0]->maintenance;
							elseif(isset($_POST['maintenance'])) echo $_POST['maintenance']; 
							else echo '0'; ?>" size="35"></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Cell Phone</td>
					<td class="lftFormCol">$
						<input class="expense add" name="cellphone" id="cellphone" value="<?php 
							if(isset($yee_saves[0]->cellphone)) echo $yee_saves[0]->cellphone;
							elseif(isset($_POST['cellphone'])) echo $_POST['cellphone']; 
							else echo '0'; ?>" size="35"></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Offie Phone/Fax</td>
					<td class="lftFormCol">$
						<input class="expense add" name="officephone" id="officephone" value="<?php 
							if(isset($yee_saves[0]->officephone)) echo $yee_saves[0]->officephone;
							elseif(isset($_POST['officephone'])) echo $_POST['officephone']; 
							else echo '0'; ?>" size="35"></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Office Supplies</td>
					<td class="lftFormCol">$
						<input class="expense add" name="officesupp" id="officesupp" value="<?php 
							if(isset($yee_saves[0]->officesupp)) echo $yee_saves[0]->officesupp;
							elseif(isset($_POST['officesupp'])) echo $_POST['officesupp']; 
							else echo '0'; ?>" size="35"></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Business Meetings</td>
					<td class="lftFormCol">$
						<input class="expense add" name="bussmeetings" id="bussmeetings" value="<?php 
							if(isset($yee_saves[0]->bussmeetings)) echo $yee_saves[0]->bussmeetings;
							elseif(isset($_POST['bussmeetings'])) echo $_POST['bussmeetings']; 
							else echo '0'; ?>" size="35"></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Franchisee Recognition</td>
					<td class="lftFormCol">$
						<input class="expense add" name="zeerecognition" id="zeerecognition" value="<?php 
							if(isset($yee_saves[0]->zeerecognition)) echo $yee_saves[0]->zeerecognition;
							elseif(isset($_POST['zeerecognition'])) echo $_POST['zeerecognition']; 
							else echo '0'; ?>" size="35"></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Advertising Fund</td>
					<td class="lftFormCol">$
						<input class="expense add" name="adFund" id="adFund" value="<?php 
							if(isset($yee_saves[0]->adFund)) echo $yee_saves[0]->adFund;
							elseif(isset($_POST['adFund'])) echo $_POST['adFund']; 
							else echo '0'; ?>" size="35"></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Local Advertising</td>
					<td class="lftFormCol">$
						<input class="expense add" name="localAd" id="localAd" value="<?php 
							if(isset($yee_saves[0]->localAd)) echo $yee_saves[0]->localAd;
							elseif(isset($_POST['localAd'])) echo $_POST['localAd']; 
							else echo '0'; ?>" size="35"></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Licenses &amp; Fees</td>
					<td class="lftFormCol">$
						<input class="expense add" name="licensefees" id="licensefees" value="<?php 
							if(isset($yee_saves[0]->licensefees)) echo $yee_saves[0]->licensefees;
							elseif(isset($_POST['licensefees'])) echo $_POST['licensefees']; 
							else echo '0'; ?>" size="35"></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Business Taxes</td>
					<td class="lftFormCol">$
						<input class="expense add" name="busstax" id="busstax" value="<?php 
							if(isset($yee_saves[0]->busstax)) echo $yee_saves[0]->busstax;
							elseif(isset($_POST['busstax'])) echo $_POST['busstax']; 
							else echo '0'; ?>" size="35"></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Other expense adds</td>
					<td class="lftFormCol">$
						<input class="expense add" name="other" id="other" value="<?php 
							if(isset($yee_saves[0]->other)) echo $yee_saves[0]->other;
							elseif(isset($_POST['other'])) echo $_POST['other']; 
							else echo '0'; ?>" size="35"></td>
				</tr>
				<tr>
					<td class="lftHeadCol">Grand Total</td>
					<td class="lftFormCol">$
						<input class="expenseTotal" name="total" id="total" readonly="readonly"  style=" color:#666" value="<?php 
							if(isset($yee_saves[0]->total)) echo $yee_saves[0]->total;
							elseif(isset($_POST['total'])) echo $_POST['total']; 
							else echo '0.00'; ?>" size="35"></td>
				</tr>
			</table></td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
			<tr>
				<td class="lftHeadCol" colspan="4"><h3><?=$sect3h3?></h3></td>
				</tr>
			<tr>
				<td width="15%" class="lftHeadCol">&nbsp;</td>
				<td width="15%" class="lftHeadCol">Annual Plan Meeting Attended</td>
				<td width="15%" class="lftHeadCol">Operating Unit Checklist Completed</td>
				<td class="lftHeadCol"><span class="lftHeadCol">Important comments:</span></td>
				</tr>
<?php
	if($franchisees){
			foreach($franchisees as $key => $fran){
	
				if($key % 2 != 0)
					$sty = '_odd';
				else
					$sty = '';
				
?>
			<tr class="salesrow">
						<td class="lftFormCol<?=$sty?>"><strong><?=$fran->firstName.' '.$fran->lastName?><br /><?=$areadev[0]->adID.' - '.$fran->franID?></strong>
					<input name="frans[<?=$key?>][franID]" type="hidden" size="6" maxlength="6" value="<?=$fran->franID?>">
					<input name="frans[<?=$key?>][firstName]" type="hidden" value="<?=$fran->firstName?>">
					<input name="frans[<?=$key?>][lastName]" type="hidden" value="<?=$fran->lastName?>"></td>
				<td class="lftFormCol<?=$sty?>">
        	<input type="radio" name="frans[<?=$key?>][meet_attended]" value="yes" <?php 
						if((isset($_POST['frans'][$key]['meet_attended']) && $_POST['frans'][$key]['meet_attended'] == 'yes') || 
						(isset($fran->meet_attended) && $fran->meet_attended == 'yes')) echo 'checked="checked"';
						?> id="meet_attended_1"> Yes&nbsp;&nbsp;&nbsp;&nbsp;
        	<input type="radio" name="frans[<?=$key?>][meet_attended]" value="no" <?php 
						if((isset($_POST['frans'][$key]['meet_attended']) && $_POST['frans'][$key]['meet_attended'] == 'no') || 
						(isset($fran->meet_attended) && $fran->meet_attended == 'no') || 
						(isset($fran->saved) && $fran->saved == 0)) echo 'checked="checked"';
						?> id="meet_attended_0"> No</td>
				<td class="lftFormCol<?=$sty?>">
        	<input type="radio" name="frans[<?=$key?>][unit_check]" value="yes" <?php 
						if((isset($_POST['frans'][$key]['unit_check']) && $_POST['frans'][$key]['unit_check'] == 'yes') || 
						(isset($fran->unit_check) && $fran->unit_check == 'yes')) echo 'checked="checked"';
						?>   id="unit_check_1"> Yes&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" name="frans[<?=$key?>][unit_check]" value="no" <?php 
						if((isset($_POST['frans'][$key]['unit_check']) && $_POST['frans'][$key]['unit_check'] == 'no') || 
						(isset($fran->unit_check) && $fran->unit_check == 'no') || 
						(isset($fran->saved) && $fran->saved == 0)) echo 'checked="checked"';
						
						 ?> id="unit_check_0"> No</td>
				<td class="lftFormCol<?=$sty?>"><textarea name="frans[<?=$key?>][comments]" style="width:100%" rows="2"><?php 
					if(isset($_POST['frans'][$key]['comments'])) echo $_POST['frans'][$key]['comments']; 
					elseif(isset($fran->comments)) echo urldecode($fran->comments); 
					?></textarea></td>
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
		<td height="10"></td>
	</tr>
	<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
			<tr>
				<td class="lftFormCol"><div class="buttons">
					<input name="reset" type="reset" value="Reset" />&nbsp;&nbsp;|&nbsp;&nbsp;
					<input type="submit" name="action" value="Save Form" />&nbsp;&nbsp;|&nbsp;&nbsp;
					<input name="action" type="submit" value="<?=$button?>" /><input type="hidden" value="<?=$action?>" name="eoy_ad_rpt_submit" /></div></td>
			</tr>
		</table></td>
	</tr>
	</table>
</form>
<?php

//echo $this->functions->debug();

?>