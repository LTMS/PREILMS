
<div style="height: 70px; background: #59955C;">
	<table>
		<tr>
			<td width="50" align='left'><img style="width: 130px; height: 60px"
				src="<?php echo base_url(); ?>/images/leavehistory.png"></td>
			<td align='left'
				style="margin-bottom: 20px; font-size: 21pt; position: inline; color: white; font-weight: bolder">My
				Leave History</td>
			<td style="color: white; font-size: 15pt" align="right">Hi, <b><?php echo $this->session->userdata('fullname');?>
			</b> ..!</td>
			<td align="left" style="color: white; font-size: 15pt; width: 50px">
				<a href="<?php echo site_url("logincheck/logout"); ?>"><img
					id='img_logout' style="width: 50px; height: 50px"
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
			<td colspan="13" align="center" width="10%">Leave Date From : <input
				type="text" id="date_from" class="datefld_txt" style="width: 80px;"
				onchange="javascript:get_leave_status('1');" />&nbsp;&nbsp; To: <input
				type="text" id="date_to" class="datefld_txt" style="width: 80px;"
				onchange="javascript:get_leave_status('1');" />&nbsp;&nbsp;
				<button onclick="javascript:get_leave_status('2');"
					style='color: green; font-weight: bold'>Pending Leaves</button>&nbsp;&nbsp;
				Filter By: <select name='leave_type' id='leave_type'
				style="color: green; font-weight: bold"
				onchange="javascript:get_leave_status('1');">
					<option value='AllTypes'>All Type</option>
					<option value='Casual Leave'>.....Casual Leave</option>
					<option value='Paid Leave'>.....Paid Leave</option>
					<option value='Sick Leave'>.....Sick Leave</option>
					<option value='Comp-Off'>.....Comp-Off</option>
					<option value='4'>Approved By MD</option>
					<option value='2'>Approved By TL</option>
					<option value='3'>Rejected Leaves</option>
			</select>&nbsp;&nbsp;&nbsp;&nbsp; <img align="bottom"
				src="<?php echo base_url(); ?>/images/print2.png"
				onclick="javascript:printLeaveHistory();"
				style="width: 70px; height: 40px; color: green" /> &nbsp;&nbsp; <img
				valign="bottom" src="<?php echo base_url(); ?>/images/excel1.ico"
				onclick="javascript:export_leave_history('1');"
				style="width: 70px; height: 40px; color: green" />
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
<input
	type="hidden" id="report_option"
	value="Leave History of <?php echo $this->session->userdata('fullname');?>" />

<script
	type="text/javascript" src="<?php echo base_url(); ?>js/custom/lms.js"></script>
<script
	type="text/javascript"
	src="<?php echo base_url(); ?>js/custom/print.js"></script>

