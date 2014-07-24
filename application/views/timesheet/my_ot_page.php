
<div
	style="background: white; width: 49%; border: 0px solid black; border-radius: 0px; float: left;">
	<table cellpadding="0" cellspacing="0" style="color: red" border="1"
		align="center">

		<tr>
			<td colspan="4" align="center" width="49%"
				style="font-size: 18px; font-weight: bolder; color: black">Normal
				Over Time Hours</td>
		</tr>
		<tr>
			<td align="center"
				style="font-size: 13px; font-weight: bolder; color: black">S.No</td>
			<td align="center"
				style="font-size: 13px; font-weight: bolder; color: black">Date</td>
			<td align="center"
				style="font-size: 13px; font-weight: bolder; color: black">OT Hours</td>
		</tr>


		<?php				$row=0;
		foreach($ot as $openrow) {
			$row++;
			$d = $openrow["ts_date"];
			$d1=$d.',  '.date('D', strtotime($d));
			$ot1 = $openrow["ts_ot"];

			?>
		<tr>
			<td
				style='font-size: 9pt; width: 50px; color: green; font-weight: bold'
				align='center'' ><?php echo $row ?>
			</td>
			<td
				style='font-size: 9pt; width: 50px; color: green; font-weight: bold'
				align='center'' ><?php echo $d1 ?>
			</td>
			<td align='center'
				style='font-size: 9pt; color: green; font-weight: bold''><?php echo $ot1 ?>
			</td>
		</tr>
		<tr>
		<?php 		}

		foreach($ot_tot as $openrow2) {
			$ot2 = $openrow2["total"];
			if($ot2==''){
				$ot2='00:00:00';
			}
			?>
			<td colspan="2"
				style='font-size: 12pt; width: 50px; color: green; font-weight: bold; font-weight: bold'
				' align='center'>Total</td>
			<td align='center'
				style='font-size: 12pt; color: green; font-weight: bold''><?php echo $ot2 ?>
			</td>
		</tr>
		<?php 		}				?>

	</table>
</div>

<div
	style="background: white; width: 49%; border: 0px solid black; border-radius: 0px; float: right;">
	<table cellpadding="0" cellspacing="0" border="1">
		<tr>
			<td colspan="4" align="center" width="50%"
				style="font-size: 18px; font-weight: bolder; color: black">Holidays
				Over Time Hours</td>
		</tr>
		<tr>
			<td align="center"
				style="font-size: 13px; font-weight: bolder; color: black">S.No</td>
			<td align="center"
				style="font-size: 13px; font-weight: bolder; color: black">Date</td>
			<td align="center"
				style="font-size: 13px; font-weight: bolder; color: black">OT Hours</td>
		</tr>

		<?php				$row3=0;
		foreach($holi as $openrow3) {
			$row3++;
			$d11 = $openrow3["ts_date"];
			$d3=$d11.',  '.date('D', strtotime($d11));
			$ot3 = $openrow3["ts_duty"];

			?>
		<tr>
			<td
				style='font-size: 9pt; width: 50px; color: green; font-weight: bold'
				' align='center'><?php echo $row3 ?>
			</td>
			<td
				style='font-size: 9pt; width: 50px; color: green; font-weight: bold'
				' align='center'><?php echo $d3 ?>
			</td>
			<td align='center'
				style='font-size: 9pt; color: green; font-weight: bold''><?php echo $ot3 ?>
			</td>
		</tr>
		<tr>
		<?php 		}

		foreach($holi_tot as $openrow4) {
			$ot4 = $openrow4["total"];
			if($ot4==''){
				$ot4='00:00:00';
			}
			$total_ot=sum_the_time($ot2, $ot4);
			$net_ot=$total_ot;


			?>
			<td colspan="2"
				style='font-size: 12pt; width: 50px; color: green; font-weight: bold'
				' align='center'>Total</td>
			<td align='center'
				style='font-size: 12pt; color: green; font-weight: bold''><?php echo $ot4 ?>
			</td>
		</tr>
		<?php 		}

		?>


	</table>
	<?php
	if($ot4!='00:00:00'){
		$total_ot_txt=$ot2.' + '.$ot4.' = '.$total_ot;

	}
	else{
		$total_ot_txt=$total_ot;
	}




	foreach($Comp_Off as $row){
		$CO_Hrs=$row["Comp_Off_hours"];
		$CO_Count=$row["CO_Count"];
	}
	if($CO_Count!=0){
		$net_ot=$total_ot-$CO_Hrs;
	}




	function sum_the_time($time1, $time2){
		$times = array($time1, $time2);
		$seconds = 0;
		foreach ($times as $time)
		{
			list($hour,$minute,$second) = explode(':', $time);
			$seconds += $hour*3600;
			$seconds += $minute*60;
			$seconds += $second;
		}
		$hours = floor($seconds/3600);
		$seconds -= $hours*3600;
		$minutes  = floor($seconds/60);
		$seconds -= $minutes*60;
		// return "{$hours}:{$minutes}:{$seconds}";
		$tot1= sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
			
		$CI =& get_instance();
		$CI ->load->model('otsummary_model');
		$result = $CI->otsummary_model->round_CompOff($tot1);
		foreach ($result as $row1){
			$total = $row1["rounded_comp"];
		}
		return $total;
	}
	?>
	<table>
		<tr height='40px'>
			<td></td>
		</tr>
		<tr height='40px'>
			<td align="right" style="font-size: 18px; color: #003366">Total OT
				Hours</td>
			<td align="center"
				style="font-size: 16px; font-weight: bolder; color: black;">:</td>
			<td align="left"
				style="font-size: 18px; font-weight: bolder; color: #003366"><?php echo $total_ot_txt;?>
				Hrs</td>
		</tr>
		<?php
		if($CO_Count!=0){
			?>
		<tr height='40px'>
			<td align="right" style="font-size: 18px; color: #003366">Comp-Off
				Reduction</td>
			<td align="center"
				style="font-size: 16px; font-weight: bolder; color: black;">:</td>
			<td align="left"
				style="font-size: 18px; font-weight: bolder; color: #003366"><?php echo $CO_Hrs;  ?>
				Hrs &nbsp;(<?php echo $CO_Count;  ?>)</td>
		</tr>
		<?php
		}
		?>
		<tr height='50px'>
			<td align="right" width='100%' colspan='5'
				style="font-size: 18px; font-weight: bold; color: #003366">-- -- --
				-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
				-- -- --</td>
		</tr>
		<tr>
			<td align="right" colspan='2' style="font-size: 18px; color: #003366"></td>
			<td align="right"
				style="font-size: 20px; font-weight: bold; color: #003366">Net Over
				Time Hours</td>
			<td align="center"
				style="font-size: 16px; font-weight: bolder; color: black; width: 22px">:</td>
			<td align="left"
				style="font-size: 20px; font-weight: bolder; color: #003366"><?php echo $net_ot;  ?>
				Hrs</td>
		</tr>
		<tr height='20px'>
			<td></td>
		</tr>

	</table>
</div>

