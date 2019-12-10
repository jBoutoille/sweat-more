// SLIDESHOW

    /* Variables d'accès au DOM */

    const fondSlideshow = document.getElementById('slideshow');
    const bloc_img_slideshow = document.getElementById('bloc_img_slideshow');
    const titreSlide = document.getElementById('titre_slide');
    const blocPoints = document.getElementsByClassName('points');
    const flecheGauche = document.getElementById('fleche_gauche');
    const flecheDroite = document.getElementById('fleche_droite');

    /* Définition des éléments du slideshow */

    var listeUrlImages = [
        './img/background-slideshow/fitness.jpg',
        './img/background-slideshow/muscu.jpg',
        './img/background-slideshow/sweatshirt.jpeg',
        './img/background-slideshow/basket.jpg',
        './img/background-slideshow/tshirt.jpg'
    ];

    var listeTitreSlide = [
        '<a href="categorie.php?categorie=fitness">FITNESS</a>',
        '<a href="categorie.php?categorie=muscu">MUSCU</a>',
        '<a href="categorie.php?categorie=sweats">SWEATSHIRT</a>',
        '<a href="categorie.php?categorie=baskets">BASKETS</a>',
        '<a href="categorie.php?categorie=tshirts">TSHIRT</a>'
    ];

    /* Variables initiales */

    var indiceSlide = 0;

    blocPoints[0].style.color = '#FF9100';

    /* Fonctions */

    function changerCouleur() {
        let indiceSuivant = indiceSlide + 1;
        if (indiceSlide == listeUrlImages.length - 1) {
            indiceSuivant = 0;         
        }
        let indicePrecedant = indiceSlide - 1;      
        if (indiceSlide == 0) {
            indicePrecedant = listeUrlImages.length - 1;         
        }
        blocPoints[indiceSlide].style.color = '#FF9100';
        blocPoints[indiceSuivant].style.color = '#FFFFFF';
        blocPoints[indicePrecedant].style.color = '#FFFFFF';
    }

    function diapoAuto(direction) {
       
        if (direction == 'suivant') {
            if (indiceSlide < (listeUrlImages.length - 1) ) {
                indiceSlide++;         
            } else {
                indiceSlide = 0;
            }
        }

        if (direction == 'precedant') {
            if (indiceSlide >= 1) {
                indiceSlide -= 1;
            } else {
                indiceSlide = 4;
            }
        }

        bloc_img_slideshow.style.transition = 'left 1s';
        bloc_img_slideshow.style.left = (-100 * indiceSlide) + "%";

        titreSlide.innerHTML = "<h2>" + listeTitreSlide[indiceSlide] + "</h2>";
        changerCouleur();

    }

    /* Lancement automatique du diaporama */

    setInterval(function () {diapoAuto('suivant')}, 6000);

    /* Boutons */

    flecheGauche.onclick = function () {
        diapoAuto('precedant');
    }

    flecheDroite.onclick = function () {
        diapoAuto('suivant');
    }