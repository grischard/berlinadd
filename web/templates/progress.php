<?php
function showProgress($total, $status) {
	//count total in
	$total_in = array();
	$num = 0;
	for($i = 1; $i <= STATUS_NUM; $i++) {
		if(isset($status[$i])) {
			$num += $status[$i];
		}
		$total_in[$i] = $num;
	}
	
	//make colors
	$percent3 = round($total_in[3] / $total * 100, 2);
	$percent2 = round($total_in[2] / $total * 100, 2);
	$percent1 = round($total_in[1] / $total * 100, 2);
	
	//make percents
	$percent = $total_in[2] / $total * 100;
	$format = sprintf('%.1f', $percent);
?>
	<div class="progress-container bg-gray">
		<div class="progress bg-orange" style="width: <?php echo $percent3; ?>%;"></div>
		<div class="progress bg-lightgreen" style="width: <?php echo $percent2; ?>%;"></div>
		<div class="progress bg-green" style="width: <?php echo $percent1; ?>%;"></div>
		<div class="progress-label">
			<?php echo $format; ?>%
		</div>
		<div class="progress-hint">
			<?php echo $total_in[2]; ?> / <?php echo $total; ?> 
		</div>
	</div>
<?php
}