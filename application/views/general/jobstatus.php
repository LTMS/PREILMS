<div style="height: 70px; background: #59955C;">
	<table>
		<tr>
			<td width="50" align='left'><img style="width: 120px; height: 60px"
				src="<?php echo base_url(); ?>/images/holi2.png"></td>
			<td align='left'
				style="margin-bottom: 20px; font-size: 21pt; position: inline; color: white; font-weight: bolder">Job
				Details</td>
			<td style="color: white; font-size: 15pt" align="right">Hi, <b><?php echo $this->session->userdata('fullname');?>
			</b> ..!</td>
			<td align="left" style="color: white; font-size: 15pt; width: 50px">
				<a href="<?php echo site_url("logincheck/logout"); ?>"><img
					style="width: 50px; height: 50px"
					src="<?php echo base_url(); ?>/images/logout2.png"> </a>
			</td>
		</tr>
	</table>
</div>
<div id="head" 
		style="background:#DDDDDD;
					  height:50px;
					  margin:10px 0px 0px 10px;
					  border:1px solid black; 
					  border-top-left-radius:10px;
					  border-top-right-radius:10px;
					  border-bottom-style:none;">
			<div id='all_jobs_head'  style='border:0px solid;'> 
			<p style='margin:0px 0px 0px 300px;color:#625d5d;font-weight:bold;
								  font-family:Verdana;font-size:20px;'>Jobs added by All Employees
			<span style='margin:30px 0px 0px 100px;color:#6c2dc7;font-weight:bold;
								  font-family:Lucida Console;font-size:15px;border:0px solid;
								  '><?php  echo $row_count; ?> jobs added so far...! </span> </p>
			</div> 
				<div   id='job_edit_head'  style='margin:10px 0px 0px 5px;display:none;border: 0px solid;float:left;background:#DDDDDD;width:99%;' >
							<a href='javascript:back_to_all_jobs()'><img  src=' <?php echo base_url();?>images/Backspace.png' alt='' 
										style='height:30px;width:30px;vertical-align:bottom'> </a>
							<p style='margin:0px 0px 0px 300px;color:#625d5d;font-weight:bold;
								  font-family:Lucida Console;font-size:20px;display:inline;'>Jobs Details Description</p>
						<div   style='border: 0px solid;float:right;' >
							<a href='javascript:back_to_all_jobs()'><img  src=' <?php echo base_url();?>images/Closer.png' alt='' 
										style='height:35px;width:35px;vertical-align:bottom'> </a>
							
						</div>
				
						</div>
						
</div>
			<div id='search_box' style='height:40px;background:#DDDDDD;
																 margin:0px 0px 0px 10px;
					  											 border:1px solid black;
					  											 border-top-style:solid;
					  											 border-bottom-style:none; '>
					<p style='margin:10px 0px 0px 80px;color:#2b1b17;font-weight:bold;
								  font-family:Verdana;font-size:15px;display:inline;'> Search By</p>
					
							<input type='text'  id ='search_job_no' value='' placeholder='Job Number' style='height:20px;width:100px;
																									  padding-left:8px;
																									  background-color:#fefcff;
																									  border-radius:5px;
																									 box-shadow:inset 1px 1px 1px  #ccc;
																									  font-size:15px;
																									  color:#2c3539;
																									  outline:none;
																									  font-weight:bold;
																									  margin:10px 0px 0px 0px;'  onkeyup='javascript:searchbyjobno()'>
						<p style='margin:10px 0px 0px 40px;color:#2b1b17;font-weight:bold;
								  font-family:Verdana;font-size:15px;display:inline;'> Search By</p>
				 <input type='text' id ='search_desc'  value='' placeholder='Job Description' style='height:20px;width:130px;
																									  padding-left:8px;
																									  background-color:#fefcff;
																									  border-radius:5px;
																									 box-shadow:inset 1px 1px 1px  #ccc;
																									  font-size:15px;
																									  color:#2c3539;
																									  outline:none;
																									  font-weight:bold;
																									  margin:10px 0px 0px 0px;' onkeyup='javascript:searchbyjobdesc()'>
					<p  id='results'style='margin:10px 0px 0px 40px;color:#c35817;font-weight:bold;
								  font-family:Verdana;font-size:15px;display:inline;'>  </p>																			  
					<img valign="bottom"
						src="<?php echo base_url(); ?>/images/print2.png" onmouseover=""
						onclick="javascript:print_AllJobs();"
						style="width: 70px; height: 30px; color: green;margin-left:100px;" />
				 <img
						id="Alljobs_dwnld" valign="bottom"
						src="<?php echo base_url(); ?>/images/excel2.png" onclick=""
						style="width: 70px; height: 30px; color: green;margin-left:0px;" />
			</div>
	<div id='contentData' 
			style='height:750px;
						background:#DBEADC;
						margin:0px 0px 0px 10px;
						border:1px solid black;
						border-bottom-left-radius:10px;
						border-bottom-right-radius:10px;
						border-top-style:none;
						overflow: auto;';>
			<div id='all_jobs' style=''>
			<table border='1'  width='100%'
						  style="border:1px solid ;
										background:#E5E4E2;
										">
									
					<tr align="center"  bgcolor='#848482' style='
																										 font-weight:bold;
																									 	 font-size:15px;
																										 color:#ffffff;
					'>
					
					
						<td width='15%'>Job Number</td>
						<td width='30%'>Job Description</td>
						<td width='10%'>Target(Hrs)</td>
						<td width='10%'>Actual(Hrs)</td>
						<td width='30%'>Completion in(%)</td>
					
						
						<td width='5%'>Edit</td>
					</tr>
				
			<?php  
				$added_time="";
				$format_time="";
				$formatted_time="";
				$counter=1;
				Foreach($job_details as $row)
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
					
						print("<td align='center'  id='name".$counter."' style='color:#307d7e;font-size:13px;font-weight:bold;display:none;'>".$row["name"]."</td>");
						print("<td align='center'  id='hours_updated".$counter."' style='color:#307d7e;font-size:13px;font-weight:bold;display:none;'>".$row["hours_updated"]."</td>");
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
									print("<td align='center' id='' style='color:#307d7e;font-size:17px;font-weight:bold;font-family:monospace;font-weight:bold;'>".$Actual_Hours."</td>");
									}
									else 
									{
									print("<td  align='center' id='' style='color:#307d7e;font-size:13px;font-weight:bold;'>0</td>");	
									}
									if($row["target_hours"] == "" || $row["target_hours"] == 0 )
									{
										print("<td align='left'  id='' style='color:#C11B17;font-size:15px;font-weight:bold;font-family:calibri;'>Please Set Target Hrs</td>");	
									}else if($Actual_Hours == 0 || $Actual_Hours == "")
									{
										print("<td align='left'  id='' style='color:#4B0082;font-size:15px;font-weight:bold;font-family:calibri;'>Project not started yet</td>");	
									}else{
											$Completion=($Actual_Hours/$row["target_hours"])*100;
											print("<td align ='left'><progress max='100' style='' value='".round($Completion,2)."'></progress>    <span style='color:#842dce;font-size:15px;font-weight:bold;font-family:monospace;'>".round($Completion,2)." % </span></td>");
											}
						
						
						
						$added_time=$row['addedtime'];
						$format_time=strtotime($added_time);
						$formatted_time=date("l jS \of F Y h:i:s A",$format_time);
						print("<td  id='added_time".$counter."' style='color:#307d7e;font-size:13px;font-weight:bold;display:none;'>".$formatted_time."</td>");
						print("<td align='center'><a href='javascript:change_job_details(".$counter.")'><img src='".base_url()."images/pencil.png' alt=' ' style=' width:20px;height:15px;'/></a></td>");
						print("</tr>");
						$counter++;
					}
					$row_count=$counter;
			
				print("<input  type='hidden' value=".$counter." id='hrowcount'>");
			 ?>
			</table>
				</div>
				
				<div id='job_edit' style='background:#E5E4E2;display:none;
																height:743px;
																border-bottom-style:none;
																border-top: 1px solid #848482;
																'
															>
					
						<div style='margin:90px 50px 0px 50px;border:0px solid #4863A0;
											  border-top-left-radius:15px;
											  border-top-right-radius:15px;
											  border-bottom-left-radius:15px;
											  border-bottom-right-radius:15px;
											  box-shadow:10px 10px 10px 10px #ccc;
											  height:500px;
											  background:#DBEADC;
											  '>
							<div  style='border-bottom-style:groove;'>
							<img src='<?php echo base_url();?>images/pin.png' 
									  style='height:40px;width:40px;margin:10px 0px 0px 5px;
									  				vertical-align:middle;display:inline;' alt='' />
							<p style='margin:0px 0px 0px 260px;color:#6c2dc7;font-weight:bold;
								  font-family:Lucida Console;font-size:20px;display:inline;border:0px solid;
								  width:600px;'>Edit Job Details</p>
							<img src='<?php echo base_url();?>images/pin.png' 
									   style='height:40px;width:40px;margin:10px 0px 0px 38%;vertical-align:middle;
									   				display:inline;' alt='' />
							</div>
							<table border='0'  width='80%' style='font-size:18px;font-weight:bold;
												font-family:Lucida Console;color:#646d7e;
												margin-top:0px;
												border:0px solid;'> 
								<tr style='height:40px;'>
									<td colspan='2' align='center' >
										<p  id='error'style='margin:0px 0px 0px 0px;color:#F7031A;;
										  font-family:Lucida Console;font-size:18px;display:inline;border:0px solid;
										  '></p>
									</td>
								</tr>
								<tr>
									<td  align=right style='height:30px;' width='50%'>
									Job Number :
									</td>
									<td id='job_no_span' style='color:#003333' width='50%'>
									</td>
							</tr>
							<tr>
									<td  align='right' style='height:30px;'>
									Job Description:
									</td>
									<td id='job_desc_span' style='color:#003333'>
									</td>
							</tr>
							<tr>
									<td  align='right' style='height:30px;'>
								Added Time :
									</td>
									<td id='job_time_span' style='color:#003333'>
								Added Time
									</td>
							</tr>
							<tr>
									<td  align='right' style='height:30px;'>
								Set Target hours :
									</td>
									<td id='job_hours_span' style='color:#003333'>
									<input id='target_hours' type='text' value='' placeholder='....in  Hrs'  style='height:20px;width:200px;
																									  padding-left:8px;
																									  background-color:#f0f8ff;
																									  border-radius:5px;
																									  box-shadow:inset 1px 1px 1px  #ccc;
																									  font-size:15px;
																									  color:#003333;
																									  outline:none;
																									  '/>
								
									</td>
							</tr>
							<tr>
									<td align='right'  style='height:30px;'>
								Employees in this Project :
									</td>
									<td id='job_emp_span' style='color:#003333'>
									</td>
							</tr>
							<tr style='height:30px;'>
							</tr>
							<tr >
									<td align='right'  style='height:50px;'>
									
									</td>
									<td>
										<a href='javascript:Update_job()'>
										<img src='<?php echo base_url();?>images/Correct.png' alt='' style='height:30px;width:30px;margin-left:20px;' />
										</a>
										<a href='javascript:back_to_all_jobs()'>
										<img src='<?php echo base_url();?>images/Closer.png' alt='' style='margin-left:30px;height:35px;width:45px;' />
										</a>
									</td>
							</tr>
								<tr style='height:20px;'>
							</tr>
							<tr>
									<td id='prev_target_td' style='display:none' ><p  id='prev_targets' style='margin:0px 0px 0px 0px;color:#F7031A;;
										  font-family:Lucida Console;font-size:14px;display:inline;border:0px solid;
										  '>The Previous target hours are...!</p></td>
									<td>	<p  id='' style='margin:0px 0px 0px 0px;color:#F7031A;;
										  font-family:Lucida Console;font-size:14px;display:inline;border:0px solid;
										  '>You can update target hours  only by 3 times...!</p></td>
							</tr>
						</table>
							
						</div>
					
				</div>
	
	</div>
	<script  type='text/javascript' src="<?php echo base_url();?>js/custom/general.js">
	
	</script>