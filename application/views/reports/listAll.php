<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
			<tr>
				<td class="lftHeadCol"><h2><?=$mainH2?></h2></td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
			<tr>
				<td colspan="3" class="lftHeadCol"><h3><span style="color:#F00;">Red means they report for another AD as well, and may be listed twice!</span></h3></td>
				</tr>
			<tr>
				<td class="lftHeadCol"><h3><strong>IDs</strong></h3></td>
				<td colspan="2" class="lftHeadCol"><h3><strong>Names</strong></h3></td>
			</tr>
	<?php 
	$count['ads'] = 1;
	$count['zees'] = 1;
	
	if($data[0] != false){
		
	foreach($data as $key => $return){
	?>
	
			<tr>
				<td class="lftHeadCol" style="background-color:#F0F0F0; font-size:120%;"><strong><?=$return['adID'].' - '.$return['franID']?></strong></td>
				<td class="lftHeadCol" style="background-color:#F0F0F0; font-size:120%;"><strong><?php if($return['adName'] != '') echo $return['adName']; else echo $return['areaName']; ?></strong></td>
				<td class="rgtHeadCol" style="background-color:#F0F0F0; font-weight:normal; font-style:italic"><a href="#top">Top</a></td>
				</tr>
	<?php
	$count['ads']++;
	if($return['franchisees']){
	foreach($return['franchisees'] as $frans){
		
		$reportADs = explode('|',$frans->reportADs);
		$otherADs='';
		foreach($reportADs as $reportAD){
			if($reportAD != $frans->adID)
				$otherADs	.= $reportAD.', ';
		}
		$otherADs	=	trim($otherADs, ', ');
		
	?>
	
			<tr<?php if($otherADs){ ?> style="color:#F00;"<?php } ?>>
				<td width="5%" class="lftFormCol" style="font-size:120%;"><?=$frans->adID.' - '.$frans->franID?></td>
				<td colspan="2" class="lftFormCol" style="font-size:120%;"><?=$frans->firstName.' '.$frans->lastName?></td>
				</tr>
	<?php 
	$count['zees']++;
	} 
	}else{ ?> 
	<tr>
		<td colspan="3" class="centHeadCol"><strong>No Other Franchisees</strong></td>
		</tr>	
	<?php } ?>         
	<?php } ?>         
	<?php }else{ ?> 
	<tr>
		<td colspan="3" class="centHeadCol"><h3><?=$reports['msg']?></h3></td>
		</tr>
	<?php } ?>        
	<tr>
		<td colspan="3" class="centHeadCol"><strong>ADs total:</strong><?=$count['ads']?><br /><strong>Franchisees total:</strong><?=$count['zees']?></td>
	</tr>	
			
		</table></td>
		</tr>	
	</table>
		
<?php
//echo $this->functions->debug($data);
