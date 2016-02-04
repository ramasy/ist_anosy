<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
    <meta name="Description" content="Application web de gestion des etudiants de l'université IST Anosy">  
    <meta name="Auteur" content="RAMASY Heritier Arantes">
    <meta name="Contact" content="0344848963">
		<title>IST | Anosy</title>
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
		 <link href="css/ist_anosy.css" rel="stylesheet">
     <link href="css/template.css" rel="stylesheet">
     <link rel="icon" href="ist_anosy.png">
		 <script src="bootstrap/js/jquery.min.js"></script>
		 <script src="bootstrap/js/bootstrap.js"></script>
		 <script src="js/main.js"></script>
	</head>
	<body>
	  <div class="container-fluid">
    
    <!-- Second navbar for sign in -->
    <nav class="navbar navbar-default ">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php if(isset($_SESSION['pseudo'])){
              echo $_SESSION['pseudo'];
            }else{
              echo "IST | ANOSY";
              }  ?></a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-2">
          <ul class="nav navbar-nav navbar-right">
             <li><a href="/ist_anosy"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Accueil</a></li> 
            <li><a href="/ist_anosy/pages/admin.php"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Admin</a></li>
            <li><a href="/ist_anosy/pages/A_propos.php">A propos</a></li>
            <li>
              <?php if(isset($_SESSION['utilisateur'])){
                ?>
                 <a class="btn btn-danger btn-outline btn-circle collapsed"  data-toggle="collapse" href="#" aria-expanded="false" aria-controls="nav-collapse2">Deconnexion</a>
                <?php
                }
                else{
                 ?>
                 <a class="btn btn-default btn-outline btn-circle collapsed"  data-toggle="collapse" href="#nav-collapse2" aria-expanded="false" aria-controls="nav-collapse2">Compte</a>

                <?php 
                }?>
             
            
            </li>
          </ul>
          <div class="collapse nav navbar-nav nav-collapse slide-down" id="nav-collapse2">
          <?php 
            if(!(isset($_SESSION['utilisateur']))){
          ?>
             <form action="crud/login.php" method="POST" class="navbar-form navbar-right form-inline" role="form">
              <div class="form-group">
                <label class="sr-only" for="nom">Nom</label>
                <input type="email" name="nom" class="form-control" id="nom" placeholder="Nom" autofocus required />
              </div>
              <div class="form-group">
                <label class="sr-only" for="Password">Mot de passe</label>
                <input type="password" name="password" class="form-control" id="Password" placeholder="Mot de passe" required />
              </div>
              <button type="submit" class="btn btn-primary">Connexion</button>

            </form>

          <?php 
            }else{
          ?>
          <form action="crud/login.php" method="POST" class="navbar-form navbar-right form-inline logout" role="form">
              <button type="submit" class="btn btn-danger">Deconnexion</button>
            </form>
          <?php
            }
          ?>
           
          </div>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
</div><!-- /.container-fluid -->
		<div class="container">
		   <div class="row">
		        <div class="col-md-1"></div>
		        <div class="col-md-10 recherche">
		        	<div id="custom-search-input">
               			<div class="input-group col-md-12">
                    		<input id="recherche" type="text" class="form-control input-lg" placeholder="Rechercher..." />
                    			<span class="input-group-btn">
                      			  <button class="btn btn-info btn-lg" type="button">
                           			 <i class="glyphicon glyphicon-search"></i>
                       			 </button>
                  			  	</span>
               			</div>
           		 	</div>
		        </div>
		        <div class="col-md-1"></div> 
		   </div>
        <div class="row">
           <div class="col-md-1"></div> 
           <div class="col-md-10">
             <div id="resultat" class="row "></div>
           </div>
            <div class="col-md-1"></div> 
       </div>
		  
	    </div>


    <script type="text/javascript">
    $("#creer_compte").click(function(){
      window.location.href = "http://localhost/ist_anosy/template/inscription.php";
    });
    </script>
    <!-- gap -->
        <div class="gap"></div>
      <!-- /gap -->
      <?php include_once 'template/footer.php'; ?>
  
	</body>
</html>