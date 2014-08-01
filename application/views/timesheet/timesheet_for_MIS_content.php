		<?php
		print("<div >");
				$From_Date=date('d-m-Y',strtotime($From_Date));
				$To_Date=date('d-m-Y',strtotime($To_Date));
				
		
		print("<br><table width='100%' border='1' align='left' cellpadding='1' cellspacing='1'   style='border-collapse:collapse;'>");
						print("<tr  style='background:white;color:red;font-size:16px;font-weight:bolder; '>");
						
						if($From_Date!=$To_Date){		print("<td colspan='13' align='center'> MIS -  Report from $From_Date  to  $To_Date</td></tr>"); 	}
						else{	print("<td colspan='13' align='center'> MIS -  Report for $From_Date </td></tr>"); }
						print("<tr bgcolor='#518C9C' id='hdr_row' style='font-size:14px;font-weight:bold;background-color:white;color:black;border-right:1px solid  black; '>");
						print("<td width='5%' align='center'>S.No</td>");
						print("<td width='30%' align='center'>Project / Job</td>");
						print("<td width='12%' align='center'>Field / Department</td>");
						print("<td width='12%' align='center'>Group of Activity</td>");
						print("<td width='10%' align='center'>Total Worked Hours</td>");
						print("<td width='10%' align='center'>No of Days</td>");
						print("</tr>");
							$counter1=0;
							$title_job="";							
						foreach($Relativewise_Total as $row1){
									$counter1++;
									$job_no=$row1["job_no"];
									$code_for=$row1["code_for"];
									$relative=$row1["relative"];
									$total=$row1["total"];
									$days=$row1["days"];
									if($days==1){		$days=$days." Day";	}
									else{$days=$days." Days";}
								if($title_job!=$job_no){
									print("<tr style='color:black;font-size:14px;font-weight:bolder; '><td colspan='10'>$job_no</td></tr>");
								}
								print("<tr   class='small'>");
								print("<td width='5%' align='center'> ".$counter1."</td>");
								print("<td width='10%' align='left'>".$job_no."</td>");
								print("<td width='10%' align='left'>".$code_for."</td>");
								print("<td width='10%' align='left'>".$relative."</td>");
								print("<td width='10%' align='left'>".$total." Hours</td>");
								print("<td width='10%' align='left'>".$days."</td>");
						print("</tr>");
						$title_job=$job_no;
					}	
						foreach($MIS_TotalHours as $row2){
							$tot_hrs=$row2["total"];
							$tot_days=$row2["days"];
						}
						 				print("<tr style='color:black;font-size:16px;font-weight:bolder; '>");
										print("<td colspan='3'  align='right'> Total Hours Spent </td>");
										print("<td colspan='3' align='left'>".$tot_hrs." Hours in $tot_days Days</td>");
										print("</tr>");
					
		print("</table>");
		print("<hr><br>");

				print("<br><table width='100%' border='1' align='left' cellpadding='1' cellspacing='1'   style='border-collapse:collapse;'>");
						print("<tr  style='background:white;color:red;font-size:16px;font-weight:bolder; '>");
						if($From_Date!=$To_Date){		print("<td colspan='13' align='center'> MIS - Employee wise Report from $From_Date  to  $To_Date</td></tr>"); 	}
						else{	print("<td colspan='13' align='center'> MIS - Employee wise Report for $From_Date </td></tr>"); }
						print("<tr bgcolor='#518C9C' id='hdr_row' style='font-size:14px;font-weight:bold;background-color:white;color:black;border-right:1px solid  black; '>");
						print("<td width='5%' align='center'>S.No</td>");
						print("<td width='25%' align='center'>Employee Name</td>");
						print("<td width='12%' align='center'>Department</td>");
						print("<td width='10%' align='center'>Total Worked Hours</td>");
						print("<td width='10%' align='center'>No of Days</td>");
						print("</tr>");
							$counter2=0;
							$title_dept="";
						foreach($Empwise_Total as $row1){
									$counter2++;
									$name=$row1["ts_name"];
									$dept=$row1["Department"];
									$emp_total=$row1["total"];
									$emp_days=$row1["days"];
									if($emp_days==1){		$emp_days=$emp_days." Day";	}
									else{$emp_days=$emp_days." Days";}
									
								if($title_dept!=$dept){
									print("<tr style='color:black;font-size:14px;font-weight:bolder; '><td colspan='10'>$dept</td></tr>");
								}
								print("<tr   class='small'>");
								print("<td  align='center'> ".$counter2."</td>");
								print("<td  align='left'>".$name."</td>");
								print("<td  align='left'>".$dept."</td>");
									print("<td  align='left'>".$emp_total." Hours</td>");
								print("<td  align='left'>".$emp_days."</td>");
						print("</tr>");
						$title_dept=$dept;
					}	
						foreach($MIS_TotalHours as $row2){
							$tot_hrs=$row2["total"];
							$tot_days=$row2["days"];
						}
						 				print("<tr style='color:black;font-size:16px;font-weight:bolder; '>");
										print("<td colspan='4'  align='right'> Total Hours Spent </td>");
										print("<td colspan='2' align='left'>".$tot_hrs." Hours in $tot_days Days</td>");
										print("</tr>");
					
		print("</table>");
		
	print("</div>");
				
		if(empty($Relativewise_Total))	{
			print("<div style='margin:50px 0px 0px 420px'>");
			print("<font style='font-size:2em;color:#254117; font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; >Nothing to Display...!</font>");
			print("</div>");
		}


				
		?>
		
		<script	type="text/javascript" src="<?php echo base_url(); ?>js/custom/print.js"></script>
