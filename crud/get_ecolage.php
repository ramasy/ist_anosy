<?php
include_once 'connexion_bdd.php';

	$requete_ecolage="SELECT * FROM ecolage";
	$listeEcolage=$connexion->prepare($requete_ecolage);
	$listeEcolage->execute();