<?php 

require_once "bdd.php";
function addMessageP($con,$message,$idScene,$image=null){
    $query = "Insert into message_prive values(null,?,now(),?,?,?)";
	$query= $con->prepare($query);
	$query->execute([$message,$idScene,$_SESSION['id'],$image]);
	return $query->rowCount();
}
function getMessagesPFromDatabase($con,$idScene){
    $query = "select * from message_prive where idscene = ?";
    $query = $con->prepare($query);
    $query->execute([$idScene]);
    return $query->fetchAll(PDO::FETCH_CLASS);

}
?>