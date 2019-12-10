<?php

include 'inc/bdd.inc.php';
include 'inc/session.inc.php';

?>

<!DOCTYPE html>
<html>

	<?php 
		$dynamicTitle = ucfirst($_GET['categorie']);
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

		<div id="content_categorie" style='padding-top:10vh;display:flex ;'>

			<div class='row' style="padding-top:10vh; width:100%; margin: 0 8vw ;">
				
				<?php
				$req = $bdd -> prepare ('SELECT * FROM articles WHERE categorie=:categorie ');
				$req -> bindParam(':categorie', $_GET['categorie']);
				$req -> execute();
				?>
				<h1 id="sweatmore "class ='col-12' style="text-align:center; font-family: 'josefin_sans_regular';">SWEATMORE.</h1>
				<h2 class ='orange col-12' style='text-align:center; '> Notre gamme de <?php echo ucfirst($_GET['categorie']); ?> </h2>
				
				<?php 
				while ($article = $req -> fetch ()){
					$source = "img/articles/".$article['img1'];
				?>
					<div id='box_article' class='col col-10 col-sm-10 col-md-2  ' style='width:15vw; margin:20px; padding: 10px 0 0 0 ;position:relative;'>
						
						<p style="text-align:center"><?php echo $article['nom']; ?></p>
						<?php
						echo ' <a class="lastArticleBtn" href="article.php?article=' . $article['id'] . '" 
						style="width:100%; text-align:center; position:absolute; bottom:0; padding: 2vh 0 ;">
						Voir Plus</a> ' ;
						if($article['img1']!=NULL){
							echo '<img src="'.$source.'" alt="Photo article" style="width:100%; 
							border: 1px solid #FF9100;">';
						}	else	{
							echo"Pas d'image";
						}

						
						?>

					</div>
				<?php
				}
				?>

			</div>

		</div>
		<!-- les pop-up -->
		<script src="//wpcc.io/lib/1.0.2/cookieconsent.min.js"></script>
        <script src="js/popupcookie.js"></script>

		<?php require 'inc/footer.php'; ?>

		<script src="js/navbar2.js"></script>
		<script src="js/notif.js"></script>
	</body>


</html>