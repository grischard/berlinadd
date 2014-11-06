<?php
//buffer output
ob_start();
$title = '';

//init model
include_once 'includes/model.php';
$model = new Model();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>%TITLE%</title>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="styles.css" />
		<link rel="stylesheet" href="leaflet-0.7.3/leaflet.css" />
		<script src="leaflet-0.7.3/leaflet.js"></script>
	</head>
	<body>
		<div class="container">
			<a href="/" class="no-line">
				<h1>BerlinAdd</h1>
			</a>
			<?php if($model->isUpdating()) { ?>
				<div class="updating">
					Daten werden gerade aktualisiert...
				</div>
			<?php } ?>