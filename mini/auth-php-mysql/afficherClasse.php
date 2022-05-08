<?php
$id=1;
include("connexion.php");
  $req=$pdo->prepare("select nomClasse from enseigne where idEnseignant=?");
  $req->execute([$id]);
  $reponse=$req->fetchAll();
  if(count($reponse)>0){
    $outputs["nomClasse"]=array();
    foreach($reponse as $row){
        array_push($outputs["nomClasse"], $row['nomClasse']);
      }
    // success
    
    $outputs["success"] = 1;
     echo json_encode($outputs);

}else{
    $outputs["success"] = 0;
  $outputs["message"] = "Aucune classe";

  echo json_encode($outputs);
  
}

  
?>
