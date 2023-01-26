<?php 
ob_start();
require_once "./view/chats.php";
?>
<div class="mainPartie">
    <div class="partie">
        <H1><?php print_r($listScenes[$index]->titre)?></H1>
    </div>
    <div class="right_side"><?=$chat?></div>
</div>



<?php 
$content = ob_get_clean();
require_once "template.php";    
?>