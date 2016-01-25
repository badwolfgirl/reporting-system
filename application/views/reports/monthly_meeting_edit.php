<?php
$attributes = array(
	'name' => 'adMeet',
	'id' => 'adMeet'
);
$year 			=  date('Y', mktime(0, 0, 0, date("n")  , date("j")-30, date("Y")));
?>

<?=form_open('reports/monthly_meeting/edit/'.$areadev[0]->adID.'/'.$month.'/'.$year, $attributes);?>

<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
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
	<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
			<tr>
				<td class="lftHeadCol" colspan="9"><h3><?=$sect1h3?></h3></td>
			</tr>
			<tr>
				<td class="lftHeadCol"></td>
				<td class="centHeadCol" colspan="4" align="center">Weekly Contact Attempt</td>
				<td class="centHeadCol" colspan="3" align="center">Monthly Meetings</td>		
				<td class="rgtHeadCol" colspan="2"></td>
			</tr>
			<tr>
				<td class="lftHeadCol"></td>
				<td class="centHeadCol">Week 1</td>
				<td class="centHeadCol">Week 2</td>
				<td class="centHeadCol">Week 3</td>
				<td class="centHeadCol">Week 4</td>
				<td class="centHeadCol">Meeting Held</td>
				<td class="centHeadCol">Meeting Attended</td>
				<td class="centHeadCol">In Person Meeting</td>
				<td class="centHeadCol" align="center">Comments</td>
			</tr>
<?php

	
	if($reports['frans'][0] != false){
		
	foreach($reports['frans'] as $key => $report){ 
	
				if($key % 2 != 0)
					$sty = '_odd';
				else
					$sty = '';
				
?>
			<tr>
				<td class="lftFormCol<?=$sty?>"><strong><?=$report->firstName.' '.$report->lastName?></strong><br /><?=$areadev[0]->adID.' - '.$report->franID?>
					<input name="frans[<?=$key?>][franID]" type="hidden" size="6" maxlength="6" value="<?=$report->franID?>">
					<input name="frans[<?=$key?>][firstNm]" type="hidden" value="<?=$report->firstName?>">
					<input name="frans[<?=$key?>][lastNm]" type="hidden" value="<?=$report->lastName?>"></td>		
				<td class="lftFormCol<?=$sty?>">
						<input type="radio" name="frans[<?=$key?>][week1_attempt]" value="yes" <?php if((isset($_POST['frans'][$key]['week1_attempt']) && $_POST['frans'][$key]['week1_attempt'] == 'yes') || (isset($report->week1_attempt) && $report->week1_attempt == 'yes')) echo 'checked="checked"'; else echo ''; ?> id="week1_attempt_1">
						Yes<br />
						<input type="radio" name="frans[<?=$key?>][week1_attempt]" value="no" <?php if((isset($_POST['frans'][$key]['week1_attempt']) && $_POST['frans'][$key]['week1_attempt'] == 'no') || (isset($report->week1_attempt) && $report->week1_attempt == 'no')) echo 'checked="checked"'; else echo ''; ?>  id="week1_attempt_0">
						No</td>
				<td class="lftFormCol<?=$sty?>">
						<input type="radio" name="frans[<?=$key?>][week2_attempt]" value="yes" <?php if((isset($_POST['frans'][$key]['week2_attempt']) && $_POST['frans'][$key]['week2_attempt'] == 'yes') || (isset($report->week2_attempt) && $report->week2_attempt == 'yes')) echo 'checked="checked"'; else echo ''; ?> id="week2_attempt_1">
						Yes<br />
						<input type="radio" name="frans[<?=$key?>][week2_attempt]" value="no" <?php if((isset($_POST['frans'][$key]['week2_attempt']) && $_POST['frans'][$key]['week2_attempt'] == 'no') || (isset($report->week2_attempt) && $report->week2_attempt == 'no')) echo 'checked="checked"'; else echo ''; ?> id="week2_attempt_0">
						No</td>
				<td class="lftFormCol<?=$sty?>">
						<input type="radio" name="frans[<?=$key?>][week3_attempt]" value="yes" <?php if((isset($_POST['frans'][$key]['week3_attempt']) && $_POST['frans'][$key]['week3_attempt'] == 'yes') || (isset($report->week3_attempt) && $report->week3_attempt == 'yes')) echo 'checked="checked"'; else echo ''; ?> id="week3_attempt_1">
						Yes<br />
						<input type="radio" name="frans[<?=$key?>][week3_attempt]" value="no" <?php if((isset($_POST['frans'][$key]['week3_attempt']) && $_POST['frans'][$key]['week3_attempt'] == 'no') || (isset($report->week3_attempt) && $report->week3_attempt == 'no')) echo 'checked="checked"'; else echo ''; ?> id="week3_attempt_0">
						No</td>
				<td class="lftFormCol<?=$sty?>">
						<input type="radio" name="frans[<?=$key?>][week4_attempt]" value="yes" <?php if((isset($_POST['frans'][$key]['week4_attempt']) && $_POST['frans'][$key]['week4_attempt'] == 'yes') || (isset($report->week4_attempt) && $report->week4_attempt == 'yes')) echo 'checked="checked"'; else echo ''; ?> id="week4_attempt_1">
						Yes<br />
						<input type="radio" name="frans[<?=$key?>][week4_attempt]" value="no" <?php if((isset($_POST['frans'][$key]['week4_attempt']) && $_POST['frans'][$key]['week4_attempt'] == 'no') || (isset($report->week4_attempt) && $report->week4_attempt == 'no')) echo 'checked="checked"'; else echo ''; ?> id="week4_attempt_0">
						No</td>
				<td class="lftFormCol<?=$sty?>">
						<input type="radio" name="frans[<?=$key?>][meeting_held]" value="yes" <?php if((isset($_POST['frans'][$key]['meeting_held']) && $_POST['frans'][$key]['meeting_held'] == 'yes') || (isset($report->meeting_held) && $report->meeting_held == 'yes')) echo 'checked="checked"'; else echo ''; ?> id="meeting_held_1">
						Yes<br />
						<input type="radio" name="frans[<?=$key?>][meeting_held]" value="no" <?php if((isset($_POST['frans'][$key]['meeting_held']) && $_POST['frans'][$key]['meeting_held'] == 'no') || (isset($report->meeting_held) && $report->meeting_held == 'no')) echo 'checked="checked"'; else echo ''; ?> id="meeting_held_0">
						No</td>
				<td class="lftFormCol<?=$sty?>"> 
						<input type="radio" name="frans[<?=$key?>][meeting_attended]" value="yes" <?php if((isset($_POST['frans'][$key]['meeting_attended']) && $_POST['frans'][$key]['meeting_attended'] == 'yes') || (isset($report->meeting_attended) && $report->meeting_attended == 'yes')) echo 'checked="checked"'; else echo ''; ?> id="meeting_attended_1">
						Yes<br />
						<input type="radio" name="frans[<?=$key?>][meeting_attended]" value="no" <?php if((isset($_POST['frans'][$key]['meeting_attended']) && $_POST['frans'][$key]['meeting_attended'] == 'no') || (isset($report->meeting_attended) && $report->meeting_attended == 'no')) echo 'checked="checked"'; else echo ''; ?> id="meeting_attended_0">
						No</td>
				<td class="lftFormCol<?=$sty?>">
						<input type="radio" name="frans[<?=$key?>][inperson_meeting]" value="yes" <?php if((isset($_POST['frans'][$key]['inperson_meeting']) && $_POST['frans'][$key]['inperson_meeting'] == 'yes') || (isset($report->inperson_meeting) && $report->inperson_meeting == 'yes')) echo 'checked="checked"'; else echo ''; ?> id="inperson_meeting_1">
						Yes<br />
						<input type="radio" name="frans[<?=$key?>][inperson_meeting]" value="no" <?php if((isset($_POST['frans'][$key]['inperson_meeting']) && $_POST['frans'][$key]['inperson_meeting'] == 'no') || (isset($report->inperson_meeting) && $report->inperson_meeting == 'no')) echo 'checked="checked"'; else echo ''; ?> id="inperson_meeting_0">
						No</td>
				<td class="lftFormCol<?=$sty?>" align="center"><textarea name="frans[<?=$key?>][comments]" style="width:100%" rows="2"><?php if(isset($_POST['frans'][$key]['comments'])) echo $_POST['frans'][$key]['comments']; elseif(isset($report->comments)) echo $report->comments; else echo ''; ?></textarea></td>		
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
			<td width="49%"><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc" id="sCont">
				<tr>
					<td class="lftHeadCol" colspan="7"><h3><?=$sect2h3?><span style="font-size:90%;">&nbsp;&nbsp;(<strong>Updated as of Nov. 2013</strong>: Names are required, and either a phone number or an email address are now required as well to complete form correctly.)</span></h3></td>
				</tr>
				<tr>
					<td width="10" class="lftHeadCol">&nbsp;</td>			
					<td class="lftHeadCol">Name</td>
					<td class="lftHeadCol">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="35%">Phone #</td>
								<td width="5%">or</td>
								<td>Email</td>
							</tr>
					</table></td>
					<td class="lftHeadCol">Address</td>
					<td class="lftHeadCol">City</td>
					<td class="lftHeadCol">State</td>
					<td class="lftHeadCol">Zip</td>
				</tr>
	<?php 
	
	if($reports['sales'][0] != false){
		$s=1;
		foreach($reports['sales'] as $key => $sale){ 
	
	?>
				<tr>
					<td class="lftFormCol"><?=$s?></td>			
					<td class="lftFormCol"><input name="sConts[<?=$s?>][name]" size="20" type="text" value="<?php if(isset($sale->name)) echo $sale->name; ?>" maxlength="256"> <span style="color:#F00; font-size:120%;">*</span></td>			
					<td class="lftFormCol">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="35%"><input name="sConts[<?=$s?>][phone]" size="20" type="text" value="<?php if(isset($sale->phone)) echo $sale->phone; ?>" maxlength="13"></td>
								<td width="5%">or</td>
								<td nowrap="nowrap"><input name="sConts[<?=$s?>][email]" size="30" class="sEmail" value="<?php if(isset($sale->email)) echo $sale->email; ?>" type="text"> <span style="color:#F00; font-size:120%;">*</span></td>
							</tr>
					</table></td>			
					<td class="lftFormCol"><input name="sConts[<?=$s?>][address]" size="30" class="sAddress" value="<?php if(isset($sale->address)) echo $sale->address; ?>" maxlength="256" type="text"></td>
					<td class="lftFormCol"><input name="sConts[<?=$s?>][city]" type="text" size="30" value="<?php if(isset($sale->city)) echo $sale->city; ?>" maxlength="128"></td>
					<td class="lftFormCol"><select name="sConts[<?=$s?>][state]" class="stateSelect"></select></td>
					<td class="lftFormCol"><input name="sConts[<?=$s?>][zip]" size="5" maxlength="5" value="<?php if(isset($sale->zip)) echo $sale->zip; ?>" type="text"></td>
				</tr>	
	<?php
			$s++; 
		} 
		
		//if($reports['saleCounts'] < 5)
		//for($i = 1; $i <= 10; $i++)
	} ?> 
				<tr>
					<td colspan="7" class="lftFormCol buttonRow"><div class="buttonsLft">
						<div onclick="addSalesRow()" class="addButton" onmouseover="this.className='addButton_on'" onmouseout="this.className='addButton'">
							<img src="<?=$this->config->item('base_url')?>addons/icons/add-button.png" width="24" height="24" alt="add" align="absmiddle" hspace="5" />Add Row
						</div>
					</div></td>
				</tr>	
			</table></td>
		<tr>
			<td height="10"></td>
		</tr>
				<td width="50%"><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc" id="pCont">
				<tr>
					<td class="lftHeadCol" colspan="7"><h3><?=$sect3h3?><span style="font-size:90%;">&nbsp;&nbsp;(<strong>Updated as of Nov. 2013</strong>: Names are required, and either a phone number or an email address are now required as well to complete form correctly.)</span></h3></td>
				</tr>
				<tr>
					<td width="10" class="lftHeadCol">&nbsp;</td>			
					<td class="lftHeadCol">Name</td>
					<td class="lftHeadCol"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="35%">Phone #</td>
								<td width="5%">or</td>
								<td>Email</td>
							</tr>
					</table></td>
					<td class="lftHeadCol">Address</td>
					<td class="lftHeadCol">City</td>
					<td class="lftHeadCol">State</td>
					<td class="lftHeadCol">Zip</td>
				</tr>
			<?php for($p = 1; $p <= 5; $p++) { ?>          	
				<tr>
					<td class="lftFormCol"><?=$p?></td>			
					<td class="lftFormCol"><input class="req_pCont" name="pConts[<?=$p?>][name]" size="20" type="text" maxlength="256"> <span style="color:#F00; font-size:120%;">*</span></td>			
					<td class="lftFormCol"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="35%"><input name="pConts[<?=$p?>][phone]" size="20" type="text" maxlength="13"></td>
								<td width="5%">or</td>
								<td nowrap="nowrap"><input name="pConts[<?=$p?>][email]" size="30" class="pEmail" type="text"> <span style="color:#F00; font-size:120%;">*</span></td>
							</tr>
					</table>
					</td>			
					<td class="lftFormCol"><input name="pConts[<?=$p?>][address]" size="30" type="text" maxlength="256"></td>
					<td class="lftFormCol"><input name="pConts[<?=$p?>][city]" size="30" type="text" maxlength="128"></td>
					<td class="lftFormCol"><select name="pConts[<?=$p?>][state]" class="stateSelect"></select></td>
					<td class="lftFormCol"><input name="pConts[<?=$p?>][zip]" type="text" size="5" maxlength="5"></td>
				</tr>
			<?php } ?>          
				<tr>
					<td colspan="7" class="lftFormCol buttonRow"><div class="buttonsLft">
						<div onclick="addFranRow()" class="addButton" onmouseover="this.className='addButton_on'" onmouseout="this.className='addButton'">
							<img src="<?=$this->config->item('base_url')?>addons/icons/add-button.png" width="24" height="24" alt="add" align="absmiddle" hspace="5" />Add Row
						</div>
					</div></td>
				</tr>	
			</table>
			</td>
		</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
			<tr>
				<td class="lftFormCol"><div class="buttons">
					<input name="reset" type="reset" value="Reset" />&nbsp;&nbsp;|&nbsp;&nbsp;
					<input type="hidden" value="<?=$action?>" name="adMeetingSubmit" /><input name="action" type="submit" value="<?=$button?>" /></div></td>
			</tr>
		</table></td>
	</tr>
	</table>
</form>
