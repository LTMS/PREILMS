
<div style="height: 150px; background: #59955C">
	<p
		style="text-align: center; padding-top: 30px; font-size: 22pt; font-weight: bolder;">
		<img src="<?php echo base_url(); ?>images/PreipolarSwing3.gif"
			width="800px" height="80px;" />
	</p>
</div>
<div align='center' id="login-form"
	style="height: 210px; width: 350px; border: 3px solid grey; border-radius: 20px; margin-top: 50px; margin-left: 360px;">
	<p
		style="color: green; text-align: center; font-size: 18pt; font-weight: bolder;">Login
		Form</p>
		<? echo form_open("logincheck/login"); ?>

	<table align='center' id="login_form"
		style="font-weight: bolder; font-size: 12pt; color: green">
		<tr>
			<td align='center'>Username:</td>
			<td><input type="text" name="email" id="email"
				style="width: 150px; padding: 0 0 0 5px; color: #21610B; font-weight: bolder; font-size: 10pt;" />
			</td>
		</tr>
		<tr>
			<td align='center'>Password:</td>
			<td><input type="password" name="pwd" id="pwd"
				style='width: 150px; color: #21610B' /></td>
		</tr>
		<tr height="100">
			<td colspan="2" align="center"><input type="image"
				style="width: 180px; height: 60px" name="submit" id="submit"
				src="<?php echo base_url(); ?>/images/login2.png" />
			</td>
		</tr>
		<tr style="">
			<td colspan="2" align="center" style="color: red"><? if(isset($err)) { echo $err; } ?>
			</td>
		</tr>

	</table>
	<? echo "</form>" ?>
</div>

<table>
	<tr align='right' height='160' valign='bottom'>
		<td style='color: grey'></td>
	</tr>
</table>

