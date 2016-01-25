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
			<tr>
			  <td colspan="2" class="lftGridCol"><h3><?=$sect1h3?></h3></td>
	      </tr>
			<tr style="font-size:120%;">
				<td colspan="2" class="lftGridCol">Please provide a rank for each section below</td>
			</tr>
			<tr style="font-size:110%;">
			 	<td width="50%" class="lftGridCol">Quality of Repairs</td>
			 	<td class="lftGridCol"><?=$survey[0]->repair_quality?></td>
          </tr>
			<tr style="font-size:110%;">
			  <td class="lftGridCol">Cycle Time</td>
			  <td class="lftGridCol"><?=$survey[0]->cycle_time?></td>
		  </tr>
			<tr style="font-size:110%;">
			  <td class="lftGridCol">Customer Service</td>
			  <td class="lftGridCol"><?=$survey[0]->customer_service?></td>
		  </tr>
			<tr style="font-size:110%;">
			  <td class="lftGridCol">Professionalism</td>
			  <td class="lftGridCol"><?=$survey[0]->professionalism?></td>
		  </tr>
			<tr style="font-size:110%;">
			  <td class="lftGridCol">Communication</td>
			  <td class="lftGridCol"><?=$survey[0]->communication?></td>
		  </tr>
			<tr style="font-size:110%;">
			  <td class="lftGridCol">How likely would you be to recommend Colors on Parade services to a friend or family member? (1 Not Likely - 10 Very Likely)</td>
			  <td class="lftGridCol"><?=$survey[0]->recommend?></td>
	      </tr>
		</table></td>
  </tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
			<td><table cellpadding="10" cellspacing="0" width="100%" style="border:1px solid #666666">
        <tr>
          <td colspan="2" class="lftGridCol"><h3><?=$sect2h3?></h3></td>
      </tr>
			<tr style="font-size:110%;">
            <td width="50%" class="lftGridCol">Dealership Name</td>
            <td class="lftGridCol"><?=$survey[0]->dealerName?></td>
        </tr>
			<tr style="font-size:110%;">
			<td class="lftGridCol">Contact Person</td>
              <td class="lftGridCol"><?=$survey[0]->dealerContact?></td>
        </tr>
			<tr style="font-size:110%;">
              <td class="lftGridCol">Address</td>
              <td class="lftGridCol"><?=$survey[0]->dealerAddress?></td>
        </tr>
			<tr style="font-size:110%;">
              <td class="lftGridCol">City, State &amp; Zip</td>
              <td class="lftGridCol"><?=$survey[0]->dealerCity?></td>
        </tr>
			<tr style="font-size:110%;">
			  <td class="lftGridCol">State</td>
			  <td class="lftGridCol"></td>
	    </tr>
			<tr style="font-size:110%;">
			  <td class="lftGridCol">Zip</td>
			  <td class="lftGridCol"><?=$survey[0]->dealerZip?></td>
	    </tr>
			<tr style="font-size:110%;">
              <td class="lftGridCol">Phone Number</td>
              <td class="lftGridCol"><?=$survey[0]->dealerPhone?></td>
        </tr>
			<tr style="font-size:110%;">
              <td class="lftGridCol">Email Address</td>
              <td class="lftGridCol"><?=$survey[0]->dealerEmail?></td>
        </tr>
        </table></td>
  </tr>
		<tr>
			<td height="10"></td>
		</tr>
		<tr>
			<td><table cellpadding="10" cellspacing="0" width="100%" style="border:1px solid #666666">
			<tr>
			  <td class="rgtGridCol"><em>Submitted by <?=$survey[0]->submittedBy?> on <?=date("m/d/Y", strtotime($survey[0]->dateSubmit))?></em></td>
		  </tr>
		<tr>
			<td class="centGridCol"><br /><input type="button" value="Print this page" onclick="window.print()"></td>
		</tr>		
		</table></td>
	</tr>	
	</table>
		
<?php
//$this->functions->debug($areadev);
