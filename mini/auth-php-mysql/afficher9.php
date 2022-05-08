<?php

session_start();
if($_SESSION["autoriser"]!="oui"){
    header("location:login.php");
	exit();
}
else {  
    include("connexion.php");
    $grp = $_POST['groupe'];

$req="SELECT * FROM etudiant WHERE Classeid LIKE '$grp'";
$reponse = $pdo->query($req);
if($reponse->rowCount()>0) {
	$outputs["etudiants"]=array();
while ($row = $reponse ->fetch(PDO::FETCH_ASSOC)) {
        $etudiant = array();
        $etudiant["cin"] = $row["cin"];
        $etudiant["nom"] = $row["nom"];
        $etudiant["prenom"] = $row["prenom"];
        $etudiant["adresse"] = $row["adresse"];
        $etudiant["email"] = $row["email"];
        $etudiant["classe"] = $row["Classe"];
         array_push($outputs["etudiants"], $etudiant);
    }
    // success
    $outputs["success"] = 1;
     echo json_encode($outputs);
} else {
    $outputs["success"] = 0;
    $outputs["message"] = "Pas d'étudiants";
    // echo no users JSON
    echo json_encode($outputs);
}
$sel2= $pdo->prepare("select nomc from classe where classeid = '$grp' ");
         $sel2->execute();
         $tab2 = $sel2->fetchAll();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Etudiants Par CLasse</title>
    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="../assets/dist/js/jquery.min.js"></script>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="../assets/jumbotron.css" rel="stylesheet">

    </head>
<body onload="refresh()">
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
        <div class="jumbotron">
            <div class="container">
              <h1 class="display-4">Afficher la liste d'étudiants par groupe</h1>
              <p>Cliquer sur la liste afin de choisir une classe!</p>
            </div>
          </div>

<div class="container">


<form method="POST" action="afficherparclasse.php">
<div class="form-group">
<label for="classe">Choisir une classe:</label><br>
<!--
<input list="classe">
<datalist id="classe" name="classe">
    <option value="1-INFOA">1-INFOA</option>
    <option value="1-INFOB">1-INFOB</option>
    <option value="1-INFOC">1-INFOC</option>
    <option value="1-INFOD">1-INFOD</option>
    <option value="1-INFOE">1-INFOE</option>
</datalist>
-->
<select name="groupe" class="custom-select custom-select-sm custom-select-lg">
       <?php $sel2=$pdo->prepare("select * from classe");
       $sel2->execute();
       $tab2 =$sel2->fetchAll();
       foreach ($tab2 as $c) {?>
    <option value="<?= $c['classeid'] ?>"> <?= $c['nomc']?> </option> <?php } ?>
      
</select>
</div>
<div class="container">
<div class="row">
<div class="table-responsive"> 
  
 <table id="demo"class="table table-striped table-hover">
 </table>
 <br>
 </div>
 <button  type="submit" class="btn btn-primary btn-block active" >Actualiser</button>
</div>
</div>



</form>
</div> 
</main>

<div class="container">
<div class="row">
  <h2> les étudiants de <?php
  $n = @$tab2[$grp-1]['nomc'];
  echo $n ?> sont: </h2>
<div class="table-responsive"> 
<table id="demo"class="table table-striped table-hover">
    
<tr><th> CIN</th><th>Nom</th><th>Prénom</th><th>Email</th>
<?php if (@$outputs["etudiants"] != NULL) {

foreach($outputs["etudiants"] as $arr) { ?>
<tr><td>
			<?php echo $arr['cin'] ?> 
			</td><td>
			<?php echo $arr['nom'] ?>
			</td><td>
            <?php echo $arr['prenom'] ?>
		</td><td>
        <?php echo $arr['email'] ?>

			</td>
	</tr>
            <?php }}     ?>
</table>
</div>
</div>
</div>

<footer class="container">
  <p style="text-align:center">&copy; ENICAR 2021-2022</p>
</footer>
</body>
</html>