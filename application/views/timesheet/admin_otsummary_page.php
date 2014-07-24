
<table width='100%' cellpadding="0" cellspacing="0"
	style="color: red" border="0">

	<tr height='20px'>
		<td></td>
	</tr>

	<?php
	$wday=$hday=$tday=$row=$actual=$CO_Hours=0;
	foreach($ot as $openrow) {
		$row++;
		$actual = $openrow["total"];
		$hday = $openrow["holidays"];
		$duty = $openrow["dutyhrs"];
		$tday = $openrow["totaldays"];
		$lday = $openrow["leaves"];
		$clday = $openrow["leaves_cl"];
		$slday = $openrow["leaves_sl"];
		$twh = $openrow["TWH"];
		$exp = $openrow["exp"];
		$wday = $openrow["wdays"];
		$tsday = $openrow["tsdate"];
		$lop = $openrow["lop"];
		$CO_Count = $openrow["co"];
		$holi_ot = $openrow["holi_ot"];
	}

	foreach($timeoffice as $openrow1) {
		$recday = $openrow1["days"];
	}


	foreach($permission as $openrow2) {
		$perm_hrs = $openrow2["Hours"];
		$perm_count = $openrow2["Count"];
	}

	if(!empty($Comp_Off)){
		foreach($Comp_Off as $openrow3) {
			$CO_Hours = $openrow3["Comp_Off_hours"];
		}
	}
	if($CO_Hours==null || empty($CO_Hours)){
		$CO_Hours=0;
	}



	// Total Working Days
	$tot_work_days=$tday-$hday;
	$tot_work_days_txt=$tday.' - '.$hday.' = '.$tot_work_days;

	// Exptg Working Days - Hours

	$rec_holi_ot_diff=$recday-$holi_ot;
	$workdays_diff=$tot_work_days-($lday+$lop+$CO_Count);

	if($rec_holi_ot_diff!=$workdays_diff){

		$lop=$workdays_diff-$rec_holi_ot_diff;

		$new_exp_days=$tot_work_days-($lday+$lop+$CO_Count);

		$CI =& get_instance();
		$CI ->load->model('otsummary_model');
		$result = $CI->otsummary_model->get_new_LOP_Hours($new_exp_days);

		foreach ($result as $row1){
			$exp = $row1["Hours"];
		}
			
		$comp_lop=$lop+$CO_Count;
		$comp_lop_txt=$CO_Count.' + '.$lop.' = '.$comp_lop;
		$lday_txt=$clday.' + '.$slday.' = '.$lday;
			
		$non_workdays=$lday+$lop+$CO_Count;
		$exp_workdays=$tot_work_days-$non_workdays;
		$exp_workdays_txt=$tot_work_days.' - '.$non_workdays.' = '.$exp_workdays;
			
	}

	else{
		$comp_lop=$lop+$CO_Count;
		$comp_lop_txt=$CO_Count.' + '.$lop.' = '.$comp_lop;
		$lday_txt=$clday.' + '.$slday.' = '.$lday;
			
		$non_workdays=$lday+$lop+$CO_Count;
		$exp_workdays=$tot_work_days-$non_workdays;
		$exp_workdays_txt=$tot_work_days.' - '.$non_workdays.' = '.$exp_workdays;

	}


	if($perm_hrs==0){
		$new_exp=$exp;
	}
	else{
		$new_exp=$exp-$perm_hrs;
	}

	$new_actual = $actual-$CO_Hours;

	$profit=$new_actual-$new_exp;


	print("<input type='hidden' id='ot_sum' value=".$profit." />");
	?>

	<tr>
		<td align="right" style="font-size: 18px; color: #003366;">Total Days</td>
		<td align="center"
			style="font-size: 16px; font-weight: bolder; color: black; width: 30px">:</td>
		<td align="left"
			style="font-size: 18px; font-weight: bolder; color: #003366;"><?php echo $tday; ?>
		</td>
	</tr>
	<tr height='40px'>
		<td align="right" style="font-size: 18px; color: #003366;">Holidays</td>
		<td align="center"
			style="font-size: 16px; font-weight: bolder; color: black; width: 30px">:</td>
		<td align="left"
			style="font-size: 18px; font-weight: bolder; color: #003366;"><?php echo $hday; ?>
		</td>
	</tr>
	<tr height='40px'>
		<td align="right" style="font-size: 18px; color: #003366;">Total
			Working Days</td>
		<td align="center"
			style="font-size: 16px; font-weight: bolder; color: black; width: 30px">:</td>
		<td align="left"
			style="font-size: 18px; font-weight: bolder; color: #003366;"><?php echo $tot_work_days_txt; ?>
			Days</td>
	</tr>
	<tr height='40px'>
		<td align="right" colspan='2' style="font-size: 18px; color: #003366"></td>
		<td align="right" style="font-size: 20px; color: #003366"><i>Total
				Working Hours</i></td>
		<td align="center"
			style="font-size: 16px; font-weight: bolder; color: black; width: 22px">:</td>
		<td align="left"
			style="font-size: 22px; font-weight: bolder; color: #003366"><i><?php echo  $twh;?>
				Hrs</i></td>
	</tr>
	<?php if($lday!=0){ ?>
	<tr height='40px'>
		<td align="right" style="font-size: 18px; color: #003366">Leave (CL +
			SL)</td>
		<td align="center"
			style="font-size: 16px; font-weight: bolder; color: black;">:</td>
		<td align="left"
			style="font-size: 18px; font-weight: bolder; color: #003366"><?php echo $lday_txt; ?>
		</td>
	</tr>
	<?php }?>
	<?php if($lop!=0 || $CO_Count!=0){ ?>
	<tr height='40px'>
		<td align="right" style="font-size: 18px; color: #003366">Comp-Off +
			LOP</td>
		<td align="center"
			style="font-size: 16px; font-weight: bolder; color: black;">:</td>
		<td align="left"
			style="font-size: 18px; font-weight: bolder; color: #003366"><?php echo $comp_lop_txt; ?>
		</td>
	</tr>
	<?php }?>
	<tr height='40px'>
		<td align="right" style="font-size: 18px; color: #003366;">Exptg
			Working Days</td>
		<td align="center"
			style="font-size: 16px; font-weight: bolder; color: black; width: 30px">:</td>
		<td align="left"
			style="font-size: 18px; font-weight: bolder; color: #003366;"><?php echo $exp_workdays_txt; ?>
			Days</td>
	</tr>
	<?php if($perm_count!=0){ ?>
	<tr height='40px'>
		<td align="right" style="font-size: 18px; color: #003366">Permission
			Hours</td>
		<td align="center"
			style="font-size: 16px; font-weight: bolder; color: black;">:</td>
		<td align="left"
			style="font-size: 18px; font-weight: bolder; color: red"><?php echo $perm_hrs; ?>
			Hrs &nbsp;</td>
	</tr>
	<?php }?>
	<tr height='40px'>
		<td align="right" colspan='2' style="font-size: 18px; color: #003366"></td>
		<td align="right" style="font-size: 20px; color: #003366"><i>Exptg
				Working Hours</i></td>
		<td align="center"
			style="font-size: 16px; font-weight: bolder; color: black; width: 22px">:</td>
		<td align="left"
			style="font-size: 22px; font-weight: bolder; color: #003366"><i><?php echo  $new_exp;?>
				Hrs</i></td>
	</tr>

	<tr height='40px'>
		<td align="right" style="font-size: 18px; color: #003366">Time Sheet
			updated</td>
		<td align="center"
			style="font-size: 16px; font-weight: bolder; color: black;">:</td>
		<td align="left"
			style="font-size: 18px; font-weight: bolder; color: #003366"><?php echo $tsday ?><font
			size='5pt'><i> / </i> </font> <?php echo $recday ?> Days</td>
	</tr>

	<?php if($holi_ot!=0){ ?>
	<tr height='40px'>
		<td align="right" style="font-size: 18px; color: #003366">Worked on
			Holidays</td>
		<td align="center"
			style="font-size: 16px; font-weight: bolder; color: black;">:</td>
		<td align="left"
			style="font-size: 18px; font-weight: bolder; color: red"><?php echo $holi_ot; ?>
			Day(s)</td>
	</tr>
	<?php }?>
	<?php if($CO_Count!=0){ ?>
	<tr height='40px'>
		<td align="right" style="font-size: 18px; color: #003366">Comp - Off
			Reduction</td>
		<td align="center"
			style="font-size: 16px; font-weight: bolder; color: black;">:</td>
		<td align="left"
			style="font-size: 18px; font-weight: bolder; color: red"><?php echo $CO_Hours; ?>
			Hrs</td>
	</tr>
	<?php }?>
	<tr height='40px'>
		<td align="right" style="font-size: 18px; color: #003366">Total Worked
			Hours</td>
		<td align="center"
			style="font-size: 16px; font-weight: bolder; color: black;">:</td>
		<td align="left"
			style="font-size: 18px; font-weight: bolder; color: #003366"><?php echo $actual; ?>
			Hrs</td>
	</tr>

	<tr>
		<td align="right" colspan='2' style="font-size: 18px; color: #003366"></td>
		<td align="right" style="font-size: 20px; color: #003366"><i>Actual
				Worked Hours</i></td>
		<td align="center"
			style="font-size: 16px; font-weight: bolder; color: black; width: 22px">:</td>
		<td align="left"
			style="font-size: 22px; font-weight: bolder; color: #003366"><i><?php echo $new_actual; ?>
				Hrs</i></td>
	</tr>

	<tr height='50px'>
		<td align="right" width='100%' colspan='5'
			style="font-size: 18px; font-weight: bold; color: #003366">-- -- --
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
			-- -- --</td>
	</tr>
	<tr>
		<td align="right" colspan='2' style="font-size: 18px; color: #003366"></td>
		<td align="right"
			style="font-size: 22px; font-weight: bold; color: #003366">Net Over
			Time Hours</td>
		<td align="center"
			style="font-size: 16px; font-weight: bolder; color: black; width: 22px">:</td>
		<td align="left" colspan='2'
			style="font-size: 22px; font-weight: bolder; color: #003366"><?php echo $profit ?>
			Hrs</td>
	</tr>

	<!--  
		<?php if($non_workdays!=0){ ?>
		<tr height='40px' >	
				<td  align="right"  style="font-size:18px;color:#003366"> Non Working Days</td>
				<td  align="center"  style="font-size:16px;font-weight:bolder;color:black;">:</td>
				<td  align="left"  style="font-size:18px;font-weight:bolder;color:red"><?php echo $non_workdays; ?></td>
		</tr>
		<?php }?>

			
		<tr height='50px' >	
				<td  align="right"  style="font-size:18px;bold;color:#003366">IN-OUT Captured</td>
				<td  align="center"  style="font-size:16px;font-weight:bolder;color:black;">:</td>
				<td  align="left"  style="font-size:18px;font-weight:bolder;color:#003366"><?php echo $recday ?> Days</td>
		</tr>

		<tr height='40px' >	
				<td  align="right"  style="font-size:18px;color:#003366">Time Sheet updated</td>
				<td  align="center"  style="font-size:16px;font-weight:bolder;color:black;">:</td>
				<td  align="left"  style="font-size:18px;font-weight:bolder;color:#003366"><?php echo $tsday ?><font size='5pt'><i> /  </i></font> <?php echo $recday ?> Days</td>
		</tr>
		<tr height='40px' >	
				<td  align="right"  style="font-size:18px;color:#003366">Actual Working Hours</td>
				<td  align="center"  style="font-size:16px;font-weight:bolder;color:black;">:</td>
				<td  align="left"  style="font-size:18px;font-weight:bolder;color:#003366"><?php echo $actual ?> Hrs</td>
		</tr>
		
		<tr height='50px' >
				<td  align="right"  width='100%' colspan='5' style="font-size:18px;font-weight:bold;color:#003366">--  --  --  --  --  --  --  --  --  --  --  --  --  --  --  --  --  --  --  --  --  --  --  --  --  --  --  --  --</td>
			</tr>
		<tr >	
				<td  align="right"  colspan='2' style="font-size:18px;color:#003366"></td>
				<td  align="right" style="font-size:24px;font-weight:bold;color:#003366">Net Over Time Hours</td>
				<td  align="center"  style="font-size:16px;font-weight:bolder;color:black;width:22px">:</td>
				<td align="left"  style="font-size:24px;font-weight:bolder;color:#003366"><?php echo $profit ?> Hrs</td>
		</tr>
		
-->

</table>
