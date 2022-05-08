<?php
$id=1;
include("connexion.php");
  $req=$pdo->prepare("select nomMatiere from enseigne where idEnseignant=?");
  $req->execute([$id]);
  $reponse=$req->fetchAll();
  if(count($reponse)>0){
    $outputs["nomMatiere"]=array();
    foreach($reponse as $row){
        array_push($outputs["nomMatiere"], $row['nomMatiere']);
      }
    // success
    
    $outputs["success"] = 1;
     echo json_encode($outputs);

}else{
    $outputs["success"] = 0;
  $outputs["message"] = "Aucune matiere";

  echo json_encode($outputs);
  
}

  
?>
