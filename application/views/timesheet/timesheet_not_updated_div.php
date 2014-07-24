
<table valign='top' style='border: 1px solid black'>
	<tr bgcolor="#518C9C"
		style='color: white; font-size: 12pt; font-weight: bold; border: 1px solid black'>
		<td align="center" width="40%" style="border-right: 1px solid white;"><font
			color="white">S.No - Date</font></td>
		<td align="center" width="40%" style="border-right: 1px solid white;"><font
			color="white">S.No - Date</font></td>
	</tr>
	<tr>
		<td valign='top' align='center' style='border: 1px solid black'><?php
		if(!empty($from_timesheet)){
			$counter=0;
			foreach($from_timesheet as $row1){
				$counter++;
				$date=$row1["date1"];
				if($counter<=13){

					print("<table><tr style='color:white;font-size:12pt;font-weight:bold' >");
					print("<td align='center' width='10%' >".$counter."</td>");
					print("<td align='center' width='20%' >".$date."</td>");
					print("</tr>");
					print("</table>");
				}
			}

			?></td>
		<td valign='top'><?php
		$counter1=0;
		foreach($from_timesheet as $row2){
			$counter1++;
			$date1=$row2["date1"];
			if($counter1>=14){
					
				print("<table><tr style='color:white;font-size:12pt;font-weight:bold'>");
				print("<td align='center' width='10%' >".$counter1."</td>");
				print("<td align='center' width='20%' >".$date1."</td>");
				print("</tr>");
				print("</table>");
			}
		}
		}

		else{
			print("<table><tr style='color:#5FFEF7;font-size:12pt;font-weight:bold'><td align='center'>Nothing to Display..!</td></tr></table>");
		}
		?></td>
	</tr>

</table>
