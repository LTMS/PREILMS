<?php
		print("<div style='background-color:white'>");
		
		print("<table  width='100%'border='1' align='left' cellpadding='1' cellspacing='1'  style='border-collapse:collapse;'>");
		print("<tr bgcolor='#518C9C' id='hdr_row' style='font-size:16px;font-weight:bold;background-color:white;color:black;border-right:1px solid  black; '>");
		print("<td width='5%' align='center'>S.No</td>");
		print("<td width='15%' align='center'>Employee Name</td>");
		print("<td width='40%' align='center'>Job Number - Description</td>");
		print("<td width='15%' align='center'>Total Hours</td>");
		//print("<td width='15%' align='center'>Avg Hours</td>");
		print("<td width='15%' align='center'>No of Days</td>");
		//     print("<td width='15%' align='center'>Employees</td>");
		print("</tr>");
		
		$counter=0;
		foreach($history as $openrow) {
			$counter++;
			$rowid="row".$counter;
			$days=$openrow["Days"];
			if($days==1){		$days=$days." Day";	}
			else{$days=$days." Days";}
					
			
			print("<tr id='$rowid'  class='small'>");
			print("<td width='5%' align='center'> ".$counter."</td>");
			print("<td width='5%' align='left'> ".$openrow["ts_name"]."</td>");
			print("<td width='15%' align='left'>".$openrow["num"]."-".$openrow["desc"]." </td>");
			print("<td width='15%' align='left'>".$openrow["total"]." Hours</td>");
			//print("<td width='15%' align='center'>".$openrow["AVG"]."</td>");
			print("<td width='15%' align='left'>".$days."</td>");
			//     print("<td width='15%' align='center'>".$openrow["men"]."</td>");
			print("</tr>");
		}
		
		if(!empty($history)){
			foreach($tothrs as $row) {
				$days = $row["days"];
				$tot = $row["total"];
				$avg = $row["avg"];
			}
			
			print("<tr style='color:white;font-size:16px;font-weight:bolder;border-color:white;background:grey '>");
			print("<td colspan='3'  align='right'> TOTAL </td>");
			print("<td colspan='3' align='left'>".$tot." </td>");
			//print("<td align='center'>".$avg."</td>");
			//print("<td  align='center'>".$days." Days</td>");
			print("</tr>");
		}
		
print("</table>");

print("<input type='hidden' id='TotalRows' value='$counter'>");
print("<input type='hidden' id='selected_leave_id' value=''>");

if(empty($history))
{
	print("<div style='margin:0px 0px 0px 420px'>");
	print("<font style='font-size:2em;color:#254117; font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; >Nothing to Display...!</font>");
	print("</div>");
}
	
print("</div>");
?>
<?php
if($counter!=0){
	?>


	<?php }?>
<script
	type="text/javascript" src="<?php echo base_url(); ?>js/custom/lms.js"></script>
