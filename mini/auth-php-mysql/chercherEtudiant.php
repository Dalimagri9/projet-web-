<?php
require_once("connexion.php");
session_start();
if ($_SESSION["autoriser"] != "oui") {
  header("location:login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Ajouter Etudiant</title>
    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="../assets/dist/js/jquery.min.js"></script>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="../assets/dist/css/jumbotron.css" rel="stylesheet">
</head>

<body>
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
              <a class="dropdown-item" href="afficherEtudiants.php">Lister tous les ??tudiants</a>
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
                <a class="dropdown-item" href="etatAbsence.php">??tat des absences pour un groupe</a>
              </div>
            </li>
      
            <li class="nav-item active">
              <a class="nav-link" href="deconnexion.php">Se D??connecter <span class="sr-only">(current)</span></a>
            </li>
      
          </ul>
        
      
          
          </form>
        </div>
      </nav>  


  <main role="main">
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-4">Chercher des ??tudiants</h1>
        <p>Cliquer sur le bouton afin d'actualiser la liste!</p>
        <form class="page-header-signup mb-2 mb-md-0" action="chercherEtudiant.php" method="POST">
          <div class="form-row justify-content-center">
            <div class="col-lg-6 col-md-8">
              <div class="form-group mr-0 mr-lg-2">
                <input name="search-keyword" class="form-control form-control-solid rounded-pill" type="text" placeholder="Search Etudiant..." />
              </div>
            </div>
            <div class="col-lg-3 col-md-4">
              <button class="btn btn-primary btn-block btn-marketing rounded-pill" type="submit" name="search">Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <!--Ligne Entete-->

            <tr>
              <th>
                CIN
              </th>
              <th>
                Nom
              </th>
              <th>
                Pr??nom
              </th>
              <th>
                Email
              </th>
              <th>
                Classe
              </th>
            </tr>
            <!--1er Etudiant-->
            <?php

            if (isset($_POST['search'])) {
              $key = trim($_POST['search-keyword']);
              $sql = "SELECT * from etudiant where nom =:nom ";
              $stmt = $pdo->prepare($sql);
              $stmt->execute([
                ':nom' => $key,
              ]);
              while ($etudiants = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $cin = $etudiants['cin'];
                $nom = $etudiants['nom'];
                $prenom = $etudiants['prenom'];
                $email = $etudiants['email'];
                $classe = $etudiants['Classe'];
            ?>
                <tr>
                  <td>
                    <?php echo $cin ?>
                  </td>
                  <td>
                    <?php echo $nom ?>
                  </td>
                  <td>
                    <?php echo $prenom ?>
                  </td>
                  <td>
                    <?php echo $email ?>
                  </td>
                  <td>
                    <?php echo $classe ?>
                  </td>
                </tr>

            <?php
              }
            }
            ?>
          </table>
          <br>
        </div>
        <button type="button" onload="refresh()" class="btn btn-primary btn-block active">Actualiser</button>
      </div>
    </div>

  </main>


  
</body>

</html>