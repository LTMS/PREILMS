		<?php
	
		print("<div style='background-color:white'>");
				
	if($Job_Activty){
		print("<table width='100%' border='1' align='center' cellpadding='1' cellspacing='1'   style='border-collapse:collapse;'>");

				print("<tr style='color:red;font-size:15px;font-weight:bolder; '>
								<td colspan='13' align='center'>Employees Daily Report for  $Job_Number - $Job_Desc</td></tr>");
		
				
				print("<tr bgcolor='#518C9C' id='hdr_row' style='font-size:12px;font-weight:bold;background-color:white;color:black;border-right:1px solid  black; '>");
					print("<td  width='3%' align='center'>S.No</td>");
					print("<td width='14%' align='center'>Employee</td>");
					print("<td width='9%' align='center'>Date</td>");
				//	print("<td  align='center'>Job Description</td>");
					print("<td  align='center'>Time Spent</td>");
					print("<td  align='center'>NP-Job</td>");
					print("<td  align='center'>Activity</td>");
					print("<td  align='center'>Description</td>");
				print("</tr>");
				
				$counter=0;
				foreach($Job_Activty as $openrow) {
					$counter++;
					$rowid="row".$counter;
					$date=$openrow["date1"];
					$d2=$date.',  '.date('D', strtotime($date));
				
					print("<tr id='$rowid'  class='small'>");
						print("<td  width='3%' align='center'> ".$counter."</td>");
						print("<td  width='14%' align='left'>".$openrow["ts_name"]."</td>");
						print("<td  width='9%' align='center'>$date</td>");
						//print("<td  align='left'>".$openrow["job_no"]."-".$openrow["job_desc"]." </td>");
						print("<td  width='7%' align='left'>".$openrow["job_time"]."</td>");
						print("<td  width='8%' align='left'>".$openrow["job_np"]."</td>");
						print("<td  width='10%' align='left'>".$openrow["activity"]."</td>");
						print("<td  align='left'>".$openrow["task_desc"]."</td>");
					print("</tr>");
				}
		print("</table><br>");
	}
	
	
	if($Empwise_Total){			
		print("<table width='100%' border='1' align='left' cellpadding='1' cellspacing='1'   style='border-collapse:collapse;'>");
						print("<tr  style='background:white;color:red;font-size:15px;font-weight:bolder; '>
								<td colspan='13' align='center'>Employees Job Summary for $Job_Desc -  $Job_Number</td></tr>");
		
						print("<tr bgcolor='#518C9C' id='hdr_row' style='font-size:15px;font-weight:bold;background-color:white;color:black;border-right:1px solid  black; '>");
						print("<td width='5%' align='center'>S.No</td>");
						print("<td width='20%' align='center'>Employee Name</td>");
						print("<td width='20%' align='center'>Department</td>");
						print("<td width='10%' align='center'>Total Worked Hours</td>");
						print("<td width='10%' align='center'>Average Hours</td>");
						print("<td width='10%' align='center'>No of days</td>");
						print("</tr>");
						
						$counter=0;
						$emp_total=0;
						$engg_total=0;
						$tech_total=0;
						foreach($Empwise_Total as $openrow1) {
							$counter++;
							$rowid="row".$counter;
							$total=$openrow1["total"];
							$days=$openrow1["days"];
							$dept=$openrow1["Department"];
									if($days==1){		$days=$days." Day";	}
									else{$days=$days." Days";}
							
							print("<tr id='$rowid'  class='small'>");
							print("<td width='5%' align='center'> ".$counter."</td>");
							print("<td width='20%' align='left'>".$openrow1["name"]."</td>");
							print("<td width='20%' align='left'>".$dept."</td>");
							print("<td width='10%' align='left'>".$total." Hours</td>");
							print("<td width='10%' align='left'>".$openrow1["avg"]."</td>");
							print("<td width='10%' align='left'>".$openrow1["days"]." Days</td>");
					print("</tr>");
/*
					$emp_total=$emp_total+$total;
					if($dept=='Engineering'){ $engg_total=$engg_total+$total;}
					if($dept=='Technician'){ $tech_total=$tech_total+$total;}
*/
				}
						
					if($Empwise_Total){
							foreach($Total_Hrs as $row) {
								$days = $row["days"];
								$tot_hrs = $row["total"];
						}
							print("<tr style='color:black;font-size:16px;font-weight:bolder; '>");
							print("<td colspan='3'  align='right'> Total Hours Spent </td>");
							print("<td colspan='3' align='left'>".$Total_Hrs." Hours in $days Days</td>");
							print("</tr>");
					}
		
		print("</table><hr>");
		
		print("<table width='100%' border='1' align='left' cellpadding='1' cellspacing='1'   style='border-collapse:collapse;'>");
						print("<tr  style='background:white;color:red;font-size:15px;font-weight:bolder; '>
								<td colspan='13' align='center'>Department Job Summary for $Job_Desc -  $Job_Number</td></tr>");
		
						print("<tr bgcolor='#518C9C' id='hdr_row' style='font-size:15px;font-weight:bold;background-color:white;color:black;border-right:1px solid  black; '>");
						print("<td width='5%' align='center'>S.No</td>");
						print("<td width='20%' align='center'>Department</td>");
						print("<td width='10%' align='center'>Worked Hours</td>");
						print("<td width='10%' align='center'>No of days</td>");
						print("</tr>");
						
						foreach($Deptwise_Total as $){
								print("<tr>");
								print("<td width='5%' align='center'>1</td>");
								print("<td width='20%' align='center'>Engineering</td>");
								print("<td width='10%' align='center'></td>");
								print("<td width='10%' align='center'></td>");
								print("</tr>");
						}	
						
		print("</table>");
	
		
		
		print("<hr>");
		print("<br><br><br><font size='2px' ><b><u> Important Notes</u></b></font> <br><br>");
		print("*  In Employees Job Summary  'Total Worked Hours' is rounded off. <br>");
		print("*  Accuracy of Total Hours Spent is +/- 1 Hour.<br>");
		
		}
		print("</div>");
				
		if(empty($Empwise_Total) || empty($Job_Activty))
		{
			print("<div style='margin:50px 0px 0px 420px'>");
			print("<font style='font-size:2em;color:#254117; font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; >Nothing to Display...!</font>");
			print("</div>");
		}

		
		
		?>
		
		<script	type="text/javascript" src="<?php echo base_url(); ?>js/custom/print.js"></script>
