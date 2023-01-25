<?php ob_start();
    
?>
<form method="POST">
    <p>Voulez-vous supprimer votre Compte?</p>
    <input type="hidden" name="idUser" value="<?= $_SESSION['id']?>">
    <input type="hidden" name="action" value="deleteMe">
    <input type="submit" value="Oui">
    <a href="./action=''"><button>Non</button></a>
</form>

<?php 
$content = ob_get_clean();
require_once "template.php";
?>