<?php 

require_once "bdd.php";

function getGames($con){
    $query = "select * from jeu";
    $query = $con->prepare($query);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_CLASS);
}
function createParty($con,$nomPartie,$desc,$nomGame){
    $query = "insert into partie values (null,now(),?,?,?);";
    $query = $con->prepare($query);
    $query->execute([$nomPartie,$desc,$nomGame]);
    $idPartie = $con->lastInsertId();
    $idMeneur = $_SESSION['id'];
    if($query->rowCount()){
        $maitrise = "insert into maitrise values (null,?,?);";
        $maitrise = $con->prepare($maitrise);
        $maitrise->execute([$idPartie,$idMeneur]);
        if($query->rowCount()){
            echo 1;
            $query = "insert into meneur values (?);";
            $query = $con->prepare($query);
            $query->execute([$_SESSION['id']]);
        }
    }
}

function getParties($con){
    $query = "select * from partie";
    $query = $con->prepare($query);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_CLASS);
}
?>