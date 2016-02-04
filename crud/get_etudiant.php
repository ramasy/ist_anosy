<?php
include_once 'connexion_bdd.php';
//echo "OK";
if(isset($_GET['requete'])){
	$requete=$_GET['requete'];
	$tableau_requete=array('requete'=>$requete."%" );
	$requete_SQL="SELECT * FROM etudiant WHERE nom LIKE :requete OR prenom LIKE :requete";
	$resultat=$connexion->prepare($requete_SQL);
	$resultat->execute($tableau_requete);
	$count=$resultat->rowCount($requete_SQL);
	if($count>=1){
		while($row = $resultat->fetch()){
			?>
			<a class="bloc-user" href= <?php echo "/ist_anosy/pages/etudiant.php?id=".$row['id'] ; ?> >
			<div class="col-md-4 single-user">
            <div class="well well-sm single-user-well">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src=<?php echo "img/".$row['photo']; ?> alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>
                           <?php echo $row["nom"]." ".$row['prenom']; ?></h4>
                        <small><cite title="San Francisco, USA" class="addresse"><?php echo $row['adresse']; ?> <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            N°:<?php echo $row['num_insc']; ?>
                            <br />
                            </i><?php if($row['niveau']==1){echo "Niveau:".$row['niveau']."ère Année";}else{echo "Niveau:".$row['niveau']."ème Année";}  ?>
                            <br />
                            Filiere:<?php 
                            $requete_SQL2="SELECT * FROM filiere WHERE id=".$row['filiere'];
                            $resultat2=$connexion->prepare($requete_SQL2);
                            $resultat2->execute();
                            $row2 = $resultat2->fetch();
                            echo $row2['nom_filiere']; 
                            ?></p>
                
                     
                    </div>
                </div>
            </div>
        </div>
	</a>

<?php
		}

	}else{
		echo "pas de resultat";
	}
}
?>