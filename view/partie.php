<?php 
ob_start();
require_once "./view/chats.php";
?>
<div class="mainPartie">
    <div class="scene">
    <div class="partie">
        <h1><?php echo $listScenes[$index]->titre?></h1>
        <input type="hidden" name="idScene" value="<?=$listScenes[$index]->idscene?>">
        <input type="hidden" name="idPartie" value="<?=$_GET['idpartie']?>">
    </div>
        <?php
        if($meneur) echo '<div class="menuMeneur"><button id="prevScene">La scene precedente</button><button>Creer scene</button><button  id="nextScene">Prochaine scene</button></div>';
        
        ?>
        
    </div>
    <div class="right_side"><?=$chat?></div>
</div>



<?php 
$content = ob_get_clean();
require_once "template.php";    
?>