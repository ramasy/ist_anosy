<?php
session_start();
include_once 'connexion_bdd.php';

	$requete_SQL="SELECT * FROM utilisateur WHERE email='".$_POST['email']."' AND password='".$_POST['password']."'";
	$resultat=$connexion->prepare($requete_SQL);
	$resultat->execute();
	$row = $resultat->fetch();	
$_SESSION['pseudo']=$row['nom'];
$_SESSION['utilisateur']=$row;
header('Location: ../');
?>