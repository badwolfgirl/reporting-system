<?php
$attributes = array(
	'name' => 'adMeet',
	'id' => 'adMeet'
);
$year 			=  date('Y', mktime(0, 0, 0, date("n")  , date("j")-30, date("Y")));
?>

<?=form_open('reports/monthly_meeting/create/'.$areadev[0]->adID, $attributes);?>

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
	if($franchisees){
			foreach($franchisees as $key => $fran){
	
				if($key % 2 != 0)
					$sty = '_odd';
				else
					$sty = '';
				
?>
			<tr>
				<td class="lftFormCol<?=$sty?>"><strong><?=$fran->firstName.' '.$fran->lastName?></strong><br /><?=$areadev[0]->adID.' - '.$fran->franID?>
					<input name="frans[<?=$key?>][franID]" type="hidden" size="6" maxlength="6" value="<?=$fran->franID?>">
					<input name="frans[<?=$key?>][firstNm]" type="hidden" value="<?=$fran->firstName?>">
					<input name="frans[<?=$key?>][lastNm]" type="hidden" value="<?=$fran->lastName?>"></td>		
				<td class="lftFormCol<?=$sty?>">
						<input type="radio" name="frans[<?=$key?>][week1_attempt]" value="yes"  id="week1_attempt_1">
						Yes<br />
						<input type="radio" name="frans[<?=$key?>][week1_attempt]" value="no" checked="checked" id="week1_attempt_0">
						No</td>
				<td class="lftFormCol<?=$sty?>">
						<input type="radio" name="frans[<?=$key?>][week2_attempt]" value="yes" id="week2_attempt_1">
						Yes<br />
						<input type="radio" name="frans[<?=$key?>][week2_attempt]" value="no" checked="checked" id="week2_attempt_0">
						No</td>
				<td class="lftFormCol<?=$sty?>">
						<input type="radio" name="frans[<?=$key?>][week3_attempt]" value="yes" id="week3_attempt_1">
						Yes<br />
						<input type="radio" name="frans[<?=$key?>][week3_attempt]" value="no" checked="checked" id="week3_attempt_0">
						No</td>
				<td class="lftFormCol<?=$sty?>">
						<input type="radio" name="frans[<?=$key?>][week4_attempt]" value="yes" id="week4_attempt_1">
						Yes<br />
						<input type="radio" name="frans[<?=$key?>][week4_attempt]" value="no" checked="checked" id="week4_attempt_0">
						No</td>
				<td class="lftFormCol<?=$sty?>">
						<input type="radio" name="frans[<?=$key?>][meeting_held]" value="yes" id="meeting_held_1">
						Yes<br />
						<input type="radio" name="frans[<?=$key?>][meeting_held]" value="no" checked="checked" id="meeting_held_0">
						No</td>
				<td class="lftFormCol<?=$sty?>"> 
						<input type="radio" name="frans[<?=$key?>][meeting_attended]" value="yes" id="meeting_attended_1">
						Yes<br />
						<input type="radio" name="frans[<?=$key?>][meeting_attended]" value="no" checked="checked" id="meeting_attended_0">
						No</td>
				<td class="lftFormCol<?=$sty?>">
						<input type="radio" name="frans[<?=$key?>][inperson_meeting]" value="yes" id="inperson_meeting_1">
						Yes<br />
						<input type="radio" name="frans[<?=$key?>][inperson_meeting]" value="no" checked="checked" id="inperson_meeting_0">
						No</td>
				<td class="lftFormCol<?=$sty?>" align="center"><textarea name="frans[<?=$key?>][comments]" style="width:100%" rows="2"></textarea></td>		
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
					<td class="lftHeadCol" colspan="7"><h3><?=$sect2h3?></h3></td>
				</tr>
				<tr>
					<td class="lftHeadCol" colspan="7"><span style="color:#F00; font-size:150%;">** Updated as of March 2014 ** </span><span style="font-size:120%; font-weight:normal">5 Sales Contacts required. To submit the form correctly, please enter either a phone number or an email address with the name.</span></td>
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
			<?php for($s = 1; $s <= 5; $s++) { ?>          	
				<tr>
					<td class="lftFormCol"><?=$s?></td>			
					<td class="lftFormCol"><input name="sConts[<?=$s?>][name]" size="20" type="text" maxlength="256"> <span style="color:#F00; font-size:120%;">*</span></td>			
					<td class="lftFormCol">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="35%"><input name="sConts[<?=$s?>][phone]" size="20" type="text" maxlength="13"></td>
								<td width="5%">or</td>
								<td nowrap="nowrap"><input name="sConts[<?=$s?>][email]" size="30" class="sEmail" type="text"> <span style="color:#F00; font-size:120%;">*</span></td>
							</tr>
					</table></td>			
					<td class="lftFormCol"><input name="sConts[<?=$s?>][address]" size="30" class="sAddress" maxlength="256" type="text"></td>
					<td class="lftFormCol"><input name="sConts[<?=$s?>][city]" type="text" size="30" maxlength="128"></td>
					<td class="lftFormCol"><select name="sConts[<?=$s?>][state]" class="stateSelect"></select></td>
					<td class="lftFormCol"><input name="sConts[<?=$s?>][zip]" size="5" maxlength="5" type="text"></td>
				</tr>	
			<?php } ?>          
				<!--<tr>
					<td colspan="7" class="lftFormCol buttonRow"><div class="buttonsLft">
						<div onclick="addSalesRow()" class="addButton" onmouseover="this.className='addButton_on'" onmouseout="this.className='addButton'">
							<img src="<?=$this->config->item('base_url')?>addons/icons/add-button.png" width="24" height="24" alt="add" align="absmiddle" hspace="5" />Add Row
						</div>
					</div></td>
				</tr>	 -->
			</table></td>
		<tr>
			<td height="10"></td>
		</tr>
				<td width="50%"><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc" id="pCont">
				<tr>
					<td class="lftHeadCol" colspan="7"><h3><?=$sect3h3?></h3></td>
				</tr>
				<tr>
					<td class="lftHeadCol" colspan="7"><span style="color:#F00; font-size:150%;">** Updated as of March 2014 ** </span><span style="font-size:120%; font-weight:normal">Prospective Franchisees are now optional to fill in. If you do submit a name, please enter in a phone number or email address to submit the report correctly.</span></td>
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
				<!--<tr>
					<td colspan="7" class="lftFormCol buttonRow"><div class="buttonsLft">
						<div onclick="addFranRow()" class="addButton" onmouseover="this.className='addButton_on'" onmouseout="this.className='addButton'">
							<img src="<?=$this->config->item('base_url')?>addons/icons/add-button.png" width="24" height="24" alt="add" align="absmiddle" hspace="5" />Add Row
						</div>
					</div></td>
				</tr>	 -->
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
