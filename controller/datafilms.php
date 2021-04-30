<?php
	/**
	 * @file controller/datafilms.php
	 * @brief Définition des fonctions d'accès à la base de données pour les films 
	 * @author Margaux BRULIARD
	 * @date 11 mars 2021
	 */

	require_once ("database.php");
	
	/**
	 * Variable globale pour l'accès à la base de données
	 */
	global $db;

	/**
	 * @brief récupère de la base de données un film 
	 * @param id_film le numéro d'identification du film que l'on souhaite voir
	 * @return array contenu du film en question ou False si pas de résultat
	 */
	function getFilm($db, $id_film) : array {
		

		$q = $db->prepare("SELECT titre, annee, duree, photo, pays, categories.nom AS catnom FROM films
			INNER JOIN categories
			ON categories.id_categorie = films.id_categorie
			WHERE id_film = :id_film");
		$q->execute([
			'id_film' => $id_film
		]);

		$res = $q->fetch();
		if ($res == 0) {
			return ['res' => false];
		}

		$result = array('res' => true, 'values' => $res);
		return $result;
	}


	/**
	 * Renvoie le nom du realisateur ainsi que son identifiant pour un film donné
	 * @param $db la base de données
	 * @param $id_film l'identifiant du film
	 */
	function getDirectorFilm($db, $id_film): array {
		$q = $db->prepare("SELECT id_individu as id_real, prenom || ' ' || nom as realisateur FROM individus INNER JOIN films ON films.id_realisateur = individus.id_individu WHERE id_film = :id_film");
		$q->execute(["id_film" => $id_film]);

		$res = $q->fetch();
		if ($res == 0) {
			return ['res' => false];
		}

		$res['res'] = true;
		return $res;
	}

	/**
	 * Renvoie les noms des acteurs ainsi que leurs identifiants pour un film donné
	 * @param $db la base de données
	 * @param $id_film l'identifiant du film
	 */
	function getActorsFilm($db, $id_film): array {
		$q = $db->prepare("SELECT id_individu as id_acteur, prenom || ' ' || nom as acteur FROM individus INNER JOIN distribution ON distribution.id_acteur = individus.id_individu WHERE id_film = :id_film");
		$q->execute(["id_film" => $id_film]);

		return $q->fetchAll();
	}


	/**
	 * @brief renvoie un film de la même catégory
	 * @param $db la base de données 
	 * @return array contenu des informations de l'autre film
	 */
	function getAleaFilm($db): array {
		$q = $db->query("SELECT * FROM films");
		$films = $q->fetchAll();

		return $films[array_rand($films, 1)];
	}


	/**
	 * @brief renvoie un film aléatoirement
	 * @param $id_film id du film dont on souhaite un autre film de la meme categorie
	 * @return array contenu des informations de l'autre film
	 */
	function aleaSameCategory($db, $id_film) : array {
		$q0 = $db->prepare("SELECT id_categorie FROM films WHERE id_film = :id_film");
		$q0->execute([
			'id_film' => $id_film
		]);
		$basis = $q0->fetch();

		if ($basis == 0) {
			return ['res' => false, 'values' => null, 'msg' => 'Film inconnu'];
		}

		$q = $db->prepare("SELECT * FROM films WHERE id_categorie = :cat AND id_film != :id_film");
		$q->execute([
			'cat' => $basis['id_categorie'],
			'id_film' => $id_film
		]);
		$other_films = $q->fetchAll();

		if (count($other_films) == 0) {
			// pas d'autre film dasn la même catégorie
			return ['res' => false, 'values' => null, 'msg' => 'Pas de nouveau film dans cette catégorie'];	
		}

		$alea_row = array_rand($other_films, 1);

		return ['res' => true, 'values' => $other_films[$alea_row], 'msg' => 'ok'];
	}


	/**
	 * @brief Renvoie aléatoirement un film du même réalisateur
	 * @param $db la base de données
	 * @param $id_film l'id du film que l'on étudie
	 * @return array autre film 
	 */
	function aleaSameProductor($db, $id_film) : array {

		$q = $db->prepare("SELECT * FROM films WHERE id_realisateur = (
			SELECT id_realisateur FROM films WHERE id_film = :id_film) AND id_film != :id_film");
		$q->execute([
			'id_film' => $id_film
		]);

		$res = $q->fetchAll();
		if (count($res) == 0) {
			// pas d'autre film dasn la même catégorie
			return ['res' => false, 'values' => null, 'msg' => "Ce réalisateur n'a pas fait d'autre film"];	
		}

		$alea_row = array_rand($res, 1);

		return ['res' => true, 'values' => $res[$alea_row], 'msg' => 'ok'];
	}


	/**
	 * @brief Renvoie aléatoirement un film du même réalisateur
	 * @param $db la base de données
	 * @param $id_film l'id du film que l'on étudie
	 * @return array autre film 
	 */
	function aleaSameActor($db, $id_film): array {
		
		// on recupere les acteurs du film
		$q_act = $db->prepare("SELECT individus.id_individu as id_acteur, prenom, nom FROM distribution INNER JOIN individus ON individus.id_individu = distribution.id_acteur WHERE id_film = :id_film");
		$q_act->execute([
			"id_film" => $id_film
		]);

		// on en choisit un au hasard
		$actors = $q_act->fetchAll();
		if (count($actors) == 0) {
			// pas d'autre film dasn la même catégorie
			return ['res' => false, 'values' => null];	
		}

		$alea_acteur = $actors[array_rand($actors, 1)]; // c'est un array (id_acteur, prenom, nom)


		// la requete pour les autres films du meme acteur
		$q_with = $db->prepare("SELECT id_film FROM distribution WHERE id_acteur = :id_acteur AND id_film != :id_film");
		$q_with->execute([
			"id_acteur" => $alea_acteur['id_acteur'],
			"id_film" => $id_film
		]);

		$other_films = $q_with->fetchAll();
		if (count($other_films) == 0 ) {
			return ['res' => false, 'values' => null];
		}

		// on recupere le nouveau film
		$q = $db->prepare("SELECT * FROM films WHERE id_film = :new_id");
		$q->execute([
			"new_id" => $other_films[array_rand($other_films, 1)]['id_film']
		]);

		return ['res' => true, 'values' => array_merge($q->fetch(), $alea_acteur)];
	}

	/**
	 * @brief récupère les images des 3 films les plus récents
	 * @param $db la base de données
	 * @return $t_last array de string de taille 3 contenant les urls des images
	 */
	function getThreeLastFilms($db): array {
		$q = $db->query("SELECT photo FROM films ORDER BY annee DESC, titre ASC");
		$res = $q->fetchAll();

		while(count($res) < 3) {
			$res[count($res)] = "/static/img/template_img.jpg";
		}

		// on ne renvoie que les 3 premieres entrees de array
		$t_res = [0 => $res[0]['photo'], 1 => $res[1]['photo'], 2 => $res[2]['photo']];

		return $t_res;
	}

	/** 
	 * Ajoute ou modifie la note d'un utilisateur concernant un film
	 * @param $db la base de données
	 * @param $id_user l'utilisateur
	 * @param $id_film le film concerné
	 * @param $rate la nouvelle note a enregistrer
	 */
	function addRating($db, $id_user, $id_film, $rate) : array {
		
		// on commence par vérifier si il existe déjà une note 
		$check = $db->prepare("SELECT note FROM notes WHERE id_film= :id_film AND id_user = :id_user");
		$check->execute([
			"id_user" => $id_user,
			"id_film" => $id_film
		]);

		if ($check->fetch() == 0) {
			// pas de note
			$q = $db->prepare("INSERT INTO notes VALUES (:id_film, :id_user, :note, NULL)");
			$q->execute([
				'id_film' => $id_film,
				'id_user' => $id_user,
				'note' => $rate
			]);
		}
		else {
			// la note existe déjà donc on va la modifier 
			$q = $db->prepare("UPDATE notes SET note = :note WHERE id_film = :id_film AND id_user = :id_user");
			$q->execute([
				'id_film' => $id_film,
				'id_user' => $id_user,
				'note' => $rate
			]);
		}

		return ['res' => true];
	}

	/**
	 * Renvoie les informations sur les notes concernant les films: le nombre de note données et la moyenne de ces notes
	 * @param db la base de données
	 * @param id_film l'id du film dont on veut les informations
	 * @return res un array avec les clés 'mean' pour la moyenne et 'nb' pour le nombre de votants
	 */
	function getRatingInfos($db, $id_film): array {
		$q = $db->prepare("SELECT AVG(note) as mean, COUNT(note) as nb FROM notes WHERE id_film = :id");
		$q->execute(["id" => $id_film]);

		$res = $q->fetch();
		if ($res == 0) {
			return ['res' => false];
		}
		$res['res'] = true;
		$res['mean'] = round($res['mean'], 1, PHP_ROUND_HALF_UP);
		
		return $res;
	}

	/**
	 * Permet de récupérer la note d'un utilisateur pour un certain film si elle est existe
	 * @param $db la base de données
	 * @param $user l'utilisateur dont on veut la note
	 * @param $id_film le film dont on veut la note
	 * @return $res résultat de l'opération et si c'est un succès la note associée
	 */
	function getRatingUser($db, $user, $id_film) : array {
		// on recupere la note de l'utilisateur si elle existe
		$q2 = $db->prepare("SELECT note FROM notes WHERE id_film = :id AND id_user = :pseudo");
		$q2->execute([
			"id" => $id_film,
			"pseudo" => $user
		]);

		$rate = $q2->fetch();
		if ($rate != 0) {
			return ['res' => true, 'myrating' => $rate['note']];
		}

		return ['res' => false];
	}



	/**
	 * @brief Renvoie toutes les notes donné par un utilisateur
	 * @param $db la base de données
	 * @param $id_user l'utilisateur 
	 */
	function getRatingsFromUser ($db, $pseudo_user): array {
		$q = $db->prepare("SELECT films.titre as titre, films.id_film as id_film, note FROM films INNER JOIN notes ON films.id_film = notes.id_film WHERE id_user = :pseudo");
		$q->execute(["pseudo" => $pseudo_user]);

		return $q->fetchAll();
	}


	/**
	 * @brief Renvoie la moyenne des notes données par un utilisateur
	 * @param $db la base de données
	 * @param $id_user l'utilisateur 
	 */
	function getAverageRatingFromUser ($db, $pseudo_user): array {
		$q = $db->prepare("SELECT AVG(note) as mean FROM notes WHERE id_user = :pseudo");
		$q->execute(["pseudo" => $pseudo_user]);

		$res = $q->fetch();
		if ($res == 0) {
			return ['res' => false];
		}

		$res['res'] = true;
		$res['mean'] = round($res['mean'], 1, PHP_ROUND_HALF_UP);
		return $res;
	}


?>
