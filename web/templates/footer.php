		</div>
		<div class="container">
			<div style="font-size: 0.8em; text-align: center; line-height: 1.8em;">
				Aktualisiert: 
					<?php echo date('d.m.Y H:i', $model->lastUpdate()); ?><br>
				Quelle: <a href="http://fbinter.stadt-berlin.de/fb/berlin/service.jsp?id=a_hauskoordinaten@senstadt&type=FEED">Geoportal Berlin / Hauskoordinaten</a><br>
				Daten von <a href="http://www.openstreetmap.org/">OpenStreetMap</a> - Veröffentlicht unter <a href="http://opendatacommons.org/licenses/odbl/">ODbL</a><br>
				Berlin-Ausschnitt von <a href="http://download.geofabrik.de/europe/germany/berlin.html">Geofabrik</a><br>
				<a href="https://github.com/MorbZ/berlinadd">Sourcecode</a> auf Github<br>
				<a href="impressum.php">Impressum</a>
			</div>
		</div>
		<br><br>
	</body>
</html>

<?php
//show output
$buffer=ob_get_contents();
ob_end_clean();
if(strlen($title) != 0) {
	$title .= ' - ';
}
$title .= 'berlinadd';
$buffer=str_replace('%TITLE%', $title, $buffer);
echo $buffer;
?>