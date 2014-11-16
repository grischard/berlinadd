<?php
function showStatus($status) {
	//get color
	$color = '';
	switch($status['in_osm']) {
		case 0:
			$color = 'red';
			break;
		case 1:
			$color = 'green';
			break;
		case 2:
			$color = 'lightgreen';
			break;
		case 3:
			$color = 'orange';
			break;
	}
?>
	<div class="status bg-<?php echo $color; ?>">
	<?php if(isset($status['warning'])) { ?>
		<?php echo $status['warning']; ?>
	<?php } ?>
	</div>
<?php
}