<?php ob_start();?>
<div class="chatTabs">
    <div><a href="#">Chat 1</a></div>
    <div><a href="#">Chat 2</a></div>
    <div><a href="#">Chat 3</a></div>
    <div id="close_chat"><a href="#">X</a></div>

</div>
<div class="chat">
    <input type="text" name="message" placeholder="Votre Message">
    <input type="submit" value="">
</div>

<?php $chat=ob_get_clean();



?>