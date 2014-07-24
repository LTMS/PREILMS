<div style="height: 70px; background: #59955C;">
	<table>
		<tr>
			<td width="50" align='left'><img style="width: 120px; height: 70px"
				src="<?php echo base_url(); ?>/images/OT2.png">
			</td>
			<td align='left'
				style="margin-bottom: 20px; font-size: 21pt; position: inline; color: white; font-weight: bolder">Employees
				Over Time Summary</td>
			<td style="color: white; font-size: 15pt" align="right">Hi, <b><?php echo $this->session->userdata('fullname');?>
			</b> ..!</td>
			<td align="left" style="color: white; font-size: 15pt; width: 50px">
				<a href="<?php echo site_url("logincheck/logout"); ?>"><img
					style="width: 50px; height: 50px"
					src="<?php echo base_url(); ?>/images/logout2.png">
			</a></td>
		</tr>
	</table>
</div>

<div
	style="height: 800px; overflow: auto; background: #DBEADC; margin: 5px 0px 0px 0px; width: 100%; border: 1px solid black; border-radius: 10px;">

	<div align="center" style="margin-top: 20px; margin-bottom: 10px;">
		<select id="year"
			style="height: 20px; width: 100px; color: Brown; font-weight: bold; font-size: 12px;"
			onchange="javascript:get_admin_otsummary();">
			<option value="">Select Year</option>
			<?php
			foreach($years as $row){
				$y=$row["year"];
				?>
			<option value="<?php echo $y;?>">
			<?php echo $y;?>
			</option>
			<?php
			}
			?>
		</select>&nbsp;&nbsp;&nbsp;&nbsp; <select id="month1"
			style="height: 20px; width: 100px; color: blue; font-weight: bold; font-size: 12px;"
			onchange="javascript:get_admin_otsummary();">
			<option value="">Start Month</option>
			<option value="01-01">January</option>
			<option value="02-01">February</option>
			<option value="03-01">March</option>
			<option value="04-01">April</option>
			<option value="05-01">May</option>
			<option value="06-01">June</option>
			<option value="07-01">July</option>
			<option value="08-01">August</option>
			<option value="09-01">September</option>
			<option value="10-01">October</option>
			<option value="11-01">November</option>
			<option value="12-01">December</option>
		</select>&nbsp;&nbsp;&nbsp;&nbsp; <select id="month2"
			style="height: 20px; width: 100px; color: red; font-weight: bold; font-size: 12px;"
			onchange="javascript:get_admin_otsummary();">
			<option value="">End Month</option>
			<option value="01">January</option>
			<option value="02">February</option>
			<option value="03">March</option>
			<option value="04">April</option>
			<option value="05">May</option>
			<option value="06">June</option>
			<option value="07">July</option>
			<option value="08">August</option>
			<option value="09">September</option>
			<option value="10">October</option>
			<option value="11">November</option>
			<option value="12">December</option>
		</select>&nbsp;&nbsp;&nbsp;&nbsp; <select id='emp'
			style="height: 20px; width: 150px; color: green; font-weight: bolder; font-size: 12px;"
			onchange="javascript:get_admin_otsummary();">
			<option selected value="">Select Employee</option>
			<option value="AllEmp">All Employees</option>
			<?php
			foreach($members as $memb ){
				$emp=$memb["Name"];
				echo '<option style="font-size:12px" value="'.$emp.'">'.$emp.'</option>';
			}
			?>
		</select> &nbsp;&nbsp; <img id='ack_button' valign="bottom"
			src="<?php echo base_url(); ?>/images/ack.png"
			onclick="javascript:acknowledge_OT();"
			style="width: 120px; height: 35px; color: green" />
		&nbsp;&nbsp;&nbsp;&nbsp; <img valign="bottom"
			src="<?php echo base_url(); ?>/images/print2.png" onmouseover=""
			onclick="javascript:printOT_Summary();"
			style="width: 70px; height: 40px; color: green" /> <img
			id="AllEmp_ot_dwnld" valign="bottom"
			src="<?php echo base_url(); ?>/images/excel2.png" onclick=""
			style="width: 70px; height: 40px; color: green" />

	</div>

	<hr width="100%">

	<div id="contentData" style="height: 800px; overflow: auto;"></div>

</div>

<script
	type="text/javascript"
	src="<?php echo base_url(); ?>js/custom/timesheet_otsummary.js"></script>

<script>
$( document ).ready(function() {
	
	alert("* This Report requires Confirmation on Loss of Pay.\n* Please have a Confirmation on Loss of Pay [LOP] of Every Employee before using this  Report..!");
});
</script>
