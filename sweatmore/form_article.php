<?php
include 'inc/bdd.inc.php';
include 'inc/session.inc.php';

?>

<!DOCTYPE html>
<html>

    <?php 
        $title = 'Liste des articles | SweatMore';
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

		<section style="padding:15vh 30% 0 30%;">
            
                <div class="container">

                    <h3 class="text-center">Liste des articles</h3>

                    <?php
                        $reponse = $bdd -> query('SELECT id, nom, img1 FROM articles ORDER BY id');
                        while($donnees = $reponse -> fetch()) {
                    ?>                  

                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                            <img src="./img/articles/<?= $donnees['img1'] ?>" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $donnees['nom'] ?></h5>
                            </div>
                            <div class="card-body text-right">
                                <a href="./form_article_modif.php?modif=<?= $donnees['id'] ?>" class="btn btn-outline-dark">Modifier</a>
                                <a href="./traitement.php?suppr_article=<?= $donnees['id'] ?>" class="btn btn-outline-dark">Supprimer</a>
                            </div>
                            </div>
                        </div>
                    </div>

                    <?php                           
                        } // fin de la boucle while
                    ?>

                    <div class="card text-center" style="margin-bottom: 20px">
                        <div class="card-body">
                            <a href="./form_article_ajout.php" class="btn btn-success">Ajouter un article</a>
                        </div>
                    </div>

                </div>

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