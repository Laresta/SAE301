<?php 

require_once "bdd.php";
function addMessagePr($con,$message,$idScene,$image=null){
    $query = "Insert into message_prive values(null,?,now(),?,?,?)";
	$query= $con->prepare($query);
	$query->execute([$message,$idScene,$_SESSION['id'],$image]);
	return $query->rowCount();
}
function addMessagePu($con,$message,$idScene,$idPers=null,$image=null){
    $query = "Insert into message_jdr values(null,?,now(),?,?,?,?)";
	$query= $con->prepare($query);
	$query->execute([$message,$idScene,$idPers,$_SESSION['id'],$image]);
	return $query->rowCount();
}
function getMessagesPFromDatabase($con,$idScene){
    $query = "select * from message_prive where idscene = ?";
    $query = $con->prepare($query);
    $query->execute([$idScene]);
    return $query->fetchAll(PDO::FETCH_CLASS);

}
?>