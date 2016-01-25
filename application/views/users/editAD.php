<?php
$attributes = array(
	'name' => 'editADInfo',
	'id' => 'editADInfo'
); 

?>
<?=form_open('users/manageADs/editAD/'.$areadev[0]->adID, $attributes);?>
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
				<td colspan="2" class="lftHeadCol"><h3>Area Developer Technician Information</h3></td>
				</tr>
			<tr>
				<td width="30%" class="lftHeadCol">First Name</td>
				<td class="rgtFormCol"><input name="firstName" type="text" value="<?=$areadev[0]->firstName?>" size="60" /></td>
			</tr>
			<tr>
				<td class="lftHeadCol">Last Name</td>
				<td class="rgtFormCol"><input name="lastName" type="text" value="<?=$areadev[0]->lastName?>" size="60" /></td>
			</tr>
			<tr>
				<td class="lftHeadCol">AD ID</td>
				<td class="rgtFormCol"><select name="adID" id="adID">
<?php 
if($adIDs){
	foreach($adIDs as $adID){	
?>
						<option value="<?=$adID?>"><?=$adID?></option>
<?php 
	}
}
?>

				</select> Add New Area Developer</td>
			</tr>
			<tr>
				<td class="lftHeadCol">Fran ID</td>
				<td class="rgtFormCol"><input name="franID" type="text" value="<?=$areadev[0]->franID?>" size="30" /></td>
			</tr>
			<tr>
				<td class="lftHeadCol">Reporting AD ID(s)</td>
				<td class="rgtFormCol"><select name="adID" size="4" multiple="multiple" id="adID">
<?php 
if($adIDs){
	foreach($adIDs as $adID){	
?>
						<option value="<?=$adID?>"><?=$adID?></option>
<?php 
	}
}
?>
				</select></td>
			</tr>
			<tr>
				<td class="lftHeadCol">Regional Office Name/Location</td>
				<td class="rgtFormCol"><input name="region_office_name" type="text" value="<?=$areadev[0]->region_office_name?>" size="60" /></td>
			</tr>
			<tr>
				<td class="lftHeadCol">Corporate Business Name</td>
				<td class="rgtFormCol"><input name="corporate_business_name" type="text" value="<?=$areadev[0]->corporate_business_name?>" size="60" /></td>
			</tr>
			<tr>
				<td class="lftHeadCol">Special Sales Report Name</td>
				<td class="rgtFormCol"><input name="special_sales_report_name" type="text" value="<?=$areadev[0]->special_sales_report_name?>" size="60" /></td>
			</tr>
			<tr>
				<td class="lftHeadCol">DMA Location</td>
				<td class="rgtFormCol"><input name="DMA_location" type="text" value="<?=$areadev[0]->DMA_location?>" size="60" /></td>
			</tr>
			<tr>
				<td class="lftHeadCol">Region Color</td>
				<td class="rgtFormCol"><input name="region_color" type="text" value="<?=$areadev[0]->region_color?>" size="60" /></td>
			</tr>
			<tr>
				<td class="lftHeadCol">Active</td>
				<td class="rgtFormCol"><input name="active" type="checkbox" <?php if($areadev[0]->active == 'yes') echo ' checked="checked"'; ?> value="Yes" /></td>
			</tr>
			<tr>
				<td class="lftHeadCol">7% Royalty?</td>
				<td class="rgtFormCol"><input name="royalty7" type="checkbox" <?php if($areadev[0]->royalty7 == 'yes') echo ' checked="checked"'; ?> value="Yes" /></td>
			</tr>
			<tr>
				<td class="lftHeadCol">1% Ad Fund?</td>
				<td class="rgtFormCol"><input name="adFund1" type="checkbox" <?php if($areadev[0]->adFund1 == 'yes') echo ' checked="checked"'; ?> value="Yes" /></td>
			</tr>
			<tr>
				<td class="lftHeadCol">2% Billing & Collections</td>
				<td class="rgtFormCol"><input name="billColl2" type="checkbox" <?php if($areadev[0]->billColl2 == 'yes') echo ' checked="checked"'; ?> value="Yes" /></td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
		<tr>
			<td colspan="2" class="lftHeadCol"><h3>Personal Information</h3></td>
			</tr>
		<tr>
			<td width="30%" class="lftHeadCol">Date of Birth</td>
			<td class="rgtFormCol"><input name="birth_date" type="text" value="<?=$areadev[0]->birth_date?>" size="60" /></td>
		</tr>
		<tr>
			<td class="lftHeadCol">Social Security (###-##-####)</td>
			<td class="rgtFormCol"><input name="social_security" type="password" value="<?=$areadev[0]->birth_date?>" size="60" /></td>
		</tr>
		<tr>
			<td class="lftHeadCol">Report Emails</td>
			<td class="rgtFormCol"><input id="emails" name="emails" type="text" value="<?=$areadev[0]->emails?>" size="60" /></td>
		</tr>
		</table></td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
		<tr>
			<td colspan="2" class="lftHeadCol"><h3>User Login Information</h3></td>
			</tr>
		<tr>
			<td width="30%" class="lftHeadCol">Username</td>
			<td class="rgtFormCol"><input name="username" type="text" value="<?=$areadev[0]->username?>" size="60" /></td>
		</tr>
		<tr>
			<td class="lftHeadCol">Password</td>
			<td class="rgtFormCol"><input name="passwordNew" type="text" value="Leave if the Same" size="60" /><input name="passwordOld" type="hidden" value="<?=$areadev[0]->password?>" /></td>
		</tr>
		<tr>
			<td class="lftHeadCol">Report Emails</td>
			<td class="rgtFormCol"><input id="emails" name="emails" type="text" value="<?=$areadev[0]->emails?>" size="60" /></td>
		</tr>
		</table></td>
	</tr>			
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
			<tr>
				<td class="lftFormCol"><div class="buttons"><input name="reset" type="reset" value="Reset" />&nbsp;&nbsp;|&nbsp;&nbsp;<input type="hidden" value="editAD" name="submitAD" /><input name="submit" type="submit" value="Update <?=$areadev[0]->firstName?>'s Profile" /></div></td>
			</tr>
		</table></td>
	</tr>			
</table>
</form>
		
