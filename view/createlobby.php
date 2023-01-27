<?php ob_start();

?>
<div class="center">
    <form method="POST">
        <h3>Creation de la partie</h3>
        <label for="titre">Titre de la partie:</label>
        <br>
        <input type="text" name="titre" required>
        <br>
        <label for="desc">Description de la partie:</label>
        <br>
        <input type="text" name="desc">
        <br>
        <label for="game">Choisir le jeu:</label>
        <br>
        <select name="game">
        <?php foreach ($games as $game ) { ?>
        <option value="<?= $game->nom ?>"><?= "Nom du jeu:".$game->nom." Editeur:".$game->editeur." Edition:".$game->edition." Genre:".$game->genre ?></option>
        <?php } ?>
        </select>
        <br>
        <label for="sceneDebut">Titre de la premiere scene:</label>
        <br>
        <input type="text" name="sceneDebut">
        <br>
        <input type="hidden" name="action" value="create_party"><br>
        <input type="submit">
    </form>
</div>
<?php
$content = ob_get_clean();
require_once "template.php";
?>