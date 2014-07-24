<div style="height: 70px; background: #59955C;">
	<table>
		<tr>
			<td width="50" align='left'><img style="width: 120px; height: 70px"
				src="<?php echo base_url(); ?>/images/OT2.png">
			</td>
			<td align='left'
				style="margin-bottom: 20px; font-size: 21pt; position: inline; color: white; font-weight: bolder">My
				Acknowledged Over Time Summary</td>
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
	style="height: auto; overflow: hidden; background: #DBEADC; margin: 5px 0px 0px 0px; width: 100%; border: 1px solid black; border-radius: 10px;">

	<div align="center" style="margin-top: 20px; margin-bottom: 10px;">
		<select id="year"
			style="height: 20px; width: 100px; color: Brown; font-weight: bold; font-size: 12px;"
			onchange="javascript:ack_history_for_emp();">
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
		</select>&nbsp;&nbsp;&nbsp;&nbsp; <img valign="bottom"
			src="<?php echo base_url(); ?>/images/print2.png" onmouseover=""
			onclick="javascript:printEmp_OT_Ack_History();"
			style="width: 70px; height: 40px; color: green" />

	</div>

	<hr width="100%">

	<div id="contentData" style="height: 640px;"></div>

</div>
<input
	type='hidden' id='emp'
	value='<?php echo $this->session->userdata('fullname');?>' />
<script
	type="text/javascript"
	src="<?php echo base_url(); ?>js/custom/timesheet_otsummary.js"></script>
