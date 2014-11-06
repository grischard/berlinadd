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
		<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" />
		<style type="text/css">
		* {
			font-family: verdana, arial;
		}
		body {
			background-color: #AAA;
			margin: 0;
		}
		div.container {
			margin: 5px auto;
			width: 550px; 
			background-color: #EEE; 
			padding: 15px 70px;
			box-shadow: inset 0 0 10px #CCC;
		}
		h1,h2 {
			text-align: center;
			text-transform: uppercase;
		}
		h1 {
			font-size: 1.4em;
			margin: 0;
			color: #AAA;
		}
		h2 {
			font-size: 1em;
			margin: 5px;
			color: #444;
		}
		a {
			color: #000;
			text-decoration: underline;
		}
		hr {
			margin: 20px 10px;
		}
		table {
			width: 100%;
		}
		</style>
		<script src="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js"></script>
	</head>
	<body>
		<div class="container">
			<a href="/" style="text-decoration: none;">
				<h1 style="color: #AAA;">BerlinAdd</h1>
			</a>
			<?php if($model->isUpdating()) { ?>
				<div style="color: red; text-align: center; font-size: 0.8em;">
					Daten werden gerade aktualisiert...
				</div>
			<?php } ?>