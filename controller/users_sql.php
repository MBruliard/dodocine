<?php
	include ("database.php");
	global $db;

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
?>