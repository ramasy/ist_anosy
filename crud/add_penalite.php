<?php
if(VerifieData()){
	
	include_once 'connexion_bdd.php';
	$requete  = $connexion->prepare('INSERT INTO penalite (motif,annee,date,etudiant_id,administrateur) VALUES(?, 0,now(),?,?)');
	
	
	$requete->execute(array($_POST['motif'], $_POST['etudiant_id'], $_POST['administrateur']));
	// echo $_POST['etudiant_id'];
header('Location: ../pages/etudiant.php?id='.$_POST['etudiant_id']);
	
}

function VerifieData(){
	if(isset($_POST['motif'])&&isset($_POST['etudiant_id'])&&isset($_POST['administrateur'])){
		return true;
	}
	else
		echo "misy tsy mety";
}
?>