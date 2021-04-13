<?php
	
	/**
	 * @file controller/dataindividus.php
	 * @brief Définition des fonctions PHP relatives à la présentation des individus - accès à la base de données
	 */

	require ('database.php');
	global $db;

	/**
	 * Récupération des informations relatives à un individu
	 * @param $db la base de données
	 * @param $id_ind l'id de l'individu dans la BDD
	 * @return res le contenu de la table
	 */
	function getIndividu($db, $id_ind) : array {

		$q = $db->prepare("SELECT * FROM individus WHERE id_individu = :id_ind");
		$q->execute([
			'id_ind' => $id_ind
		]);
		$res = $q->fetch();
		if ($res == 0) {
			return ['res' => false, 'values' => []];
		}

		return ['res' => true, 'values' => $res];
	}

	/**
	 * @brief renvoie un acteur aléatoirement
	 * @param $db la base de données 
	 * @return array contenu des informations sur l'acteur choisi aléatoirement
	 */
	function getAleaActor($db): array {
		$q = $db->query("SELECT * FROM individus WHERE id_individu in (SELECT DISTINCT id_acteur FROM distribution)");
		$actors = $q->fetchAll();

		return $actors[array_rand($actors, 1)];
	}


	/**
	 * @brief récupération de l'activité d'un individu 
	 * @param $db la base de données
	 * @param $id_ind l'identifiant de l'individu que l'on étudie
	 * @return $res liste des activités sous la forme d'une chaine de caractères
	 */
	function getActivityFromIndividu($db, $id_ind) : string {
		$res = "";

		$act = $db->prepare("SELECT * FROM distribution WHERE id_acteur = :id_acteur");
		$act->execute([
			"id_acteur" => $id_ind
		]);
		if ($act->fetch() != 0) {
			$res = $res . 'Acteur';
		} 

		$real = $db->prepare("SELECT * FROM films WHERE id_realisateur = :id_real");
		$real->execute([
			"id_real" => $id_ind
		]);
		if ($real->fetch() != 0) {
			if ($res != "") {
				$res = $res . ', ';
			} 
			$res = $res . 'Réalisateur';
		}

		return $res;
	}
?>