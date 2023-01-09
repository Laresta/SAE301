<?php ob_start(); ?>
<div class="accountDetails login">
        <h2>Bienvenue sur XXXjdr.com <br> Inscrivez-vous</h2>
        <form class="formAcc" method="post">
          <label for="login">Login</label>
          <input type="text" name="login" placeholder="login">
          <label for="mdp">Mot de passe</label>
          <input type="text" name="mdp" placeholder="mot de passe">
          <label for="Cmdp">Mot de passe confirmation</label>
          <input type="text" name="email" placeholder="confirmation mot de passe">
          <input type="hidden" name="action" value="create_account">          
          <input type="submit" name="connect" value="Se conncter">
        </form>
      </div>
<?php $content=ob_get_clean(); 
$title="Page d'inscription";
require_once "template.php";
?>