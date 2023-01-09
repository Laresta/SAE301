<?php ob_start(); ?>
<div class="window">
    <div class="left_side">
        <div class="left_sub_side">
            <h2>Mon Profil</h2>
            <img class="accAvatar avatar" src="./dist/images/avatar.png" alt="">
            <p class="nickname">Nickname</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error illum laboriosam non ullam, eveniet odit, quae quasi tenetur accusantium numquam sunt sit obcaecati vero suscipit odio, quibusdam impedit optio ratione!</p>
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
$titre = "Main page";
require_once "template.php";
?>
