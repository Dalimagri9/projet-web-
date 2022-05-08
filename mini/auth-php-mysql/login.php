<?php
   session_start();
   @$login=$_POST["login"];
   @$pass=md5($_POST["pass"]);
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){
      include("connexion.php");
      $sel=$pdo->prepare("select * from enseignant where login=? and pass=? limit 1");
      $sel->execute(array($login,$pass));
      $tab=$sel->fetchAll();
      if(count($tab)>0){
         $_SESSION["prenomNom"]=ucfirst(strtolower($tab[0]["prenom"])).
         " ".strtoupper($tab[0]["nom"]);
         $_SESSION["autoriser"]="oui";
         header("location:index.php");
      }
      else
         $erreur="Mauvais login ou mot de passe!";
   }
?>
<!DOCTYPE html>
<html>
   <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>SCO-ENICAR Se Connecter</title>

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    fieldset{ position:absolute;
  left: 80px;
  top: 22px;
  
       border-end-end-radius: 9px;border-end-start-radius: 9px;border-top-left-radius: 9px;border-start-start-radius: 9px;border-top-right-radius: 9px;}
        body{background-image: url('https://th.bing.com/th/id/R.f88884e193156e0cf0cf5746c3e39a58?rik=GtnBYmrumEakFw&pid=ImgRaw&r=0') ;
            background-size: 100% 100%;
            background-attachment: fixed;
            background-repeat: no-repeat;
            }
            ::placeholder{color: rgb(247, 247, 247);
            opacity: 0.5;}
            input[type="submit"]:hover {
  background-color: gold;
  
}
input[type="reset"]:hover {
  background-color: gold;
  
}
input[type="reset"] {
  color: black;
 
  
}
input{color: rgb(23, 189, 106);}
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
    <link href="../assets/dist/css/signin.css" rel="stylesheet">

   </head>
   <body class="text-center" onLoad="document.fo.login.focus()">
      <div class="erreur"><?php echo $erreur ?></div>
    



<center>
<fieldset style="width: 60%;height: 72ch;border-color: black;margin: 13ch;border-width: 0ch;background-color: black;background-color:opa ;opacity: 0.5;">
   <form class="form-signin" name="fo"  method="post" action=""> <center><br>
    <img src="../assets/brand/user-login.svg" alt="" style=" width: 20%; border-width: 2ch;">
    </center><br><br>
   
    
        <img src="images.png" alt="" style="border-radius: 100%;width: 3%;"align=left  ><br>
        
        <input type="text" id="user name"name="login" placeholder="User name" style="width: 80%;border-width: 0ch;outline: 0ch;background-color: transparent;"required><br>
        <hr width="80%"><br>
        <img src="1200px-OOjs_UI_icon_lock.svg.png" alt="" style="width: 3%;border-radius: 100%;"align=left><br>

        <input type="password" id="password" placeholder="password" name="pass" style="width: 80%;border-width: 0ch;outline: 0ch;background-color: transparent;"raquired><br><hr width="80%"><br><br><br>
        <input  class="btn btn-lg btn-primary btn-block"  type="submit" name="valider" value="S'authentifier" />
         <br><a href="inscription.php"> Créer un Compte</a>
          <p class="mt-5 mb-3 text-muted">&copy; SOC-Enicar 2021-2022</p>
        <br><br><br>
   </center>    
       
        

    </form> </fieldset>









 
      </form>
   </body>
</html>