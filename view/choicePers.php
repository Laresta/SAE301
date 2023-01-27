<?php 
ob_start();
if ($nbPlayers>=$nbPers){
?>
<H2>Desole mais tous les personnages sont deja prises</H2>

<?php   
}else{



?>

<div class="center">
    <form method="get">
        <h3>Choisissez-votre personnage</h3>
        <select name="pers">
            <?php foreach ($listPersonnages as $pers ) {
                
                ?>
            <option value="<?=$pers->idpersonnage?>"><?=" Nom:".$pers->nom." Age:".$pers->age." Description:".$pers->description?></option>
            <?php
        }
        ?>
        </select>
        <input type="hidden" name="idpartie" value="<?=$_GET['idpartie'];?>">
        <input type="hidden" name="action" value="join_party_play">
        <input type="submit">
        
    </form>
</div>
<?php
}
$content=ob_get_clean();
require_once "template.php";
?>