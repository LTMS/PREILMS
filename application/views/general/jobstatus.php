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
								  font-family:Lucida Console;font-size:20px;'>Jobs added by All Employess
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
					<tr align="center" bgcolor='#848482' style='font-weight:bold;
																									 	 font-size:15px;
																										 color:#ffffff;
					'>
						<td width='10%'>S No</td>
						<td width='30%'>Employee Name</td>
						<td width='10%'>Job Number</td>
						<td width='45%'>Job Description</td>
						<td width='5%'>Edit</td>
					</tr>
			<?php  
			
				$counter=1;
				Foreach($job_details as $row)
					{
						print("<tr>");
						print("<td align='center' style='color:#307d7e;font-size:13px;font-weight:bold;'>".$counter."</td>");
						print("<td id='name".$counter."' style='color:#307d7e;font-size:13px;font-weight:bold;'>".$row["name"]."</td>");
						print("<td  id='job_no".$counter."' style='color:#307d7e;font-size:13px;font-weight:bold;'>".$row["job_no"]."</td>");
						print("<td  id='job_desc".$counter."' style='color:#307d7e;font-size:13px;font-weight:bold;'>".$row["job_desc"]."</td>");
						print("<td align='center'><a href='javascript:change_job_details(".$counter.")'><img src='".base_url()."images/pencil.png' alt=' ' style=' width:20px;height:15px;'/></a></td>");
						print("</tr>");
						$counter++;
					}
					$row_count=$counter;
			
				
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
											  background:#c6deff;
											  '>
							<div  style='border-bottom-style:groove;'>
							<img src='<?php echo base_url();?>images/pin.png' 
									  style='height:40px;width:40px;margin:10px 0px 0px 5px;
									  				vertical-align:middle;' alt='' />
							<p style='margin:0px 0px 0px 250px;color:#6c2dc7;font-weight:bold;
								  font-family:Lucida Console;font-size:20px;display:inline;'>Edit Job Details</p>
							<img src='<?php echo base_url();?>images/pin.png' 
									   style='height:40px;width:40px;margin:10px 0px 0px 355px;vertical-align:middle;' alt='' />
							</div>
							<table border='1'  width='80%' style='font-size:20px;font-weight:bold;
												font-family:Lucida Console;color:#646d7e;
												margin-top:90px;align:left;
												border:0px solid;'> 
								<tr>
									<td  align='center' style='height:30px;'>
									Job Number 
									</td>
									<td id='job_no_span' style='color:#1f45fc'>
									</td>
							</tr>
							<tr>
									<td  align='center' style='height:30px;'>
									Job Description
									</td>
									<td id='job_desc_span' style='color:#1f45fc'>
									</td>
							</tr>
							<tr>
									<td  align='center' style='height:30px;'>
								Added Time
									</td>
									<td id='job_time_span' style='color:#1f45fc'>
								Added Time
									</td>
							</tr>
							<tr>
									<td  align='center' style='height:30px;'>
								Set Target hours
									</td>
									<td id='job_hours_span' style='color:#1f45fc'>
									<input type='text' value='....in  Hrs'  style='height:20px;width:200px;
																									  padding-left:8px;
																									  background-color:#f0f8ff;
																									  border-radius:5px;
																									  box-shadow:inset 1px 2px 1px  #ccc;
																									  font-size:15px;
																									  color:#1f45fc'/>
								
									</td>
							</tr>
							<tr>
									<td align='center'  style='height:30px;'>
								Employees in this Project
									</td>
									<td id='job_emp_span' style='color:#1f45fc'>
									</td>
							</tr>
							<tr style='height:30px;'>
							</tr>
							<tr >
									<td align='center'  style='height:50px;'>
									
									</td>
									<td>
										<img src='<?php echo base_url();?>images/Correct.png' alt='' style='height:30px;width:30px;' />
										<img src='<?php echo base_url();?>images/Closer.png' alt='' style='margin-left:30px;height:30px;width:50px;' />
									</td>
							</tr>
							</table>
							
						</div>
					
				</div>
	
	</div>
	<script  type='text/javascript' src="<?php echo base_url();?>js/custom/general.js">
	
	</script>