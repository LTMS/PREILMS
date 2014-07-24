<?php

class AllEmp_unupdated_dwnld{

	public function Export($data,$month){

		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=All Employees unupdated time sheet  report for the month ".$month.".xls");
		print("<div style='width:100%;border:0px solid black ;border-radius:0px;float:center;'>");

		print("<table style='left:30px;'>");
		print("<tr>");
		print("<td width='100%' valign='top'>");
		print("<table >	");
		print("<tr bgcolor='#B6B6B4' style='border:0px solid black;font-size:12pt;font-weight:bolder;'>");
		print("<td align='center'  width='4%' style='border:1px solid black;'><font color='white'>S.No</font></td>");
		print("<td align='center'  width='18%' style='border:1px solid black;'><font color='white'>Employee Name</font></td>");
		print("<td align='center'  width='10%' style='border:1px solid black;'><font color='white'>Month</font></td>");
		print("<td align='center'  width='58%' style='border:1px solid black;'><font color='white'>Unupdated date</font></td>");
		print("<td align='center'  width='10%' style='border:1px solid black;'><font color='white'>Total Days</font></td>");
		print("</tr>");

			

			
		$counter=0;
		if(!empty($data)){
				
			foreach($data as $openrow) {

				$name = $openrow["Name"];
				$CI =& get_instance();
				$CI ->load->model('ts_model');
					
				$Details=$CI->ts_model->fetch_individual_details($name,$month);
				$date="";
				$days=0;
				if(!empty($Details)){
						
					foreach($Details as $row) {
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
				}
				if($date != "")
				{

					$counter++;
					print("<tr style='border:1px solid black;font-size:12pt;color:#003333'>");
					print("<td width='4%' align='center' style=''>".$counter."</td>");
					print("<td width='4%' align='center' style='border:1px solid black;font-weight:bolder;'>".$name."</td>");
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
		}
		else{
				
			print("<tr  style='color:red;font-size:18px'>");
			print("<td colspan='10' align='center'>Nothing to display..!</td></tr>");

		}


		print("</table>");

		print("<div valign='top'  id='show_Div'  style='background-color:grey;border:1px solid black' >");

		print("</div>");



		 
	 print("</div>");


	}
}

?>