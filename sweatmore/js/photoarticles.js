// variables à portée Globale
var numberCtrl=1;
const secondImg = document.getElementsByClassName('photo_secondaire');
const mainImg = document.getElementsByClassName('photo_principal');
const soucesPhp = document.getElementsByClassName('sources_php');



// fonctions à portée Globale 
function changeImg(i){
	let indiceSource = i + 1;
	urlImage = soucesPhp[indiceSource].value;
	mainImg[0].innerHTML = '<img src="./' + urlImage + '" alt="Image articles">';


}

// Au click sur les images elles s'affiches


for (let i=0;i<secondImg.length;i++){
	secondImg[i].onclick=function(){
		changeImg(i);

	}
}