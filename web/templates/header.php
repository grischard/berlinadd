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
		<link rel="stylesheet" href="all.min.css" />
		<script>var pagedidload = function(){}</script>
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