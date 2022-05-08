<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
include('connexion.php');

}
 ?>
<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Modifier l'Etudiant: </title>
        <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="../assets/dist/js/jquery.min.js"></script>
        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
            <link href="../assets/dist/css/jumbotron.css" rel="stylesheet">
        
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
                      <h1 class="display-4">Modifier Groupe</h1>
                      <p>Remplir le formulaire ci-dessous afin de modifier l etudiant!</p>
                    </div>
                  </div> 
                  <div class="container">
                    <form id="myForm" method="POST" action="modifieretud.php">
                    
                        <div class="form-group">
                        <label for="cin">CIN de l etudiant</label><br>
                        <input type="text" id="id" name="id"  class="form-control" />
                       </div>
                        <div class="form-group">
                       
                        
                       <div class="form-group">
                        <label for="nom">Nouveaux nom</label><br>
                        <input type="text" id="nname" name="nom1" class="form-control" >
                       </div>
                       
                       <div class="form-group">
                        <label for="nom">Nouveau prenom:</label><br>
                        <input type="text" id="prenom" name="prenom" class="form-control" >
                       </div>
                       <div class="form-group">
                        <label for="nom">Nouveaux adresse</label><br>
                        <input type="text" id="nname" name="adr" class="form-control" >
                       </div>
                       <div class="form-group">
                        <label for="nom">Nouveau mot de pasee:</label><br>
                        <input type="password" id="nname" name="pass" class="form-control" >
                       </div>
                       <button name='modifier' type="submit" class="btn btn-primary btn-block" onclick="modifier()">Enregistrer</button>
                    </form> 
                    <div id="demo"></div>
                   </div> 
                   </main>
                   </div> 

                   
           
     </form>
     <script>
      function modifier()
    {
        var xmlhttp = new XMLHttpRequest();
        var url="http://localhost/mini/auth-php-mysql/modifierGroupe.php";
        
        //Envoie Req
        xmlhttp.open("POST",url,true);

        form=document.getElementById("myForm");
        formdata=new FormData(form);

        xmlhttp.send(formdata);        
    }
    </script>
    </body>
    </html>