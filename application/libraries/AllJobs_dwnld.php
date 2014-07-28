<?php

class AllJobs_dwnld{

	public function Export($data){
		
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=".date('dmY')."_All Jobs Completion Details.xls");
		print("<div style='width:100%;border:0px solid black ;border-radius:0px;float:center;'>");

			print("<div id='all_jobs' style=''>
			<table border='1'  width='100%'
						  style='border:1px solid ;
										background:#E5E4E2;
										'>
									
					<tr align='center'  bgcolor='#848482' style='
																										 font-weight:bold;
																									 	 font-size:15px;
																										 color:#ffffff;
					'>
					
					
						<td width='15%'>Job Number</td>
						<td width='30%'>Job Description</td>
						<td width='10%'>Target(Hrs)</td>
						<td width='10%'>Actual(Hrs)</td>
						<td width='30%'>Completion in(%)</td>
					
						
						
					</tr>");
				
		
				$added_time='';
				$format_time='';
				$formatted_time='';
				$counter=1;
				Foreach($data as $row)
					{
							$Job_No=$row["job_no"];
							$CI =&get_instance();
							$CI ->load->model('general_model');
							$result=$CI->general_model->fetch_actual_hours($Job_No);
									foreach($result as $openrow)	
									{
										$Actual_Hours=$openrow['total'];
									}
						$rowid="row".$counter;
						print("<tr id='$rowid'>");
					
							print("<td align='center'  id='job_no".$counter."' style='color:#307d7e;font-size:17px;font-weight:bold;font-family:monospace'>".$row["job_no"]."</td>");
						print("<td  id='job_desc".$counter."' style='color:#307d7e;font-size:15px;font-weight:bold;font-family:calibri;'>".$row["job_desc"]."</td>");
									if ($row['target_hours'] != "")
									{
									print("<td align='center' id='target_hours".$counter."' style='color:#307d7e;font-size:17px;font-weight:bold;font-family:monospace;'>".$row["target_hours"]."</td>");
									}
									else 
									{
									print("<td  align='center' id='target_hours".$counter."' style='color:#307d7e;font-size:13px;font-weight:bold;'>0</td>");	
									}
									if ($Actual_Hours != "")
									{
									print("<td align='center' id='target_hours".$counter."' style='color:#307d7e;font-size:17px;font-weight:bold;font-family:monospace;font-weight:bold;'>".$Actual_Hours."</td>");
									}
									else 
									{
									print("<td  align='center' id='target_hours".$counter."' style='color:#307d7e;font-size:13px;font-weight:bold;'>0</td>");	
									}
									if($row["target_hours"] == "" || $row["target_hours"] == 0 )
									{
										print("<td align='left'  id='job_no".$counter."' style='color:#C11B17;font-size:15px;font-weight:bold;font-family:calibri;'>Please Set Target Hrs</td>");	
									}else if($Actual_Hours == 0 || $Actual_Hours == "")
									{
										print("<td align='left'  id='job_no".$counter."' style='color:#4B0082;font-size:15px;font-weight:bold;font-family:calibri;'>Project not started yet</td>");	
									}else{
											$Completion=($Actual_Hours/$row["target_hours"])*100;
											print("<td align ='left'><progress max='100' style='' value='".round($Completion,2)."'></progress>    <span style='color:#842dce;font-size:15px;font-weight:bold;font-family:monospace;'>".round($Completion,2)." % </span></td>");
											}
						
						
						
					
						
						print("</tr>");
						$counter++;
					}
					$row_count=$counter;
			
				print("<input  type='hidden' value=".$counter." id='hrowcount'>");
			
			print("</table>");
				print("</div>");
				}
				}
?>