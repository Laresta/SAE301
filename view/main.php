<?php ob_start();

?>
<div class="window">
    <div class="left_side">
        <div class="left_sub_side">
            <div class="Profil">
                <div>
                    <h2>Mon Profil</h2>
                    <img class="accAvatar avatar" src="./dist/images/avatar.png" alt="">
                    <p class="nickname"><?= $_SESSION['login']?></p>
                </div>
                <div>
                    <a href="./?action=del_user">Supprimer mon compte</a>
                </div>
            </div>
    

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
    <div class="middle_side">
        <div class="legend"><p>Titre</p><p> desctiption</p><p> joueurs</p><br></div>
        <?php 
        foreach ($parties as $partie ) { ?>
        <div class="legend">
            <p><?= $partie->titre?></p><p> <?=$partie->resume;?></p><p><?=$partie->idpartie?></p><a href="./?action=join_party&idpartie=<?=$partie->idpartie?>"><button>Rejoundre</button></a>
        </div>
        <?php } ?>
    </div> 
</div>
<?php $content=ob_get_clean();
$title = "Main page";
require_once "template.php";
?>
