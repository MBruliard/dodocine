<?php

	include ("database.php");
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

?>