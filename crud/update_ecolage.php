<?php
if(VerifieData()){
	include_once 'connexion_bdd.php';
	$requete  = $connexion->prepare('UPDATE ecolage SET montant=? WHERE id=?');
	$requete ->execute(array($_POST['montant'],$_POST['id']));
	header('Location: ../pages/admin.php');
}

function VerifieData(){
	if(isset($_POST['montant'])&&isset($_POST['id'])){
		return true;
	}
	else
		return false;
}
?>