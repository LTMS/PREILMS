<div style="height: 70px; background: #8AC5D3;">
	<p style="margin-left: 80%; padding-top: 5px; line-height: 0.5em;">
		User: <b><?php echo $this->session->userdata('fullname');?>
		</b>&nbsp;&nbsp;<img src="../../images/rightarrow1.png" width="10px"
			height="10px;" />&nbsp;&nbsp;&nbsp;<strong> <a
			href="<?php echo site_url("logincheck/logout"); ?>"
			style="color: black;" onmouseover="this.style.color='blue'"
			onmouseout="this.style.color='black'">Logout</a>
		</strong>
	</p>
	<center style="margin-bottom: 20px; font-size: 20pt; position: inline;">Technicians
		Details</center>
</div>
<div
	style="height: auto; overflow: hidden; background: #C0F7FE; margin: 20px 0px 0px 10px; width: 100%; border: 0px solid black; border-radius: 0px;">
	<div style="margin-left: 20px; margin-top: 20px; display: ">
		<table width="100%" align="center"
			style="border-right: 1px solid white;">
			<tr>
				<td id="Row_Head"
					style="font-size: 14px; font-weight: bolder; color: red">Add a New
					Technician</td>
			</tr>
			<tr>
				<td><input name="name1" id="name1" class="input" type="text"
					placeholder="Name" value=""></td>
				<td><input name="dept1" id="dept1" class="input" type="text"
					placeholder="Department" value=""></td>
				<td><input name="desig1" id="desig1" class="input" type="text"
					placeholder="Designation" value=""></td>
				<td><input name="phone1" id="phone1" class="input" type="text"
					placeholder="Phone Number" value=""></td>
				<td><input name="mail1" id="mail1" class="input" type="text"
					placeholder="E-Mail ID" value=""></td>
				<td><input name="doj_date" id="doj_date" class="input" type="text"
					placeholder="Date of Joining" value=""></td>
				<td><input name="butt" id="butt" class="input" type="button"
					onclick="javascript:update_tech('ADD')" value="Add Technician" /></td>

			</tr>
		</table>

	</div>
	<hr width="100%">


	<div
		style="margin-left: 30px; margin-bottom: 10px; margin-right: 20px; margin-top: 10px;">
		<table border="0" width="100%" style="border-right: 1px solid white;">
			<tr bgcolor="#518C9C" style="border-right: 1px solid white;">
				<td align="center" width="4%" style="border-right: 1px solid white;"><font
					color="white">S.No</font></td>
				<td align="center" style="border-right: 1px solid white;"><font
					color="white">Name</font></td>
				<td align="center" style="border-right: 1px solid white;"><font
					color="white">Department</font></td>
				<td align="center" style="border-right: 1px solid white;"><font
					color="white">Designation</font></td>
				<td align="center" style="border-right: 1px solid white;"><font
					color="white">Phone Number</font></td>
				<td align="center" width="20%"
					style="border-right: 1px solid white;"><font color="white">E-Mail</font>
				</td>
				<td align="center" style="border-right: 1px solid white;"><font
					color="white">Joining Date</font></td>
				<td align="center" style="border-right: 1px solid white;"><font
					color="white">Modify</font></td>
				<td align="center" style="border-right: 1px solid white;"><font
					color="white">Remove</font></td>
			</tr>
			<tr>

			<?php
			$counter=0;
			foreach($tech as $row) {
				$counter++;
				$rowid="row".$counter;
				print("<tr id='$rowid' class='td_rows' style='border-right:1px solid white;'>");
				print("<td align='center'><input type='text' style='' class='plain_txt' readonly='readonly' id='$counter' value='".$counter."' /></td>");
				$name_id="name".$counter;
				print("<td align='center'><input type='text' style='' class='plain_txt' readonly='readonly' id='$name_id' value='".$row->name."' /></td>");
				$dept_id="dept".$counter;
				print("<td align='center'><input type='text' style='' class='plain_txt' readonly='readonly' id='$dept_id' value='".$row->dept."' /></td>");
				$desig_id="phone".$counter;
				print("<td align='center'><input type='text' style='' class='plain_txt' readonly='readonly' id='$desig_id' value='".$row->desig."' /></td>");
				$phone_id="added_date".$counter;
				print("<td align='center'><input type='text'  style='' class='plain_txt' readonly='readonly' id='$phone_id' value='".$row->phone."' /></td>");
				$mail_id="mail".$counter;
				print("<td align='center'><input type='text'  style='' class='plain_txt' readonly='readonly' id='$mail_id' value='".$row->mail."' /></td>");
				$doj_id="doj".$counter;
				print("<td align='center'><input type='text'  style='' class='plain_txt' readonly='readonly' id='$doj_id' value='".$row->doj."' /></td>");
				$edit_id="edit".$counter;
				print("<td align='center'><a style='' href='javascript:edit_tech(\"".$row->name."\",\"".$row->dept."\",\"".$row->desig."\",\"".$row->phone."\",\"".$row->mail."\",\"".$row->doj."\",\"".$row->tech_id."\",\"".$row->team_id."\");' id='$edit_id'><font color=''>Edit </font></a></td>");
	   $delete_id="delete".$counter;
	   print("<td align='center'><a style='' href='javascript:delete_tech(\"".$row->tech_id."\",\"".$row->team_id."\",\"".$row->name."\");' id='$delete_id'><font color=''>Remove</font></a></td>");
	   print("</tr>");

			}
			//print("</table>");


			echo "<input type='hidden' id='hrowcount' value='$counter' />";
?>
		
		</table>
	</div>
</div>
<script
	type="text/javascript" src="<?php echo base_url(); ?>js/custom/lms.js"></script>
