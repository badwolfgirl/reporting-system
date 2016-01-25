<h2>Area Developers - Choose an Action</h2>
<table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
	<tr>
		<td class="lftHeadCol">
			<table width="100%" class="display dataTable" cellpadding="5" cellspacing="2">
				<thead>
					<tr>
						<th>Area Developer</th>
						<th>Location</th>
						<th width="200">Sales Report - <?=date('F');?></th>
						<th width="200">Morning Meeting - <?=date('F');?></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($ads as $ad){ ?>
					<tr>
						<td><?php echo $ad->firstName;  if($ad->nickname != '') echo ' ('.$ad->nickname.')'; echo ' '.$ad->lastName?><?php if($ad->suffix != '') echo ' '.$ad->suffix; ?></td>
						<td><?=$ad->region_office_name?></td>
						<td>
							<?php if($ad->sales == 0){ ?>
							<a href="index.php/reports/monthly_AD_sales/create/<?=$ad->adID?>">Create Report</a>
							<?php }elseif($ad->sales != 0){ ?>
							<a href="index.php/reports/monthly_AD_sales/view/<?=$ad->adID?>/<?=date('m')?>/<?=date('Y')?>">View Report ( <?php echo $ad->sales; if($ad->sales == 1) echo ' Tech '; else echo ' Techs'; ?> )</a></td>
							<?php } ?>
						<td>
							<?php if($ad->meetings == 0){ ?>
							<a href="index.php/reports/monthly_meeting/create/<?=$ad->adID?>">Create Report</a>
							<?php }elseif($ad->meetings != 0){ ?>
							<a href="index.php/reports/monthly_meeting/view/<?=$ad->adID?>/<?=date('m')?>/<?=date('Y')?>">View Report ( <?php echo $ad->meetings; if($ad->meetings == 1) echo ' Tech'; else echo ' Techs'; ?> )</a></td>
							<?php } ?>
					</tr>
				<?php } ?>
			</tbody>
			</table>
		</td>	
	</tr>
</table>

