<?php
if(VerifieData()){
	
	include_once 'connexion_bdd.php';
	$requete  = $connexion->prepare('INSERT INTO filiere (nom_filiere) VALUES(?)');
	
	
	$requete->execute(array($_POST['nom_filiere']));
	// echo $_POST['etudiant_id'];
header('Location: ../pages/admin.php');
	
}

function VerifieData(){
	if(isset($_POST['nom_filiere'])){
		return true;
	}
	else
		echo "misy tsy mety";
}
?>