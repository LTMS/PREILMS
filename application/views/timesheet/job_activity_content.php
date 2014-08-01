<?php 				
	if($Job_Activity){
		
		
		print("<table width='100%' border='1' align='center' cellpadding='1' cellspacing='1'   style='border-collapse:collapse;'>");

					print("<tr style='color:red;font-size:16px;font-weight:bolder; '>
										<td colspan='13' align='center'>$title</td></tr>");
				
					print("<tr bgcolor='#518C9C' id='hdr_row' style='font-size:15px;font-weight:bold;background-color:white;color:black;border-right:1px solid  black; '>");
					print("<td width='3%' align='center'>S.No</td>");
					print("<td width='12%' align='center'>Employee Name</td>");
					print("<td width='11%' align='center'>Date</td>");
					print("<td width='7%' align='center'>Job Number</td>");
					//print("<td width='5%' align='center'>Job Description</td>");
					print("<td width='7%' align='center'>Activity</td>");
					print("<td width='8%' align='center'>NP - Job</td>");
					print("<td width='7%' align='center'>Worked Hours</td>");
					print("<td  align='center'>Description</td>");
					print("</tr>");
					
					$counter=0;
					foreach($Job_Activity as $openrow) {
						$counter++;
						$rowid="row".$counter;
						$date=$openrow["ts_date"];
						$name=$openrow["ts_name"];
						$d2=$date.',  '.date('D', strtotime($date));
					
						print("<tr id='$rowid'  class='small'>");
						print("<td width='3%' align='center'> ".$counter."</td>");
						print("<td  align='left'>".$name." </td>");
						print("<td  align='center'>$d2</td>");
						print("<td  align='left'>".$openrow["job_no"]."</td>");
						print("<td  align='left'>".$openrow["activity"]." </td>");
						print("<td  align='left'>".$openrow["job_np"]."</td>");
						print("<td  align='center'>".$openrow["job_time"]."</td>");
						print("<td  align='left'>".$openrow["task_desc"]."</td>");
						print("</tr>");
				}
						foreach($Job_Activity_Total as $row2){
							$tot_hrs=$row2["total"];
								$tot_days=$row2["days"];
						}
						 				print("<tr style='color:black;font-size:16px;font-weight:bolder; '>");
										print("<td colspan='7'  align='right'> Total Worked Hours</td>");
										print("<td  ' align='left'>".$tot_hrs." Hours for $tot_days Days</td>");
										print("</tr>");
				
				
		print("</table><br>");
	
	}
	
		if(empty($Job_Activity))	{
			print("<div style='margin:50px 0px 0px 420px;'>");
			print("<font style='font-size:2em;color:#254117; font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; >Nothing to Display...!</font>");
			print("</div>");
		}

		
		
		?>
		
		<script	type="text/javascript" src="<?php echo base_url(); ?>js/custom/print.js"></script>
				