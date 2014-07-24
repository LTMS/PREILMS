
<div style="height: 70px; background: #59955C;">
	<table>
		<tr>
			<td width="50" align='left'><img style="width: 100px; height: 60px"
				src="<?php echo base_url(); ?>/images/user_add.png"></td>
			<td align='left'
				style="margin-bottom: 20px; font-size: 21pt; position: inline; color: white; font-weight: bolder">Add
				New User</td>
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

<form name="userform" id="userform" method="post"
	action="<?php echo site_url("logincheck/create"); ?>">
	<div
		style="height: auto; background: #DBEADC; margin: 20px 0px 0px 200px; width: 60%; border: 1px solid black; border-radius: 10px;">


		<p style="height: 40px; padding: 20px 0px 0px 20px;" align="center">
			<span style="font-weight: bolder; font-size: 18pt;">New User Entry </span>
		</p>

		<hr width="100%">
		<div align="center" style="margin: 0px 0px 0px 0px;">
			<table style="width: 80%" border="0">
				<tr>
					<td id="error" align="center" colspan="2"
						style="color: red; width: 250px; font-size: 15px; font-weight: bolder;">
					</td>
				</tr>
				<tr>
					<td><font class="font_align">Name</font><font color='red'> *</font>
					</td>
					<td><input name="u_name" id="u_name" class="input" type="text"
						style="width: 160px; height: 18px;" value=""
						onblur="javascript:check_name()"></td>
					<td><img id='incorrectname' height=16px width=15px
						style='display: none'
						src='<?php echo  base_url();?>images/delete.png' /> <img
						id='correctname' height=16px width=15px style='display: none'
						src='<?php echo  base_url();?>images/accept.png' /></td>
				</tr>
				<tr style="height: 0%;">
					<td width="40%"><font class="font_align">Username</font><font
						color='red'> *</font></td>
					<td><input name="username" id="username" class="input" type="text"
						style="width: 160px; height: 18px;" value=""
						onblur="javascript:check_name()"></td>

					<td><img id='incorrect' height=16px width=15px
						style='display: none'
						src='<?php echo  base_url();?>images/delete.png' /> <img
						id='correct' height=16px width=15px style='display: none'
						src='<?php echo  base_url();?>images/accept.png' /></td>
				</tr>
				<tr>
					<td><font class="font_align">Password</font><font color='red'> *</font>
					</td>
					<td><input name="passwd" id="passwd" class="input" type="password"
						style="width: 155px; height: 18px;" value=""
						onkeyup="check_passwd()"></td>
				</tr>
				<tr>
					<td><font class="font_align">Confirm Password</font><font
						color='red'> *</font></td>
					<td><input name="cpasswd" id="cpasswd" class="input"
						type="password" style="width: 155px; height: 18px;" value=""
						onkeyup="check_passwd()"></td>
					<td id='passwd_match'></td>
				</tr>
				<tr>
					<td><font class="font_align">E-Mail ID</font><font color='red'> *</font>
					</td>
					<td><input name="email" id="email" class="input" type="text"
						style="width: 180px; height: 18px;" value=""></td>
				</tr>
				<tr>
					<td><font class="font_align">Time Office ID</font><font color='red'>
							*</font></td>
					<td><input name="to_id" id="to_id" class="input" type="text"
						style="width: 50px; height: 18px;" value=""></td>
				</tr>

				<tr>
					<td><font class="font_align">User Role</font><font color='red'> *</font>
					</td>
					<td><select name="userrole" id="userrole"
						style="width: 130px; height: 24px;">
							<option value="user">User</option>
							<option value="teamleader">Team Leader</option>
							<option value="admin">Admin</option>
							<?php if($this->session->userdata('userrole')=='MD'){
								print('<option value="MD">MD</option>');
							};?>

					</select>
					</td>
				</tr>
				<tr>
					<td><font class="font_align">Department</font><font color='red'> *</font>
					</td>
					<td><select name="dept" id="dept"
						style="width: 130px; height: 24px;"
						onchange="javascript:get_team_leader(this.value)">
							<option value="">Select</option>
							<?php
							foreach($deptlist as $dept ){
								$desc=$dept["department"];
								echo '<option value="'.$desc.'">'.$desc.'</option>';
							}
							?>
					</select>
					</td>
				</tr>

				<tr>
					<td><font class="font_align">App Designation</font><font
						color='red'> *</font></td>
					<td><select name="desig" id="desig"
						style="width: 130px; height: 24px;">
							<option selected value="Trainee">Trainee</option>
							<option value="TeamLeader">Team Leader</option>
							<option value="Admin">Admin</option>
					</select>
					</td>
				</tr>

				<tr id="row_l1" style="">
					<td><font class="font_align">Level-1 Approval</font><font
						color='red'> *</font></td>
					<td><select name="L1" id="L1" style="width: 134px; height: 24px;">
							<option selected value="Managing Director">Managing Director</option>
					</select>
					</td>
				</tr>

				<tr>
					<td><font class="font_align">Level-2 Approval</font><font
						color='red'> *</font></td>
					<td><select name="L2" id="L2" style="width: 134px; height: 24px;">
							<option selected value="Managing Director">Managing Director</option>
					</select>
					</td>
				</tr>
				<tr height='40'>
					<td><font class="font_align">Joining Date</font><font color='red'>
							*</font></td>
					<td><input name="doj" id="doj" class="input" type="text"
						style="width: 150px; height: 18px;" value=""></td>
				</tr>
				<tr height="10">
					<td></td>
				</tr>
				<tr style='font-size: 15px; color: red; font-weight: bold'>
					<td id='buttonrow' colspan="2" align="center"><img
						style="width: 100px; height: 35px; color: green; font-weight: bold; font-size: 12pt; border: 1px solid; border-radius: 5px;"
						src="<?php echo base_url(); ?>/images/adduser.png" id="button"
						type="image" onclick="javascript:user_form()">
					</td>
				</tr>

			</table>
		</div>
	</div>
</form>
<script
	type="text/javascript"
	src="<?php echo base_url(); ?>js/custom/users.js"></script>
