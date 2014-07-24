<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel="shortcut icon" style='width:30'
	href="../../images/project-icon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<?php $this->load->view("template/includes/scripts"); ?>
<?php $this->load->view("template/includes/styles"); ?>
<title><?php echo $titleText?></title>
</head>
<body>

	<div id="sidebar" style="background: #59955C">
		<div id="sidebar-wrapper">
			<div id="profile-links">
				<table>
					<tr>
						<td width='170' height='70'></td>
						<td><a href='http://WWW.PREIPOLAR.COM' target="_blank"> <img
								id='logo_image'
								src="<?php echo base_url(); ?>/images/preipolar.png"
								width="170px" height="70px;" /> </a>
						</td>
					</tr>
				</table>
			</div>

			<ul id="display"
				style="width: auto; background: none; margin-bottom: 30px; margin-top: 0px;">
				<!--  <div class="clock " style="width:150px; margin:0 auto; padding:10px; border:0px solid #333; color:Black;font-weight:bold;font-size:12pt;" >  -->
				<li id="Date"
					style="margin-left: 20px; display: block; width: 160px; font-size: 1.5em; color: #FFFFFF; font-family: 'BebasNeueRegular', Arial, Helvetica, sans-serif;"></li>
				<li id="hours"
					style="margin-left: 30px; display: inline-block; float: left; font-size: 1.7em; color: #FFFFFF; font-family: 'BebasNeueRegular', Arial, Helvetica, sans-serif;"></li>
				<li id="point"
					style="float: left; display: inline-block; font-size: 1.7em; color: #FFFFFF; -moz-animation: mymove 2s ease infinite; -webkit-animation: mymove 1s ease infinite; padding-right: 5px; padding-left: 5px;">:</li>
				<li id="min"
					style="display: inline-block; float: left; color: #FFFFFF; font-size: 1.7em; text-align: center; font-family: 'BebasNeueRegular', Arial, Helvetica, sans-serif;"></li>
				<li id="point"
					style="float: left; display: inline-block; font-size: 1.7em; color: #FFFFFF; -moz-animation: mymove 2s ease infinite; -webkit-animation: mymove 1s ease infinite; padding-right: 5px; padding-left: 5px;">:</li>
				<li id="sec"
					style="display: inline-block; float: left; color: #FFFFFF; font-size: 1.7em; text-align: center; font-family: 'BebasNeueRegular', Arial, Helvetica, sans-serif;"></li>
			</ul>
			<?php if($this->session->userdata('admin_logged_in')){?>
			<ul id="main-nav">
			<?php echo $sideLinks?>
			</ul>
			<?php }?>
		</div>

	</div>

	<div id="main-content">
	<?php echo $bodyContent?>
		<div>
			<table>
				<tr align='right' height='40' valign='bottom'>
					<td style='color: grey'><a href='http://WWW.DEASTECH.COM'
						target="_blank"> Developed by &nbsp;<u> <font color='black'>D</font>
							<font color='green'> E A S </font> <font color='black'>Technology
							Solutions Pvt. Ltd.</font></u> </a>
					</td>
				</tr>
			</table>
		</div>
		<!-- /footer -->
		<script type="text/javascript"
			src="<?php echo base_url(); ?>js/custom/style.js"></script>
	</div>
</body>
</html>
