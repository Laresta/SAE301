<?php ob_start();

?>
<div>
    <form method="POST">
        <input type="text" name="titre" required>
        <br>
        <input type="text" name="desc">
        <br>
        <select name="game">
        <?php foreach ($games as $game ) { ?>
        <option value="<?= $game->nom ?>"><?= "Nom du jeu:".$game->nom." Editeur:".$game->editeur." Edition:".$game->edition." Genre:".$game->genre ?></option>
        <?php } ?>
        </select>
        <br>
        <input type="hidden" name="action" value="create_party">
        <input type="submit">
    </form>
</div>
<?php
$content = ob_get_clean();
require_once "template.php";
?>