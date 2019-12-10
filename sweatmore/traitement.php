<?php
include 'inc/bdd.inc.php';
include 'inc/session.inc.php';

$_SESSION["notification"] = "Un problème est survenu!";

//Fonction traitement de l'image
function traitement_image($name_form) {
    if(!$_FILES[$name_form]['name'] == '') { // isset($_FILES[$name_form]) est toujours sur true
        $format_accepte = array('image/jpg', 'image/jpeg', 'image/png', 'image/gif');
        if(in_array($_FILES[$name_form]['type'], $format_accepte)) {
            if($_FILES[$name_form]['size']<1500000) {
                /* Enregistrement du fichier dans le dossier "img/artciles" */
                move_uploaded_file($_FILES[$name_form]['tmp_name'], './img/articles/' 
                    . basename($_FILES[$name_form]['name']));
                /* Enregistrement du nom de l'image dans la liste des images */
                return basename($_FILES[$name_form]['name']);                    
            } else {
                $_SESSION['notification'] = "La taille de l'image ne doit pas excéder 1,5 Mo ";
                header ('Location: form_article.php') ;
                exit();
            }
        } else {
            $_SESSION['notification'] = 'Ce format d\'image n\'est pas accepté (' . $_FILES[$name_form]['type'] 
                . ')';
            header ('Location: form_article.php') ;
            exit();
        }
    } else {
        if(isset($_POST['submit_new_article'])) {
            $_SESSION['notification'] = "Vous devez compléter tous les champs ";
            header ('Location: form_article.php') ;
            exit();
        } else if(isset($_POST['submit_modif_article'])) {
            $default_image = $name_form . '_default';
            return htmlspecialchars($_POST[$default_image]);
        }
    }
}

//Déconnexion
if(isset($_GET['disconnection']))
{
    unset($_SESSION['user_id']);
    $_SESSION['notification']='Vous êtes bien déconnecté a bientot !';
    header ('Location: index.php') ;
    exit();
}

// Inscription
elseif(isset($_POST['submit_new_account']))
{
    // test si l'email est valide
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
    {
        $_SESSION['notification']= ' Adresse mail invalide ';
        header ('Location: connexion.php?new-account') ;
        exit();
    } 

    // test si email exite déja 
    $req = $bdd -> prepare('SELECT * FROM users WHERE email=? ' ) ;
    $req -> execute (array($_POST['email']));
    $données = $req -> fetch ();
    
    if ( $données['email'] == $_POST['email'])
    {
        $_SESSION['notification']='Erreur cet email est déja utilisé';
        header ('Location: connexion.php?new-account') ;
        exit();

    }   

    // Enregistrement des données 
    $req = $bdd->prepare('INSERT INTO users (id, nom, siret, email, mdp) VALUES (NULL ,:nom , :siret, :email, :mdp)');
    $req->execute (array (
            'nom' => htmlspecialchars($_POST['nom']),
            'siret' => htmlspecialchars($_POST['siret']),            
            'email' => htmlspecialchars($_POST['email']),
            'mdp' => htmlspecialchars($_POST['mdp'])));


    $_SESSION['notification']='Votre compte a bien été enregistré';

    // récupération de l'id du nouvel inscrit 
    $req = $bdd -> prepare('SELECT * FROM users WHERE email=? ' ) ;
    $req -> execute (array($_POST['email']));
    $données = $req -> fetch ();
    $_SESSION['user_id'] = $données['id'] ; 

    header ('Location: index.php?new-account') ;
    exit();

}

// Connexion
elseif(isset($_POST['submit_connection']))
{
    $req = $bdd -> prepare('SELECT * FROM users WHERE email=? ' ) ;
    $req -> execute (array($_POST['email']));
    $données = $req -> fetch ();
    
    if (!isset($données['email']))
    {
        $_SESSION['notification'] = "Vous n'êtes pas inscrit sur notre site ";
        header ('Location: index.php') ;
        exit(); 
    }
    else
    {
        if ($_POST['mdp'] !=$données['mdp'] )
        {
            $_SESSION['notification'] = 'Mot de passe incorrect !' ;
            header ('Location: index.php') ;
            exit();
        }
        elseif ($_POST['mdp'] ==$données['mdp'] )  
        {
            $_SESSION['notification']= 'Bonjour ' . $données['nom'];
            $_SESSION['user_id']= $données['id'];
            header ('Location: index.php') ;
            exit();  
        }
    }
}

//Modification des données 
elseif(isset($_POST['submit_profile']))
{

    //préparation de la requete de mise a jour 
    $req = $bdd -> prepare('UPDATE users SET nom=:nom, email=:email, siret=:siret WHERE id=:id') ;
    $req -> execute (array (
            'id' => $_SESSION['user_id'],
            'nom' => htmlspecialchars($_POST['nom']),
            'email' => htmlspecialchars($_POST['email']),
            'siret' => htmlspecialchars($_POST['siret'])));

    $_SESSION['notification'] = "Vos données ont bien été modifiées ";
    header ('Location: index.php') ;
    exit();

}

// Enregistrement d'un nouvel article
elseif(isset($_POST['submit_new_article']))
{

    // Traitement du nom complet de l'article
    $nom_base_article = htmlspecialchars($_POST['nom_base_article']);
    $nom_marque_article = htmlspecialchars($_POST['nom_marque_article']);

    $nom_complet_article = $nom_base_article . ' ' . strtoupper($nom_marque_article);

    // Traitement des images
    $image_1 = traitement_image('image_1');
    $image_2 = traitement_image('image_2');
    $image_3 = traitement_image('image_3');
    $image_4 = traitement_image('image_4');

    // Enregistrement des données 
    $req = $bdd -> prepare('INSERT INTO articles (nom, categorie, img1, img2, img3, img4, text, date) 
        VALUES (:nom, :categorie, :img1, :img2, :img3, :img4, :text, NOW())') ;
    $req -> execute (array (
            'nom' => $nom_complet_article,
            'categorie' => htmlspecialchars($_POST['categorie']),
            'img1' => $image_1,
            'img2' => $image_2,
            'img3' => $image_3,
            'img4' =>  $image_4,
            'text' => htmlspecialchars($_POST['texte_article'])));
    
    $_SESSION['notification'] = "Votre article a bien été ajouté ";
    header ('Location: form_article.php') ;
    exit();

}

// Modification d'un article
elseif(isset($_POST['submit_modif_article']))
{

    // Traitement du nom complet de l'article
    $nom_base_article = htmlspecialchars($_POST['nom_base_article']);
    $nom_marque_article = htmlspecialchars($_POST['nom_marque_article']);

    $nom_complet_article = $nom_base_article . ' ' . strtoupper($nom_marque_article);

    // Traitement des images
    $image_1 = traitement_image('image_1');
    $image_2 = traitement_image('image_2');
    $image_3 = traitement_image('image_3');
    $image_4 = traitement_image('image_4');

    // Enregistrement des données 
    $req = $bdd -> prepare('UPDATE articles SET nom=:nv_nom, categorie=:nv_categorie, img1=:nv_img1,
        img2=:nv_img2, img3=:nv_img3, img4=:nv_img4, text=:nv_text WHERE id=:id');
    $req -> execute (array (
            'id' => htmlspecialchars($_POST['id']),
            'nv_nom' => $nom_complet_article,
            'nv_categorie' => htmlspecialchars($_POST['categorie']),
            'nv_img1' => $image_1,
            'nv_img2' => $image_2,
            'nv_img3' => $image_3,
            'nv_img4' =>  $image_4,
            'nv_text' => htmlspecialchars($_POST['texte_article'])));

    $_SESSION['notification'] = "Votre article a bien été modifié ";
    header ('Location: form_article.php') ;
    exit();

}

// Suppression d'un article
elseif(isset($_GET['suppr_article']))
{

    $req = $bdd -> prepare('DELETE FROM articles WHERE id= ?');

    $req -> execute(array(
        $_GET['suppr_article']
    ));

    $req->closeCursor();

    // var_dump($_GET['suppr_article']);
    // die();

    $_SESSION['notification'] = "Votre article a bien été supprimé ";
    header ('Location: form_article.php') ;
    exit();

}

// traitement des données du formulaire contact
elseif(isset($_POST['contact-submit'])){
    $societe = htmlspecialchars($_POST['société']);
    $mail = htmlspecialchars($_POST['mail']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $message = htmlspecialchars($_POST['message']);
    if(empty($telephone)){$telephone=NULL;}
    $req=$bdd->prepare('INSERT INTO messages (nom, email, tel, message, date) VALUES (:nom, :mail, :tel, :message, NOW())');
    $req->bindParam(":nom",$societe);
    $req->bindParam(":mail",$mail);
    $req->bindParam(":tel",$telephone);
    $req->bindParam(":message",$message);
    $req->execute();
    $req->closeCursor(); 
    $_SESSION['notification'] = "Merci de nous avoir contacté, nous prendrons rapidement en compte votre demande";
    header('Location: index.php');
    exit();
}


// traitement newsletter
elseif(isset($_GET['newsletter-accept'])){
    $req=$bdd->prepare('UPDATE users SET news = "ok" WHERE id=:id');
    $req->bindParam(":id",$user['id']);
    $req->execute();
    $req->closeCursor(); 
    $_SESSION['notification'] = "Merci de vous êtes inscrit à notre newsletter, vous recevrez les nouveautés de Sweatmore par mail";
    header('Location: index.php');
    exit();
}