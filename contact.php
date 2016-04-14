<?php
require_once 'inc/config.php';

// On réceptionne les données du formulaire
$name = !empty($_POST['name']) ? $_POST['name'] : '';
$email = !empty($_POST['email']) ? $_POST['email'] : '';
$phone = !empty($_POST['phone']) ? $_POST['phone'] : '';
$message = !empty($_POST['message']) ? $_POST['message'] : '';

$status = false;
$errors = array();

// Le formulaire a ete soumis, on a appuye sur le bouton Envoyer
if (!empty($_POST)) {

	// On check les erreurs possibles
	if (empty($name)) {
		$errors['name'] = 'Veuillez renseigner votre nom';
	}
	if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Veuillez renseigner un email valide';
	}
	if (empty($phone) || !is_numeric($phone)) {
		$errors['phone'] = 'Veuillez renseigner un téléphone valide (que des chiffres)';
	}
	if (empty($message)) {
		$errors['message'] = 'Votre message est vide';
	} else if (strlen($message) > 65535) {
		$errors['message'] = 'Votre message ne doit pas dépasser 65535 caractères';
	}

	//debug($errors);

	// Aucune erreur dans le formulaire, tous les champs ont été saisis correctement
	if (empty($errors)) {

		$query = $db->prepare('INSERT INTO contact SET name = :name, email = :email, phone = :phone, message = :message, date = NOW()');

		// Pour chacune des variables précédées d'un : on doit faire un bindValue pour passer la valeur à la requête
		$query->bindValue(':name', $name, PDO::PARAM_STR);
		$query->bindValue(':email', $email, PDO::PARAM_STR);
		$query->bindValue(':phone', $phone, PDO::PARAM_STR);
		$query->bindValue(':message', $message, PDO::PARAM_STR);

		// On execute la requête
		$query->execute();

		// On récupère le numéro de la ligne automatiquement généré par MySQL avec l'attribut AUTO_INCREMENT
		$insert_id = $db->lastInsertId();

		if (!empty($insert_id)) {
			$status = true;
		} else {
			$errors = array('db_error' => 'Erreur interne, merci de reessayer ulterieurement');
		}
	}
}

$result = array(
	'status' => $status,
	'errors' => $errors
);

exit(json_encode($result));