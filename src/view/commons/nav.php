<nav>

    <a href='/'><img src='/public/images/logo.jpeg' alt='' style='height: 50%;width: 50%'></a>
    <a href='/'>Accueil</a>
    <a href='/store'>Boutique</a>
    <?php if(isset($_SESSION["firstname"])){?>
    <?php echo "<a class='account' href='/account/infos'>
        <img src='/public/images/avatar.png'/>";}

    else{ echo"<a class='account' href='/account'>
        <img src='/public/images/avatar.png'/>
        ";}?>
        <?php if(isset($_SESSION["firstname"])){?>
        <?php
        echo $_SESSION['firstname'].' '.$_SESSION['lastname'];
        }else{
            echo 'Compte';
        }?>
    </a>
    <?php if(isset($_SESSION["firstname"])){
     echo '<a href="/cart">Panier</a>
            <a href="/account/logout">Déconnexion</a>';

    }
        ?>
</nav>
