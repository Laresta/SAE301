<?php

require_once "./Model/lobby.php";
require_once "./Model/game.php";
$con= bdd_connection();
switch ($action) {
    case 'create_lobby':
        $games = getGames($con);
        require_once "./view/createlobby.php";
        break;
    case "create_party":
        $nomPartie= $_POST['titre'];
        $desc=$_POST['desc'];
        $nomGame = $_POST['game'];
        $sceneDebut = $_POST['sceneDebut'];
        createParty($con,$nomPartie,$desc,$nomGame,$sceneDebut);
        header("Location: ./?action=''");
        break;
    default:
        $parties = getParties($con);
        require_once "./view/main.php";
        break;
}

?>