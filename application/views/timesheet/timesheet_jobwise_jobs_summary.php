		<?php
		print("<div>");
				
		if($All_Jobs_Summary){
		
		
		print("<table width='100%' border='1' align='center' cellpadding='1' cellspacing='1'   style='border-collapse:collapse;'>");

				print("<tr style='color:red;font-size:16px;font-weight:bolder; '>
								<td colspan='13' align='center'>$title</td></tr>");
		
				
				print("<tr bgcolor='#518C9C' id='hdr_row' style='font-size:14px;font-weight:bold;background-color:white;color:black;border-right:1px solid  black; '>");
					print("<td  width='3%' align='center'>S.No</td>");
					print("<td width='10%' align='left'>Job No</td>");
					print("<td width='30%' align='left'>Job Description</td>");
					print("<td  align='center'>Total Worked Hours</td>");
					print("<td  align='center'>No of Days</td>");
				print("</tr>");
				
				$counter1=0;
				$title_name="";
				foreach($All_Jobs_Summary as $openrow) {
					$counter1++;
				
						print("<tr   class='small'>");
						print("<td  width='3%' align='center'> ".$counter1."</td>");
						print("<td  width='10%' align='left'>".$openrow["job_no"]."</td>");
						print("<td  width='30%' align='left'>".$openrow["job_desc"]."</td>");
						print("<td  width='7%' align='left'>".$openrow["total"]." Hours</td>");
						print("<td  width='8%' align='left'>".$openrow["days"]." Days</td>");
					print("</tr>");
				}
				
		print("</table><br>");
	}
		
	
		print("</div>");
				
		if(empty($All_Jobs_Summary))	{
			print("<div style='margin:50px 0px 0px 420px'>");
			print("<font style='font-size:2em;color:#254117; font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; >Nothing to Display...!</font>");
			print("</div>");
		}

		
		
		?>
		
		<script	type="text/javascript" src="<?php echo base_url(); ?>js/custom/print.js"></script>
