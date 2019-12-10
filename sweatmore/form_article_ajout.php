<?php
include 'inc/bdd.inc.php';
include 'inc/session.inc.php';

?>

<!DOCTYPE html>
<html>

    <?php 
        $title = 'Créer un article | SweatMore';
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

                    <h3 class="text-center">Créer un nouvel article</h3>

                    <form action="traitement.php" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="nom_base_article">Nom de l'article :</label>
                            <input type="text" name="nom_base_article" class="form-control" 
                                id="nom_base_article" placeholder="" required />
                        </div>
                        
                        <div class="form-group">
                            <label for="nom_marque_article">Marque de l'article :</label>
                            <input type="text" name="nom_marque_article" class="form-control" 
                                id="nom_marque_article" placeholder="" required />
						</div>

                        <div class="form-group">
                            <label for="categorie">Catégorie :</label>
                            <select name="categorie" id="categorie" class="form-control">                                
                                <option>sweats</option>
                                <option>tshirts</option>
                                <option>baskets</option>
                                <option>fitness</option>
                                <option>muscu</option>
                            </select>
						</div>						

                        <div class="form-group">
                            <label for="image_1">Image 1 :</label>
                            <input type="file" name="image_1" id="image_1">
                        </div>

                        <div class="form-group">
                            <label for="image_2">Image 2 :</label>
                            <input type="file" name="image_2" id="image_2">
                        </div>

                        <div class="form-group">
                            <label for="image_3">Image 3 :</label>
                            <input type="file" name="image_3" id="image_3">
                        </div>

                        <div class="form-group">
                            <label for="image_4">Image 4 :</label>
                            <input type="file" name="image_4" id="image_4">
                        </div>	
                        
                        <div class="form-group">
                            <label for="texte_article">Description de l'article :</label>
                            <textarea class="form-control" name="texte_article" id="texte_article" rows="4" required></textarea>
                        </div>
		
                        <div class="text-center" style="margin-bottom: 20px">
                            <button type="submit" name="submit_new_article" class="btn btn-success">Nouvel article</button>
						</div>
						
                    </form>

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