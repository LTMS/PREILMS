<?php 				
	if($Time_Activity){
		
		
		print("<table width='100%' border='1' align='center' cellpadding='1' cellspacing='1'   style='border-collapse:collapse;'>");

					print("<tr style='color:red;font-size:16px;font-weight:bolder; '>
										<td colspan='13' align='center'>$title</td></tr>");
				
					print("<tr bgcolor='#518C9C' id='hdr_row' style='font-size:15px;font-weight:bold;background-color:white;color:black;border-right:1px solid  black; '>");
					print("<td width='3%' align='center'>S.No</td>");
					print("<td width='10%' align='center'>Employee Name</td>");
					print("<td width='6%' align='center'>Date</td>");
					print("<td width='5%' align='center'>IN Time</td>");
					print("<td width='5%' align='center'>Late Hours</td>");
					print("<td width='5%' align='center'>OUT Time</td>");
					print("<td width='5%' align='center'>Duty Hours</td>");
					print("<td width='5%' align='center'>OT Hours</td>");
					print("<td width='5%' align='center'>Total Hours</td>");
					print("<td width='10%' align='center'>Updated Date</td>");
					print("</tr>");
					
					$counter=0;
					foreach($Time_Activity as $openrow) {
						$counter++;
						$rowid="row".$counter;
						$date=$openrow["ts_date"];
						$name=$openrow["ts_name"];
						$d2=$date.',  '.date('D', strtotime($date));
						$rec_date=date('d-m-Y H:m:s', strtotime($openrow["recorded_time"]));
					
						print("<tr id='$rowid'  class='small'>");
						print("<td width='3%' align='center'> ".$counter."</td>");
						print("<td width='5%' align='left'>".$openrow["ts_name"]." </td>");
						print("<td width='6%' align='left'>$d2</td>");
						print("<td width='5%' align='center'>".$openrow["ts_intime"]." </td>");
						print("<td width='5%' align='center'>".$openrow["ts_late"]."</td>");
						print("<td width='5%' align='center'>".$openrow["ts_outtime"]."</td>");
						print("<td width='5%' align='center'>".$openrow["ts_duty"]."</td>");
						print("<td width='5%' align='center'>".$openrow["ts_ot"]."</td>");
						print("<td width='5%' align='center'>".$openrow["ts_tot_hrs"]."</td>");
						print("<td width='10%' align='center'>".$rec_date."</td>");
						print("</tr>");
				}
						foreach($Time_Activity_Total as $row2){
							$tot_hrs=$row2["total"];
							$ot=$row2["ot"];
							$duty=$row2["duty"];
							$tot_days=$row2["days"];
						}
						 				print("<tr style='color:black;font-size:16px;font-weight:bolder; '>");
										print("<td colspan='6'  align='right'> Total Hours</td>");
										print("<td  align='center'>".$duty." Hours</td>");
										print("<td  align='center'>".$ot." Hours</td>");
										print("<td colspan='2'  align='left'>".$tot_hrs." Hours</td>");
										print("</tr>");
				
				
		print("</table><br>");
	
	}
		
		if(empty($Time_Activity))	{
			print("<div style='margin:50px 0px 0px 420px;'>");
			print("<font style='font-size:2em;color:#254117; font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; >Nothing to Display...!</font>");
			print("</div>");
		}

		
		
		?>
		
		
				