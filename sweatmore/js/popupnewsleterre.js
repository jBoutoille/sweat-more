var popupDiv = document.getElementById('popupDiv');
var popupSvg = document.getElementById("popupSvg");

function popNews() {
   popupDiv.setAttribute('style','display:flex');
}

setTimeout(popNews,30000);

popupSvg.onclick = function(){
   popupDiv.setAttribute('style','display:none');
}