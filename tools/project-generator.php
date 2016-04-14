<?php
require_once '../inc/func.php';
require_once '../inc/db.php';

$contents = nl2br(file_get_contents('lorem.txt'));
$contents = explode('<br />'.PHP_EOL.'<br />'.PHP_EOL, $contents);

$pictures = glob('../img/portfolio/*');

$projects = array();
foreach ($contents as $key => $content) {

	$rand_year = rand(2014, date('Y'));
	$rand_month = sprintf('%1$02d', $rand_year == date('Y') ? rand(1, date('n')) : rand(1, 12));
	$rand_day = sprintf('%1$02d', rand(1, 28));

	$rand_date = $rand_year.'-'.$rand_month.'-'.$rand_day;

	//echo $rand_date.'<br>';

	$first_space_pos = strpos($content, ' ');
	$first_point_pos = strpos($content, '.');

	$client = substr($content, 0, $first_space_pos);

	$title = substr($content, $first_space_pos + 1, $first_point_pos - $first_space_pos - 1);

	$tags = substr($content, -20);

	$description = substr($content, $first_point_pos + 2);

	$picture_key = array_rand($pictures);
	$picture = basename($pictures[$picture_key]);


	$projects[] = array(
		'title' => ucfirst(trim($title)),
		'client' => ucfirst(trim($client)),
		'tags' => ucfirst(trim($tags)),
		'description' => ucfirst(trim($description)),
		'picture' => $picture,
		'date' => $rand_date
	);
}

//debug($projects);

$query = $db->prepare('INSERT INTO project SET title = :title, client = :client, tags = :tags, description = :description, picture = :picture, date = :date');

$query->bindParam(':title', $title, PDO::PARAM_STR);
$query->bindParam(':client', $client, PDO::PARAM_STR);
$query->bindParam(':tags', $tags, PDO::PARAM_STR);
$query->bindParam(':description', $description, PDO::PARAM_STR);
$query->bindParam(':picture', $picture, PDO::PARAM_STR);
$query->bindParam(':date', $date, PDO::PARAM_STR);


foreach($projects as $key => $project) {

	$title = $project['title'];
	$client = $project['client'];
	$tags = $project['tags'];
	$description = $project['description'];
	$picture = $project['picture'];
	$date = $project['date'];

	$query->execute();
}
