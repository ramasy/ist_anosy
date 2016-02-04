<?php
if(VerifieData()){
	$path='';
	include_once 'connexion_bdd.php';
	$requete  = $connexion->prepare('INSERT INTO etudiant (num_insc, nom,prenom,sexe,date_naissance,niveau,cin,adresse,tel,nom_pere,nom_mere,adresse_parent,tel_parent,email,filiere,photo) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
	
	//======================
	if (isset($_FILES['photo']) AND $_FILES['photo']['error']==0){
		if ($_FILES['photo']['size'] <= 4000000)
		{
			$infosfichier=pathinfo($_FILES['photo']['name']);
			$extension_upload  = $infosfichier['extension'];
			$extensions_autorisees = array('jpg','png','gif');
			if (in_array($extension_upload,$extensions_autorisees)){
				$path=time().rand(1111, 9999).".".$infosfichier['extension'];
				move_uploaded_file($_FILES['photo']['tmp_name'], '../img/'.$path);
			}
		}
	}
	//======================
	if($path==''){
		$path=$_POST['photo'];
	}
	$requete ->execute(array($_POST['num_insc'],$_POST['nom'], $_POST['prenom'], $_POST['sexe'],date('Y-m-d',strtotime($_POST['date_naissance'])),$_POST['niveau'],$_POST['cin'],$_POST['adresse'],$_POST['tel'],$_POST['nom_pere'],$_POST['nom_mere'],$_POST['adresse_parent'],$_POST['tel_parent'],$_POST['email'],$_POST['filiere'],$path));
	header('Location: ../pages/admin.php');
}

function VerifieData(){
	if(isset($_POST['num_insc'])&&isset($_POST['nom'])&&isset($_POST['prenom'])&&isset($_POST['sexe'])&&isset($_POST['date_naissance'])&&isset($_POST['niveau'])&&isset($_POST['cin'])&&isset($_POST['adresse'])&&isset($_POST['tel'])&&isset($_POST['nom_pere'])&&isset($_POST['nom_mere'])&&isset($_POST['adresse_parent'])&&isset($_POST['tel_parent'])&&isset($_POST['email'])&&isset($_POST['filiere'])&&isset($_FILES['photo'])){
		return true;
	}
	else
		echo "misy tsy mety";
}
?>