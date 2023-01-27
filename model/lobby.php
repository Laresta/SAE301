<?php 

require_once "bdd.php";

function getGames($con){
    $query = "select * from jeu";
    $query = $con->prepare($query);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_CLASS);
}
function createParty($con,$nomPartie,$desc,$nomGame,$sceneDebut){
    $query = "insert into partie values (null,now(),?,?,?);";
    $query = $con->prepare($query);
    $query->execute([$nomPartie,$desc,$nomGame]);
    $idPartie = $con->lastInsertId();
    $idMeneur = $_SESSION['id'];
    if($query->rowCount()){
        $query = "select idmeneur from meneur where idmeneur= ?";
        $query = $con->prepare($query);
        $query->execute([$_SESSION['id']]);
        if($query->rowCount()<1){
            $query = "insert into meneur values (?)";
            $query = $con->prepare($query);
            $query->execute([$_SESSION['id']]);
        }
        $maitrise = "insert into maitrise values (null,?,?);";
        $maitrise = $con->prepare($maitrise);
        $maitrise->execute([$idPartie,$idMeneur]);            
        $query = "insert into scene values (null,?,?);";
        $query = $con->prepare($query);
        $query->execute([$sceneDebut,$idPartie]);
    }
}

function getParties($con){
    $query = "select * from partie";
    $query = $con->prepare($query);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_CLASS);
}

function getParty($con,$idPartie){
    $query = "select * from partie where idpartie = ?";
    $query = $con->prepare($query);
    $query->execute([$idPartie]);
    return $query->fetchAll(PDO::FETCH_CLASS);
}
?>