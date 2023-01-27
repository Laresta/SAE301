<?php 

require_once "bdd.php";

function getScenes($con,$idPartie){
    $query = "select * from scene where idpartie = ?";
    $query = $con->prepare($query);
    $query->execute([$idPartie]);
    return $query->fetchAll(PDO::FETCH_CLASS);
} 

function createScene($con,$idPartie,$sceneName){
    $query = "insert into scene values (null,?,?);";
    $query = $con->prepare($query);
    $query->execute([$sceneName,$idPartie]);
}

function getPreviousScene($con,$idPartie,$idScene){
    $query = "select * from scene where idpartie=? and idscene!=? and idscene<=? order by idscene desc";
    $query = $con->prepare($query);
    $query->execute([$idPartie,$idScene,$idScene]);
    return $query->fetchObject();
}

function getNextScene($con,$idPartie,$idScene){
    $query = "select * from scene where idpartie=? and idscene!=? and idscene>=? order by idscene";
    $query = $con->prepare($query);
    $query->execute([$idPartie,$idScene,$idScene]);
    return $query->fetchObject();
}

function chkMeneur($con,$idPartie){
    $query = "select idmeneur from maitrise where idpartie = ?";
    $query = $con->prepare($query);
    $query->execute([$idPartie]);
    $idmeneur =  $query->fetchObject()->idmeneur;
    if($idmeneur == $_SESSION['id'])return 1;
    else return 0;
}

function getPersonnagesUnselected($con,$idPartie){
    if(!chkMeneur($con,$idPartie)){    
        $query = "select * from pj left outer join personnage on pj.idpartie=? where pj.idpersonnage!=personnage.idpersonnage";
        $query = $con->prepare($query);
        $query->execute([$idPartie]);
        return $query->fetchAll(PDO::FETCH_CLASS);
    }
    else{
        return 2; //retourne 2 si l'utilisateur est meneur
    }
}
function getPersonnages($con,$idPartie){
    $query = "select * from personnage";
    $query = $con->prepare($query);
    $query->execute([]);
    return $query->fetchAll(PDO::FETCH_CLASS);
    
}
function countPersonnages($con){
    $query = "select count(*) nbPersonnages from personnage";
    $query = $con->prepare($query);
    $query->execute([]);
    return $query->fetchObject();
}
function countPlayers($con,$idPartie){
    $query = "select count(*) nbPlayers from pj where pj.idpartie = ? ";
    $query = $con->prepare($query);
    $query->execute([$idPartie]);
    return $query->fetchObject();
}
function chkAlreadyPlayer($con,$idPartie){
    $query = "select pj.idutilisateur from pj where pj.idpartie = ? and pj.idutilisateur=?";
    $query = $con->prepare($query);
    $query->execute([$idPartie,$_SESSION['id']]);
    return $query->fetchAll(PDO::FETCH_CLASS);
}

function addJoueur($con,$idPersonnage,$idPartie){
    $query = "insert into pj values (?,?,?)";
    $query = $con->prepare($query);
    $query->execute([$idPartie,$idPersonnage,$_SESSION['id']]);
}


?>