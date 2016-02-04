<div class="container-fluid">
    
    <!-- Second navbar for sign in -->
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">IST | ANOSY</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-2">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Accueil</a></li> 
            <li><a href="../pages/admin.php"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Admin</a></li>
            <li><a href="A_propos.php">A propos</a></li>
            <li>
              <a class="btn btn-default btn-outline btn-circle collapsed"  data-toggle="collapse" href="#nav-collapse2" aria-expanded="false" aria-controls="nav-collapse2">Compte</a>
            </li>
          </ul>
          <div class="collapse nav navbar-nav nav-collapse slide-down" id="nav-collapse2">
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
          </div>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
</div><!-- /.container-fluid -->