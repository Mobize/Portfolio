<?php

function debug($tableau) {
	echo '<pre>'.print_r($tableau, true).'</pre>';
}

function getCover($movie_id = 0) {
	$picture = 'img/covers/'.$movie_id.'.jpg';
	if (file_exists($picture)) {
		return $picture;
	}
	return 'img/cover.png';
}