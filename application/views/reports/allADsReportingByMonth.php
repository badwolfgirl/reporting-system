<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
			<tr>
				<td class="lftHeadCol"><h2><?=$mainH2?></h2></td>
			</tr>
			<tr>
				<td class="lftHeadCol">
					<h3><a href="#">Message Board</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Document Center</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Links</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">PDC Shop</a>&nbsp;&nbsp;|&nbsp;&nbsp;Reports </h3>
				</td>
			</tr>
			<tr>
				<td class="lftHeadCol">
				<?php 
								if($_SERVER['REMOTE_ADDR'] == '64.138.211.45' || $_SERVER['REMOTE_ADDR'] == '66.26.116.136'){
																		
									 ?>
								<h3><a href="<?=$this->config->item('base_url')?>">Back to Current Month</a></h3>
							<?php 
								} ?>
				</td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
</table>
<table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
	<tr>
		<td class="lftHeadCol">

			<table class="display dataTable" cellpadding="5" cellspacing="2" width="100%">
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>Area Developer</th>
						<th>Location</th>
						<th>Sales Report - <?=$month;?></th>
						<th>Morning Meeting - <?=$month;?></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($ads as $ad){ ?>
					<tr>
						<td align="right" width="10"><?=$ad->adID?></td>
						<td>
							<?php 
								if($_SERVER['REMOTE_ADDR'] == '64.138.211.45' || $_SERVER['REMOTE_ADDR'] == '66.26.116.136'){ 
									echo '<a href="'.$this->config->item('base_url').'index.php/users/manageADs/view/'.$ad->adID.'">'.$ad->special_sales_report_name.'</a>';
								}else{ 
									echo $ad->special_sales_report_name;
							 	} ?>
						</td>
						<td><?=$ad->region_office_name?></td>
						<td>
							<?php if($ad->sales == 0){ ?>
							<strong>No report created for <?=$month?></strong>
							<?php }elseif($ad->sales != 0){ ?>
							<a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_AD_sales/edit/<?=$ad->adID?>/<?=$rptDate?>">
              <img src="<?=$this->config->item('base_url')?>addons/icons/edit_doc_64.png" alt="Edit" title="Edit" width="36" height="36" align="absmiddle" /> Edit Report</a>
							&nbsp;&nbsp;|&nbsp;&nbsp;
							<a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_AD_sales/view/<?=$ad->adID?>/<?=$rptDate?>">
              <img src="<?=$this->config->item('base_url')?>addons/icons/view_doc_64.png" alt="View" title="View" width="36" height="36" align="absmiddle" /> View Report<!-- ( <?php echo $ad->sales; if($ad->sales == 1) echo ' Tech '; else echo ' Techs'; ?> ) --></a>
							<?php } ?></td>
						<td>
							<?php if($ad->meetings == false){ ?>
							<strong>No report created for <?=$month?></strong>
							<?php }elseif($ad->meetings == true){ ?>
							<a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_meeting/view/<?=$ad->adID?>/<?=$rptDate?>">
              <img src="<?=$this->config->item('base_url')?>addons/icons/view_doc_64.png" alt="View" title="View" width="36" height="36" align="absmiddle" /> View Report</a>
							<?php } ?></td>
					</tr>
				<?php } ?>
			</tbody>
			</table>
		</td>	
	</tr>
</table>

