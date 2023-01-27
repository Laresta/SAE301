<?php ob_start();

?>
<div class="window">
            
    
    <!--<div class="left_side">
        <div class="left_sub_side">
            

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
    </div>-->
    <div class="middle_side">
        <h3>Choisissez votre partie</h3>
        <div class="legend"><p>Titre</p><p> desctiption</p><p> joueurs</p><p>Connection</p></div>
        <?php 
        foreach ($parties as $partie ) { 
            $nbplayers=countPlayers($con,$partie->idpartie)->nbPlayers;
            ?>
        <div class="legend">
            <p><?= $partie->titre?></p><p> <?=$partie->resume;?></p><p><?=$nbplayers?></p><a href="./?action=join_party_choice&idpartie=<?=$partie->idpartie?>"><button>Rejoundre</button></a>
        </div>
        <?php } ?>
    </div> 
</div>
<?php $content=ob_get_clean();
$title = "Main page";
require_once "template.php";
?>
