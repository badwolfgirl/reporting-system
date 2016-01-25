<?php

//echo $this->functions->debug($reports);

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
				<td width="40%" class="centHeadCol" colspan="4" align="center">Weekly Contact Attempt</td>
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
	
	if($reports[0] != false){
		
	foreach($reports as $key => $report){
	?>
			<tr>
				<td colspan="9" class="lftHeadCol" style="background-color:#f5f5f5"><h3><strong><?=$report['office']?></strong></h3></td>		
			</tr>
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
		//$this->functions->debug($reports['frans']);
