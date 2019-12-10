<?php 

    // si session , soit last article, soit random si NULL
    if(isset($_SESSION['user_id'])){
        // Si le compte a visité un article
        if(!empty($user['article'])){
            $articleTitle = "Dernier article visité";
            // Récupération des données de l'article
            $req = $bdd -> prepare ('SELECT * FROM articles WHERE id=:id ');
            $req -> bindParam(':id', $user['article']);
            $req -> execute();
            $article = $req -> fetch ();
            $source = "img/articles/".$article['img1'];
        }
        // Sinon si le compte n'a pas encore visité d'article
        else if($user['article'] == NULL){
            $articleTitle = "Nouvel arrivage";
            // Récupération d'un article aléatoire
            $req = $bdd->query('SELECT * FROM articles ORDER BY RAND() LIMIT 1');
            $article = $req -> fetch();
            $source = "img/articles/".$article['img1'];
        }
    }

    // si pas de session
    else{
        $articleTitle = "Nouvel arrivage";
        // Récupération d'un article aléatoire
        $req = $bdd->query('SELECT * FROM articles ORDER BY RAND() LIMIT 1');
        $article = $req -> fetch();
        $source = "img/articles/".$article['img1'];
    }

?>

<h3 class="lastArticleH3"><?= $articleTitle ?></h3>
<div class="lastArticleContainer">
    <div class="lastArticleRow">
        <img src="<?= $source ?>" class="lastArticleImg">
        <div class="lastArticleContent">
            <h4 class="lastArticleH4"><?= $article["nom"] ?></h4>
            <p class="lastArticleP"><?= wordwrap($article["text"], 150, "...<span style='display:none'>"); ?><span></p>
            <a href="article.php?article=<?= $article["id"] ?>" class="lastArticleBtn">Voir plus</a>
        </div>
    </div>

</div>