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
				<td class="centHeadCol">Breakfast Held</td>
				<td class="centHeadCol">Breakfast Attended</td>
				<td class="centHeadCol">In Person Meeting</td>
				<td class="centHeadCol" align="center">Comments</td>
			</tr>
	<?php 
	
	if($reports[0] != false){
		
	foreach($reports as $key => $report){
	?>
	
			<tr>
				<td colspan="9" class="lftHeadCol" style="background-color:#f5f5f5"><h3><strong><?=$report['office']?></strong></h3></td>		
			</tr>
	<?php
	
	foreach($report['frans'] as $frans){
		
	?>
	
			<tr>
				<td class="lftFormCol"><strong><?=$frans->firstName.' '.$frans->lastName?></strong><br /><?=$frans->adID.' - '.$frans->franID?></td>		
				<td class="centFormCol"><p><?php if($frans->week1_attempt == 'yes') echo 'Contacted'; else echo 'Not Contacted'; ?></p></td>
				<td class="centFormCol"><p><?php if($frans->week2_attempt == 'yes') echo 'Contacted'; else echo 'Not Contacted'; ?></p></td>
				<td class="centFormCol"><p><?php if($frans->week3_attempt == 'yes') echo 'Contacted'; else echo 'Not Contacted'; ?></p></td>
				<td class="centFormCol"><p><?php if($frans->week4_attempt == 'yes') echo 'Contacted'; else echo 'Not Contacted'; ?></p></td>
				<td class="centFormCol"><p><?php if($frans->breakfast_held == 'yes') echo 'Meeting Held'; else echo 'Meeting Not Held'; ?></p></td>
				<td class="centFormCol"><p><?php if($frans->breakfast_attended == 'yes') echo 'Meeting Attended'; else echo 'Meeting Not Attended'; ?></p></td>
				<td class="centFormCol"><p><?php if($frans->inperson_meeting == 'yes') echo 'In Person'; else echo 'Not In Person'; ?></p></td>
				<td class="lftFormCol" align="center"><?=$frans->comments?></td>		
			</tr>
	<?php } ?>   
	<?php } ?>         
	<?php }else{ ?> 
	<tr>
		<td class="centHeadCol" colspan="9"><h3><?=$reports['msg']?></h3></td>
	</tr>	
	<?php } ?>        
			
		</table></td>
		</tr>	
	</table>
		
<?php

//echo $this->functions->debug($reports);
