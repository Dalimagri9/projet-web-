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
    if (isset($_POST['modifier']))  {
    
    $req ="UPDATE classe SET nomc='$name1' WHERE classeid = '$code'";
    $reponse = $pdo->query($req);
    $msg= "La modification a été effectuée!";
    echo $msg;
    }
    else{ echo 'Erreur';
    }
    header('location:modifiergroupe.php');
    }
 ?>