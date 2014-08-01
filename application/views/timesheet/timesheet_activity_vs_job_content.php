		<?php
		print("<div>");
				
	if($Empwise_Report){
		
		
		print("<table width='100%' border='1' align='center' cellpadding='1' cellspacing='1'   style='border-collapse:collapse;'>");

				print("<tr style='color:red;font-size:16px;font-weight:bolder; '>
								<td colspan='13' align='center'>Activity Report of $Name for  $Job_Number - $Job_Desc</td></tr>");
		
				
				print("<tr bgcolor='#518C9C' id='hdr_row' style='font-size:14px;font-weight:bold;background-color:white;color:black;border-right:1px solid  black; '>");
					print("<td  width='3%' align='center'>S.No</td>");
					//print("<td width='14%' align='left'>Employee Name</td>");
					print("<td width='9%' align='center'>Date</td>");
					print("<td  align='center'>Job Description</td>");
					print("<td  align='center'>NP-Job</td>");
					print("<td  align='center'>Activity</td>");
					print("<td  align='center'>Time Spent</td>");
					print("<td  align='center'>Description</td>");
				print("</tr>");
				
				$counter1=0;
				foreach($Empwise_Report as $openrow) {
					$counter1++;
					$date=date('d-m-Y', strtotime($openrow["ts_date"]));
					$name=$openrow["ts_name"];
						print("<tr   class='small'>");
						print("<td  width='3%' align='center'> ".$counter1."</td>");
						//print("<td  width='14%' align='left'>".$name."</td>");
						print("<td  width='9%' align='center'>$date</td>");
						print("<td  align='left'>".$openrow["job_no"]."-".$openrow["job_desc"]." </td>");
						print("<td  width='8%' align='left'>".$openrow["job_np"]."</td>");
						print("<td  width='10%' align='left'>".$openrow["activity"]."</td>");
						print("<td  width='7%' align='left'>".$openrow["job_time"]."</td>");
						print("<td  align='left'>".$openrow["task_desc"]."</td>");
					print("</tr>");
				}
				
				
		print("</table><br>");
		
				print("<table width='100%' border='1' align='center' cellpadding='1' cellspacing='1'   style='border-collapse:collapse;'>");

				print("<tr style='color:red;font-size:16px;font-weight:bolder; '>
								<td colspan='13' align='center'> Activity Summary of $Name for  $Job_Number - $Job_Desc</td></tr>");
		
				
				print("<tr bgcolor='#518C9C' id='hdr_row' style='font-size:14px;font-weight:bold;background-color:white;color:black;border-right:1px solid  black; '>");
					print("<td  width='3%' align='center'>S.No</td>");
					print("<td width='9%' align='center'>Activity Code</td>");
					print("<td  align='center' width='25%' >Activity Description</td>");
					print("<td  align='center' width='12%'>Field of Activity</td>");
					print("<td  align='center' width='10%'>Total Worked Hours</td>");
					print("<td  align='center' width='10%'>No of Days</td>");
				print("</tr>");
				
				$counter2=0;
				foreach($Empwise_Activity as $openrow1) {
					$counter2++;
					$act_days=$openrow1["days"];
					if($act_days==1){		$act_days=$act_days." Day";	}
					else{$act_days=$act_days." Days";}
					print("<tr   class='small'>");
						print("<td  width='3%' align='center'> ".$counter2."</td>");
						print("<td  width='9%' align='left'>".$openrow1["activity"]."</td>");
						print("<td  align='left'>".$openrow1["desc"]." </td>");
						print("<td  align='left'>".$openrow1["code_for"]."</td>");
						print("<td   align='left'>".$openrow1["total"]." Hours</td>");
						print("<td   align='left'>".$act_days."</td>");
					print("</tr>");
				}
				
		print("</table><br>");

						print("<table width='100%' border='1' align='center' cellpadding='1' cellspacing='1'   style='border-collapse:collapse;'>");

				print("<tr style='color:red;font-size:16px;font-weight:bolder; '>
								<td colspan='13' align='center'> Group of Activity Report of $Name for  $Job_Number - $Job_Desc</td></tr>");
		
				
				print("<tr bgcolor='#518C9C' id='hdr_row' style='font-size:14px;font-weight:bold;background-color:white;color:black;border-right:1px solid  black; '>");
					print("<td  width='3%' align='center'>S.No</td>");
					print("<td width='9%' align='center'>Field / Department</td>");
					print("<td  align='center' width='25%' >Group of Activity</td>");
					print("<td  align='center' width='10%'>Total Worked Hours</td>");
					print("<td  align='center' width='10%'>No of Days</td>");
				print("</tr>");
				
				$counter3=0;
				foreach($Empwise_Relative as $openrow2) {
					$counter3++;
					$rel_days=$openrow2["days"];
					if($rel_days==1){		$rel_days=$rel_days." Day";	}
					else{$rel_days=$rel_days." Days";}
					print("<tr   class='small'>");
						print("<td  	align='center'> ".$counter2."</td>");
						print("<td   align='left'>".$openrow2["code_for"]."</td>");
						print("<td  align='left'>".$openrow2["relative"]." </td>");
						print("<td   align='left'>".$openrow2["total"]." Hours</td>");
						print("<td   align='left'>".$rel_days."</td>");
					print("</tr>");
				}
				
					foreach($Empwise_Total as $row2){
							$tot_hrs=$row2["total"];
							$tot_days=$row2["days"];
						}
						 				print("<tr style='color:black;font-size:16px;font-weight:bolder; '>");
										print("<td colspan='3'  align='right'> Total Hours Spent </td>");
										print("<td colspan='2' align='left'>".$tot_hrs." Hours in $tot_days Days</td>");
										print("</tr>");
				
		print("</table><br>");
	
	}
		print("<hr>");
	
		if(empty($Empwise_Report))	{
			print("<div style='margin:50px 0px 0px 420px;'>");
			print("<font style='font-size:2em;color:#254117; font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; >Nothing to Display...!</font>");
			print("</div>");
		}

		
		
		?>
		
		<script	type="text/javascript" src="<?php echo base_url(); ?>js/custom/print.js"></script>
