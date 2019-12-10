<?php
  include 'inc/bdd.inc.php';
  include 'inc/session.inc.php';
?>
<!DOCTYPE html>
<html>

    <?php 
        $title = 'Mentions légales | SweatMore';
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

		<!-- TEXT MENTIONS LEGALES -->
			<div id="text_presentation" style='padding-top:15vh;margin-top:0;'>
				<div id="bartext"></div>
				<h2 class="textintro1">Mentions légales</h2>
				<p class="textpara">
				Merci de lire avec attention les différentes modalités d’utilisation du présent site avant d’y parcourir ses pages. En vous connectant sur ce site, vous acceptez sans réserves les présentes modalités. Aussi, conformément à l’article n°6 de la Loi n°2004-575 du 21 Juin 2004 pour la confiance dans l’économie numérique, les responsables du présent site internet www.sweatmore.com sont</p>
				<br>
				<h3 class="textintro2">Editeur du Site</h3>
				<p class="textpara"> 
				Responsable éditorial : ANNE CREPIN  
				10 rue des carreaux, 62200, Boulogne-sur-mer Téléphone : 06.66.66.66.66  
				Email : sweatmore@sweatmore.com  
				Site Web : http://dev.simplonboulogne.fr</p>
				<br>
				<h3 class="textintro2">Hébergement</h3>
				<p class="textpara">  
				Hébergeur : SARL ANTHEDESIGN  
				20 rue Tondu du Metz 60350 ATTICHY Site Web : http:// dev.simplonboulogne.fr</p>
				<br>
				<h3 class="textintro2">Développement</h3>
				<p class="textpara"> 
				SARL ANTHEDESIGN  
				Adresse : 20 rue Tondu du Metz 60350 ATTICHY Site Web : http:// dev.simplonboulogne.fr</p>
				<br>
				<h3 class="textintro2">Conditions d’utilisation</h3>
				<p class="textpara"> 
				Ce site (www.sweatmore.com) est proposé en différents langages web (HTML5, Javascript, CSS, etc...) pour un meilleur confort d’utilisation et un graphisme plus agréable, nous vous recommandons de recourir à des navigateurs modernes comme Modzilla Firefox, Google Chrome, etc...
				Codex Simplon met en œuvre tous les moyens dont elle dispose, pour assurer une information fiable et une mise à jour fiable de ses sites internet. Toutefois, des erreurs ou omissions peuvent survenir. L’internaute devra donc s’assurer de l’exactitude des informations auprès de , et signaler toutes modifications du site qu’il jugerait utile. n’est en
				aucun cas responsable de l’utilisation faite de ces informations, et de tout préjudice direct ou indirect pouvant en découler.</p>
				<br>
				<h3 class="textintro2">Cookies</h3>
				<p class="textpara"> 					
				Le site www.retrogshop.fr peut-être amené à vous demander l’acceptation des cookies pour des besoins de statistiques et d’affichage. Un cookies est une information déposée sur votre disque dur par le serveur du site que vous visitez. Il contient plusieurs données qui sont stockées sur votre ordinateur dans un simple fichier texte auquel un serveur accède pour lire et enregistrer des informations . Certaines parties de ce site ne peuvent être fonctionnelles sans l’acceptation de cookies.</p>
				<br>
				<h3 class="textintro2">Liens hypertextes</h3>
				<p class="textpara"> 
				Les sites internet de peuvent offrir des liens vers d’autres sites internet ou d’autres ressources disponibles sur Internet. CODEX SIMPLON ne dispose d’aucun moyen pour contrôler les sites en connexion avec ses sites internet. ne répond pas de la disponibilité
				de tels sites et sources externes, ni ne la garantit. Elle ne peut être tenue pour responsable de tout dommage, de quelque nature que ce soit, résultant du contenu de ces sites ou sources externes, et notamment des informations, produits ou services qu’ils proposent, ou de tout usage qui peut être fait de ces éléments. Les risques liés à cette utilisation incombent pleinement à l’internaute, qui doit se conformer à leurs conditions d’utilisation. Les utilisateurs, les abonnés et les visiteurs des sites internet ne peuvent pas mettre en place un hyperlien en direction de ce site sans l’autorisation expresse et préalable de CODEX SIMPLON.
				Dans l’hypothèse où un utilisateur ou visiteur souhaiterait mettre en place un hyperlien en direction d’un des sites internet de CODEX SIMPLON, il lui appartiendra d’adresser un email accessible sur le site afin de formuler sa demande de mise en place d’un hyperlien. CODEX SIMPLON se réserve le droit d’accepter ou de refuser un hyperlien sans avoir à en justifier sa décision.</p>
				<br>
				<h3 class="textintro2">Services fournis</h3>
				<p class="textpara"> 					
				L’ensemble des activités de la société ainsi que ses informations sont présentés sur notre site www.retrogshop.fr.  
				CODEX SIMPLON s’efforce de fournir sur le site www.anthedesign.fr des informations aussi précises que possible. les renseignements figurant sur le site www. sweatmore.com ne sont pas exhaustifs et les photos non contractuelles. Ils sont donnés sous réserve de modifications ayant été apportées depuis leur mise en ligne. Par ailleurs, tous les
				informations indiquées sur le site www.anthedesign.fr sont données à titre indicatif, et sont susceptibles de changer ou d’évoluer sans préavis.</p>
				<br>
				<h3 class="textintro2">Limitation contractuelles sur les données</h3>
				<p class="textpara"> 					
				Les informations contenues sur ce site sont aussi précises que possible et le site remis à jour à différentes périodes de l’année, mais peut toutefois contenir des inexactitudes ou des missions. Si vous constatez une lacune, erreur ou ce qui paraît être un
				dysfonctionnement, merci de bien vouloir le signaler par email, à l’adresse contact@ sweatmore.com, en décrivant le problème de la manière la plus précise possible (page posant problème, type d’ordinateur et de navigateur utilisé, ...).
				Tout contenu téléchargé se fait aux risques et périls de l’utilisateur et sous sa seule responsabilité. En conséquence, ne saurait être tenu responsable d’un quelconque dommage subi par l’ordinateur de l’utilisateur ou d’une quelconque perte de données consécutives au téléchargement. De plus, l’utilisateur du site s’engage à accéder au site en utilisant un matériel récent, ne contenant pas de virus et avec un navigateur de dernière génération mis-à-jour.
				Les liens hypertextes mis en place dans le cadre du présent site internet en direction d’autres ressources présentes sur le réseau Internet ne sauraient engager la responsabilité de CODEX SIMPLON.</p>
				<br>
				<h3 class="textintro2">Propriété intellectuelle</h3>
				<p class="textpara"> 					
				Tout le contenu du présent site www.sweatmore.com, incluant, de façon non limitative, les graphismes, images, textes, vidéos, animations, sons, logos, gifs et icônes ainsi que leur mise en forme sont la propriété exclusive de la société à l’exception des marques, logos ou contenus appartenant à d’autres sociétés partenaires ou auteurs.
				Toute reproduction, distribution, modification, adaptation, retransmission ou publication, même partielle, de ces différents éléments est strictement interdite sans l’accord exprès par écrit de CODEX SIMPLON. Cette représentation ou reproduction, par quelque procédé que ce soit, constitue une contrefaçon sanctionnée par les articles L.335-2 et suivants du Code de la propriété intellectuelle. Le non-respect de cette interdiction constitue une contrefaçon pouvant engager la responsabilité civile et pénale du contrefacteur. En outre, les propriétaires des Contenus copiés pourraient intenter une action en justice à votre encontre.</p>
				<br>
				<h3 class="textintro2">Déclaration à la CNIL</h3>
				<p class="textpara"> 					
				Conformément à la loi 78-17 du 6 janvier 1978 (modifiée par la loi 2004-801 du 6 août 2004 relative à la protection des personnes physiques à l’égard des traitements de données à caractère personnel) relative à l’informatique, aux fichiers et aux libertés, ce
				site a fait l’objet d’une déclaration 1656629 auprès de la Commission nationale de l’informatique et des libertés (www.cnil.fr).</p>
				<br>
				<h3 class="textintro2">Litiges</h3>
				<p class="textpara"> 					
				Les présentes conditions du site www. sweatmore.com sont régies par les lois françaises et toute contestation ou litiges qui pourraient naître de l’interprétation ou de l’exécution de celles-ci seront de la compétence exclusive des tribunaux dont dépend le siège social de la société. La langue de référence , pour le règlement de contentieux éventuels, est le français.</p>
				<br>
				<h3 class="textintro2">Données personnelles</h3>
				<p class="textpara"> 					
				De manière générale, vous n’êtes pas tenu de nous communiquer vos données personnelles lorsque vous visitez notre site Internet www.sweatmore.com.  
				Cependant, ce principe comporte certaines exceptions. En effet, pour certains services proposés par notre site, vous pouvez être amenés à nous communiquer certaines données telles que : votre nom, votre fonction, le nom de votre société, votre adresse électronique, et votre numéro de téléphone. Tel est le cas lorsque vous remplissez le formulaire qui vous est proposé en ligne, dans la rubrique « contact ».
				Dans tous les cas, vous pouvez refuser de fournir vos données personnelles. Dans ce cas, vous ne pourrez pas utiliser les services du site, notamment celui de solliciter des renseignements sur notre société, ou de recevoir les lettres d’information.  
				Enfin, nous pouvons collecter de manière automatique certaines informations vous concernant lors d’une simple navigation sur notre site Internet, notamment : des informations concernant l’utilisation de notre site, comme les zones que vous visitez et les services auxquels vous accédez, votre adresse IP, le type de votre
				navigateur, vos temps d’accès. De telles informations sont utilisées exclusivement à des fins de statistiques internes, de manière à améliorer la qualité des services qui vous sont proposés. Les bases de données sont protégées par les dispositions de la loi du 1er juillet 1998 transposant la directive 96/9 du 11 mars 1996 relative à la protection juridique des bases de données.</p>
				<br>

			</div>

		<?php require 'inc/footer.php'; ?>
		<!-- les pop-up -->
		<script src="//wpcc.io/lib/1.0.2/cookieconsent.min.js"></script>
        <script src="js/popupcookie.js"></script>
		<script src="js/notif.js"></script>
		<script src="js/navbar2.js"></script>
	</body>


</html>