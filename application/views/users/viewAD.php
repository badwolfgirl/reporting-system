<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td colspan="3"><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
			<tr>
				<td class="lftHeadCol"><h2><?=$mainh2?></h2></td>
				</tr>
		</table></td>
	</tr>
	<tr>
		<td height="10" colspan="3"></td>
	</tr>
	<tr valign="top">
		<td width="64%"><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
			<tr>
				<td colspan="2" class="lftHeadCol"><h3>Area Information</h3></td>
				</tr>
			<tr>
				<td class="lftHeadCol">Regional Office Name/Location</td>
				<td class="rgtFormCol"><?=$areadev[0]->region_office_name?></td>
				</tr>
			<tr>
				<td class="lftHeadCol">Corporate Business Name</td>
				<td class="rgtFormCol"><?=($areadev[0]->corporate_business_name != '' ? $areadev[0]->corporate_business_name : '-')?></td>
			</tr>
			<tr>
				<td class="lftHeadCol">Special Sales Report Name</td>
				<td class="rgtFormCol"><?=($areadev[0]->special_sales_report_name != '' ? $areadev[0]->special_sales_report_name : '-')?></td>
			</tr>
			<tr>
				<td class="lftHeadCol">DMA Location</td>
				<td class="rgtFormCol"><?=($areadev[0]->DMA_location != '' ? $areadev[0]->DMA_location : '-')?></td>
			</tr>
			<tr>
				<td class="lftHeadCol">Region Color</td>
				<td class="rgtFormCol"><?=$areadev[0]->region_color?></td>
				</tr>
			<tr>
				<td class="lftHeadCol">Active</td>
				<td class="rgtFormCol"><?=$areadev[0]->active?></td>
				</tr>
			<tr>
				<td class="lftHeadCol">7% Royalty?</td>
				<td class="rgtFormCol"><?=$areadev[0]->royalty7?></td>
				</tr>
			<tr>
				<td class="lftHeadCol">1% Ad Fund?</td>
				<td class="rgtFormCol"><?=$areadev[0]->adFund1?></td>
				</tr>
			<tr>
				<td class="lftHeadCol">2% Billing & Collections</td>
				<td class="rgtFormCol"><?=$areadev[0]->billColl2?></td>
				</tr>
			<tr>
				<td colspan="2" class="rgtHeadCol"><a href="#">
        <img src="<?=$this->config->item('base_url')?>addons/icons/edit_doc_64.png" alt="Edit AD" title="Edit AD" width="24" height="24" align="absmiddle" /></a>
				&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="#">
        <img src="<?=$this->config->item('base_url')?>addons/icons/delete_doc_64.png" alt="Delete AD" title="Delete AD" width="24" height="24" align="absmiddle" /></a></td>
				</tr>
		</table>
			<br />
			<table cellpadding="0" cellspacing="2" width="100%" style="border:1px solid #ccc">
				<tr>
					<td colspan="<?=$adColumns?>" class="lftHeadCol"><table width="100%" border="0" cellspacing="0" cellpadding="10">
						<tr>
							<td><h3>Tech Information</h3></td>
						</tr>
					</table></td>
				</tr>
				<tr valign="top">
					<td width="25%"><table cellpadding="10" cellspacing="2" width="100%">
						<tr>
							<td width="25%" class="lftHeadCol">First Name</td>
							</tr>
						<tr>
							<td class="lftHeadCol">Last Name</td>
							</tr>
						<tr>
							<td class="lftHeadCol">Suffix</td>
							</tr>
						<tr>
							<td class="lftHeadCol">Nickname</td>
							</tr>
						<tr>
							<td class="lftHeadCol">Company</td>
							</tr>
						<tr>
							<td class="lftHeadCol">Company</td>
							</tr>
						<tr>
							<td class="lftHeadCol">Date of Birth</td>
							</tr>
						<tr>
							<td class="lftHeadCol">Social Security</td>
							</tr>
						<tr>
							<td class="lftHeadCol">Ein</td>
							</tr>
						<tr>
							<td class="lftHeadCol">Payment Date</td>
							</tr>
						<tr>
							<td class="lftHeadCol">Payment Amount</td>
							</tr>
						<tr>
							<td class="lftHeadCol">Username</td>
							</tr>
						<tr>
							<td class="lftHeadCol">Report Email(s)</td>
						</tr>
						<tr>
							<td height="24" class="lftHeadCol">&nbsp;</td>
						</tr>
					</table></td>
<?php 
	if($adTechs[0] != false){
		foreach($adTechs as $adTech){
	
?>					
					<td><table cellpadding="10" cellspacing="2" width="100%">
						<tr>
							<td class="rgtFormCol"><?=$adTech->firstName?></td>
							</tr>
						<tr>
							<td class="rgtFormCol"><?=$adTech->lastName?></td>
							</tr>
						<tr>
							<td class="rgtFormCol"><?=($adTech->suffix != '' ? $adTech->suffix : '-')?></td>
							</tr>
						<tr>
							<td class="rgtFormCol"><?=($adTech->nickname != '' ? $adTech->nickname : '-')?></td>
							</tr>
						<tr>
							<td class="rgtFormCol"><?=($adTech->custom_sales_report_name != '' ? $adTech->custom_sales_report_name : '-')?></td>
							</tr>
						<tr>
							<td class="rgtFormCol"><?=($adTech->company != '' ? $adTech->company : '-')?></td>
							</tr>
						<tr>
							<td class="rgtFormCol"><?=($adTech->birth_date != '' ? $adTech->birth_date : '-')?></td>
							</tr>
						<tr>
							<td class="rgtFormCol"><?=($adTech->social_security != '' ? $adTech->social_security : '-')?></td>
							</tr>
						<tr>
							<td class="rgtFormCol"><?=($adTech->ein != '' ? $adTech->ein : '-')?></td>
							</tr>
						<tr>
							<td class="rgtFormCol"><?=($adTech->payment_date != '' ? $adTech->payment_date : '-')?></td>
							</tr>
						<tr>
							<td class="rgtFormCol"><?=($adTech->payment_amount != '' ? $adTech->payment_amount : '-')?></td>
							</tr>
						<tr>
							<td class="rgtFormCol"><?=$adTech->username?></td>
							</tr>
						<tr>
							<td class="rgtFormCol"><?=($adTech->emails != '' ? $adTech->emails : 'no email')?></td>
							</tr>
						<tr>
							<td height="24" class="rgtFormCol"><a href="#"><img src="<?=$this->config->item('base_url')?>addons/icons/edit_doc_64.png" alt="Edit Tech" title="Edit Tech" width="24" height="24" align="absmiddle" /></a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="#"><img src="<?=$this->config->item('base_url')?>addons/icons/delete_doc_64.png" alt="Delete Tech" title="Delete Tech" width="24" height="24" align="absmiddle" /></a></td>
							</tr>
					</table></td>
<?php 
		}
	}
	
?>					
				</tr>
		</table></td>
		<td width="10"></td>
		<td width="35%">
        
        <table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
				<tr>
					<td class="lftHeadCol"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td><h3><?=$sect4h3?></h3></td>
							<td align="right"><a href="<?=$this->config->item('base_url')?>index.php/survey/dealer_survey/create/<?=$areadev[0]->adID?>"><img src="<?=$this->config->item('base_url')?>addons/icons/add_doc_64.png" alt="Submit Survey" title="Add Tech" width="24" height="24" align="absmiddle" /></a></td>
						</tr>
					</table></td>
				</tr>
				<tr>
					<td valign="top" class="lftHeadCol"><table class="display dataTable3" cellpadding="5" cellspacing="2" width="100%">
						<thead>
							<tr>
								<th width="40%">Date Submitted</th>
								<th>Dealership</th>
							</tr>
						</thead>
						<tbody>
                        <?php if($surveys){ ?>
                        <?php foreach($surveys as $survey){ ?>
                            <tr>
                                <td><?=date("F d, Y", strtotime($survey->dateSubmit))?></td>
                                <td><a href="<?=$this->config->item('base_url').'index.php/survey/dealer_survey/view/'.$areadev[0]->adID.'/'.$survey->ID?>">
									<?=$survey->dealerName?></a></td>
                            </tr>
                        <?php } ?>
                        <?php } ?>
						</tbody>
					</table></td>
				</tr>
		</table>
			<br />
            
            <table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
				<tr>
					<td class="lftHeadCol"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td><h3><?=$sect1h3?></h3></td>
							<td align="right"><a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_AD_sales/create/<?=$areadev[0]->adID?>"><img src="<?=$this->config->item('base_url')?>addons/icons/add_doc_64.png" alt="Add Tech" title="Submit Report" width="24" height="24" align="absmiddle" /></a></td>
						</tr>
					</table></td>
				</tr>
				<tr>
					<td valign="top" class="lftHeadCol"><table class="display dataTable3" cellpadding="5" cellspacing="2" width="100%">
						<thead>
							<tr>
								<th width="40%">Month</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php 
		if($sales){
			foreach($sales as $sale){ 
				$sd		= explode('-', $sale->sales_month);
				$sy 		= $sd[0];
				$sm 		= $sd[1];
?>
							<tr>
								<td><?=date('F, Y', strtotime($sale->sales_month))?></td>
								<td align="center"><a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_AD_sales/view/<?=$areadev[0]->adID?>/<?=$sm?>/<?=$sy?>"><img src="<?=$this->config->item('base_url')?>addons/icons/view_doc_64.png" alt="View" title="View" width="24" height="24" align="absmiddle" /></a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_AD_sales/edit/<?=$areadev[0]->adID?>/<?=$sm?>/<?=$sy?>"><img src="<?=$this->config->item('base_url')?>addons/icons/edit_doc_64.png" alt="Edit" title="Edit" width="24" height="24" align="absmiddle" /></a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_AD_sales/view/<?=$areadev[0]->adID?>/<?=$sm?>/<?=$sy?>"><img src="<?=$this->config->item('base_url')?>addons/icons/delete_doc_64.png" alt="Delete" title="Delete" width="24" height="24" align="absmiddle" /></a></td>
							</tr>
							<?php
	} 
							 } ?>
						</tbody>
					</table></td>
				</tr>
		</table>
			<br />
			<table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
				<tr>
					<td class="lftHeadCol"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td><h3><?=$sect3h3?></h3></td>
							<td align="right"><a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_meeting/create/<?=$areadev[0]->adID?>"><img src="<?=$this->config->item('base_url')?>addons/icons/add_doc_64.png" alt="Submit Report" title="Add Tech" width="24" height="24" align="absmiddle" /></a></td>
						</tr>
					</table></td>
				</tr>
				<tr>
					<td class="lftHeadCol"><table class="display dataTable3" cellpadding="5" cellspacing="2" width="100%">
						<thead>
							<tr>
								<th width="40%">Month</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php 
				if($meetings){
					foreach($meetings as $meet){ 
						$md		= explode('-', $meet->month);
						$my 		= $md[0];
						$mm 		= $md[1];
?>
							<tr>
								<td><?=date('F, Y', strtotime($meet->month))?></td>
								<td align="center">
                	<a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_meeting/view/<?=$areadev[0]->adID?>/<?=$mm?>/<?=$my?>"><img src="<?=$this->config->item('base_url')?>addons/icons/view_doc_64.png" alt="View" title="View" width="24" height="24" align="absmiddle" /></a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_meeting/view/<?=$areadev[0]->adID?>/<?=$mm?>/<?=$my?>"><img src="<?=$this->config->item('base_url')?>addons/icons/edit_doc_64.png" alt="Edit" title="Edit" width="24" height="24" align="absmiddle" /></a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_meeting/view/<?=$areadev[0]->adID?>/<?=$mm?>/<?=$my?>"><img src="<?=$this->config->item('base_url')?>addons/icons/delete_doc_64.png" alt="Delete" title="Delete" width="24" height="24" align="absmiddle" /></a></td>
							</tr>
							<?php }
						} ?>
						</tbody>
					</table></td>
				</tr>
		</table></td>
	</tr>
		<tr>
			<td colspan="3"><br /></td>
		</tr>
		<tr valign="top">
			<td colspan="3"><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
				<tr>
					<td class="lftHeadCol"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td><h3><?=$sect2h3?></h3></td>
							<td align="right"><a href="<?=$this->config->item('base_url')?>index.php/users/manageADs/addTech/<?php echo $areadev[0]->adID?>"><img src="<?=$this->config->item('base_url')?>addons/icons/add_doc_64.png" alt="Add Tech" title="Add Tech" width="24" height="24" align="absmiddle" /></a></td>
						</tr>
					</table></td>
				</tr>
				<tr>
					<td class="lftHeadCol"><table class="display dataTable4" cellpadding="5" cellspacing="2" width="100%">
						<thead>
							<tr>
								<th width="55">AD ID</th>
								<th width="55">Fran ID</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Nickname</th>
								<th>Email</th>
								<th>Reporting AD IDs</th>
								<th>Active</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 

if($franchisees != false){
	foreach($franchisees as $key => $fran){ 
		//if($fran->active == 'no') $style = 'style="color:#666666;"'; else $style = '';
	
?>
							<tr>
								<td><?=$fran->adID?></td>
								<td><?=$fran->franID?></td>
								<td><?=$fran->firstName?></td>
								<td><?=$fran->lastName?>
									<?=($fran->suffix ? ' '.$fran->suffix : '')?></td>
								<td><?=$fran->nickname?></td>
								<td><?=($fran->email != '' ? $fran->email : '-')?></td>
								<td><?php echo ($fran->reportADs != '' ? trim(str_replace('|', ', ', $fran->reportADs), ', ') : '-');?></td>
								<td><?=$fran->active?></td>
								<td align="right"><a href="<?=$this->config->item('base_url')?>index.php/users/manageADs/addTech/<?=$fran->franID?>/<?=$areadev[0]->adID?>/tech"><img src="<?=$this->config->item('base_url')?>addons/icons/edit_doc_64.png" alt="Edit Tech" title="Edit Tech" width="24" height="24" align="absmiddle" /></a>
									&nbsp;&nbsp;|&nbsp;&nbsp;
									<a href="<?=$this->config->item('base_url')?>index.php/users/manageADs/deleteTech/<?=$fran->franID?>/<?=$areadev[0]->adID?>"><img src="<?=$this->config->item('base_url')?>addons/icons/delete_doc_64.png" alt="Delete Tech" title="Delete Tech" width="24" height="24" align="absmiddle" /></a></td>
							</tr>
							<?php
	} 
 } ?>
						</tbody>
					</table></td>
				</tr>
			</table></td>
		</tr>			
	</table>
		
