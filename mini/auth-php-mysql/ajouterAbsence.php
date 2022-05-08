<?php 
$classe=$_REQUEST['classe'];
$matiere=$_REQUEST['matiere'];
$semaine=$_REQUEST['debut'];
include("connexion.php");
$sel=$pdo->prepare("select cin from etudiant where Classe=?");
$sel->execute(array($classe));
$tab=$sel->fetchAll();
$nbrEtudiants=count($tab);
$nbrCheckboxes=$nbrEtudiants*12;
$countDays=0;
$countEtudiant=0;
$tabEtudiant=[];
foreach($tab as $row){
    array_push($tabEtudiant, $row['cin']);
}

$firstDate= date(' Y/m/d', strtotime($semaine));
$dt=strtotime($firstDate);
$tabDates=array();
$nbrAbsJus=0;
$nbrAbsNonJus=0;
for($i=0;$i<6;$i++){
  $increment=sprintf("+%u day",$i);
  $d=date("Y-m-d", strtotime($increment,$dt));
  echo $d;
  echo "\n";
  array_push($tabDates, $d);
}
for($i=0;$i<$nbrCheckboxes;$i++){
    $pas=sprintf("%d",$i);
    if(isset($_REQUEST[$pas])){
        $nbrAbsNonJus+=1;
    }
    $nbreAbsJus=$nbrAbsNonJus;
    if(($i+1)%2==0){
        $countDays+=1;
        $nbrAbsNonJus=0;
    }
    if(($i+1)%12==0){
        $countEtudiant+=1;
    }
    if($countDays==5){
        $countDays==0;
    }
    $req="insert into absences values ('$matiere','$tabEtudiant[$countEtudiant]','$nbrAbsJus','$nbrAbsNonJus','$tabDates[$countDays]')";
    $reponse = $pdo->exec($req) or die("error");
    
    
}



         

?>
