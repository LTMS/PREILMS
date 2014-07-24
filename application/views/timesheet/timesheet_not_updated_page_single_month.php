
<?php
if(!empty($ind_details)){
	print("<table style='left:30px;' width='100%'  border='1px solid black' cellpadding='0' cellspacing='0' style='border-collapse:collapse;' >");

	print("<tr bgcolor='#B6B6B4' style='font-size:12pt;font-weight:bolder;'>");
	print("<td align='center' width='4%' style=''><font color='white'>S.No</font></td>");
	print("<td align='center'  width='18%' style=''><font color='white'>Employee Name</font></td>");
	print("<td align='center'  width='10%' style=''><font color='white'>Year-Month</font></td>");
	print("<td align='center'  width='58%' style=''><font color='white'>Unupdated date</font></td>");
	print("<td align='center'  width='10%' style='><font color='white'>Total Days</font></td>");
	print("</tr>");
	print("<tr>	");




	$date="";
	$days =0;
	foreach($ind_details as  $row) {
		$days++;
		if($date == "")
		{
			$NU=explode("-", $row["Notupdated"]);
			$date = $NU[2];

		}else
		{
			$NU=explode("-", $row["Notupdated"]);
			$date = $date.", ".$NU[2];
		}
	}
	$counter=0;
	if($date != "")
	{
		$counter++;
		print("<tr style='font-size:12pt;color:#003333'>");
		print("<td width='4%' align='center' style=''>".$counter."</td>");
		print("<td width='4%' align='left' style='font-weight:bolder;'>".$row["user_email"]."</td>");
		print("<td width='4%' align='center' style=''>".$NU[0]."-".$NU[1]."</td>");
		print("<td width='4%' align='left' style=''>".$date."</td>");
		if($days > 3)
		{
			print("<td width='4%' align='center' style='color:red;font-weight:bolder;'>".$days."</td>");
		}else
		{
			print("<td width='4%' align='center' style='font-weight:bolder;'>".$days."</td>");
		}
		print("</tr>");
	}
	print("</table>");
}
else{
	print("<table border='0'>");
	print("<tr height='70px'></tr>");
	print("<tr  style='color:red;font-size:18px' style='border:0px solid black;'>");
	print("<td  align='center'>");
	print("<img id='ack_button'  valign='bottom' src='../../images/update.gif'   style='width:400px;height:400px;color:green'/></td></tr>");
	print("</table>");
}
?>








