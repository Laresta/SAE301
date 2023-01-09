<?php ob_start();?>
<nav>
    <ul>
        <li><a href="?action=accueil">Accueil</a></li>
        <li><a href="?action=chat">Chats</a></li>
        <li><a href="?action=game_create">Creer un jeu</a></li>
        <li><a href="?action=game_start">Lancer une partie</a></li>
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