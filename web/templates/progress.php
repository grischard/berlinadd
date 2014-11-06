<?php
function showProgress($green, $yellow, $total) {
	$num_in = $green + $yellow;
	$percent = $num_in / $total * 100;
	$format = sprintf('%.1f', $percent);
	
	$greenPercent = $green / $total * 100;
	$yellowPercent = $num_in / $total * 100;
?>
	<div style="width: 100%; height: 22px; position: relative; border-radius: 5px; overflow: hidden; background-color: #CCC;">
		<div style="position: absolute; background-color: orange; width: <?php echo $yellowPercent; ?>%; height: 100%;"></div>
		<div style="position: absolute; background-color: green; width: <?php echo $greenPercent; ?>%; height: 100%;"></div>
		<div style="position: absolute; width: 100%; text-align: center; top: 1px; font-size: 0.9em;">
			<?php echo $format; ?>%
		</div>
		<div style="position: absolute; text-align: right; bottom: 2px; right: 2px; font-size: 0.5em;">
			<?php echo $num_in; ?> / <?php echo $total; ?> 
		</div>
	</div>
<?php
}