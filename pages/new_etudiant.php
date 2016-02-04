<!DOCTYPE html>
<html>
<head>
	<title>IST | Anosy</title>
   <link rel="icon" href="../ist_anosy.png">
	<link href="/ist_anosy/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="/ist_anosy/css/etudiant.css" rel="stylesheet">
	<link href="/ist_anosy/css/template.css" rel="stylesheet">
	<meta charset="utf-8" />
</head>
<body>
<?php
   include_once '../crud/connexion_bdd.php';    
   include_once '../template/header.php';
 ?>
	<div class="container">
      <div class="row">
        <div class="col-md-12" >
   	
   
          <div class="panel panel-default">
            <div class="panel-heading">
              <h1 class="panel-title">Ajout etudiant</h1>
            </div>
            <div class="panel-body">
              <div class="row">

                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="../img/autocollant.png" class="img-responsive"> </div>
                
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                 <form action="/ist_anosy/crud/add_etudiant.php" method="POST" class="form" role="form" enctype="multipart/form-data">
                 <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Nom et Prenom</td>
                        <td><input name="nom" class="form-control"  placeholder="Nom de l'etudiant" type="text" required></td>
                        <td><input name="prenom" class="form-control"  placeholder="Prenom de l'etudiant" type="text" required></td>
                      </tr>
                      <tr>
                        <td>CIN et N° Inscription</td>
                        <td><input class="form-control" name="cin" placeholder="Numero CIN" type="text" required></td>
                        <td><input class="form-control" name="num_insc" placeholder="Numero inscription" type="text" required></td>
                        
                      </tr>
                      <tr>
                        <td>Filiere et Année</td>
                        <td> 
                          <select name="filiere" class="form-control">
                            <?php
                              $requete_SQL2="SELECT * FROM filiere";
                  $resultat2=$connexion->prepare($requete_SQL2);
                  $resultat2->execute();
                  while($filiere = $resultat2->fetch()){
                              ?>
                                <option><?php echo $filiere['nom_filiere']; ?></option>
                <?php } ?>                                
                            </select>
                        </td>
                        <td>
                            <select name="niveau" class="form-control">
                                   <?php 
                                 for ($i=1; $i <=4 ; $i++) { 
                                  ?>
                                  <option <?php echo "value=".$i; ?> ><?php echo $i; ?></option>
                              <?php 
                                 }
                               ?>
                              </select>
                        </td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Date de naissance et Sêxe</td>
                        <td><select name="sexe" class="form-control"> 
                                <option value="1">Masculin</option>
                                <option value="0">Feminin</option>
                            </select></td>
                            <td>
                              <div data-date-format="dd-mm-yyyy" data-date="12-02-2012" id="dp3" class="input-append date">
                                <input  name="date_naissance"  type="text"  class="span2">
                                <span class="add-on"><span class="glyphicon glyphicon-calendar active-hand"></span></span>
                              </div>
                            </td>
                      </tr>
                      <tr>
                        <td>Photo</td>
                        <td>
                          <div class="input-group image-preview">
                                                  <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                                  <span class="input-group-btn">
                                                      <!-- image-preview-clear button -->
                                                      <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                          <span class="glyphicon glyphicon-remove"></span> Annuler
                                                      </button>
                                                      <!-- image-preview-input -->
                                                      <div class="btn btn-default image-preview-input">
                                                          <span class="glyphicon glyphicon-folder-open"></span>
                                                          <span class="image-preview-input-title">Choisir</span>
                                                          <input type="file" accept="image/png, image/jpeg, image/gif" name="photo"/> <!-- rename it -->
                                                      </div>
                                                  </span>
                                              </div>
                        </td>
                      </tr>
                        <tr>
                        <td>Adresse</td>
                        <td><input name="adresse" class="form-control"  placeholder="Adresse Etudiant" type="text" required></td>
                        <td><input name="adresse_parent" class="form-control"  placeholder="Adresse Parent" type="text" required></td>
                      </tr>
                      <tr>
                        <td>Parent</td>
                        <td><input name="nom_pere" class="form-control"  placeholder="Nom Père" type="text" required></td>
                        <td><input name="nom_mere" class="form-control"  placeholder="Nom Mère" type="text" required></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><input name="email" class="form-control"  placeholder="Email" type="email" required></td>
                      </tr>
                      <tr>
                        <td>Telephone</td>
                        <td><input name="tel" class="form-control"  placeholder="Tel étudiant" type="text" required></td><td><input name="tel_parent" class="form-control"  placeholder="Tel parent" type="text" required>
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  <input type="hidden" name="photo" value=<?php echo "" ?> />
                <span class="pull-right"><button class="btn btn-primary">Enregistrer <span class="glyphicon glyphicon-floppy-save"></span></button></span> 
                </div>
             
               </form>
                
              </div>
            </div>
                 <div class="panel-footer">
                 <div class="row"> 

                 </div>
                       
                    </div>
            
          </div>
        </div>
      </div>
      <!-- gap -->
        <div class="gap"></div>
      <!-- /gap -->
      <?php include_once '../template/footer.php'; ?>
    </div>
    <script src="/ist_anosy/bootstrap/js/jquery.min.js"></script>
    <script src="/ist_anosy/bootstrap/js/bootstrap.js"></script>
     <script src="/ist_anosy/js/date.js"></script>
     <script src="/ist_anosy/js/photo.js"></script>
</body>
</html>