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
			<div style='float:right;margin:30px 0px 0px 0px;color:#6c2dc7;font-weight:bold;
								  font-family:Lucida Console;font-size:15px;'> 
			<?php  echo $row_count; ?> jobs added so far!!!..
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
			<table border='1'  
						  style="border:1px solid ;
										background:#E5E4E2;
										">
					<tr align="center" bgcolor='#848482' style='font-weight:bold;
																									font-size:15px;
																									color:#ffffff;
					'>
						<td>S No</td>
						<td>Employee Name</td>
						<td>Job Number</td>
						<td>Job Description</td>
						<td>Target Hours</td>
					</tr>
			<?php  
			
				$counter=1;
				Foreach($job_details as $row)
					{
						print("<tr>");
						print("<td align='center' style='color:#307d7e;font-size:13px;font-weight:bold;'>".$counter."</td>");
						print("<td style='color:#307d7e;font-size:13px;font-weight:bold;'>".$row["name"]."</td>");
						print("<td style='color:#307d7e;font-size:13px;font-weight:bold;'>".$row["job_no"]."</td>");
						print("<td style='color:#307d7e;font-size:13px;font-weight:bold;'>".$row["job_desc"]."</td>");
						print("<td><img src='".base_url()."images/pencil.png' alt=' ' style=' width:20px;height:20px;'/></td>");
						print("</tr>");
						$counter++;
					}
					$row_count=$counter;
			
				
			 ?>
			</table>
	
	
	</div>