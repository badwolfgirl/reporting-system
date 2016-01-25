<?php

$today 				= date('Y-m-d');
if($today >= date('Y-m-16')){
	$start 			= date('Y-m-30', mktime(0, 0, 0, date("n")  , date("j"), date("Y")));
	$end 				= date('Y-m-15', mktime(0, 0, 0, date("n")+1  , date("j"), date("Y")));
}elseif($today <= date('Y-n-16')){
	$start 			= date('Y-m-30', mktime(0, 0, 0, date("n")-1  , date("j"), date("Y")));
	$end 				= date('Y-m-15', mktime(0, 0, 0, date("n")  , date("j"), date("Y")));
}

$viewRpt 			=  date('F', mktime(0, 0, 0, date("n")-1  , date("d"), date("Y")));
$nextRpt 			=  date('F');

$dateOk				= $this->functions->check_in_range($start, $end, $today);
$days					= $this->functions->available_in($today, $start);
$moreDays			= $this->functions->available_for($today, $end);

//echo date('Y-m-16');

//$this->functions->debug($meetings);
?>

<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td colspan="3"><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
			<tr>
				<td class="lftHeadCol"><h2><strong><?=$mainH2?></strong></h2></td>
			</tr>
		</table></td>
	</tr>
	<tr>
	  <td colspan="3" height="10"></td>
  </tr>
	<tr>
	  <td colspan="3"><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
				<tr>
					<td class="lftHeadCol"><table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td><h3><strong>Annual Report</strong></h3></td>
    <td align="right" style="font-size:110%">
    <table border="0" cellspacing="0" cellpadding="2">
        <tr>
            <td align="left"><a href="<?=$ye_link?>"><?=$ye_text?></a></td>
            <td><a href="<?=$ye_link?>"><?=$ye_image?></a></td>
        </tr>
    </table>
<?php
	echo $ye_button;
?>
							</td>
            </tr>
          </table></td>
				</tr>
		</table></td>
  </tr>
  <tr>
		<td colspan="3" height="10"></td>
	</tr>
	<tr>
		<td width="50%" valign="top">
			<table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
				<tr>
					<td class="lftHeadCol"><table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td><h3><strong>Monthly Sales Reports</strong></h3>
		<?php
	if($salesOK[0]->totalSales == 0 && $dateOk == true){
						echo 'You have <strong>'.$moreDays.' more day(s)</strong> to complete your report!';
?>
<?php
	}else{
		if($dateOk == false)
			echo 'Create '.$nextRpt.'\'s report in <strong>'.$days.' day(s)</strong>!';
	}
?></td>
    <td align="right" style="font-size:110%">
<?php
	if($salesOK[0]->totalSales == 0 && $dateOk == true){
?>
						<table border="0" cellspacing="0" cellpadding="2">
							<tr>
								<td align="left"><a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_AD_sales/create/<?=$adInfo[0]->adID?>">Create the <?=$adInfo[0]->region_office_name?> <?=$viewRpt?> Report</a></td>
								<td><a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_AD_sales/create/<?=$adInfo[0]->adID?>">
                                	<img src="<?=$this->config->item('base_url')?>addons/icons/add_doc_64.png" alt="Add" title="Add" width="24" height="24" align="absmiddle" />
                                </a></td>
							</tr>
						</table>
<?php
	if($this->session->userdata('alt_adID')){
?>
						<table border="0" cellspacing="0" cellpadding="2">
							<tr>
								<td align="left"><a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_AD_sales/create/<?=$alt_adInfo[0]->adID?>">Create the <?=$alt_adInfo[0]->region_office_name?> <?=$viewRpt?> Report</a></td>
								<td><a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_AD_sales/create/<?=$alt_adInfo[0]->adID?>">
                                	<img src="<?=$this->config->item('base_url')?>addons/icons/add_doc_64.png" alt="Add" title="Add" width="24" height="24" align="absmiddle" />
                                </a></td>
							</tr>
						</table>
<?php
	}
?>
<?php
	}else{
		if($salesOK != 0)
			echo 'Click <strong>View</strong> below to see previous reports! ';
	}
	
?>							</td>
            </tr>
           </table></td>

				</tr>
				<tr>
					<td class="lftHeadCol"><table class="display dataTable2" cellpadding="5" cellspacing="2" width="100%">
						<thead>
							<tr>
								<th>Month</th>
								<th width="30%" nowrap="nowrap">Action</th>
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
								<td><?=date('F, Y', strtotime($sale->sales_month))?> (<?php if(isset($sale->region_office_name)) echo $sale->region_office_name;?>)</td>
								<td>
									<a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_AD_sales/view/<?=$sale->adID?>/<?=$sm?>/<?=$sy?>">
                                    	<img src="<?=$this->config->item('base_url')?>addons/icons/view_doc_64.png" alt="View" title="View" width="36" height="36" align="absmiddle" /> View</a>
								</td>
							</tr>
<?php 
							}
		}
?>
						</tbody>
					</table></td>
				</tr>
		</table></td>
		<td width="10"></td>
		<td valign="top">
			<table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
				<tr>
					<td class="lftHeadCol"><table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td><h3><strong>Monthly Meeting Reports</strong></h3><br />
</td>
    <td align="right" style="font-size:110%">
<?php
	if(($meetingsOK[0]->rptTotal == 0  &&  $contactsOK[0]->rptTotal == 0)){
?>
						<table border="0" cellspacing="0" cellpadding="2">
							<tr>
								<td align="left"><a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_meeting/create/<?=$adInfo[0]->adID?>">Create the <?=$adInfo[0]->region_office_name?> <?=$viewRpt?> Report</a></td>
								<td><a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_meeting/create/<?=$adInfo[0]->adID?>">
                                	<img src="<?=$this->config->item('base_url')?>addons/icons/add_doc_64.png" alt="Add" title="Add" width="24" height="24" align="absmiddle" />
                                </a></td>
							</tr>
						</table>
<?php
	if($this->session->userdata('alt_adID')){
?>
						<table border="0" cellspacing="0" cellpadding="2">
							<tr>
								<td align="left"><a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_meeting/create/<?=$alt_adInfo[0]->adID?>">Create the <?=$alt_adInfo[0]->region_office_name?> <?=$viewRpt?> Report</a></td>
								<td><a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_meeting/create/<?=$alt_adInfo[0]->adID?>">
                                	<img src="<?=$this->config->item('base_url')?>addons/icons/add_doc_64.png" alt="Add" title="Add" width="24" height="24" align="absmiddle" />
                                </a></td>
							</tr>
						</table>
<?php
	}
?>
<?php
	}else{
		if($meetingsOK[0]->rptTotal != 0  ||  $contactsOK[0]->rptTotal != 0)
			echo 'Click <strong>View</strong> below to see previous reports! ';
			}
?>					</td>
            </tr>
          </table></td>
				</tr>
				<tr>
					<td class="lftHeadCol"><table class="display dataTable2" cellpadding="5" cellspacing="2" width="100%">
						<thead>
							<tr>
								<th>Month</th>
								<th width="30%" nowrap="nowrap">Action</th>
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
								<td><a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_meeting/view/<?=$this->session->userdata('adID')?>/<?=$mm?>/<?=$my?>"><img src="<?=$this->config->item('base_url')?>addons/icons/view_doc_64.png" alt="View" title="View" width="36" height="36" align="absmiddle" /> View</a></td>
							</tr>
<?php 
							}
						}
?>
						</tbody>
					</table></td>
				</tr>
		</table></td>	
	</tr>
</table>

<?php

//echo $this->functions->debug($this->session->userdata('pass'));
