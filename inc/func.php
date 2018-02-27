<?php

// UTILS
function debug($array) {
	return '<pre>'.print_r($array, true).'</pre>';
}

function getTitle($title) {
	return ucfirst($title);
}

function getDescription($description) {
	return nl2br($description);
}

function getPicture($project_picture = '') {
	$picture = 'img/portfolio/default.png';
	if (!empty($project_picture)) {
		$picture_path = 'img/portfolio/'.$project_picture;
		if (file_exists($picture_path)) {
			$picture = $picture_path;
		}
	}
	return $picture;
}

function getTagsLinks($project_tags) {
	// Découpe une chaine séparée par virgule espace et réparti les différents morceaux dans un tableau
	$tags = explode(', ', $project_tags);

	$tags_links = array();
	// Pour chaque tag
	foreach($tags as $tag) {
		// On ajoute un lien autour du tag
		$tags_links[] = '<a href="#'.$tag.'">'.$tag.'</a>';
	}
	// On recolle tous les morceaux du tableau en les séparant par un |
	return implode(' | ', $tags_links);
}

function getProjectFormattedDate($date, $format = '%A %d %B %Y') {
	$time = strtotime($date);
	// c.f. php.net/strftime
	$date = strftime($format, $time);
	$date = ucfirst(strtolower($date));
	$date = utf8_encode($date);
	return $date;
}

function getProjectDate($date, $format = 'F Y') {
	// c.f. php.net/date
	return date($format, strtotime($date));
}