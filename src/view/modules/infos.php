
<div id="account">

    <form class="account-login" method="post" action="/account/update">
    <h2>Informations du compte</h2>
        <h3>Informations personnelles</h3>

        <p>Prénom</p>
        <input type="text" name="userfirstname" placeholder="Prénom" oninput="firstname()" id="prenom" value="<?= $_SESSION["firstname"]?>"/>

        <p>Nom</p>
        <input type="text" name="userlastname" placeholder="Nom" oninput="lastname()" id="nom" value="<?= $_SESSION["lastname"]?>"/>

        <p>Adresse mail</p>
        <input type="text" name="usermail" placeholder="Adresse mail" value="<?= $_SESSION["mail"]?>"/>

        <input type="submit" value="Modifier mes informations" />

    </form>
</div>

<div id="account">
    <h3>Commandes</h3>
    <br>
    <br>
    Tu n'as pas de commande en cours.
</div>