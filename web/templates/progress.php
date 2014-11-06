<?php
function showProgress($green, $yellow, $total) {
	$num_in = $green + $yellow;
	$percent = $num_in / $total * 100;
	$format = sprintf('%.1f', $percent);
	
	$greenPercent = round($green / $total * 100, 1);
	$yellowPercent = round($num_in / $total * 100, 1);
?>
	<div class="progress-container">
		<div class="progress bg-orange" style="width: <?php echo $yellowPercent; ?>%;"></div>
		<div class="progress bg-green" style="width: <?php echo $greenPercent; ?>%;"></div>
		<div class="progress-label">
			<?php echo $format; ?>%
		</div>
		<div class="progress-hint">
			<?php echo $num_in; ?> / <?php echo $total; ?> 
		</div>
	</div>
<?php
}