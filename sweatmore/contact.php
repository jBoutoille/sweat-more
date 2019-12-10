<?php
  include 'inc/bdd.inc.php';
  include 'inc/session.inc.php';
?>


<!DOCTYPE html>
<html>

      <?php 
        $title = 'Contact | SweatMore';
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
    
    <?php 
          require 'inc/nav.php'; 
        ?>

    <!-- form section -->
    <div class="formulaire container-fluid" id="formulaire">
      <div class="row">
        <div class="col-lg-12">
          <form name="contact-form" id="contact-form" method="post" action="traitement.php">
            <ul>

              <h3 class="wow fadeInUp">| Écrivez-nous</h3>
              
              <li class="wow fadeInUp">
                <label for="contact-name">Nom de la société :</label>
                <div class="textarea1">
                  <input type="text" name="société" id="société" value="" required>
                </div>
              </li>

              <li class="wow fadeInUp">
                <label for="contact-email">Adresse mail :</label>
                <div class="textarea1">
                  <input type="email" name="mail" id="mail" value="" required>
                </div>
              </li>

              <li class="wow fadeInUp">
                <label for="contact-telephone">Téléphone (facultatif) :</label>
                <div class="textarea1">
                  <input type="number" name="telephone" id="téléphone" value="">
                </div>
              </li>

              <li class="wow fadeInUp">

              <label for="contact-structure">Message (1000 caractères maximum) :</label>
              <div class="textarea1">
              <textarea type="text" name="message" id="message" rows="4" value="" required>
              </textarea>
              </div>

              </li>

              <button type="submit" name="contact-submit" id="contact-submit" class="send wow fadeInUp"> Envoyer</button>
            </ul>
          </form>
        </div>
      </div>
    </div>

    <!-- les pop-up -->
    <script src="//wpcc.io/lib/1.0.2/cookieconsent.min.js"></script>
    <script src="js/popupcookie.js"></script>

    <?php 
      require 'inc/footer.php'; 
    ?>

    <script src="js/navbar2.js"></script>
    <script src="js/notif.js"></script>
  </body>

</html>

