<?php
if(VerifieData()){
	
	include_once 'connexion_bdd.php';
	$requete  = $connexion->prepare('INSERT INTO abscence (motif,annee,date,etudiant_id,administrateur,nombre_jour) VALUES(?, 0,now(),?,?,?)');
	
	
	$requete->execute(array($_POST['motif'], $_POST['etudiant_id'], $_POST['administrateur'],$_POST['nombre_jour']));
	// echo $_POST['etudiant_id'];
header('Location: ../pages/etudiant.php?id='.$_POST['etudiant_id']);
	
}

function VerifieData(){
	if(isset($_POST['motif'])&&isset($_POST['etudiant_id'])&&isset($_POST['administrateur'])&&isset($_POST['nombre_jour'])){
		return true;
	}
	else
		echo "misy tsy mety";
}
?>