<?php

class AllEmp_ot_dwnld{

	public function Export($data,$params){
		$form_data=explode("::", $params);
		$startdate=$form_data[0];
		$enddate=$form_data[1];
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=".date('dmY')."_All Employees Work report.xls");
		print("<div style='width:100%;border:0px solid black ;border-radius:0px;float:center;'>");


	 print("<table   cellpadding='0' cellspacing='0' style='' border='1' width='100%' >");

	 print("<tr bgcolor='#D1D0CE'; style='height:60;font-size:14px;color:#2B547E;font-weight:bold;'  >");
	 print("<td align='center' width='10%'> Employee Name</td>");
	 print("<td align='center' width='10%'> TWD <br><font size='1px;'>(TotalDays-Holidays)</font></td>");
	 print("<td align='center' width='5%'> TWH <br> <font size='2px;'>[Hrs]</font></td>");
	 print("	<td align='center' width='10%'>NWD <br><font size='2px;'> (CL+SL+LOP+CO)</font></td>");
	 	
	 print("<td align='center' width='10%'> EWD</td>");
	 print("	<td align='center' width='10%'> EWH <br> <font size='2px;'>(-Permission)<br> [Hrs] </font></td>");
	 	
	 	
	 	
	 print("<td align='center' width='10%'> TimeSheet <br> Updated</td>");
	 print("<td align='center' width='11%'> AWH <br><font size='2px;'> (-Comp_Off) <br>[Hrs]</font></td>");
	 print("<td align='center' width='8%'> Net OT </td>");
	 print("<td align='center' width='5%'> WOH <br><font size='2px;'>[Days] </font></td>");
	 	
	 print("</tr>");

	 if(!empty($data)){
	 	$wday=$hday=$tday=$row=$actual=$CO_Hours=0;
			foreach($data as $openrow) {
				
				$name = $openrow["Name"];
				$CI =& get_instance();
				$CI ->load->model('otsummary_model');
					
				$ot=$CI->otsummary_model->get_admin_normal_ot($startdate,$enddate,$name);
				$timeoffice=$CI->otsummary_model->get_days($startdate,$enddate,$name);
				$Comp_Off=$CI->otsummary_model->get_CompOff_Hours($startdate,$enddate,$name);
				$permission=$CI->otsummary_model->get_Permission_Hours($startdate,$enddate,$name);
				sort($ot);
	
	foreach($ot as $openrow) {
		
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
	if($actual == "")
	{
	$actual=0;
	}
	$new_actual = $actual-$CO_Hours;

	$profit=$new_actual-$new_exp;
				
				print("<input type='hidden' id='ot_sum' value=".$profit." />");
				print("<tr  style='color:black;font-size:13px;height:25'>");
				print("<td align='left' width='15%' style='font-size:11pt;font-weight:bold'>".$name."</td>");
				print("<td align='center'>".$tot_work_days_txt."</td>");
				print("<td align='center'>".$twh."</td>");
				print("<td align='center' width='15%'>".$clday." + ".$slday." + ".$lop." + ".$CO_Count." = ".$non_workdays."</td>");

			  
				print("<td align='center'>".$exp_workdays_txt."</td>");
				IF( $perm_hrs == 0)
				{
					print("<td align='center' style='font-size:11pt;font-weight:bold'><i>".$exp." </font></i></td>");
				}else{
					print("<td align='center' style='font-size:11pt;'><i>".$exp." - ".$perm_hrs." = <font style='font-weight:bold'> " .$new_exp." </font></i></td>");
				}
					

		   
				 
				print("<td align='center' ><i>".$tsday."/ ".$recday."</i></td>");
					
				IF( $CO_Hours == 0)
				{
					print("<td align='center' style='font-size:11pt;font-weight:bold'><i>".$actual."  </i></td>");
				}else{
					print("<td align='center' style='font-size:11pt;'><i>".$actual." - ".$CO_Hours." = <font style='font-weight:bold'> " .$new_actual." </font></i></td>");
				}
				if($profit > 0)
				{
					print("<td align='center' style='font-size:12pt;font-weight:bold;color:Green'>".$profit."</td>");
				}else {
					print("<td align='center' style='font-size:12pt;font-weight:bold;color:red'>".$profit."</td>");
				}
				print("<td align='center' ><i>".$holi_ot."</i></td>");
					
				print("</tr>");
			}
	 }

	 else{
	 		
	 	print("<tr  style='color:red;font-size:18px'>");
	 	print("<td colspan='10' align='center'>Nothing to display..!</td></tr>");

	 }
	 	

	 print("</table>");
		print("<table>");
		print("<tr>");
		print("<td style='font-size:10pt;font-weight:bold;color:#7e2217'> * TWD </td><td style='font-size:10pt;font-weight:bold;color:black'>-  Total Working Days </td>");
		print("<td style='font-size:10pt;font-weight:bold;color:#7e2217'> *TWH </td><td style='font-size:10pt;font-weight:bold;color:black'>- Total Working Hours </td>");
			
		print("<td style='font-size:10pt;font-weight:bold;color:#7e2217'> *NWD </td><td style='font-size:10pt;font-weight:bold;color:black'>- Non Working Days </td>");
		print("</tr>");
		print("<tr>");
		print("<td style='font-size:10pt;font-weight:bold;color:#7e2217'> *EWD</td><td style='font-size:10pt;font-weight:bold;color:black'> - Expected Working Days </td>");
			
		print("<td style='font-size:10pt;font-weight:bold;color:#7e2217'> *EWH </td><td style='font-size:10pt;font-weight:bold;color:black'>- Expected Working Hours </td>");
		print("<td style='font-size:10pt;font-weight:bold;color:#7e2217'> *AWH </td><td style='font-size:10pt;font-weight:bold;color:black'>- Actual Working Hours </td>");
		print("</tr>");
		print("<tr>");
		print("<td style='font-size:10pt;font-weight:bold;color:#7e2217'> *WOH </td><td style='font-size:10pt;font-weight:bold;color:black'>- Working On Holiday </td>");
		print("</tr>");
			
		print("</table>");
	 print("</div>");


	}
}

?>