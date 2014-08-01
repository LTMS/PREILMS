<?php 				
	if($Time_Activity){
				function sum_the_time($time1, $time2) {
					  $times = array($time1, $time2);
					  $seconds = 0;
							  foreach ($times as $time)	  {
							    list($hour,$minute,$second) = explode(':', $time);
							    $seconds += $hour*3600;
							    $seconds += $minute*60;
							    $seconds += $second;
							  }
					  $hours = floor($seconds/3600);
					  $seconds -= $hours*3600;
					  $minutes  = floor($seconds/60);
					  $seconds -= $minutes*60;
					  // return "{$hours}:{$minutes}:{$seconds}";
					  return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds); // Thanks t
				}
		
		
		print("<table width='100%' border='1' align='center' cellpadding='1' cellspacing='1'   style='border-collapse:collapse;'>");

					print("<tr style='color:red;font-size:16px;font-weight:bolder; '>
										<td colspan='13' align='center'>$title</td></tr>");
				
					print("<tr bgcolor='#518C9C' id='hdr_row' style='font-size:15px;font-weight:bold;background-color:white;color:black;border-right:1px solid  black; '>");
					print("<td width='3%' align='center'>S.No</td>");
					print("<td width='10%' align='center'>Employee Name</td>");
					print("<td width='8%' align='center'>Date</td>");
					print("<td width='5%' align='center'>IN Time</td>");
					print("<td width='5%' align='center'>Late Hours</td>");
					print("<td width='5%' align='center'>OUT Time</td>");
					print("<td width='5%' align='center'>Duty Hours</td>");
					print("<td width='5%' align='center'>OT Hours</td>");
					print("<td width='5%' align='center'>Total Hours</td>");
					print("<td width='10%' align='center'>Updated Date</td>");
					print("</tr>");
					
					$counter=0;
					$title_name="";
					$title_total="00:00:00";	
					foreach($Time_Activity as $openrow) {
						$counter++;
						$rowid="row".$counter;
						$date=$openrow["ts_date"];
						$name=$openrow["ts_name"];
						$d2=$date.',  '.date('D', strtotime($date));
						$rec_date=date('d-m-Y H:m:s', strtotime($openrow["recorded_time"]));
						$ts_tot_hrs=$openrow["ts_tot_hrs"];
							if($title_name!=$name){
								if($counter!=1){
										print("<tr style='color:black;font-size:14px;font-weight:bolder; '><td colspan='10' align='right'>Total Hours: $title_total</td></tr>");
								}
								print("<tr style='color:black;font-size:14px;font-weight:bolder; '><td colspan='10'>$name</td></tr>");
								$title_total="00:00:00";	
							}
						
						print("<tr id='$rowid'  class='small'>");
						print("<td width='3%' align='center'> ".$counter."</td>");
						print("<td width='5%' align='left'>".$openrow["ts_name"]." </td>");
						print("<td width='6%' align='left'>$d2</td>");
						print("<td width='5%' align='center'>".$openrow["ts_intime"]." </td>");
						print("<td width='5%' align='center'>".$openrow["ts_late"]."</td>");
						print("<td width='5%' align='center'>".$openrow["ts_outtime"]."</td>");
						print("<td width='5%' align='center'>".$openrow["ts_duty"]."</td>");
						print("<td width='5%' align='center'>".$openrow["ts_ot"]."</td>");
						print("<td width='5%' align='center'>".$ts_tot_hrs."</td>");
						print("<td width='5%' align='center'>".$rec_date."</td>");
						print("</tr>");
						$title_name=$name;
													
								$title_name=$name;
								$title_total=sum_the_time($title_total, $ts_tot_hrs);  // this will give you a result: 19:12:25
						
				}
				print("<tr style='color:black;font-size:14px;font-weight:bolder; '><td colspan='10' align='right'>Total Hours: $title_total</td></tr>");
				foreach($Time_Activity_Total as $row2){
							$tot_hrs=$row2["total"];
							$ot=$row2["ot"];
							$duty=$row2["duty"];
							$tot_days=$row2["days"];
						}
						 				print("<tr style='color:black;font-size:16px;font-weight:bolder; '>");
										print("<td colspan='6'  align='right'> Total Hours</td>");
										print("<td  align='center'>".$duty." Hours</td>");
										print("<td  align='center'>".$ot." Hours</td>");
										print("<td colspan='2'  align='left'>".$tot_hrs." Hours</td>");
										print("</tr>");
				
								
		print("</table><br>");
	
	}
		print("<hr>");
	
		if(empty($Time_Activity))	{
			print("<div style='margin:50px 0px 0px 420px;'>");
			print("<font style='font-size:2em;color:#254117; font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; >Nothing to Display...!</font>");
			print("</div>");
		}

		
		
		?>
		
		<script	type="text/javascript" src="<?php echo base_url(); ?>js/custom/print.js"></script>
				