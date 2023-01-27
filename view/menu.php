<?php ob_start();?>
<nav>
    <ul>
        <li><a href="?action=accueil">Accueil</a></li>
        <li><a href="#" id="chat">Chats</a></li>
        <li><a href="?action=create_lobby">Lancer une partie</a></li>
        <li><a href="#mon_profil">Mon profil</a></li>
        <?php
         if(isset($_SESSION['id'])){
        ?>
         <li><a href="?action=disconnect">Deconnexion</a></li> 
        <?php
        }
        ?>
    </ul>
</nav> 

<?php $menu =ob_get_clean();?>