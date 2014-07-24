		<?php
				if(!empty($Empwise_Total)){
							foreach($Total_Hrs as $row) {
								$total_days = $row["days"];
								$tot_hrs = $row["total"];
							}
				}
		
		print("<div style='background-color:white'>");
				
	if($Job_Activty){
		
		
		print("<table width='100%' border='1' align='center' cellpadding='1' cellspacing='1'   style='border-collapse:collapse;'>");

				print("<tr style='color:red;font-size:16px;font-weight:bolder; '>
								<td colspan='13' align='center'>Employees Daily Report for  $Job_Number - $Job_Desc</td></tr>");
		
				
				print("<tr bgcolor='#518C9C' id='hdr_row' style='font-size:14px;font-weight:bold;background-color:white;color:black;border-right:1px solid  black; '>");
					print("<td  width='3%' align='center'>S.No</td>");
					print("<td width='14%' align='center'>Employee</td>");
					print("<td width='9%' align='center'>Date</td>");
				//	print("<td  align='center'>Job Description</td>");
					print("<td  align='center'>Time Spent</td>");
					print("<td  align='center'>NP-Job</td>");
					print("<td  align='center'>Activity</td>");
					print("<td  align='center'>Description</td>");
				print("</tr>");
				
				$counter1=0;
				foreach($Job_Activty as $openrow) {
					$counter1++;
					$date=$openrow["date1"];
					$d2=$date.',  '.date('D', strtotime($date));
				
					print("<tr   class='small'>");
						print("<td  width='3%' align='center'> ".$counter1."</td>");
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
		print("<hr>");
	
	
	if($Empwise_Total){			
		print("<br><table width='100%' border='1' align='left' cellpadding='1' cellspacing='1'   style='border-collapse:collapse;'>");
						print("<tr  style='background:white;color:red;font-size:16px;font-weight:bolder; '>
								<td colspan='13' align='center'>Employees Job Summary for $Job_Number - $Job_Desc</td></tr>");
		
						print("<tr bgcolor='#518C9C' id='hdr_row' style='font-size:14px;font-weight:bold;background-color:white;color:black;border-right:1px solid  black; '>");
						print("<td width='5%' align='center'>S.No</td>");
						print("<td width='12%' align='center'>Employee Name</td>");
						print("<td width='13%' align='center'>Department</td>");
						//print("<td width='13%' align='center'>Group of Activity</td>");
						print("<td width='10%' align='center'>Total Worked Hours</td>");
						print("<td width='10%' align='center'>Average Hours</td>");
						print("<td width='10%' align='center'>No of days</td>");
						print("</tr>");
						
						$counter2=0;
						$emp_total_hrs=0;
						foreach($Empwise_Total as $openrow1) {
							$counter2++;
							$emp_total=$openrow1["total"];
						//	$relative=$openrow1["relative"];
							$emp_days=$openrow1["days"];
							$emp_dept=$openrow1["Department"];
									if($emp_days==1){		$emp_days=$emp_days." Day";	}
									else{$emp_days=$emp_days." Days";}
							
							print("<tr   class='small'>");
							print("<td width='5%' align='center'> ".$counter2."</td>");
							print("<td width='15%' align='left'>".$openrow1["name"]."</td>");
							print("<td width='12%' align='left'>".$emp_dept."</td>");
						//	print("<td width='12%' align='left'>".$relative."</td>");
							print("<td width='10%' align='left'>".$emp_total." Hours</td>");
							print("<td width='10%' align='left'>".$openrow1["avg"]."</td>");
							print("<td width='10%' align='left'>".$emp_days." </td>");
					print("</tr>");

					$emp_total_hrs=$emp_total_hrs+$emp_total;
				}
						/*		
						 						$engg_total=0;
												$tech_total=0;
											if($dept=='Engineering'){ $engg_total=$engg_total+$total;}
											if($dept=='Technician'){ $tech_total=$tech_total+$total;}
																	
					
										print("<tr style='color:black;font-size:16px;font-weight:bolder; '>");
										print("<td colspan='3'  align='right'> Total Hours Spent </td>");
										print("<td colspan='3' align='left'>".$emp_total_hrs." Hours in $total_days Days</td>");
										print("</tr>");
						*/
				
		print("</table>");
		print("<hr><br>");
		
		print("<br><table width='100%' border='1' align='left' cellpadding='1' cellspacing='1'   style='border-collapse:collapse;'>");
						print("<tr  style='background:white;color:red;font-size:16px;font-weight:bolder; '>
								<td colspan='13' align='center'>Activity wise Summary for $Job_Number - $Job_Desc  </td></tr>");
		
						print("<tr bgcolor='#518C9C' id='hdr_row' style='font-size:14px;font-weight:bold;background-color:white;color:black;border-right:1px solid  black; '>");
						print("<td width='5%' align='center'>S.No</td>");
						print("<td width='10%' align='center'>Activity Code</td>");
						print("<td width='20%' align='center'>Description</td>");
						print("<td width='12%' align='center'>Department</td>");
						print("<td width='10%' align='center'>Total Worked Hours</td>");
						print("<td width='10%' align='center'>No of Days</td>");
						print("</tr>");
							$counter3=0;
							$act_total_hrs=0;
						foreach($Activitywise_Total as $row3){
									$counter3++;
									$act_code=$row3["code"];
									$act_desc=$row3["desc"];
									$act_code_for=$row3["code_for"];
									$act_total=$row3["total"];
									$act_days=$row3["days"];
									if($act_days==1){		$act_days=$act_days." Day";	}
									else{$act_days=$act_days." Days";}
							
								print("<tr   class='small'>");
								print("<td width='5%' align='center'> ".$counter3."</td>");
								print("<td width='10%' align='left'>".$act_code."</td>");
								print("<td width='20%' align='left'>".$act_desc."</td>");
								print("<td width='10%' align='left'>".$act_code_for."</td>");
								print("<td width='10%' align='left'>".$act_total." Hours</td>");
								print("<td width='10%' align='left'>".$act_days."</td>");
						print("</tr>");
						$act_total_hrs=$act_total_hrs+$act_total;
					}	
					
					/*
										print("<tr style='color:black;font-size:16px;font-weight:bolder; '>");
										print("<td colspan='3'  align='right'> Total Hours Spent </td>");
										print("<td colspan='3' align='left'>".$act_total_hrs." Hours in $total_days Days</td>");
										print("</tr>");
					*/
		print("</table>");
		print("<hr><br>");
		
		
		
		print("<br><table width='100%' border='1' align='left' cellpadding='1' cellspacing='1'   style='border-collapse:collapse;'>");
						print("<tr  style='background:white;color:red;font-size:16px;font-weight:bolder; '>
								<td colspan='13' align='center'> Group of Job Activity Summary for $Job_Number - $Job_Desc</td></tr>");
		
						print("<tr bgcolor='#518C9C' id='hdr_row' style='font-size:14px;font-weight:bold;background-color:white;color:black;border-right:1px solid  black; '>");
						print("<td width='5%' align='center'>S.No</td>");
						print("<td width='20%' align='center'>Source of Activity</td>");
						print("<td width='20%' align='center'>Group of Activity</td>");
						print("<td width='10%' align='center'>Total Worked Hours</td>");
						print("<td width='10%' align='center'>No of Days</td>");
						print("</tr>");
							$counter4=0;
							$rel_total_hrs=0;
						foreach($Relativewise_Total as $row4){
									$counter4++;
									$rel_code_for=$row4["code_for"];
									$relative=$row4["Relative"];
									$rel_total=$row4["total"];
									$rel_days=$row4["days"];
									if($rel_days==1){		$rel_days=$rel_days." Day";	}
									else{$rel_days=$rel_days." Days";}
							
								print("<tr   class='small'>");
								print("<td width='5%' align='center'> ".$counter4."</td>");
								print("<td width='10%' align='left'>".$rel_code_for."</td>");
								print("<td width='10%' align='left'>".$relative."</td>");
								print("<td width='10%' align='left'>".$rel_total." Hours</td>");
								print("<td width='10%' align='left'>".$rel_days."</td>");
						print("</tr>");
					}	
						/*
						 				$rel_total_hrs=$rel_total_hrs+$rel_total;				
										print("<tr style='color:black;font-size:16px;font-weight:bolder; '>");
										print("<td colspan='3'  align='right'> Total Hours Spent </td>");
										print("<td colspan='3' align='left'>".$rel_total_hrs." Hours in $total_days Days</td>");
										print("</tr>");
					*/
		print("</table>");
		print("<br>");
	
		
		
		print("<hr><br><div style='float:left'>");
		print("<table>");
		print("<br><table width='100%' border='1' align='left' cellpadding='1' cellspacing='1'   style='border-collapse:collapse;'>");
						print("<tr  style='background:white;color:red;font-size:16px;font-weight:bolder; '>
								<td colspan='13' align='center'> Department Summary for $Job_Number - $Job_Desc</td></tr>");
		
						print("<tr bgcolor='#518C9C' id='hdr_row' style='font-size:14px;font-weight:bold;background-color:white;color:black;border-right:1px solid  black; '>");
						print("<td width='5%' align='center'>S.No</td>");
						print("<td width='20%' align='center'>Source of Activity</td>");
						print("<td width='10%' align='center'>Total Worked Hours</td>");
						print("<td width='10%' align='center'>No of Days</td>");
						print("</tr>");
							$counter3=0;
							$dept_total_hrs=0;
						foreach($Deptwise_Total as $row3){
									$counter3++;
									$dept_code_for=$row3["code_for"];
									if($dept_code_for=='All'){
										$dept_code_for='General';
									}
									if($dept_code_for=='Workshop'){
										$dept_code_for='Techinician / Workshop';
									}
									$dept_total=$row3["total"];
									$dept_days=$row3["days"];
									if($dept_days==1){		$dept_days=$dept_days." Day";	}
									else{$dept_days=$dept_days." Days";}
							
								print("<tr   class='small'>");
								print("<td width='5%' align='center'> ".$counter3."</td>");
								print("<td width='10%' align='left'>".$dept_code_for."</td>");
								print("<td width='10%' align='left'>".$dept_total." Hours</td>");
								print("<td width='10%' align='left'>".$dept_days."</td>");
						print("</tr>");
						$dept_total_hrs=$dept_total_hrs+$dept_total;
					}	
										print("<tr style='background:white;color:black;font-size:16px;font-weight:bolder; '>");
										print("<td colspan='3'  align='right'> Total Hours Spent </td>");
										print("<td colspan='3' align='left'>".$dept_total_hrs." Hours in $total_days Days</td>");
										print("</tr>");
					
		print("</table>");
		print("<br><br>");
	
		
		
		print("<hr><br><br><div style='float:left'>");
		print("<table>");
		print("<tr><td style='font-weight:bolder;font-size:10pt;'> <u>Important Notes </u></td><td>");
		print("<tr><td style='font-weight:bolder;font-size:8pt;'> *   'Total Worked Hours' is rounded off. When Minutes >=30 It will be rounded off to 1 Hour.   </td><td>");
		print("<tr><td style='font-weight:bolder;font-size:5pt;'>  </td><td>");
		print("</table></div>");
		
		}
		print("</div>");
				
		if(empty($Empwise_Total) || empty($Job_Activty))	{
			print("<div style='margin:50px 0px 0px 420px'>");
			print("<font style='font-size:2em;color:#254117; font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; >Nothing to Display...!</font>");
			print("</div>");
		}

		
		
		?>
		
		<script	type="text/javascript" src="<?php echo base_url(); ?>js/custom/print.js"></script>
