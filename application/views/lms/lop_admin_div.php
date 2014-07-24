
<table>
	<tr bgcolor="#518C9C" style="border-right: 1px solid white;">
		<td align="center" width="4%" style="border-right: 1px solid white;"><font
			color="white">S.No</font></td>
		<td align="center" width="18%" style="border-right: 1px solid white;"><font
			color="white">Employee Name</font></td>
		<td align="center" width="10%" style="border-right: 1px solid white;"><font
			color="white">Date</font></td>
		<td align="center" width="5%" style="border-right: 1px solid white;"><font
			color="white">No of Days</font></td>
		<td align="center" width="12%" style="border-right: 1px solid white;"><font
			color="white">Added By</font></td>
		<td align="center" width="10%" style="border-right: 1px solid white;"><font
			color="white">Added On</font></td>
		<td align="center" width="8%" style="border-right: 1px solid white;"><font
			color="white">Remove</font></td>
		<td align="center" style="border-right: 1px solid white;"><font
			color="white">Remarks</font></td>
	</tr>
	<tr>
	<?php
	$counter=0;
	if(!empty($LOP_List)){
			
		foreach($LOP_List as $row) {
			$counter++;
			$rowid="row".$counter;
			$lop_id=$row->lop_id;
			$d1=$row->LOP_Date;
			$d2=date("d M Y",strtotime($d1));
			$d3=$row->Updated_On;
			$d4=date("d M Y",strtotime($d3));
			print("<tr  class='td_rows' style='border-right:1px solid white;'>");
			print("<td align='center'><input type='text' style='' class='plain_txt' readonly='readonly' value='".$counter."' /></td>");
			print("<td align='center'><input type='text' style='' class='plain_txt' readonly='readonly'  value=\"".$row->Employee."\" /></td>");
			print("<td align='center' ><input type='text' height='' style='margin-left:0px;' class='plain_txt'   value='$d2' /></td>");
			print("<td align='center'><input type='text' style='' class='plain_txt' readonly='readonly'  value=\"".$row->Days."\" /></td>");
			print("<td align='center'><input type='text' style='' class='plain_txt' readonly='readonly'  value='".$row->Updated_By."' /></td>");
			print("<td align='center'><input type='text' style='' class='plain_txt' readonly='readonly'  value='".$d4."' /></td>");
			print("<td align='center'><input type='button' style='color:red'   value='Remove' onclick='remove_lop(\"".$lop_id."\")'/></td>");
			print("<td align='center'><input type='text' style='' class='plain_txt' readonly='readonly'  value='".$row->Remarks."' /></td>");

			print("</tr>");
		}
	}

	else{
		print("<tr><td align='center' colspan='10' style='color:white;font-size:13pt;font-weight:bolder'> Nothing to Display</td></tr>");

	}

	echo "<input type='hidden' id='hrowcount' value='$counter' />";
	?>

</table>
