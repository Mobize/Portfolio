<?php
require_once 'inc/db.php';
require_once 'inc/func.php';

// Récupérer les données du formulaire depuis le tableau $_POST
$name = !empty($_POST['name']) ? $_POST['name'] : '';
$email = !empty($_POST['email']) ? $_POST['email'] : '';
$phone = !empty($_POST['phone']) ? $_POST['phone'] : '';
$message = !empty($_POST['message']) ? $_POST['message'] : '';

// Initialiser un tableau $errors et une chaine $result
$errors = array();

// On a soumis le formulaire
if (!empty($_POST)) {

	// Vérifier que les champs obligatoires ne sont pas vides
	// Pour chaque erreur rencontrée, ajouter une entrée dans le tableau $errors correspondant au champ en erreur
	if (empty($name) || strlen($name) > 100) {
		$errors['name'] = 'Vous devez renseigner votre prénom (longueur max 100)';
	}
	if (empty($message)) {
		$errors['message'] = 'Vous devez renseigner votre message';
	}

	// Vérifier que l'email est valide (c.f. php.net/filter_var)
	if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Vous devez renseigner un email valide';
	}

	//echo debug($errors);

	// S'il n'y a pas d'erreur on lance la requête d'insertion
	if (empty($errors)) {

		$query = $db->prepare('INSERT INTO contact SET name = :name, email = :email, phone = :phone, message = :message, date = NOW()');
		$query->bindValue(':name', $name, PDO::PARAM_STR);
		$query->bindValue(':email', $email, PDO::PARAM_STR);
		$query->bindValue(':phone', $phone, PDO::PARAM_STR);
		$query->bindValue(':message', $message, PDO::PARAM_STR);
		$query->execute();

		$insert_id = $db->lastInsertId();

		//Si la requête a réussie (c.f. lastInsertId()), on affiche une confirmation à l'utilisateur
		if (empty($insert_id)) {
			exit();
		}
	}
	exit(json_encode(array('errors' => $errors)));
}