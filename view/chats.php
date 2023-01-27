<?php ob_start();?>
<div class="chatsTabs">
    <div class="chatTabs">
        
        <div><a id="<?=$idScene?>" href="#messagesP"><input type="hidden" name="idScene" value="<?=$idScene?>">Chat Publique</a></div>
        <div><a id="<?=$idScene?>" href="#messagesN"><input type="hidden" name="idScene" value="<?=$idScene?>">Chat Narrative</a></div>
        <div id="close_chat"><a href="#">X</a></div>
    
    </div>
    <div class="messagesChatP">
    
    </div>
    <div class="chatP">
        Chat Publique
        <form id="messagerieP" method="POST">
            <input type="text" id="messageP" name="messageP" placeholder="Votre Message">
            <input type="file" name="imageP" id="imageP">
            <input type="submit">    
        </form>
    </div>

    <div class="messagesChatN">
    
    </div>
    <div class="chatN">
        
        <form id="messagerieN" method="POST">
            <input type="text" id="messageN" name="messageN" placeholder="Votre Message">
            <input type="file" name="imageN" id="imageN">
            <input type="submit">    
        </form>
    </div>

</div>

<?php $chat=ob_get_clean();

?>