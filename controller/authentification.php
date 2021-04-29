<?php
	/**
	 * @file controller/authentification.php
	 * @brief Définition des fonctions utilisées pour l'authentification d'un utilisateur sur le site 
	 * @details L'ensemble des fonctions est notamment utilisé pour accéder et modifier les informations relatives aux utilisateurs dans la base de données
	 * @author Margaux BRULIARD
	 * @author Nahida BENHAFFAF
	 * @date 11 mars 2021
	 */

	require_once ("database.php");

	/**
	 * Variable relative à la base de données
	 */
	global $db;

	/**
	 * Création d'un nouveau compte pour un utilisateur
	 * @param db la base de donnée (PDO)
	 * @param pseudo le pseudo du nouvel utilisateur
	 * @param email l'email du nouvel utilisateur
	 * @param pwd le mot de passe du nouvel utilisateur
	 * @param confirm_pwd confirmatiton du mot de passe
	 * @return array ( "res" : bool , "msg" : string - message à indiquer à l'utilisateur)
	 */
	function create_new_user($db, $pseudo, $email, $pwd, $confirm_pwd): array {
		
		$result = array ();

		$result['res'] = true;
		if (empty($pseudo)) {
			$result['res'] = false;
			$result['pseudo'] = "Le champs n'est pas renseigné";
		}

		if (empty($email)) {
			$result['res'] = false;
			$result['pseudo'] = "Le champs n'est pas renseigné";	
		}

		if (empty($pwd)) {
			$result['res'] = false;
			$result['password'] = "Le champs n'est pas renseigné";	
		}

		if (empty($confirm_pwd)) {
			$result['res'] = false;
			$result['conf_password'] = "Le champs n'est pas renseigné";	
		}


		if ($result['res']) {
			if ($pwd != $confirm_pwd) {
				return ['res' => false, 'password' => "Les entrées de mots de passe ne correspondent pas", 'conf_password' => "Les entrées de mots de passe ne correspondent pas"];
			}

			// on verifie que le pseudo est bien unique ainsi que l'email
			$q1 = $db->prepare("SELECT pseudo FROM users WHERE pseudo = :pseudo");
			$q1->execute([
				'pseudo' => $pseudo
			]);
			if ($q1->fetch() != 0) {
				return ['res' => false, 'pseudo' => "Ce nom d'utilisateur existe déjà. Veuillez renseigner un autre nom d'utilisateur"];
			}


			$q2 = $db->prepare("SELECT email FROM users WHERE email = :email");
			$q2->execute([
				'email' => $email
			]);
			if ($q2->fetch() != 0) {
				return ['res' => false, 'email' => "Cette adresse email est déjà utilisée pour un autre compte. Veuillez renseigner une nouvelle adresse email"];
			}

			$new = $db->prepare("INSERT INTO users (pseudo, email, password) VALUES (:pseudo, :email, :password)");
			$new->execute([
				'pseudo' => $pseudo,
				'email' => $email,
				'password' => password_hash($pwd, PASSWORD_DEFAULT, [])
			]);
		}

		return $result;
	}

	/**
	 * Connexion d'un utilisateur - Si celle-ci est réussie nous ajoutons les informations dans $_SESSION
	 * @param db la base de données
	 * @param pseudo l'identifiant de connexion
	 * @param password le mot de passe rensigné lors de la tentative de connexion
	 * @return array ('res': bool, 'pseudo' : string - message en cas d'erreur, 'password' : string - message en cas d'erreur) 
	 */
	function login_user ($db, $pseudo, $password) : array {
		
		$result = array();

		$result['res'] = true;
		if (empty($pseudo)) {
			$result['res'] = false;
			$result['pseudo'] = "Le champs est vide !";
		}

		if (empty($password)) {
			$result['res'] = false;
			$result['password'] = "Le champs est vide !";
		}

		if ($result['res']) {

			// on cherche ce pseudo dans la base de données
			$q = $db->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
			$q->execute(['pseudo' => $pseudo]);
			$user = $q->fetch();

			if ($user == 0) {
				//pas d'utilisateur trouvé
				return ['res' => false, 'pseudo' => "Aucun utilisateur trouvé sous ce nom ..."];

			}

			// on vérifie le mot de passe
			$res = password_verify( $password , $user['password']); 

			if (!$res) {
				return ['res' => false, 'password' => "Mot de passe incorrect ..."];
			}

			// on connecte l'utilisateur
			return ['res' => true];

		}
		
		return $result;
	}

	/**
	 * Modification du mot de passe d'un utilisateur
	 * @param db la base de données
	 * @param pseudo l'utilisateur sur lequel les modifications sont apportées
	 * @param pwd le nouveau mot de passe
	 * @param confpwd confirmation du mot de passe
	 * @return array ('res' => bool, 'msg' => message a affiché pour l'utilisateur)
	 */
	function modify_password($db, $pseudo, $pwd, $confpwd): array {
		
		$result = array();
		$result['res'] = true;
		if (empty($pwd)) {
			$result['res'] = false;
			$result['password'] = "Le champs est vide";
		}

		if (empty($confpwd)) {
			$result['res'] = false;
			$result['confirmation'] = "Le champs est vide";	
		}

		if ($result['res']) {
			if ($pwd != $confpwd) { 
				return ['res' => false, 'confirmation' => "les entrées ne correspondent pas ..."];	
			}

			$q =$db->prepare("UPDATE users SET password = :pwd WHERE pseudo = :pseudo");
			$q->execute([
				'pwd' => password_hash($pwd, PASSWORD_DEFAULT, []),
				'pseudo' => $pseudo
			]);

			return ['res' => true];
		}
		
		return $result;

	}


	/**
	 * Modification de l'email d'un utilisateur
	 * @param db la base de données
	 * @param pseudo l'utilisateur sur lequel les modifications sont apportées
	 * @param email le nouvel email
	 * @return res un array contenant le résultat de l'opération
	 */
	function modify_email($db, $pseudo, $email): array {
		
		if (empty($email)) {
			return ['res' => false, 'email' => 'Le champs est vide ...'];
		}

		$q =$db->prepare("UPDATE users SET email = :email WHERE pseudo = :pseudo");
		$q->execute([
			'email' => $email,
			'pseudo' => $pseudo
		]);
		return ['res' => true];
	}


	/**
	 * Suppression d'un utilisateur dans la base de données
	 * @param db la base de données
	 * @param pseudo le nom de l'utilisateur que l'on souhaite supprimer
	 * @return res l'array contenant le résultat de l'opération
	 */
	function delete_user ($db, $pseudo) : array {
		$q = $db->prepare("DELETE FROM users WHERE pseudo = :pseudo");
		$q->execute(['pseudo' => $pseudo]);

		return ['res' => true];
	}

?>