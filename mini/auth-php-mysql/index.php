<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   if(date("H")<18)
      $bienvenue="Bonjour et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
   else
      $bienvenue="Bonsoir et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Walid SAAD">
    <meta name="generator" content="Hugo 0.88.1">
    <title>SCO-ENICAR</title>
    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="../assets/dist/js/jquery.min.js"></script>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="../assets/jumbotron.css" rel="stylesheet">
    <style>
      .jumbotron {
  background-image: url("https://th.bing.com/th/id/R.e64c8438e1f4e5cb011bad1169ad254c?rik=Y%2fft8JSB0d%2bTCw&riu=http%3a%2f%2fwww.cg975.fr%2fblog%2fwp-content%2fuploads%2f2019%2f08%2fetudiant.jpg&ehk=hQcrWR6mJdl055opVJn1n1%2b98dY%2f%2bALM07u%2bD77E1qc%3d&risl=&pid=ImgRaw&r=0");
  background-size: cover;}
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

  </head>
   <body onLoad="document.fo.login.focus()">
   <nav class="navbar navbar-light bg-light">
   <a class="navbar-brand" href="index.php">
    <img src="https://th.bing.com/th/id/R.dfdf7ca17bb48574f8712f25c1c34a73?rik=T4Xz0SaTmiTU0w&riu=http%3a%2f%2fwww.tunisienumerique.com%2fwp-content%2fuploads%2f2016%2f11%2fLogo_ENICarthage.jpg&ehk=IL76tv2grJe59RbexglEw0RZq1NvQ74iDbzsebdMGPY%3d&risl=&pid=ImgRaw&r=0" alt="Logo" style="width: 60px;px;">
  </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
        
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="index.php" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Groupes</a>              <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="afficherEtudiants.php">Lister tous les étudiants</a>
             <a class="dropdown-item" href="afficherEtudiantsParClasse.php">Etudiants par Groupe</a>
              <a class="dropdown-item" href="AjouterGroupe.php">Ajouter Groupe</a>
              <a class="dropdown-item" href="modifierGroupe.php">Modifier Groupe</a>
             <a class="dropdown-item" href="supprimerGroupe.php">Supprimer Groupe</a>
      
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Etudiants</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="ajouterEtudiant.php">Ajouter Etudiant</a>
                <a class="dropdown-item" href="chercherEtudiant.php">Chercher Etudiant</a>
                <a class="dropdown-item" href="modifieretudiant.php">Modifier Etudiant</a>
                <a class="dropdown-item" href="supprimeretudiant.php">Supprimer Etudiant</a>
      
      
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Absences</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="saisirAbsence.php">Saisir Absence</a>
                <a class="dropdown-item" href="etatAbsence.php">État des absences pour un groupe</a>
              </div>
            </li>
      
            <li class="nav-item active">
              <a class="nav-link" href="deconnexion.php">Se Déconnecter <span class="sr-only">(current)</span></a>
            </li>
      
          </ul>
        
      
         
          </form>
        </div>
      </nav>    
  <main role="main">

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
  <div class="container"style="height: 450px;">
    <h1 class="display-3"><?php echo $bienvenue?></h1>
    <p></p>
    <p><a class="btn btn-outline-success" href="afficherEtudiantsParClasse.php" role="button">Mes Groupes &raquo;</a></p>
  </div>
</div>

<div class="container">
  <!-- Example row of columns -->
  <div class="row">
    <div class="col-md-4">
      <h2>Gestion de groupe</h2><br>
      <p>Ajouter et supprimer groupe,aussi voir les etudiant de chaque groupe et modifier le nom de groupe</p>
      <p><a class="btn btn-outline-info" href="AjouterGroupe.php" role="button">Voir les Groupes &raquo;</a></p>
    </div>
    <div class="col-md-4">
      <h2>Gestion d'etudiant</h2><br>
      <p>Ajouter et supprimer des etudiants,aussi modifier le nom ,le prenom,le email et le mot de passe de letudiant</p>

      <p><a class="btn btn-outline-info" href="AjouterEtudiant.php" role="button">Voir les Groupes &raquo;</a></p>
    </div>
    <div class="col-md-4">
      <h2>Gestion d'absence</h2><br>
      <p><a class="btn btn-outline-info" href="saisirAbsence.php" role="button">Voir les Groupes &raquo;</a></p>
    </div>
  </div>

  <hr>

</div> <!-- /container -->

</main>

   </body>
</html>