<?php
	/**
	 * @file controller/datafilms.php
	 * @brief Définition des fonctions d'accès à la base de données pour les films 
	 * @author Nahida BENHAFFAF
	 * @author Margaux BRULIARD
	 * @date 11 mars 2021
	 */

	include ("database.php");
	
	/**
	 * Variable globale pour l'accès à la base de données
	 */
	global $db;

	/**
	 * @brief récupère de la base de données les films 
	 * @param first_letter_title 1ere lettre des films que l'on souhaite récupérer. Si null alors on renvoie tous les films
	 * @return array tableau des films
	 */
	function getFilms($first_letter_title=null) : array {
		return array();
	}

	/**
	 * @brief récupère de la base de données un film 
	 * @param id_film le numéro d'identification du film que l'on souhaite voir
	 * @return array contenu du film en question ou False si pas de résultat
	 */
	function getFilm($db, $id_film) : array {
		
		$q = $db->prepare("SELECT titre, duree, films.annee as annee, (individus.prenom || ' ' || individus.nom) as nom_real, categories.nom as nom_cat FROM films 
			INNER JOIN categories
			ON categories.id_categorie = films.id_categorie
			INNER JOIN individus
			ON individus.id_individu = films.id_realisateur
			WHERE id_film = :id_film");
		/*$q = $db->prepare("SELECT titre, annee, duree, categories.nom AS catnom FROM films
			INNER JOIN categories
			ON categories.id_categorie = films.id_categorie
			WHERE id_film = :id_film");*/
		$q->execute([
			'id_film' => $id_film
		]);

		$res = $q->fetch();
		return ['res' => !($res == 0), 'values' => $res];
	}

	/**
	 * @brief renvoie un film de la même catégory
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

		if ($other_films == 0) {
			// pas d'autre film dasn la même catégorie
			return ['res' => false, 'values' => null, 'msg' => 'Pas de nouveau film dans cette catégorie'];	
		}

		$alea_row = array_rand($other_films, 1);

		return ['res' => true, 'values' => $other_films[$alea_row], 'msg' => 'ok'];
	}


	function addRating($db, $id_user, $id_film, $rate) : bool {
		$q = $db->prepare("INSERT INTO notes VALUES (:id_film, :id_user, :note, NULL)");
		$q->execute([
			'id_film' => $id_film,
			'id_user' => $is_user,
			'note' => $rate
		]);
	}

?>
