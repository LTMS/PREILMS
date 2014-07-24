
<table>
	<tr bgcolor="#518C9C" style="border-right: 1px solid white;">
		<td align="center" width="4%" style="border-right: 1px solid white;"><font
			color="white">S.No</font></td>
		<td align="center" width="10%" style="border-right: 1px solid white;"><font
			color="white">Employee Name</font></td>
		<td align="center" width="10%" style="border-right: 1px solid white;"><font
			color="white">Permission On</font></td>
		<td align="center" width="8%" style="border-right: 1px solid white;"><font
			color="white">Hours</font></td>
		<td align="center" width="8%" style="border-right: 1px solid white;"><font
			color="white">From Time</font></td>
		<td align="center" width="12%" style="border-right: 1px solid white;"><font
			color="white">Status</font></td>
		<td align="center" width="10%" style="border-right: 1px solid white;"><font
			color="white">Applied On</font></td>
		<td align="center" style="border-right: 1px solid white;"><font
			color="white">Reason</font></td>
	</tr>
	<tr>
	<?php
	$counter=0;
	if(!empty($Permission)){
			
		foreach($Permission as $row) {
			$counter++;
			$rowid="row".$counter;
			$lop_id=$row->permission_id;
			$d1=$row->p_date;
			$d2=date("d M Y",strtotime($d1));
			$d3=$row->appliedtime;
			$d4=date("d M Y",strtotime($d3));
			$d5=date("Y-m-d");
			$d6=date("Y-m-d",strtotime($d3));
			if($d5>$d6){
				$status='No Result';
			}
			else{
				$status=$row->status;
			}
			print("<tr  class='td_rows' style='border-right:1px solid white;'>");
			print("<td align='center'><input type='text' style='' class='plain_txt' readonly='readonly' value='".$counter."' /></td>");
			print("<td align='center' ><input type='text' height='' style='margin-left:0px;' class='plain_txt'   value=\"".$row->user."\" /></td>");
			print("<td align='center' ><input type='text' height='' style='margin-left:0px;' class='plain_txt'   value='$d2' /></td>");
			print("<td align='center'><input type='text' style='' class='plain_txt' readonly='readonly'  value=\"".$row->totalhrs."\" /></td>");
			print("<td align='center'><input type='text' style='' class='plain_txt' readonly='readonly'  value='".$row->timefrom."' /></td>");
			if($row->status=='Applied'){
				print("<td align='center'><input type='text' style='color:blue;' class='plain_txt' readonly='readonly'  value='".$status."' /></td>");
			}
			else if($row->status=='Approved'){
				print("<td align='center'><input type='text' style='color:green;' class='plain_txt' readonly='readonly'  value='".$row->status."' /></td>");
			}
			else{
				print("<td align='center'><input type='text' style='color:red;' class='plain_txt' readonly='readonly'  value='".$row->status."' /></td>");
			}
			print("<td align='center'><input type='text' style='' class='plain_txt' readonly='readonly'  value='".$d4."' /></td>");
			print("<td align='center'><input type='text' style='' class='plain_txt' readonly='readonly'  value='".$row->reason."' /></td>");

			print("</tr>");
		}
	}

	else{
		print("<tr><td align='center' colspan='10' style='color:white;font-size:13pt;font-weight:bolder'> Nothing to Display</td></tr>");

	}

	?>

</table>
