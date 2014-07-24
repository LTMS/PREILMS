<?php

class singleMon_Emp_unupdated_dwnld{

	public function Export($data,$params){
		$form_data=explode("::", $params);
		$emp=str_replace("%20"," ",$form_data[2]);
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=".$emp."_ unupdated time sheet report for"." ".$form_data[1]." ".$form_data[0].".xls");
		print("<div style='width:100%;border:0px solid black ;border-radius:0px;float:center;'>");

		print("<table style='left:30px;' border='0'>");

			


		if(!empty($data)){

			print("<tr>");
			print("<td width='100%' valign='top'>");
			print("<table >	");
			print("<tr bgcolor='#B6B6B4' style='border:0px solid black;font-size:12pt;font-weight:bolder;'>");
			print("<td align='center' width='4%' style='border:1px solid black;'><font color='white'>S.No</font></td>");
			print("<td align='center'  width='18%' style='border:1px solid black;'><font color='white'>Employee Name</font></td>");
			print("<td align='center'  width='10%' style='border:1px solid black;'><font color='white'>Month</font></td>");
			print("<td align='center'  width='58%' style='border:1px solid black;'><font color='white'>Unupdated date</font></td>");
			print("<td align='center'  width='10%' style='border:1px solid black;'><font color='white'>Total Days</font></td>");
			print("</tr>");
				
				


				
			$date="";
			$days =0;
			foreach($data as  $row) {
				$days++;
				if($date == "")
				{
					$NU=explode("-", $row["Notupdated"]);
					$date = $NU[2];

				}else
				{
					$NU=explode("-", $row["Notupdated"]);
					$date = $date." , ".$NU[2];
				}
			}
			$counter=0;
			if($date != "")
			{
				$counter++;
				print("<tr style='border:1px solid black;font-size:12pt;color:#003333'>");
				print("<td width='4%' align='center' style=''>".$counter."</td>");
				print("<td width='4%' align='center' style='border:1px solid black;font-weight:bolder;'>".$row["user_email"]."</td>");
				print("<td width='4%' align='center' style='border:1px solid black;'>".$NU[0]."-".$NU[1]."</td>");
				print("<td width='4%' align='center' style=''>".$date."</td>");
				if($days > 3)
				{
					print("<td width='4%' align='center' style='border:1px solid black;color:red;font-weight:bolder;'>".$days."</td>");
				}else
				{
					print("<td width='4%' align='center' style='border:1px solid black;font-weight:bolder;'>".$days."</td>");
				}
				print("</tr>");
			}

		}
		else{

			print("<tr height='250px'></tr>");
			print("<tr  style='color:red;font-size:18px'>");
			print("<td colspan='10' align='center'> <font color='green' >$user</font> has updated time sheet for this month..");
			print("<img id='ack_button'  valign='bottom' src='../../images/updated_icon1.gif'   style='width:120px;height:35px;color:green'/></td></tr>");
		}

			






		print("</table>");



		 
	 print("</div>");


	}
}

?>