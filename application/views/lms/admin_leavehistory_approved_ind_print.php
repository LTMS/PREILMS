		<div id='normal_report' style='display: none'>
		<?php
		
		print("<table  width='100%' border='1' align='left' cellpadding='1' cellspacing='1'  class='alt_row' style='border-collapse:collapse;'>");
			print('<tr><td align="center" colspan="10"  style="font-size:14px;font-weight:bold;color:Red">'.$title.'</td></tr>');
		
		print("<tr bgcolor='white'  style='font-weight:bold;color:black;border-right:1px solid black; '>");
		print("<td  align='center'  width='2%'>S.No</td>");
		print("<td  align='center' width='10%'>Date</td>");
		print("<td  align='center' width='8%'>Leave Type</td>");
		print("<td  align='center' width='5%'> No.of Days</td>");
		print("<td  align='center' width='22%'>Approved By</td>");
		print("<td  align='center' width='22%'>Reason</td>");
		print("</tr>");
		$row=0;
		foreach($result as $openrow) {
			$row++;
			print("<tr style='font-size:12px'>");
			print("<td  align='left'>".$row."</td>");
			print("<td  align='center'>".date("d-m-Y", strtotime($openrow["FromDate"]))."</td>");
			$type=$openrow["LeaveType"];
			if($type=='Casual Leave'){
				$type='CL';
			}
			else if($type=='Sick Leave'){
				$type='SL';
			}
			else if($type=='Paid Leave'){
				$type='PL';
			}
			else{
				$type='CO';
			}
			print("<td  align='center'>".$type."</td>");
			print("<td  align='center'>".$openrow["TotalDays"]."</td>");
			print("<td  align='left'>".$openrow["ApprovedBy"]."</td>");
			print("<td  align='left'>".$openrow["Reason"]."</td>");
			print("</tr>");
		}
		print("</table>");
		
		
		if(empty($result))	{
			print("<div style='margin:0px 0px 0px 370px'>");
			print("<font style='font-size:2em;color:#254117; font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; >Nothing to Display...!</font>");
			print("</div");
		}
		
		?>
		
		</div>
