<?php
if(VerifieData()){
	
	include_once 'connexion_bdd.php';
	$requete  = $connexion->prepare('DELETE FROM `filiere` WHERE id=? ');
	$requete->execute(array($_GET['id']));
	
header('Location: ../pages/admin.php');
	
}

function VerifieData(){
	if(isset($_GET['id'])){
		return true;
	}
	else
		echo "misy tsy mety";
}
?>