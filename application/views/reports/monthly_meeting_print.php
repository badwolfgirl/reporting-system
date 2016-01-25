
<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #666666">
			<tr>
				<td class="lftHeadCol"><h2><?=$mainh2?></h2></td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td><table cellpadding="10" cellspacing="0" width="100%" style="border:1px solid #666666">
			<tr>
				<td class="lftGridColLast_hd" colspan="9"><h3><?=$sect1h3?></h3></td>
			</tr>
			<tr>
				<td width="10%" class="centGridCol_hd"></td>
				<td width="40%" class="centGridCol_hd" colspan="4">Weekly Contact Attempt</td>
				<td width="30%" class="centGridCol_hd" colspan="3">Monthly Meetings</td>		
				<td width="20%" class="centGridColLast_hd" colspan="2"></td>
			</tr>
			<tr>
				<td class="centGridCol_hd"></td>
				<td class="centGridCol_hd">Week 1</td>
				<td class="centGridCol_hd">Week 2</td>
				<td class="centGridCol_hd">Week 3</td>
				<td class="centGridCol_hd">Week 4</td>
				<td class="centGridCol_hd">Meeting Held</td>
				<td class="centGridCol_hd">Meeting Attended</td>
				<td class="centGridCol_hd">In Person Meeting</td>
				<td class="centGridColLast_hd">Comments</td>
			</tr>
	<?php 
	
	if($reports['frans'][0] != false){
	foreach($reports['frans'] as $key => $report){ 
	
	?>
			<tr>
				<td class="lftGridCol"><?=$report->firstName.' '.$report->lastName?></td>		
				<td class="centGridCol"><p><?php if($report->week1_attempt == 'yes') echo 'Contacted'; else echo 'Not Contacted'; ?></p></td>
				<td class="centGridCol"><p><?php if($report->week2_attempt == 'yes') echo 'Contacted'; else echo 'Not Contacted'; ?></p></td>
				<td class="centGridCol"><p><?php if($report->week3_attempt == 'yes') echo 'Contacted'; else echo 'Not Contacted'; ?></p></td>
				<td class="centGridCol"><p><?php if($report->week4_attempt == 'yes') echo 'Contacted'; else echo 'Not Contacted'; ?></p></td>
				<td class="centGridCol"><p><?php if($report->meeting_held == 'yes') echo 'Meeting Held'; else echo 'Meeting Not Held'; ?></p></td>
				<td class="centGridCol"><p><?php if($report->meeting_attended == 'yes') echo 'Meeting Attended'; else echo 'Meeting Not Attended'; ?></p></td>
				<td class="centGridCol"><p><?php if($report->inperson_meeting == 'yes') echo 'In Person'; else echo 'Not In Person'; ?></p></td>
				<td class="lftGridColLast"><?=$report->comments?></td>		
			</tr>
	<?php } ?>          
	<?php }else{ ?> 
	<tr>
		<td class="lftGridColLast" colspan="9"><h3><?=$reports['frans']['msg']?></h3></td>
	</tr>	
	<?php } ?>        
			
		</table></td>
		</tr>
		<tr>
			<td height="10"></td>
		</tr>
		<tr valign="top">
			<td><table cellpadding="10" cellspacing="0" width="100%" style="border:1px solid #666666">
				<tr>
					<td class="lftGridColLast_hd" colspan="8"><h3><?=$sect2h3?></h3></td>
				</tr>
				<tr>			
					<td width="10" class="centGridCol_hd">&nbsp;</td>			
					<td class="centGridCol_hd">Name</td>
					<td class="centGridCol_hd">Phone #</td>
					<td class="centGridCol_hd">Email</td>
					<td class="centGridCol_hd">Address</td>
					<td class="centGridCol_hd">City</td>
					<td class="centGridCol_hd">State</td>
					<td class="centGridColLast_hd">Zip</td>
				</tr>
	<?php 
	
	if($reports['sales'][0] != false){
		$s=1;
		foreach($reports['sales'] as $key => $sale){ 
	
	?>
				<tr>			
					<td class="lftGridCol"><?=$s?></td>			
					<td class="lftGridCol"><?=$sale->name?></td>		
					<td class="lftGridCol"><?=$sale->phone?></td>		
					<td class="lftGridCol"><?=$sale->email?></td>		
					<td class="lftGridCol"><?=$sale->address?></td>
					<td class="lftGridCol"><?=$sale->city?></td>
					<td class="lftGridCol"><?=$sale->state?></td>
					<td class="lftGridColLast"><?=$sale->zip?></td>
				</tr>	
	<?php
			$s++; 
		} 
	}else{ ?> 
	<tr>
		<td class="lftGridColLast" colspan="8"><h3><?=$reports['sales']['msg']?></h3></td>
	</tr>	
	<?php } ?>        
			</table></td>
		<tr>
			<td height="10"></td>
		</tr>
			<td><table cellpadding="10" cellspacing="0" width="100%" style="border:1px solid #666666">
				<tr>
					<td class="lftGridColLast_hd" colspan="8"><h3><?=$sect3h3?></h3></td>
				</tr>
				<tr>			
					<td width="10" class="centGridCol_hd">&nbsp;</td>
					<td class="centGridCol_hd">Name</td>
					<td class="centGridCol_hd">Phone #</td>
					<td class="centGridCol_hd">Email</td>
					<td class="centGridCol_hd">Address</td>
					<td class="centGridCol_hd">City</td>
					<td class="centGridCol_hd">State</td>
					<td class="centGridColLast_hd">Zip</td>
				</tr>
	<?php 
	
	if($reports['prosp'][0] != false){
		$p=1;
		foreach($reports['prosp'] as $key => $prosp){ 
?>
				<tr>			
					<td class="lftGridCol"><?=$p?></td>			
					<td class="lftGridCol"><?=$prosp->name?></td>		
					<td class="lftGridCol"><?=$prosp->phone?></td>		
					<td class="lftGridCol"><?=$prosp->email?></td>		
					<td class="lftGridCol"><?=$prosp->address?></td>
					<td class="lftGridCol"><?=$prosp->city?></td>
					<td class="lftGridCol"><?=$prosp->state?></td>
					<td class="lftGridColLast"><?=$prosp->zip?></td>
				</tr>	
	<?php 	
			$p++;
		}          
	}else{ ?> 
	<tr>
		<td class="lftGridColLast" colspan="8"><h3><?=$reports['prosp']['msg']?></h3></td>
	</tr>	
	<?php } ?>        
			</table></td>
		</tr>
		<tr>
			<td><br /><input type="button" value="Print this page" onclick="window.print()"></td>
		</tr>		
	</table>
		
