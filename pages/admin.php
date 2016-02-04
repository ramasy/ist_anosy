<!DOCTYPE html>
<html>
<head>
	<title>IST | Anosy</title>
   <link rel="icon" href="../ist_anosy.png">
	<link href="/ist_anosy/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="/ist_anosy/css/template.css" rel="stylesheet">
	<link href="/ist_anosy/css/admin.css" rel="stylesheet">
    

	<meta charset="utf-8" />
</head>
<body>
<?php include_once '../template/header.php'; ?>
<div class="container">
	<div class="row deca-haut-b">
	    <div class="col-md-12 well"> 
	      Ce page d'admin vous permet d'ajouter et de supprimer des items tel que les ecolages ou les filieres
	    </div>
	</div>
	<div class="row bloc-admin">
	<h4 class="text-center">Admnistrer filiere</h4>
		<div class="col-md-12">
			<table class="table table-hover">
                    
                    <tbody>
                      <tr>
                           
                           
                            <th class="">id</th>
                            <th class="">Nom filiere</th>
                           <th class="text-center">Operation</th>
                        </tr>
                         <?php 
                                include_once '../crud/get_filiere.php';
                                while ($filiere=$listeFiliere->fetch()) {
                             ?>
                        <tr>
                            <td class="col-md-6"><em><?php echo $filiere['id']; ?></em></td>
                            <td class="col-md-3"><?php echo $filiere['nom_filiere']; ?></td>
                            <td class="col-md-1 text-center"> <span class="glyphicon glyphicon-trash active-hand" data-toggle="modal" data-target=<?php echo "\"#confirmation".$filiere['id']."\""; ?>></span></td>
                        </tr>
                        <!-- modalConfirm -->
                        <div class="modal" id=<?php echo "\"confirmation".$filiere['id']."\""; ?> role="dialog">
                            <div class="modal-dialog">
                            
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <strong> <span class="glyphicon glyphicon-alert"></span> Confirmation</strong>
                                </div>
                                <div class="modal-body">
                                  <p> Supprimer le filiere  <?php echo $filiere['nom_filiere'] ?>?</p>
                                  <button class="btn btn-succes">Annuler</button> <a class="text-noir" href=<?php echo "../crud/delete_filiere.php?id=".$filiere['id']; ?>><button class="btn btn-danger">Supprimer </button></a>
                                </div>
                              
                            </div>
                          </div>
                        </div>

                     <!-- /modalConfirm -->
                     <?php } ?>
                           
                    </tbody>
                </table>
                <div class="row gap">
                	<form action="../crud/add_filiere.php" method="POST">
                		<div class="col-md-6"><input name="nom_filiere" class="form-control" placeholder="Nom filiere" type="text" required> </div>
                		<div class="col-md-2"><button class="btn btn-primary">Ajouter filiere</button></div>
                	</form>	
				</div>
		</div>
		
	</div>
	
	<!-- gap -->
        <div class="gap2"></div>
      <!-- /gap -->
	<!--  -->
	<div class="row bloc-admin">
	<h4 class="text-center">Admnistrer écolage</h4>
		<div class="col-md-12">
		
			<table class="table table-hover">
                    
                    <tbody>
                      <tr>
                           
                           
                            <th class="">Niveau(Année)</th>
                            <th class="">Montant Ecolage(Ar)</th>
                           <th class="text-center">Operation</th>
                        </tr>
                         <?php 
                                include_once '../crud/get_ecolage.php';
                                while ($ecolage=$listeEcolage->fetch()) {
                             ?>
                        <form action="../crud/update_ecolage.php" method="POST">
                        <tr>
                            <td class="col-md-6"><?php echo $ecolage['niveau']; ?></td>
                            <td class="col-md-3"><input name="montant" class="form-control" value=<?php echo $ecolage['montant']; ?> placeholder="Niveau" type="text" required></td>
                            <input name="id" class="form-control" value=<?php echo $ecolage['id']; ?> type="hidden">
                            <td class="col-md-1 text-center"> <button class="btn"><span class="glyphicon glyphicon-floppy-save active-hand" data-toggle="modal" data-target=<?php echo "\"#confirmation2".$ecolage['id']."\""; ?>></span></button></td>
                        </tr>

                        </form>
                    
                        
                     <?php } ?>
                           
                    </tbody>
                </table>
          
		</div>
	</div>
	
	<!-- / -->
	<!-- gap -->
        <div class="gap2"></div>
      <!-- /gap -->
	<!--  -->
	<div class="row bloc-admin text-center">
		<h4 class="text-center">Ajouter D'autres étudiants</h4>
		<p>Si vous voulez ajouter de nouvelle etudiant cliquer sur le lien ci dessous</p>
		<p><a href="new_etudiant.php">Ajouter?</a></p>
	</div>
	
	<!-- / -->

</div>
<!-- gap -->
        <div class="gap"></div>
      <!-- /gap -->
 <?php include_once '../template/footer.php'; ?>
<script src="/ist_anosy/bootstrap/js/jquery.min.js"></script>
<script src="/ist_anosy/bootstrap/js/bootstrap.js"></script>
</body>
</html>