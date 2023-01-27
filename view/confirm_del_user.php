<?php ob_start();
    
?>
<div class="center">
    <form method="POST">
        <h3>Voulez-vous supprimer votre Compte?</h3>
        <input type="hidden" name="idUser" value="<?= $_SESSION['id']?>">
        <input type="hidden" name="action" value="deleteMe">
        <div class="center">
            <input type="submit" value="Oui">
            <a href="./action=''"><button>Non</button></a>
        </div>
    </form>

</div>

<?php 
$content = ob_get_clean();
require_once "template.php";
?>