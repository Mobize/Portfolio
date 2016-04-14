<?php
require_once 'inc/db.php';
require_once 'inc/func.php';

$current_page = basename($_SERVER['PHP_SELF']); // Ex: index.php

$pages = array(
	'Accueil' => 'index.php',
	'Actualités' => 'news.php',
	'Recherche' => 'search.php',
	'Contact' => 'contact.php'
);