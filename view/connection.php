<?php ob_start();?>
      <div class="accountDetails login">
        <h3>Bienvenue sur XXXjdr.com <br> Connectez-vous</h3>
        <?php if(isset($erreurConnect))echo $erreurConnect;?>
        <form class="formAcc" method="post">
          <label for="login">Login</label>
          <input type="text" name="login" placeholder="login">
          <label for="mdp">Mot de passe</label>
          <input type="password" name="pass" placeholder="mot de passe">
          <input type="hidden" name="action" value="connect">
          <input type="submit" name="connect" value="Se conncter">
          <caption>Pas de compte? Inscrivez-vous <a href="./index.php?action=inscription">ICI</a>  </caption>
        </form>
      </div>
<?php $content=ob_get_clean();
$title="Page de connexion";

require_once "template.php";
?>