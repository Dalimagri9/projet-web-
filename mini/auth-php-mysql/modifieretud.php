<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
 else {
     include ("connexion.php");
     @$code = $_POST['id'];
    $name = $_POST['nom'];
    $name1 = $_POST['nom1'];
    $prenom=$_POST['prenom'];
    $pass=$_POST['pass'];
    $adr=$_POST['adr'];
    if (isset($_POST['modifier']))  {
    
    $req1="UPDATE etudiant SET nom='$name1' WHERE cin = '$code'";
    $reponse = $pdo->query($req1);
    $req2="UPDATE etudiant SET prenom='$prenom' WHERE cin = '$code'";
    $reponse = $pdo->query($req2);
    $req3="UPDATE etudiant SET  password='$pass' WHERE cin = '$code'";
    $reponse = $pdo->query($req3);
    $req4="UPDATE etudiant SET adresse='$adr' WHERE cin = '$code'";
    $reponse = $pdo->query($req4);
    $msg= "La modification a été effectuée!";
    echo $msg;
    }
    else{ echo 'Erreur';
    }
    header('location:modifiergroupe.php');
    }
 ?>