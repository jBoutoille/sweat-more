// NAVBAR ACCUEIL ONLY


    // [INIT] VARIABLES
    var navbar = document.getElementById('navbar');
    var burger = document.getElementById('burger');
    var burgerContent = document.getElementById("burgerContent");
    var burgerUl = burgerContent.getElementsByTagName('ul');
    var burgerLi = burgerContent.getElementsByTagName('li');
    var burgerA = burgerContent.getElementsByTagName('a');
    var divLogo = document.createElement("h1");
    var divContent = document.createTextNode("SWEATMORE."); 
        divLogo.setAttribute("onclick","goToIndex()"); 
        divLogo.appendChild(divContent);   
    var widthDevice = window.innerWidth;
    var scrollPos = window.scrollY;

    navbar.style.backgroundColor = "#2e364f";
    navbar.style.borderBottom = "solid .4vh #FF9100";
    
    // [INIT] BURGER ICON INITIALISATION
    var burgers = document.getElementById("burgers");
    burgers.children[1].style.display = "none";

    // [INIT] GLOBAL PAGE SIZE - NAV SELECTOR
    if(widthDevice<992){
        burger.style.justifyContent = "space-between";
        burger.style.flexDirection = "row-reverse";
        burger.appendChild(divLogo);
        divLogo.classList.add("navbarLogo");
    }
    else if(widthDevice>991){
        burger.style.justifyContent = "flex-end";
        burger.style.flexDirection = "row";
    }



    // [EVENT] ON PAGE RESIZE
    window.onresize = function(){
        widthDevice = window.innerWidth;
        if(widthDevice<992){
            burger.style.justifyContent = "space-between";
            burger.style.flexDirection = "row-reverse";
            burger.appendChild(divLogo);
            divLogo.classList.add("navbarLogo");
        }
        else if(widthDevice>991){
            burger.style.justifyContent = "flex-end";
            burger.style.flexDirection = "row";
            navbar.style.height = "10vh";
        }
    }


    function iconOpen(){
        burgers.children[0].style.display = "none";
        burgers.children[1].style.display = "inherit";
        burger.classList.add('ccBurger');
        burgerContent.classList.add('ccBurgerContent');
        navbar.classList.add('ccNavbar');            
        for(let j=0;j<burgerUl.length;j++){
            burgerUl[j].classList.add('ccUl');
        }
        for(let i=0;i<burgerLi.length;i++){
            burgerLi[i].classList.add('ccUlLi');
            burgerA[i].classList.add('ccUlLiA');
        }
    }


    function iconClose(){
        burgers.children[0].style.display = "inherit";
        burgers.children[1].style.display = "none";
        navbar.classList.remove('ccNavbar');
        burgerContent.classList.remove('ccBurgerContent');
        burger.classList.remove('ccBurger');
        for(let j=0;j<burgerUl.length;j++){
            burgerUl[j].classList.remove('ccUl');
        }
        for(let i=0;i<burgerLi.length;i++){
            burgerLi[i].classList.remove('ccUlLi');
            burgerA[i].classList.remove('ccUlLiA');
        }
    }

    function goToIndex(){
        document.location.href="index.php";
    }