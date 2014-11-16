		</div>
		<div class="container">
			<div class="footer">
				<a href="javascript:void(0)" id="toggleKey" class="key no-line">Legende einblenden</a><br>
				<div class="key" id="key">
					<table>
						<tr>
							<td class="key-color bg-green">
							</td>
							<td class="key-text">
								Vollständige und korrekte Adressen<br>
								<span class="key-subtext">[addr:housenumber, addr:street, addr:postcode, addr:suburb, addr:city und addr:country sind korrekt gesetzt]</span>
							</td>
						</tr>
						<tr>
							<td class="key-color bg-lightgreen">
							</td>
							<td class="key-text">
								Unvollständige oder ungenaue Adressen<br>
								<span class="key-subtext">[addr:suburb, addr:city oder addr:country fehlen / Hausnummer ist interpoliert oder nur erwähnt]</span>
							</td>
						</tr>
						<tr>
							<td class="key-color bg-orange">
							</td>
							<td class="key-text">
								Fehlerhafte Adressen<br>
								<span class="key-subtext">[addr:suburb, addr:city oder addr:country sind vorhanden aber falsch / Straßenname ist falsch geschrieben]</span>
							</td>
						</tr>
						<tr>
							<td class="key-color bg-red">
								<div class="key-color-half bg-gray"></div>
							</td>
							<td class="key-text">
								Fehlende Adressen<br>
								<span class="key-subtext">[Es sind keine passenden addr:housenumber, addr:street und addr:postcode vorhanden]</span>
							</td>
						</tr>
					</table>
				</div>
				
				BerlinAdd - Adressbestand der offiziellen Geodaten in OpenStreetMap<br>
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
<script src="all.min.js?1"></script>

<?php
//show output
$buffer=ob_get_contents();
ob_end_clean();
if(strlen($title) != 0) {
	$title .= ' - ';
}
$title .= 'BerlinAdd';
$buffer=str_replace('%TITLE%', $title, $buffer);
echo $buffer;
?>