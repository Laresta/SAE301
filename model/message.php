<?php 

require_once "bdd.php";

function addMessageP($con,$message,$idUser,$image=null){
    $query = "Insert into message_prive(corps,date,idscene,idutilisateur,image) values(?,now(),?,?,?)";
	try {
		$query= $con->prepare($query);
		$query->execute([$message,$idUser,$_SESSION['id'],$image]);
		return $query->rowCount();
	} catch (\Exception $e) {
		echo $e->getCode();
	}
}
function getMessagesPFromDatabase($con,$idScene){
    $query = "select * from message_prive where idscene = ?";
    $query = $con->prepare($query);
    $query->execute([$idScene]);
    return $query->fetchAll(PDO::FETCH_CLASS);

}
?>