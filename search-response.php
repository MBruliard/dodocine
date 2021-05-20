<?php 
	
	/**
	 * @file search-response.php
	 * @brief recherche via ajax
	 */
require("controller/datafilms.php");
session_start();

if(isset($_POST['search'])){
	$q = $db->prepare("SELECT titre, id_film FROM films WHERE UPPER(titre) like UPPER(:search)");
	$q->execute(["search" => "%" . $_POST['search'] . "%"]);

	$response = $q->fetchAll();
	if ($response) {
      foreach ($response as $row) {
        echo '<a href="/film.php?id_film='. $row['id_film'] .'" class="list-group-item list-group-item-action border-1 search-results-item">' . $row['titre'] . '</a>';
      }
    } else {
      echo '<a href="#" class="list-group-item border-1" style="text-decoration:none">pas de suggestion...</a>';
    }

    $q = $db->prepare("SELECT prenom || ' ' || nom as label, id_individu FROM individus WHERE UPPER(nom) LIKE UPPER(:search) OR UPPER(prenom) LIKE UPPER(:search)");
    $q->execute(["search" => "%" . $_POST['search'] . "%"]);

    $response = $q->fetchAll();
    if ($response) {
      foreach ($response as $row) {
        echo '<a href="/actor.php?id_ind='. $row['id_individu'] .'" class="list-group-item list-group-item-action border-1 search-results-item">' . $row['label'] . '</a>';
      }
    } else {
      echo '<a href="#" class="list-group-item border-1" style="text-decoration:none">pas de suggestion...</a>';
    }
}


?>