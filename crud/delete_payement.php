<?php
if(VerifieData()){
	
	include_once 'connexion_bdd.php';
	$requete  = $connexion->prepare('DELETE FROM `payement` WHERE id=? ');
	$requete->execute(array($_GET['id']));
	
header('Location: ../pages/etudiant.php?id='.$_GET['eid']);
	
}

function VerifieData(){
	if(isset($_GET['id'])&&isset($_GET['eid'])){
		return true;
	}
	else
		echo "misy tsy mety";
}
?>