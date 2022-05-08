<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   else  {
        include("connexion.php");
        /*$sql = 'DELETE FROM etudiant WHERE cin=:num';
        $reponse= $pdo->prepare($sql);
        $reponse->bindValue('num', $_GET['supp']);
        $res=$reponse->execute();*/
      @$id=$_POST['nom'];
      
      $req4 = "delete from classe where nomc = '$id'";
        //alert($id);
        $reponse = $pdo->query($req4);
        header("location:afficherEtudiantsParClasse.php");
 }
?>