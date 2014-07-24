
<div style="height: 70px; background: #59955C;">
	<table>
		<tr>
			<td width="50" align='left'><img style="width: 100px; height: 50px"
				src="<?php echo base_url(); ?>/images/lop.png"></td>
			<td align='left'
				style="margin-bottom: 20px; font-size: 21pt; position: inline; color: white; font-weight: bolder">Update
				Loss of Pay</td>
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



<div align="center"
	style="float: left; height: auto; background: #59955C; margin: 10px 0px 0px 20px; width: 95%; border: 2px solid black; border-radius: 5px;">

	<table border="1" width="100%" style="border-right: 1px solid white;"
		height="100">
		<tr align="center" bgcolor="DBEADC"
			style="font-weight: bolder; color: black">
			<td align="center">Date: <input type="text" id="date_from1"
				style="width: 80px; color: blue; font-weight: bold"
				onchange='show_days()' />&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; No of
				Days: <input type="text" id="days" style="width: 50px; color: blue"
				value='' /> &nbsp;&nbsp; &nbsp;&nbsp; <select id='emp'
				style="height: 20px; width: 150px; color: green; font-weight: bolder; font-size: 12px;">
					<option selected value="">Select Employee</option>
					<?php
					foreach($members as $memb ){
						$emp=$memb["Name"];
						echo '<option style="font-size:12px" value="'.$emp.'">'.$emp.'</option>';
					}
					?>

			</select> &nbsp;&nbsp; <input type="text" id="desc"
				placeholder='Reason / Remark' style="width: 250px; color: blue" />
				&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
				<button id='button'
					style="color: green; font-weight: bolder; width: 60px;"
					onclick="update_lop()">Update</button></td>
		</tr>


		<tr style="background: #DBEADC;">
			<td align="center" colspan="5">YEAR : <select id="year"
				onchange='get_lop_admin()' style="width: 80px; color: blue">
				<?php
				foreach($year as $row){
					$y=$row["year"];
					?>
					<option selected value="<?php echo $y;?>">
					<?php echo $y;?>
					</option>
					<?php
				}
				?>
			</select> &nbsp;&nbsp; <select id='emp1'
				style="height: 20px; width: 150px; color: blue; font-weight: bolder; font-size: 12px;"
				onchange='get_lop_admin()'>
					<option selected value="">Select Employee</option>
					<?php
					foreach($members as $memb ){
						$emp=$memb["Name"];
						echo '<option style="font-size:12px" value="'.$emp.'">'.$emp.'</option>';
					}
					?>

			</select> &nbsp;&nbsp;</td>
		</tr>
	</table>
	<hr>
	<div id="contentData">
		<table>
			<tr bgcolor="#518C9C" style="border-right: 1px solid white;">
				<td align="center" width="4%" style="border-right: 1px solid white;"><font
					color="white">S.No</font></td>
				<td align="center" width="18%"
					style="border-right: 1px solid white;"><font color="white">Employee
						Name</font></td>
				<td align="center" width="10%"
					style="border-right: 1px solid white;"><font color="white">Date</font>
				</td>
				<td align="center" width="5%" style="border-right: 1px solid white;"><font
					color="white">No of Days</font></td>
				<td align="center" width="12%"
					style="border-right: 1px solid white;"><font color="white">Added By</font>
				</td>
				<td align="center" width="10%"
					style="border-right: 1px solid white;"><font color="white">Added On</font>
				</td>
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
					print("<td align='center'><input type='button' style='color:red'   value='Remove' onclick='remove_lop_reload(\"".$lop_id."\")'/></td>");
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

	</div>
</div>





<script
	type="text/javascript" src="<?php echo base_url(); ?>js/custom/lms.js"></script>
