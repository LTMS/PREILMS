
<div style="height: 70px; background: #59955C;">
	<table>
		<tr>
			<td width="50" align='left'><img style="width: 100px; height: 50px"
				src="<?php echo base_url(); ?>/images/teamsheet.png"></td>
			<td align='left'
				style="margin-bottom: 20px; font-size: 21pt; position: inline; color: white; font-weight: bolder">Employees
				Time Sheet</td>
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


<div
	style="height: auto; overflow: hidden; background: #DBEADC; margin: 5px 0px 0px 0px; width: 100%; border: 1px solid black; border-radius: 10px;">
	<table width="100%" border="0" align="left" cellpadding="2"
		style="height: 40px;">
		<tr class="tab_header_bg">
	 	<td align="center">
	 	 <input	type='text' value='' id='getjob' placeholder="Job Number"style="height: 22px; width: 90px; color: RED; font-weight: bolder; font-size: 15px;" />&nbsp; 
		&nbsp;&nbsp; 
		<input type='button' value='Job Report'	onclick="javascript:timesheet_jobReport();" style="height: 25px;width: 100px; color: #006600; font-weight: bold; font-size: 15px;" />
				&nbsp;&nbsp;
		 <img align="bottom"	src="<?php echo base_url(); ?>/images/print2.png" 	onclick="javascript:printJobReport();"
				style="width: 50px; height: 30px; color: green" />
			</td>
		</tr>
		<tr style="display: none" id="errorrow">
			<td id="error" align="center" colspan="10"
				style="color: red; width: 250px; font-size: 15px; font-weight: bolder;">
			</td>
		</tr>
	</table>
	<hr width="100%">

	<div id="contentData" style="height: 640px; overflow: scroll;"></div>

</div>
<input type='hidden'	id='report_option' value='' />
<script	type="text/javascript"	src="<?php echo base_url(); ?>js/custom/timesheet.js"></script>
<script	type="text/javascript"	src="<?php echo base_url(); ?>js/custom/print.js"></script>
<script type="text/javascript">var jobs_array=<?php echo json_encode($Jobs_Num)?>;	</script>
