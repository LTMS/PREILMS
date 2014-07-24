
<div style="height: 70px; background: #59955C;">
	<table>
		<tr>
			<td width="50" align='left'><img style="width: 120px; height: 60px"
				src="<?php echo base_url(); ?>/images/lop.png"></td>
			<td align='left'
				style="margin-bottom: 20px; font-size: 21pt; position: inline; color: white; font-weight: bolder">My
				LOP History</td>
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
		height="50">
		<tr style="background: #DBEADC;">
			<td align="center" colspan="5">YEAR : <select id="year"
				onchange='get_lop_emp()' style="width: 80px; color: blue">
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
					print("<td align='center'><input type='text' style='' class='plain_txt' readonly='readonly'  value='".$row->Remarks."' /></td>");

					print("</tr>");
				}
			}

			else{
				print("<tr><td align='center' colspan='10' style='color:white;font-size:13pt;font-weight:bolder'> Nothing to Display</td></tr>");

			}

			?>
		
		</table>

	</div>
</div>



<script
	type="text/javascript" src="<?php echo base_url(); ?>js/custom/lms.js"></script>
