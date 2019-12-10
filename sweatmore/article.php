<?php

include 'inc/bdd.inc.php';
include 'inc/session.inc.php';

// Récupération des données de l'article
$req = $bdd -> prepare ('SELECT * FROM articles WHERE id=:id ');
$req -> bindParam(':id', $_GET['article']);
$req -> execute();
$article = $req -> fetch ();
$source1 = "img/articles/".$article['img1'];
$source2 = "img/articles/".$article['img2'];
$source3 = "img/articles/".$article['img3'];
$source4 = "img/articles/".$article['img4'];

?>

<!DOCTYPE html>
<html>

    <?php 
		$dynamicTitle = $article['nom'];
        $title = $dynamicTitle . ' | SweatMore';
        require 'inc/head.php'; 
    ?>

	<body>

		<!-- POPUP NEWSLETTER -->
		<?php 
			if(isset($_SESSION['user_id']) && $user['news'] == NULL){
		?>		
			<div id='popupDiv'>
				<div id="popupContent">	
					<svg id="popupSvg" class="svg-inline--fa fa-times fa-w-11" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
					<div class="popupDivContent">
						<p>
							<span class="popupTitle">Abonnez vous à la Newsletter !</span><br>
							<span class="popupDesc">Chaque mois, recevez le meilleur de SweatMore dans votre boite mail !</span>
						</p>
					</div>
					<div class="popupDivBtn">
						<a class="popupBtn" href="traitement.php?newsletter-accept">J'accepte</a>
					</div>
				</div>
			</div>
			<script src="./js/popupnewsleterre.js"></script>
		<?php
			}
		?>

		<?php require 'inc/nav.php'; ?>

		<div id="content_article">
			<!-- Affichage de l'article  -->
		 	
			<h1 id="sweatmore">SWEATMORE.</h1>

			<input class="sources_php" type="hidden" name="id" value="<?= $source1 ?>">  
			<input class="sources_php" type="hidden" name="id" value="<?= $source2 ?>">  
			<input class="sources_php" type="hidden" name="id" value="<?= $source3 ?>">
			<input class="sources_php" type="hidden" name="id" value="<?= $source4 ?>">  
			
			<h2 class ='gamme' style="text-align: center; margin-bottom: 40px"> Notre Gamme de <?php echo $article['categorie']; ?></h2>
			<div class="container-fluid" id="container_box">
				<div id="sous_container_box" style="margin-bottom: 30px">
					<div id="contener1">
						<div class='photo_principal'> 
							<?php
								if($article['img1']!=NULL){
									echo '<img src="'.$source1.'" alt="Image Perso">';
								}	else	{
									echo"Pas d'image";
								}
							?>
						</div>
					</div>
					<div id="contener2">
						<div class ='photo_secondaire'>

							<?php
								if($article['img2']!=NULL){
									echo '<img src="'.$source2.'" alt="Image Perso">';
								}	else	{
									echo"Pas d'image";
								}
							?>

						</div> 
						<div class ='photo_secondaire'>

							<?php
								if($article['img3']!=NULL){
									echo '<img src="'.$source3.'" alt="Image Perso">';
								}	else	{
									echo"Pas d'image";
								}
							?>

						</div> 
						<div class ='photo_secondaire'>
							<?php
								if($article['img4']!=NULL){
									echo '<img src="'.$source4.'" alt="Image Perso3">';
								}	else	{
									echo"Pas d'image";
								}
							?>
							
						</div>
					</div>

					<div id ="text">
						<h3 class="article_section"> <?php echo $article['nom']; ?> </h3>
						<p><?php echo $article['text']; ?> </p>
						<a href="contact.php" class="articleBtn"> Nous contacter</a>
					</div>

				</div>
			</div>

		<?php
		// Enregistrement du dernier article
		if(isset($_SESSION['user_id']))
		{ 
			$req = $bdd->prepare('UPDATE `users` SET `article` = :article WHERE `users`.`id` = :id');
			$req->execute(array ('article' => htmlspecialchars($article['id']),
								'id'=> $user['id']));			
		}
		?>

		<!-- les pop-up -->
		<script src="//wpcc.io/lib/1.0.2/cookieconsent.min.js"></script>
        <script src="js/popupcookie.js"></script>
		<?php require 'inc/footer.php'; ?>
		<script src="js/photoarticles.js"></script>
		<script src="js/navbar2.js"></script>
		<script src="js/notif.js"></script>
	</body>


</html>