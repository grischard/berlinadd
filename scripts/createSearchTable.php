<?php
include_once 'db.php';
include_once 'lib.php';

ignore_user_abort(true);
set_time_limit(0);

//format table
$sql = '
DROP TABLE IF EXISTS search;
CREATE TABLE search (
	seid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	term VARCHAR(255),
	type INT,
	objid INT,
	objid2 INT DEFAULT 0,
	number INT DEFAULT 0
) DEFAULT CHARSET utf8;';
$db->multi_query($sql);
while ($db->next_result()) {;} // flush multi_queries

//add bezirke
$sql = 'SELECT bid, bezirk_name
		FROM bezirke';
$res = $db->query($sql);
while($row = $res->fetch_assoc()) {
	$term = $row['bezirk_name'];
	$sql = 'INSERT INTO search (term, type, objid)
			VALUES (\'' . $term . '\', 1, ' . $row['bid'] . ')';
	$db->query($sql);
}

//add ortsteile
$sql = 'SELECT o.oid, o.ortsteil_name, b.bezirk_name
		FROM ortsteile o
		LEFT JOIN bezirke b
			ON b.bid = o.bid';
$res = $db->query($sql);
while($row = $res->fetch_assoc()) {
	$term = $row['ortsteil_name'] . ', ' . $row['bezirk_name'];
	$sql = 'INSERT INTO search (term, type, objid)
			VALUES (\'' . $term . '\', 2, ' . $row['oid'] . ')';
	$db->query($sql);
}

//add postcodes
$sql = 'SELECT pid, postcode
		FROM postcodes';
$res = $db->query($sql);
while($row = $res->fetch_assoc()) {
	$term = $row['postcode'];
	$sql = 'INSERT INTO search (term, type, objid)
			VALUES (\'' . $term . '\', 3, ' . $row['pid'] . ')';
	$db->query($sql);
}

//add streets + ortsteile
$sql = 'SELECT s.street_name, o.ortsteil_name, b.bezirk_name, s.sid, o.oid
		FROM numbers n
		LEFT JOIN streets s
		ON s.sid = n.sid
		LEFT JOIN ortsteile o
		ON o.oid = n.oid
		LEFT JOIN bezirke b
		ON b.bid = n.bid
		GROUP BY n.oid, n.sid';
$res = $db->query($sql);
while($row = $res->fetch_assoc()) {
	$term = $row['street_name'] . ', ' . $row['ortsteil_name'] . ', ' . $row['bezirk_name'];
	$sql = 'INSERT INTO search (term, type, objid, objid2)
			VALUES (\'' . $term . '\', 4, ' . $row['sid'] . ', ' . $row['oid'] . ')';
	$db->query($sql);
}

//add streets + postcodes
$sql = 'SELECT p.pid, p.postcode, s.sid, s.street_name
		FROM numbers n
		LEFT JOIN streets s
		ON s.sid = n.sid
		LEFT JOIN postcodes p
		ON p.pid = n.pid
		GROUP BY n.pid, n.sid';
$res = $db->query($sql);
while($row = $res->fetch_assoc()) {
	$term = $row['street_name'] . ', ' . $row['postcode'];
	$sql = 'INSERT INTO search (term, type, objid, objid2)
			VALUES (\'' . $term . '\', 5, ' . $row['sid'] . ', ' . $row['pid'] . ')';
	$db->query($sql);
}

//add numbers
$sql = 'SELECT n.nid, s.street_name, n.number, p.postcode, o.ortsteil_name, b.bezirk_name
		FROM numbers n
		LEFT JOIN streets s
			ON s.sid = n.sid
		LEFT JOIN postcodes p
			ON  p.pid = n.pid
		LEFT JOIN ortsteile o
			ON o.oid = n.oid
		LEFT JOIN bezirke b
			ON b.bid = n.bid';
$res = $db->query($sql);
while($row = $res->fetch_assoc()) {
	//insert search term
	$term = $row['street_name'] . ' ' . $row['number'] . ', ' . $row['postcode'] . ', ' . 
		$row['ortsteil_name'] . ', ' . $row['bezirk_name'];
	$sql = 'INSERT INTO search (term, type, objid, number)
			VALUES (\'' . $term . '\', 6, ' . $row['nid'] . ', ' . 
			intval($row['number']) . ')';
	$db->query($sql);
}