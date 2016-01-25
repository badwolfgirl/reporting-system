<?php
$attributes = array(
	'name' => 'survery',
	'id' => 'survery'
); 
?>

<?=form_open('survey/damaged_pics/loadSurvey/'.$adID.'/', $attributes);?>
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
			<?php 
	
	if($categories != false){
		
	foreach($categories as $cat){ 
	
	?>
	<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
			<tr>
				<td class="lftHeadCol"><h3><?=$cat->picCatName?> <span style="font-size:80%">( Click the images to view )</span></h3></td>
			</tr>
			<tr>
				<td class="lftHeadCol"><table cellpadding="10" cellspacing="5">
					<tr>
			<?php 
	
	if($cat->pics != false){
		
	$colCount=1;	
	
	foreach($cat->pics as $key => $pic){ 
	
		if($colCount==5){
			echo '</tr><tr>';
			$colCount=1;	
		}
	
	?>
				<td align="center" bgcolor="#f3f3f3"><table border="0" cellspacing="2" cellpadding="10">
					<tr>
						<td colspan="2" height="320" valign="top" align="center" bgcolor="#FFFFFF">
							<a class="damagePics" href="<?=$this->config->item('base_url').'media/images/price_guide_photos/'.$pic->picTitle.'/'.$pic->picPath?>" title="<?=$pic->picTitle?>">
							<img src="<?=$this->config->item('base_url').'media/images/price_guide_photos/'.$pic->picTitle.'/'.$pic->picPath?>" alt="<?=$pic->picTitle?>" style="width:100%; max-width:400px; height:auto;"/></a>
							<input type="hidden" value="<?=$pic->picID?>" name="pic[<?=$pic->picID?>][picID]" id="pic[<?=$pic->picID?>][picID]" />
							<input type="hidden" value="<?=$pic->picCatID?>" name="pic[<?=$pic->picID?>][picCatID]" id="pic[<?=$pic->picID?>][picCatID]" />
							<input type="hidden" value="<?=$adID?>" name="pic[<?=$pic->picID?>][adID]" id="pic[<?=$pic->picID?>][adID]" /></td>
					</tr>
					<tr>
						<td width="50%" align="center" bgcolor="#FFFFFF"><p>Good picture to use?</p>
							<p>
								<label>
									<input type="radio" checked="checked" name="pic[<?=$pic->picID?>][use_it]" value="yes" id="use_it_0" />
									Yes</label>
								<label>
									<input type="radio" name="pic[<?=$pic->picID?>][use_it]" value="no" id="use_it_1" />
									No</label>
							</p></td>
						<td width="50%" align="center" bgcolor="#FFFFFF"><p>What would you charge?
							</p>
							<p>
								<select name="pic[<?=$pic->picID?>][price]" id="pic[<?=$pic->picID?>][price]" class="priceRange" style="width:100px;">
								</select>
							</p></td>
					</tr>
					<tr>
						<td colspan="2" align="center" bgcolor="#FFFFFF"><p>Any comments?</p>
							<p><textarea name="pic[<?=$pic->picID?>][comments]" style="width:98%" id="pic[<?=$pic->picID?>][comments]"></textarea></p></td>
					</tr>
				</table></td>
	<?php 
		$colCount++;
	}
	?>          
	<?php } ?>        
					</tr>			
				</table></td>
			</tr>
		</table></td>
		</tr>
		<tr>
			<td height="10"></td>
		</tr>
	<?php } } ?>          
		<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
			<tr>
				<td class="lftFormCol"><div class="buttons"><input name="reset" type="reset" value="Reset" />&nbsp;&nbsp;|&nbsp;&nbsp;<input type="hidden" value="<?=$action?>" name="action" /><input name="submit" type="submit" value="<?=$button?>" /></div></td>
			</tr>
		</table></td>
	</tr>	
	</table>
		
<?php

		//$this->functions->debug($categories);
