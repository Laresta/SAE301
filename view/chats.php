<?php ob_start();?>
<div>
    <div class="chatTabs">
        <div>Chat 1</div>
        <div>Chat 2</div>
        <div>Chat 3</div>    
    </div>
    <div class="chat">
        <input type="text" name="message">
        <input type="submit" value="">
    </div>
</div>

<?php $chat=ob_get_clean();



?>