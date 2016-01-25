<form  action=""  method="post" id="<?= empty($tech->franID) ? 'add_tech' : 'edit_tech'?> " name="<?= empty($tech->franID) ? 'add_tech' : 'edit_tech'?>">
<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
			<tr>
				<td class="lftHeadCol"><h2><?= empty($tech->franID) ? 'Add New Tech' : 'Edit Tech'.' '. $tech->franID . ' '.$mainh2?></h2></td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
			<tr>
				<td colspan="2" class="lftHeadCol"><h3>Add Tech/Franchisee</h3></td>
			</tr>
            <tr>
                <td colspan="2"><?php if(validation_errors()){?><div class="noteError"><?php echo validation_errors(); ?></div><?php }?></td>
            </tr>
            <tr>
				<td class="lftHeadCol">Reporting AD ID(s)</td>
				<td class="rgtFormCol"><input name="reportADs" type="text" value="<?=!empty($tech->reportADs) ? $tech->reportADs : $this->input->post('reportADs')?>" size="60" /></td>
			</tr>
            <tr>
                <td width="30%" class="lftHeadCol">Contract Type</td>
                <td class="rgtFormCol"><input name="contract_type" type="text" value="<?=!empty($tech->contract_type) ? $tech->contract_type : $this->input->post('contract_type')?>" size="60" /></td>
            </tr>
			<tr>
				<td width="30%" class="lftHeadCol">First Name</td>
				<td class="rgtFormCol"><input name="firstName" type="text" value="<?=!empty($tech->firstName) ? $tech->firstName : $this->input->post('firstName')?>" size="100" /></td>
			</tr>
			<tr>
				<td class="lftHeadCol">Last Name</td>
				<td class="rgtFormCol"><input name="lastName" type="text" value="<?=!empty($tech->lastName) ? $tech->lastName : $this->input->post('lastName')?>" size="100" /></td>
			</tr>
			<tr>
				<td class="lftHeadCol">Suffix</td>
				<td class="rgtFormCol"><input name="suffix" type="text" value="<?=!empty($tech->suffix) ? $tech->suffix : $this->input->post('suffix')?>" size="60" /></td>
			</tr>
			<tr>
				<td class="lftHeadCol">Nickname</td>
				<td class="rgtFormCol"><input name="nickname" type="text" value="<?=!empty($tech->nickname) ? $tech->nickname : $this->input->post('nickname')?>" size="100" /></td>
			</tr>
            <tr>
				<td class="lftHeadCol">Custom Sales Report Name</td>
				<td class="rgtFormCol"><input name="custom_sales_report_name" type="text" value="<?=!empty($tech->custom_sales_report_name) ? $tech->custom_sales_report_name : $this->input->post('custom_sales_report_name')?>" size="100" /></td>
			</tr>
            <tr>
				<td class="lftHeadCol">Company</td>
				<td class="rgtFormCol"><input name="company" type="text" value="<?=!empty($tech->company) ? $tech->company : $this->input->post('company')?>" size="100" /></td>
			</tr>
            <tr>
				<td class="lftHeadCol">BirthDay</td>
				<td class="rgtFormCol"><input name="birth_date" type="text" value="<?=!empty($tech->birth_date) ? $tech->birth_date : $this->input->post('birth_date')?>" size="100" /></td>
			</tr>
            <tr>
				<td class="lftHeadCol">Social Security</td>
				<td class="rgtFormCol"><input name="social_security" type="text" value="<?=!empty($tech->social_security) ? $tech->social_security : $this->input->post('social_security')?>" size="100" /></td>
			</tr>
			<tr>
				<td class="lftHeadCol">EIN</td>
                <td class="rgtFormCol">
                    <?php 
                        $ein = array('0','1');
                        echo form_dropdown('ein', $ein, (!empty($tech->ein) ? $tech->ein : $this->input->post('ein')));
                    ?>
                </td>
			</tr>
            <tr>
				<td class="lftHeadCol">Payment Date</td>
				<td class="rgtFormCol"><input name="payment_date" type="text" value="<?=!empty($tech->payment_date) ? $tech->payment_date : $this->input->post('payment_date')?>" size="100" /></td>
			</tr>
            <tr>
				<td class="lftHeadCol">Payment Amount</td>
				<td class="rgtFormCol"><input name="payment_amount" type="text" value="<?=!empty($tech->payment_amount) ? $tech->payment_amount : $this->input->post('payment_amount')?>" size="100" /></td>
			</tr>
			<tr>
				<td class="lftHeadCol">Active</td>
                <td class="rgtFormCol">
                    <?php 
                        $active = array('yes' => 'Yes', 'no' => 'No');
                        echo form_dropdown('active', $active, (!empty($tech->active) ? $tech->active : $this->input->post('active')));
                    ?>
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
				<td class="lftFormCol"><div class="buttons"><input name="reset" type="reset" value="Reset" />&nbsp;&nbsp;|&nbsp;&nbsp;<input type="hidden" value="editAD" name="submitAD" /><input name="submit" type="submit" value="Save Tech" /></div></td>
			</tr>
		</table></td>
	</tr>			
</table>
    <input type="hidden" id="adID" name="adID" value="<?=empty($areadev[0]->adID) ? '' : $areadev[0]->adID?>" />
</form>
		
