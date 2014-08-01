
<div style="height: 70px; background: #59955C;">
	<table>
		<tr>
			<td width="50" align='left'><img style="width: 100px; height: 50px"
				src="<?php echo base_url(); ?>/images/permission.png"></td>
			<td align='left'
				style="margin-bottom: 20px; font-size: 21pt; position: inline; color: white; font-weight: bolder">My
				Permission History</td>
			<td style="color: white; font-size: 15pt" align="right">Hi, <b><?php echo $this->session->userdata('fullname');?>
			</b> ..!</td>
			<td align="left" style="color: white; font-size: 15pt; width: 50px">
				<a href="<?php echo site_url("logincheck/logout"); ?>"><img
					style="width: 50px; height: 50px"
					src="<?php echo base_url(); ?>/images/logout2.png"> </a>
			</td>
		</tr>
	</table>
</div>



<div align="center" style="float: left; height: auto; background: #59955C; margin: 10px 0px 0px 20px; width: 95%; border: 2px solid black; border-radius: 5px;">

	<table border="1" width="100%" style="border-right: 1px solid white;"
		height="50">
		<tr style="background: #DBEADC;">
			<td align="center" colspan="5">YEAR : <select id="year"
				onchange='get_my_permission()' style="width: 80px; color: blue">
				<?php
				foreach($year as $row){
					$y=$row["years"];
					?>
					<option selected value="<?php echo $y;?>">
					<?php echo $y;?>
					</option>
					<?php
				}
				?>
			</select> &nbsp;&nbsp;&nbsp;&nbsp; 
			<img src="<?php echo base_url(); ?>/images/print2.png"		onclick="printJobReport();"
				style="width: 50px; height: 30px; color: green" />
			</td>
		</tr>
	</table>
	<hr>
	<div id="contentData" style="height: 640px; overflow: scroll;background: #DBEADC;">
		<?php
	if(!empty($Permission)){
		print('<div style="background: #DBEADC;"><table style="background: #DBEADC;" border="1" align="center" cellpading="0" cellspacing="0" width="100%">');
		print('<tr><td align="center" colspan="10"  style="font-size:14px;font-weight:bold;color:Red">'.$title.'</td></tr>');
		print('<tr style="bgcolor:grey">');
		print('<td align="center" width="3%" style="font-size:14px;font-weight:bold;color:Red">S.No</td>');
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
		print("<div style='margin:0px 0px 0px 420px'>");
		print("<font style='font-size:2em;color:#254117; font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; >Nothing to Display...!</font>");
		print("</div>");	}

			?>
	</div>
	
	
</div>



<script type="text/javascript" src="<?php echo base_url(); ?>js/custom/lms.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/custom/print.js"></script>
