<?php
//init model
include_once 'includes/model.php';
$model = new Model();

//perform search
if(isset($_GET['term'])) {
	echo json_encode($model->searchFor($_GET['term']));
}