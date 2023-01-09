<?php ob_start();?>
<link rel="stylesheet" href="../dist/css/index.css">
      <div class="accountDetails login">
        <h2>Bienvenue sur XXXjdr.com <br> Connectez-vous</h2>
        <form class="formAcc" action="index.html" method="post">
          <label for="login">Login</label>
          <input type="text" name="login" placeholder="login">
          <label for="mdp">Mot de passe</label>
          <input type="text" name="mdp" placeholder="mot de passe">
          <input type="submit" name="connect" value="Se conncter">
          <caption>Pas de compte? Inscrivez-vous <a href="inscription.html">ICI</a>  </caption>
        </form>
      </div>
<?php $contenu=ob_get_clean();
$titre="Page de connexion";
require_once "template.php";
?>