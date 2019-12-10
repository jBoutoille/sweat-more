<?php
require 'inc/bdd.inc.php';
require 'inc/session.inc.php';
?>

<!DOCTYPE html>
<html>

	<?php 
        $title = 'Accueil | SweatMore';
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

		<!-- NAVBAR -->
		<?php require 'inc/nav.php'; ?>


		<div id="content">

			<!-- SLIDESHOW -->
			<?php require 'inc/slideshow.php'; ?> 

			<!-- LAST ARTICLE -->
			<?php require 'inc/lastarticle.php'; ?>

			<div id="ligne_separation"></div>

			<!-- PRESENTATION ENTREPRISE -->
			<div id="text_presentation">
				<div id="bartext"></div>
				<h3 class="presentationH3">Présentation de l'entreprise</h3>
				<p class="textpara">
					SweatMore c'est avant tout une équipe de spécialistes passionnés !
					<br><br>
					Notre gamme sportwear s'adapte à tous les profils de sportifs, amateurs comme experts.
					La qualité est notre exigence.
					<br><br>
					Nos articles répondent aux dernières tendances, et sont testés, adaptés, optimisés par nos équipes d'experts pour un meilleur confort d'utilisation.
					Présent sur la scène internationale, nous faisons de votre satisfaction une priorité !
				</p>
			</div>

		</div>
		
		<!-- Footer -->
		<?php require 'inc/footer.php' ?>

		<!-- Suppression de la notification -->
		<?php unset($_SESSION['notification']);?>

		<!-- script JS  -->
		<script src="//wpcc.io/lib/1.0.2/cookieconsent.min.js"></script>
		<script src="js/popupcookie.js"></script>
		<script src="js/notif.js"></script>
		<script src="js/navbar.js"></script>
		<script src="js/slideshow.js"></script>
		
	</body>
</html>