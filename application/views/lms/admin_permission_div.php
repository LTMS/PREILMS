			<?php
	if(!empty($Permission)){
		print('<div style="background: #DBEADC;"><table  border="1" align="center" cellpading="0" cellspacing="0" width="100%">');
		print('<tr><td align="center" colspan="10"  style="font-size:14px;font-weight:bold;color:Red">'.$title.'</td></tr>');
		print('<tr style="bgcolor:grey">');
		print('<td align="center" width="3%" style="font-size:14px;font-weight:bold;color:Red">S.No</td>');
		print('<td align="center" width="10%" style="font-size:14px;font-weight:bold;color:Red">Employee Name</td>');
		print('<td align="center" width="8%" style="font-size:14px;font-weight:bold;color:red">Permission	On</td>');
		print('<td align="center" width="7%" style="font-size:14px;font-weight:bold;color:red">Hours</td>');
		print('<td align="center" width="8%" style="font-size:14px;font-weight:bold;color:red">From Time</td>');
		print('<td align="center" width="8%" style="font-size:14px;font-weight:bold;color:red">Status</td>');
		print('<td align="center" width="8%" style="font-size:14px;font-weight:bold;color:red">Applied On</td>');
		print('<td align="center" width="30%" style="font-size:14px;font-weight:bold;color:red">Reason</td>');
		print('</tr>');

				$counter=0;
				foreach($Permission as $row) {
					$counter++;
					$rowid="row".$counter;
					$lop_id=$row->permission_id;
					$user=$row->user;
					$total_hrs=$row->totalhrs;
					$timefrom=$row->timefrom;
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
						print('<tr  style="border:1px solid black;background: #DBEADC;">');
							print("<td align='center' style='font-size:12px;color:black;'>$counter</td>");
							print("<td align='left' style='font-size:12px;color:black;'>$user</td>");
							print("<td align='center' style='font-size:12px;color:black;'>$d2</td>");
							print("<td align='center' style='font-size:12px;color:black;'>$total_hrs</td>");
							print("<td align='center' style='font-size:12px;color:black;'>$timefrom</td>");
							if($row->status=='Applied'){
								print("<td align='center' style='font-size:12px;color:black;color:blue'>$status</td>");
							}
							else if($row->status=='Approved'){
								print("<td align='center' style='font-size:12px;color:black;color:green;'>$status</td>");
								}
							else{
								print("<td align='center' style='font-size:12px;color:black;color:red;'>$status</td>");
								}
							print("<td align='center' style='font-size:12px;color:black;'>$d4</td>");
							print("<td align='left' style='font-size:12px;color:black;'>".$row->reason."</td>");
							print("</tr>");
			
		}

		print("</table></div>");

	}
		else{
		print("<div  style='margin:110px 0px 0px 20px'>");
		print("<font style='font-size:2em;color:#254117; font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; >Nothing to Display...!</font>");
		print("</div>");	}

			?>
	
