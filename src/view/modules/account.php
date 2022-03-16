<?php
if(isset($_GET["status"])) {
    if ($_GET["status"] == "logout") {
        echo '<div class="box info" style="margin-left: 5%">
           <p>Vous êtes déconnecté.A bientôt!</p>
</div>';
    }
    else if($_GET["status"] == "signin"){
        echo '<div class="box info" style="margin-left: 5%">
                <p>Inscription réussie! Vous pouvez dès à présent vous connecter.</p>
            </div>';
    }
    else if($_GET["status"] == "signin_fail"){

        echo '<div class="box error" style="margin-left: 5%">
                <p>Inscription échouée! Réinscrivez vous correctement.</p>
            </div>';
    }else if($_GET["status"] == "login_fail"){

        echo '<div class="box error" style="margin-left: 5%">
                <p>La connexion a échouée! Vérifiez vos indentifiants et réesayez</p>
            </div>';
    }
}
?>

<div id="account">

<form class="account-login" method="post" action="/account/login">

  <h2>Connexion</h2>
  <h3>Tu as déjà un compte ?</h3>

  <p>Adresse mail</p>
  <input type="text" name="usermail" placeholder="Adresse mail" />

  <p>Mot de passe</p>
  <input type="password" name="userpass" placeholder="Mot de passe" />

  <input type="submit" value="Connexion" />

</form>

<form class="account-signin" method="post" action="/signin">

  <h2>Inscription</h2>
  <h3>Crée ton compte rapidement en remplissant le formulaire ci-dessous.</h3>

  <p>Nom</p>
  <input type="text" name="userlastname" placeholder="Nom" oninput="lastname()" id="nom"/>

  <p>Prénom</p>
  <input type="text" name="userfirstname" placeholder="Prénom" oninput="firstname()" id="prenom"/>

  <p>Adresse mail</p>
  <input type="text" name="usermail" placeholder="Adresse mail" oninput="verifmail()" id="mail"/>

  <p>Mot de passe</p>
  <input type="password" name="userpass" placeholder="Mot de passe" id="password1" oninput="verifpassword(),idpassword()"/>

  <p>Répéter le mot de passe</p>
  <input type="password" name="userpass" placeholder="Mot de passe" id="password2" oninput="idpassword()"/>

  <input type="submit" value="Inscription" />

</form>

</div>

<script src='/public/scripts/signin.js'></script>
