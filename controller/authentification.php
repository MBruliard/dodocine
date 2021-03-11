<?php
	/**
	 * @file controller/authentification.php
	 * @brief Définition des fonctions utilisées pour l'authentification d'un utilisateur sur le site 
	 * @details L'ensemble des fonctions est notamment utilisé pour accéder et modifier les informations relatives aux utilisateurs dans la base de données
	 * @author Margaux BRULIARD
	 * @author Nahida BENHAFFAF
	 * @date 11 mars 2021
	 */

	include ("database.php");

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
		if (!empty($pseudo) && !empty($email) && !empty($pwd) && !empty($confirm_pwd)) {
			if ($pwd != $confirm_pwd) {
				return ['res' => false, 'msg' => "Les entrées de mots de passe ne correspondent pas"];
			}

			// on verifie que le pseudo est bien unique ainsi que l'email
			$q1 = $db->prepare("SELECT pseudo FROM users WHERE pseudo = :pseudo");
			$q1->execute([
				'pseudo' => $pseudo
			]);
			if ($q1->fetch() != 0) {
				return ['res' => false, 'msg' => "Ce nom d'utilisateur existe déjà. Veuillez renseigner un autre nom d'utilisateur"];
			}


			$q2 = $db->prepare("SELECT email FROM users WHERE email = :email");
			$q2->execute([
				'email' => $email
			]);
			if ($q2->fetch() != 0) {
				return ['res' => false, 'msg' => "Cette adresse email est déjà utilisée pour un autre compte. Veuillez renseigner une nouvelle adresse email"];
			}

			$new = $db->prepare("INSERT INTO users (pseudo, email, password) VALUES (:pseudo, :email, :password)");
			$new->execute([
				'pseudo' => $pseudo,
				'email' => $email,
				'password' => password_hash($pwd, PASSWORD_DEFAULT, [])
			]);
		}
		else {
			return ['res' => false, 'msg' => "Au moins un des champs n'a pas été renseigné"];
		}

		return ['res' => true, 'msg' => "Le nouvel utilisateur vient d'être ajouté. Bienvenue à toi " . $pseudo . " !"];
	}

	/**
	 * Connexion d'un utilisateur - Si celle-ci est réussie nous ajoutons les informations dans $_SESSION
	 * @param db la base de données
	 * @param pseudo l'identifiant de connexion
	 * @param password le mot de passe rensigné lors de la tentative de connexion
	 * @return array ('res': bool, 'msg' : string - message en cas d'erreur) 
	 */
	function login_user ($db, $pseudo, $password) : array {
		if (!empty($pseudo) && !empty($password)) {

			// on cherche ce pseudo dans la base de données
			$q = $db->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
			$q->execute(['pseudo' => $pseudo]);
			$user = $q->fetch();

			if ($user == 0) {
				//pas d'utilisateur trouvé
				return ['res' => false, 'msg' => "Aucun utilisateur trouvé sous ce nom ..."];

			}

			// on vérifie le mot de passe
			$res = password_verify( $password , $user['password']); 

			if (!$res) {
				return ['res' => false, 'msg' => "Mot de passe incorrect ..."];
			}

			// on connecte l'utilisateur
			return ['res' => true, 'msg' => ""];

		}
		
		return ['res' => false, 'msg'=>"Au moins des champs n'est pas renseigné ..."];

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
		if ($pwd != $confpwd) {
			return ['res' => false, 'msg' => "Les entrées de mot de passe ne correspondent pas"];
		}

		$q =$db->prepare("UPDATE users SET password = :pwd WHERE pseudo = :pseudo");
		$q->execute([
			'pwd' => password_hash($pwd, PASSWORD_DEFAULT, []),
			'pseudo' => $pseudo
		]);

		return ['res' => true, 'msg' => "Le changement de mot de passe a bien été pris en compte"];
	}


	/**
	 * Modification de l'email d'un utilisateur
	 * @param db la base de données
	 * @param pseudo l'utilisateur sur lequel les modifications sont apportées
	 * @param email le nouvel email
	 */
	function modify_email($db, $pseudo, $email): void {
		
		$q =$db->prepare("UPDATE users SET email = :email WHERE pseudo = :pseudo");
		$q->execute([
			'email' => $email,
			'pseudo' => $pseudo
		]);
	}


	/**
	 * Suppression d'un utilisateur dans la base de données
	 * @param db la base de données
	 * @param pseudo le nom de l'utilisateur que l'on souhaite supprimer
	 */
	function delete_user ($db, $pseudo) : void {
		$q = $db->prepare("DELETE FROM users WHERE pseudo = :pseudo");
		$q->execute(['pseudo' => $pseudo]);
	}

?>