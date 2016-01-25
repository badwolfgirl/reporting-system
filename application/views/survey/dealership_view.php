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
		<td><table cellpadding="15" cellspacing="2" width="100%" style="border:1px solid #ccc">
			<tr>
			  <td colspan="2" class="lftHeadCol"><h3><?=$sect1h3?></h3></td>
	      </tr>
			<tr style="font-size:120%;">
				<td colspan="2" class="lftHeadCol">Please provide a rank for each section below</td>
			</tr>
			<tr style="font-size:110%;">
			 	<td width="50%" class="lftFormCol">Quality of Repairs</td>
			 	<td class="lftFormCol"><?=$survey[0]->repair_quality?></td>
          </tr>
			<tr style="font-size:110%;">
			  <td class="lftFormCol">Cycle Time</td>
			  <td class="lftFormCol"><?=$survey[0]->cycle_time?></td>
		  </tr>
			<tr style="font-size:110%;">
			  <td class="lftFormCol">Customer Service</td>
			  <td class="lftFormCol"><?=$survey[0]->customer_service?></td>
		  </tr>
			<tr style="font-size:110%;">
			  <td class="lftFormCol">Professionalism</td>
			  <td class="lftFormCol"><?=$survey[0]->professionalism?></td>
		  </tr>
			<tr style="font-size:110%;">
			  <td class="lftFormCol">Communication</td>
			  <td class="lftFormCol"><?=$survey[0]->communication?></td>
		  </tr>
			<tr style="font-size:110%;">
			  <td class="lftFormCol">How likely would you be to recommend Colors on Parade services to a friend or family member? (1 Not Likely - 10 Very Likely)</td>
			  <td class="lftFormCol"><?=$survey[0]->recommend?></td>
	      </tr>
		</table></td>
  </tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
	  <td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
        <tr>
          <td colspan="2" class="lftHeadCol"><h3><?=$sect2h3?></h3></td>
      </tr>
			<tr style="font-size:110%;">
            <td width="50%" class="lftHeadCol">Dealership Name</td>
            <td align="right" class="lftFormCol"><?=$survey[0]->dealerName?></td>
        </tr>
			<tr style="font-size:110%;">
			<td class="lftHeadCol">Contact Person</td>
              <td align="right" class="lftFormCol"><?=$survey[0]->dealerContact?></td>
        </tr>
			<tr style="font-size:110%;">
              <td class="lftHeadCol">Address</td>
              <td align="right" class="lftFormCol"><?=$survey[0]->dealerAddress?></td>
        </tr>
			<tr style="font-size:110%;">
              <td class="lftHeadCol">City</td>
              <td align="right" class="lftFormCol"><?=$survey[0]->dealerCity?></td>
        </tr>
			<tr style="font-size:110%;">
			  <td class="lftHeadCol">State</td>
			  <td align="right" class="lftFormCol"></td>
	    </tr>
			<tr style="font-size:110%;">
			  <td class="lftHeadCol">Zip</td>
			  <td align="right" class="lftFormCol"><?=$survey[0]->dealerZip?></td>
	    </tr>
			<tr style="font-size:110%;">
              <td class="lftHeadCol">Phone Number</td>
              <td align="right" class="lftFormCol"><?=$survey[0]->dealerPhone?></td>
        </tr>
			<tr style="font-size:110%;">
              <td class="lftHeadCol">Email Address</td>
              <td align="right" class="lftFormCol"><?=$survey[0]->dealerEmail?></td>
        </tr>
        </table></td>
  </tr>
		<tr>
			<td height="10"></td>
		</tr>
		<tr>
		<td><table cellpadding="10" cellspacing="2" width="100%" style="border:1px solid #ccc">
			<tr>
			  <td class="rgtFormCol"><em>Submitted by <?=$survey[0]->submittedBy?> on <?=date("m/d/Y", strtotime($survey[0]->dateSubmit))?></em></td>
		  </tr>
			<tr>
				<td class="centHeadCol">
                	<a href="<?=$this->config->item('base_url')?>index.php/survey/dealer_survey/printView/<?=$adInfo[0]->adID?>/<?php echo $survey[0]->ID?>" onclick="basicPopup(this.href);return false">
                        <img src="/addons/icons/print.png" align="absmiddle" border="0" hspace="5" width="24" /> <span style="font-size:150%">Print Report</span>
                    </a></td>
			</tr>
		</table></td>
	</tr>	
	</table>
		
<?php
//$this->functions->debug($areadev);
