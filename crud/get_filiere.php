<?php
include_once 'connexion_bdd.php';

	$requete_filiere="SELECT * FROM filiere";
	$listeFiliere=$connexion->prepare($requete_filiere);
	$listeFiliere->execute();