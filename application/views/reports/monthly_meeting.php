<?php

$date 			= date($this->uri->segment(6).'-'.$this->uri->segment(5).'-01');
$lastMonth 	= strtotime ( '-1 month' , strtotime ( $date ) ) ;
$nextMonth 	= strtotime ( '+1 month' , strtotime ( $date ) ) ;

?>
	
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
				<td class="lftHeadCol" colspan="9"><h3><?=$sect1h3?></h3></td>
			</tr>
			<tr>
				<td width="10%" class="lftHeadCol"></td>
				<td width="40%" class="centHeadCol" colspan="4" align="center">Weekly Meeting</td>
				<td width="30%" class="centHeadCol" colspan="3" align="center">Monthly Meetings</td>		
				<td width="20%" class="rgtHeadCol" colspan="2"></td>
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
	
	?>
			<tr>
				<td class="lftFormCol"><strong><?=$report->firstName.' '.$report->lastName?></strong><br /><?=$report->adID.' - '.$report->franID?></td>		
				<td class="centFormCol"><p><?php if($report->week1_attempt == 'yes') echo 'Contacted'; else echo 'Not Contacted'; ?></p></td>
				<td class="centFormCol"><p><?php if($report->week2_attempt == 'yes') echo 'Contacted'; else echo 'Not Contacted'; ?></p></td>
				<td class="centFormCol"><p><?php if($report->week3_attempt == 'yes') echo 'Contacted'; else echo 'Not Contacted'; ?></p></td>
				<td class="centFormCol"><p><?php if($report->week4_attempt == 'yes') echo 'Contacted'; else echo 'Not Contacted'; ?></p></td>
				<td class="centFormCol"><p><?php if($report->meeting_held == 'yes') echo 'Meeting Held'; else echo 'Meeting Not Held'; ?></p></td>
				<td class="centFormCol"><p><?php if($report->meeting_attended == 'yes') echo 'Meeting Attended'; else echo 'Meeting Not Attended'; ?></p></td>
				<td class="centFormCol"><p><?php if($report->inperson_meeting == 'yes') echo 'In Person'; else echo 'Not In Person'; ?></p></td>
				<td class="lftFormCol" align="center"><?=$report->comments?></td>		
			</tr>
	<?php } ?>          
	<?php }else{ ?> 
	<tr>
		<td class="centHeadCol" colspan="9"><h3><?=$reports['frans']['msg']?></h3></td>
	</tr>	
	<?php } ?>        
			
		</table></td>
		</tr>
		<tr>
			<td height="10"></td>
		</tr>
		<tr valign="top">
			<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
				<tr>
					<td class="lftHeadCol" colspan="8"><h3><?=$sect2h3?></h3></td>
				</tr>
				<tr>			
					<td width="10" class="lftFormCol">&nbsp;</td>			
					<td class="centHeadCol">Name</td>
					<td class="centHeadCol">Phone #</td>
					<td class="centHeadCol">Email</td>
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
					<td class="lftFormCol"><?=$sale->name?></td>		
					<td class="lftFormCol"><?=$sale->phone?></td>		
					<td class="lftFormCol"><?=$sale->email?></td>		
					<td class="lftFormCol"><?=$sale->address?></td>
					<td class="lftFormCol"><?=$sale->city?></td>
					<td class="lftFormCol"><?=$sale->state?></td>
					<td class="lftFormCol"><?=$sale->zip?></td>
				</tr>	
	<?php
			$s++; 
		} 
	}else{ ?> 
	<tr>
		<td class="centHeadCol" colspan="8"><h3><?=$reports['sales']['msg']?></h3></td>
	</tr>	
	<?php } ?>        
			</table></td>
		<tr>
			<td height="10"></td>
		</tr>
			<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
				<tr>
					<td class="lftHeadCol" colspan="8"><h3><?=$sect3h3?></h3></td>
				</tr>
				<tr>			
					<td width="10" class="centHeadCol">&nbsp;</td>
					<td class="centHeadCol">Name</td>
					<td class="centHeadCol">Phone #</td>
					<td class="centHeadCol">Email</td>
					<td class="lftHeadCol">Address</td>
					<td class="lftHeadCol">City</td>
					<td class="lftHeadCol">State</td>
					<td class="lftHeadCol">Zip</td>
				</tr>
	<?php 
	
	if($reports['prosp'][0] != false){
		$p=1;
		foreach($reports['prosp'] as $key => $prosp){ 
?>
				<tr>			
					<td class="lftFormCol"><?=$p?></td>			
					<td class="lftFormCol"><?=$prosp->name?></td>		
					<td class="lftFormCol"><?=$prosp->phone?></td>		
					<td class="lftFormCol"><?=$prosp->email?></td>		
					<td class="lftFormCol"><?=$prosp->address?></td>
					<td class="lftFormCol"><?=$prosp->city?></td>
					<td class="lftFormCol"><?=$prosp->state?></td>
					<td class="lftFormCol"><?=$prosp->zip?></td>
				</tr>	
	<?php 	
			$p++;
		}          
	}else{ ?> 
	<tr>
		<td class="centHeadCol" colspan="8"><h3><?=$reports['prosp']['msg']?></h3></td>
	</tr>	
	<?php } ?>        
			</table></td>
		</tr>
		<tr>
			<td height="10"></td>
		</tr>
		<tr>
			<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
				<tr>
					<td colspan="2" class="centHeadCol">
						<a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_meeting/print_report/<?=$areadev[0]->adID?>/<?php echo $this->uri->segment(5).'/'.$this->uri->segment(6)?>" onclick="basicPopup(this.href);return false">
							<img src="<?=$this->config->item('base_url')?>addons/icons/print.png" align="absmiddle" border="0" hspace="5" width="24" /> <span style="font-size:150%">Print Report</span>
						</a>
					</td>
				</tr>
<?php if($this->session->userdata('adID') == '-1'){ ?>
				<tr>
					<td width="50%" class="lftHeadCol"><a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_meeting/view/<?=$areadev[0]->adID?>/<?=date('m/Y',$lastMonth)?>"><?=date('F Y',$lastMonth)?>'s Report</a></td>
					<td width="50%" class="rgtHeadCol"><a href="<?=$this->config->item('base_url')?>index.php/reports/monthly_meeting/view/<?=$areadev[0]->adID?>/<?=date('m/Y',$nextMonth)?>"><?=date('F Y',$nextMonth)?>'s Report</a></td>
				</tr>
<?php } ?>
			</table></td>
		</tr>	
	</table>
		
<?php
		//$this->functions->debug($reports['frans']);
