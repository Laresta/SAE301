<?php
require_once "config.php";

//fonction de la connexion a la bdd 
function bdd_connection(){
    global $bdd_server,$bdd_db,$bdd_login,$bdd_pass,$debug; //variables de la page de config
    $dsn="mysql:host=$bdd_server;dbname=$bdd_db;charset=UTF8";
    try{
        return new PDO($dsn,$bdd_login,$bdd_pass); // retour d'objet PDO soit la connexion
    }catch(PDOException $erreur){ //dans le cas d'erreur on a une exception
        if($debug) echo $erreur->getMessage(); 
        else echo "OOOPS, Bitch!";
        return null;
    }
}


function bdd_erreur_requete($requete){ //fonction si la requette ne retourne pas un resultat
    global $debug;
    if($debug) 
        echo  $requete->errorInfo()[2];
    else echo "OOOPS, Bitch!";
}

?>