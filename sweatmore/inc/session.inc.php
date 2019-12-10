<?php
session_start();

    // Affichage des notification
    if(array_key_exists('notification',$_SESSION)):
        echo ' <div id="notif" class="notification fixed-top" role="alert"> ';
            echo $_SESSION['notification'];
        echo ' </div> ' ;
    endif;

    //Récupération des données de l'utilisateur
    if (isset($_SESSION['user_id']))
    {
        $req = $bdd -> prepare ('SELECT * FROM users WHERE id=:id');
        $req -> bindParam(':id', $_SESSION['user_id']);
        $req -> execute();
        $données = $req -> fetch ();
        $user = $données;
        
    }


