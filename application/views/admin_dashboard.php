<?php 
$rptDate 			=  date('m/Y', mktime(0, 0, 0, date("n")  , date("j")-30, date("Y")));
$viewRpt 			=  date('F', mktime(0, 0, 0, date("n")  , date("j")-30, date("Y")));

//$this->functions->debug($ads);

?>
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
	if($oldRpts){
?>
                    <h3>Old Reports: <select onchange="window.location=this.options[this.selectedIndex].value;" style="width:30%">
                        <option value="">------&nbsp;Choose a Report&nbsp;------</option>
<?php 
		$prevYear = NULL;
		foreach($oldRpts as $oldRpt){
			if($prevYear != $oldRpt->year){
			 	echo ' <optgroup label="'.$oldRpt->year.'">';
				$prevYear = $oldRpt->year;	
			}
?>
                        <option value="<?=$this->config->item('base_url').'index.php/reports/monthly_AD_sales/viewAll/-1/'.$oldRpt->link?>"><?=$oldRpt->month?></option>
<?php 
		}
?>                   
                    </select></h3>

<?php 
	}
?>

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
						<th>Sales Report - <?=$viewRpt;?></th>
						<th>Monthly Meeting Report - <?=$viewRpt;?></th>
						<th>End of Year Report - <?=date("Y",strtotime("-1 year"));?></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($ads as $ad){ ?>
					<tr>
						<td align="right" width="10"><?=$ad->adID?></td>
						<td><!--<a href="<?php //$this->config->item('base_url').'index.php/users/manageADs/view/'.$ad->adID?>">-->
							<?=$ad->special_sales_report_name?><!--</a>--></td>
						<td><?=$ad->region_office_name?></td>
						<td>
							<?php if($ad->sales == 0){ ?>
							<a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_AD_sales/create/<?=$ad->adID?>">
              <img src="<?=$this->config->item('base_url')?>addons/icons/add_doc_64.png" alt="Add" title="Add" width="36" height="36" align="absmiddle" /> Add</a>
							<?php }elseif($ad->sales != 0){ ?>
							<a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_AD_sales/edit/<?=$ad->adID?>/<?=$rptDate?>">
              <img src="<?=$this->config->item('base_url')?>addons/icons/edit_doc_64.png" alt="Edit" title="Edit" width="36" height="36" align="absmiddle" /> Edit</a>
							&nbsp;&nbsp;|&nbsp;&nbsp;
							<a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_AD_sales/view/<?=$ad->adID?>/<?=$rptDate?>">
              <img src="<?=$this->config->item('base_url')?>addons/icons/view_doc_64.png" alt="View" title="View" width="36" height="36" align="absmiddle" /> View<!-- ( <?php echo $ad->sales; if($ad->sales == 1) echo ' Tech '; else echo ' Techs'; ?> ) --></a>
							<?php } ?></td>
						<td>
							<?php if($ad->meetings == false){ ?>
							<a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_meeting/create/<?=$ad->adID?>">
              <img src="<?=$this->config->item('base_url')?>addons/icons/add_doc_64.png" alt="Add" title="Add" width="36" height="36" align="absmiddle" /> Add</a>
							<?php }elseif($ad->meetings == true){ ?>
							<a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_meeting/view/<?=$ad->adID?>/<?=$rptDate?>">
              <img src="<?=$this->config->item('base_url')?>addons/icons/view_doc_64.png" alt="View" title="View" width="36" height="36" align="absmiddle" /> View</a>
							<?php } ?></td>
						<td>
							<?=$ad->ye_button?></td>
					</tr>
				<?php } ?>
			</tbody>
			</table>
		</td>	
	</tr>
</table>
