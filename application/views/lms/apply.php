
<div style="height: 70px; background: #59955C;">
	<table>
		<tr>
			<td width="50" align='left'><img style="width: 150px; height: 60px"
				src="<?php echo base_url(); ?>/images/apply1.png"></td>
			<td align='left'
				style="margin-bottom: 20px; font-size: 21pt; position: inline; color: white; font-weight: bolder">Apply
				for Leave & Permission</td>
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

<?php


// Parameters
		foreach($Param as $openrow) {
			$sick_tot=$openrow["sick_total"];
			$paid_tot=$openrow["paid_total"];
			$casual_tot=$openrow["casual_total"];
			$casual_month=$openrow["casual_month"];
			$paid_exp=$openrow["paid_exp"];
			$sick_limit=$openrow["sick_limit"];
			$comp_off_reduc=$openrow["comp_off_reduct"];
			$permis=$openrow["permission_hrs"];
			$paid_min=$openrow["paid_min"];
			$paid_prior=$openrow["paid_prior"];
			$comp_hrs=$openrow["hour"];
			$comp_min=$openrow["min"];
			$carry=$openrow["carry_forward"];
			$comp_minutes=$openrow["comp_minutes"];
		}
		print("<input type='hidden' id='reduction' value=".$comp_off_reduc." />");
		print("<input type='hidden' id='sick_limit' value=".$sick_limit." />");
		print("<input type='hidden' id='casual_limit' value=".$casual_month." />");
		print("<input type='hidden' id='paid_min' value=".$paid_min." />");
		print("<input type='hidden' id='paid_prior' value=".$paid_prior." />");
		print("<input type='hidden' id='comp_minutes' value=".$comp_minutes." />");
		
		
		$casual=$paid=$sick=$comp=$casual_y=$paid_y=$sick_y=$comp_y=$casual_p=$paid_p=$sick_p=$comp_p=0;
		
		if(!empty($summary)){
			foreach($summary as $openrow1) {
				if($openrow1["LeaveType"]=='Casual Leave'){
					$casual=$openrow1["TotalDays"];
				}
				if($openrow1["LeaveType"]=='Paid Leave'){
					$paid=$openrow1["TotalDays"];
				}
				if($openrow1["LeaveType"]=='Sick Leave'){
					$sick=$openrow1["TotalDays"];
				}
				if($openrow1["LeaveType"]=='Comp-Off'){
					$comp=$openrow1["TotalDays"];
				}
			}
		}
		
		if(!empty($summary_year)){
			foreach($summary_year as $openrow2) {
				if($openrow2["LeaveType"]=='Casual Leave'){
					$casual_y=$openrow2["TotalDays"];
				}
				if($openrow2["LeaveType"]=='Paid Leave'){
					$paid_y=$openrow2["TotalDays"];
				}
				if($openrow2["LeaveType"]=='Sick Leave'){
					$sick_y=$openrow2["TotalDays"];
				}
				if($openrow2["LeaveType"]=='Comp-Off'){
					$comp_y=$openrow2["TotalDays"];
				}
			}
		}
		if(!empty($summary_pend)){
			foreach($summary_pend as $openrow3) {
				if($openrow3["LeaveType"]=='Casual Leave'){
					$casual_p=$openrow3["TotalDays"];
				}
				if($openrow3["LeaveType"]=='Paid Leave'){
					$paid_p=$openrow3["TotalDays"];
				}
				if($openrow3["LeaveType"]=='Sick Leave'){
					$sick_p=$openrow3["TotalDays"];
				}
				if($openrow3["LeaveType"]=='Comp-Off'){
					$comp_p=$openrow3["TotalDays"];
				}
			}
		}
			
		// Permission
		$per_y=$per_m=$per_p=0;
		
		if(!empty($perm)){
			foreach($perm as $openrow4) {
				$per_m=$openrow4["month"];
				$per_y=$openrow4["year"];
				$per_p=$openrow4["pending"];
			}
		}
			
			
		// Approval Officer
		if(!empty($approv)){
			foreach($approv as $openrow6) {
				$App_Off=$openrow6["LeaveApprover_L1"];
			}
		}
		else{
			$App_Off="Managing Director";
		}
			
		// Date of joining
		if(!empty($doj)){
			foreach($doj as $openrow7) {
				$DOJ=$openrow7["JoiningDate"];
				$experience=$openrow7["Experience"];
			}
		}
		else{
			$DOJ="2013-08-01";
			$experience=6;
		}
			
		
		$casual_r=0;
		$paid_r=$paid_tot-$paid_y;
		$sick_r=$sick_tot-$sick_y;
		$per_r=12-$per_y;
		
		if($carry=='YES'){
			$casual_r=$casual_tot-$casual_y-$casual_p;
		}
		if($carry=='NO'){
			foreach($carry_forward as $row){
				$casual_r=$row["casual_remain"];
			}
		}
			





	foreach($Total_OT as $row1) {
		$tot_ot_hrs = $row1["total"];
	}

	foreach($Comp_Hours  as $row2) {
		$CO_Hours = $row2["Comp_Off_hours"];
		$CO_Count = $row2["CO_Count"];
	}

	if($CO_Count==0){
		$CO_Hours=0;
	}

	$profit=$tot_ot_hrs-$CO_Hours;



?>


<div
	style="float: left; height: auto; background: #DBEADC; margin: 20px 0px 0px 0px; width: 60%; border: 1px solid black; border-radius: 10px;">
	<p style="height: 40px; padding: 20px 0px 0px 20px;" align="center">
		<span style="font-weight: bolder; font-size: 18pt; color: #003333">Leave
			Application Form </span>
	</p>
	<hr width="99.7%">

	<input type="hidden" name="count" id="count" value="0" />
	<table id="Table1" border="0" align="center">
		<tr>
			<td id="error" align="center" colspan="2"
				style="color: red; width: 250px; font-size: 15px; font-weight: bolder;">
			</td>
		</tr>
		<tr>
			<td id="error1" align="center" colspan="2"
				style="color: red; width: 250px; font-size: 15px; font-weight: bolder;">
			</td>
		</tr>
		<tr>
			<td width='30%' align="right"><font class="font_align">Type of Leave
			</font></td>
			<td><select name="leave_type" id="leave_type"
				style="height: 25px; width: 120px;" onchange="check_leave_status()">
					<option value="Casual Leave">Casual Leave</option>
					<?php
					if($sick_y<$sick_tot){
						print('<option value="Sick Leave">Sick Leave</option>	');
					}
					if($experience>=$paid_exp && $experience<$paid_exp){
						print('<option value="Paid Leave">Paid Leave</option>	');
					}
					if($profit>=$comp_off_reduc){
						print('<option value="Comp-Off">Comp-Off</option>	');
					}

					print('<option value="Permission">Permission</option>	');

					?>

			</select>
			</td>
		</tr>
	</table>

	<table id="Table2" border="0" align="center">
		<tr>
			<td width='30%' align="right"><font class="font_align">Leave From</font>
			</td>
			<td><input name="date_from1" class="input" id="date_from1"
				type="text" style="width: 80px; height: 18px;" readonly='readonly'
				onchange="check_leave_status(this.value)" />
			</td>
		</tr>
		<tr>
			<td align="right"><font class="font_align">To</font></td>
			<td><input name="date_to1" class="input" id="date_to1"
				readonly='readonly' type="text" style="width: 80px; height: 18px;"
				onchange="check_leave_status(this.value)" />
			</td>
		</tr>
		<tr>
			<td align="right"><font class="font_align">No of Days</font></td>
			<td><input name="no_of_days" class="input" id="no_of_days"
				type="text" readonly="readonly" style="width: 50px; height: 18px;" " /><font
				color='red' size='2px' face='Lucida Handwriting'>&nbsp;&nbsp;&nbsp;
					* Working Days only..! </font>
			</td>
		</tr>

		<tr id="Lev1Off">
			<td align="right"><font class="font_align">Level-1 Approver</font></td>
			<td align="left"><input name="approval_officer" align="left"
				class="input" id="approval_officer" readonly="readonly" type="text"
				style="width: 200px; height: 18px;"
				value="	<?php	echo $App_Off;		?>" /></td>
		</tr>
		<tr>
			<td align="right"><font class="font_align">Level-2 Approver</font></td>
			<td align="left"><input name="approval_officer2" align="left"
				class="input" id="approval_officer2" readonly="readonly" type="text"
				style="width: 150px; height: 18px;" value="	Managing Director" /></td>
		</tr>
		<tr>
			<td align="right"><font class="font_align">Reason</font></td>
			<td align="left" width="200px">
			<textarea name="reason"		placeholder='Avoid using special characters.. Maximum 200 characters allowed'
					id="reason" onblur='remove_Specials("reason",this.value)' rows="3" cols="40"></textarea></td>
		</tr>
		<tr style="display: none" id="doc_row1">
			<td align="right"><font class="font_align">Upload Document</font></td>
			<td align="left" width="250px"><input type="file" name="fileupload"
				id='fileupload' value='' />
			</td>
		</tr>
		<tr>
			<td id="success" align="center" colspan="2"
				style="color: green; width: 250px; font-size: 15px; font-weight: bolder;"></td>
		</tr>
		<tr id="butt1">
			<td colspan="2" align="center"><input style="height: 30px"
				type='image' src="<?php echo base_url(); ?>/images/applyleave.png"
				id="button" onclick="javascript:validate_fields();"></td>
		</tr>

	</table>


	<table id="Table3" style="display: none" border="0" align="center">
		<tr>
			<td width='30%' align="right"><font class="font_align">Permission on</font>
			</td>
			<td><input name="p_date" class="input" id="p_date"
				readonly='readonly' type="text" style="width: 80px; height: 18px;"
				" onchange='validate_permission(this.value)' /></td>
		</tr>

		<tr>
			<td width='30%' align="right"><font class="font_align">Duration</font>
			</td>
			<td><select name="p_total" id="p_total"
				style="height: 25px; width: 80px;">
				<?php
				if($permis_hrs==1 || $permis_hrs==0){
					print('<option value="01:00:00">1 Hour</option>');
				}
				if($permis_hrs==2){
					print('<option value="01:00:00">1 Hour</option>');
					print('<option value="02:00:00">2 Hours</option>');
				}
				if($permis_hrs==3){
					print('<option value="01:00:00">1 Hour</option>');
					print('<option value="02:00:00">2 Hours</option>');
					print('<option value="03:00:00">3 Hours</option>');
				}
				if($permis_hrs==4){
					print('<option value="01:00:00">1 Hour</option>');
					print('<option value="02:00:00">2 Hours</option>');
					print('<option value="03:00:00">3 Hours</option>');
					print('<option value="04:00:00">4 Hours</option>');
				}
				if($permis_hrs==5){
					print('<option value="01:00:00">1 Hour</option>');
					print('<option value="02:00:00">2 Hours</option>');
					print('<option value="03:00:00">3 Hours</option>');
					print('<option value="04:00:00">4 Hours</option>');
					print('<option value="05:00:00">5 Hours</option>');
				}
				if($permis_hrs>=6 ){
					print('<option value="01:00:00">1 Hour</option>');
					print('<option value="02:00:00">2 Hours</option>');
					print('<option value="03:00:00">3 Hours</option>');
					print('<option value="04:00:00">4 Hours</option>');
					print('<option value="05:00:00">5 Hours</option>');
					print('<option value="06:00:00">6 Hours</option>');
				}
					
				?>

			</select>
			</td>
		</tr>

		<tr>
			<td width='30%' align="right"><font class="font_align">From</font></td>
			<td><select name="p_timeH" id="p_timeH"
				style="height: 25px; width: 80px;">
					<option value="09">09 AM</option>
					<option value="10">10 AM</option>
					<option value="11">11 AM</option>
					<option value="12">12 PM</option>
					<option value="13">01 PM</option>
					<option value="14">02 PM</option>
					<option value="15">03 PM</option>
					<option value="16">04 PM</option>
					<option value="17">05 PM</option>
			</select> <select name="p_timeM" id="p_timeM"
				style="height: 25px; width: 90px;">
					<option value="00:00">00 Mins</option>
					<option value="15:00">15 Mins</option>
					<option value="30:00">30 Mins</option>
					<option value="45:00">45 Mins</option>
			</select>
			</td>
		</tr>
		<tr>
			<td align="right"><font class="font_align">Reason</font></td>
			<td align="left" width=""><textarea name="p_reason" id="p_reason" onblur='remove_Specials("p_reason",this.value)'
					placeholder='Avoid using special characters.. 150 characters allowed'
					rows="3" cols="40" class="txtarea"></textarea></td>
		</tr>

		<tr id="butt2">
			<td colspan="2" align="center"><input style="height: 30px"
				type='image'
				src="<?php echo base_url(); ?>/images/applypermission.png"
				id="button1" onclick="javascript:insert_permission_data();"></td>
		</tr>
		<tr>
			<td id="error2" align="center" colspan="2"
				style="color: green; width: 250px; font-size: 15px; font-weight: bolder;">
			</td>
		</tr>

	</table>
</div>
<div
	style="position: absolute; top: 100px; left: 68%; width: 26%; height: 25%; border: 0px solid black;">

	<table border="1" align="left" bgcolor="99CC66"
		style="font-size: 8pt; font-weight: bolder;">
		<tr>
			<td bgcolor="white" colspan="6" align="center"
				style="font-size: 10pt; font-weight: bolder;">Leave Summary in Days</td>
		</tr>
		<tr>
			<td style="font-size: 9pt; font-weight: bolder; color: white"
				align="center">Leave Type</td>
			<td style="font-size: 9pt; font-weight: bolder; color: white"
				align="center">Pending</td>
			<td style="font-size: 9pt; font-weight: bolder; color: white"
				align="center">This Month</td>
			<td style="font-size: 9pt; font-weight: bolder; color: white"
				align="center">This Year</td>
			<td style="font-size: 9pt; font-weight: bolder; color: white"
				align="center">Balance</td>
			<td style="font-size: 12pt; font-weight: bolder; color: white"
				align="center">Total</td>
		</tr>
		<tr>
			<td align="center">Casual Leave</td>
			<td align="center" id="clp"><?php 	echo  $casual_p;	?>
			</td>
			<td align="center" id="cl"><?php 	echo  $casual;	?>
			</td>
			<td align="center" id="cly"><?php 	echo  $casual_y;	?>
			</td>
			<td align="center" id="clr"><?php 	echo  $casual_r;	?>
			</td>
			<td align="center" id="clt" style='font-size: 12pt'><?php 	echo  $casual_tot;	?>
			</td>
		</tr>
		<tr>
			<td align="center">Paid Leave</td>
			<td align="center" id="plp"><?php 	echo  $paid_p;		?>
			</td>
			<td align="center" id="pl"><?php 	echo  $paid;		?>
			</td>
			<td align="center" id="ply"><?php 	echo  $paid_y;	?>
			</td>
			<td align="center" id="plr"><?php 	echo  $paid_r;	?>
			</td>
			<td align="center" id="plt" style='font-size: 12pt'><?php 	echo  $paid_tot;	?>
			</td>
		</tr>
		<tr>
			<td align="center">Sick Leave</td>
			<td align="center" id="slp"><?php	echo $sick_p;		?>
			</td>
			<td align="center" id="sl"><?php	echo $sick;		?>
			</td>
			<td align="center" id="sly"><?php 	echo  $sick_y;	?>
			</td>
			<td align="center" id="slr"><?php 	echo  $sick_r;	?>
			</td>
			<td align="center" id="slt" style='font-size: 12pt'><?php 	echo  $sick_tot;	?>
			</td>
		</tr>
		<tr>
			<td align="center">Permission</td>
			<td align="center" id="per_p"><?php	echo $per_p;		?>
			</td>
			<td align="center" id="per"><?php	echo $per_m;		?>
			</td>
			<td align="center" id="per_y"><?php	echo $per_y;		?>
			</td>
			<td align="center" id="per_r"><?php	echo $per_r;		?>
			</td>
			<td align="center" id="per_t" style='font-size: 12pt'>12</td>
		</tr>
		<tr>
			<td align="center">Comp-Off</td>
			<td align="center" id="comp_p"><?php	echo $comp_p;		?>
			</td>
			<td align="center" id="comp"><?php	echo $comp;		?>
			</td>
			<td align="center" id="comp_y"><?php 	echo  $comp_y;	?>
			</td>
			<td align="center" id="comp_r">---</td>
			<td align="center" id="comp_t" style='font-size: 12pt'>---</td>
		</tr>
	</table>
</div>

<div
	style="position: absolute; top: 310px; left: 71%; width: 20%; border: 0px solid black">
	<?php

	if($profit>=$comp_off_reduc && $profit !="" && $profit !=null){
		print("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='".base_url()."/images/comp_off.png' width='80px' height='80px'/><br><font size='2pt' weight='bolder' color='green'>Comp-Off Available <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(".$profit." Hours)</font>");

	}
	else{
		print("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='".base_url()."/images/comp_off1.png' width='80px' height='80px'/> <br><font size='2pt' weight='bolder' color='red'> &nbsp;&nbsp;&nbsp;No Comp-Off </font>");

	}
	?>


</div>

<div style='position: absolute; top: 310px; left: 82%;'>
<?php
print("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='".base_url()."/images/paidred.png' width='80px' height='80px'/> <br><font size='2pt' weight='bolder' color='red'> &nbsp;&nbsp;&nbsp;No Paid Leave </font>");
/*
 if($experience>=6){
 print("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='".base_url()."/images/paidgreen.png' width='80px' height='80px'/><br><font size='2pt' weight='bolder' color='green'>Paid Leave Available </font>");

 }
 else{
 print("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='".base_url()."/images/paidred.png' width='80px' height='80px'/> <br><font size='2pt' weight='bolder' color='red'> &nbsp;&nbsp;&nbsp;No Paid Leave <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(".$experience." Months)</font>");

 }
 */
?>

</div>


<input
	type="hidden" value="<?php	echo $DOJ		?>" id="DOJ" />
<input type="hidden" value=""
	id="Diff" />
<input
	type="hidden" value="<?php	echo $profit?>" id="remain" />
<input type="hidden"
	value="" id="leavecheck" />
<input type="hidden" value=""
	id="prior" />
<input type="hidden"
	value="" id="leavID" />
<input
	type="hidden" value="--  No --" id="holidays_list" />
<input
	type="hidden"
	value="<?php echo $this->session->userdata('fullname');?>"
	id="username" />


<script
	type="text/javascript" src="<?php echo base_url(); ?>js/custom/lms.js"></script>
<script	type="text/javascript"	src="<?php echo base_url(); ?>js/custom/ajaxfileupload.js"></script>
