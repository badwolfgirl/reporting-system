<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #666666">
			<tr>
				<td style="font-weight:bold; border-bottom:1px dotted #666666; text-align:left;">
					<h2 style="color: #000000; font-size: 16px; font-weight: normal; margin:0; padding:0;"><?=$mainh2?></h2>
				</td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td><table cellpadding="10" cellspacing="0" width="100%" style="border:1px solid #666666">
			<tr>
				<td style="font-weight:bold; border-bottom:1px dotted #666666; text-align:left;" colspan="9">
					<h3 style="color: #000000; font-size: 14px; margin:0; padding:5px 0; font-weight: normal;"><?=$sect1h3?></h3>
				</td>
			</tr>
			<tr>
				<td width="10%" style="font-weight:bold; border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;"></td>
				<td width="40%" style="font-weight:bold; border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;" colspan="4">Weekly Contact Attempt</td>
				<td width="30%" style="font-weight:bold; border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;" colspan="3">Monthly Meetings</td>		
				<td width="20%" style="font-weight:bold; border-bottom:1px dotted #666666; text-align:center;"></td>
			</tr>
			<tr>
				<td style="font-weight:bold; border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;"></td>
				<td style="font-weight:bold; border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;">Week 1</td>
				<td style="font-weight:bold; border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;">Week 2</td>
				<td style="font-weight:bold; border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;">Week 3</td>
				<td style="font-weight:bold; border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;">Week 4</td>
				<td style="font-weight:bold; border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;">Meeting Held</td>
				<td style="font-weight:bold; border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;">Meeting Attended</td>
				<td style="font-weight:bold; border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;">In Person Meeting</td>
				<td style="font-weight:bold; border-bottom:1px dotted #666666; text-align:center;">Comments</td>
			</tr>
<?php 
	foreach($emailData['frans'] as $key => $data){ 
?>
			<tr>
				<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:left;"><?=$data['firstName'].' '.$data['lastName']?></td>		
				<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;"><p><?php if($data['week1_attempt'] == 'yes') echo 'Contacted'; else echo 'Not Contacted'; ?></p></td>
				<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;"><p><?php if($data['week2_attempt'] == 'yes') echo 'Contacted'; else echo 'Not Contacted'; ?></p></td>
				<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;"><p><?php if($data['week3_attempt'] == 'yes') echo 'Contacted'; else echo 'Not Contacted'; ?></p></td>
				<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;"><p><?php if($data['week4_attempt'] == 'yes') echo 'Contacted'; else echo 'Not Contacted'; ?></p></td>
				<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;"><p><?php if($data['meeting_held'] == 'yes') echo 'Meeting Held'; else echo 'Meeting Not Held'; ?></p></td>
				<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;"><p><?php if($data['meeting_attended'] == 'yes') echo 'Meeting Attended'; else echo 'Meeting Not Attended'; ?></p></td>
				<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;"><p><?php if($data['inperson_meeting'] == 'yes') echo 'In Person'; else echo 'Not In Person'; ?></p></td>
				<td style="border-bottom:1px dotted #666666; text-align:left;"><?=$data['comments']?></td>		
			</tr>
<?php 
	}
?>          
		</table></td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
<?php 
	if($emailData['sales'][0] != false){
?>
	<tr valign="top">
		<td><table cellpadding="10" cellspacing="0" width="100%" style="border:1px solid #666666">
			<tr>
				<td style="font-weight:bold; border-bottom:1px dotted #666666; text-align:left;" colspan="8">
					<h3 style="color: #000000; font-size: 14px; margin:0; padding:5px 0; font-weight: normal;"><?=$sect2h3?></h3>
				</td>
			</tr>
			<tr>			
				<td width="10" style="font-weight:bold; border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;">&nbsp;</td>			
				<td style="font-weight:bold; border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;">Name</td>
				<td style="font-weight:bold; border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;">Phone #</td>
				<td style="font-weight:bold; border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;">Email</td>
				<td style="font-weight:bold; border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;">Address</td>
				<td style="font-weight:bold; border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;">City</td>
				<td style="font-weight:bold; border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;">State</td>
				<td style="font-weight:bold; border-bottom:1px dotted #666666; text-align:center;">Zip</td>
			</tr>
<?php 
		$s=1;
		foreach($emailData['sales'] as $key => $sale){ 
?>
		<tr>			
			<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:left;"><?=$s?></td>			
			<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:left;"><?=$sale['name']?></td>		
			<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:left;"><?=$sale['phone']?></td>		
			<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:left;"><?=$sale['email']?></td>		
			<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:left;"><?=$sale['address']?></td>
			<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:left;"><?=$sale['city']?></td>
			<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:left;"><?=$sale['state']?></td>
			<td style="border-bottom:1px dotted #666666; text-align:left;"><?=$sale['zip']?></td>
		</tr>	
<?php
			$s++; 
		} 
?>
		</table></td>
	</tr>
<?php
	}else{ 
?> 
	<tr>
		<td style="border-bottom:1px dotted #666666; text-align:left;">
			<h4 style="color: #333; font-size: 12px; font-weight: normal; text-align:center; margin:0; padding:0;">No Sales Contacts Reported</h4>
		</td>
	</tr>
<?php 
	} 
?>        
	<tr>
		<td height="10"></td>
	</tr>
<?php 
	if($emailData['prosp'][0] != false){
?>
		<td><table cellpadding="10" cellspacing="0" width="100%" style="border:1px solid #666666">
			<tr>
				<td class="lftGridColLast_hd" colspan="8"><h3 style="color: #000000; font-size: 14px; margin:0; padding:5px 0; font-weight: normal;"><?=$sect3h3?></h3></td>
			</tr>
			<tr>			
				<td width="10" style="font-weight:bold; border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;">&nbsp;</td>
				<td style="font-weight:bold; border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;">Name</td>
				<td style="font-weight:bold; border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;">Phone #</td>
				<td style="font-weight:bold; border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;">Email</td>
				<td style="font-weight:bold; border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;">Address</td>
				<td style="font-weight:bold; border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;">City</td>
				<td style="font-weight:bold; border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:center;">State</td>
				<td class="centGridColLast_hd">Zip</td>
			</tr>
	<?php 
	
		$p=1;
		foreach($emailData['prosp'] as $key => $prosp){ 
?>
			<tr>			
				<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:left;"><?=$p?></td>			
				<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:left;"><?=$prosp['name']?></td>		
				<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:left;"><?=$prosp['phone']?></td>		
				<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:left;"><?=$prosp['email']?></td>		
				<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:left;"><?=$prosp['address']?></td>
				<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:left;"><?=$prosp['city']?></td>
				<td style="border-bottom:1px dotted #666666; border-right:1px dotted #666666; text-align:left;"><?=$prosp['state']?></td>
				<td style="border-bottom:1px dotted #666666; text-align:left;"><?=$prosp['zip']?></td>
			</tr>	
<?php 	
			$p++;
		}  
?>
		</table></td>
	</tr>
<?php
	}else{ 
?> 
	<tr>
		<td style="border-bottom:1px dotted #666666; text-align:left;">
			<h4 style="color: #333; font-size: 12px; font-weight: normal; text-align:center; margin:0; padding:0;">No Prospective Franchisees Reported</h4>
		</td>
	</tr>	
<?php
	} 
?>        
</table>
		
