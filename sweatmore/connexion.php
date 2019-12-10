<?php
include 'inc/bdd.inc.php';
include 'inc/session.inc.php';

?>

<!DOCTYPE html>
<html>

	<?php 
		if(isset($_GET['new-account'])){
			$title = 'Inscription | SweatMore';
		}
		else if(isset($_GET['change-profile'])){
			$title = 'Modifier son compte | SweatMore';
		}
		else{
			$title = 'Connexion | SweatMore';
		}
        
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

		<section>
            
            <?php
            // Création de compte
            if(isset($_GET['new-account'])) 
            {
            ?>

				<div class="formulaire container-fluid" id="formulaire">
					<div class="row">
						<div class="col-lg-12">
							<form name="contact-form" id="contact-form" method="post" action="traitement.php">
								<ul>
                    				<h2 class="wow fadeInUp">| Créer un nouveau compte</h2>
		              				<li class="wow fadeInUp">
		              					<label for="nom">Nom de la société :</label>
										<div class="textarea">
											<input  type="text" name="nom" id="nom" value="" required>
										</div>
									</li>

									<li class="wow fadeInUp">
										<label for="email">Adresse mail :</label>
										<div class="textarea">
											<input  type="email" name="email" id="email" value="" required>
										</div>
									</li>

									<li class="wow fadeInUp">
										<label for="siret">Numéro de SIRET :</label>
										<div class="textarea">
											<input  type="number" name="siret" id="siret" value="" placeholder="000 000 000 0000" required >
										</div>
									</li>

									<li class="wow fadeInUp">
										<label for="mdp">Mot de passe :</label>
										<div class="textarea">
											<input  type="password" name="mdp" id="mdp" value="" required>
										</div>
									</li>

									<button type="submit" name="submit_new_account" class="send wow fadeInUp">S'inscrire</button>

									<p class="inscrit"><a href="connexion.php">Déja inscrit ? Se connecter</a></p>
									<!-- </div> -->
            					</ul>
							</form>
						</div>
					</div>
    			</div>

            <?php
			}
			// Modification des données d'un compte existant
			elseif(isset($_GET['change-profile']))
			{
			?>
				<div class="formulaire container-fluid" id="formulaire">
				  	<div class="row">
			        	<div class="col-lg-12">
			          		<form name="contact-form" id="contact-form" method="post" action="traitement.php" enctype="multipart/form-data">
			            		<ul>

									<h2 class="wow fadeInUp">| Modifier mon compte</h2>

									<li class="wow fadeInUp">
										<label for="nom">Nom de la société :</label>
										<div class="textarea">
											<input  type="text" name="nom" id="nom" value="<?=$user['nom']?>" required>
										</div>
									</li>

									<li class="wow fadeInUp">
										<label for="email">Adresse mail :</label>
										<div class="textarea">
											<input  type="email" name="email" id="email" value="<?=$user['email']?>" required>
										</div>
									</li>

									<li class="wow fadeInUp">
										<label for="siret">Numéro de SIRET :</label>
										<div class="textarea">
											<input  type="number" name="siret" id="siret" value="<?=$user['siret']?>" placeholder="000 000 000 0000" required >
										</div>
									</li>
									<!-- <div class="form-group">
										<label for="mdp">Mot de passe</label>
										<input type="password" name="mdp" class="form-control" id="mdp" value="" required />
									</div> -->
								
									<button type="submit" name="submit_profile" class="send wow fadeInUp"> sauvegarder</button>
									<button type="submit" name="submit_profile" class="send wow fadeInUp"><a href="index.php"> Annuler</a></button>	
								</ul>
          					</form>
        				</div>
      				</div>
     			</div>

			<?php
			}
			//Connexion
			elseif(!isset($_SESSION['user_id']))
			{
			?>
				<div class="formulaire container-fluid" id="formulaire">
					<div class="row">
						<div class="col-lg-12">
							<form name="contact-form" id="contact-form" method="post" action="traitement.php">
								<ul>
									<h2 class="wow fadeInUp">| Se connecter</h2>
									
									<li class="wow fadeInUp">
										<label for="email">Email :</label>
										<div class="textarea">
											<input  type="email" name="email" id="email" value="" required>
										</div>
									</li>

									<li class="wow fadeInUp">
										<label for="contact-email">Mot de passe :</label>
										<div class="textarea">
											<input type="password" name="mdp" id="mdp" value="" required>
										</div>
									</li>

									<button type="submit" name="submit_connection" class="send wow fadeInUp"> connexion</button>

									<p class="inscrit"><a href="connexion.php?new-account">Créer un compte</a></p>

								</ul>
          					</form>
        				</div>
      				</div>
     			</div>

			<?php
			}
			?>
			
		</section>

		<!-- les pop-up -->
		<script src="//wpcc.io/lib/1.0.2/cookieconsent.min.js"></script>
        <script src="js/popupcookie.js"></script>

		<?php require 'inc/footer.php'; ?>

		<!-- Suppression de la notification -->
		<?php unset($_SESSION['notification']);?>

		<!-- Script JS  -->
        <script src="js/navbar2.js"></script>
		<script src="js/notif.js"></script>
		
	</body>

</html>