<?php
$attributes = array(
	'name' 	=> 'survery',
	'id' 	=> 'survery'
); 
?>

<?=form_open('survey/dealer_survey/submit/'.$adID.'/', $attributes);?>
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
<?php if(validation_errors()){ ?>
        <tr>
        	<td class="noteError">Please fill in all of the required fields!</td>
        </tr>
	<tr>
		<td height="10"></td>
	</tr>
<?php } ?>        
	<tr>
		<td><table cellpadding="15" cellspacing="2" width="100%" style="border:1px solid #ccc">
			<tr>
			  <td colspan="10" class="lftHeadCol"><h3><?=$sect1h3?></h3></td>
		  </tr>
			<tr style="font-size:120%;">
				<td colspan="5" class="lftHeadCol">Please provide a rank for each section below</td>
				<td class="centHeadCol">Poor</td>
				<td class="centHeadCol">Satisfactory</td>
				<td class="centHeadCol">Good</td>
				<td class="centHeadCol">Great</td>
				<td class="centHeadCol">Outstanding</td>
			</tr>
			<tr style="font-size:110%;">
			 	<td colspan="5" class="lftFormCol">Quality of Repairs</td>
                <td class="centFormCol"><input type="radio" name="repair_quality" value="1" <?php if($_POST['repair_quality'] == 1){ echo 'checked="checked"'; } ?> id="repair_quality_0" /></td>
                <td class="centFormCol"><input type="radio" name="repair_quality" value="2" <?php if($_POST['repair_quality'] == 2){ echo 'checked="checked"'; } ?> id="repair_quality_1" /></td>
                <td class="centFormCol"><input type="radio" name="repair_quality" value="3" <?php if($_POST['repair_quality'] == 3){ echo 'checked="checked"'; } ?> id="repair_quality_2" /></td>
                <td class="centFormCol"><input type="radio" name="repair_quality" value="4" <?php if($_POST['repair_quality'] == 4){ echo 'checked="checked"'; } ?> id="repair_quality_3" /></td>
                <td class="centFormCol"><input type="radio" name="repair_quality" value="5" <?php if($_POST['repair_quality'] == 5){ echo 'checked="checked"'; } ?> id="repair_quality_4" /></td>
          </tr>
			<tr style="font-size:110%;">
			  <td colspan="5" class="lftFormCol">Cycle Time</td>
			  <td class="centFormCol"><input type="radio" name="cycle_time" value="1" <?php if($_POST['cycle_time'] == 1){ echo 'checked="checked"'; } ?> id="cycle_time_0" /></td>
              <td class="centFormCol"><input type="radio" name="cycle_time" value="2" <?php if($_POST['cycle_time'] == 2){ echo 'checked="checked"'; } ?> id="cycle_time_1" /></td>
              <td class="centFormCol"><input type="radio" name="cycle_time" value="3" <?php if($_POST['cycle_time'] == 3){ echo 'checked="checked"'; } ?> id="cycle_time_2" /></td>
              <td class="centFormCol"><input type="radio" name="cycle_time" value="4" <?php if($_POST['cycle_time'] == 4){ echo 'checked="checked"'; } ?> id="cycle_time_3" /></td>
              <td class="centFormCol"><input type="radio" name="cycle_time" value="5" <?php if($_POST['cycle_time'] == 5){ echo 'checked="checked"'; } ?> id="cycle_time_4" /></td>
          </tr>
			<tr style="font-size:110%;">
			  <td colspan="5" class="lftFormCol">Customer Service</td>
			  <td class="centFormCol"><input type="radio" name="customer_service" value="1" <?php if($_POST['customer_service'] == 1){ echo 'checked="checked"'; } ?> id="customer_service_0" /></td>
              <td class="centFormCol"><input type="radio" name="customer_service" value="2" <?php if($_POST['customer_service'] == 2){ echo 'checked="checked"'; } ?> id="customer_service_1" /></td>
              <td class="centFormCol"><input type="radio" name="customer_service" value="3" <?php if($_POST['customer_service'] == 3){ echo 'checked="checked"'; } ?> id="customer_service_2" /></td>
              <td class="centFormCol"><input type="radio" name="customer_service" value="4" <?php if($_POST['customer_service'] == 4){ echo 'checked="checked"'; } ?> id="customer_service_3" /></td>
              <td class="centFormCol"><input type="radio" name="customer_service" value="5" <?php if($_POST['customer_service'] == 5){ echo 'checked="checked"'; } ?> id="customer_service_4" /></td>
          </tr>
			<tr style="font-size:110%;">
			  <td colspan="5" class="lftFormCol">Professionalism</td>
			  <td class="centFormCol"><input type="radio" name="professionalism" value="1" <?php if($_POST['professionalism'] == 1){ echo 'checked="checked"'; } ?> id="professionalism_0" /></td>
              <td class="centFormCol"><input type="radio" name="professionalism" value="2" <?php if($_POST['professionalism'] == 2){ echo 'checked="checked"'; } ?> id="professionalism_1" /></td>
              <td class="centFormCol"><input type="radio" name="professionalism" value="3" <?php if($_POST['professionalism'] == 3){ echo 'checked="checked"'; } ?> id="professionalism_2" /></td>
              <td class="centFormCol"><input type="radio" name="professionalism" value="4" <?php if($_POST['professionalism'] == 4){ echo 'checked="checked"'; } ?> id="professionalism_3" /></td>
		      <td class="centFormCol"><input type="radio" name="professionalism" value="5" <?php if($_POST['professionalism'] == 5){ echo 'checked="checked"'; } ?> id="professionalism_4" /></td>
          </tr>
			<tr style="font-size:110%;">
			  <td colspan="5" class="lftFormCol">Communication</td>
			  <td class="centFormCol"><input type="radio" name="communication" value="1" <?php if($_POST['communication'] == 1){ echo 'checked="checked"'; } ?> id="communication_0" /></td>
              <td class="centFormCol"><input type="radio" name="communication" value="2" <?php if($_POST['communication'] == 2){ echo 'checked="checked"'; } ?> id="communication_1" /></td>
              <td class="centFormCol"><input type="radio" name="communication" value="3" <?php if($_POST['communication'] == 3){ echo 'checked="checked"'; } ?> id="communication_2" /></td>
              <td class="centFormCol"><input type="radio" name="communication" value="4" <?php if($_POST['communication'] == 4){ echo 'checked="checked"'; } ?> id="communication_3" /></td>
              <td class="centFormCol"><input type="radio" name="communication" value="5" <?php if($_POST['communication'] == 5){ echo 'checked="checked"'; } ?> id="communication_4" /></td>
          </tr>
			<tr style="font-size:110%;">
			  <td colspan="10" class="lftFormCol">How likely would you be to recommend Colors on Parade services to a friend or family member? (1 Not Likely - 10 Very Likely)</td>
		  </tr>
			<tr style="font-size:110%;">
			  <td width="10%" class="centFormCol"><label>1&nbsp;<input type="radio" name="recommend" value="1" <?php if($_POST['recommend'] == 1){ echo 'checked="checked"'; } ?> id="recommend_0" /></label></td>
              <td width="10%" class="centFormCol"><label>2&nbsp;<input type="radio" name="recommend" value="2" <?php if($_POST['recommend'] == 2){ echo 'checked="checked"'; } ?> id="recommend_1" /></label></td>
              <td width="10%" class="centFormCol"><label>3&nbsp;<input type="radio" name="recommend" value="3" <?php if($_POST['recommend'] == 3){ echo 'checked="checked"'; } ?> id="recommend_2" /></label></td>
              <td width="10%" class="centFormCol"><label>4&nbsp;<input type="radio" name="recommend" value="4" <?php if($_POST['recommend'] == 4){ echo 'checked="checked"'; } ?> id="recommend_3" /></label></td>
              <td width="10%" class="centFormCol"><label>5&nbsp;<input type="radio" name="recommend" value="5" <?php if($_POST['recommend'] == 5){ echo 'checked="checked"'; } ?> id="recommend_4" /></label></td>
              <td width="10%" class="centFormCol"><label>6&nbsp;<input type="radio" name="recommend" value="6" <?php if($_POST['recommend'] == 6){ echo 'checked="checked"'; } ?> id="recommend_5" /></label></td>
              <td width="10%" class="centFormCol"><label>7&nbsp;<input type="radio" name="recommend" value="7" <?php if($_POST['recommend'] == 7){ echo 'checked="checked"'; } ?> id="recommend_6" /></label></td>
              <td width="10%" class="centFormCol"><label>8&nbsp;<input type="radio" name="recommend" value="8" <?php if($_POST['recommend'] == 8){ echo 'checked="checked"'; } ?> id="recommend_7" /></label></td>
              <td width="10%" class="centFormCol"><label>9&nbsp;<input type="radio" name="recommend" value="9" <?php if($_POST['recommend'] == 9){ echo 'checked="checked"'; } ?> id="recommend_8" /></label></td>
              <td width="10%" class="centFormCol"><label>10&nbsp;<input type="radio" name="recommend" value="10" <?php if($_POST['recommend'] == 10){ echo 'checked="checked"'; } ?> id="recommend_9" /></label></td>
          </tr>
		</table></td>
		</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
	  <td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
        <tr>
          <td colspan="2" class="lftHeadCol"><h3><?=$sect2h3?></h3></td>
        </tr>
		<tr style="font-size:110%;">
            <td class="lftHeadCol">Dealership Name *</td>
            <td align="right" class="lftHeadCol"<?php if(form_error('dealerName')){ ?> style="background-color:#FFF0F0"<?php } ?>><input name="dealerName" type="text" id="dealerName" size="64" value="<?php echo set_value('dealerName')?>" />&nbsp;<?php echo form_error('dealerName'); ?></td>
        </tr>
			<tr style="font-size:110%;">
			<td class="lftHeadCol">Contact Person *</td>
              <td align="right" class="lftHeadCol"<?php if(form_error('dealerContact')){ ?> style="background-color:#FFF0F0"<?php } ?>><input name="dealerContact" type="text" id="dealerContact" size="64" value="<?php echo set_value('dealerContact')?>" />&nbsp;<?php echo form_error('dealerContact'); ?></td>
        </tr>
			<tr style="font-size:110%;">
              <td class="lftHeadCol">Address</td>
              <td align="right" class="lftHeadCol"><input name="dealerAddress" type="text" id="dealerAddress" size="64" value="<?php echo set_value('dealerAddress')?>" /></td>
        </tr>
			<tr style="font-size:110%;">
              <td class="lftHeadCol">City</td>
              <td align="right" class="lftHeadCol"><input name="dealerCity" type="text" id="dealerCity" size="48" value="<?php echo set_value('dealerCity')?>" /></td>
        </tr>
			<tr style="font-size:110%;">
			  <td class="lftHeadCol">State</td>
			  <td align="right" class="lftHeadCol"><select name="dealerState" class="stateSelect">
		      </select></td>
	    </tr>
			<tr style="font-size:110%;">
			  <td class="lftHeadCol">Zip *</td>
			  <td align="right" class="lftHeadCol"<?php if(form_error('dealerZip')){ ?> style="background-color:#FFF0F0"<?php } ?>><input name="dealerZip" type="text" id="dealerZip" size="6" maxlength="5" value="<?php echo set_value('dealerZip')?>" />&nbsp;<?php echo form_error('dealerZip'); ?></td>
	    </tr>
			<tr style="font-size:110%;">
              <td class="lftHeadCol">Phone Number *</td>
              <td align="right" class="lftHeadCol"<?php if(form_error('dealerPhone')){ ?> style="background-color:#FFF0F0"<?php } ?>><input name="dealerPhone" type="text" id="dealerPhone" size="12" value="<?php echo set_value('dealerPhone')?>" />&nbsp;<?php echo form_error('dealerPhone'); ?></td>
        </tr>
			<tr style="font-size:110%;">
              <td class="lftHeadCol">Email Address *</td>
              <td align="right" class="lftHeadCol"<?php if(form_error('dealerEmail')){ ?> style="background-color:#FFF0F0"<?php } ?>><input name="dealerEmail" type="text" id="dealerEmail" size="64" value="<?php echo set_value('dealerEmail')?>" />&nbsp;<?php echo form_error('dealerEmail'); ?></td>
        </tr>
        </table></td>
  </tr>
		<tr>
			<td height="10"></td>
		</tr>
		<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
			<tr>
				<td class="lftFormCol"><div class="buttons"><input name="reset" type="reset" value="Reset" />&nbsp;&nbsp;|&nbsp;&nbsp;<input type="hidden" value="<?=$action?>" name="action" /><input name="submit" type="submit" value="<?=$button?>" /></div></td>
			</tr>
		</table><input type="hidden" value="<?=$areadev[0]->franID?>" name="franID" /></td>
	</tr>	
	</table>
		
<?php
//$this->functions->debug($areadev);
