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
		<link rel="shortcut icon" href="favicon.ico?1" type="image/x-icon" />
		<link rel="stylesheet" href="thirdparty/leaflet-0.7.3/leaflet.css" />
		<link rel="stylesheet" href="thirdparty/jquery-ui-1.11.2/jquery-ui.min.css" />
		<link rel="stylesheet" href="styles.css" />
		<script src="thirdparty/leaflet-0.7.3/leaflet.js"></script>
		<script src="thirdparty/jquery-1.11.1.min.js"></script>
		<script src="thirdparty/jquery-ui-1.11.2/jquery-ui.min.js"></script>
		<script src="script.js"></script>
	</head>
	<body>
		<div class="container">
			<a href="/" class="no-line">
				<h1>BerlinAdd</h1> 
			</a>
			
			<div class="search">
				<input class="search" type="search" id="search" placeholder="Adresse suchen..." />
			</div>
			
			<?php if($model->isUpdating()) { ?>
				<div class="updating">
					Daten werden gerade aktualisiert...
				</div>
			<?php } ?>
		</div>
		<div class="container">