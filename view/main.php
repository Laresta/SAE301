<?php ob_start();
require_once "./view/chats.php";
?>
<div class="window">
    <div class="left_side">
        <div class="left_sub_side">
            <h2>Mon Profil</h2>
            <img class="accAvatar avatar" src="./dist/images/avatar.png" alt="">
            <p class="nickname"><?= $_SESSION['login']?></p>
        </div>
        
        <div class="left_sub_side">
            <h2>Mes amis</h2>
            <div class="friend_el">
                <img src="./dist/images/avatar.png" class="friendAvatar avatar" alt="">
                <p class="nickname">Friend</p>
                <img src="./dist/images/avatar.png" class="friendAvatar avatar" alt="">
            </div>
            <div class="friend_el">
                <img src="./dist/images/avatar.png" class="friendAvatar avatar" alt="">
                <p class="nickname">Friend</p>
                <img src="./dist/images/avatar.png" class="friendAvatar avatar" alt="">
            </div><div class="friend_el">
                <img src="./dist/images/avatar.png" class="friendAvatar avatar" alt="">
                <p class="nickname">Friend</p>
                <img src="./dist/images/avatar.png" class="friendAvatar avatar" alt="">
            </div><div class="friend_el">
                <img src="./dist/images/avatar.png" class="friendAvatar avatar" alt="">
                <p class="nickname">Friend</p>
                <img src="./dist/images/avatar.png" class="friendAvatar avatar" alt="">
            </div><div class="friend_el">
                <img src="./dist/images/avatar.png" class="friendAvatar avatar" alt="">
                <p class="nickname">Friend</p>
                <img src="./dist/images/avatar.png" class="friendAvatar avatar" alt="">
            </div>
        </div>
    </div>
    <div class="middle_side">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi eligendi repellendus sunt quidem. Vitae commodi vel, aliquid libero eos suscipit molestias itaque cupiditate deleniti ad officiis nulla quis aspernatur maxime.</div>
    <div class="right_side"><?=$chat?></div>
</div>
<?php $content=ob_get_clean();
$title = "Main page";
require_once "template.php";
?>
