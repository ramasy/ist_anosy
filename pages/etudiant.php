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
//echo "OK";
if(isset($_GET['id'])){
	$requete=$_GET['id'];
	$requete_SQL="SELECT * FROM etudiant WHERE id=".$_GET['id'];
	$resultat=$connexion->prepare($requete_SQL);
	$resultat->execute();
	$etudiant = $resultat->fetch();
	?>
	<div class="container">
      <div class="row">
        <div class="col-md-12" >
   	
   
          <div class="panel panel-default">
            <div class="panel-heading">
              <h1 class="panel-title">Fiche de l'etudiant</h1>
            </div>
            <div class="panel-body">
              <div class="row">

                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src=<?php echo "../img/".$etudiant['photo']; ?> class="img-responsive"> </div>
                
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
                 <form action="/ist_anosy/crud/update_etudiant.php" method="POST" class="form" role="form" enctype="multipart/form-data">
                 <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Nom et Prenom</td>
                        <td><input name="nom" class="form-control" value=<?php echo "'".$etudiant['nom']."'"; ?> placeholder="Nom de l'etudiant" type="text" required></td>
                        <td><input name="prenom" class="form-control" value=<?php echo "'".$etudiant['prenom']."'"; ?> placeholder="Prenom de l'etudiant" type="text" required></td>
                      </tr>
                      <tr>
                        <td>CIN et N° Inscription</td>
                        <td><input class="form-control" name="cin" value=<?php echo "'".$etudiant['cin']."'"; ?> placeholder="Numero CIN" type="text" required></td>
                        <td><input class="form-control" name="num_insc" value=<?php echo "'".$etudiant['num_insc']."'"; ?> placeholder="Numero inscription" type="text" required></td>
                        
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
                                <option  <?php if($filiere['id']==$etudiant['filiere']){ echo "value=\"".$filiere['id']."\" selected";}else{echo "value=\"".$filiere['id']."\"";}  ?>><?php echo $filiere['nom_filiere']; ?></option>
                <?php } ?>                                
                            </select>
                        </td>
                        <td><select name="niveau" class="form-control">
                            <?php 
                               for ($i=1; $i <=4 ; $i++) { 
                                $etat="";
                                if ($i==$etudiant['niveau']) {
                                  # code...
                                  $etat="selected";
                                }
                                ?>
                                
                                <option <?php echo "value=".$i." ".$etat ?> ><?php echo $i; ?></option>
                            <?php 
                               }
                             ?>
                                
                                                
                            </select></td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Date de naissance et Sêxe</td>
                        <td><select name="sexe" class="form-control">
                            <?php 
                              if ($etudiant['sexe']==1) {
                               
                             ?>
                                <option value="1" selected>Masculin</option>
                                <option value="0">Feminin</option>
                                <?php  
                                 }
                                 else{
                                ?>
                                <option value="1">Masculin</option>
                                <option value="0" selected>Feminin</option>
                                 <?php  
                                    }
                                 ?>

                            </select></td>
                            <td>
                              <div data-date-format="dd-mm-yyyy" data-date="12-02-2012" id="dp3" class="input-append date">
                                <input  name="date_naissance"  type="text" value=<?php echo date('d-m-Y',strtotime($etudiant['date_naissance'])); ?> class="span2">
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
                        <td><input name="adresse" class="form-control" value=<?php echo "'".$etudiant['adresse']."'"; ?> placeholder="Adresse Etudiant" type="text" required></td>
                        <td><input name="adresse_parent" class="form-control" value=<?php echo "'".$etudiant['adresse_parent']."'"; ?> placeholder="Adresse Parent" type="text" required></td>
                      </tr>
                      <tr>
                        <td>Parent</td>
                        <td><input name="nom_pere" class="form-control" value=<?php echo "'".$etudiant['nom_pere']."'"; ?> placeholder="Nom Père" type="text" required></td>
                        <td><input name="nom_mere" class="form-control" value=<?php echo "'".$etudiant['nom_mere']."'"; ?> placeholder="Nom Mère" type="text" required></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><input name="email" class="form-control" value=<?php echo $etudiant['email']; ?> placeholder="Email" type="email" required></td>
                      </tr>
                      <tr>
                        <td>Telephone</td>
                        <td><input name="tel" class="form-control" value=<?php echo $etudiant['tel']; ?> placeholder="Tel etudiant" type="text" required></td><td><input name="tel_parent" class="form-control" value=<?php echo $etudiant['tel_parent']; ?> placeholder="Tel Parent" type="text" required>
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Etat Payement Ecolage</a>
                  <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#myModal2">Etat Abscence</a>
                  <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#myModal3">Etat Penalité</a>
                  <input type="hidden" name="etudiant_id" value=<?php echo $etudiant['id']; ?> />
                  <input type="hidden" name="photo" value=<?php echo $etudiant['photo']; ?> />
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
    <?php } ?>
    <script src="/ist_anosy/bootstrap/js/jquery.min.js"></script>
    <script src="/ist_anosy/bootstrap/js/bootstrap.js"></script>
     <script src="/ist_anosy/js/date.js"></script>
     <script src="/ist_anosy/js/photo.js"></script>
    <!-- modal -->
    <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="centerize"> <i class="glyphicon glyphicon-calendar"></i>  Gerer payement écolage</h4>
                  </div>
                  <div class="modal-body well ">
                      <div class="row">
        <div class="col-md-12">
           
            <div class="row">
                <div class="text-center">
                    <h3>Reçu</h3>
                </div>
               
                <table class="table table-hover">
                    
                    <tbody>
                         <tr>
                            <th>Nom de l'administrateur</th>
                           
                            <th class="text-center">Montant(Ar)</th>
                            <th class="text-center">date</th>
                            <th class="text-center">operation</th>
                        </tr>
                         <?php 
                                $requete_payement="SELECT * FROM payement WHERE etudiant_id=".$etudiant['id']." AND annee=0";
                                $resultat_requete_payment=$connexion->prepare($requete_payement);
                                $resultat_requete_payment->execute();
                                $totale_payement=0;

                                while ($payement=$resultat_requete_payment->fetch()) {
                                 $totale_payement+=$payement['montant'];
                                  
                                  
                             ?>
                        <tr>
                            <td class="col-md-9"><em><?php echo $payement['administrateur']; ?></em></td>
                            <td class="col-md-1 text-center"><?php echo $payement['montant']; ?></td>
                            <td class="col-md-1 text-center"><?php echo date('d-m-Y',strtotime($payement['date'])); ?></td>
                            <td class="col-md-1 text-center"> <span class="glyphicon glyphicon-trash active-hand" data-toggle="modal" data-target=<?php echo "\"#confirmation".$payement['id']."\""; ?>></span></td>
                        </tr>
                        <!-- modalConfirm -->
                        <div class="modal"  role="dialog" id=<?php echo "\"confirmation".$payement['id']."\""; ?>>
                            <div class="modal-dialog">
                            
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <strong> <span class="glyphicon glyphicon-alert"></span> Confirmation</strong>
                                </div>
                                <div class="modal-body">
                                  <p> Supprimer le payement de <?php echo $payement['montant']."Ar du date ".date('d-m-Y',strtotime($payement['date'])) ; ?>?</p>
                                  <button class="btn btn-succes">Annuler</button> <a class="text-noir" href=<?php echo "\"../crud/delete_payement.php?id=".$payement['id']."&eid=".$etudiant['id']."\""; ?>><button class="btn btn-danger">Supprimer </button></a>
                                </div>
                              
                            </div>
                          </div>
                        </div>

                     <!-- /modalConfirm -->
                     <?php

                      } ?>
                       
                    </tbody>
                </table>
                 <div class="row totale-payement">
                         <?php 
                                $requete_ecolage="SELECT * FROM ecolage WHERE niveau=".$etudiant['niveau'];
                                $resultat_requete_ecolage=$connexion->prepare($requete_ecolage);
                                $resultat_requete_ecolage->execute();
                                $ecolage=$resultat_requete_ecolage->fetch();   

                             ?>
                      <div class="col-md-offset-6 col-md-6">
                         <p><strong>Totale payement: <?php echo $totale_payement."Ar"; ?></strong></p>
                        <p><strong>Ecolage: <?php echo $ecolage['montant']."Ar"; ?></strong></p>
                        <p><strong>Reste à payer: <?php echo ($ecolage['montant']-$totale_payement)."Ar"; ?></strong></p>
                      </div>
                       
                      </div>
                
            </div>
        </div>
                  </div>
                  <hr>
                   <div class="modal-body">
                    <button type="button" class="btn btn-primary btn-sm btn-block" onclick="$('#target').toggle();">
                    Ajouter payement   <span class=" glyphicon glyphicon-plus-sign"></span>
                   </button>
                   
                  <div id="target" style="display: none">
                    <div class="row">
                     <div class="col-md-12">
                      <form action="../crud/add_payement.php" method="POST">
                        <input class="form-control deca-haut" name="montant" placeholder="Montant(Ar)" type="text" required>
                         <input type="hidden" name="administrateur" value="Clara" />
                         <input type="hidden" name="etudiant_id" value=<?php echo $etudiant['id']; ?> />
                        <input type="submit" class="btn btn-default btn-block btn-sm deca-haut" value="Enregistrer payement" />
                      </form>
                    </div> 
                    
                    </div>
                  </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>

    <!-- /modal -->
     <!-- modal2 -->
    <div class="modal fade" id="myModal2" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="centerize"> <i class="glyphicon glyphicon-info-sign"></i>  Gerer abscence</h4>
                  </div>
                  <div class="modal-body well ">
                      <div class="row">
        <div class="col-md-12">
           
            <div class="row">
                <div class="text-center">
                    <h3>Nombre d'abscence</h3>
                </div>
               
                <table class="table table-hover">
                    
                    <tbody>
                      <tr>
                            <th>Motif</th>
                           
                            <th class="text-center">Nombre de jours</th>
                            <th class="text-center">date</th>
                            <th class="text-center">operation</th>
                        </tr>
                         <?php 
                                $requete_abscence="SELECT * FROM abscence WHERE etudiant_id=".$etudiant['id']." AND annee=0";
                                $resultat_requete_payment=$connexion->prepare($requete_abscence);
                                $resultat_requete_payment->execute();
                               $i=0;
                               $totale_abcsence=0;
                                while ($abscence=$resultat_requete_payment->fetch()) {
                                  $i++;
                               $totale_abcsence+=$abscence['nombre_jour'];
                             ?>
                        <tr>
                            <td class="col-md-6"><em><?php echo $abscence['motif']; ?></em></td>
                            <td class="col-md-3 text-center"><?php echo $abscence['nombre_jour']; ?></td>
                            <td class="col-md-2 text-center"><?php echo date('d-m-Y',strtotime($abscence['date'])); ?></td>
                            <td class="col-md-1 text-center"> <span class="glyphicon glyphicon-trash active-hand" data-toggle="modal" data-target=<?php echo "\"#confirmation2".$abscence['id']."\""; ?>></span></td>
                        </tr>
                        <!-- modalConfirm -->
                        <div class="modal" id=<?php echo "\"confirmation2".$abscence['id']."\""; ?> role="dialog">
                            <div class="modal-dialog">
                            
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <strong> <span class="glyphicon glyphicon-alert"></span> Confirmation</strong>
                                </div>
                                <div class="modal-body">
                                  <p> Supprimer l'abscence du date  <?php echo date('d-m-Y',strtotime($abscence['date'])) ; ?>?</p>
                                  <button class="btn btn-succes">Annuler</button> <a class="text-noir" href=<?php echo "../crud/delete_abscence.php?id=".$abscence['id']."&eid=".$etudiant['id']; ?>><button class="btn btn-danger">Supprimer </button></a>
                                </div>
                              
                            </div>
                          </div>
                        </div>

                     <!-- /modalConfirm -->
                     <?php } ?>
                           
                    </tbody>
                </table>
                <div class="row totale-payement">
                        
                      <div class="col-md-offset-6 col-md-6">
                         <p><strong>Nombre d'abscence: <?php echo $i; ?></strong></p>
                        <p><strong>Totale nombre de jour d'abscence: <?php echo $totale_abcsence; ?></strong></p>
                      </div>
                       
                      </div>
              
                
            </div>
        </div>
                  </div>
                  <hr>
                   <div class="modal-body">
                       <button type="button" class="btn btn-primary btn-sm btn-block" onclick="$('#target2').toggle();">Ajouter Abcence <span class=" glyphicon glyphicon-plus-sign"></span>
                   </button>
                   
                  <div id="target2" style="display: none">
                    <div class="row">
                     <div class="col-md-12">
                      <form action="../crud/add_abscence.php" method="POST">
                        <input class="form-control deca-haut" name="motif" placeholder="Motif d'abscence" type="text" required>
                        <input class="form-control deca-haut" name="nombre_jour" placeholder="Nombre de jours" type="text" required>
                         <input type="hidden" name="administrateur" value="Clara clara" />
                         <input type="hidden" name="etudiant_id" value=<?php echo $etudiant['id']; ?> />
                        <input type="submit" class="deca-haut btn btn-default btn-block btn-sm" value="Enregistrer abscence" />
                      </form>
                    </div> 
                    
                    </div>
                  </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>

    <!-- /modal2 -->
     <!-- modal3 -->
      <div class="modal fade" id="myModal3" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="centerize"> <i class="glyphicon glyphicon-info-sign"></i>  Gerer penalité</h4>
                  </div>
                  <div class="modal-body well ">
                      <div class="row">
        <div class="col-md-12">
           
            <div class="row">
                <div class="text-center">
                    <h3>Nombre de penalité</h3>
                </div>
               
                <table class="table table-hover">
                    
                    <tbody>
                      <tr>
                            <th>Motif</th>
                            <th class="text-center">date</th>
                            <th class="text-center">operation</th>
                        </tr>
                         <?php 
                                $requete_penalite="SELECT * FROM penalite WHERE etudiant_id=".$etudiant['id']." AND annee=0";
                                $resultat_requete_penalite=$connexion->prepare($requete_penalite);
                                $resultat_requete_penalite->execute();
                               $j=0;
                              
                                while ($penalite=$resultat_requete_penalite->fetch()) {
                                  $j++;
                              
                             ?>
                        <tr>
                            <td class="col-md-8"><em><?php echo $penalite['motif']; ?></em></td>
                           
                            <td class="col-md-3 text-center"><?php echo date('d-m-Y',strtotime($penalite['date'])); ?></td>
                            <td class="col-md-1 text-center"> <span class="glyphicon glyphicon-trash active-hand" data-toggle="modal" data-target=<?php echo "\"#confirmation3".$penalite['id']."\""; ?>></span></td>
                        </tr>
                        <!-- modalConfirm -->
                        <div class="modal" id=<?php echo "\"confirmation3".$penalite['id']."\""; ?> role="dialog">
                            <div class="modal-dialog">
                            
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <strong> <span class="glyphicon glyphicon-alert"></span> Confirmation</strong>
                                </div>
                                <div class="modal-body">
                                  <p> Supprimer la penalité du date  <?php echo date('d-m-Y',strtotime($penalite['date'])) ; ?>?</p>
                                  <button class="btn btn-succes">Annuler</button> <a class="text-noir" href=<?php echo "../crud/delete_penalite.php?id=".$penalite['id']."&eid=".$etudiant['id']; ?>><button class="btn btn-danger">Supprimer </button></a>
                                </div>
                              
                            </div>
                          </div>
                        </div>

                     <!-- /modalConfirm -->
                     <?php } ?>
                           
                    </tbody>
                </table>
                <div class="row totale-payement">
                        
                      <div class="col-md-offset-6 col-md-6">
                         <p><strong>Nombre de penalité: <?php echo $j; ?></strong></p>
                      
                      </div>
                       
                      </div>
              
                
            </div>
        </div>
                  </div>
                  <hr>
                   <div class="modal-body">
                       <button type="button" class="btn btn-primary btn-sm btn-block" onclick="$('#target3').toggle();">Ajouter Abcence <span class=" glyphicon glyphicon-plus-sign"></span>
                   </button>
                   
                  <div id="target3" style="display: none">
                    <div class="row">
                     <div class="col-md-12">
                      <form action="../crud/add_penalite.php" method="POST">
                        <input class="form-control deca-haut" name="motif" placeholder="Motif de la penalité" type="text" required>
                         <input type="hidden" name="administrateur" value="Clara clara" />
                         <input type="hidden" name="etudiant_id" value=<?php echo $etudiant['id']; ?> />
                        <input type="submit" class="deca-haut btn btn-default btn-block btn-sm" value="Enregistrer penalité" />
                      </form>
                    </div> 
                    
                    </div>
                  </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>

    <!-- /modal3 -->
</body>
</html>