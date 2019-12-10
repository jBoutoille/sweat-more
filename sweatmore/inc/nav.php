<nav id="navbar">
    <div id="burgerContent">
        <ul> 
            <li><a href="index.php">Accueil</a></li>
            <li><a href="categorie.php?categorie=sweats">Sweats</a></li>
            <li><a href="categorie.php?categorie=tshirts">T-shirts</a></li>
            <li><a href="categorie.php?categorie=baskets">Baskets</a></li>
            <li><a href="categorie.php?categorie=fitness">Fitness</a></li>
            <li><a href="categorie.php?categorie=muscu">Musculation</a></li>  
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <ul>
        <?php if(isset($_SESSION['user_id'])){ ?>
            <?php if($user['admin'] == "admin"){ ?>
                <li class="navAdminBtn"><a href="form_article.php">Gérer articles</a></li>
            <?php } ?>
                <li><a href="connexion.php?change-profile">Modifier compte</a></li>
                <li><a href="traitement.php?disconnection">Deconnexion</a></li>
            <?php }else{ ?>
                <li><a href="connexion.php">Se connecter</a></li>
                <li><a href="connexion.php?new-account">Créer un compte</a></li>
            <?php } ?>
        </ul>
    </div>
    <div id="burger">
        <div id="burgers">
            <svg onclick="iconOpen()" viewBox="0 0 640 512"><path fill="currentColor" d="M104 96H56c-13.3 0-24 10.7-24 24v104H8c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h24v104c0 13.3 10.7 24 24 24h48c13.3 0 24-10.7 24-24V120c0-13.3-10.7-24-24-24zm528 128h-24V120c0-13.3-10.7-24-24-24h-48c-13.3 0-24 10.7-24 24v272c0 13.3 10.7 24 24 24h48c13.3 0 24-10.7 24-24V288h24c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8zM456 32h-48c-13.3 0-24 10.7-24 24v168H256V56c0-13.3-10.7-24-24-24h-48c-13.3 0-24 10.7-24 24v400c0 13.3 10.7 24 24 24h48c13.3 0 24-10.7 24-24V288h128v168c0 13.3 10.7 24 24 24h48c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24z"></path></svg>
            <svg onclick="iconClose()" style="width:4.5vh;display:none;" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
        </div>
    </div>
</nav>