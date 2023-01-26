<?php 

require_once "bdd.php";

function getScenes($con,$idPartie){
    $query = "select * from scene where idPartie = ?";
    $query = $con->prepare($query);
    $query->execute([$idPartie]);
    return $query->fetchAll(PDO::FETCH_CLASS);
} 


?>